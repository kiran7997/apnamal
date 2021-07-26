@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Edit Blog<small>Edit Blog ...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li><a href="{{URL::to('admin/blog')}}"><i class="fa fa-dashboard"></i>Blog</a></li>
                <li class="active">Edit Blog</li>
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
                            <h3 class="box-title">Edit Blog</h3>
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

                     {!! Form::open(array('url' =>'admin/update-blog', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                             <input type="hidden" name="id" value="{{isset($id) ? $id : null}}"/>
                                    
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">Category</label>
                                    <div class="col-sm-10 col-md-4">
                                        <select name="cat_id" class="form-control" required class="form-control field-validate">
                                            <option value="">Select Category</option>
                                        @if(count($categories)>0)
                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}"<?php if(isset($data->cat_id)) { if($data->cat_id == $categorie->id) { echo 'selected'; }} ?>>{{$categorie->cat_name}}</option>
                                            @endforeach
                                         @endif
                                        </select>
                                    </div>
                                </div>
                     
                                <div class="form-group">
                                    <label for="cat_name" class="col-sm-2 col-md-3 control-label">Title</label>
                                    <div class="col-sm-10 col-md-4">
                                        <input type="text" name="title" required value="{{isset($data->title) ? $data->title : null}}" class="form-control field-validate">
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label for="cat_name" class="col-sm-2 col-md-3 control-label">Description</label>
                                    <div class="col-sm-10 col-md-4">
                                        <textarea name="description" rows="5" class="form-control field-validate" required>{{isset($data->description) ? $data->description : null}}</textarea>
                                    </div>
                                </div>
                             
                             <div class="form-group" id="imageIcone">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">About Us Banner</label>
                                        <div class="col-sm-10 col-md-4">
                                            <!-- Modal -->
                                            <div class="modal fade embed-images" id="ModalmanufacturedICone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" id="closemodal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h3 class="modal-title text-primary" id="myModalLabel">{{ trans('labels.Choose Image') }} </h3>
                                                        </div>
                                                        <div class="modal-body manufacturer-image-embed"> 
                                                            @if(isset($allimage))
                                                            <select class="image-picker show-html " name="image_id" id="select_img">
                                                                <option value=""></option>
                                                                @foreach($allimage as $key=>$image)
                                                                <option data-img-src="{{asset($image->path)}}" <?php if(isset($data->image_id) && $data->image_id == $image->id) { echo 'selected'; } ?> class="imagedetail" data-img-alt="{{$key}}" value="{{$image->id}}"> {{$image->id}} </option>
                                                                @endforeach
                                                            </select>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{url('admin/media/add')}}" target="_blank" class="btn btn-primary pull-left" >{{ trans('labels.Add Image') }}</a>
                                                            <button type="button" class="btn btn-default refresh-image"><i class="fa fa-refresh"></i></button>
                                                            <button type="button" class="btn btn-success" id="selectedICONE" data-dismiss="modal">{{ trans('labels.Done') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="imageselected">
                                              {!! Form::button(trans('labels.Add Image'), array('id'=>'newIcon','class'=>"btn btn-primary", 'data-toggle'=>"modal", 'data-target'=>"#ModalmanufacturedICone" )) !!}
                                              <br>
                                              <div id="selectedthumbnailIcon" class="selectedthumbnail col-md-5"> </div>
                                              <div class="closimage">
                                                  <button type="button" class="close pull-left image-close " id="image-Icone"
                                                    style="display: none; position: absolute;left: 105px; top: 54px; background-color: black; color: white; opacity: 2.2; " aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  @if(!empty($data->image_id))
                                                  <?php
                                                  $blog_image = DB::table('image_categories')->where('image_id',$data->image_id)->value('path');
                                                ?>
                                                  <img width="100px" src="{{asset($blog_image)}}" class="img-circle">
                                                  @endif
                                              </div>
                                            </div>
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ImageText') }}</span>
                                            <br>
                                        </div>
                                    </div>
                             
                             <div class="form-group">
                                    <label for="status" class="col-sm-2 col-md-3 control-label">Status</label>
                                    <div class="col-sm-10 col-md-4">
                                        <select name="status" class="form-control">
                                            <option value="1"<?php if(isset($data->status)) { if($data->status == 1) { echo 'selected'; }} ?>>Active</option>
                                            <option value="0"<?php if(isset($data->status)) { if($data->status == 0) { echo 'selected'; }} ?>>Inactive</option>
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
