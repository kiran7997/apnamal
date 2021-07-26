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
    <div class="ps-section--shopping ps-whishlist">
        <div class="container">
            <div class="ps-section__header">
                <h1>Wishlist</h1>
            </div>
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--whishlist">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product name</th>
                                <th>Unit Price</th>
                                <th>Stock Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($result['products']['product_data']))
                            @foreach($result['products']['product_data'] as $wishlist)
                            <tr>
                                <td><a href="{{URL::to('/UnlikeMyProduct/'.$wishlist->products_id)}}"><i class="icon-cross"></i></a></td>
                                <td>
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail">
                                            <a href="{{URL::to('/product-detail/'.$wishlist->products_slug)}}">
                                                <img src="{{URL::asset('/'.$wishlist->image_path)}}" alt="image">
                                                </a>
                                                </div>
                                        <div class="ps-product__content">
                                            <a href="{{URL::to('/product-detail/'.$wishlist->products_slug)}}">{{$wishlist->products_name}}</a>
                                            </div>
                                    </div>
                                </td>
                                <td class="price"><i class="fa fa-inr"></i>{{$wishlist->products_price}}</td>
                                <td>@if($wishlist->defaultStock>0) <span class="ps-tag ps-tag--in-stock">In-stock</span> @else <span class="ps-tag ps-tag--out-stock">Out-stock</span> @endif</td>
                                <td>
                                    @if($wishlist->defaultStock==0)
                                        <button class="ps-btn" type="button">Out of Stock</button>
                                    @else
                                        <form action="{{url('/addToCart')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="type" value="1"/>
                                            <input type="hidden" name="products_id" value="{{ isset($wishlist->products_id) ? $wishlist->products_id : null }}">
                                            <button class="ps-btn" type="submit">Add to cart</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection