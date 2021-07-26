
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Donations <small>Listing All The Donations...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li class="active">Donations </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
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
                                <table id="examplee" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Name', trans('labels.Name')));?></th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($donations)>0): ?>
                                        <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td>
                                                <?php echo e($data->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($data->email); ?>

                                            </td>
                                            <td>
                                                <?php echo e($data->phone); ?>

                                            </td>
                                            <td>
                                                <?php echo e($data->subject); ?>

                                            </td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('labels.View')); ?>" href="donation/<?php echo e($data->id); ?>" class="badge bg-light-blue"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                <?php if($data->status==0): ?>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Click to Complete" href="donation/<?php echo e($data->id); ?>/1" class="badge bg-red">Pending</a>
                                                <?php else: ?>
                                                <a href="javascript:;" class="badge bg-light-blue">Completed</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="6"><?php echo e(trans('labels.NoRecordFound')); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="col-xs-12 text-right">
                                    <?php echo $donations->appends(\Request::except('page'))->render(); ?>

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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/admin/pages/donations.blade.php ENDPATH**/ ?>