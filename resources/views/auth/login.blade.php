@extends('web.layout')
@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account mb-4">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="{{url('/process-login')}}" method="post">
                {{csrf_field()}}
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Login</a></li>
                </ul>
                @if(Session::has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">@lang('website.Error'):</span>
                        {!! session('loginError') !!}
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
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Login Your Account</h5>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group submtit">
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Login</button>
                            </div>
                            <div class="form-group submtit">
                                <a href="{{URL::to('/signup')}}">Do not have an account? Register Now</a>
                            </div>
                            <div class="form-group submtit">
                                <a href="{{URL::to('/forgotPassword')}}">Forgot Password? Reset Now</a>
                            </div>
                        </div>
                        <?php $social_logins = DB::table('settings')->get(); ?>
                         @if($social_logins[2]->value==1 || $social_logins[61]->value==1)
                        <div class="ps-form__footer">
                            <!--<p>Connect with:</p>
                            <ul class="ps-list--social">
                                @if($social_logins[2]->value==1)
                                    <li><a class="facebook" href="{{URL::to('/login/facebook')}}"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if($social_logins[61]->value==1)
                                    <li><a class="google" href="{{URL::to('/login/google')}}"><i class="fa fa-google-plus"></i></a></li>
                                @endif
                            </ul>@endif -->
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection