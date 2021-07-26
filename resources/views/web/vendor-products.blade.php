@extends('web.layout')
@section('content')
<div class="ps-page--single">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/vendor-store/'.auth()->guard('customer')->user()->id.'/'.str_slug(auth()->guard('customer')->user()->company))}}">Vendor Store</a></li>
                <li>Vendor Dashboard</li>
            </ul>
        </div>
    </div>
</div>
<div class="ps-vendor-dashboard">
    <div class="container">
        <div class="ps-section__header">
            <h3>Vendor Dashboard</h3>
        </div>
        <div class="ps-section__content">
            <ul class="ps-section__links">
                <li><a href="{{URL::to('/vendor-dashboard')}}">Dashboard</a></li>
                <li class="active"><a href="{{URL::to('/vendor-products')}}">Products</a></li>
                <li>
                    <a href="javascript:;">Order</a>
                </li>
                <li>
                    <a href="javascript:;">Setting</a>
                </li>
                <li><a href="{{URL::to('/vendor-store/'.auth()->guard('customer')->user()->id.'/'.str_slug(auth()->guard('customer')->user()->company))}}">View Store</a></li>
            </ul>
            
            <div class="ps-block--vendor-dashboard">
                <div class="ps-block__header">
                    <h3>Vendor Orders</h3>
                </div>
                <div class="ps-block__content">
                    <div class="table-responsive">
                        <table class="table ps-table ps-table--vendor">
                            <thead>
                                <tr>
                                    <th>date</th>
                                    <th>Order ID</th>
                                    <th>Shipping</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($recent_orders)>0)
                                @foreach($recent_orders as $recent_order)
                                <?php
                                $date1 = \Carbon\Carbon::parse($recent_order->date_purchased);
                                $orders_status_history = DB::table('orders_status_history')
					->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
					->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
					->select('orders_status_description.orders_status_name', 'orders_status.orders_status_id')
					->where('orders_id',$recent_order->orders_id)
                                        ->orderby('orders_status_history.orders_status_history_id', 'DESC')->first();
                                ?>
                                <tr>
                                    <td>{{$date1->isoFormat('MMM D, YYYY')}}</td>
                                    <td><a href="javascript:;">{{$recent_order->orders_id}}</a></td>
                                    <td><i class="fa fa-inr"></i>{{$recent_order->shipping_cost}}</td>
                                    <td><i class="fa fa-inr"></i>{{$recent_order->order_price}}</td>
                                    <td>{{isset($orders_status_history) ? $orders_status_history->orders_status_name : null}}</td>
                                    <td><a href="javascript:;">View Detail</a></td>
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
</div>
@include('web.includes.newsletter')
@endsection