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
            <div class="ps-block--payment-success">
                <h3>Payment Success !</h3>
                <p>Thank you for your membership. We will contact with you soon.</p>
            </div>
        </div>
    </section>
</main>
@endsection