
<?php $__env->startSection('content'); ?>

<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li>About-us</li>
        </ul>
    </div>
</div>

   <?php
    $aboutus = DB::table('aboutus')->first();
   ?>

<div class="ps-page--single" id="about-us">
  <?php if(isset($aboutus->image)): ?>
    <?php
    $about_img = DB::table('image_categories')->where('image_id',$aboutus->image)->where('image_type','ACTUAL')->value('path');
    ?>
    <img src="<?php echo e(asset($about_img)); ?>" alt="">
  <?php endif; ?>
    <div class="ps-about-intro">
        <div class="container">
            <div class="ps-section__header"> 
                <h4><?php echo e(isset($aboutus->title_1) ? $aboutus->title_1 : null); ?></h4>
                <h3><?php echo e(isset($aboutus->title_2) ? $aboutus->title_2 : null); ?></h3>
                <p><?php echo e(isset($aboutus->description) ? $aboutus->description : null); ?></p>
            </div>
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                        <div class="ps-block--icon-box"><i class="icon-cube"></i>
                            <h4>45M</h4>
                            <p>Product for sale</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                        <div class="ps-block--icon-box"><i class="icon-store"></i>
                            <h4>1.8M</h4>
                            <p>Sellers Active on Martfury</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                        <div class="ps-block--icon-box"><i class="icon-bag2"></i>
                            <h4>30.6M</h4>
                            <p>Buyer active on Martfury</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                        <div class="ps-block--icon-box"><i class="icon-cash-dollar"></i>
                            <h4>$2.46M</h4>
                            <p>Annual gross merchandise sales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/aboutus.blade.php ENDPATH**/ ?>