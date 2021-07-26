<div class="ps-newsletter">
    <div class="ps-container">
        <form class="ps-form--newsletter" id="submitNewsletter" action="<?php echo e(URL::to('/newsletter')); ?>" method="post">
            <input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="ps-form--newsletter row">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__left">
                        <h3>Newsletter</h3>
                        <p>Subscribe to get information about products and coupons</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="ps-form__right">
                        <div class="form-group--nest">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Email address">
                            <button class="ps-btn">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger alert-dismissible d-none" id="newsletterSubmitResponseFailed" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                <?php echo Lang::get("website.You have already subscribed."); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-success alert-dismissible d-none" id="newsletterSubmitResponseSuccess" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                <?php echo Lang::get("website.You have successfully subscribed."); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </form>
    </div>
</div><?php /**PATH F:\xampp\htdocs\apnamal\resources\views/web/includes/newsletter.blade.php ENDPATH**/ ?>