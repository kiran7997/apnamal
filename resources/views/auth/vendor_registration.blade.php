@extends('web.layout')
@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>Vendor Registration</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account mb-4">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="{{URL::to('/vendor-registration')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="2" name="user_type">
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
                <h4 class="text-center">Vendor Registration</h4>
                <div class="ps-form__content">
                    <h5>Create Your Account</h5>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Enter Your Name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email address" name="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Your Firm Name" name="company" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel:" placeholder="Enter Your Mobile No." name="phone" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="country" name="country_code" required>
                            @if(count($countries)>0)
                            @foreach($countries as $country)
                            <option value="{{$country->countries_id}}">{{$country->countries_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="zone" name="zone" required>
                            @if(count($zones)>0)
                            @foreach($zones as $zone)
                            <option value="{{$zone->zone_id}}">{{$zone->zone_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group form-forgot">
                        <input class="form-control" type="password" name="password" placeholder="Enter Your Password">
                    </div>
                    <div class="form-group form-forgot">
                        <input class="form-control" type="password" name="re_password" placeholder="Enter Confirm Password">
                    </div>
                    <div class="form-group">
                        <div class="ps-checkbox">
                            <input class="form-control" type="checkbox" id="remember-me" checked name="remember-me" required>
                            <label for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group submtit">
                        <button class="ps-btn ps-btn--fullwidth">Register</button>
                        <div class="text-right my-5">Already have an account?<a href="{{URL::to('/login')}}"> Sign In</a></div>
                        <div class="text-right my-5">&nbsp;</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection