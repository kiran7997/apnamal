@extends('web.layout')
@section('content')
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/shop')}}">Shop</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__header">
                <h1>Shopping Cart</h1>
            </div>
            
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">@lang('website.success'):</span>
                    {!! session('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--shopping-cart">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $Subtotal = 0; $discount = 0; ?>
                            @if(isset($result['cart']))
                            @foreach($result['cart'] as $row)
                             <?php
                                $products_vendor = DB::table('products')->where('products_id',$row->products_id)->value('vendor');
                                $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
                                $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
                                $productDetails = DB::table('products')->where('products_id',$row->products_id)->first();
                              ?>
                            <tr>
                                <td>
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail">
                                            <a href="{{URL::to('product-detail/'.$row->products_slug)}}"><img src="{{URL::asset('/'.$row->image_path)}}" alt="image"></a>
                                        </div>
                                        <div class="ps-product__content"><a href="{{URL::to('product-detail/'.$row->products_slug)}}">{{$row->products_name}}</a>
                                            <p>Seller:<strong> {{$first_name}}  {{$last_name}}</strong></p>
                                           @if($row->type == 1)
                                           @else
                                           <p>Book Type:<strong> {{isset($productDetails->buy_for_rent) ? $productDetails->buy_for_rent : null}}</strong></p>
                                           @endif
                                            @if($row->type == 1)
                                                <strong> Buy</strong>
                                            @endif
                                          <br>
                                        </div>
                                    </div> 
                                </td>
                                <td class="price"><i class="fa fa-inr"></i>{{$row->price}}</td>
                                <td>
                                    <div class="form-group--number">
                                        <button class="up incQty" data-productid="{{$row->products_id}}" data-productprice="{{$row->price}}">+</button>
                                        <button class="down decQty" data-productid="{{$row->products_id}}" data-productprice="{{$row->price}}">-</button>
                                        <input class="form-control" min="1" id="changeQty{{$row->products_id}}" disabled type="text" placeholder="1" value="{{$row->customers_basket_quantity}}">
                                    </div>
                                </td>
                                <td><i class="fa fa-inr"></i><span id="productTotal{{$row->products_id}}">{{$row->customers_basket_quantity*$row->price}}</span></td>
                                <td><a href="{{URL::to('delete-cart/'.$row->customers_basket_id)}}" onclick="return confirm('Are you sure?');"><i class="icon-cross"></i></a></td>
                            </tr>
                            <?php $Subtotal += $row->customers_basket_quantity*$row->price; ?>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="ps-section__cart-actions">
                    <a class="ps-btn" href="{{URL::to('/shop')}}"><i class="icon-arrow-left"></i> Back to Shop</a>
                    <a class="ps-btn ps-btn--outline" href="{{URL::to('/viewcart')}}"><i class="icon-sync"></i> Update cart</a>
                </div>
            </div>
            <div class="ps-section__footer">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        @if(Session::has('coupon_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">@lang('website.Error'):</span>
                                {!! session('coupon_error') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(Session::has('coupon_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">@lang('website.success'):</span>
                                {!! session('coupon_message') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <figure>
                            <form action="{{url('/apply_coupon')}}" method="post">
                                {{csrf_field()}}
                                <figcaption>Coupon Discount</figcaption>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Coupon Name..." name="coupon_code">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="ps-btn ps-btn--outline">Apply</button>
                                </div>
                            </form>
                        </figure>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--shopping-total">
                            <div class="ps-block__header">
                                <p>Subtotal <span class="totalprice"><i class="fa fa-inr"></i>{{$Subtotal}}</span></p>
                            </div>
                            @if(session('coupon'))
                            <?php $session_coupon_data = session('coupon'); ?>
                            <div class="ps-block__header">
                                <span class="ps-block__shop">Coupon(s)</span>
                                @foreach($session_coupon_data as $session_coupon)
                                <?php if($session_coupon->discount_type=='percent'){
                                    $discount += ($Subtotal*$session_coupon->amount)/100;
                                }if($session_coupon->discount_type=='fixed_cart'){
                                    $discount += $session_coupon->amount;
                                } ?>
                                <p>{{$session_coupon->code}} <a class="text-danger" href="{{url('/removeCoupon/'.$session_coupon->coupans_id)}}">Remove</a> <span class="discount_total"><i class="fa fa-minus"></i> <i class="fa fa-inr"></i>{{number_format($discount,2)}}</span></p>
                                @endforeach
                                <?php $Subtotal = $Subtotal-$discount; ?>
                            </div>
                            @endif
                            <div class="ps-block__content">
                                <h3>Total <span class="final_total"><i class="fa fa-inr"></i>{{number_format($Subtotal,2)}}</span></h3>
                            </div>
                        </div>
                        @if(isset($result['cart']) && count($result['cart'])>0)
                            @if(auth()->guard('customer')->check())
                            <a class="ps-btn ps-btn--fullwidth" href="{{URL::to('/checkout')}}">Proceed to checkout</a>
                            @else
                            <a class="ps-btn ps-btn--fullwidth" href="{{URL::to('/guest_checkout')}}">Proceed to checkout</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("web.includes.newsletter")
<script>
 function rentsecurity(id)
   {
    //alert(id);
     // var id = selectObject.value;
      var product_id = $(this).attr('data-productid');
      var rentprice = $(this).attr('data-rentprice');
        
        $.ajax({
           url: "/rent-price",
           type: "get",
           data: { id : id,product_id:product_id,rentprice:rentprice },
           success: function(data){
               alert(data);
               //$("#zone").html('');
              // $("#zone").append(data);
           }
       });
   }
</script>
@endsection