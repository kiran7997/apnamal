<?php $__env->startSection('content'); ?>
<style>
#topofthemonth .owl-carousel .owl-item img {
	width: 90px !important;
	margin: 0 auto !important;
	padding-top: 20px;
	padding-bottom: 20px;
	height: 130px;
	object-fit: contain;
}
</style>
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
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/index.blade.php ENDPATH**/ ?>