
<?php $__env->startSection('content'); ?>
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li>Payment Success</li>
            </ul>
        </div>
    </div>
    
    <section class="ps-section--account">
        <div class="container">
            <div class="ps-block--payment-danger">
                <h3>Payment Cancel !</h3>
                <p>Your payment has been canceled</p>
            </div>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/cancel.blade.php ENDPATH**/ ?>