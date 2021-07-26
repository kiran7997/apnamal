@extends('web.layout')
@section('content')
<div class="ps-page--single" id="contact-us">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
    <div class="ps-contact-info">
        <div class="container">
            <div class="ps-section__header">
                <h3>Contact Us For Any Questions</h3>
            </div>
            <?php $contact_setting = DB::table('settings')->get(); ?>
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--contact-info">
                            <h4>Contact Directly</h4>
                            <p><a href="javascript:;"><?= stripslashes($contact_setting[3]->value) ?></a><span><?= stripslashes($contact_setting[11]->value) ?></span></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--contact-info">
                            <h4>Head Quarter</h4>
                            <p><span><?= stripslashes($contact_setting[4]->value) ?>, <?= stripslashes($contact_setting[5]->value) ?>, <?= stripslashes($contact_setting[6]->value) ?> <?= stripslashes($contact_setting[7]->value) ?>, <?= stripslashes($contact_setting[8]->value) ?></span></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--contact-info">
                            <h4>Vendor Support</h4>
                            <p><a href="javascript:;"><?= stripslashes($contact_setting[3]->value) ?></a><span><?= stripslashes($contact_setting[11]->value) ?></span></p>
                        </div>
                    </div>
<!--                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--contact-info">
                            <h4>Customer Service</h4>
                            <p><a href="#"><?php //stripslashes($contact_setting[3]->value) ?></a><span><?php //stripslashes($contact_setting[11]->value) ?></span></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--contact-info">
                            <h4>Media Relations</h4>
                            <p><a href="#">media@martfury.com</a><span>(801) 947-3564</span></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--contact-info">
                            <h4>Work With Us</h4>
                            <p><span>Send your CV to our email:</span><a href="#"><?= stripslashes($contact_setting[3]->value) ?></a></p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="ps-contact-form">
        <div class="container">
            <form class="ps-form--contact-us" action="{{URL::to('/contact-us')}}" method="post">
                {{csrf_field()}}
                <h3>Get In Touch</h3>
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
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" required type="text" placeholder="Name *" name="name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" required type="text" placeholder="Email *" name="email">
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
@include("web.includes.newsletter")
@endsection