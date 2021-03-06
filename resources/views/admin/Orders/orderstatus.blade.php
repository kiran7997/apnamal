@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>  {{ trans('labels.OrderStatus') }} <small>{{ trans('labels.ListingOrderStatus') }}...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class="active"> {{ trans('labels.OrderStatus') }}</li>
            </ol>
        </section>

        <!--  content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ trans('labels.ListingOrderStatus') }} </h3>
                            <div class="box-tools pull-right">
                                <a href="addorderstatus" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddOrderStatus') }}</a>
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if (count($errors) > 0)
                                        @if($errors->any())
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {{$errors->first()}}
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('labels.ID') }}</th>
                                            <th>{{ trans('labels.OrderStatus') }}</th>
                                            <th>{{ trans('labels.Default') }}</th>
                                            <th>{{ trans('labels.Status Type') }}</th>
                                            <th>{{ trans('labels.Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($result['orders_status'] as $OrderStatus)
                                            <tr>
                                                <td>{{ $OrderStatus->orders_status_id }}</td>
                                                <td>{{ $OrderStatus->orders_status_name }}</td>
                                                <td>@if($OrderStatus->public_flag==1) {{ trans('labels.Yes') }}  @else {{ trans('labels.No') }} @endif</td>
                                                <td>
                                                  @if($OrderStatus->role_id==2) <span  class="badge bg-light-blue">{{ trans('labels.General') }}</span>  @endif
                                                  @if($OrderStatus->role_id==3) <span  class="badge bg-green">{{ trans('labels.Vendors') }}</span>  @endif
                                                  @if($OrderStatus->role_id==4) <span  class="badge bg-grey"> {{ trans('labels.Delivery Boy') }}</span>  @endif
                                                </td>
                                                <td><a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editorderstatus/{{ $OrderStatus->orders_status_id }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    @if($OrderStatus->orders_status_id > 15) <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteOrderStatusId" orders_status_id ="{{ $OrderStatus->orders_status_id }}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>@endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-xs-12 text-right">
                                        {{$result['orders_status']->links()}}
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
            <!-- deleteOrderStatusModal -->
            <div class="modal fade" id="deleteOrderStatusModal" tabindex="-1" role="dialog" aria-labelledby="deleteOrderStatusModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="deleteOrderStatusModalLabel">{{ trans('labels.DeleteOrderStatus') }}</h4>
                        </div>
                        {!! Form::open(array('url' =>'admin/orders/deleteOrderStatus', 'name'=>'deleteOrderStatus', 'id'=>'deleteOrderStatus', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                        {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'orders_status_id')) !!}
                        <div class="modal-body">
                            <p>{{ trans('labels.DeleteOrderStatusText') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
                            <button type="submit" class="btn btn-primary" id="deleteOrderStatus">{{ trans('labels.Delete') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!--  row -->

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
