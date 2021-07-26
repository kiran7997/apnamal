
<?php $__env->startSection('content'); ?>
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(URL::to('/shop')); ?>">Shop</a></li>
                <li> Order Tracking</li>
            </ul>
        </div>
    </div>
    <div class="ps-order-tracking">
        <div class="container">
            <div class="ps-section__header">
                <h3>Order Tracking</h3>
                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you-on your receipt and in the confirmation email you should have received.</p>
            </div>
            <div class="ps-section__content">
                <form class="ps-form--order-tracking" action="<?php echo e(URL::to('/order-tracking')); ?>" method="post">
                    <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                            <?php echo session('error'); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                            <?php echo session('success'); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Order ID</label>
                        <input class="form-control" type="text" name="orders_id" required placeholder="Found in your order confimation email">
                    </div>
                    <div class="form-group">
                        <label>Billing Email</label>
                        <input class="form-control" type="text" name="email" required placeholder="Enter your Billing email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="ps-btn ps-btn--fullwidth">Track Your Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make("web.includes.newsletter", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/order_tracking.blade.php ENDPATH**/ ?>