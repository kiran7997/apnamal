@extends('web.layout')
@section('content')
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/shop')}}">Shop</a></li>
                <li> Order Tracking</li>
            </ul>
        </div>
    </div>
    <div class="ps-order-tracking">
        <div class="container">
            <div class="ps-section__header">
                <h3>Order Tracking</h3>
                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you-on your receipt and in the confirmation email you should have received.</p>
            </div>
            <div class="ps-section__content">
                <form class="ps-form--order-tracking" action="{{URL::to('/order-tracking')}}" method="post">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">@lang('website.Error'):</span>
                            {!! session('error') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">@lang('website.success'):</span>
                            {!! session('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Order ID</label>
                        <input class="form-control" type="text" name="orders_id" required placeholder="Found in your order confimation email">
                    </div>
                    <div class="form-group">
                        <label>Billing Email</label>
                        <input class="form-control" type="text" name="email" required placeholder="Enter your Billing email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="ps-btn ps-btn--fullwidth">Track Your Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include("web.includes.newsletter")
@endsection