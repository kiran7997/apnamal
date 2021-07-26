@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Membership <small>Membership...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
            <li class=" active">Membership</li>
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
                            <div class="col-xs-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile No</th>
                                            <th>Details</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($membership)>0)
                                        @foreach($membership as $i=> $row)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->mobile}}</td>
                                            <td>
                                                <a href="{{url('admin/membership/'.$row->id)}}" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                @if($row->payment_status == '1')
                                                <a href="javascript:;" class="badge bg-red">Cancel</a>
                                                @else
                                                <a href="javascript:;" class="badge bg-light-blue">Completed</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->status == 0)
                                                <a href="{{url('admin/membership/'.$row->id.'/'.'approve')}}" class="badge bg-red">Pending</a>
                                                @else
                                                <a href="javascript:;" class="badge bg-light-blue">Approved</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
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