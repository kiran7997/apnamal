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
                                <h3><strong>Address</strong></h3>
                            </div>
                            <div class="ps-section__content">
                                @if(count($addresses)>0)
                                @foreach($addresses as $address)
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Billing Address</figcaption>
                                            <p><strong>Address:</strong> {{isset($address->billing_street_address) ? $address->billing_street_address : '-'}}, {{isset($address->billing_city) ? $address->billing_city : '-'}}, {{isset($address->billing_state) ? $address->billing_state : '-'}}, {{isset($address->billing_country) ? $address->billing_country : '-'}}</p>
                                        </figure>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Shipping Address</figcaption>
                                            <p><strong>Address:</strong> {{isset($address->delivery_street_address) ? $address->delivery_street_address : '-'}}, {{isset($address->delivery_city) ? $address->delivery_city : '-'}}, {{isset($address->delivery_state) ? $address->delivery_state : '-'}}, {{isset($address->delivery_country) ? $address->delivery_country : '-'}}</p>
                                        </figure>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.includes.newsletter')
</main>
@endsection