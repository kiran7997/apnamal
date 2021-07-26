@extends('web.layout')
@section('content')
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/profile')}}">Account</a></li>
                <li>Invoice Detail</li>
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                @include('web.includes.user_sidebar')
                <div class="col-lg-8">
                    <div class="ps-section__right">
                        <div class="ps-section--account-setting">
                            <div class="ps-section__header">
                                <h3>Invoice #{{isset($result['orders'][0]->orders_id) ? $result['orders'][0]->orders_id : '-'}} - <strong>{{isset($result['orders'][0]->orders_status) ? $result['orders'][0]->orders_status : '-'}}</strong></h3>
                            </div>
                            <div class="ps-section__content">
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Billing Address</figcaption>
                                            <div class="ps-block__content"><strong>{{isset($result['orders'][0]->billing_name) ? $result['orders'][0]->billing_name : '-'}}</strong>
                                                <p>Address: {{isset($result['orders'][0]->billing_street_address) ? $result['orders'][0]->billing_street_address : '-'}}, {{isset($result['orders'][0]->billing_city) ? $result['orders'][0]->billing_city : '-'}}, {{isset($result['orders'][0]->billing_state) ? $result['orders'][0]->billing_state : '-'}}, {{isset($result['orders'][0]->billing_country) ? $result['orders'][0]->billing_country : '-'}}</p>
                                                <p>Phone: {{isset($result['orders'][0]->billing_phone) ? $result['orders'][0]->billing_phone : '-'}}</p>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Shipping Address</figcaption>
                                            <div class="ps-block__content"><strong>{{isset($result['orders'][0]->delivery_name) ? $result['orders'][0]->delivery_name : '-'}}</strong>
                                                <p>Address: {{isset($result['orders'][0]->delivery_street_address) ? $result['orders'][0]->delivery_street_address : '-'}}, {{isset($result['orders'][0]->delivery_city) ? $result['orders'][0]->delivery_city : '-'}}, {{isset($result['orders'][0]->delivery_state) ? $result['orders'][0]->delivery_state : '-'}}, {{isset($result['orders'][0]->delivery_country) ? $result['orders'][0]->delivery_country : '-'}}</p>
                                                <p>Phone: {{isset($result['orders'][0]->delivery_phone) ? $result['orders'][0]->delivery_phone : '-'}}</p>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Shipping Fee</figcaption>
                                            <div class="ps-block__content">
                                                <p><i class="fa fa-inr"></i>{{isset($result['orders'][0]->shipping_cost) ? $result['orders'][0]->shipping_cost : '-'}}</p>
                                            </div>
                                            <figcaption>Tax</figcaption>
                                            <div class="ps-block__content">
                                                <p><i class="fa fa-inr"></i>{{isset($result['orders'][0]->total_tax) ? $result['orders'][0]->total_tax : '-'}}</p>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Payment Method</figcaption>
                                            <div class="ps-block__content">
                                                <p>{{isset($result['orders'][0]->payment_method) ? $result['orders'][0]->payment_method : '-'}}</p>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table ps-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($result['orders'][0]->products)>0)
                                            @foreach($result['orders'][0]->products as $row)
                                            <?php
                                            $order_product = DB::table('products')->where('products_id',$row->products_id)->first();
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail">
                                                            <a href="{{URL::to('product-detail/'.$order_product->products_slug)}}">
                                                                <img src="{{URL::to('/'.$row->image)}}" alt="image">
                                                            </a>
                                                        </div>
                                                        <div class="ps-product__content">
                                                            <a href="{{URL::to('product-detail/'.$order_product->products_slug)}}">{{isset($row->products_name) ? $row->products_name : null}}</a>
                                                            <p>Sold By:<strong> YOUNG SHOP</strong></p>
                                                          @if($row->type == 1)
                                                            <p><strong> Buy</strong></p>
                                                           @else
                                                            <p><strong> On Rent</strong></p>
                                                          @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span><i class="fa fa-inr"></i>{{isset($row->products_price) ? $row->products_price : '0.00'}}</span></td>
                                                <td class="text-center">{{isset($row->products_quantity) ? $row->products_quantity : '1'}}</td>
                                                <td><span><i class="fa fa-inr"></i>{{isset($row->final_price) ? $row->final_price : '0.00'}}</span></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="ps-section__footer"><a class="ps-btn ps-btn--sm" href="{{URL::to('/orders')}}">Back to invoices</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.includes.newsletter')
</main>
@endsection