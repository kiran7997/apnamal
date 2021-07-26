@extends('web.layout')
@section('content')
<div class="ps-page--single">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>Frequently Asked Questions</li>
            </ul>
        </div>
    </div>
    <div class="ps-faqs">
        <div class="container">
            <div class="ps-section__header">
                <h1>Frequently Asked Questions</h1>
            </div>
            <div class="demo-block">
                <div id="accordionGroup" class="Accordion">
                    @if(count($data)>0)
                    @foreach($data as $i=>$row)
                    <h3>
                        <button aria-expanded="<?php if($i==0){echo 'true';}else{echo 'false';} ?>"
                                class="Accordion-trigger"
                                aria-controls="sect{{$row->id}}"
                                id="accordion{{$row->id}}id">
                            <span class="Accordion-title">
                                {!!$row->title!!}
                                <span class="Accordion-icon"></span>
                            </span>
                        </button>
                    </h3>
                    <div id="sect{{$row->id}}"
                         role="region"
                         aria-labelledby="accordion{{$row->id}}id"
                         class="Accordion-panel"
                         <?php if($i>0){echo 'hidden';} ?>>
                        <div>
                            <fieldset>
                                <p>{!!$row->description!!}</p>
                            </fieldset>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="ps-call-to-action">
        <div class="container">
            <h3>We're Here to Help !<a href="#"> Contact us</a></h3>
        </div>
    </div>
</div>
@include("web.includes.newsletter")
@endsection