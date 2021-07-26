<footer class="ps-footer">
    <div class="ps-container">
        <div class="ps-footer__widgets">
            <aside class="widget widget_footer widget_contact-us">
                <h4 class="widget-title">Contact us</h4>
                <div class="widget_content">
                    <p>Call us 24/7</p>
                    <h3><?= stripslashes($result['setting'][11]->value) ?></h3>
                    <p><?= stripslashes($result['setting'][4]->value) ?>, <?= stripslashes($result['setting'][5]->value) ?>, <?= stripslashes($result['setting'][8]->value) ?> <br>
                        <a href="/cdn-cgi/l/email-protection#b1d2dedfc5d0d2c5f1dcd0c3c5d7c4c3c89fd2de">
                            <span class="__cf_email__" data-cfemail="40232f2e34212334002d213234263532396e232f"><?= stripslashes($result['setting'][3]->value) ?></span>
                        </a>
                    </p>
                   
                    <ul class="ps-list--social">
                        <li><a class="facebook" href="<?php echo e($result['setting'][50]->value); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="<?php echo e($result['setting'][52]->value); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="google-plus" href="<?php echo e($result['setting'][51]->value); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="instagram" href="<?php echo e($result['setting'][53]->value); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Quick links</h4>
                <ul class="ps-list--link">
                    <li><a href="<?php echo e(URL::to('/privacy-policy')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo e(URL::to('/term-conditions')); ?>">Term & Condition</a></li>
                    <li><a href="<?php echo e(URL::to('/shipping')); ?>">Shipping</a></li>
                    <li><a href="<?php echo e(URL::to('/return-refund')); ?>">Return</a></li>
                    <li><a href="<?php echo e(URL::to('/faqs')); ?>">FAQs</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Company</h4>
                <ul class="ps-list--link">
                    <li><a href="<?php echo e(URL::to('/about-us')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(URL::to('/contact-us')); ?>">Contact</a></li>
                    <li><a href="<?php echo e(URL::to('/order-tracking')); ?>">Order Tracking</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Vendor Profile</h4>
                <ul class="ps-list--link">
                    <li><a href="<?php echo e(URL::to('/become-a-vendor')); ?>">Become A Vendor</a></li>
                    <li><a href="<?php echo e(URL::to('/vendor-registration')); ?>">Vendor Registration</a></li>
                    <!--<li><a href="vendor-store.html">Vendor Store</a></li>-->
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Business</h4>
                <ul class="ps-list--link">
                    <?php if(auth()->guard('customer')->check()): ?>
                    <li><a href="<?php echo e(URL::to('/checkout')); ?>">Checkout</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(URL::to('/guest_checkout')); ?>">Checkout</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(URL::to('/profile')); ?>">My account</a></li>
                    <li><a href="<?php echo e(URL::to('/shop')); ?>">Shop</a></li>
                </ul>
            </aside>
        </div>
<?php $alll_sub_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.level','=',0)
        ->select('categories_description.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
        <div class="ps-footer__links">
            <?php if(count($alll_sub_categories)>0): ?>
            <?php $__currentLoopData = $alll_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_sub_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>
                
<?php $alll_sub_sub_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.parent_id',$alll_sub_categorie->categories_id)
        ->where('categories.level','=',1)
        ->select('categories_description.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
                <?php if(count($alll_sub_sub_categories)>0): ?>
                <strong><?php echo e($alll_sub_categorie->categories_name); ?>:</strong>
                <?php $__currentLoopData = $alll_sub_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_sub_sub_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(URL::to('shop-by-category/'.$alll_sub_sub_categorie->categories_slug)); ?>"><?php echo e($alll_sub_sub_categorie->categories_name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="ps-footer__copyright">
            <p><i class="fa fa-copyright"></i> 2021 <?= stripslashes($result['setting'][18]->value) ?>. All Rights Reserved</p>
            <p><span>We Using Safe Payment For:</span>
                <a href="javascript:;">
                    <img src="<?php echo e(URL::asset('web/img/payment-method/1.jpg')); ?>" alt="payment">
                </a>
                <a href="javascript:;">
                    <img src="<?php echo e(URL::asset('web/img/payment-method/2.jpg')); ?>" alt="payment">
                </a>
                <a href="javascript:;">
                    <img src="<?php echo e(URL::asset('web/img/payment-method/3.jpg')); ?>" alt="payment">
                </a>
                <a href="javascript:;">
                    <img src="<?php echo e(URL::asset('web/img/payment-method/4.jpg')); ?>" alt="payment">
                </a>
                <a href="javascript:;">
                    <img src="<?php echo e(URL::asset('web/img/payment-method/5.jpg')); ?>" alt="payment">
                </a>
            </p>
        </div>
    </div>
</footer>
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>

<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="aroma-magnifying-glass"></i></button>
        </form>
    </div>
</div><?php /**PATH F:\xampp\htdocs\apnamal\resources\views/web/includes/footer.blade.php ENDPATH**/ ?>