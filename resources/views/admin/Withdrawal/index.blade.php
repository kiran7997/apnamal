@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Withdrawal <small>Withdrawal...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class=" active">Withdrawal</li>
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
                       <?php
                        $check_balance = $sold_cost_vendor_completed-$left_balance;
                       ?>
                      @if($check_balance > 0)
                        <div class="box-tools pull-right">
                            <a href="javascript:;" data-toggle="modal" data-target="#withdrawal" class="btn btn-block btn-primary">Withdrawal Request</a>
                        </div>
                        @endif
                     

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
                                <p class="col-sm-6 col-lg-4"><strong >Available Balance : </strong><span><i class="fa fa-inr" aria-hidden="true"></i> {{number_format($sold_cost_vendor_completed-$left_balance),2}}</span></p>
                                <p class="col-sm-6 col-lg-4"><strong >Pending Withdrawal : </strong><span></span><i class="fa fa-inr" aria-hidden="true"></i> {{number_format($pending_amount),2}}</p>
                                <p class="col-sm-6 col-lg-4"><strong >Approve Withdrawal : </strong><span></span><i class="fa fa-inr" aria-hidden="true"></i> {{number_format($approved_amount),2}}</p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Withdrawal Request</th>
                                            <th>Special Notes</th>
                                            <th>Withdrawal Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @if(count($withdrawal)>0)
                                            @foreach($withdrawal as $i=> $row)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$row->withdrawal_request}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#specialNotes{{$row->id}}">
                                                            Notes
                                                        </button>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y')}}</td>
                                                    <td>
                                                    @if($row->status == 0)
                                                        <span class="btn btn-warning">Pending</span>
                                                      @elseif($row->status == 1)
                                                        <span class="btn btn-success">Approved</span>
                                                      @else
                                                        <span class="btn btn-danger">Canceled</span>
                                                      @endif
                                                <!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>-->
                                                <!-- <a href="" title="View Earning" class="badge bg-light-blue"><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                                <!-- <a  href="" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                                                    </td>
                                                </tr>
                                                
                                        <div class="container">
                                            <!-- Button to Open the Modal -->
                                            <!-- The Modal -->
                                            <div class="modal fade" id="specialNotes{{$row->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Special Notes</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            {{$row->special_notes}}
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                            @endforeach
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
            
            <div class="container">
                <!-- Button to Open the Modal -->
                <!-- The Modal -->
                <div class="modal fade" id="withdrawal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Withdrawal Request</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        <?php
                        $check_balance = $sold_cost_vendor_completed-$left_balance;
                       ?>
                            <div class="modal-header">
                                <h4 class="modal-title">Available Balance</h4>
                                <strong>{{number_format($sold_cost_vendor_completed-$left_balance),2}}</strong>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{url('admin/withdrawal')}}" method="post">
                                    <input type="hidden" name="checkbalance" id="checkbalance" value="{{$check_balance}}"/>
                                    <div class="form-group">
                                        <label>Enter Amount<span  style="color:red"> *</span></label>
                                        <input type="number" required min="0" id="withdrawal_request" name="withdrawal_request" class="form-control"/>
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Special Notes</label>
                                        <textarea name="special_notes" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group" id="withdrawalAmount">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

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
