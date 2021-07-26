
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.EditSliderImage')); ?> <small><?php echo e(trans('labels.EditSliderImage')); ?>...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li><a href="<?php echo e(URL::to('admin/sliders')); ?>"><i class="fa fa-bars"></i> <?php echo e(trans('labels.Sliders')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.EditSliderImage')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.EditSliderImage')); ?> </h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                    <br>
                        <?php if(count($errors) > 0): ?>
                              <?php if($errors->any()): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <?php echo e($errors->first()); ?>

                                </div>
                              <?php endif; ?>
                          <?php endif; ?>
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <!-- form start -->
                         <div class="box-body">

                            <?php echo Form::open(array('url' =>'admin/updateSlide', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>


                                <?php echo Form::hidden('id',  $result['sliders'][0]->sliders_id , array('class'=>'form-control', 'id'=>'id')); ?>

                                <?php echo Form::hidden('oldImage',  $result['sliders'][0]->sliders_image, array('id'=>'oldImage')); ?>


                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Language')); ?></label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="languages_id">
                                          <?php $__currentLoopData = $result['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($language->languages_id); ?>" <?php if($language->languages_id==$result['sliders'][0]->languages_id): ?> selected <?php endif; ?>><?php echo e($language->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      <?php echo e(trans('labels.ChooseLanguageText')); ?></span>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Title')); ?> </label>
                                  <div class="col-sm-10 col-md-4">
                                    <?php echo Form::text('sliders_title', $result['sliders'][0]->sliders_title, array('class'=>'form-control','id'=>'sliders_title')); ?>

                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.SliderTitletext')); ?></span>
                                  </div>
                                </div>
                                <input type="hidden" name="type" value="category">
<!--                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Categories')); ?></label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="type" id="bannerType">
                                          <option value="category" <?php if($result['sliders'][0]->type=='category'): ?> selected <?php endif; ?>>
                                          <?php echo e(trans('labels.ChooseSubCategory')); ?></option>
                                          <option value="product" <?php if($result['sliders'][0]->type=='product'): ?> selected <?php endif; ?>><?php echo e(trans('labels.Product')); ?></option>
                                          <option value="topseller" <?php if($result['sliders'][0]->type=='topseller'): ?> selected <?php endif; ?>><?php echo e(trans('labels.TopSeller')); ?></option>
                                          <option value="special" <?php if($result['sliders'][0]->type=='special'): ?> selected <?php endif; ?>><?php echo e(trans('labels.Deals')); ?></option>
                                          <option value="mostliked" <?php if($result['sliders'][0]->type=='mostliked'): ?> selected <?php endif; ?>><?php echo e(trans('labels.MostLiked')); ?></option>
                                      </select>
                                       <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      <?php echo e(trans('labels.ChooseSliderToAsscociateWith')); ?></span>
                                  </div>
                                </div>-->

                                <input type="hidden" name="categories_id" value="electronic">
<!--                                <div class="form-group categoryContent" <?php if($result['sliders'][0]->type!='category'): ?> style="display: none" <?php endif; ?> >
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Categories')); ?></label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="categories_id" id="categories_id">
                                      <?php $__currentLoopData = $result['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                		<option value="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      <?php echo e(trans('labels.CategoriessliderText')); ?></span>
                                  </div>
                                </div>-->

                                <div class="form-group productContent" <?php if($result['sliders'][0]->type!='product'): ?> style="display: none" <?php endif; ?>>
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Products')); ?></label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="products_id" id="products_id">
                                      <?php $__currentLoopData = $result['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                		<option value="<?php echo e($products_data->products_slug); ?>"><?php echo e($products_data->products_name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                     <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      <?php echo e(trans('labels.ProductsSliderText')); ?></span>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Image')); ?></label>
                                    <div class="col-sm-10 col-md-4">
                                        
                                        <!-- Modal -->
                                            <div class="modal fade embed-images" id="Modalmanufactured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" id ="closemodal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h3 class="modal-title text-primary" id="myModalLabel"><?php echo e(trans('labels.Choose Image')); ?> </h3>
                                                        </div>
                                                        <div class="modal-body manufacturer-image-embed">
                                                            <?php if(isset($allimage)): ?>
                                                                <select class="image-picker show-html " name="image_id" id="select_img">
                                                                    <option  value=""></option>
                                                                    <?php $__currentLoopData = $allimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option data-img-src="<?php echo e(asset($image->path)); ?>"  class="imagedetail" data-img-alt="<?php echo e($key); ?>" value="<?php echo e($image->id); ?>"> <?php echo e($image->id); ?> </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <a href="<?php echo e(url('admin/media/add')); ?>" target="_blank" class="btn btn-primary pull-left" ><?php echo e(trans('labels.Add Icon')); ?></a>
                                                          <button type="button" class="btn btn-default refresh-image"><i class="fa fa-refresh"></i></button>
                                                          <button type="button" class="btn btn-success" id="selectedICONE" data-dismiss="modal"><?php echo e(trans('labels.Done')); ?></button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div  id ="imageselected">
                                                <?php echo Form::button(trans('labels.Add Icon'), array('id'=>'newImage','class'=>"btn btn-primary", 'data-toggle'=>"modal", 'data-target'=>"#Modalmanufactured" )); ?>

                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 3px;"><?php echo e(trans('labels.LanguageFlag')); ?></span>
                                                <div class="closimage">
                                                    <button type="button" class="close pull-right" id="image-close" style="display: none; position: absolute;left: 91px; top: 54px; background-color: black; color: white; opacity: 2.2;" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div  id="selectedthumbnail"></div>
                                                <br>
                                                <?php echo Form::hidden('oldImage', $result['languages'][0]->image, array('id'=>'oldImage')); ?>

                                                <?php if(($result['languages'][0]->path!== null)): ?>
                                                    <img width="80px" src="<?php echo e(asset($result['sliders'][0]->path)); ?>" class="img-circle">
                                                <?php else: ?>
                                                    <img width="80px" src="<?php echo e(asset($result['sliders'][0]->path)); ?>" class="img-circle">
                                                <?php endif; ?>

                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.ExpiryDate')); ?></label>
                                  <div class="col-sm-10 col-md-4">



                                   <?php if(!empty($result['sliders'][0]->expires_date)): ?>
                                    <?php echo Form::text('expires_date', date('d/m/Y', strtotime($result['sliders'][0]->expires_date)), array('class'=>'form-control datepicker', 'id'=>'expires_date')); ?>

                                   <?php else: ?>
                                    <?php echo Form::text('expires_date', '', array('class'=>'form-control datepicker', 'id'=>'expires_date')); ?>


                                   <?php endif; ?>
                                   <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                    <?php echo e(trans('labels.ExpiryDateSlider')); ?></span>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Status')); ?></label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="status">
                                          <option value="1" <?php if($result['sliders'][0]->status==1): ?> selected <?php endif; ?>><?php echo e(trans('labels.Active')); ?></option>
                                          <option value="0" <?php if($result['sliders'][0]->status==0): ?> selected <?php endif; ?>><?php echo e(trans('labels.Inactive')); ?></option>
                                      </select>
                                     <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      <?php echo e(trans('labels.StatusSliderText')); ?></span>
                                  </div>
                                </div>


                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.Submit')); ?></button>
                                <a href="<?php echo e(URL::to('admin/sliders')); ?>" type="button" class="btn btn-default"><?php echo e(trans('labels.back')); ?></a>
                              </div>
                              <!-- /.box-footer -->
                            <?php echo Form::close(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/admin/settings/web/sliders/edit.blade.php ENDPATH**/ ?>