<div class="col-lg-4">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__header">
                <?php if(!empty(auth()->guard('customer')->user()->avatar)): ?>
                <img src="<?php echo e(URL::asset('/'.auth()->guard('customer')->user()->avatar)); ?>" alt="avatar">
                <?php endif; ?>
                <figure>
                    <figcaption>Hello</figcaption>
                    <p><a href="javascript:;"><?php echo e(auth()->guard('customer')->user()->email); ?></a></p>
                </figure>
            </div>
            <div class="ps-widget__content">
                <ul>
                    <li class="<?php if(\Request::getRequestUri()=='/profile'){echo 'active';} ?>"><a href="<?php echo e(URL::to('/profile')); ?>"><i class="icon-user"></i> Account Information</a></li>
                    <!--<li><a href="#"><i class="icon-alarm-ringing"></i> Notifications</a></li>-->
                    <li class="<?php if(\Request::getRequestUri()=='/orders'){echo 'active';} ?>"><a href="<?php echo e(URL::to('/orders')); ?>"><i class="icon-papers"></i> Orders</a></li>
                    <li class="<?php if(\Request::getRequestUri()=='/returns'){echo 'active';} ?>"><a href="<?php echo e(URL::to('/returns')); ?>"><i class="icon-papers"></i> Returns</a></li>
                    <li class="<?php if(\Request::getRequestUri()=='/address'){echo 'active';} ?>"><a href="<?php echo e(URL::to('/address')); ?>"><i class="icon-map-marker"></i> Address</a></li>
                    <!--<li><a href="#"><i class="icon-store"></i> Recent Viewed Product</a></li>-->
                    <li><a href="<?php echo e(URL::to('/wishlist')); ?>"><i class="icon-heart"></i> Wishlist</a></li>
                    <li><a href="<?php echo e(URL::to('/logout')); ?>"><i class="icon-power-switch"></i>Logout</a></li>
                </ul>
            </div>
        </aside>
    </div>
</div><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/includes/user_sidebar.blade.php ENDPATH**/ ?>