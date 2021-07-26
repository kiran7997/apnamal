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
                    <li class="<?php if(\Request::getRequestUri()=='/vendor-dashboard'){echo 'active';} ?>"><a href="<?php echo e(URL::to('/vendor-dashboard')); ?>"><i class="icon-papers"></i> Vendor Dashboard</a></li>
                    <li><a href="<?php echo e(URL::to('/logout')); ?>"><i class="icon-power-switch"></i>Logout</a></li>
                </ul>
            </div>
        </aside>
    </div> 
</div><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/includes/vendor_sidebar.blade.php ENDPATH**/ ?>