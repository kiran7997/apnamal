
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> View Membership <small> View Membership...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li><a href="<?php echo e(URL::to('admin/donations')); ?>"><i class="fa fa-dashboard"></i>  Listing All The Membership</a></li>
            <li class="active"> View Membership</li>
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
                    <?php if($data->member_type == 1): ?>
                    <i class="fa fa-globe"></i> Prime Membership
                    <?php else: ?>
                    <i class="fa fa-globe"></i> Pro Membership
                    <?php endif; ?>
                    <small style="display: inline-block">Join Date: <?php echo e(date('m/d/Y', strtotime($data->created_at))); ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <?php
         $state = DB::table('zones')->where('zone_id',$data->zone_id)->value('zone_name');
        ?>
        <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
                 <p><strong>Transaction Id</strong>: <?php echo e(isset($payment_details->razorpay_payment_id) ? $payment_details->razorpay_payment_id : null); ?></p>

                <?php echo e(trans('labels.CustomerInfo')); ?>:
                <address>
                    <strong><?php echo e(ucwords(isset($data->name) ? $data->name : null)); ?></strong><br>
                    <strong>Email</strong>: <?php echo e(isset($data->email) ? $data->email : null); ?><br>
                    <strong>Phone No</strong>: <?php echo e(isset($data->mobile) ? $data->mobile : null); ?><br>
                    <strong>Alternate Phone No</strong>: <?php echo e(isset($data->phone) ? $data->phone : null); ?><br>
                    <strong>State</strong>: <?php echo e($state); ?><br>
                    <strong>City</strong>: <?php echo e(isset($data->city) ? $data->city : null); ?><br>
                    <strong>ZIP / Postal Code</strong> : <?php echo e(isset($data->pincode) ? $data->pincode : null); ?><br>
                </address>
                
                <p><strong>Address1</strong>:  <?php echo e(isset($data->address1) ? $data->address1 : null); ?></p>
                <p><strong>Address2</strong>:  <?php echo e(isset($data->address2) ? $data->address2 : null); ?></p>
                   
             <?php if($data->member_type == 1): ?> 
               <?php if($data->membership_plan == 1): ?>
                <p><strong>Books For Prime Membership</strong>: 2 At-a-time Multiple order</p>
                <?php elseif($data->membership_plan == 2): ?>
                <p><strong>Books For Prime Membership</strong>: 4 At-a-time</p>
                <?php elseif($data->membership_plan == 3): ?>
                <p><strong>Books For Prime Membership</strong>: 6 At-a-time</p>
                <?php elseif($data->membership_plan == 4): ?>
                <p><strong>Books For Prime Membership</strong>: 9 At-a-time</p>
                <?php elseif($data->membership_plan == 5): ?>
                <p><strong>Books For Prime Membership</strong>: 12 At-a-time</p>
                <?php elseif($data->membership_plan == 6): ?>
                <p><strong>Books For Prime Membership</strong>: 15 At-a-time</p>
                <?php endif; ?>
              <?php endif; ?>
              
              <?php if($data->member_type == 2): ?>
                <?php if($data->membership_plan == 1): ?>
               <p><strong>Books For Pro Membership</strong>: 2 At-a-time Multiple order</p>
               <?php elseif($data->membership_plan == 2): ?>
               <p><strong>Books For Pro Membership</strong>: 4 At-a-time Multiple order</p>
               <?php elseif($data->membership_plan == 3): ?>
               <p><strong>Books For Pro Membership</strong>: 6 At-a-time Multiple order</p>
               <?php elseif($data->membership_plan == 4): ?>
               <p><strong>Books For Pro Membership</strong>: 9 At-a-time Multiple order</p>
               <?php elseif($data->membership_plan == 5): ?>
               <p><strong>Books For Pro Membership</strong>: 12 At-a-time Multiple order</p>
               <?php elseif($data->membership_plan == 6): ?>
               <p><strong>Books For Pro Membership</strong>: 15 At-a-time Multiple order</p>
                <?php endif; ?>
              <?php endif; ?>
                
            <?php
              $books_name = DB::table('products_description')->where('products_id',$data->book)->value('products_name');
            ?>
              
            <p><strong>Books</strong>: <?php echo e($books_name); ?></p>
           <?php if($data->months == 1): ?>
              <p><strong>Months</strong>: January</p>
            <?php elseif($data->months == 2): ?>
            <p><strong>Months</strong>: February</p>
            <?php elseif($data->months == 3): ?>
            <p><strong>Months</strong>: March</p>
            <?php elseif($data->months == 4): ?>
            <p><strong>Months</strong>: April</p>
            <?php elseif($data->months == 5): ?>
            <p><strong>Months</strong>: May</p>
            <?php elseif($data->months == 6): ?>
            <p><strong>Months</strong>: June</p>
            <?php elseif($data->months == 7): ?>
            <p><strong>Months</strong>: July</p>
            <?php elseif($data->months == 8): ?>
            <p><strong>Months</strong>: August</p>
            <?php elseif($data->months == 9): ?>
            <p><strong>Months</strong>: September</p>
            <?php elseif($data->months == 10): ?>
            <p><strong>Months</strong>: October</p>
            <?php elseif($data->months == 11): ?>
            <p><strong>Months</strong>: November</p>
            <?php elseif($data->months == 12): ?>
            <p><strong>Months</strong>: December</p>
           <?php endif; ?> 
        
         <?php if($data->magazines == 1): ?>
           <p><strong>Magazines</strong>: Monthly</p>
         <?php elseif($data->magazines == 2): ?>
          <p><strong>Magazines</strong>: Semi-Annual</p>
        <?php elseif($data->magazines == 3): ?>
           <p><strong>Magazines</strong>: Annual</p>
        <?php endif; ?>
          <p><strong>How did you find us</strong>: <?php echo e(isset($data->how_to_find) ? $data->how_to_find : null); ?></p>
         </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/admin/Membership/viewDetails.blade.php ENDPATH**/ ?>