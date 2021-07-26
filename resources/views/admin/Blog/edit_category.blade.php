@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Edit Category<small>Edit Blog ...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li><a href="{{URL::to('admin/blog-category')}}"><i class="fa fa-dashboard"></i>Blog Category</a></li>
                <li class="active">Edit Category</li>
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
                            <h3 class="box-title">Edit Category </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-info">

                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
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

                     {!! Form::open(array('url' =>'admin/update-category', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                             <input type="hidden" name="id" value="{{isset($id) ? $id : null}}"/>
                                    
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">Parent Category</label>
                                    <div class="col-sm-10 col-md-4">
                                        <select name="parent_id" class="form-control">
                                            <option value="">Select Parent Category</option>
                                        @if(count($categories)>0)
                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}"<?php if(isset($data->parent_id)){ if($data->parent_id == $categorie->id) { echo 'selected'; }} ?>>{{$categorie->cat_name}}</option>
                                            @endforeach
                                         @endif
                                        </select>
                                    </div>
                                </div>
                     
                                <div class="form-group">
                                    <label for="cat_name" class="col-sm-2 col-md-3 control-label">Category Name</label>
                                    <div class="col-sm-10 col-md-4">
                                        <input type="text" name="cat_name" required value="{{isset($data->cat_name) ? $data->cat_name : null}}" class="form-control field-validate">
                                    </div>
                                </div>
                             
                             <div class="form-group">
                                    <label for="status" class="col-sm-2 col-md-3 control-label">Status</label>
                                    <div class="col-sm-10 col-md-4">
                                        <select name="status" class="form-control">
                                            <option value="1"<?php if(isset($data->status)){ if($data->status == 1) { echo 'selected'; }} ?>>Active</option>
                                            <option value="0"<?php if(isset($data->status)){ if($data->status == 0) { echo 'selected'; }} ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                     
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                    <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }} </button>
                                </div>
                               <!-- /.box-footer -->
                                    {!! Form::close() !!}
                                        </div>
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
    <script src="{!! asset('plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
    <script type="text/javascript">
        $(function () {
            //for multiple languages
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();

        });
    </script>
@endsection
