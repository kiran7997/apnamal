<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> <?php echo e(trans('labels.Orders')); ?> <small>Listing all Order Returns...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
                <li class="active"><?php echo e(trans('labels.Orders')); ?></li>
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
                            <h3 class="box-title">Listing all Order Returns </h3>
                        </div>

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
                                    <?php if(Session::has('message')): ?>
                                        <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CustomerName</th>
                                            <th>Reason</th>
                                            <th>OrderTotal</th>
                                            <th>DatePurchased</th>
                                            <th>Status </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                          <?php if(count($listingOrders['orders'])>0): ?>
                                            <?php $__currentLoopData = $listingOrders['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$orderData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($orderData->id); ?></td>
                                                    <td><?php echo e($orderData->customers_name); ?></td>
                                                    <td>
                                                        <?php echo e(\App\Models\Web\OrderReturns::$reasons[$orderData->reason]); ?>

                                                        <?php if(!empty($orderData->comments)): ?>
                                                            <ul style="list-style:none;">
                                                                <li><b>Comment :</b></li>
                                                                <li><?php echo e($orderData->comments); ?></li>
                                                            </ul>
                                                        <?php endif; ?>                                                        
                                                    </td>
                                                    <td><?php echo e($orderData->total_price); ?></td>
                                                    <td><?php echo e($orderData->date_purchased); ?></td>
                                                    <td>
                                                        <?php if($orderData->orders_status_id==1): ?>
                                                        <span class="label label-warning">
                                                        <?php elseif($orderData->orders_status_id==0): ?>
                                                        <span class="label label-success">
                                                        <?php else: ?>
                                                        <span class="label label-danger">
                                                        <?php endif; ?>
                                                        <?php echo e($orderData->orders_status); ?>

                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Approve" href="approveReturn/<?php echo e($orderData->order_product_id); ?>" class="badge bg-light-blue"><i class="fa fa-check-square-o" aria-hidden="true"></i><span> Approve</span></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Decline" href="declineReturn/<?php echo e($orderData->order_product_id); ?>" class="badge bg-red"><i class="fa fa-times" aria-hidden="true"></i><span> Decline</span></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr style="text-align: center;">
                                                <td colspan="7"><strong><?php echo e(trans('labels.NoRecordFound')); ?></strong></td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                    
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
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/admin/Orders/returns.blade.php ENDPATH**/ ?>