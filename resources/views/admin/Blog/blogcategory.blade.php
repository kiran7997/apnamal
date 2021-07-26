@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Blog Category <small>Blog Category...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class=" active">Blog Category</li>
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
                        </div>
                             <div class="box-tools pull-right">
                                <a href="{{url('admin/add-category')}}" type="button" class="btn btn-block btn-primary">Add Category</a>
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
                                            <th>Main Parent</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                     @if(count($categories)>0)  
                                        @foreach($categories as $i=> $category)
                                          <?php
                                            $parent = DB::table('blog_category')->where('id',$category->parent_id)->value('cat_name');
                                          ?>
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$category->cat_name}}</td>
                                            <td>{{$parent}}</td>
                                            <td>
                                                @if($category->status==1)
                                                <span class="badge bg-green">Active</span>
                                                @else
                                                  <span class="badge bg-red">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{url('admin/edit-category/'.$category->id)}}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a  href="{{url('admin/delete-category/'.$category->id)}}" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
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
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
