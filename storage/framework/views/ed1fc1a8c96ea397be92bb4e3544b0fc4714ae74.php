<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> FAQ's <small>Listing All The FAQ's...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li class="active">FAQ's</li>
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="box-tools pull-right">
                                    <a href="<?php echo e(url('admin/faq/add')); ?>" type="button" class="btn btn-block btn-primary"><?php echo e(trans('labels.AddNew')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php if(session('update')): ?>
                                <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong> <?php echo e(session('update')); ?> </strong>
                                </div>
                                <?php endif; ?>
                                <?php if(count($errors) > 0): ?>
                                  <?php if($errors->any()): ?>
                                  <div class="alert alert-success alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <?php echo e($errors->first()); ?>

                                  </div>
                                  <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id', trans('labels.ID')));?></th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th><?php echo e(trans('labels.Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($faqs)): ?>
                                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($faq->title); ?></td>
                                            <td><?php echo str_limit($faq->description,100); ?></td>
                                            <td>
                                                <ul class="nav table-nav">
                                                    <li class="dropdown">
                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                            <?php echo e(trans('labels.Action')); ?> <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(url('admin/faq/edit')); ?>/<?php echo e($faq->id); ?>">Edit FAQ</a></li>
                                                            <li role="presentation" class="divider"></li>
                                                            <li role="presentation"><a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('labels.Delete')); ?>" id="deleteCustomerFrom"
                                                                  users_id="<?php echo e($faq->id); ?>"><?php echo e(trans('labels.Delete')); ?></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="4"><?php echo e(trans('labels.NoRecordFound')); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php if(count($faqs) > 0): ?>
                                <div class="col-xs-12 text-right">
                                    
                                    
                                    <?php echo $faqs->appends(\Request::except('page'))->render(); ?>

                                </div>
                                <?php endif; ?>
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
        <!-- deleteCustomerModal -->
        <div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="deleteCustomerModalLabel"><?php echo e(trans('labels.Delete')); ?></h4>
                    </div>
                    <?php echo Form::open(array('url' =>'admin/faq/delete', 'name'=>'deleteCustomer', 'id'=>'deleteCustomer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

                    <?php echo Form::hidden('action', 'delete', array('class'=>'form-control')); ?>

                    <?php echo Form::hidden('users_id', '', array('class'=>'form-control', 'id'=>'users_id')); ?>

                    <div class="modal-body">
                        <p>Are you sure you want to delete this FAQ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.Delete')); ?></button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
        <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content notificationContent">
                </div>
            </div>
        </div>
        <!-- Main row -->
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/admin/faq/index.blade.php ENDPATH**/ ?>