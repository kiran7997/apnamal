
<?php $__env->startSection('content'); ?>

<section class="blog_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="blog_page">
                    <img src="<?php echo e(URL::asset($image)); ?>" class="img-fluid"/>
                    <h2><?php echo e(isset($blog->title) ? $blog->title : null); ?></h2>
                    <p><?php echo e(isset($blog->description) ? $blog->description : null); ?></p>
                </div>
            </div>
        </div> 
    </div>
</section>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/single_blog.blade.php ENDPATH**/ ?>