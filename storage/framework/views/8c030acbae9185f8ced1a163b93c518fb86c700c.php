
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> View Donation <small> View Donation...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li><a href="<?php echo e(URL::to('admin/donations')); ?>"><i class="fa fa-dashboard"></i>  Listing All The Donations</a></li>
            <li class="active"> View Donation</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="invoice" style="margin: 15px;">
        <!-- title row -->
        <?php if(session()->has('message')): ?>
        <div class="col-xs-12">
            <div class="row">
                <div class="alert alert-success alert-dismissible">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i> <?php echo e(trans('labels.Successlabel')); ?></h4>
                    <?php echo e(session()->get('message')); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
        <div class="col-xs-12">
            <div class="row">
                <div class="alert alert-warning alert-dismissible">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-warning"></i> <?php echo e(trans('labels.WarningLabel')); ?></h4>
                    <?php echo e(session()->get('error')); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
                    <i class="fa fa-globe"></i> Donation# <?php echo e($donation->id); ?>

                    <small style="display: inline-block">Donation Date: <?php echo e(date('m/d/Y', strtotime($donation->created_at))); ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
                <?php echo e(trans('labels.CustomerInfo')); ?>:
                <address>
                    <strong><?php echo e($donation->name); ?></strong><br>
                    <?php echo e(trans('labels.Address')); ?>: <?php echo e($donation->address); ?><br>
                    <?php echo e(trans('labels.Phone')); ?>: <?php echo e($donation->phone); ?><br>
                    <?php echo e(trans('labels.Email')); ?>: <?php echo e($donation->email); ?>

                </address>
                <p>Subject: <?php echo e($donation->subject); ?></p>
                <p>Description: <?php echo e($donation->message); ?></p>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/admin/pages/view_donation.blade.php ENDPATH**/ ?>