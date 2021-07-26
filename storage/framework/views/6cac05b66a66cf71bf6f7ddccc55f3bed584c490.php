<?php $__env->startSection('content'); ?>
<div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
        <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
        <div class="ps-cart--mobile">
            <div class="ps-cart__content">
                <div class="ps-product--cart-mobile">
                    <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt=""></a></div>
                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x ?59.99</small>
                    </div>
                </div>
            </div>
            <div class="ps-cart__footer">
                <h3>Sub Total:<strong>?59.99</strong></h3>
                <figure><a class="ps-btn" href="<?php echo e(url('/shop')); ?>">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
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
<div class="navigation--list">
    <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="<?php echo e(URL::to('/')); ?>" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
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
            <li class="menu-item-has-children"><a href="index.html">Home</a><span class="sub-toggle"></span>
                <ul class="sub-menu">
                    <li class="current-menu-item "><a href="index.html">Marketplace Full Width</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-2.html">Home Auto Parts</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-10.html">Home Technology</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-9.html">Home Organic</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-3.html">Home Marketplace V1</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-4.html">Home Marketplace V2</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-5.html">Home Marketplace V3</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-6.html">Home Marketplace V4</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-7.html">Home Electronic</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-8.html">Home Furniture</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-kids.html">Home Kids</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-photo-and-video.html">Home photo and picture</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children has-mega-menu"><a href="shop-default.html">Shop</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Catalog Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="shop-default.html">Shop Default</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-default.html">Shop Fullwidth</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-categories.html">Shop Categories</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-sidebar.html">Shop Sidebar</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-sidebar-without-banner.html">Shop Without Banner</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-carousel.html">Shop Carousel</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Product Layout<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="product-default.html">Default</a>
                            </li>
                            <li class="current-menu-item "><a href="product-extend.html">Extended</a>
                            </li>
                            <li class="current-menu-item "><a href="product-full-content.html">Full Content</a>
                            </li>
                            <li class="current-menu-item "><a href="product-box.html">Boxed</a>
                            </li>
                            <li class="current-menu-item "><a href="product-sidebar.html">Sidebar</a>
                            </li>
                            <li class="current-menu-item "><a href="product-default.html">Fullwidth</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Product Types<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="product-default.html">Simple</a>
                            </li>
                            <li class="current-menu-item "><a href="product-default.html">Color Swatches</a>
                            </li>
                            <li class="current-menu-item "><a href="product-image-swatches.html">Images Swatches</a>
                            </li>
                            <li class="current-menu-item "><a href="product-countdown.html">Countdown</a>
                            </li>
                            <li class="current-menu-item "><a href="product-multi-vendor.html">Multi-Vendor</a>
                            </li>
                            <li class="current-menu-item "><a href="product-instagram.html">Instagram</a>
                            </li>
                            <li class="current-menu-item "><a href="product-affiliate.html">Affiliate</a>
                            </li>
                            <li class="current-menu-item "><a href="product-on-sale.html">On sale</a>
                            </li>
                            <li class="current-menu-item "><a href="product-video.html">Video Featured</a>
                            </li>
                            <li class="current-menu-item "><a href="product-groupped.html">Grouped</a>
                            </li>
                            <li class="current-menu-item "><a href="product-out-stock.html"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Woo Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="shopping-cart.html">Shopping Cart</a>
                            </li>
                            <li class="current-menu-item "><a href="checkout.html">Checkout</a>
                            </li>
                            <li class="current-menu-item "><a href="whishlist.html">Whishlist</a>
                            </li>
                            <li class="current-menu-item "><a href="compare.html">Compare</a>
                            </li>
                            <li class="current-menu-item "><a href="order-tracking.html">Order Tracking</a>
                            </li>
                            <li class="current-menu-item "><a href="my-account.html">My Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item-has-children has-mega-menu"><a href="">Pages</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Basic Page<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="about-us.html">About Us</a>
                            </li>
                            <li class="current-menu-item "><a href="contact-us.html">Contact</a>
                            </li>
                            <li class="current-menu-item "><a href="faqs.html">Faqs</a>
                            </li>
                            <li class="current-menu-item "><a href="comming-soon.html">Comming Soon</a>
                            </li>
                            <li class="current-menu-item "><a href="404-page.html">404 Page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Vendor Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="become-a-vendor.html">Become a Vendor</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-store.html">Vendor Store</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-dashboard-free.html">Vendor Dashboard Free</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-dashboard-pro.html">Vendor Dashboard Pro</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item-has-children has-mega-menu"><a href="">Blogs</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Blog Layout<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="blog-grid.html">Grid</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-list.html">Listing</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-small-thumb.html">Small Thumb</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-left-sidebar.html">Left Sidebar</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-right-sidebar.html">Right Sidebar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Single Blog<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="blog-detail.html">Single 1</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-2.html">Single 2</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-3.html">Single 3</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-4.html">Single 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div id="homepage-1">
    <div class="ps-home-banner ps-home-banner--1">
        <div class="ps-container">
            <div class="ps-section__left">
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                    <?php if(isset($sliders)): ?>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="ps-banner"><a href="javascript:;"><img src="<?php echo e(URL::asset('/'.$slider->path)); ?>" alt="" class="w-100"></a></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php
             $home_right_1 = DB::table('advertisements')->where('id',1)->first();
            ?>
            <div class="ps-section__right">
             <?php if(!empty($home_right_1->home_right_1)): ?>
             <?php
              $home_right_img_path = DB::table('image_categories')->where('image_id',$home_right_1->home_right_1)->where('image_type','ACTUAL')->value('path');
             ?>
                <a class="ps-collection" href="javascript:;">
                    <img src="<?php echo e(asset($home_right_img_path)); ?>" alt="">
                </a>
             <?php endif; ?>
             <?php if(!empty($home_right_1->home_right_1)): ?>
                  <?php
                    $home_right_img_path2 = DB::table('image_categories')->where('image_type','ACTUAL')->where('image_id',$home_right_1->home_right_2)->value('path');
                  ?>
                <a class="ps-collection" href="javascript:;">
                    <img src="<?php echo e(asset($home_right_img_path2)); ?>" alt="">
               </a>
            <?php endif; ?>
            </div>
        </div>
    </div>
<!--    <div class="ps-top-categories">
        <div class="ps-container">
            <h3>Top categories of the month</h3>
            <div class="row">
                <?php if(count($top_monthly_categories)>0): ?>
                <?php $__currentLoopData = $top_monthly_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_monthly_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="<?php echo e(URL::to('shop-by-category/'.$top_monthly_category->categories_slug)); ?>"></a>
                        <img src="<?php echo e(URL::to($top_monthly_category->path)); ?>" width="100px">
                        <p><?php echo e($top_monthly_category->categories_name); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>-->
    <div class="ps-product-list ps-clothings" id="topofthemonth">
        <div class="ps-container">
            <div class="ps-section__header">
                <h3>Top categories of the month</h3>
                <ul class="ps-section__links">
                    <li><a href="<?php echo e(URL::to('/shop')); ?>">View All</a></li>
                </ul>
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                    <?php if(count($top_monthly_categories)>0): ?>
                    <?php $__currentLoopData = $top_monthly_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_monthly_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="ps-product">
                        <div class="">
                            <a href="<?php echo e(URL::to('shop-by-category/'.$top_monthly_category->categories_slug)); ?>" class="books-panel-item-wrap is-book-panel-trigger selected">
                                <?php if(isset($top_monthly_category->path)): ?>
                                <div class="book-thumb-img-wrap has-edge">
                                    <img src="<?php echo e(URL::to($top_monthly_category->path)); ?>" class="w-100 img-fluid" alt="" width="267" height="400">            
                                </div>
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="ps-product__container">
                            <div class="on_producta row mb-2">
                                <div class="col-12 d-flex justify-content-center">
                                    <a class="btn btn-warning product-quickview" href="<?php echo e(URL::to('shop-by-category/'.$top_monthly_category->categories_slug)); ?>" role="button" aria-pressed="true"><?php echo e(isset($top_monthly_category->categories_name) ? $top_monthly_category->categories_name : null); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                <h3>New Arrivals</h3>
                <ul class="ps-section__links">
                    <li><a href="<?php echo e(URL::to('/shop')); ?>">View All</a></li>
                </ul>
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                    <?php if(count($newest_products)>0): ?>
                    <?php $__currentLoopData = $newest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newest_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $newest_product_main_image = DB::table('image_categories')->where('image_id',$newest_product->products_image)->value('path');
                    $newest_product_name = DB::table('products_description')->where('products_id',$newest_product->products_id)->value('products_name');
                    $product_inventory_in = DB::table('inventory')->where('products_id',$newest_product->products_id)->where('stock_type','in')->sum('stock');
                    $product_inventory_out = DB::table('inventory')->where('products_id',$newest_product->products_id)->where('stock_type','out')->sum('stock');
                    $product_inventory = $product_inventory_in-$product_inventory_out;
                    $newest_product_percent = (($newest_product->products_mrp - $newest_product->products_price)*100) /$newest_product->products_mrp;
                    ?>
                    <div class="BooksPanel ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>" class="books-panel-item-wrap is-book-panel-trigger selected">
                                <?php if(isset($newest_product_main_image)): ?>
                                <div class="book-thumb-img-wrap has-edge">
                                    <img src="<?php echo e(URL::asset('/'.$newest_product_main_image)); ?>" class="w-100 img-fluid" alt="" width="267" height="400">            
                                </div>
                                <?php endif; ?>
                            </a>
                            <div class="ps-product__badge"><?php echo e(isset($newest_product_percent) ? round($newest_product_percent) : '0'); ?>%</div>
                        </div>
                        <div class="ps-product__container">
                            <div class="on_producta row mb-2">
                                <div class="col-12 d-flex justify-content-between">
                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="<?php echo e($newest_product->products_id); ?>">Quick View</a>
                                    <?php if($product_inventory==0): ?>
                                    <strong class="text-danger"> Out of stock</strong>
                                    <?php else: ?>
                                    <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="type" value="1"/>
                                        <input type="hidden" name="products_id" value="<?php echo e(isset($newest_product->products_id) ? $newest_product->products_id : null); ?>">
                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>"><?php echo e(isset($newest_product_name) ? $newest_product_name : null); ?></a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_price) ? $newest_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_mrp) ? $newest_product->products_mrp : null); ?> </del></p>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>"><?php echo e(isset($newest_product_name) ? $newest_product_name : null); ?></a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_price) ? $newest_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_mrp) ? $newest_product->products_mrp : null); ?> </del></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                <h3>Best Sellers</h3>
                <ul class="ps-section__links">
                    <li><a href="<?php echo e(URL::to('/shop')); ?>">View All</a></li>
                </ul>
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                    <?php if(count($popular_products)>0): ?>
                    <?php $__currentLoopData = $popular_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $popular_product_main_image = DB::table('image_categories')->where('image_id',$popular_product->products_image)->value('path');
                    $popular_product_name = DB::table('products_description')->where('products_id',$popular_product->products_id)->value('products_name');
                    $popular_product_inventory_in = DB::table('inventory')->where('products_id',$popular_product->products_id)->where('stock_type','in')->sum('stock');
                    $popular_product_inventory_out = DB::table('inventory')->where('products_id',$popular_product->products_id)->where('stock_type','out')->sum('stock');
                    $popular_product_inventory = $popular_product_inventory_in-$popular_product_inventory_out;
                    $popular_product_percent = (($popular_product->products_mrp - $popular_product->products_price)*100) /$popular_product->products_mrp;
                    ?>
                    <div class="BooksPanel ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="<?php echo e(URL::to('product-detail/'.$popular_product->products_slug)); ?>" class="books-panel-item-wrap is-book-panel-trigger selected">
                                <div class="book-thumb-img-wrap has-edge">
                                    <img src="<?php echo e(URL::asset('/'.$popular_product_main_image)); ?>" class="w-100 img-fluid" alt="" width="267" height="400">            
                                </div>
                            </a>
                            <div class="ps-product__badge"><?php echo e(isset($popular_product_percent) ? round($popular_product_percent) : '0'); ?>%</div>
                        </div>
                        <div class="ps-product__container">
                            <div class="on_producta row mb-2">
                                <div class="col-12 d-flex justify-content-between">
                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="<?php echo e($popular_product->products_id); ?>">Quick View</a>
                                    <?php if($popular_product_inventory==0): ?>
                                    <strong class="text-danger"> Out of stock</strong>
                                    <?php else: ?>
                                    <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="type" value="1"/>
                                        <input type="hidden" name="products_id" value="<?php echo e(isset($popular_product->products_id) ? $popular_product->products_id : null); ?>">
                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$popular_product->products_slug)); ?>"><?php echo e(isset($popular_product_name) ? $popular_product_name : null); ?></a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($popular_product->products_price) ? $popular_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($popular_product->products_mrp) ? $popular_product->products_mrp : null); ?> </del></p>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$popular_product->products_slug)); ?>"><?php echo e(isset($popular_product_name) ? $popular_product_name : null); ?></a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($popular_product->products_price) ? $popular_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($popular_product->products_mrp) ? $popular_product->products_mrp : null); ?> </del></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php if(count($categories_products) >0): ?>
        <?php $__currentLoopData = $categories_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $categories_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ps-product-list ps-clothings">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3><?php echo e(ucwords(str_replace("_", " ", $index))); ?></h3>
                    <ul class="ps-section__links">
                        <li><a href="<?php echo e(URL::to('/shop-by-category/'.$index)); ?>">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        <?php if(count($categories_product)>0): ?>
                        <?php $__currentLoopData = $categories_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newest_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $newest_product_main_image = DB::table('image_categories')->where('image_id',$newest_product->products_image)->value('path');
                        $newest_product_name = DB::table('products_description')->where('products_id',$newest_product->products_id)->value('products_name');
                        $product_inventory_in = DB::table('inventory')->where('products_id',$newest_product->products_id)->where('stock_type','in')->sum('stock');
                        $product_inventory_out = DB::table('inventory')->where('products_id',$newest_product->products_id)->where('stock_type','out')->sum('stock');
                        $product_inventory = $product_inventory_in-$product_inventory_out;
                        $newest_product_percent = (($newest_product->products_mrp - $newest_product->products_price)*100) /$newest_product->products_mrp;
                        ?>
                        <div class="BooksPanel ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>" class="books-panel-item-wrap is-book-panel-trigger selected">
                                    <?php if(isset($newest_product_main_image)): ?>
                                    <div class="book-thumb-img-wrap has-edge">
                                        <img src="<?php echo e(URL::asset('/'.$newest_product_main_image)); ?>" class="w-100 img-fluid" alt="" width="267" height="400">            
                                    </div>
                                    <?php endif; ?>
                                </a>
                                <div class="ps-product__badge"><?php echo e(isset($newest_product_percent) ? round($newest_product_percent) : '0'); ?>%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="on_producta row mb-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="<?php echo e($newest_product->products_id); ?>">Quick View</a>
                                        <?php if($product_inventory==0): ?>
                                        <strong class="text-danger"> Out of stock</strong>
                                        <?php else: ?>
                                        <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="type" value="1"/>
                                            <input type="hidden" name="products_id" value="<?php echo e(isset($newest_product->products_id) ? $newest_product->products_id : null); ?>">
                                            <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>"><?php echo e(isset($newest_product_name) ? $newest_product_name : null); ?></a>
                                    <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_price) ? $newest_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_mrp) ? $newest_product->products_mrp : null); ?> </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>"><?php echo e(isset($newest_product_name) ? $newest_product_name : null); ?></a>
                                    <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_price) ? $newest_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_mrp) ? $newest_product->products_mrp : null); ?> </del></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    
    
    

   
    <!--<div class="ps-product-list ps-clothings">-->
    <!--    <div class="ps-container">-->
    <!--        <div class="ps-section__header">-->
    <!--            <h3>Featured Author's</h3>-->
    <!--            <ul class="ps-section__links">-->
    <!--                <li><a href="javascript:;">View All</a></li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--        <div class="ps-section__content" id="authorsdetails">-->
    <!--            <div class="ps-carousel--nav owl-slider owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">-->
    <!--                <div class="owl-stage-outer">-->
    <!--                    <div class="owl-stage text-center" style="transform: translate3d(-644px, 0px, 0px); transition: all 1s ease 0s; width: 2149px;">-->
    <!--                        <?php if(count($authors)>0): ?>-->
    <!--                        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
    <!--                        <div class="owl-item" style="width: 214.833px;">-->
    <!--                            <div class="ps-product">-->
    <!--                                <div class="Featured_Author"><a href="javascript:;">-->
    <!--                                    <img src="<?php echo e(URL::asset('/'.$author->path)); ?>" alt="author"></a>-->
    <!--                                </div>-->
    <!--                                <div class="ps-product__container">-->
    <!--                                    <div class="ps-product__content">-->
    <!--                                        <a href="javascript:;"><h5><?php echo e($author->manufacturer_name); ?></h5></a>-->
    <!--                                    </div>-->
    <!--                                    <div class="ps-product__content hover">-->
    <!--                                        <a href="javascript:;"><h5><?php echo e($author->manufacturer_name); ?></h5></a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
    <!--                        <?php endif; ?>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="owl-nav">-->
    <!--                    <button type="button" role="presentation" class="owl-prev">-->
    <!--                        <i class="icon-chevron-left"></i>-->
    <!--                    </button>-->
    <!--                    <button type="button" role="presentation" class="owl-next">-->
    <!--                        <i class="icon-chevron-right"></i>-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--                <div class="owl-dots">-->
    <!--                    <button role="button" class="owl-dot active">-->
    <!--                        <span></span>-->
    <!--                    </button>-->
    <!--                    <button role="button" class="owl-dot">-->
    <!--                        <span></span>-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

        <div class="ps-site-features">
                <div class="ps-container">
                    <div class="ps-block--site-features">
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-rocket"></i></div>
                            <div class="ps-block__right">
                                <h4>Free Delivery</h4>
                                <p>For all oders over ?99</p>
                            </div>
                        </div>
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-sync"></i></div>
                            <div class="ps-block__right">
                                <h4>90 Days Return</h4>
                                <p>If goods have problems</p>
                            </div>
                        </div>
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                            <div class="ps-block__right">
                                <h4>Secure Payment</h4>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                            <div class="ps-block__right">
                                <h4>24/7 Support</h4>
                                <p>Dedicated support</p>
                            </div>
                        </div>
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-gift"></i></div>
                            <div class="ps-block__right">
                                <h4>Gift Service</h4>
                                <p>Support gift service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php echo $__env->make("web.includes.newsletter", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\apnamal\resources\views/web/index.blade.php ENDPATH**/ ?>