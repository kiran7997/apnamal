<?php
$dataa = array();
$resultt['cart'] = $result['cart'] = App\Models\Web\Cart::myCart1($dataa);

?>
@if(isset($resultt['cart']))
<a class="header__extra" href="{{URL::to('/viewcart')}}"><i class="icon-bag2"></i><span><i>{{count($resultt['cart'])}}</i></span></a>
@else
<a class="header__extra" href="{{URL::to('/viewcart')}}"><i class="icon-bag2"></i><span><i>0</i></span></a>
@endif
<div class="ps-cart__content">
    <div class="ps-cart__items">
        <?php $Subtotall = 0; ?>
        @if(isset($resultt['cart']))
        @foreach($resultt['cart'] as $roww)
         <?php
            $products_vendor = DB::table('products')->where('products_id',$roww->products_id)->value('vendor');
            $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
            $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
           ?>
        <div class="ps-product--cart-mobile">
            <div class="ps-product__thumbnail">
            	<a href="{{URL::to('product-detail/'.$roww->products_slug)}}"><img src="{{URL::asset('/'.$roww->image_path)}}" alt="image"></a></div>
            <div class="ps-product__content">
                <a class="ps-product__remove" href="{{URL::to('delete-cart/'.$roww->customers_basket_id)}}" onclick="return confirm('Are you sure?');"><i class="icon-cross"></i></a>
                <a href="{{URL::to('product-detail/'.$roww->products_slug)}}">{{$roww->products_name}}</a>
                <p>Seller:<strong> {{$first_name}}  {{$last_name}}</strong></p><small>{{$roww->customers_basket_quantity}} x <i class="fa fa-inr"></i>{{$roww->price}}</small>
            </div>
        </div>
        <?php $Subtotall += $roww->customers_basket_quantity * $roww->price; ?>
        @endforeach
        @endif
    </div>
    <div class="ps-cart__footer">
        <h3>Sub Total:<strong><i class="fa fa-inr"></i>{{$Subtotall}}</strong></h3>
        <figure>
            <a class="ps-btn" href="{{URL::to('/viewcart')}}">View Cart</a>
            @if(isset($resultt['cart']) && count($resultt['cart'])>0)
            <a class="ps-btn" href="{{URL::to('/checkout')}}">Checkout</a>
            @endif
        </figure>
    </div>
</div>