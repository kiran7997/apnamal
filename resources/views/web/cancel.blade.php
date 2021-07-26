@extends('web.layout')
@section('content')
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>Payment Success</li>
            </ul>
        </div>
    </div>
    
    <section class="ps-section--account">
        <div class="container">
            <div class="ps-block--payment-danger">
                <h3>Payment Cancel !</h3>
                <p>Your payment has been canceled</p>
            </div>
        </div>
    </section>
</main>
@endsection