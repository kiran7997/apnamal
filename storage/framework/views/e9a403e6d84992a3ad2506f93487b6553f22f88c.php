
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Vendors Withdrawal Request <small>Vendors Withdrawal Request...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li class=" active">Vendors Withdrawal Request</li>
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
                <p class="col-sm-6 col-lg-6"><strong >Vendor Available Balance : </strong><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($avilable_balance); ?></span></p>
           <!-- <p class="col-sm-6 col-lg-4"><strong >Pending Withdrawal : </strong><span></span><i class="fa fa-inr" aria-hidden="true"></i> </p>-->
                <p class="col-sm-6 col-lg-6"><strong >Approve Withdrawal : </strong><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($approved_amount); ?></span></p>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amount Request</th>
                                <th>Special Notes</th>
                                <th>Withdrawal Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                         <?php if(count($withdrawal_request)>0): ?>
                           <?php $__currentLoopData = $withdrawal_request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=> $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($withdrawal->withdrawal_request); ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#specialNotes<?php echo e($withdrawal->id); ?>">
                                        Notes
                                    </button>
                                </td>
                                <td><?php echo e(\Carbon\Carbon::parse($withdrawal->created_at)->format('d/m/Y')); ?></td>
                                <td>
                                    <?php if($withdrawal->status == 0): ?>
                                    <span class="btn btn-warning">Pending</span>
                                    <?php elseif($withdrawal->status == 1): ?>
                                    <span class="btn btn-success">Approved</span>
                                    <?php else: ?>
                                    <span class="btn btn-danger">Canceled</span>
                                    <?php endif; ?>
                                </td> 
                                <td>
                                 <?php if($withdrawal->status == 0): ?>
                                    <form action="<?php echo e(url('admin/status-withdrawal')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id" value="<?php echo e($withdrawal->id); ?>"/>
                                        <select name="status" onchange="this.form.submit()" class="form-control">
                                            <option value="0" <?php if($withdrawal->status == 0) { echo 'selected'; } ?>>Pending</option>
                                            <option value="1" <?php if($withdrawal->status == 1) { echo 'selected'; } ?>>Approve</option>
                                            <option value="2" <?php if($withdrawal->status == 2) { echo 'selected'; } ?>>Cancel</option>
                                        </select>
                                    </form>
                                 <?php else: ?>
                                   <form action="" method="post">
                                       <select name="status" onchange="this.form.submit()" disabled class="form-control">
                                            <option value="0" <?php if($withdrawal->status == 0) { echo 'selected'; } ?>>Pending</option>
                                            <option value="1" <?php if($withdrawal->status == 1) { echo 'selected'; } ?>>Approve</option>
                                            <option value="2" <?php if($withdrawal->status == 2) { echo 'selected'; } ?>>Cancel</option>
                                        </select>
                                    </form>
                                 <?php endif; ?>
                                </td>
                            </tr>
                            
                        <div class="container">
                            <!-- Button to Open the Modal -->
                            <!-- The Modal -->
                            <div class="modal fade" id="specialNotes<?php echo e($withdrawal->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Special Notes</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <?php echo e($withdrawal->special_notes); ?>

                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
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

<!-- deleteManufacturerModal -->
<div class="modal fade" id="manufacturerModal" tabindex="-1" role="dialog" aria-labelledby="deleteManufacturerModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteManufacturerModalLabel"><?php echo e(trans('labels.DeleteManufacturer')); ?></h4>
            </div>
            <?php echo Form::open(array('url' =>'admin/manufacturers/delete', 'name'=>'deleteManufacturer', 'id'=>'deleteManufacturer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

            <?php echo Form::hidden('action',  'delete', array('class'=>'form-control')); ?>

            <?php echo Form::hidden('manufacturers_id',  '', array('class'=>'form-control', 'id'=>'manufacturers_id')); ?>

            <div class="modal-body">
                <p><?php echo e(trans('labels.DeleteManufacturerText')); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.Close')); ?></button>
                <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.Delete')); ?></button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

<!-- /.row -->
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/admin/vendor/withdrawal-request.blade.php ENDPATH**/ ?>