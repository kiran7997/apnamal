@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Vendors <small>Vendors...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class=" active">Vendors</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            {{--<h3 class="box-title">{{ trans('labels.ListingAllManufacturers') }} </h3>--}}

                            <!--  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6 form-inline">
                                                <form name='filter' id="registration" class="filter  " method="get" action="{{url('admin/manufacturers/filter')}}">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="input-group-form search-panel ">
                                                      <select type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="FilterBy" id="FilterBy" >
                                                        <option value="" selected disabled hidden>{{trans('labels.Filter By')}}</option>
                                                        <option value="Name" @if(isset($name)) @if  ($name == "Name") {{ 'selected' }} @endif @endif>{{trans('labels.Name')}}</option>
                                                        <option value="URL" @if(isset($name)) @if  ($name == "URL") {{ 'selected' }} @endif @endif>{{trans('labels.URL')}}</option>
                                                      </select>
                                                      <input type="text" class="form-control input-group-form " name="parameter" placeholder="{{trans('labels.Search')}}..." id="parameter" @if(isset($param)) value="{{$param}}" @endif>
                                                      <button class="btn btn-primary " type="submit" id="submit"><span class="glyphicon glyphicon-search"></span></button>
                                                      @if(isset($param,$name))  <a class="btn btn-danger " href="{{URL::to('admin/manufacturers/display')}}"><i class="fa fa-ban" aria-hidden="true"></i> </a>@endif
                                                    </div>
                                                </form>
                                                <div class="col-lg-4 form-inline" id="contact-form12"></div>
                                        </div>
                                    </div>
                                </div>-->

                        <!--  <div class="box-tools pull-right">
                                <a href="javascript:;" type="button" class="btn btn-block btn-primary">Vendors</a>
                            </div>-->
                        
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if (count($errors) > 0)					
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        <h4 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Error!</h4>
                                        <ul class="mb-0 px-0 list-style-none">
                                            @foreach ($errors->all() as $error)
                                            <li><i class="fa fa-chevron-right"></i> {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        <h4 class="text-success mb-0"><i class="fa fa-check-circle"></i> {{ Session::get('flash_message') }}</h4>
                                    </div>
                                    @endif
                                </div>
                            </div>
                           
                            <div class="row">
                           <!--  <p class="col-sm-6 col-lg-4"><strong >Total Earnings : </strong><span>{{number_format($sold_cost_vendor_completed),2}}</span></p>
                                 <p class="col-sm-6 col-lg-4"><strong >Pending Earnings : </strong><span>{{number_format($sold_cost_vendor_pending),2}}</span></p>
                                 <p class="col-sm-6 col-lg-4"><strong >Delivered Earnings : </strong><span>{{number_format($sold_cost_vendor_completed),2}}</span></p>-->
                             <p class="col-sm-6 col-lg-6"><strong >Total Earned : </strong><span>{{number_format($total_earned),2}}</span></p>
                             <p class="col-sm-6 col-lg-6"><strong >Total Products : </strong><span>{{$total_products}}</span></p>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty Sold</th>
                                            <th>Commission</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php $productsale = 0; $productcomission = 0; ?>
                                        @if(count($products)>0)
                                          <?php $i=1; ?>
                                            @foreach($products as $product)
                                            <?php $date = \Carbon\Carbon::parse($product->date_purchased); ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$date->isoFormat('MMM D, YYYY')}}</td>
                                                <td>{{$product->products_name}}</td>
                                                <td><i class="fa fa-inr"></i>{{$product->products_price}}</td>
                                                <td>{{$product->products_quantity}}</td> 
                                                <td><i class="fa fa-inr"></i>{{$product->final_price}}</td>
                                            </tr>
                                            <?php 
                                            $i++;
                                            ?>
                                            <?php $productsale += $product->products_quantity; $productcomission += $product->final_price; ?>
                                            @endforeach
                                            <tr>
                                                <td colspan="4"><strong>Total</strong></td>
                                                <td><strong>{{$productsale}} Sale</strong></td>
                                                <td colspan="3"><strong><i class="fa fa-inr"></i>{{$productcomission}}</strong></td>
                                            </tr>
                                        @endif
                                              
                                        </tbody>
                                    </table>
                                  
                                    <div class="col-xs-12 text-right">
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->

            <!-- deleteManufacturerModal -->
            <div class="modal fade" id="manufacturerModal" tabindex="-1" role="dialog" aria-labelledby="deleteManufacturerModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="deleteManufacturerModalLabel">{{ trans('labels.DeleteManufacturer') }}</h4>
                        </div>
                        {!! Form::open(array('url' =>'admin/manufacturers/delete', 'name'=>'deleteManufacturer', 'id'=>'deleteManufacturer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                        {!! Form::hidden('manufacturers_id',  '', array('class'=>'form-control', 'id'=>'manufacturers_id')) !!}
                        <div class="modal-body">
                            <p>{{ trans('labels.DeleteManufacturerText') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ trans('labels.Delete') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
