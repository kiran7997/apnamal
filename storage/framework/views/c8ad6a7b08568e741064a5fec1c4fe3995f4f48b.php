
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Add Blog Category<small>Add Blog ...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
                <li><a href="<?php echo e(URL::to('admin/blog-category')); ?>"><i class="fa fa-dashboard"></i>Blog Category</a></li>
                <li class="active">Add Blog Category</li>
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
                            <h3 class="box-title">Add Blog Category </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-info">

                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
                                            <?php if(count($errors) > 0): ?>					
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h4 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Error!</h4>
                                                <ul class="mb-0 px-0 list-style-none">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><i class="fa fa-chevron-right"></i> <?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                            <?php if(Session::has('flash_message')): ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h4 class="text-success mb-0"><i class="fa fa-check-circle"></i> <?php echo e(Session::get('flash_message')); ?></h4>
                                            </div>
                                            <?php endif; ?>

                     <?php echo Form::open(array('url' =>'admin/add-category', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')); ?>

                             <input type="hidden" name="id" value=""/>
                                    
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">Parent Category</label>
                                    <div class="col-sm-10 col-md-4">
                                        <select name="parent_id" class="form-control">
                                            <option value="">Select Parent Category</option>
                                        <?php if(count($categories)>0): ?>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->cat_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                     
                                <div class="form-group">
                                    <label for="cat_name" class="col-sm-2 col-md-3 control-label">Category Name</label>
                                    <div class="col-sm-10 col-md-4">
                                        <input type="text" name="cat_name" required value="" class="form-control field-validate">
                                    </div>
                                </div>
                             
                             <div class="form-group">
                                    <label for="status" class="col-sm-2 col-md-3 control-label">Status</label>
                                    <div class="col-sm-10 col-md-4">
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                     
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                    <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.Submit')); ?> </button>
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
    <script src="<?php echo asset('plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/admin/Blog/addcategory.blade.php ENDPATH**/ ?>