@extends('web.layout')
@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>{!! isset($data) ? $data->name : null !!}</li>
            </ul>
        </div>
    </div>
</div>

<div class="return_refund_wrap">
    <div class="ps-about-intro">
        <div class="container">
            <div class="">
              {!! isset($data) ? $data->description : null !!}
            </div>
        </div>
    </div>
</div>
@endsection