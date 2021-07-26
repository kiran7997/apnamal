@extends('web.layout')
@section('content')
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>User Information</li>
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                @include('web.includes.user_sidebar')
                <div class="col-lg-8">
                    <div class="ps-section__right">
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
                        <form class="ps-form--account-setting" action="{{URL::to('/updateMyProfile')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="ps-form__header">
                                <h3> User Information</h3>
                            </div>
                            <div class="ps-form__content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" name="customers_firstname" value="{{auth()->guard('customer')->user()->first_name}}" placeholder="Please enter first name...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="customers_lastname" value="{{auth()->guard('customer')->user()->last_name}}" placeholder="Please enter last name...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" type="text" name="customers_telephone" value="{{auth()->guard('customer')->user()->phone}}" placeholder="Please enter phone number...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="customers_email_address" value="{{auth()->guard('customer')->user()->email}}" placeholder="Please enter your email...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Birthday</label>
                                            <input class="form-control" name="customers_dob" type="date" value="{{auth()->guard('customer')->user()->dob}}" placeholder="Please enter your birthday...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="1" <?php if(auth()->guard('customer')->user()->gender==1){echo 'selected';} ?>>Male</option>
                                                <option value="0" <?php if(auth()->guard('customer')->user()->gender==0){echo 'selected';} ?>>Female</option>
                                                <option value="2" <?php if(auth()->guard('customer')->user()->gender==2){echo 'selected';} ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Profile Pic</label>
                                            <input class="form-control" name="picture" type="file">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" name="password" type="password" placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input class="form-control" name="re_password" type="password" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group submit">
                                <button class="ps-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.includes.newsletter')
</main>
@endsection