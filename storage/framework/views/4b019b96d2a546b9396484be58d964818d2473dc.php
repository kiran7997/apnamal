
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Blog<small>Blog...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li class=" active">Blog</li>
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
                        

   <!--  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6 form-inline">
                                                <form name='filter' id="registration" class="filter  " method="get" action="<?php echo e(url('admin/manufacturers/filter')); ?>">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <div class="input-group-form search-panel ">
                                                  <select type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="FilterBy" id="FilterBy" >
                                                    <option value="" selected disabled hidden><?php echo e(trans('labels.Filter By')); ?></option>
                                                    <option value="Name" <?php if(isset($name)): ?> <?php if($name == "Name"): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.Name')); ?></option>
                                                    <option value="URL" <?php if(isset($name)): ?> <?php if($name == "URL"): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.URL')); ?></option>
                                                  </select>
                                                  <input type="text" class="form-control input-group-form " name="parameter" placeholder="<?php echo e(trans('labels.Search')); ?>..." id="parameter" <?php if(isset($param)): ?> value="<?php echo e($param); ?>" <?php endif; ?>>
                                                  <button class="btn btn-primary " type="submit" id="submit"><span class="glyphicon glyphicon-search"></span></button>
                                                  <?php if(isset($param,$name)): ?>  <a class="btn btn-danger " href="<?php echo e(URL::to('admin/manufacturers/display')); ?>"><i class="fa fa-ban" aria-hidden="true"></i> </a><?php endif; ?>
                                                </div>
                                            </form>
                                            <div class="col-lg-4 form-inline" id="contact-form12"></div>
                                    </div>
                                </div>
                            </div>-->
                    </div>
                    <div class="box-tools pull-right">
                        <a href="<?php echo e(url('admin/add-blog')); ?>" type="button" class="btn btn-block btn-primary">Add Blog</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php if(count($blogs)>0): ?>
                                       <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=> $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php
                                          $image = DB::table('image_categories')->where('image_id',$blog->image_id)->value('path');
                                         ?>
                                        <tr>
                                            <td><?php echo e($i+1); ?></td>
                                            <td><?php echo e($blog->title); ?></td>
                                            <td> 
                                                <img src="<?php echo e(URL::asset($image)); ?>" width="150px" alt="img"/>
                                            </td>
                                            <td><?php echo e(str_limit($blog->description),100); ?></td>
                                            <td>
                                              <?php if($blog->status == 1): ?>
                                                <span class="badge bg-green">Active</span>
                                                <?php else: ?>
                                                <span class="badge bg-red">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="<?php echo e(URL::to('admin/edit-blog/'.$blog->id)); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a  href="<?php echo e(url('admin/delete-blog/'.$blog->id)); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/admin/Blog/blog.blade.php ENDPATH**/ ?>