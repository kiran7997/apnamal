
<?php $__env->startSection('content'); ?>
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li>Vendor Registration</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account mb-4">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="<?php echo e(URL::to('/vendor-registration')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="2" name="user_type">
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
                <h4 class="text-center">Vendor Registration</h4>
                <div class="ps-form__content">
                    <h5>Create Your Account</h5>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Enter Your Name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email address" name="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Your Firm Name" name="company" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel:" placeholder="Enter Your Mobile No." name="phone" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="country" name="country_code" required>
                            <?php if(count($countries)>0): ?>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->countries_id); ?>"><?php echo e($country->countries_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="zone" name="zone" required>
                            <?php if(count($zones)>0): ?>
                            <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($zone->zone_id); ?>"><?php echo e($zone->zone_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group form-forgot">
                        <input class="form-control" type="password" name="password" placeholder="Enter Your Password">
                    </div>
                    <div class="form-group form-forgot">
                        <input class="form-control" type="password" name="re_password" placeholder="Enter Confirm Password">
                    </div>
                    <div class="form-group">
                        <div class="ps-checkbox">
                            <input class="form-control" type="checkbox" id="remember-me" checked name="remember-me" required>
                            <label for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group submtit">
                        <button class="ps-btn ps-btn--fullwidth">Register</button>
                        <div class="text-right my-5">Already have an account?<a href="<?php echo e(URL::to('/login')); ?>"> Sign In</a></div>
                        <div class="text-right my-5">&nbsp;</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/auth/vendor_registration.blade.php ENDPATH**/ ?>