
<?php $__env->startSection('content'); ?>
<div class="ps-page--single" id="contact-us">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li>Donate</li>
            </ul>
        </div>
    </div>
    <div class="ps-contact-form">
        <div class="container">
            <form class="ps-form--contact-us" action="<?php echo e(URL::to('/donate')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <h3>Donate</h3>
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></a>
                    <ul style="list-style: none;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
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
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name *" name="name">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Email *" name="email">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Phone *" name="phone">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Address *" name="address">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Subject *" name="subject">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Message" name="message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group submit">
                    <button type="submit" class="ps-btn">Send message</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/donate.blade.php ENDPATH**/ ?>