@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Advertisement <small>Advertisement...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="javascript:;"><i class="fa fa-bars"></i>Advertisement</a></li>
      <li class="active">Advertisement</li>
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
            <h3 class="box-title">Advertisement</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                        <br>
                        @if (count($errors) > 0)
                              @if($errors->any())
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  {{$errors->first()}}
                                </div>
                              @endif
                          @endif

                        <!-- form start -->
                         <div class="box-body">

                            {!! Form::open(array('url' =>'admin/advertisement', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                            	
                                <div class="form-group" id="imageIcone">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">Home Banner Right 1<span style="color:red;">*</span></label>
                                    <div class="col-sm-10 col-md-4">
                                        <!-- Modal -->
                                        <div class="modal fade embed-images" id="Modalmanufactured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" id="closemodal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h3 class="modal-title text-primary" id="myModalLabel">{{ trans('labels.Choose Image') }} </h3>
                                                    </div>
                                                    <div class="modal-body manufacturer-image-embed">

                                                        @if(isset($allimage))

                                                        <select class="image-picker show-html " name="home_right_1" id="select_img">
                                                            <option value=""></option>
                                                            @foreach($allimage as $key=>$image)
                                                              <option data-img-src="{{asset($image->path)}}" class="imagedetail" data-img-alt="{{$key}}" value="{{$image->id}}" <?php if(isset($advertisements->home_right_1) && $advertisements->home_right_1==$image->id){echo 'selected';} ?>> {{$image->id}} </option>
                                                            @endforeach
                                                        </select>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{url('admin/media/add')}}" target="_blank" class="btn btn-primary pull-left" >{{ trans('labels.Add Icon') }}</a>
                                                        <button type="button" class="btn btn-default refresh-image"><i class="fa fa-refresh"></i></button>
                                                        <button type="button" class="btn btn-success" id="selectedICONE" data-dismiss="modal">{{ trans('labels.Done') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  id ="imageselected">
                                                {!! Form::button(trans('labels.Add Icon'), array('id'=>'newImage','class'=>"btn btn-primary", 'data-toggle'=>"modal", 'data-target'=>"#Modalmanufactured" )) !!}
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 3px;">{{ trans('labels.LanguageFlag') }}</span>
                                                <div class="closimage">
                                                    <button type="button" class="close pull-right" id="image-close" style="display: none; position: absolute;left: 91px; top: 54px; background-color: black; color: white; opacity: 2.2;" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div  id="selectedthumbnail"></div>
                                                <br>
                                                @if(!empty($advertisements))
                                                <?php
                                                  $image_categories = DB::table('image_categories')->where('image_id',$advertisements->home_right_1)->value('path');
                                                ?>
                                                    <img width="80px" src="{{asset($image_categories)}}" class="img-circle">
                                                @else
                                                    <img width="80px" src="{{asset($image_categories) }}" class="img-circle">
                                                @endif
                                            </div>

                                        <br>
                                    </div>
                                </div>
                            
                            <div class="form-group" id="imageIcone">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">Home Banner Right 2<span style="color:red;">*</span></label>
                                            <div class="col-sm-10 col-md-4">
                                                <!-- Modal -->
                                                <div class="modal fade" id="ModalmanufacturedICone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" id="closemodal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <h3 class="modal-title text-primary" id="myModalLabel">{{ trans('labels.Choose Image') }} </h3>
                                                              </div>
                                                            <div class="modal-body manufacturer-image-embed">
                                                                @if(isset($allimage))
                                                                <select class="image-picker show-html" name="home_right_2" id="select_img">
                                                                    <option value=""></option>
                                                                    @foreach($allimage as $key=>$image)
                                                                      <option data-img-src="{{asset($image->path)}}" class="imagedetail" data-img-alt="{{$key}}" value="{{$image->id}}" <?php if(isset($advertisements->home_right_2) && $advertisements->home_right_2==$image->id){echo 'selected';} ?>> {{$image->id}} </option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                              <a href="{{url('admin/media/add')}}" target="_blank" class="btn btn-primary pull-left" >{{ trans('labels.Add Image') }}</a>
                                                              <button type="button" class="btn btn-default refresh-image"><i class="fa fa-refresh"></i></button>
                                                              <button type="button" class="btn btn-primary" id="selectedICONE" data-dismiss="modal">{{ trans('labels.Done') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="imageselected">
                                                  {!! Form::button(trans('labels.Add Icon'), array('id'=>'newIcon','class'=>"btn btn-primary", 'data-toggle'=>"modal", 'data-target'=>"#ModalmanufacturedICone" )) !!}
                                                  <br>
                                                  <div id="selectedthumbnailIcon" class="selectedthumbnail col-md-5"> </div>
                                                  <div class="closimage">
                                                      <button type="button" class="close pull-left image-close " id="image-Icone"
                                                        style="display: none; position: absolute;left: 105px; top: 54px; background-color: black; color: white; opacity: 2.2; " aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                      
                                                      @if(!empty($advertisements))
                                                <?php
                                                  $image_categories2 = DB::table('image_categories')->where('image_id',$advertisements->home_right_2)->value('path');
                                                ?>
                                                    <img width="80px" src="{{asset($image_categories2)}}" class="img-circle">
                                                @else
                                                    <img width="80px" src="{{asset($image_categories2) }}" class="img-circle">
                                                @endif
                                                  </div>
                                                </div>
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryIconText') }}</span>

                                            </div>
                                        </div>
                            
                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }}</button>
                                <a href="{{ URL::to('admin/sliders')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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
@endsection
