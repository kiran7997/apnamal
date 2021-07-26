<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Web\Index;
use App\Models\Web\Languages;
use App\Models\Web\Products;
use App\Models\Web\Currency;
use App\Models\Web\Shipping;
use App\Models\Web\Cart;
use App\Http\Controllers\Web\AlertController;
use Auth;
use Lang;
use Hash;

class Order extends Model
{
  //place_order
	public function place_order($request){
		      $cart = new Cart();
		      $result = array();
					$result['cart'] = $cart->myCart($result);
					if(count($result['cart']) > 0){
						foreach( $result['cart'] as $products){
							$req = array();
							$req['products_id'] = $products->products_id;
							if(isset($products->attributes)){
								$req['attributes'] = $products->attributes;
							}
							$check = Products::getquantity($req);
							if($products->customers_basket_quantity > $check['stock']){
								session(['out_of_stock' => 1]);
								session(['out_of_stock_product' => $products->products_id]);
								return redirect('viewcart');
							}
						}
					}

					$date_added	= date('Y-m-d h:i:s');
					if(Session::get('guest_checkout') == 1){
						$email = session('shipping_address')->email;
						$check = DB::table('users')->where('role_id',2)->where('email',$email)->first();
						if($check == null){
							$customers_id = DB::table('users')
			                    ->insertGetId([
									'role_id' => 2,
									'email' => $email = session('shipping_address')->email,
									'password' => Hash::make('123456dfdfdf'),
									'first_name' => session('shipping_address')->firstname,
									'last_name' => session('shipping_address')->lastname,
									'phone' => session('billing_address')->billing_phone
								]);
							session(['customers_id' => $customers_id]);
						}
						else{
							$customers_id = $check->id;
							$email = $check->email;
							session(['customers_id' => $customers_id]);
						}
					}else{
						$customers_id            				=   auth()->guard('customer')->user()->id;
						$email            						=  auth()->guard('customer')->user()->email;
					}
					$delivery_company 						=	session('shipping_address')->company;
					$delivery_firstname  	          		=   session('shipping_address')->firstname;

					$delivery_lastname            			=   session('shipping_address')->lastname;
					$delivery_street_address            	=   session('shipping_address')->street;
					$delivery_suburb            			=   '';
					$delivery_city            				=   session('shipping_address')->city;
					$delivery_postcode            			=   session('shipping_address')->postcode;
					$delivery_phone            				=   session('shipping_address')->delivery_phone;

					$delivery = DB::table('zones')->where('zone_id', '=', session('shipping_address')->zone_id)->get();

					if(count($delivery)>0){
						$delivery_state            				=   $delivery[0]->zone_code;
					}else{
						$delivery_state            				=   'other';
					}

					$country = DB::table('countries')->where('countries_id','=', session('shipping_address')->countries_id)->get();

					$delivery_country            			=   $country[0]->countries_name;

					$billing_firstname            			=   session('billing_address')->billing_firstname;
					$billing_lastname            			=   session('billing_address')->billing_lastname;
					$billing_street_address            		=   session('billing_address')->billing_street;
					$billing_suburb	            			=   '';
					$billing_city            				=   session('billing_address')->billing_city;
					$billing_postcode            			=   session('billing_address')->billing_zip;
					$billing_phone            				=   session('billing_address')->billing_phone;

					if(!empty(session('billing_company')->company)){
						$billing_company 						=	session('billing_address')->company;
					}

					$billing = DB::table('zones')->where('zone_id', '=', session('billing_address')->billing_zone_id)->get();

					if(count($billing)>0){
						$billing_state            			=   $billing[0]->zone_code;
					}else{
						$billing_state         				=   'other';
					}

					$country = DB::table('countries')->where('countries_id','=', session('billing_address')->billing_countries_id)->get();

					$billing_country            			=   $country[0]->countries_name;

					$payment_method            				=   session('payment_method');
					$order_information 						=	array();

					if(!empty($request->cc_type)){
						$cc_type            				=   $request->cc_type;
						$cc_owner            				=   $request->cc_owner;
						$cc_number            				=   $request->cc_number;
						$cc_expires            				=   $request->cc_expires;
					}else{
						$cc_type            				=   '';
						$cc_owner            				=   '';
						$cc_number            				=   '';
						$cc_expires            				=   '';
					}

					$last_modified            			=   date('Y-m-d H:i:s');
					$date_purchased            			=   date('Y-m-d H:i:s');

					//price
					if(!empty(session('shipping_detail'))){
						$shipping_price = session('shipping_detail')->shipping_price;
					}else{
						$shipping_price = 0;
					}
					$tax_rate = number_format((float)session('tax_rate'), 2, '.', '');
					$coupon_discount = number_format((float)session('coupon_discount'), 2, '.', '');
					$order_price = (session('products_price')+$tax_rate+$shipping_price)-$coupon_discount;

					$shipping_cost            			=   session('shipping_detail')->shipping_price;
					$shipping_method            		=   session('shipping_detail')->mehtod_name;
					$orders_status            			=   '1';
					//$orders_date_finished            	=   $request->orders_date_finished;

					if(!empty(session('order_comments'))){
						$comments						=	session('order_comments');
					}else{
						$comments            			=   '';
					}

					$web_setting = DB::table('settings')->get();
					$currency            				=   $web_setting[19]->value;
					$total_tax									=	number_format((float)session('tax_rate'), 2, '.', '');
					$products_tax 						= 	1;

					$coupon_amount = 0;
					if(!empty(session('coupon')) and count(session('coupon'))>0){

						$code = array();
						$exclude_product_ids = array();
						$product_categories = array();
						$excluded_product_categories = array();
						$exclude_product_ids = array();

						$coupon_amount    =		number_format((float)session('coupon_discount'), 2, '.', '')+0;

						foreach(session('coupon') as $coupons_data){

							//update coupans
							$coupon_id = DB::statement("UPDATE `coupons` SET `used_by`= CONCAT(used_by,',$customers_id') WHERE `code` = '".$coupons_data->code."'");

						}
						$code = json_encode(session('coupon'));

					}else{
						$code            					=   '';
						$coupon_amount            			=   '';
					}

					//payment methods

					if($payment_method == 'braintree'){
					      	$payments_setting = $this->payments_setting_for_brain_tree();

									//braintree transaction with nonce
									$is_transaction  = '1'; 			# For payment through braintree
									$nonce    		 =   $request->payment_method_nonce;

									if($payments_setting['merchant_id']->environment == '0'){
										$braintree_environment = 'sandbox';
									}else{
										$braintree_environment = 'production';
									}

									$braintree_merchant_id = $payments_setting['merchant_id']->value;
									$braintree_public_key  = $payments_setting['public_key']->value;
									$braintree_private_key = $payments_setting['private_key']->value;

									//brain tree credential
									require_once app_path('braintree/Braintree.php');

									if ($result->success)
									{

									if($result->transaction->id)
										{
											$order_information = array(
												'braintree_id'=>$result->transaction->id,
												'status'=>$result->transaction->status,
												'type'=>$result->transaction->type,
												'currencyIsoCode'=>$result->transaction->currencyIsoCode,
												'amount'=>$result->transaction->amount,
												'merchantAccountId'=>$result->transaction->merchantAccountId,
												'subMerchantAccountId'=>$result->transaction->subMerchantAccountId,
												'masterMerchantAccountId'=>$result->transaction->masterMerchantAccountId,
												//'orderId'=>$result->transaction->orderId,
												'createdAt'=>time(),
						//						'updatedAt'=>$result->transaction->updatedAt->date,
												'token'=>$result->transaction->creditCard['token'],
												'bin'=>$result->transaction->creditCard['bin'],
												'last4'=>$result->transaction->creditCard['last4'],
												'cardType'=>$result->transaction->creditCard['cardType'],
												'expirationMonth'=>$result->transaction->creditCard['expirationMonth'],
												'expirationYear'=>$result->transaction->creditCard['expirationYear'],
												'customerLocation'=>$result->transaction->creditCard['customerLocation'],
												'cardholderName'=>$result->transaction->creditCard['cardholderName']
											);

											$payment_status = "success";
										}
									}
									else
										{
											$payment_status = "failed";
										}

					}
					else if($payment_method == 'stripe'){				#### stipe payment

									//require file
									require_once app_path('stripe/config.php');

									//get token from app
									$token  = $request->token;

									$customer = \Stripe\Customer::create(array(
									  'email' => $email,
									  'source'  => $token
									));

									$charge = \Stripe\Charge::create(array(
									  'customer' => $customer->id,
									  'amount'   => 100*$order_price,
									  'currency' => 'usd'
									));

									 if($charge->paid == true){
										 $order_information = array(
												'paid'=>'true',
												'transaction_id'=>$charge->id,
												'type'=>$charge->outcome->type,
												'balance_transaction'=>$charge->balance_transaction,
												'status'=>$charge->status,
												'currency'=>$charge->currency,
												'amount'=>$charge->amount,
												'created'=>date('d M,Y', $charge->created),
												'dispute'=>$charge->dispute,
												'customer'=>$charge->customer,
												'address_zip'=>$charge->source->address_zip,
												'seller_message'=>$charge->outcome->seller_message,
												'network_status'=>$charge->outcome->network_status,
												'expirationMonth'=>$charge->outcome->type
											);

											$payment_status = "success";

									 }else{
											$payment_status = "failed";
									 }

					}
					else if($payment_method == 'cash_on_delivery'){
						$payments_setting = $this->payments_setting_for_cod();

						$payment_method = $payments_setting->name;
						$payment_status='success';

					}
					else if($payment_method == 'paypal'){
							$paypal_description = $this->payments_setting_for_paypal();
							$payment_method = $payments_setting['id']->name;
							$payment_status='success';
							$order_information = json_decode($request->nonce, JSON_UNESCAPED_SLASHES);
					}
					else if($payment_method == 'instamojo'){
						$instamojo =  $this->payments_setting_for_instamojo();
						$payment_method = $instamojo['auth_token']->name;
						$payment_status='success';
						$order_information = $request->nonce;
					}
					else if($payment_method == 'hyperpay'){
						$hyperpay =$this->payments_setting_for_hyperpay();
						$payment_method = $hyperpay['userid']->name;
						$payment_status='success';
						$order_information = session('paymentResponseData');
					}

					//check if order is verified
					if($payment_status=='success'){

										$orders_id = DB::table('orders')->insertGetId(
											[	 'customers_id' => $customers_id,
												 'customers_name'  => $delivery_firstname.' '.$delivery_lastname,
												 'customers_street_address' => $delivery_street_address,
												 'customers_suburb'  =>  $delivery_suburb,
												 'customers_city' => $delivery_city,
												 'customers_postcode'  => $delivery_postcode,
												 'customers_state' => $delivery_state,
												 'customers_country'  =>  $delivery_country,
												 //'customers_telephone' => $customers_telephone,
												 'email'  => $email,
												// 'customers_address_format_id' => $delivery_address_format_id,

												 'delivery_name'  =>  $delivery_firstname.' '.$delivery_lastname,
												 'delivery_street_address' => $delivery_street_address,
												 'delivery_suburb'  => $delivery_suburb,
												 'delivery_city' => $delivery_city,
												 'delivery_postcode'  =>  $delivery_postcode,
												 'delivery_state' => $delivery_state,
												 'delivery_country'  => $delivery_country,
												// 'delivery_address_format_id' => $delivery_address_format_id,

												 'billing_name'  => $billing_firstname.' '.$billing_lastname,
												 'billing_street_address' => $billing_street_address,
												 'billing_suburb'  =>  $billing_suburb,
												 'billing_city' => $billing_city,
												 'billing_postcode'  => $billing_postcode,
												 'billing_state' => $billing_state,
												 'billing_country'  =>  $billing_country,
												 //'billing_address_format_id' => $billing_address_format_id,

												 'payment_method'  =>  $payment_method,
												 'cc_type' => $cc_type,
												 'cc_owner'  => $cc_owner,
												 'cc_number' =>$cc_number,
												 'cc_expires'  =>  $cc_expires,
												 'last_modified' => $last_modified,
												 'date_purchased'  => $date_purchased,
												 'order_price'  => $order_price,
												 'shipping_cost' =>$shipping_cost,
												 'shipping_method'  =>  $shipping_method,
												// 'orders_status' => $orders_status,
												 //'orders_date_finished'  => $orders_date_finished,
												 'currency'  =>  $currency,
												 'order_information' => 	json_encode($order_information),
												 'coupon_code'		 =>		$code,
												 'coupon_amount' 	 =>		$coupon_amount,
											 	 'total_tax'		 =>		$total_tax,
												 'ordered_source' 	 => 	'1',
												 'delivery_phone'	 =>	 	$delivery_phone,
												 'billing_phone'	 =>	 	$billing_phone,
											]);

										 //orders status history
										 $orders_history_id = DB::table('orders_status_history')->insertGetId(
											[	 'orders_id'  => $orders_id,
												 'orders_status_id' => $orders_status,
												 'date_added'  => $date_added,
												 'customer_notified' =>'1',
												 'comments'  =>  $comments
											]);


										 $cart = $cart->myCart(array());


										 foreach($cart as $products){
											//get products info
											$orders_products_id = DB::table('orders_products')->insertGetId(
												[
													 'orders_id' 		 => 	$orders_id,
													 'products_id' 	 	 =>		$products->products_id,
													 'products_name'	 => 	$products->products_name,
													 'products_price'	 =>  	$products->price,
													 'final_price' 		 =>  	$products->final_price*$products->customers_basket_quantity,
													 'products_tax' 	 =>  	$products_tax,
													 'products_quantity' =>  	$products->customers_basket_quantity,
												]);

											$inventory_ref_id = DB::table('inventory')->insertGetId([
													'products_id'   		=>   $products->products_id,
													'reference_code'  		=>   '',
													'stock'  				=>   $products->customers_basket_quantity,
													'admin_id'  			=>   0,
													'added_date'	  		=>   time(),
													'purchase_price'  		=>   0,
													'stock_type'  			=>   'out',
												]);
                     if(Session::get('guest_checkout') == 1){
											 DB::table('customers_basket')->where('session_id',Session::getId())->where('products_id',$products->products_id)->update(['is_order'=>'1']);

										 }
										 else{
											 DB::table('customers_basket')->where('customers_id',$customers_id)->where('products_id',$products->products_id)->update(['is_order'=>'1']);

										 }

											if(!empty($products->attributes)){
												foreach($products->attributes as $attribute){
													DB::table('orders_products_attributes')->insert(
													[
														 'orders_id' => $orders_id,
														 'products_id'  => $products->products_id,
														 'orders_products_id'  => $orders_products_id,
														 'products_options' =>$attribute->attribute_name,
														 'products_options_values'  =>  $attribute->attribute_value,
														 'options_values_price'  =>  $attribute->values_price,
														 'price_prefix'  =>  $attribute->prefix
													]);

													DB::table('inventory_detail')->insert([
														'inventory_ref_id'  =>   $inventory_ref_id,
														'products_id'  		=>   $products->products_id,
														'attribute_id'		=>   $attribute->products_attributes_id,
													]);
												}
											}

										 }

										$responseData = array('success'=>'1', 'data'=>array(), 'message'=>"Order has been placed successfully.");

										//send order email to user
										$order = DB::table('orders')
											->LeftJoin('orders_status_history', 'orders_status_history.orders_id', '=', 'orders.orders_id')
											->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
											->where('orders.orders_id', '=', $orders_id)->orderby('orders_status_history.date_added', 'DESC')->get();

									//foreach
									foreach($order as $data){
										$orders_id	 = $data->orders_id;

										$orders_products = DB::table('orders_products')
											->join('products', 'products.products_id','=', 'orders_products.products_id')
											->select('orders_products.*', 'products.products_image as image')
											->where('orders_products.orders_id', '=', $orders_id)->get();
											$i = 0;
											$total_price  = 0;
											$product = array();
											$subtotal = 0;
											foreach($orders_products as $orders_products_data){
												$product_attribute = DB::table('orders_products_attributes')
													->where([
														['orders_products_id', '=', $orders_products_data->orders_products_id],
														['orders_id', '=', $orders_products_data->orders_id],
													])
													->get();

												$orders_products_data->attribute = $product_attribute;
												$product[$i] = $orders_products_data;
												//$total_tax	 = $total_tax+$orders_products_data->products_tax;
												$total_price = $total_price+$orders_products[$i]->final_price;
												$subtotal += $orders_products[$i]->final_price;
												$i++;
											}

										$data->data = $product;
										$orders_data[] = $data;
									}

										$orders_status_history = DB::table('orders_status_history')
											->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
											->orderBy('orders_status_history.date_added', 'desc')
											->where('orders_id', '=', $orders_id)->get();

										$orders_status = DB::table('orders_status')->get();

										$ordersData['orders_data']		 	 	=	$orders_data;
										$ordersData['total_price']  			=	$total_price;
										$ordersData['orders_status']			=	$orders_status;
										$ordersData['orders_status_history']    =	$orders_status_history;
										$ordersData['subtotal']    				=	$subtotal;

										//notification/email
										$myVar = new AlertController();
										$alertSetting = $myVar->orderAlert($ordersData);

										if(session('step')=='4'){
											session(['step' => array()]);
										}

										session(['paymentResponseData'=>'']);
										session(['paymentResponse'=>'']);

										//change status of cart products
										if(Session::get('guest_checkout') == 1){
											DB::table('customers_basket')->where('session_id',Session::getId())->update(['customers_id'=>Session::get('customers_id')]);
											DB::table('customers_basket')->where('session_id',Session::getId())->update(['is_order'=>'1']);
										}else{
										DB::table('customers_basket')->where('customers_id',auth()->guard('customer')->user()->id)->update(['is_order'=>'1']);
									  }
										return $payment_status;
					}
					else if($payment_status == "failed"){
						return $payment_status;
					}

	}
	
	public function place_order1($request){
		      $cart = new Cart();
		      $result = array();
					$result['cart'] = $cart->myCart($result);
                                        $total_weight = '0';
					if(count($result['cart']) > 0){
						foreach( $result['cart'] as $products){
							$req = array();
							$req['products_id'] = $products->products_id;
							if(isset($products->attributes)){
								$req['attributes'] = $products->attributes;
							}
							$check = Products::getquantity($req);
							if($products->customers_basket_quantity > $check['stock']){
								session(['out_of_stock' => 1]);
								session(['out_of_stock_product' => $products->products_id]);
								return redirect('viewcart');
							}
						}
					}
//shipping methods
$shipping_methods = $this->shipping_methods();
//print_r($shipping_methods[0]['services'][0]);
//echo $request->create_account;
//die;
					$date_added = date('Y-m-d h:i:s');
					if(Session::get('guest_checkout') == 1){
                                            if($request->create_account=='on'){
                                                $email = $request->email;
                                                $check = DB::table('users')->where('role_id',2)->where('email',$email)->first();
                                                $check_phone = DB::table('users')->where('role_id',2)->where('phone',$request->phone)->first();
                                                if($check == null && $check_phone == null){
                                                    $customers_id = DB::table('users')
                                                            ->insertGetId([
                                                                'role_id' => 2,
                                                                'email' => $email,
                                                                'password' => Hash::make('123456dfdfdf'),
                                                                'show_pass' => '123456dfdfdf',
                                                                'first_name' => $request->firstname,
                                                                'last_name' => $request->lastname,
                                                                'phone' => $request->phone,
                                                                'country_code' => $request->countries_id,
                                                                'zone' => $request->zone_id
                                                        ]);
                                                    session(['customers_id' => $customers_id]);
                                                    if(auth()->guard('customer')->attempt(['email' => $request->email, 'password' => '123456dfdfdf'])){
                                                        $res['auth'] = "true";
                                                        $customer = auth()->guard('customer')->user();
                                                        //set session
                                                        session(['customers_id' => $customer->id]);
                                                    }
                                                }else{
                                                    $customers_id = $check->id;
                                                    $email = $check->email;
                                                    session(['customers_id' => $customers_id]);
                                                }
                                            }else{
                                                $customers_id = '';
                                                $email = $request->email;
                                                session(['customers_id' => $customers_id]);
                                            }
					}else{
						$customers_id            				=   auth()->guard('customer')->user()->id;
						$email            						=  auth()->guard('customer')->user()->email;
					}
                                        $delivery_firstname = $request->firstname;
                                        $delivery_lastname = $request->lastname;
                                        if($request->ship_to_different=='on'){
                                            $delivery_company = $request->shipping_company;
                                            $delivery_street_address = $request->shipping_address;
                                            $delivery_suburb = '';
                                            $delivery_city = $request->shipping_city;
                                            $delivery_postcode = $request->shipping_postcode;
                                            $delivery_phone = $request->shipping_phone;

                                            $delivery = DB::table('zones')->where('zone_id', '=', $request->shipping_zone_id)->get();

                                            if(count($delivery)>0){
                                                    $delivery_state            				=   $delivery[0]->zone_name;
                                            }else{
                                                    $delivery_state            				=   'other';
                                            }

                                            $country = DB::table('countries')->where('countries_id','=', $request->shipping_countries_id)->get();

                                            $delivery_country            			=   $country[0]->countries_name;
                                        }else{
                                            $delivery_company = $request->company;
                                            $delivery_street_address = $request->address;
                                            $delivery_suburb = '';
                                            $delivery_city = $request->city;
                                            $delivery_postcode = $request->postcode;
                                            $delivery_phone = $request->phone;

                                            $delivery = DB::table('zones')->where('zone_id', '=', $request->zone_id)->get();

                                            if(count($delivery)>0){
                                                    $delivery_state            				=   $delivery[0]->zone_name;
                                            }else{
                                                    $delivery_state            				=   'other';
                                            }

                                            $country = DB::table('countries')->where('countries_id','=', $request->countries_id)->get();

                                            $delivery_country            			=   $country[0]->countries_name;
                                        }

					$billing_firstname            			=   $request->firstname;
					$billing_lastname            			=   $request->lastname;
					$billing_street_address            		=   $request->address;
					$billing_suburb	            			=   '';
					$billing_city            				=   $request->city;
					$billing_postcode            			=   $request->postcode;
					$billing_phone            				=   $request->phone;
					$billing_company            				=   $request->company;

//					if(!empty($request->company)){
//						$billing_company 						=	$request->company;
//					}

					$billing = DB::table('zones')->where('zone_id', '=', $request->zone_id)->get();

					if(count($billing)>0){
						$billing_state            			=   $billing[0]->zone_name;
					}else{
						$billing_state         				=   'other';
					}

					$country = DB::table('countries')->where('countries_id','=', $request->countries_id)->get();

					$billing_country            			=   $country[0]->countries_name;

					$payment_method            				=   $request->payment_method;
					$order_information 						=	array();

					if(isset($request->cc_type) && !empty($request->cc_type)){
						$cc_type            				=   $request->cc_type;
						$cc_owner            				=   $request->cc_owner;
						$cc_number            				=   $request->cc_number;
						$cc_expires            				=   $request->cc_expires;
					}else{
						$cc_type            				=   '';
						$cc_owner            				=   '';
						$cc_number            				=   '';
						$cc_expires            				=   '';
					}

					$last_modified            			=   date('Y-m-d H:i:s');
					$date_purchased            			=   date('Y-m-d H:i:s');

					//price
					if(isset($shipping_methods[0]['services'][0]['rate'])){
						$shipping_cost = $shipping_methods[0]['services'][0]['rate'];
						$shipping_method = $shipping_methods[0]['services'][0]['shipping_method'];
					}else{
						$shipping_cost = 0;
                                                $shipping_method = '';
					}
                                        $tax_rate = DB::table('tax_rates')->where('tax_zone_id',$request->zone_id)->first();
                                        if(!empty($tax_rate)){
                                            $tax_rate = (session('products_price')*$tax_rate->tax_rate)/100;
                                        }else{
                                            $tax_rate = 0;
                                        }
					//$tax_rate = number_format((float)session('tax_rate'), 2, '.', '');
					$order_price = (session('products_price')+$tax_rate+$shipping_cost);
//echo $order_price; die;
					//$shipping_cost            			=   0;
					//$shipping_method            		=   'Flat Rate';
					$orders_status            			=   '1';
					//$orders_date_finished            	=   $request->orders_date_finished;

					if(!empty($request->notes)){
						$comments						=	$request->notes;
					}else{
						$comments            			=   '';
					}

					$web_setting = DB::table('settings')->get();
					$currency            				=   $web_setting[19]->value;
					//$total_tax		=	number_format((float)session('tax_rate'), 2, '.', '');
					$total_tax		=	$tax_rate;
					$products_tax 						= 	1;

					$coupon_amount = 0;
					if(!empty(session('coupon')) and count(session('coupon'))>0){

						$code = array();
						$exclude_product_ids = array();
						$product_categories = array();
						$excluded_product_categories = array();
						$exclude_product_ids = array();

						//$coupon_amount    =		number_format((float)session('coupon_discount'), 2, '.', '')+0;

						foreach(session('coupon') as $coupons_data){
                                                    //update coupans
                                                    $coupon_id = DB::statement("UPDATE `coupons` SET `used_by`= CONCAT(used_by,',$customers_id') WHERE `code` = '".$coupons_data->code."'");
                                                    if($coupons_data->discount_type=='percent'){
                                                        $coupon_amount = (session('products_price')*$coupons_data->amount)/100;
                                                        //$coupon_amount += number_format((float)$discount, 2, '.', '')+0;
                                                    }if($coupons_data->discount_type=='fixed_cart'){
                                                        $coupon_amount = $coupons_data->amount;
                                                        //$coupon_amount += number_format((float)$discount, 2, '.', '')+0;
                                                    }
						}
						$code = json_encode(session('coupon'));
                                                $order_price = $order_price-$coupon_amount;
					}else{
						$code            					=   '';
						$coupon_amount            			=   '';
					}
//echo $coupon_amount; die;
					//payment methods
					if($payment_method == 'braintree'){
					      	$payments_setting = $this->payments_setting_for_brain_tree();

									//braintree transaction with nonce
									$is_transaction  = '1'; 			# For payment through braintree
									$nonce    		 =   $request->payment_method_nonce;

									if($payments_setting['merchant_id']->environment == '0'){
										$braintree_environment = 'sandbox';
									}else{
										$braintree_environment = 'production';
									}

									$braintree_merchant_id = $payments_setting['merchant_id']->value;
									$braintree_public_key  = $payments_setting['public_key']->value;
									$braintree_private_key = $payments_setting['private_key']->value;

									//brain tree credential
									require_once app_path('braintree/Braintree.php');

									if ($result->success)
									{

									if($result->transaction->id)
										{
											$order_information = array(
												'braintree_id'=>$result->transaction->id,
												'status'=>$result->transaction->status,
												'type'=>$result->transaction->type,
												'currencyIsoCode'=>$result->transaction->currencyIsoCode,
												'amount'=>$result->transaction->amount,
												'merchantAccountId'=>$result->transaction->merchantAccountId,
												'subMerchantAccountId'=>$result->transaction->subMerchantAccountId,
												'masterMerchantAccountId'=>$result->transaction->masterMerchantAccountId,
												//'orderId'=>$result->transaction->orderId,
												'createdAt'=>time(),
						//						'updatedAt'=>$result->transaction->updatedAt->date,
												'token'=>$result->transaction->creditCard['token'],
												'bin'=>$result->transaction->creditCard['bin'],
												'last4'=>$result->transaction->creditCard['last4'],
												'cardType'=>$result->transaction->creditCard['cardType'],
												'expirationMonth'=>$result->transaction->creditCard['expirationMonth'],
												'expirationYear'=>$result->transaction->creditCard['expirationYear'],
												'customerLocation'=>$result->transaction->creditCard['customerLocation'],
												'cardholderName'=>$result->transaction->creditCard['cardholderName']
											);

											$payment_status = "success";
										}
									}
									else
										{
											$payment_status = "failed";
										}

					}
					else if($payment_method == 'stripe'){				#### stipe payment

									//require file
									require_once app_path('stripe/config.php');

									//get token from app
									$token  = $request->token;

									$customer = \Stripe\Customer::create(array(
									  'email' => $email,
									  'source'  => $token
									));

									$charge = \Stripe\Charge::create(array(
									  'customer' => $customer->id,
									  'amount'   => 100*$order_price,
									  'currency' => 'usd'
									));

									 if($charge->paid == true){
										 $order_information = array(
												'paid'=>'true',
												'transaction_id'=>$charge->id,
												'type'=>$charge->outcome->type,
												'balance_transaction'=>$charge->balance_transaction,
												'status'=>$charge->status,
												'currency'=>$charge->currency,
												'amount'=>$charge->amount,
												'created'=>date('d M,Y', $charge->created),
												'dispute'=>$charge->dispute,
												'customer'=>$charge->customer,
												'address_zip'=>$charge->source->address_zip,
												'seller_message'=>$charge->outcome->seller_message,
												'network_status'=>$charge->outcome->network_status,
												'expirationMonth'=>$charge->outcome->type
											);

											$payment_status = "success";

									 }else{
											$payment_status = "failed";
									 }

					}
					else if($payment_method == 'cash_on_delivery'){
						$payments_setting = $this->payments_setting_for_cod();
						$payment_method = $payments_setting->name;
						$payment_status='success';
					}
					else if($payment_method == 'paypal'){
							$paypal_description = $this->payments_setting_for_paypal();
							$payment_method = $payments_setting['id']->name;
							$payment_status='success';
							$order_information = json_decode($request->nonce, JSON_UNESCAPED_SLASHES);
					}
					else if($payment_method == 'instamojo'){
						$instamojo =  $this->payments_setting_for_instamojo();
						$payment_method = $instamojo['auth_token']->name;
						$payment_status='success';
						$order_information = $request->nonce;
					}
					else if($payment_method == 'hyperpay'){
						$hyperpay =$this->payments_setting_for_hyperpay();
						$payment_method = $hyperpay['userid']->name;
						$payment_status='success';
						$order_information = session('paymentResponseData');
					}
					//check if order is verified
					if($payment_status=='success'){
										$orders_id = DB::table('orders')->insertGetId(
											[	 'customers_id' => $customers_id,
												 'customers_name'  => $delivery_firstname.' '.$delivery_lastname,
												 'customers_street_address' => $delivery_street_address,
												 'customers_suburb'  =>  $delivery_suburb,
												 'customers_city' => $delivery_city,
												 'customers_postcode'  => $delivery_postcode,
												 'customers_state' => $delivery_state,
												 'customers_country'  =>  $delivery_country,
												 //'customers_telephone' => $customers_telephone,
												 'email'  => $email,
												// 'customers_address_format_id' => $delivery_address_format_id,

												 'delivery_name'  =>  $delivery_firstname.' '.$delivery_lastname,
												 'delivery_street_address' => $delivery_street_address,
												 'delivery_suburb'  => $delivery_suburb,
												 'delivery_city' => $delivery_city,
												 'delivery_postcode'  =>  $delivery_postcode,
												 'delivery_state' => $delivery_state,
												 'delivery_country'  => $delivery_country,
												 'delivery_company'  => $delivery_company,
												// 'delivery_address_format_id' => $delivery_address_format_id,

												 'billing_name'  => $billing_firstname.' '.$billing_lastname,
												 'billing_street_address' => $billing_street_address,
												 'billing_suburb'  =>  $billing_suburb,
												 'billing_city' => $billing_city,
												 'billing_postcode'  => $billing_postcode,
												 'billing_state' => $billing_state,
												 'billing_country'  =>  $billing_country,
												 'billing_company'  =>  $billing_company,
												 //'billing_address_format_id' => $billing_address_format_id,

												 'payment_method'  =>  $payment_method,
												 'cc_type' => $cc_type,
												 'cc_owner'  => $cc_owner,
												 'cc_number' =>$cc_number,
												 'cc_expires'  =>  $cc_expires,
												 'last_modified' => $last_modified,
												 'date_purchased'  => $date_purchased,
												 'order_price'  => $order_price,
												 'shipping_cost' =>$shipping_cost,
												 'shipping_method'  =>  $shipping_method,
												// 'orders_status' => $orders_status,
												 //'orders_date_finished'  => $orders_date_finished,
												 'currency'  =>  $currency,
												 'order_information' => 	json_encode($order_information),
												 'coupon_code'		 =>		$code,
												 'coupon_amount' 	 =>		$coupon_amount,
											 	 'total_tax'		 =>		$total_tax,
												 'ordered_source' 	 => 	'1',
												 'delivery_phone'	 =>	 	$delivery_phone,
												 'billing_phone'	 =>	 	$billing_phone,
											]);

										 //orders status history
										 $orders_history_id = DB::table('orders_status_history')->insertGetId(
											[	 'orders_id'  => $orders_id,
												 'orders_status_id' => $orders_status,
												 'date_added'  => $date_added,
												 'customer_notified' =>'1',
												 'comments'  =>  $comments
											]);


										 //$cart = $cart->myCart(array());
//echo '<pre>';
//print_r($cart);
//die;
                                                                                 //die('123');
										 foreach($result['cart'] as $products){
                                                                                     //die;
											//get products info
											$orders_products_id = DB::table('orders_products')->insertGetId(
												[
													 'orders_id' 		 => 	$orders_id,
													 'products_id' 	 	 =>		$products->products_id,
													 'products_name'	 => 	$products->products_name,
													 'products_price'	 =>  	$products->price,
													 'final_price' 		 =>  	$products->final_price*$products->customers_basket_quantity,
													 'products_tax' 	 =>  	$products_tax,
													 'products_quantity'     =>  	$products->customers_basket_quantity,
													 'type'                  =>  	$products->type,
												]);

											$inventory_ref_id = DB::table('inventory')->insertGetId([
													'products_id'   		=>   $products->products_id,
													'reference_code'  		=>   '',
													'stock'  				=>   $products->customers_basket_quantity,
													'admin_id'  			=>   0,
													'added_date'	  		=>   time(),
													'purchase_price'  		=>   0,
													'stock_type'  			=>   'out',
												]);
                     if(Session::get('guest_checkout') == 1){
											 DB::table('customers_basket')->where('session_id',Session::getId())->where('products_id',$products->products_id)->update(['is_order'=>'1']);

										 }
										 else{
											 DB::table('customers_basket')->where('customers_id',$customers_id)->where('products_id',$products->products_id)->update(['is_order'=>'1']);

										 }

											if(!empty($products->attributes)){
												foreach($products->attributes as $attribute){
													DB::table('orders_products_attributes')->insert(
													[
														 'orders_id' => $orders_id,
														 'products_id'  => $products->products_id,
														 'orders_products_id'  => $orders_products_id,
														 'products_options' =>$attribute->attribute_name,
														 'products_options_values'  =>  $attribute->attribute_value,
														 'options_values_price'  =>  $attribute->values_price,
														 'price_prefix'  =>  $attribute->prefix
													]);

													DB::table('inventory_detail')->insert([
														'inventory_ref_id'  =>   $inventory_ref_id,
														'products_id'  		=>   $products->products_id,
														'attribute_id'		=>   $attribute->products_attributes_id,
													]);
												}
											}

										 }

										$responseData = array('success'=>'1', 'data'=>array(), 'message'=>"Order has been placed successfully.");

										//send order email to user
										$order = DB::table('orders')
											->LeftJoin('orders_status_history', 'orders_status_history.orders_id', '=', 'orders.orders_id')
											->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
											->where('orders.orders_id', '=', $orders_id)->orderby('orders_status_history.date_added', 'DESC')->get();

									//foreach
									foreach($order as $data){
										$orders_id	 = $data->orders_id;

										$orders_products = DB::table('orders_products')
											->join('products', 'products.products_id','=', 'orders_products.products_id')
											->select('orders_products.*', 'products.products_image as image')
											->where('orders_products.orders_id', '=', $orders_id)->get();
											$i = 0;
											$total_price  = 0;
											$product = array();
											$subtotal = 0;
											foreach($orders_products as $orders_products_data){
												$product_attribute = DB::table('orders_products_attributes')
													->where([
														['orders_products_id', '=', $orders_products_data->orders_products_id],
														['orders_id', '=', $orders_products_data->orders_id],
													])
													->get();

												$orders_products_data->attribute = $product_attribute;
												$product[$i] = $orders_products_data;
												//$total_tax	 = $total_tax+$orders_products_data->products_tax;
												$total_price = $total_price+$orders_products[$i]->final_price;
												$subtotal += $orders_products[$i]->final_price;
												$i++;
											}

										$data->data = $product;
										$orders_data[] = $data;
									}

										$orders_status_history = DB::table('orders_status_history')
											->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
											->orderBy('orders_status_history.date_added', 'desc')
											->where('orders_id', '=', $orders_id)->get();

										$orders_status = DB::table('orders_status')->get();

										$ordersData['orders_data']		 	 	=	$orders_data;
										$ordersData['total_price']  			=	$total_price;
										$ordersData['orders_status']			=	$orders_status;
										$ordersData['orders_status_history']    =	$orders_status_history;
										$ordersData['subtotal']    				=	$subtotal;

										//notification/email
										$myVar = new AlertController();
										$alertSetting = $myVar->orderAlert($ordersData);

										if(session('step')=='4'){
											session(['step' => array()]);
										}

										session(['paymentResponseData'=>'']);
										session(['paymentResponse'=>'']);

										//change status of cart products
										if(Session::get('guest_checkout') == 1){
											DB::table('customers_basket')->where('session_id',Session::getId())->update(['customers_id'=>Session::get('customers_id')]);
											DB::table('customers_basket')->where('session_id',Session::getId())->update(['is_order'=>'1']);
										}else{
										DB::table('customers_basket')->where('customers_id',auth()->guard('customer')->user()->id)->update(['is_order'=>'1']);
									  }
										return $payment_status;
					}
					else if($payment_status == "failed"){
						return $payment_status;
					}

	}

  public function orders($request){
          $index = new Index();
					$result = array();

					$result['commonContent'] = $index->commonContent();

					//orders
					if(Session::get('guest_checkout') == 1){
						$orders = DB::table('orders')->orderBy('date_purchased','DESC')->where('customers_id','=', Session::get('customers_id'))->get();
					}else{
						$orders = DB::table('orders')->orderBy('date_purchased','DESC')->where('customers_id','=', auth()->guard('customer')->user()->id)->get();
					}
					$index = 0;
					$total_price = array();

					foreach($orders as $orders_data){
						$orders_products = DB::table('orders_products')
							->select('final_price', DB::raw('SUM(final_price) as total_price'))
							->where('orders_id', '=' ,$orders_data->orders_id)
							->get();

						$orders[$index]->total_price = $orders_products[0]->total_price;

						$orders_status_history = DB::table('orders_status_history')
							->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
							->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
							->select('orders_status_description.orders_status_name', 'orders_status.orders_status_id')
							->where('orders_id', '=', $orders_data->orders_id)->where('orders_status_description.language_id',session('language_id'))->orderby('orders_status_history.orders_status_history_id', 'DESC')->limit(1)->get();

						$orders[$index]->orders_status_id = $orders_status_history[0]->orders_status_id;
						$orders[$index]->orders_status = $orders_status_history[0]->orders_status_name;
						$index++;

					}


					$result['orders'] = $orders;
					return $result;
		}

	public function viewOrder($request,$id){
			$index = new Index();

			$title = array('pageTitle' => Lang::get("website.View Order"));
			$result = array();
			$result['commonContent'] = $index->commonContent();

			//orders
			if(Session::get('guest_checkout') == 1){
			$orders = DB::table('orders')
			->orderBy('date_purchased','DESC')
			->where('orders_id','=',$id)->where('customers_id','=', Session::get('customers_id'))->get();
		}else{
			$orders = DB::table('orders')
			->orderBy('date_purchased','DESC')
			->where('orders_id','=',$id)->where('customers_id',auth()->guard('customer')->user()->id)->get();
		}
			if(count($orders)>0){
			$index = 0;
			foreach($orders as $orders_data){

				$orders_status_history = DB::table('orders_status_history')
					->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
					->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
					->select('orders_status_description.orders_status_name', 'orders_status.orders_status_id')
					->where('orders_id', '=', $orders_data->orders_id)
					->where('orders_status_description.language_id',session('language_id'))
					->orderby('orders_status_history.orders_status_history_id', 'DESC')
					->limit(1)
					->get();


				$products_array = array();
				$index2 = 0;
				$order_products = DB::table('orders_products')
					->join('products','products.products_id','=','orders_products.products_id')
					->join('image_categories','products.products_image','=','image_categories.image_id')
					->select('image_categories.path as image', 'products.products_model as model', 'orders_products.*')
					->where('orders_products.orders_id',$orders_data->orders_id)->groupBy('products.products_id')->get();

				foreach($order_products as $products){
					array_push($products_array,$products);
					$attributes = DB::table('orders_products_attributes')
					->where([['orders_id',$products->orders_id],['orders_products_id',$products->orders_products_id]])->get();
					if(count($attributes)==0){
						$attributes = $attributes;
					}

					$products_array[$index2]->attributes = $attributes;
					$index2++;

				}

				$orders_status_history = DB::table('orders_status_history')
					->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
					->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
					->select('orders_status_description.orders_status_name', 'orders_status.orders_status_id')
					->where('orders_id', '=', $orders_data->orders_id)
					->where('orders_status_description.language_id',session('language_id'))
					->orderby('orders_status_history.orders_status_history_id', 'DESC')
					->limit(1)->get();


				$orders[$index]->statusess = $orders_status_history;
				$orders[$index]->products = $products_array;
				$orders[$index]->orders_status_id = $orders_status_history[0]->orders_status_id;
				$orders[$index]->orders_status = $orders_status_history[0]->orders_status_name;
				$index++;

			}

				$result['orders'] = $orders;
				$result['res'] = "view-order";
				return  $result;
			}else{
				$result['res'] = "order";
				return "order";
			}
		}

	public function calculateTax($tax_zone_id){
		$cart = new Cart();

			$result = array();

			if($tax_zone_id== -1){
				$tax = 0;
			}else{

				$cart = $cart->myCart($result);

				$index = '0';
				$total_tax = '0';

				foreach($cart as $products_data){

					$final_price = $products_data->final_price;

					$products = DB::table('products')
						->LeftJoin('tax_rates', 'tax_rates.tax_class_id','=','products.products_tax_class_id')
						->where('tax_rates.tax_zone_id', $tax_zone_id)
						->where('products_id', $products_data->products_id)->get();

					if(count($products)>0){
						$tax_value = $products[0]->tax_rate/100*$final_price;
						$total_tax = $total_tax+$tax_value;
						$index++;
					}

				}

				if($total_tax>0){
					$tax = $total_tax;
				}else{
					$tax = '0';
				}
			}

			return $tax;

		}

  public function getOrders(){
			$orders =  DB::select(DB::raw('SELECT orders_id FROM orders WHERE YEARWEEK(CURDATE()) BETWEEN YEARWEEK(date_purchased) AND YEARWEEK(date_purchased)'));
	    return $orders;
	}

	public function allOrders(){
		$allOrders =  DB::table('orders')->get();
    return $allOrders;
	}

	public function mostOrders($orders_data){
		$mostOrdered = DB::table('orders_products')
						->select('orders_products.products_id')
						->where('orders_id', $orders_data->orders_id)
						->get();
		return $mostOrdered;
	}

	public function countCompare(){
		$count	= DB::table('compare')->where('customer_id',auth()->guard('customer')->user()->id)->count();
    return $count;
	}

	public function getPages($request){
		$pages = DB::table('pages')
					->leftJoin('pages_description','pages_description.page_id','=','pages.page_id')
					->where([['pages.status','1'],['type',2],['pages_description.language_id',session('language_id')],['pages.slug',$request->name]])
					->orwhere([['pages.status','1'],['type',2],['pages_description.language_id',1],['pages.slug',$request->name]])
					->get();
     return $pages;
	}

  public function payments_setting_for_brain_tree(){
		$payments_setting = DB::table('payment_methods_detail')
		->leftjoin('payment_description', 'payment_description.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->leftjoin('payment_methods', 'payment_methods.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->select('payment_methods_detail.*', 'payment_description.name', 'payment_methods.environment', 'payment_methods.status', 'payment_methods.payment_method')
		->where('language_id', session('language_id'))
		->where('payment_description.payment_methods_id',1)
		->orwhere('language_id', 1)
		->where('payment_description.payment_methods_id',1)
		->get()->keyBy('key');
		return $payments_setting;
	}

	public function payments_setting_for_stripe(){
		$payments_setting = DB::table('payment_methods_detail')
		->leftjoin('payment_description', 'payment_description.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->leftjoin('payment_methods', 'payment_methods.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->select('payment_methods_detail.*', 'payment_description.name', 'payment_methods.environment', 'payment_methods.status', 'payment_methods.payment_method')
		->where('language_id', session('language_id'))
		->where('payment_description.payment_methods_id',2)
		->orwhere('language_id', 1)
		->where('payment_description.payment_methods_id',2)
		->get()->keyBy('key');
		return $payments_setting;
	}

	public function payments_setting_for_cod(){
		$payments_setting = DB::table('payment_description')
		->leftjoin('payment_methods', 'payment_methods.payment_methods_id', '=', 'payment_description.payment_methods_id')
		->select('payment_description.name', 'payment_methods.environment', 'payment_methods.status', 'payment_methods.payment_method')
		->where('language_id', session('language_id'))
		->where('payment_description.payment_methods_id',4)
		->orwhere('language_id', 1)
		->where('payment_description.payment_methods_id',4)
		->first();
		return $payments_setting;
	}

	public function payments_setting_for_paypal(){
		$payments_setting = DB::table('payment_methods_detail')
		->leftjoin('payment_description', 'payment_description.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->leftjoin('payment_methods', 'payment_methods.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->select('payment_methods_detail.*', 'payment_description.name', 'payment_methods.environment', 'payment_methods.status', 'payment_methods.payment_method')
		->where('language_id', session('language_id'))
		->where('payment_description.payment_methods_id',3)
		->orwhere('language_id', 1)
		->where('payment_description.payment_methods_id',3)
		->get()->keyBy('key');
		return $payments_setting;
	}

	public function payments_setting_for_instamojo(){
		$payments_setting = DB::table('payment_methods_detail')
		->leftjoin('payment_description', 'payment_description.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->leftjoin('payment_methods', 'payment_methods.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->select('payment_methods_detail.*', 'payment_description.name', 'payment_methods.environment', 'payment_methods.status', 'payment_methods.payment_method')
		->where('language_id', session('language_id'))
		->where('payment_description.payment_methods_id',5)
		->orwhere('language_id', 1)
		->where('payment_description.payment_methods_id',5)
		->get()->keyBy('key');
		return $payments_setting;
	}

	public function payments_setting_for_hyperpay(){
		$payments_setting = DB::table('payment_methods_detail')
		->leftjoin('payment_description', 'payment_description.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->leftjoin('payment_methods', 'payment_methods.payment_methods_id', '=', 'payment_methods_detail.payment_methods_id')
		->select('payment_methods_detail.*', 'payment_description.name', 'payment_methods.environment', 'payment_methods.status', 'payment_methods.payment_method')
		->where('language_id', session('language_id'))
		->where('payment_description.payment_methods_id',6)
		->orwhere('language_id', 1)
		->where('payment_description.payment_methods_id',6)
		->get()->keyBy('key');
		return $payments_setting;
	}

	public function getCountries($countries_id){
		$countries = DB::table('countries')->where('countries_id','=',$countries_id)->get();
    return $countries;
	}

	public function getZones($zone_id){
		$zones = DB::table('zones')->where('zone_id','=',$zone_id)->get();
    return $zones;
	}

	public function getShippingMethods(){
		$shippings = DB::table('shipping_methods')->get();
    return $shippings;
	}

	public function getShippingDetail($shipping_methods){
		$shippings_detail = DB::table('shipping_description')->where('language_id',Session::get('language_id'))->where('table_name',$shipping_methods->table_name)
		->orwhere('language_id', 1)->where('table_name',$shipping_methods->table_name)->get();
    return $shippings_detail;
	}

	public function getUpsShipping(){
		$ups_shipping = DB::table('ups_shipping')->where('ups_id', '=', '1')->get();
    return $ups_shipping;
	}

	public function getUpsShippingRate(){
		$ups_shipping = DB::table('flate_rate')->where('id', '=', '1')->get();
    return $ups_shipping;
	}

	public function priceByWeight($weight){
		$priceByWeight = DB::table('products_shipping_rates')->where('weight_from','<=',$weight)->where('weight_to','>=',$weight)->get();
    return $priceByWeight;
	}

	public function braintreeDescription(){
		$braintree_description = DB::table('payment_description')->where([['payment_name','Braintree'],['language_id',Session::get('language_id')]])
		->orwhere([['payment_name','Braintree'],['language_id',1]])->get();
    return $braintree_description;
	}

	public function stripeDescription(){
		$stripe_description = DB::table('payment_description')->where([['payment_name','Stripe'],['language_id',Session::get('language_id')]])
		->orwhere([['payment_name','Stripe'],['language_id',1]])->get();
		return $stripe_description;
	}

	public function codDescription(){
		$cod_description = DB::table('payment_description')->where([['payment_name','Cash On Delivery'],['language_id',Session::get('language_id')]])
		->orwhere([['payment_name','Cash On Delivery'],['language_id',1]])->get();
    return $cod_description;
	}

	public function paypalDescription(){
		$paypal_description = DB::table('payment_description')->where([['payment_name','Paypal'],['language_id',Session::get('language_id')]])
		->orwhere([['payment_name','Paypal'],['language_id',1]])->get();
    return $paypal_description;
	}

	public function instamojoDescription(){
		$instamojo_description = DB::table('payment_description')->where([['payment_name','Instamojo'],['language_id',Session::get('language_id')]])
		->orwhere([['payment_name','Instamojo'],['language_id',1]])->get();
    return $instamojo_description;
	}

	public function hyperpayDescription(){
		$hyperpay_description = DB::table('payment_description')->where([['payment_name','hyperpay'],['language_id',Session::get('language_id')]])
		->orwhere([['payment_name','hyperpay'],['language_id',1]])->get();
    return $hyperpay_description;
	}

	public function ordersCheck($request){
		if(Session::get('guest_checkout') == 1){
		$ordersCheck = DB::table('orders')->where(['customers_id' => Session::get('customers_id')], ['orders_id'=>$request->orders_id])->get();
	  }
		else{
			$ordersCheck = DB::table('orders')->where(['customers_id'=>auth()->guard('customer')->user()->id], ['orders_id'=>$request->orders_id])->get();
		}
    return $ordersCheck;
	}

	public function InsertOrdersCheck($request,$date_added,$comments){
		$orders_history_id = DB::table('orders_status_history')->insertGetId(
			[	 'orders_id'  => $request->orders_id,
				 'orders_status_id' => $request->orders_status_id,
				 'date_added'  => $date_added,
				 'customer_notified' =>'1',
				 'comments'  =>  $comments
			]);
			return $orders_history_id;
	}

//shipping methods
	public function shipping_methods(){

		$result		  = array();
		if(!empty(session('shipping_address'))){
			$countries_id = session('shipping_address')->countries_id;
			$toPostalCode = session('shipping_address')->postcode;
			$toCity		  = session('shipping_address')->city;
			$toAddress	  = 'gh';
			$countries = $this->order->getCountries($countries_id);
			$toCountry = $countries[0]->countries_iso_code_2;
			$zone_id = session('shipping_address')->zone_id;
			if($zone_id != -1 and !empty($zone_id)){
				$zones =  $this->order->getZones($zone_id);
				$toState = $zones[0]->zone_code;
			}
		}else{
			$countries_id = '';
			$toPostalCode = '';
			$toCity		  = '';
			$toAddress	  = '';
			$toCountry = '';
			$zone_id = '';
		}
                $cart = new Cart();
                $result = array();
		//product weight
		$cart = $cart->myCart($result);
//echo '<pre>';
//print_r($cart);
//die;
		$index = '0';
		$total_weight = '0';

		foreach($cart as $products_data){
			if($products_data->unit=='Gram'){
				$productsWeight = $products_data->weight/453.59237;
			}else if($products_data->unit=='Kilogram'){
				$productsWeight = $products_data->weight/0.45359237;
			}else{
				$productsWeight = $products_data->weight;
			}

			$total_weight+=$productsWeight;
		}

		$products_weight = $total_weight;


		//website path
		//$websiteURL =  "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		$websiteURL =  "https://" . $_SERVER['SERVER_NAME'].'/';
		$replaceURL = str_replace('getRate','', $websiteURL);
		$requiredURL = $replaceURL.'app/ups/ups.php';

		//default shipping method
		$shippings = $this->getShippingMethods();
		$result = array();
		$mainIndex = 0;
		foreach($shippings as $shipping_methods){
			//dd($shipping_methods);

			$shippings_detail = $this->getShippingDetail($shipping_methods);

			//ups shipping rate
			if($shipping_methods->methods_type_link == 'upsShipping' and $shipping_methods->status == '1'){

				$result2= array();
				$is_transaction = '0';

				$ups_shipping = $this->getUpsShipping();

				//shipp from and all credentials
				$accessKey  = $ups_shipping[0]->access_key;
				$userId 	= $ups_shipping[0]->user_name;
				$password 	= $ups_shipping[0]->password;

				//ship from address
				$fromAddress  = $ups_shipping[0]->address_line_1;
				$fromPostalCode  = $ups_shipping[0]->post_code;
				$fromCity  = $ups_shipping[0]->city;
				$fromState  = $ups_shipping[0]->state;
				$fromCountry  = $ups_shipping[0]->country;

				//production or test mode
				if($ups_shipping[0]->shippingEnvironment == 1){ 			#production mode
					$useIntegration = true;
				}else{
					$useIntegration = false;								#test mode
				}

				$serviceData = explode(',',$ups_shipping[0]->serviceType);

				$index = 0;
				foreach($serviceData as $value){
					if($value == "US_01")
					{
						$name = Lang::get('website.Next Day Air');
						$serviceTtype = "1DA";
					}
					else if ($value == "US_02")
					{
						$name = Lang::get('website.2nd Day Air');
						$serviceTtype = "2DA";
					}
						else if ($value == "US_03")
					{
						$name = Lang::get('website.Ground');
						$serviceTtype = "GND";
					}
					else if ($value == "US_12")
					{
						$name = Lang::get('website.3 Day Select');
						$serviceTtype = "3DS";
					}
					else if ($value == "US_13")
					{
						$name = Lang::get('website.Next Day Air Saver');
						$serviceTtype = "1DP";
					}
					else if ($value == "US_14")
					{
						$name = Lang::get('website.Next Day Air Early A.M.');
						$serviceTtype = "1DM";
					}
					else if ($value == "US_59")
					{
						$name = Lang::get('website.2nd Day Air A.M.');
						$serviceTtype = "2DM";
					}
					else if($value == "IN_07")
					{
						$name = Lang::get('website.Worldwide Express');
						$serviceTtype = "UPSWWE";
					}
					else if ($value == "IN_08")
					{
						$name = Lang::get('website.Worldwide Expedited');
						$serviceTtype = "UPSWWX";
					}
					else if ($value == "IN_11")
					{
						$name = Lang::get('website.Standard');
						$serviceTtype = "UPSSTD";
					}
					else if ($value == "IN_54")
					{
						$name = Lang::get('website.Worldwide Express Plus');
						$serviceTtype = "UPSWWEXPP";
					}

				$some_data = array(
					'access_key' => $accessKey,  						# UPS License Number
					'user_name' => $userId,								# UPS Username
					'password' => $password, 							# UPS Password
					'pickUpType' => '03',								# Drop Off Location
					'shipToPostalCode' => $toPostalCode, 				# Destination  Postal Code
					'shipToCountryCode' => $toCountry,					# Destination  Country
					'shipFromPostalCode' => $fromPostalCode, 			# Origin Postal Code
					'shipFromCountryCode' => $fromCountry,				# Origin Country
					'residentialIndicator' => 'IN', 					# Residence Shipping and for commercial shipping "COM"
					'cServiceCodes' => $serviceTtype, 					# Sipping rate for UPS Ground
					'packagingType' => '02',
					'packageWeight' => $productsWeight
				  );

				  $curl = curl_init();
				  // You can also set the URL you want to communicate with by doing this:
				  // $curl = curl_init('http://localhost/echoservice');

				  // We POST the data
				  curl_setopt($curl, CURLOPT_POST, 1);
				  // Set the url path we want to call
				  curl_setopt($curl, CURLOPT_URL, $requiredURL);
				  // Make it so the data coming back is put into a string
				  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				  // Insert the data
				  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

				  // You can also bunch the above commands into an array if you choose using: curl_setopt_array

				  // Send the request
				  $rate = curl_exec($curl);
				  // Free up the resources $curl is using
				  curl_close($curl);

				 if (is_numeric($rate)){
					$success = array('success'=>'1', 'message'=>"Rate is returned.", 'name'=>$shippings_detail[0]->name, 'is_default'=>$shipping_methods->isDefault);
					$result2[$index] = array('name'=>$name,'rate'=>$rate,'currencyCode'=>'USD','shipping_method'=>'upsShipping');
					$index++;
				 }
				 else{
					$success = array('success'=>'0','message'=>"Selected regions are not supported for UPS shipping", 'name'=>$shippings_detail[0]->name);
				 }
				  $success['services'] = $result2;
				}
				$result[$mainIndex] = $success;
				$mainIndex++;


			}else if($shipping_methods->methods_type_link == 'flateRate' and $shipping_methods->status == '1'){
				$ups_shipping = $this->getUpsShippingRate();
				$data2 =  array('name'=>$shippings_detail[0]->name,'rate'=>$ups_shipping[0]->flate_rate,'currencyCode'=>$ups_shipping[0]->currency,'shipping_method'=>'flateRate');
				if(count($ups_shipping)>0){
					$success = array('success'=>'1', 'message'=>"Rate is returned.", 'name'=>$shippings_detail[0]->name, 'is_default'=>$shipping_methods->isDefault);
					$success['services'][0] = $data2;
					$result[$mainIndex] = $success;
				 	$mainIndex++;
				}


			}else if($shipping_methods->methods_type_link == 'localPickup' and $shipping_methods->status == '1') {

				$data2 =  array('name'=>$shippings_detail[0]->name, 'rate'=>'0', 'currencyCode'=>'USD', 'shipping_method'=>'localPickup');
				$success = array('success'=>'1', 'message'=>"Rate is returned.", 'name'=>$shippings_detail[0]->name, 'is_default'=>$shipping_methods->isDefault);
				$success['services'][0] = $data2;
				$result[$mainIndex] = $success;
				$mainIndex++;

			}else if($shipping_methods->methods_type_link == 'freeShipping'  and $shipping_methods->status == '1'){

				$data2 =  array('name'=>$shippings_detail[0]->name,'rate'=>'0','currencyCode'=>'USD','shipping_method'=>'freeShipping');
				$success = array('success'=>'1', 'message'=>"Rate is returned.", 'name'=>$shippings_detail[0]->name, 'is_default'=>$shipping_methods->isDefault);
				$success['services'][0] = $data2;
				$result[$mainIndex] = $success;
				$mainIndex++;
			}else if($shipping_methods->methods_type_link == 'shippingByWeight'  and $shipping_methods->status == '1'){

				//cart data
				//$carts = $cart->myCart('');

				$weight = 0;
				foreach($cart as $carts){
					$weight += $carts->weight*$carts->customers_basket_quantity;
				}

				//check price by weight
				$priceByWeight = $this->priceByWeight($weight);

				if(!empty($priceByWeight) and count($priceByWeight)>0 ){
					$price = $priceByWeight[0]->weight_price;
				}else{
					$price = 0;
				}

				$data2 =  array('name'=>$shippings_detail[0]->name,'rate'=>$price,'currencyCode'=>'USD','shipping_method'=>'Shipping By Weight');
				$success = array('success'=>'1', 'message'=>"Rate is returned.", 'name'=>$shippings_detail[0]->name, 'is_default'=>$shipping_methods->isDefault);
				$success['services'][0] = $data2;
				$result[$mainIndex] = $success;
				$mainIndex++;
			}
		}

		return $result;
	}
}