
<?php $__env->startSection('content'); ?>
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li>Forgot password</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account mb-4">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="<?php echo e(url('/processPassword')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Forgot Password</a></li>
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
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Reset Password</h5>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group submtit">
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
                            </div>
                            <div class="form-group submtit">
                                <a href="<?php echo e(URL::to('/login')); ?>">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/auth/forgotpassword.blade.php ENDPATH**/ ?>