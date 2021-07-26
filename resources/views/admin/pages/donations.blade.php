@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Donations <small>Listing All The Donations...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
            <li class="active">Donations </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
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
                                <table id="examplee" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>@sortablelink('Name', trans('labels.Name') )</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($donations)>0)
                                        @foreach($donations as  $key=>$data)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                {{ $data->name }}
                                            </td>
                                            <td>
                                                {{ $data->email }}
                                            </td>
                                            <td>
                                                {{ $data->phone }}
                                            </td>
                                            <td>
                                                {{ $data->subject }}
                                            </td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.View') }}" href="donation/{{ $data->id }}" class="badge bg-light-blue"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                @if($data->status==0)
                                                <a data-toggle="tooltip" data-placement="bottom" title="Click to Complete" href="donation/{{ $data->id }}/1" class="badge bg-red">Pending</a>
                                                @else
                                                <a href="javascript:;" class="badge bg-light-blue">Completed</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">{{ trans('labels.NoRecordFound') }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="col-xs-12 text-right">
                                    {!! $donations->appends(\Request::except('page'))->render() !!}
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection