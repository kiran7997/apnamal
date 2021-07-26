@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> View Donation <small> View Donation...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
            <li><a href="{{ URL::to('admin/donations')}}"><i class="fa fa-dashboard"></i>  Listing All The Donations</a></li>
            <li class="active"> View Donation</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="invoice" style="margin: 15px;">
        <!-- title row -->
        @if(session()->has('message'))
        <div class="col-xs-12">
            <div class="row">
                <div class="alert alert-success alert-dismissible">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i> {{ trans('labels.Successlabel') }}</h4>
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="col-xs-12">
            <div class="row">
                <div class="alert alert-warning alert-dismissible">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-warning"></i> {{ trans('labels.WarningLabel') }}</h4>
                    {{ session()->get('error') }}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
                    <i class="fa fa-globe"></i> Donation# {{ $donation->id }}
                    <small style="display: inline-block">Donation Date: {{ date('m/d/Y', strtotime($donation->created_at)) }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
                {{ trans('labels.CustomerInfo') }}:
                <address>
                    <strong>{{ $donation->name }}</strong><br>
                    {{ trans('labels.Address') }}: {{ $donation->address }}<br>
                    {{ trans('labels.Phone') }}: {{ $donation->phone }}<br>
                    {{ trans('labels.Email') }}: {{ $donation->email }}
                </address>
                <p>Subject: {{ $donation->subject }}</p>
                <p>Description: {{ $donation->message }}</p>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection