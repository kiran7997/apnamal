
<?php $__env->startSection('content'); ?>
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(URL::to('/profile')); ?>">Account</a></li>
                <li>Invoice Detail</li>
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('web.includes.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-8">
                    <div class="ps-section__right">
                        <div class="ps-section--account-setting">
                            <div class="ps-section__header">
                                <h3><strong>Address</strong></h3>
                            </div>
                            <div class="ps-section__content">
                                <?php if(count($addresses)>0): ?>
                                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Billing Address</figcaption>
                                            <p><strong>Address:</strong> <?php echo e(isset($address->billing_street_address) ? $address->billing_street_address : '-'); ?>, <?php echo e(isset($address->billing_city) ? $address->billing_city : '-'); ?>, <?php echo e(isset($address->billing_state) ? $address->billing_state : '-'); ?>, <?php echo e(isset($address->billing_country) ? $address->billing_country : '-'); ?></p>
                                        </figure>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Shipping Address</figcaption>
                                            <p><strong>Address:</strong> <?php echo e(isset($address->delivery_street_address) ? $address->delivery_street_address : '-'); ?>, <?php echo e(isset($address->delivery_city) ? $address->delivery_city : '-'); ?>, <?php echo e(isset($address->delivery_state) ? $address->delivery_state : '-'); ?>, <?php echo e(isset($address->delivery_country) ? $address->delivery_country : '-'); ?></p>
                                        </figure>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('web.includes.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/address.blade.php ENDPATH**/ ?>