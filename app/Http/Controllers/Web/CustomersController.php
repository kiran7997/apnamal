<?php
namespace App\Http\Controllers\Web;
use App\User;
use Socialite;
use Validator;
use Services;
use File;
use App\Http\Controllers\Web\AlertController;
use Illuminate\Contracts\Auth\Authenticatable;
use Hash;
use DB;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon;
use Illuminate\Support\Facades\Redirect;
use Session; 
use Lang;
use URL;
use Illuminate\Support\Facades\Mail;
use App\Models\Web\Index;
use App\Models\Web\Languages;
use App\Models\Web\Products;
use App\Models\Web\Currency;
use App\Models\Web\Customer;
use Razorpay\Api\Api;


class CustomersController extends Controller
{

	public function __construct(
		                  Index $index,
											Languages $languages,
											Products $products,
											Currency $currency,
											Customer $customer
											)
	{
		$this->index = $index;
		$this->languages = $languages;
		$this->products = $products;
		$this->currencies = $currency;
		$this->customer = $customer;
		$this->theme = new ThemeController();
	}

	public function signup(Request $request){
		if(auth()->guard('customer')->check()){
			return redirect('/');
		}
		else{
			$title = array('pageTitle' => Lang::get("website.Sign Up"));
			$result = array();
			$result['commonContent'] = $this->index->commonContent();
                        $countries = DB::table('countries')->get();
                        $zones = DB::table('zones')->where('zone_country_id',223)->get();
			return view("auth.register", ['title' => $title])->with('result', $result)->with('countries', $countries)->with('zones', $zones);
		}
	}

	public function address(Request $request) {
            if (!auth()->guard('customer')->check()) {
                return redirect('/');
            } else {
                $title = array('pageTitle' => Lang::get("website.Sign Up"));
                $addresses = DB::table('orders')->where('customers_id',auth()->guard('customer')->user()->id)->orderby('orders_id','asc')->get();
                return view("web.address", ['title' => $title])->with('addresses', $addresses);
            }
        }

	public function membership(Request $request) {
            if (!auth()->guard('customer')->check()) {
                return redirect('/login')->with('loginError','You need to login first.');
            } else {
                $books = DB::table('products')
                            ->join('products_description','products.products_id','=','products_description.products_id')
                            ->where('products.products_status',1)
                            ->get();
                $zones = DB::table('zones')->where('zone_country_id',99)->get();
                return view("web.membership")->with('zones', $zones)->with('books', $books);
            }
        }

	public function membershipProcess(Request $request) {
            if (!auth()->guard('customer')->check()) {
                return redirect('/login')->with('loginError','You need to login first.');
            } else {
//                echo '<pre>';
//                print_r($request->all());
//                die;
                $data = $request->except(array('_token'));
                $rule = array(
                    'name' => 'required',
                    'email' => 'required',
                    'mobile' => 'required',
                    'address1' => 'required',
                    'phone' => 'required',
                    'zone_id' => 'required',
                    'city' => 'required',
                    'pincode' => 'required',
                    'member_type' => 'required',
                    'book' => 'required',
                    'months' => 'required',
                    'avail_prime' => 'required',
                    'magazines' => 'required',
                    'how_to_find' => 'required'
                );
                $validator = \Validator::make($data, $rule);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->messages())->withInput();
                }
             //   print_r($request->member_type); die;
                
                if($request->member_type==1){
                    if(empty($request->prime_membership_plan)){
                        return redirect()->back()->withErrors('Please select books for Prime Membership Plans')->withInput();
                    }else{
                        $membership_plan = $request->prime_membership_plan;
                    }
                }elseif($request->member_type==2){
                    if(empty($request->pro_membership_plan)){
                        return redirect()->back()->withErrors('Please select books for Pro Membership Plans')->withInput();
                    }else{
                        $membership_plan = $request->pro_membership_plan;
                    }
                }
                if($request->member_type == 1){
                    $amount = 200;
                } else {
                    $amount = 100;
                }
                
                
              //  $membership_plan = 1;
                $membership = DB::table('membership')->insertGetId([
                    'user_id' => auth()->guard('customer')->user()->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'address1' => $request->address1,
                    'address2' => $request->address2,
                    'phone' => $request->phone,
                    'zone_id' => $request->zone_id,
                    'city' => $request->city,
                    'pincode' => $request->pincode,
                    'member_type' => $request->member_type,
                  //  'member_type' => 1,
                    'membership_plan' => $membership_plan,
                    'book' => $request->book,
                    'months' => $request->months,
                    'avail_prime' => $request->avail_prime,
                    'magazines' => $request->magazines,
                    'how_to_find' => $request->how_to_find,
                    'amount' => $amount,
                ]);
                
              //  $insert = DB::table('membership')->insert($membership);
             //  print_r($membership); die;
                Session::forget('user_id');
                Session::put('user_id',auth()->guard('customer')->user()->id);
                Session::forget('order_id');
                Session::put('order_id',$membership);
                Session::forget('amount');
                Session::put('amount',$amount);
                return redirect('razorpay');
             //   return redirect()->back()->with('success', ' Thank you for your membership. We will contact with you soon.');
            }
        }
        
        public function razorpay(Request $request)
        {
            $user_id = Session::get('user_id');
            $order_id = Session::get('order_id');
            $amount = Session::get('amount');
            $user = DB::table('users')->where('id',$user_id)->first();
            $api_key = 'rzp_test_kCiHHv2r7jyvSe';
            $api_secret = '6U256nE9e4EPzcYCd2WlspLw';
            $api = new Api($api_key, $api_secret);
            
            $order = $api->order->create(array(  'receipt' => $order_id,  'amount' => $amount*100,  'payment_capture' => 0,  'currency' => 'INR'  ));
            DB::table('razorpay_res')->insert(array('order_id'=>$order['id'],'sale_id'=>$order_id,'status'=>'pending','type'=>'membership'));
            Session::forget('rorder_id');
            Session::put('rorder_id',$order['id']);
            $name = isset($user->name) ? $user->name : null;
            $email = isset($user->email) ? $user->email : null;
            $mobile = isset($user->phone) ? $user->phone : null;
            
            $params= array(
            "key_id" => $api_key,
            "order_id" => $order['id'],
            "name" => 'Library',
            "image" => 'http://library.getdemo.xyz/images/media/2020/10/WrqUR17712.png',
            "prefill[name]" => $name,
            "prefill[contact]" => $mobile,
            "prefill[email]" => $email,
            "callback_url" => URL::to('razorpay/success'),
            "cancel_url" => URL::to('razorpay/failure')
        );
        $url = 'https://api.razorpay.com/v1/checkout/embedded';
        $this->postCURL($url, $params);
        }
        
   public function postCURL($_url, $_param){
        $postData = '';
        //create name value pairs seperated by &
        foreach($_param as $k => $v)
        { 
          $postData .= $k . '='.$v.'&';
        }
        rtrim($postData, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, $postData);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $output=curl_exec($ch);
        curl_close($ch);
        echo $output;
    }
    
    public function razorpay_success(Request $request)
    {
        $_POST = $request->all();
        //  echo '<pre>';
       //  print_r($_POST); die;
       if(isset($_POST['error']) && $_POST['error']['code']=='BAD_REQUEST_ERROR'){
            $rorder_id = Session::get('rorder_id');
            $array=array(
                    'description'   => $_POST['error']['description'],
                    'source'   => $_POST['error']['source'],
                    'step'   => $_POST['error']['step'],
                    'reason'   => $_POST['error']['reason'],
                    'metadata'   => $_POST['error']['metadata'],
                    'status'   => 'failed',
                );
            DB::table('razorpay_res')->where('order_id',$rorder_id)->update($array);
            DB::table('membership')->where('id',Session::get('order_id'))->update(['payment_status'=>2]);
            return redirect('cancel')->withErrors("Payment Failed. Booking incompleted.");
        }
        $api_key = 'rzp_test_kCiHHv2r7jyvSe';
        $api_secret = '6U256nE9e4EPzcYCd2WlspLw';
        $api = new Api($api_key, $api_secret);
        $attributes  = array('razorpay_signature'  => $_POST['razorpay_signature'],  'razorpay_payment_id'  => $_POST['razorpay_payment_id'] ,  'razorpay_order_id' => $_POST['razorpay_order_id']);
        $order  = $api->utility->verifyPaymentSignature($attributes);
        $payment = $api->payment->fetch($_POST['razorpay_payment_id']);
        $array=array(
                'razorpay_payment_id'  => $payment['id'],
                'entity'       => $payment['entity'],
                'amount'   => $payment['amount']/100,
                'currency'   => $payment['currency'],
                'status'   => $payment['status'],
                'order_id'   => $payment['order_id'],
                'invoice_id'   => $payment['invoice_id'],
                'international'   => $payment['international'],
                'method'   => $payment['method'],
                'amount_refunded'   => $payment['amount_refunded'],
                'refund_status'   => $payment['refund_status'],
                'captured'   => $payment['captured'],
                'description'   => $payment['description'],
                'card_id'   => $payment['card_id'],
                'bank'   => $payment['bank'],
                'wallet'   => $payment['wallet'],
                'vpa'   => $payment['vpa'],
                'email'   => $payment['email'],
                'contact'   => $payment['contact'],
                'fee'   => $payment['fee'],
                'tax'   => $payment['tax'],
                'error_code'   => $payment['error_code'],
                'error_description'   => $payment['error_description'],
                'error_source'   => $payment['error_source'],
                'error_step'   => $payment['error_step'],
                'error_reason'   => $payment['error_reason'],
                'createdat'   => $payment['created_at'],
            );
        DB::table('razorpay_res')->where('order_id',$payment['order_id'])->update($array);
        $sale_id = DB::table('razorpay_res')->where('order_id',$payment['order_id'])->value('sale_id');
        DB::table('membership')->where('id',$sale_id)->update(['payment_status'=>1]);
        
        \Session::flash('flash_message', 'Thank you for your membership. We will contact with you soon!');
         return redirect('/thanks');
    }
    
     public function razorpay_failure(Request $request)
    {
        $rorder_id = Session::get('rorder_id');
        $array=array(
                'status'   => 'cancelled',
            );
         DB::table('razorpay_res')->where('order_id',$rorder_id)->update($array);
         $sale_id = DB::table('razorpay_res')->where('order_id',$rorder_id)->value('sale_id');
         DB::table('membership')->where('id',Session::get('order_id'))->update(['payment_status'=>3]);
         return redirect('/cancel')->withErrors("Payment Cancelled.");
    }
    
    public function thanks()
    {
        return view('web.thanks');
    }
    public function cancel()
    {
        return view('web.cancel');
    }

    public function vendor_registration(Request $request){
            if(auth()->guard('customer')->check()){
                    return redirect('/');
            }else{
                $title = array('pageTitle' => Lang::get("website.Sign Up"));
                $result = array();
                $result['commonContent'] = $this->index->commonContent();
                $countries = DB::table('countries')->where('countries_id',99)->get();
                $zones = DB::table('zones')->where('zone_country_id',99)->get();
                return view("auth.vendor_registration", ['title' => $title])->with('result', $result)->with('countries', $countries)->with('zones', $zones);
            }
	}

	public function login(Request $request){
		if(auth()->guard('customer')->check()){
			return redirect('/');
		}
		else{
			$previous_url = Session::get('_previous.url');

			$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
			$ref = rtrim($ref, '/');


			session(['previous'=> $previous_url]);

			$title = array('pageTitle' => Lang::get("website.Login"));

			$result = array();
			$result['commonContent'] = $this->index->commonContent();
                        $countries = DB::table('countries')->get();
                        $zones = DB::table('zones')->where('zone_country_id',223)->get();
			return view("auth.login", ['title'=>$title])->with('result', $result)->with('countries', $countries)->with('zones', $zones);
		}

	}

	public function get_zones(Request $request){
            $zones = DB::table('zones')->where('zone_country_id',$request->id)->get();
            if(count($zones)>0){
                foreach($zones as $zone){
                    echo '<option value='.$zone->zone_id.'>'.$zone->zone_name.'</option>';
                }
            }
	}

	public function processLogin(Request $request) {
            $old_session = Session::getId();
            $result = array();
            //check authentication of email and password
            $customerInfo = array("email" => $request->email, "password" => $request->password);
            if (auth()->guard('customer')->attempt($customerInfo)) {
                $customer = auth()->guard('customer')->user();
                if ($customer->role_id != 2) {
                    $record = DB::table('settings')->where('id', 94)->first();
                    if ($record->value == 'Maintenance' && $customer->role_id == 1) {
                        auth()->attempt($customerInfo);
                    } else {
                        Auth::guard('customer')->logout();
                        return redirect('login')->with('loginError', Lang::get("website.You Are Not Allowed With These Credentials!"));
                    }
                }
                if ($customer->user_type != 1) {
                    Auth::guard('customer')->logout();
                    return redirect('login')->with('loginError', Lang::get("website.You Are Not Allowed With These Credentials!"));
                }
                $result = $this->customer->processLogin($request, $old_session);
                if (!empty(session('previous'))) {
                    return Redirect::to(session('previous'));
                } else {
                    return redirect()->intended('/')->with('result', $result);
                }
            } else {
                return redirect('login')->with('loginError', Lang::get("website.Email or password is incorrect"));
            }
        }

    public function addToCompare(Request $request){
    $cartResponse = $this->customer->addToCompare($request);
		return $cartResponse;
	}

	public function DeleteCompare($id){
		$Response = $this->customer->DeleteCompare($id);
		return redirect()->back()->with($Response);
	}

	public function Compare(){
		$result = array();
		$final_theme = $this->theme->theme();
		$result['commonContent'] = $this->index->commonContent();
		$compare = $this->customer->Compare();
		$results = array();
		foreach($compare as $com){
			$data = array('products_id'=>$com->product_ids,'page_number'=>'0', 'type'=>'compare', 'limit'=>'15', 'min_price'=>'', 'max_price'=>'');
			$newest_products = $this->products->products($data);
			array_push($results,$newest_products);
		}
		$result['products'] = $results;
		return view('web.compare',['result' =>$result,'final_theme'=>$final_theme]);
	}

	public function profile(){
	    /*echo '<pre>';
	    print_r(auth()->guard('customer')->user()); die;*/
            $title = array('pageTitle' => Lang::get("website.Profile"));
            $result['commonContent'] = $this->index->commonContent();
            if(auth()->guard('customer')->user()->user_type==2){
                return view('web.vendor_profile', ['result' =>$result,'title' => $title]);
            }else{
                return view('web.profile', ['result' =>$result,'title' => $title]);
            }
	}

	public function vendor_dashboard(Request $request){
            $title = array('pageTitle' => Lang::get("website.Profile"));
            $result['commonContent'] = $this->index->commonContent();
            $from = $request->from;
            $to = $request->to;
        if(!empty($request->from)  &&  !empty($request->to)){
            $from = $request->from;
            $to =   $request->to;
            
            $products = DB::table('products')
                            ->join('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->join('products_description','products_description.products_id','=','products.products_id')
                            ->join('orders_products','products.products_id','=','orders_products.products_id')
                            ->join('orders','orders_products.orders_id','=','orders.orders_id')
                            ->whereBetween(DB::raw("(DATE_FORMAT(orders.date_purchased,'%Y-%m-%d'))"),[$from, $to])
                            ->where('products.vendor',auth()->guard('customer')->user()->id)
                            ->get();
                 //   echo '<pre>';
                 //   print_r($products); die;
            
                // $from = \Carbon\Carbon::createFromFormat('Y/m/d', $request->from)->format('Y-m-d');
               // $to = \Carbon\Carbon::createFromFormat('Y/m/d', $request->to)->format('Y-m-d');
        }else{
            $products = DB::table('products')
                            ->join('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->join('products_description','products_description.products_id','=','products.products_id')
                            ->join('orders_products','products.products_id','=','orders_products.products_id')
                            ->join('orders','orders_products.orders_id','=','orders.orders_id')
                            ->where('products.vendor',auth()->guard('customer')->user()->id)
                            ->get();
        }
            $recent_orders = DB::table('products')
                            ->join('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->join('products_description','products_description.products_id','=','products.products_id')
                            ->join('orders_products','products.products_id','=','orders_products.products_id')
                            ->join('orders','orders_products.orders_id','=','orders.orders_id')
                            ->where('products.vendor',auth()->guard('customer')->user()->id)
                            ->orderby('orders.date_purchased','desc')
                            ->take(5)
                            ->get();
            
//            echo '<pre>';
//            print_r($products);
//            die;
            return view('web.vendor_dashboard', ['result' =>$result,'title' => $title,'products' => $products,'recent_orders' => $recent_orders,'from'=>$from,'to'=>$to]);
	}
        
        public function vendor_orders(Request $request)
        {
            $title = array('pageTitle' => Lang::get("website.Profile"));
            $result['commonContent'] = $this->index->commonContent();
            
            $recent_orders = DB::table('products')
                            ->join('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->join('products_description','products_description.products_id','=','products.products_id')
                            ->join('orders_products','products.products_id','=','orders_products.products_id')
                            ->join('orders','orders_products.orders_id','=','orders.orders_id')
                            ->where('products.vendor',auth()->guard('customer')->user()->id)
                            ->orderby('orders.date_purchased','desc')
                            ->get(); 
            return view('web.vendor_orders',['result' =>$result,'title' => $title,'recent_orders' => $recent_orders]);
        }
        
        public function vendor_products(Request $request)
        {
            $title = array('pageTitle' => Lang::get("website.Profile"));
            $result['commonContent'] = $this->index->commonContent();
            
            $products = DB::table('products')->where('vendor',auth()->guard('customer')->user()->id)->get();
            
            return view('web.vendor-products');
        }

        public function vendor_store(Request $request){
            $title = array('pageTitle' => Lang::get("website.Profile"));
            $result['commonContent'] = $this->index->commonContent();
            $result['vendor_prodcuts'] = DB::table('products')->where('vendor',$request->id)->where('products_status',1)->orderby('products_id','desc')->get();
            $result['vendor'] = DB::table('users')->where('id',$request->id)->first();
            $review_product = DB::table('products')->where('vendor',$request->id)->pluck('products_id')->toArray();
            $result['review_count'] = DB::table('reviews')->whereIn('products_id',$review_product)->count();
            $result['total_review_sum'] = DB::table('reviews')->whereIn('products_id',$review_product)->sum('reviews_rating');
          //  print_r($result['total_review_sum']); die;
            return view('web.vendor_store', ['result' =>$result,'title' => $title]);
	}

	public function updateMyProfile(Request $request){
            $chk_phone = DB::table('users')
                            ->where('id','!=',auth()->guard('customer')->user()->id)
                            ->where('phone',$request->customers_telephone)->get();
            if(count($chk_phone)>0){
                return redirect('/profile')->with('error','This phone number is already used.');
            }
            $chk_email = DB::table('users')
                            ->where('id','!=',auth()->guard('customer')->user()->id)
                            ->where('email',$request->customers_email_address)->get();
            if(count($chk_email)>0){
                return redirect('/profile')->with('error','This email id is already used.');
            }
            if(!empty($request->password)){
                if($request->password!=$request->re_password){
                    return redirect('/profile')->with('error','Password and confirm password should be same.');
                }
            }
            $message =  $this->customer->updateMyProfile($request);
            return redirect()->back()->with('success', $message);
	}

	public function updateMyPassword(Request $request){
      $message =  $this->customer->updateMyPassword($request);
			return redirect()->back()->with('success', $message);



	}

	public function logout(REQUEST $request){
		Auth::guard('customer')->logout();
		session()->flush();
		$request->session()->forget('customers_id');
		$request->session()->regenerate();
		return redirect()->intended('/');
	}

  public function socialLogin($social){
        return Socialite::driver($social)->redirect();
    }

  public function handleSocialLoginCallback($social){
		  $result =  $this->customer->handleSocialLoginCallback($social);
			if(!empty($result)){
				return redirect()->intended('/')->with('result', $result);
			}
    }

	function createRandomPassword() {
		$pass = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
		return $pass;
	}

	public function likeMyProduct(Request $request){
            $cartResponse = $this->customer->likeMyProduct($request);
            //return $cartResponse;
            return redirect('/wishlist');
	}

	public function unlikeMyProduct(Request $request,$id){
        if(!empty(auth()->guard('customer')->user()->id)){
        $this->customer->unlikeMyProduct($id);
                $message = Lang::get("website.Product is unliked");
                return redirect()->back()->with('success', $message);
        }else{
                return redirect('login')->with('loginError','Please login to like product!');
        }
	}

	public function wishlist(Request $request){
        $title = array('pageTitle' => Lang::get("website.Wishlist"));
        $result = $this->customer->wishlist($request);
        /*echo '<pre>';
        //echo count($result['products']['product_data']);
        print_r($result['products']['product_data']);
        die;*/
        return view("web.wishlist", ['title' => $title])->with('result', $result);
	}

	public function loadMoreWishlist(Request $request){

		$limit = $request->limit;

		$data = array('page_number'=>$request->page_number, 'type'=>'wishlist', 'limit'=>$limit, 'categories_id'=>'', 'search'=>'', 'min_price'=>'', 'max_price'=>'' );
		$products = $this->products->products($data);
		$result['products'] = $products;

		$cart = '';
		$myVar = new CartController();
		$result['cartArray'] = $this->products->cartIdArray($cart);
		$result['limit'] = $limit;
		return view("web.wishlistproducts")->with('result', $result);

	}

	public function forgotPassword(){
            if(auth()->guard('customer')->check()){
                return redirect('/');
            }else{
                $title = array('pageTitle' => Lang::get("website.Forgot Password"));
                return view("auth.forgotpassword", ['title' => $title]);
            }
	}

	public function processPassword(Request $request) {
            $title = array('pageTitle' => Lang::get("website.Forgot Password"));
            $password = $this->createRandomPassword();
            $email = $request->email;
            $postData = array();
            //check email exist
            $existUser = $this->customer->ExistUser($email);
            if (count($existUser) > 0) {
                $this->customer->UpdateExistUser($email, $password);
                $existUser[0]->password = $password;
                $myVar = new AlertController();
                $alertSetting = $myVar->forgotPasswordAlert($existUser);
                return redirect('/login')->with('success', Lang::get("website.Password has been sent to your email address"));
            } else {
                return redirect('/forgotPassword')->with('error', Lang::get("website.Email address does not exist"));
            }
        }

        public function recoverPassword(){
		$title = array('pageTitle' => Lang::get("website.Forgot Password"));
		$final_theme = $this->theme->theme();
		return view("web.recoverPassword", ['title' => $title,'final_theme' => $final_theme])->with('result', $result);
	}

	function subscribeNotification(Request $request) {

		$setting = $this->index->commonContent();

		/* Desktop */
		$type = 3;

		session(['device_id' => $request->device_id]);

		if(!empty(auth()->guard('customers')->user()->id)){

			$device_data = array(
				'device_id' => $request->device_id,
				'device_type' =>  $type,
				'register_date' => time(),
				'update_date' => time(),
				'ram' =>  '',
				'status' => '1',
				'processor' => '',
				'device_os' => '',
				'location' => '',
				'device_model'=>'',
				'customers_id'=>auth()->guard('customers')->user()->id,
				'manufacturer'=>'',
				$setting['setting'][54]->value=>'1'
			);


		}else{

			$device_data = array(
				'device_id' => $request->device_id,
				'device_type' =>  $type,
				'register_date' => time(),
				'update_date' => time(),
				'ram' =>  '',
				'status' => '1',
				'processor' => '',
				'device_os' => '',
				'location' => '',
				'device_model'=>'',
				'manufacturer'=>'',
				$setting['setting'][54]->value=>'1'
			);

		}
    $this->customer->updateDevice($request,$device_data);
		print 'success';
	}

    public function signupProcess(Request $request) {
        $old_session = Session::getId();
        
        $firstName = $request->first_name;
        //$lastName = $request->lastName;
        //$gender = $request->gender;
        $email = $request->email;
        $phone = $request->phone;
        $country = $request->country_code;
        $zone = $request->zone;
        $password = $request->password;
        //$date = date('y-md h:i:s');
        //		//validation start
        $validator = Validator::make(
                        array(
                    //'firstName' => $request->firstName,
                    'first_name' => $request->first_name,
                    //'customers_gender' => $request->gender,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country_code' => $request->country_code,
                    'zone' => $request->zone,
                    'password' => $request->password,
                    're_password' => $request->re_password,
                        ), array(
                    'first_name' => 'required',
                    //'lastName' => 'required',
                    //'customers_gender' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'country_code' => 'required',
                    'zone' => 'required',
                    'password' => 'required',
                    're_password' => 'required | same:password',
                        )
        );
        if ($validator->fails()) {
            return redirect('signup')->withErrors($validator)->withInput();
        } else {

            $res = $this->customer->signupProcess($request);
            //eheck email already exit
            if ($res['email'] == "true") {
                return redirect('/signup')->withInput($request->input())->with('error', Lang::get("website.Email already exist"));
            }elseif ($res['phone'] == "true") {
                return redirect('/signup')->withInput($request->input())->with('error', Lang::get("website.Phone Number already exist"));
            } else {
                if ($res['insert'] == "true") {
                    if ($res['auth'] == "true") {
                        $result = $res['result'];
                        return redirect()->intended('/')->with('result', $result);
                    } else {
                        return redirect('signup')->with('loginError', Lang::get("website.Email or password is incorrect"));
                    }
                } else {
                    return redirect('/signup')->with('error', Lang::get("website.something is wrong"));
                }
            }
        }
    }

    public function vendoRegistration(Request $request) {
        $old_session = Session::getId();
        
        $firstName = $request->first_name;
        //$lastName = $request->lastName;
        //$gender = $request->gender;
        $email = $request->email;
        $phone = $request->phone;
        $country = $request->country_code;
        $zone = $request->zone;
        $password = $request->password;
        $company = $request->company;
        //$date = date('y-md h:i:s');
        //		//validation start
        $validator = Validator::make(
                        array(
                    //'firstName' => $request->firstName,
                    'first_name' => $request->first_name,
                    //'customers_gender' => $request->gender,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'company' => 'required',
                    'country_code' => $request->country_code,
                    'zone' => $request->zone,
                    'password' => $request->password,
                    're_password' => $request->re_password,
                        ), array(
                    'first_name' => 'required',
                    //'lastName' => 'required',
                    //'customers_gender' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'company' => 'required',
                    'country_code' => 'required',
                    'zone' => 'required',
                    'password' => 'required',
                    're_password' => 'required | same:password',
                        )
        );
        if ($validator->fails()) {
            return redirect('/vendor-registration')->withErrors($validator)->withInput();
        } else {

            $res = $this->customer->signupProcess($request);
            //eheck email already exit
            if ($res['email'] == "true") {
                return redirect('/vendor-registration')->withInput($request->input())->with('error', Lang::get("website.Email already exist"));
            }elseif ($res['phone'] == "true") {
                return redirect('/vendor-registration')->withInput($request->input())->with('error', Lang::get("website.Phone Number already exist"));
            } else {
                if ($res['insert'] == "true") {
                    if ($res['auth'] == "true") {
                        $result = $res['result'];
                        return redirect()->intended('/')->with('result', $result);
                    } else {
                        return redirect('/vendor-registration')->with('loginError', Lang::get("website.Email or password is incorrect"));
                    }
                } else {
                    return redirect('/vendor-registration')->with('error', Lang::get("website.something is wrong"));
                }
            }
        }
    }
}