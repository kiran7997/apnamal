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
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
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
                                            <figcaption>Discount</figcaption>
                                            <div class="ps-block__content">
                                                <p><i class="fa fa-inr"></i>{{isset($result['orders'][0]->coupon_amount) ? number_format($result['orders'][0]->coupon_amount,2) : '-'}}</p>
                                            </div>
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
                                                <th>Return</th>
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
                                                <td>
                                                    <?php
                                                        $returned = \App\Models\Web\OrderReturns::query()->where('order_product_id','=', $row->orders_products_id)->first();
                                                    ?>
                                                    <!--<a href="{{URL::to('return-order/'.$row->orders_id)}}" data-toggle="tooltip" title="Return This Item"><i class="fa fa-undo" style="font-size:32px;color:red"></i></a>-->
                                                    @if(empty($returned))
                                                        @if($result['orders'][0]->orders_status_id != 2)
                                                            @if($row->products_quantity ==0)
                                                                <i style="color: red;">Cancelled</i>
                                                            @else
                                                                
                                                            <button type="button" data-toggle="tooltip" title="Cancel This Item" data-value="{{$row->products_id}}"
                                                                class="btn btn-label-danger btn-lg btn-upper cancelBtn" data-toggle="modal"
                                                                data-id = {!! $row->orders_id !!}><i class="fa fa-times" style="font-size:32px;color:red"></i>
                                                            </button>
                                                            @endif    
                                                        @else
                                                        @if($row->products_quantity >0)
                                                        
                                                            <button type="button" data-toggle="tooltip" title="Return This Item" data-value="{{$row->products_id}}"
                                                                class="btn btn-label-primary btn-lg btn-upper openBtn" data-toggle="modal"
                                                                data-id = {!! $row->orders_id !!}><i class="fa fa-undo" style="font-size:32px;color:red"></i>
                                                            </button>
                                                        @else
                                                            <i style="color: red;"><b>Cancelled</b></i>
                                                        @endif
                                                        @endif
                                                    @else
                                                        @if($returned->status == 1)
                                                            <i style="color: red;"><b>Raised return</b></i>
                                                        @elseif($returned->status == 2)
                                                            <i style="color: red;"><b>Return declined</b></i>
                                                        @else
                                                            <i style="color: green;"><b>Returned</b></i>
                                                        @endif
                                                    @endif
                                                </td>
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
        
        <!--begin::Modal-->
<div class="modal fade" id="kt_modal_4_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<!--end::Modal-->
        
    </section>
    <script >
        $(document).ready(function () {
            
            
        $('.cancelBtn').on('click', function () {
            var order_id = $(this).data('id');
            var pruduct_id = $(this).data('value');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                    type: 'GET',
                    url: '/cancel-item/' + order_id+'/'+pruduct_id,
                    dataType: 'HTML',
    
                    success: function (data) {
                        console.log(data);
                        $(this).attr('value','Cancelled');
                    },
                }).then(data => {
                    window.location.reload();
                    console.log(data);
                })
                .catch(error => {
                    var xhr = $.ajax();
                    console.log(xhr);
                    console.log(error);
                })
    
        });
            
            
            
        $('.openBtn').on('click', function () {
            var order_id = $(this).data('id');
            var pruduct_id = $(this).data('value');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                    type: 'GET',
                    url: '/request-return/' + order_id+'/'+pruduct_id,
                    dataType: 'HTML',
    
                    success: function (data) {
    
                    },
                }).then(data => {
                    $('.modal-content').html(data);
                    $('#kt_modal_4_2').modal("show");
                })
                .catch(error => {
                    var xhr = $.ajax();
                    console.log(xhr);
                    console.log(error);
                })
    
        });
    });
    </script>
    
    @include('web.includes.newsletter')
</main>
@endsection