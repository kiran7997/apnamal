@extends('web.layout')
@section('content')
<style>
.product-review ul li {
	display: inline-block;
	padding: 0.2rem;
</style>
<div class="ps-breadcrumb">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('/')}}">Home</a></li>
<!--            <li><a href="shop-default.html">Consumer Electrics</a></li>
            <li><a href="shop-default.html">Refrigerators</a></li>-->
            <li>{!! isset($product_name->products_name) ? $product_name->products_name : null !!}</li>
        </ul>
    </div>
</div>
<div class="ps-page--product">
    <div class="ps-container">
        <div class="ps-page__container">
            <div class="ps-page__left">
                <div class="ps-product--detail ps-product--fullwidth">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="true">
                            <figure>
                                <div class="ps-wrapper">
                                    <div class="ps-product__gallery slick-initialized slick-slider" data-arrow="true">
                                        <a href="javascript:;" class="slick-arrow slick-disabled" aria-disabled="true" style=""><i class="fa fa-angle-left"></i>
                                        </a>
                                        <div aria-live="polite" class="slick-list draggable">
                                            <div class="slick-track" role="listbox" style="opacity: 1; width: 1041px;">
                                                <div class="item slick-slide slick-current slick-active text-center single_product_image_wrap" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="">
                                                    <a href="{{URL::asset('/'.$product_main_image)}}" tabindex="0">
                                                        <img src="{{URL::asset('/'.$product_main_image)}}" alt="image" class="img-fluid w-100">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="slick-arrow" style="" aria-disabled="false"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="ps-product__variants slick-initialized slick-slider slick-vertical" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                <div aria-live="polite" class="slick-list draggable" style="height: 280px;">
                                    <div class="slick-track" role="listbox" style="opacity: 1; height: 210px; transform: translate3d(0px, 0px, 0px);">
                                        <div class="item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 60px;">
                                            <img src="{{URL::asset('/'.$product_main_image)}}" alt="">
                                        </div>
                                        @if(count($product_images)>0)
                                        @foreach($product_images as $p=>$product_image)
                                        <div class="item slick-slide slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 60px;">
                                            <img src="{{URL::asset('/'.$product_image)}}" alt="">
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1>{!! isset($product_name->products_name) ? $product_name->products_name : null !!}</h1>
                            <div class="ps-product__meta">
                    <?php
                    if(!empty($product->products_id)){
                     $total_count_review = DB::table('reviews')->where('products_id',$product->products_id)->count();
                     $total_review_sum = DB::table('reviews')->where('products_id',$product->products_id)->sum('reviews_rating');
                    }else{
                        $total_count_review = '';
                    }
                    if(!empty($total_count_review)){
                        $total_review = $total_review_sum/$total_count_review;
                       } else {
                           $total_review = '';
                      }
                      $round_review = round($total_review);
                    ?>
                                <div class="ps-product__rating">
                                    <div class="br-wrapper br-theme-fontawesome-stars">
                                        <div class="br-widget br-readonly">
                                          @if($round_review == 5)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="5" class="br-selected br-current"></a>
                                          @elseif($round_review == 4)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @elseif($round_review == 3)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @elseif($round_review == 2)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @elseif($round_review == 1)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @else
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @endif
                                            <div class="br-current-rating">1</div>
                                        </div>
                                    </div>
                                    <span>{{$total_count_review}} review</span>
                                </div>
<!--                                <div class="ps-product__actions ml-5">
                                    <form action="{{url('/likeMyProduct')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="products_id" value="{{ isset($product->products_id) ? $product->products_id : null }}">
                                        <button type="submit" class="btn btn-link">
                                            <i class="icon-heart"></i>
                                        </button>
                                    </form>
                                </div>-->
                            </div>
                             <?php
                                if(!empty($product->vendor)){
                                        $vendorfname = DB::table('users')->where('id',$product->vendor)->value('first_name');
                                        $vendorlname = DB::table('users')->where('id',$product->vendor)->value('last_name');
                                        $vendorcompany = DB::table('users')->where('id',$product->vendor)->value('company');
                                } else {
                                        $vendorname = '';
                                }
                              ?>
                           @if(!empty($product->vendor))
                            <p>Seller : <a href="{{url('vendor-store/'.$product->vendor.'/'.str_slug($vendorcompany))}}"><strong>{{$vendorfname}} {{$vendorlname}}</strong></a></p>
                           @endif
                            <h4 class="ps-product__price">
                                <i class="fa fa-inr"></i>
                                {!! isset($product->products_price) ? $product->products_price : null !!}
                                <span type="" class="btn btn-link ml-5" data-toggle="tooltip" data-placement="right" title="Ship this item into your cart qualifier for free shipping. All orders for eligible items amounting to RS 150 or more quantity for free shipping with your stepdoor/city.">
                               <i class="fa fa-question-circle fx-3 fa-3x" aria-hidden="true"></i>
                              </span>
                            </h4>
                           
                            <div class="ps-product__desc">
                                {!! isset($product->short_description) ? $product->short_description : null !!}
                            </div>
                            <div class="ps-product__shopping">
                                    <?php
                                    $product_inventory_in = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','in')->sum('stock');
                                    $product_inventory_out = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','out')->sum('stock');
                                    $product_inventory = $product_inventory_in-$product_inventory_out;
                                    if (empty(session('customers_id'))) {
                                        $customers_id = '';
                                    } else {
                                        $customers_id = session('customers_id');
                                    }
                                    $session_id = Session::getId();
                                    if (empty($customers_id)) {
                                        $exist = DB::table('customers_basket')->where([
                                                    ['session_id', '=', $session_id],
                                                    ['products_id', '=', $product->products_id],
                                                    ['is_order', '=', 0],
                                                ])->get();
                                    } else {
                                        $exist = DB::table('customers_basket')->where([
                                                    ['customers_id', '=', $customers_id],
                                                    ['products_id', '=', $product->products_id],
                                                    ['is_order', '=', 0],
                                                ])->get();
                                    }
                                    ?>
                                @if($product_inventory==0)
                                <strong class="ps-btn text-danger"> Out of stock</strong>
                                @else
                                <figure>
                                    <figcaption>Quantity</figcaption>
                                    <div class="form-group--number">
                                        <button class="up incQty" data-productid="{{$product->products_id}}" data-productprice="{{$product->products_price}}"><i class="fa fa-plus"></i></button>
                                        <button class="down decQty" data-productid="{{$product->products_id}}" data-productprice="{{$product->products_price}}"><i class="fa fa-minus"></i></button>
                                        <input class="form-control" min="1" id="changeQty{{$product->products_id}}" disabled type="text" value="{{isset($exist[0]->customers_basket_quantity) ? $exist[0]->customers_basket_quantity : '1'}}">
                                    </div>
                                </figure>
                                <form action="{{url('/addToCart')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="type" value="1"/>
                                    <input type="hidden" name="products_id" value="{{ isset($product->products_id) ? $product->products_id : null }}">
                                    <button class="ps-btn ps-btn--black" type="submit">Add to cart</button>
                                </form>
                                <form action="{{url('/addToCart')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="type" value="2"/>
                                    <input type="hidden" name="products_id" value="{{ isset($product->products_id) ? $product->products_id : null }}">
                                </form>
                                <div class="ps-product__shopping text-center border-bottom-0 mb-0 pb-0">
                               
                               <form action="{{url('/likeMyProduct')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="products_id" value="{{ isset($product->products_id) ? $product->products_id : null }}">
                                    <button type="submit" class="btn-warning ps-btn">
                                        Add to wishlist
                                    </button>
                                </form>
                               
                           </div>
                                </div>
                           
                                 <div class="ps-product__shopping">
                                
                                @endif
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="chk_availability" placeholder="Enter Postal Code">
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="checkps-btn mb-2 chk_availability">Check For Availability</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-success alert-dismissible d-none" id="chk_availability_success" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">@lang('website.success'):</span>
                                            Delivery available at this Postal code.
                                    </div>
                                    <div class="alert alert-danger alert-dismissible d-none" id="chk_availability_error" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">@lang('website.Error'):</span>
                                            Delivery is not available at this Postal code.
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <?php
                    if(!empty($product->products_id)){
                     $review = DB::table('reviews')->where('products_id',$product->products_id)->get();
                     $count_review = DB::table('reviews')->where('products_id',$product->products_id)->count();
                     $review_sum = DB::table('reviews')->where('products_id',$product->products_id)->sum('reviews_rating');
                    }else{
                        $count_review = '';
                        
                        $review = array();
                    }
                    if(!empty($count_review)){
                          $total = $review_sum/$count_review;
                         } else {
                             $total = '';
                        }
                  if(!empty($product->products_id)){
                    $onestar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',1)->count();
                    $twostar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',2)->count();
                    $threestar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',3)->count();
                    $fourstar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',4)->count();
                    $fivestar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',5)->count();
                  } else {
                      $onestar = '';
                      $twostar = '';
                      $threestar = '';
                      $fourstar = '';
                      $fivestar = '';
                    }
                    
                    ?>
                    <div class="ps-product__content ps-tab-root">
                         <div class="ps-product__specification">
                                {!! isset($product->specification) ? $product->specification : null !!}
                            </div>
                            <div class="ps-product__sharing">
                                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=&t={{Request::fullUrl()}}"><i class="fa fa-facebook"></i></a>
                                <a class="twitter" href="https://twitter.com/intent/tweet?{{Request::fullUrl()}}"><i class="fa fa-twitter"></i></a>
                            <!--<a class="google" href="https://plus.google.com/share?url="><i class="fa fa-google-plus"></i></a>-->
                                <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url={{Request::fullUrl()}}"><i class="fa fa-linkedin"></i></a>
                                <a class="whatsapp" target="_blank" href="https://api.whatsapp.com/send?text={{Request::fullUrl()}}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
                           <!-- <a class="instagram" href="javascript:;"><i class="fa fa-instagram"></i></a>-->
                            </div>
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">Description</a></li>
                            <li><a href="#tab-2">Specification</a></li>
                            <li><a href="#tab-3">Vendor</a></li>
                            <li><a href="#tab-4">Reviews ({{$count_review}})</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-document">
                                    {!! isset($product_name->products_description) ? $product_name->products_description : null !!}
                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                {!! isset($product->specification) ? $product->specification : null !!}
                            </div>
                            <?php
                              if(!empty($product->vendor)){
                                  $vendor = DB::table('users')->where('id',$product->vendor)->first();
                              } else {
                                  $vendor = '';
                              }
                            ?>
                            <div class="ps-tab" id="tab-3">
                                <h4>{{isset($vendor->first_name) ? $vendor->first_name : null}}</h4>
                                <p>{{isset($vendor->company_description) ? $vendor->company_description : null}}</p>
                                <!-- <a href="javascript:;">More Products from gopro</a>-->
                            </div>
                            <div class="ps-tab" id="tab-4">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                        <div class="ps-block--average-rating">
                                            <div class="ps-block__header">
                                              @if(!empty($total))
                                                <h3>{{number_format($total,1)}}</h3>
                                                @else
                                                <h3>0</h3>
                                              @endif
                                                <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select>
                                                    <div class="br-widget br-readonly">
                                                       @if(!empty($total))
                                                        @for($i=0; $i < 5; ++$i)
                                                            <i class="font-13 fa fa-star{{ $total<=$i?'-o':'' }}"></i>
                                                          @endfor
                                                          @else
                                                          <a href="javascript:;" data-rating-value="1" data-rating-text="1" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <span>{{$count_review}} Review</span>
                                            </div>
                                            <div class="ps-block__star"><span>5 Star</span>
                                                <div class="ps-progress" data-value="{{$fivestar}}"><span style="width: {{$fivestar}}%;"></span></div><span>{{$fivestar}}%</span>
                                            </div>
                                            <div class="ps-block__star"><span>4 Star</span>
                                                <div class="ps-progress" data-value="{{$fourstar}}"><span style="width: {{$fourstar}}%;"></span></div><span>{{$fourstar}}%</span>
                                            </div>
                                            <div class="ps-block__star"><span>3 Star</span>
                                                <div class="ps-progress" data-value="{{$threestar}}"><span style="width: {{$threestar}}%;"></span></div><span>{{$threestar}}%</span>
                                            </div>
                                            <div class="ps-block__star"><span>2 Star</span>
                                                <div class="ps-progress" data-value="{{$twostar}}"><span style="width: {{$twostar}}%;"></span></div><span>{{$twostar}}%</span>
                                            </div>
                                            <div class="ps-block__star"><span>1 Star</span>
                                                <div class="ps-progress" data-value="{{$onestar}}"><span style="width: {{$onestar}}%;"></span></div><span>{{$onestar}}%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                        @if(Session::has('flash_message'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">@lang('website.success'):</span>
                                            {{ Session::get('flash_message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <form class="ps-form--review productreview" action="{{URL::to('/productreview')}}" method="post" id="removestarfromlist">
                                            {{csrf_field()}}
                                            <h4>Submit Your Review</h4>
                                        @if(count($review)>0)
                                          @foreach($review as $rate)
                                          <?php
                                           $users = DB::table('users')->where('id',$rate->customers_id)->first();
                                          ?>
                                          <h6>{{isset($users->first_name) ? $users->first_name : null}}  {{isset($users->last_name) ? $users->last_name : null}}</h6>
                                          @for($j=0; $j < 5; ++$j)
                                            <i class="font-13 fa fa-star{{ $rate->reviews_rating<=$j?'-o':'' }}"></i>
                                          @endfor
                                          <strong>{{$rate->review_comment}}</strong>
                                         <hr>
                                           @endforeach
                                        @endif
                                            
                                    <input type="hidden" id="products_id" name="products_id" value="{{ isset($product->products_id) ? $product->products_id : null }}">
                                        <div class="form-group form-group__rating">
                                                <label>Your rating of this product</label>
                                                <div class="pl-4 rppgrating">
                									<input type="radio" id="star1" name="rating" value="1">
                									<label for="star1" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star2" name="rating" value="2">
                									<label for="star2" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star3" name="rating" value="3">
                									<label for="star3" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star4" name="rating" value="4">
                									<label for="star4" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star5" name="rating" value="5">
                									<label for="star5" title="text"><i class="fa fa-star"></i></label>
                								 </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <textarea class="form-control" id="review_comment" required name="review_comment" rows="6" placeholder="Write your review here"></textarea>
                                            </div>
                                        @if(auth()->guard('customer')->check())
                                            <div class="form-group submit"> 
                                                <button class="ps-btn" type="submit">Submit Review</button>
                                            </div>
                                          @else
                                            <div class="form-group submit">
                                                <a href="{{url('login')}}" class="ps-btn">Submit Review</a>
                                            </div>
                                         @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-tab active" id="tab-6">
                                <p>Sorry no more offers available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-page__right">
                <aside class="widget widget_product widget_features">
                    <p><i class="icon-network"></i> Shipping in tri-city</p>
                    <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
                    <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
                    <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
                </aside>
                <aside class="widget widget_sell-on-site">
                    <p><i class="icon-store"></i> Sell on www.apnamal.com?<a href="{{url('/vendor-registration')}}"> Register Now !</a></p>
                </aside>
                <aside class="widget widget_same-brand">
                    <h3>New Arrivals</h3>
                    <div class="widget__content">
@if(isset($same_new_products))
@foreach($same_new_products as $same_new_product)
<?php
$same_new_product_main_image = DB::table('image_categories')->where('image_id', $same_new_product->products_image)->value('path');
$same_new_product_name = DB::table('products_description')->where('products_id', $same_new_product->products_id)->first();
$same_new_product_percent = (($same_new_product->products_mrp - $same_new_product->products_price)*100) /$same_new_product->products_mrp;
if(!empty($same_new_product->products_id)){
 $total_count_review = DB::table('reviews')->where('products_id',$same_new_product->products_id)->count();
 $total_review_sum = DB::table('reviews')->where('products_id',$same_new_product->products_id)->sum('reviews_rating');
}else{
    $total_count_review = '';
}
if(!empty($total_count_review)){
    $total_review = $total_review_sum/$total_count_review;
   } else {
       $total_review = '';
  }
  $round_review = round($total_review);
?>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="{{URL::to('product-detail/'.$same_new_product->products_slug)}}">
                                    <img src="{{URL::asset('/'.$same_new_product_main_image)}}" alt="image">
                                </a>
                                <div class="ps-product__badge">{{isset($same_new_product_percent) ? round($same_new_product_percent) : '0'}}%</div>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="javascript:;">Robert's Store</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="{{URL::to('product-detail/'.$same_new_product->products_slug)}}">{{$same_new_product_name->products_name}}</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars">
                                            <div class="br-widget br-readonly">
                                              @if($round_review == 5)
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="5" class="br-selected br-current"></a>
                                              @elseif($round_review == 4)
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              @elseif($round_review == 3)
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              @elseif($round_review == 2)
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              @elseif($round_review == 1)
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              @else
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              @endif
                                            </div>
                                        </div>
                                        <span>{{$total_count_review}} review</span>
                                    </div>
                                    <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{$same_new_product->products_price}} <del><i class="fa fa-inr"></i>{{$same_new_product->products_mrp}} </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="{{URL::to('product-detail/'.$same_new_product->products_slug)}}">{{$same_new_product_name->products_name}}</a>
                                    <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{$same_new_product->products_price}} <del><i class="fa fa-inr"></i>{{$same_new_product->products_mrp}} </del></p>
                                </div>
                            </div>
                        </div>
@endforeach
@endif
                        <!--<p class="text-right">View More Same New Releases</p>-->
                    </div>
                </aside>
            </div>
        </div>
        <div class="ps-product-list ps-clothings">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2149px;">
 @if(isset($related_products))
    @foreach($related_products as $related_product)
<?php
    $related_product_main_image = DB::table('image_categories')->where('image_id', $related_product->products_image)->value('path');
    $related_product_name = DB::table('products_description')->where('products_id', $related_product->products_id)->first();
    $related_product_percent = (($related_product->products_mrp - $related_product->products_price)*100) /$related_product->products_mrp;
    $product_inventory_in = DB::table('inventory')->where('products_id',$related_product->products_id)->where('stock_type','in')->sum('stock');
    $product_inventory_out = DB::table('inventory')->where('products_id',$related_product->products_id)->where('stock_type','out')->sum('stock');
    $product_inventory = $product_inventory_in-$product_inventory_out;
?>
                 <div class="owl-item" style="width: 214.833px;"><div class="BooksPanel ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="{{URL::to('product-detail/'.$related_product->products_slug)}}" class="books-panel-item-wrap is-book-panel-trigger selected">
                                <div class="book-thumb-img-wrap has-edge">
                                    <img src="{{URL::asset('/'.$related_product_main_image)}}" class="w-100 img-fluid" alt="" width="267" height="400">            
                                </div>
                            </a>
                            <div class="ps-product__badge">{{isset($related_product_percent) ? round($related_product_percent) : '0'}}%</div>
                        </div>
                         
                        <div class="ps-product__container">
                            <div class="on_producta row mb-2">
                                <div class="col-12 d-flex justify-content-between">
                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="{{$related_product->products_id}}">Quick View</a>
                                    @if($product_inventory==0)
                                    <strong class="text-danger"> Out of stock</strong>
                                    @else
                                    <form action="{{url('/addToCart')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="type" value="1"/>
                                        <input type="hidden" name="products_id" value="{{ isset($related_product->products_id) ? $related_product->products_id : null }}">
                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="{{URL::to('product-detail/'.$related_product->products_slug)}}">{{$related_product_name->products_name}}</a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{$related_product->products_price}} <del><i class="fa fa-inr"></i>{{$related_product->products_mrp}} </del></p>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="{{URL::to('product-detail/'.$related_product->products_slug)}}">{{$related_product_name->products_name}}</a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{$related_product->products_price}} <del><i class="fa fa-inr"></i>{{$related_product->products_mrp}} </del></p>
                            </div>
                        </div>
                    </div>
                </div>
         @endforeach
    @endif
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev disabled"><i class="icon-chevron-left"></i></button>
                            <button type="button" role="presentation" class="owl-next"><i class="icon-chevron-right"></i></button>
                        </div>
                        <div class="owl-dots">
                            <button role="button" class="owl-dot active"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("web.includes.newsletter")
@endsection