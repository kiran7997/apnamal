<?php
	$dataa = array();
	$resultt['cart'] = $result['cart'] = App\Models\Web\Cart::myCart1($dataa);
?>
<div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
        <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
        <div class="ps-cart--mobile">
            <div class="ps-cart__content">
            	<?php $Subtotall = 0; ?>
            	<?php if(isset($resultt['cart'])): ?>
                	<?php $__currentLoopData = $resultt['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<?php
                        	$products_vendor = DB::table('products')->where('products_id',$row->products_id)->value('vendor');
                            $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
                            $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
                            $productDetails = DB::table('products')->where('products_id',$row->products_id)->first();
                        ?>
                        <div class="ps-product--cart-mobile">
                            <div class="ps-product__thumbnail">
                            	<a href="<?php echo e(URL::to('product-detail/'.$row->products_slug)); ?>">
                                <img src="<?php echo e(URL::asset('/'.$row->image_path)); ?>" alt="<?php echo e($row->products_name); ?>"></a></div>
                            <div class="ps-product__content">
                              <a class="ps-product__remove" href="<?php echo e(URL::to('delete-cart/'.$row->customers_basket_id)); ?>" onclick="return confirm('Are you sure?');">
                              <i class="icon-cross"></i></a><a href="<?php echo e(URL::to('product-detail/'.$row->products_slug)); ?>"><?php echo e($row->products_name); ?></a>
                                <p>Seller: <strong> <?php echo e($first_name); ?>  <?php echo e($last_name); ?></strong></p><small><?php echo e($row->customers_basket_quantity); ?> x ₹<?php echo e($row->price); ?></small>
                            </div>
                        </div>
                        <br>
                        <?php $Subtotall += $row->customers_basket_quantity*$row->price; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </div>
            <div class="ps-cart__footer">
                <h3>Sub Total:<strong>₹<?php echo e($Subtotall); ?></strong></h3>
                <figure>
                <!-- <a class="ps-btn" href="<?php echo e(url('/shop')); ?>">View Cart</a> -->
                	<?php if(auth()->guard('customer')->check()): ?>
                    	<a class="ps-btn" href="<?php echo e(URL::to('/checkout')); ?>">Proceed to checkout</a>
                    <?php else: ?>
                    	<a class="ps-btn" href="<?php echo e(URL::to('/guest_checkout')); ?>">Proceed to checkout</a>
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    </div>
</div>
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Categories</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
<?php $alll_main_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->join('image_categories','image_categories.image_id','=','categories.categories_icon')
        ->where('categories.level','=',0)
        ->select('categories_description.*','image_categories.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
<?php if(count($alll_main_categories)>0): ?>
<?php $__currentLoopData = $alll_main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_main_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $alll_sub_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.parent_id',$alll_main_category->categories_id)
        ->where('categories.level','=',1)
        ->select('categories_description.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
            <?php if(count($alll_sub_categories)==0): ?>
            <li class="current-menu-item "><a href="<?php echo e(URL::to('shop-by-category/'.$alll_main_category->categories_slug)); ?>"><?php echo e(isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null); ?></a>
            </li>
            <?php endif; ?>
            <?php if(count($alll_sub_categories)>0): ?>
            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="<?php echo e(URL::to('shop-by-category/'.$alll_main_category->categories_slug)); ?>"><?php echo e(isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null); ?></a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <?php $__currentLoopData = $alll_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mega-menu__column">
                        <h4><?php echo e(isset($alll_sub_category->categories_name) ? $alll_sub_category->categories_name : null); ?><span class="sub-toggle"></span></h4>
<?php $alll_sub_sub_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.parent_id',$alll_sub_category->categories_id)
        ->where('categories.level','=',2)
        ->select('categories_description.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
                        <?php if(count($alll_sub_sub_categories)>0): ?>
                        <ul class="mega-menu__list">
                            <?php $__currentLoopData = $alll_sub_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_sub_sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="current-menu-item "><a href="<?php echo e(URL::to('shop-by-category/'.$alll_sub_sub_category->categories_slug)); ?>"><?php echo e(isset($alll_sub_sub_category->categories_name) ? $alll_sub_sub_category->categories_name : null); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="<?php echo e(URL::to('/search')); ?>" method="get">
            <div class="form-group--nest">
                <input class="form-control typeahead" value="<?php echo e(isset($search)?$search:''); ?>" type="text" placeholder="Search something..." name="search" id="input-search-mobile2">
                <button type="submit"><i class="icon-magnifier"></i></button>
            </div>
            
            <div class="ps-panel--search-result"  id="search_results_mobile2">
              <div class="ps-panel__content">
              </div>
              <div class="ps-panel__footer text-center">
                  <a href="<?php echo e(URL::to('/shop')); ?>">See all results</a>
              </div>
            </div>
            
            
            
            
        </form>
    </div>
    <div class="navigation__content"></div>
</div>
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
        	<li class="menu-item-has-children"><a href="<?php echo e(URL::to('/shop')); ?>"><b>Shop By Category</b></a><span class="sub-toggle"></span>
              <ul class="sub-menu">
                <?php if(count($alll_main_categories)>0): ?>
                    <?php $__currentLoopData = $alll_main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_monthly_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="current-menu-item">
                            <a href="<?php echo e(URL::to('shop-by-category/'.$top_monthly_category->categories_slug)); ?>">
                                <?php echo e(isset($top_monthly_category->categories_name) ? $top_monthly_category->categories_name : null); ?>

                            </a>
                        </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
              </ul>
            </li>
            <li class="menu-item"><a href="<?php echo e(URL::to('/best-selling')); ?>">Best Sellers</a><span class="sub-toggle"></span></li>
			<li class="menu-item"><a href="<?php echo e(URL::to('/new-release')); ?>">New Release</a><span class="sub-toggle"></span></li>
    </div>
</div>

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
                    <!---<li><a href="<?php echo e(URL::to('/shipping')); ?>">Shipping</a></li>--->
                    <li><a href="<?php echo e(URL::to('/return-refund')); ?>">Return</a></li>
                    <!---<li><a href="<?php echo e(URL::to('/faqs')); ?>">FAQs</a></li>--->
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
    
  <div class="navigation--list">
      <div class="navigation__content">
      	<a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
        	<i class="icon-menu"></i><span> Menu</span></a>
            <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i>
            <span> Categories</span></a>
            <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar">
            <i class="icon-magnifier"></i>
            <span> Search</span></a>
            <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile">
            <i class="icon-bag2"></i><span> Cart</span></a></div>
  </div>
</footer>
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>

<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="<?php echo e(URL::to('/search')); ?>" method="get">
        
            <input class="form-control typeahead"  type="text" placeholder="Search for..." name="search" >
            <button type="submit"><i class="aroma-magnifying-glass"></i></button>
            <div class="ps-panel--search-result"  >
              <div class="ps-panel__content">
              </div>
              <div class="ps-panel__footer text-center">
                  <a href="<?php echo e(URL::to('/shop')); ?>">See all results</a>
              </div>
            </div>
            
            
        </form>
    </div>
</div><?php /**PATH /var/www/html/ipingdatalabl/resources/views/web/includes/footer.blade.php ENDPATH**/ ?>