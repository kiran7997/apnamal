@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Home Comic Section <small>Home Comic Section ...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home Comic Section</a></li>
                <li class="active">Home Comic Section </li>
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
                            <h3 class="box-title">Home Comic Section  </h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-info">

                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
                                            @if( count($errors) > 0)
                                                @foreach($errors->all() as $error)
                                                    <div class="alert alert-success" role="alert">
                                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                                        <span class="sr-only">{{ trans('labels.Error') }}:</span>
                                                        {{ $error }}
                                                    </div>
                                                @endforeach
                                            @endif

                     {!! Form::open(array('url' =>'admin/home-comic', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">Title</label>
                                        <div class="col-sm-10 col-md-4">
                                            <input type="text" name="title" required value="{{isset($comic->title) ? $comic->title : null}}" class="form-control field-validate">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">Description</label>
                                        <div class="col-sm-10 col-md-8">
                                            <textarea id="editor" name="description" class="form-control field-validate" required rows="10" cols="80">{{isset($comic->description) ? $comic->description : null}}</textarea>
                                        </div>
                                    </div>
                                           
                                    <div class="form-group" id="imageIcone">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
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
                                                            <select class="image-picker show-html " name="image" id="select_img">
                                                                <option value=""></option>
                                                                @foreach($allimage as $key=>$image)
                                                                  <option data-img-src="{{asset($image->path)}}" <?php if(isset($comic->comic_img) && $comic->comic_img == $image->id) { echo 'selected'; } ?> class="imagedetail" data-img-alt="{{$key}}" value="{{$image->id}}"> {{$image->id}} </option>
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
                                              {!! Form::button(trans('labels.Add Image'), array('id'=>'newIcon','class'=>"btn btn-primary field-validate", 'data-toggle'=>"modal", 'data-target'=>"#ModalmanufacturedICone" )) !!}
                                              <br>
                                              <div id="selectedthumbnailIcon" class="selectedthumbnail col-md-5"> </div>
                                              <div class="closimage">
                                                  <button type="button" class="close pull-left image-close " id="image-Icone"
                                                    style="display: none; position: absolute;left: 105px; top: 54px; background-color: black; color: white; opacity: 2.2; " aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  
                                                  @if(!empty($comic->comic_img))
                                                  <?php
                                                  $image_categories2 = DB::table('image_categories')->where('image_id',$comic->comic_img)->value('path');
                                                ?>
                                                  <img width="80px" src="{{asset($image_categories2)}}" class="img-circle">
                                                  @endif
                                              </div>
                                            </div>
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ImageText') }}</span>
                                            <br>
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
