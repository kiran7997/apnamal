
<?php $__env->startSection('content'); ?>
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li><?php echo isset($data) ? $data->name : null; ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="return_refund_wrap">
    <div class="ps-about-intro">
        <div class="container">
            <div class="">
              <?php echo isset($data) ? $data->description : null; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/privacy_policy.blade.php ENDPATH**/ ?>