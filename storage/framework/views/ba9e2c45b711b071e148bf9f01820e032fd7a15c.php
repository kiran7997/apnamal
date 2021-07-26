<?php $__env->startSection('content'); ?>
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account mb-4">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="<?php echo e(url('/signupProcess')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="1" name="user_type">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#register">Register</a></li>
                </ul>
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
                <div class="ps-tabs">
                    <div class="ps-tab active" id="register">
                        <div class="ps-form__content">
                            <h5>Register Your Account</h5>
                            <div class="form-group">
                                <input class="form-control" type="text" name="first_name" placeholder="Enter Your Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email address" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="tel:" name="phone" placeholder="Enter Your Phone No." required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="country" name="country_code" required>
                                    <?php if(count($countries)>0): ?>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->countries_id); ?>" <?php if($country->countries_id == 223): ?> selected <?php endif; ?>><?php echo e($country->countries_name); ?></option>
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
                                    <label for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group submtit">
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Register</button>
                                <p class="mt-5 text-left"><a href="<?php echo e(URL::to('/login')); ?>">Already have an account? Sign in</a></p>
                            </div>
                        </div>
                        <div class="ps-form__footer">
                            <!--<p>Connect with:</p>
                            <ul class="ps-list--social">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>