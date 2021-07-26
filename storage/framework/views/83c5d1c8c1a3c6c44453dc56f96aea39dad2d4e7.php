
<?php $__env->startSection('content'); ?>
<div class="ps-page--single">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li>Frequently Asked Questions</li>
            </ul>
        </div>
    </div>
    <div class="ps-faqs">
        <div class="container">
            <div class="ps-section__header">
                <h1>Frequently Asked Questions</h1>
            </div>
            <div class="demo-block">
                <div id="accordionGroup" class="Accordion">
                    <?php if(count($data)>0): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h3>
                        <button aria-expanded="<?php if($i==0){echo 'true';}else{echo 'false';} ?>"
                                class="Accordion-trigger"
                                aria-controls="sect<?php echo e($row->id); ?>"
                                id="accordion<?php echo e($row->id); ?>id">
                            <span class="Accordion-title">
                                <?php echo $row->title; ?>

                                <span class="Accordion-icon"></span>
                            </span>
                        </button>
                    </h3>
                    <div id="sect<?php echo e($row->id); ?>"
                         role="region"
                         aria-labelledby="accordion<?php echo e($row->id); ?>id"
                         class="Accordion-panel"
                         <?php if($i>0){echo 'hidden';} ?>>
                        <div>
                            <fieldset>
                                <p><?php echo $row->description; ?></p>
                            </fieldset>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-call-to-action">
        <div class="container">
            <h3>We're Here to Help !<a href="#"> Contact us</a></h3>
        </div>
    </div>
</div>
<?php echo $__env->make("web.includes.newsletter", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/faqs.blade.php ENDPATH**/ ?>