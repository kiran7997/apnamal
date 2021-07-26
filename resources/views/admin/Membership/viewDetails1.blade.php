@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Membership Details <small>Membership Details ...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Membership Details</a></li>
                <li class="active">Membership Details </li>
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
                        @if($data->member_type == 1)
                            <h3 class="box-title">Prime Membership</h3>
                          @else
                            <h3 class="box-title">Pro Membership</h3>
                        @endif
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

                     {!! Form::open(array('url' =>'admin/about-us', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}

                            <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Name</label>
                                  <div class="col-sm-10 col-md-4">
                                      <input type="text" readonly value="{{isset($data->name) ? $data->name : null}}" class="form-control field-validate">
                                  </div>
                              </div>
                     
                            <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Email</label>
                                  <div class="col-sm-10 col-md-4">
                                      <input type="text" readonly value="{{isset($data->email) ? $data->email : null}}" class="form-control field-validate">
                                  </div>
                              </div>
                     
                     <div class="form-group">
                         <label for="name" class="col-sm-2 col-md-3 control-label">Mobile No</label>
                         <div class="col-sm-10 col-md-4">
                             <input type="text" readonly value="{{isset($data->mobile) ? $data->mobile : null}}" class="form-control field-validate">
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <label for="name" class="col-sm-2 col-md-3 control-label">Street Address 1</label>
                         <div class="col-sm-10 col-md-4">
                             <textarea id="editor" readonly class="form-control field-validate" rows="3" cols="80">{{isset($data->address1) ? $data->address1 : null}}</textarea>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="name" class="col-sm-2 col-md-3 control-label">Address 2</label>
                         <div class="col-sm-10 col-md-4">
                             <textarea id="editor" readonly class="form-control field-validate" required rows="3" cols="80">{{isset($data->address2) ? $data->address2 : null}}</textarea>
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <label for="name" class="col-sm-2 col-md-3 control-label"> Alternate Phone No.</label>
                         <div class="col-sm-10 col-md-4">
                             <input type="text" readonly value="{{isset($data->phone) ? $data->phone : null}}" class="form-control field-validate">
                         </div>
                     </div>
                     <?php
                       $zones = DB::table('zones')->where('zone_country_id',99)->get();
                     ?>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">State.</label>
                        <div class="col-sm-10 col-md-4">
                            <select name="state" disabled class="form-control">
                                <option value="">Please Select</option>
                              @if(count($zones)>0)
                                 @foreach($zones as $zone)
                                 <option value="{{$zone->zone_id}}"<?php if(isset($data->zone_id)) { if($data->zone_id == $zone->zone_id) { echo 'selected'; }} ?>>{{$zone->zone_name}}</option>
                                 @endforeach
                              @endif
                           </select>
                        </div>
                    </div>
                     
                     <div class="form-group">
                         <label for="name" class="col-sm-2 col-md-3 control-label">City.</label>
                         <div class="col-sm-10 col-md-4">
                             <input type="text" readonly value="{{isset($data->city) ? $data->city : null}}" class="form-control field-validate">
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <label for="name" class="col-sm-2 col-md-3 control-label">ZIP / Postal Code.</label>
                         <div class="col-sm-10 col-md-4">
                             <input type="text" readonly value="{{isset($data->pincode) ? $data->pincode : null}}" class="form-control field-validate">
                         </div>
                     </div>
                     
                   @if($data->member_type == 1) 
                     <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">Books For Prime Membership.</label>
                        <div class="col-sm-10 col-md-4">
                            <select name="prime_membership_plan" disabled class="form-control">
                            <option value="">Prime Membership Plans</option>
                            <option value="1" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 1) { echo 'selected'; }} ?>>2 At-a-time Multiple order</option>
                            <option value="2" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 2) { echo 'selected'; }} ?>>4 At-a-time</option>
                            <option value="3" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 3) { echo 'selected'; }} ?>>6 At-a-time</option>
                            <option value="4" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 4) { echo 'selected'; }} ?>>9 At-a-time</option>
                            <option value="5" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 5) { echo 'selected'; }} ?>>12 At-a-time</option>
                            <option value="6" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 6) { echo 'selected'; }} ?>>15 At-a-time</option>
                            </select>
                        </div>
                    </div>
                   @endif
                  @if($data->member_type == 2)  
                     <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">Books For Pro Membership.</label>
                        <div class="col-sm-10 col-md-4">
                            <select name="prime_membership_plan" disabled class="form-control">
                            <option value="">Prime Membership Plans</option>
                            <option value="1" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 1) { echo 'selected'; }} ?>>1 At-a-time</option>
                            <option value="2" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 2) { echo 'selected'; }} ?>>2 At-a-time</option>
                            <option value="3" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 3) { echo 'selected'; }} ?>>3 At-a-time</option>
                            <option value="4" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 4) { echo 'selected'; }} ?>>4 At-a-time</option>
                            <option value="5" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 5) { echo 'selected'; }} ?>>5 At-a-time</option>
                            <option value="6" <?php if(isset($data->membership_plan)) { if($data->membership_plan == 6) { echo 'selected'; }} ?>>6 At-a-time</option>
                            </select>
                        </div>
                    </div>
                   @endif
                   
                   <?php
                    $books = DB::table('products')
                            ->join('products_description','products.products_id','=','products_description.products_id')
                            ->where('products.products_status',1)
                            ->get();
                   ?>
                   <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">Select Books.</label>
                        <div class="col-sm-10 col-md-4">
                            <select name="book" disabled class="form-control">
                            <option value="">Select Books</option>
                            @if(count($books)>0)
                             @foreach($books as $book)
                                <option value="{{$book->products_id}}"<?php if(isset($data->book)) { if($data->book == $book->products_id) { echo 'selected'; }} ?>>{{$book->products_name}}</option>
                             @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                   
                   <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">Select Months.</label>
                        <div class="col-sm-10 col-md-4">
                            <select name="months" disabled class="form-control">
                            <option value="">Select Months</option>
                            <option value="1"<?php if(isset($data->months)) { if($data->months == 1) { echo 'selected'; }} ?>>January</option>
                            <option value="2"<?php if(isset($data->months)) { if($data->months == 2) { echo 'selected'; }} ?>>February</option>
                            <option value="3"<?php if(isset($data->months)) { if($data->months == 3) { echo 'selected'; }} ?>>March</option>
                            <option value="4"<?php if(isset($data->months)) { if($data->months == 4) { echo 'selected'; }} ?>>>April</option>
                            <option value="5"<?php if(isset($data->months)) { if($data->months == 5) { echo 'selected'; }} ?>>May</option>
                            <option value="6"<?php if(isset($data->months)) { if($data->months == 6) { echo 'selected'; }} ?>>June</option>
                            <option value="7"<?php if(isset($data->months)) { if($data->months == 7) { echo 'selected'; }} ?>>July</option>
                            <option value="8"<?php if(isset($data->months)) { if($data->months == 8) { echo 'selected'; }} ?>>August</option>
                            <option value="9"<?php if(isset($data->months)) { if($data->months == 9) { echo 'selected'; }} ?>>September</option>
                            <option value="10"<?php if(isset($data->months)) { if($data->months == 10) { echo 'selected'; }} ?>>October</option>
                            <option value="11"<?php if(isset($data->months)) { if($data->months == 11) { echo 'selected'; }} ?>>November</option>
                            <option value="12"<?php if(isset($data->months)) { if($data->months == 12) { echo 'selected'; }} ?>>December</option>
                            </select>
                        </div>
                    </div>
                   
                   <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">Select Magazines.</label>
                        <div class="col-sm-10 col-md-4">
                            <select name="magazines" disabled class="form-control">
                            <option value="">Select Months</option>
                            <option value="1"<?php if(isset($data->magazines)) { if($data->magazines == 1) { echo 'selected'; }} ?>>Monthly</option>
                            <option value="2"<?php if(isset($data->magazines)) { if($data->magazines == 2) { echo 'selected'; }} ?>>Semi-Annual</option>
                            <option value="3"<?php if(isset($data->magazines)) { if($data->magazines == 3) { echo 'selected'; }} ?>>Annual</option>
                            </select>
                        </div>
                    </div>
                   
                   <div class="form-group">
                       <label for="name" class="col-sm-2 col-md-3 control-label">How did you find us</label>
                       <div class="col-sm-10 col-md-4">
                           <textarea id="editor" readonly class="form-control field-validate" rows="3" cols="80">{{isset($data->how_to_find) ? $data->how_to_find : null}}</textarea>
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
