@extends('web.layout')
@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account mb-4">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="{{url('/signupProcess')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="1" name="user_type">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#register">Register</a></li>
                </ul>
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
                <div class="ps-tabs">
                    <div class="ps-tab active" id="register">
                        <div class="ps-form__content">
                            <h5>Register Your Account</h5>
                            <div class="form-group">
                                <input class="form-control" type="text" name="first_name" placeholder="Enter Your Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email address" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="tel:" name="phone" placeholder="Enter Your Phone No." required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="country" name="country_code" required>
                                    @if(count($countries)>0)
                                    @foreach($countries as $country)
                                    <option value="{{$country->countries_id}}" @if($country->countries_id == 223) selected @endif>{{$country->countries_name}}</option>
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
                                    <label for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group submtit">
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Register</button>
                                <p class="mt-5 text-left"><a href="{{URL::to('/login')}}">Already have an account? Sign in</a></p>
                            </div>
                        </div>
                        <div class="ps-form__footer">
                            <!--<p>Connect with:</p>
                            <ul class="ps-list--social">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
