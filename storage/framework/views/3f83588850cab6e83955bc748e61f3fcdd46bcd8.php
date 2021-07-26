
<?php $__env->startSection('content'); ?>

 <?php if(count($blogs)>0): ?>
    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $image = DB::table('image_categories')->where('image_id',$blog->image_id)->value('path');
    ?>
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog_page">
                         <img src="<?php echo e(URL::asset($image)); ?>" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="blog_text">
                       <h2><a href="<?php echo e(url('single-blog/'.Str_slug($blog->title).'/'.$blog->id)); ?>"><?php echo e($blog->title); ?></a></h2>
                       <p><?php echo e(Str_limit($blog->description),200); ?></p>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="col-lg-12">
       <div class="blog_text text-center mt-4">
           <h1>No result found!</h1>
       </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/blog_category.blade.php ENDPATH**/ ?>