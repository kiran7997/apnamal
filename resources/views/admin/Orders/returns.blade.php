@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> {{ trans('labels.Orders') }} <small>Listing all Order Returns...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class="active">{{ trans('labels.Orders') }}</li>
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
                            <h3 class="box-title">Listing all Order Returns </h3>
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
                                    @if(Session::has('message'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CustomerName</th>
                                            <th>Reason</th>
                                            <th>OrderTotal</th>
                                            <th>DatePurchased</th>
                                            <th>Status </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                          @if(count($listingOrders['orders'])>0)
                                            @foreach ($listingOrders['orders'] as $key=>$orderData)
                                                <tr>
                                                    <td>{{$orderData->id}}</td>
                                                    <td>{{$orderData->customers_name}}</td>
                                                    <td>
                                                        {{  \App\Models\Web\OrderReturns::$reasons[$orderData->reason]}}
                                                        @if(!empty($orderData->comments))
                                                            <ul style="list-style:none;">
                                                                <li><b>Comment :</b></li>
                                                                <li>{{$orderData->comments}}</li>
                                                            </ul>
                                                        @endif                                                        
                                                    </td>
                                                    <td>{{$orderData->total_price}}</td>
                                                    <td>{{$orderData->date_purchased}}</td>
                                                    <td>
                                                        @if($orderData->orders_status_id==1)
                                                        <span class="label label-warning">
                                                        @elseif($orderData->orders_status_id==0)
                                                        <span class="label label-success">
                                                        @else
                                                        <span class="label label-danger">
                                                        @endif
                                                        {{ $orderData->orders_status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Approve" href="approveReturn/{{ $orderData->order_product_id }}" class="badge bg-light-blue"><i class="fa fa-check-square-o" aria-hidden="true"></i><span> Approve</span></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Decline" href="declineReturn/{{ $orderData->order_product_id }}" class="badge bg-red"><i class="fa fa-times" aria-hidden="true"></i><span> Decline</span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr style="text-align: center;">
                                                <td colspan="7"><strong>{{ trans('labels.NoRecordFound') }}</strong></td>
                                            </tr>
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
        </section>
        <!-- /.content -->
    </div>
@endsection
