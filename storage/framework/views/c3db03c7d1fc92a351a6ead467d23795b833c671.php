
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Add FAQ <small>Add FAQ...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li><a href="<?php echo e(URL::to('admin/customers/display')); ?>"><i class="fa fa-users"></i> Listing All The FAQ's</a></li>
            <li class="active">Add FAQ</li>
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
                        <h3 class="box-title">Add FAQ </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-info">
                                    <!--<div class="box-header with-border">
                                          <h3 class="box-title">Edit category</h3>
                                        </div>-->
                                    <!-- /.box-header -->
                                    <br>
                                    <?php if(session('update')): ?>
                                    <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong> <?php echo e(session('update')); ?> </strong>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(count($errors) > 0): ?>
                                    <?php if($errors->any()): ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo e($errors->first()); ?>

                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="box-body">
                                        <?php echo Form::open(array('url' =>'admin/faq/add', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')); ?>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">Title* </label>
                                            <div class="col-sm-8 col-md-8">
                                                <?php echo Form::text('title',  '', array('class'=>'form-control field-validate', 'id'=>'title')); ?>

                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please enter title.</span>
                                                <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">Description* </label>
                                            <div class="col-sm-8 col-md-8">
                                                <textarea class="form-control field-validate" rows="3" name="description" id="description"></textarea>
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please enter description.</span>
                                                <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="box-footer text-center">
                                            <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.Submit')); ?></button>
                                            <a href="<?php echo e(URL::to('admin/faq/display')); ?>" type="button" class="btn btn-default"><?php echo e(trans('labels.back')); ?></a>
                                        </div>
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/admin/faq/add.blade.php ENDPATH**/ ?>