@extends('web.layout')
@section('content')
<div class="ps-page--single" id="contact-us">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>Donate</li>
            </ul>
        </div>
    </div>
    <div class="ps-contact-form">
        <div class="container">
            <form class="ps-form--contact-us" action="{{URL::to('/donate')}}" method="post">
                {{csrf_field()}}
                <h3>Donate</h3>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></a>
                    <ul style="list-style: none;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name *" name="name">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Email *" name="email">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Phone *" name="phone">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Address *" name="address">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Subject *" name="subject">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Message" name="message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group submit">
                    <button type="submit" class="ps-btn">Send message</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection