@extends('web.layout')
@section('content')
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/shop')}}">Shop</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <div class="ps-checkout ps-section--shopping">
        <div class="container">
            <div class="ps-section__header">
                <h1>Checkout</h1>
            </div>
            <div class="ps-section__content">
                <form class="ps-form--checkout" action="{{URL::to('/place_order')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                            <div class="ps-form__billing-info">
                                <h3 class="ps-form__heading">Billing Details</h3>
                                <div class="form-group">
                                    <label>First Name<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="firstname" value="{{isset($default_address->billing_name) ? $default_address->billing_name : null}}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Last Name<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="lastname" value="{{isset($default_address->billing_name) ? $default_address->billing_name : null}}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Company Name<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="company" value="{{isset($default_address->billing_company) ? $default_address->billing_company : null}}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Email Address<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="email" name="email" value="{{isset($default_address->email) ? $default_address->email : null}}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Country<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <select id="country" name="countries_id" class="form-control" required>
                                            @if(count($result['countries'])>0)
                                            @foreach($result['countries'] as $country)
                                            <option value="{{$country->countries_id}}">{{$country->countries_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>State<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <select id="zone" name="zone_id" class="form-control" required>
                                            <option value="">Select State</option>
                                            @if(count($result['zones'])>0)
                                                @foreach($result['zones'] as $zone)
                                                    <option value="{{$zone->zone_id}}">{{$zone->zone_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>City<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="city" value="{{isset($default_address->billing_city) ? $default_address->billing_city : null}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Postcode<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control place_order_chk_pincode" minlength="6" maxlength="6" type="text" id="postcode" name="postcode" value="{{isset($default_address->billing_postcode) ? $default_address->billing_postcode : null}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="phone" value="{{isset($default_address->billing_phone) ? $default_address->billing_phone : null}}" required>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Address<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <textarea class="form-control" rows="4" name="address" required>{{isset($default_address->billing_street_address) ? $default_address->billing_street_address : null}}</textarea>
                                    </div>
                                </div> 
                                @if(empty(session('customers_id')))
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" name="create_account" id="create-account">
                                        <label for="create-account">Create an account?</label>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control place_order_chk_pincode" type="checkbox" name="ship_to_different" id="cb01">
                                        <label for="cb01">Ship to a different address?</label>
                                    </div>
                                </div>
                                
                                <div id="different_shipping_address" class="d-none">
                                    <h3 class="ps-form__heading">Shipping Details</h3>
                                    <div class="form-group">
                                        <label>Company Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="shipping_company" value="{{isset($default_address->delivery_company) ? $default_address->delivery_company : null}}" id="shipping_company" disabled required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Country<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <select id="shipping_country" name="shipping_countries_id" class="form-control" disabled required>
                                                @if(count($result['countries'])>0)
                                                @foreach($result['countries'] as $country)
                                                <option value="{{$country->countries_id}}">{{$country->countries_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>State<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <select id="shipping_zone" name="shipping_zone_id" class="form-control" disabled required>
                                                <option value="">Select State</option>
                                                @if(count($result['zones'])>0)
                                                @foreach($result['zones'] as $zone)
                                                <option value="{{$zone->zone_id}}" <?php if(isset($default_address->delivery_state) && $default_address->delivery_state==$zone->zone_name){echo 'selected';} ?>>{{$zone->zone_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>City<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="shipping_city" value="{{isset($default_address->delivery_city) ? $default_address->delivery_city : null}}" disabled id="shipping_city" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Postcode<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control place_order_chk_pincode" type="text" id="shipping_postcode" minlength="6" maxlength="6" name="shipping_postcode" value="{{isset($default_address->delivery_postcode) ? $default_address->delivery_postcode : null}}" disabled id="shipping_postcode" required>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label>Phone<sup>*</sup> 
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="shipping_phone" value="{{isset($default_address->delivery_phone) ? $default_address->delivery_phone : null}}" disabled id="shipping_phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <textarea class="form-control" rows="4" name="shipping_address" disabled id="shipping_address" required>{{isset($default_address->delivery_street_address) ? $default_address->delivery_street_address : null}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-40"> Addition information</h3>
                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <div class="form-group__content">
                                        <textarea class="form-control" rows="7" name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <h3 class="mt-40"> Payment Method</h3>
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" name="payment_method" id="cb02" value="cash_on_delivery" checked required>
                                        <label for="cb02">Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                            <div class="ps-form__total">
                                <h3 class="ps-form__heading">Your Order</h3>
                                <div class="content">
                                    <div class="ps-block--checkout-total">
                                        <div class="ps-block__header">
                                            <p>Product</p>
                                            <p>Total</p>
                                        </div>
                                        <div class="ps-block__content">
                                            <table class="table ps-block__products">
                                                <tbody>
                                                    <?php
                                                    $Subtotal = 0;
                                                    $shipping_rate = 0;
                                                    $discount = 0;
                                                    if(isset($result['shipping_methods'][0]['services'][0]['rate'])){
                                                        $shipping_rate = $result['shipping_methods'][0]['services'][0]['rate']; ?>
                                                    <input type="hidden" value="{{$shipping_rate}}" id="shipping">
                                                    <?php }else{
                                                        $shipping_rate = 0; ?>
                                                    <input type="hidden" value="{{$shipping_rate}}" id="shipping">
                                                    <?php }
                                                    ?>
                                                    @if(isset($result['cart']))
                                                    @foreach($result['cart'] as $row)
                                                    <?php
                                                        $products_vendor = DB::table('products')->where('products_id',$row->products_id)->value('vendor');
                                                        $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
                                                        $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
                                                       ?>
                                                    <tr>
                                                        <td>
                                                            <a href="{{URL::to('/product-detail/'.$row->products_slug)}}">{{$row->products_name}} * <b>{{$row->customers_basket_quantity}}</b></a>
                                                            <p>Seller:<strong> {{$first_name}}  {{$last_name}}</strong></p>
                                                            @if($row->type == 1)
                                                                <p><strong>Buy</strong></p>
                                                            @else
                                                                <p><strong>On Rent</strong></p>
                                                            @endif
                                                        </td>
                                                        <td><i class="fa fa-inr"></i>{{$row->customers_basket_quantity*$row->price}}</td>
                                                    </tr>
                                                    <?php $Subtotal += $row->customers_basket_quantity*$row->price; ?>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            <input type="hidden" value="{{$Subtotal}}" id="Subtotal">
                                            <h4 class="ps-block__title">Subtotal <span><i class="fa fa-inr"></i>{{number_format($Subtotal,2)}}</span></h4>
                                            <div class="ps-block__shippings">
                                                <figure>
                                                    <p>Tax(<span id="tax_percent">0</span>%) <i class="fa fa-inr"></i><span id="tax_rate">0</span></p>
                                                    <p>Shipping <i class="fa fa-inr"></i><span>{{$shipping_rate}}</span></p>
<!--                                                    <h4>YOUNG SHOP Shipping</h4>
                                                    <p>Free shipping</p>
                                                    <a href="#"> MVMTH Classical Leather Watch In Black ×1</a>-->
                                                </figure>
<!--                                                @if(isset($result['cart']))
                                                @foreach($result['cart'] as $row)
                                                <figure>
                                                    <h4>ROBERT’S STORE Shipping</h4>
                                                    <a href="{{URL::to('/product-detail/'.$row->products_slug)}}">{{$row->products_name}} * <b>{{$row->customers_basket_quantity}}</b></a>
                                                    <p>Free shipping</p>
                                                </figure>
                                                @endforeach
                                                @endif-->
                                            </div>
                                            @if(isset($result['coupon']))
                                            <h4 class="ps-block__title">Coupons</h4>
                                            <div class="ps-block__shippings">
                                                @foreach($result['coupon'] as $session_coupon)
                                                <?php if($session_coupon->discount_type=='percent'){
                                                    $discount += ($Subtotal*$session_coupon->amount)/100;
                                                }if($session_coupon->discount_type=='fixed_cart'){
                                                    $discount += $session_coupon->amount;
                                                } ?>
                                                <figure>
                                                    <p>{{$session_coupon->code}} <i class="fa fa-inr"></i><span>{{number_format($discount,2)}}</span></p>
                                                </figure>
                                                @endforeach
                                                <?php $Subtotal = $Subtotal-$discount; ?>
                                            </div>
                                            @endif
                                            <h3>Total <i class="fa fa-inr"></i><span id="final_total">{{number_format($Subtotal+$shipping_rate,2)}}</span></h3>
                                        </div>
                                    </div>
                                    <div class="alert alert-success alert-dismissible d-none" id="place_order_success" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">@lang('website.success'):</span>
                                            Delivery available at this location.
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>-->
                                    </div>
                                    <div class="alert alert-danger alert-dismissible d-none" id="place_order_error" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">@lang('website.Error'):</span>
                                        <span id="failedmsg"> Please enter your pincode.</span>
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>-->
                                    </div>
                                    <button type="button" id="place_order_chk_pincode" class="ps-btn ps-btn--fullwidth place_order_chk_pincode <?php if($submitBlocked==1){echo 'd-none';} ?>">Click here to Check Delivery at your Pincode</button>
                                    <button type="submit" id="place_order_at_pincode" class="ps-btn ps-btn--fullwidth <?php if($submitBlocked==0){echo 'd-none';} ?>">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection