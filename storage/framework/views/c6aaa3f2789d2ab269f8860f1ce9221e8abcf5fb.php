
<?php $__env->startSection('content'); ?>
<div class="ps-layout--shop" data-select2-id="11">
    <div class="ps-layout__left">
        <aside class="widget widget_shop">
            <h4 class="widget-title">Categories</h4>
            <ul class="ps-list--categories">
<?php $alll_main_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.level','=',0)
        ->select('categories_description.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
<?php if(count($alll_main_categories)>0): ?>
<?php $__currentLoopData = $alll_main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_main_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $alll_sub_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.parent_id',$alll_main_category->categories_id)
        ->where('categories.level','=',1)
        ->select('categories_description.*','categories.categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
                <?php if(count($alll_sub_categories)==0): ?>
                <li class="current-menu-item ">
                    <!--<a href="<?php echo e(URL::to('shop-by-category/'.$alll_main_category->categories_slug)); ?>"><?php echo e(isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null); ?></a>-->
                    <a href="javascript:;" class="filterProducts categoryid <?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'activeOption';} ?>" style="<?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'color: #fcb800';} ?>" data-categoryid="<?php echo e($alll_main_category->categories_id); ?>"><?php echo e(isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null); ?></a>
                </li>
                <?php endif; ?>
                <?php if(count($alll_sub_categories)>0): ?>
                <li class="current-menu-item menu-item-has-children">
                    <!--<a href="<?php echo e(URL::to('shop-by-category/'.$alll_main_category->categories_slug)); ?>"><?php echo e(isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null); ?></a>-->
                    <a href="javascript:;" class="filterProducts categoryid <?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'activeOption';} ?>" style="<?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'color: #fcb800';} ?>" data-categoryid="<?php echo e($alll_main_category->categories_id); ?>"><?php echo e(isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null); ?></a>
                    <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $alll_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="current-menu-item menu-item-has-children">
                            <a href="javascript:;" class="filterProducts categoryid" data-categoryid="<?php echo e($alll_sub_category->categories_id); ?>"><?php echo e(isset($alll_sub_category->categories_name) ? $alll_sub_category->categories_name : null); ?></a>
<?php $alll_sub_sub_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.parent_id',$alll_sub_category->categories_id)
        ->where('categories.level','=',2)
        ->select('categories_description.*','categories.categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
                            <?php if(count($alll_sub_sub_categories)>0): ?>
                            <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <?php $__currentLoopData = $alll_sub_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alll_sub_sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="current-menu-item ">
                                    <!--<a href="<?php echo e(URL::to('shop-by-category/'.$alll_sub_sub_category->categories_slug)); ?>"><?php echo e(isset($alll_sub_sub_category->categories_name) ? $alll_sub_sub_category->categories_name : null); ?></a>-->
                                    <a href="javascript:;" class="filterProducts categoryid" data-categoryid="<?php echo e($alll_sub_sub_category->categories_id); ?>"><?php echo e(isset($alll_sub_sub_category->categories_name) ? $alll_sub_sub_category->categories_name : null); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </aside>
        <aside class="widget widget_shop">

            <figure>
                <h4 class="widget-title">By Price</h4>
                <div id="nonlinear" class="noUi-target noUi-ltr noUi-horizontal"></div>
                <p class="ps-slider__meta ">Price:<span class="ps-slider__value">Min. <span class="ps-slider__min filterProducts1">0</span></span>-<span class="ps-slider__value ">Max.<span class="ps-slider__max filterProducts1">1000</span></span></p>
            </figure>
            <figure>
                <h4 class="widget-title">By RATING</h4>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterPoducts1" type="checkbox" id="review-1" name="review" value="5">
                    <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-2" name="review" value="4">
                    <label for="review-2"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-3" name="review" value="3">
                    <label for="review-3"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-4" name="review" value="2">
                    <label for="review-4"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-5" name="review" value="1">
                    <label for="review-5"><span><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></label>
                </div>
            </figure>
        </aside>
    </div>
    <div class="ps-layout__right" data-select2-id="10">
        <div class="ps-shopping ps-tab-root" data-select2-id="9">
            <div class="ps-shopping__header">
                <div class="ps-shopping__actions" data-select2-id="8">
                    <select class="ps-select select2-hidden-accessible filterProducts1" id="sortby" data-placeholder="Sort Items" data-select2-id="4" tabindex="-1" aria-hidden="true" style="width:350px">
                        <option value="1">Sort by latest</option>
                        <option value="2">Sort by popularity</option>
                        <option value="3">Sort by average rating</option>
                        <option value="4">Sort by price: low to high</option>
                        <option value="5">Sort by price: high to low</option>
                    </select>
<!--                    <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="5" style="width: 200px;">
                        <span class="selection">
                            <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-h5e4-container">
                                <span class="select2-selection__rendered" id="select2-h5e4-container" role="textbox" aria-readonly="true" title="Sort by latest">Sort by latest</span>
                                <span class="select2-selection__arrow" role="presentation">
                                    <b role="presentation"></b>
                                </span>
                            </span>
                        </span>
                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                    </span>-->
                </div>
            </div>
            <div class="ps-tabs">
                <div class="ps-tab active append_products" id="tab-1">
                    <div class="ps-shopping-product">
                        <div class="row">
                            <?php if(count($products)>0): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $product_main_image = DB::table('image_categories')->where('image_id', $product->products_image)->value('path');
                            $product_images_ids = DB::table('products_images')->where('products_id', $product->products_id)->pluck('image')->toArray();
                            $product_images = DB::table('image_categories')->whereIn('image_id', $product_images_ids)->where('image_type','ACTUAL')->pluck('path')->toArray();
                            $product_name = DB::table('products_description')->where('products_id', $product->products_id)->first();
                            $product_inventory_in = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','in')->sum('stock');
                            $product_inventory_out = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','out')->sum('stock');
                            $product_inventory = $product_inventory_in-$product_inventory_out;
                            $product_percent = (($product->products_mrp - $product->products_price)*100) /$product->products_mrp;
                            ?>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6  col-6">
                                <div class="BooksPanel ps-product">
                                    <div class="ps-product__thumbnail">
                                        <a href="<?php echo e(URL::asset('product-detail/'.$product->products_slug)); ?>" class="books-panel-item-wrap is-book-panel-trigger selected">
                                            <div class="book-thumb-img-wrap has-edge">
                                                <img src="<?php echo e(URL::asset('/'.$product_main_image)); ?>" class="w-100 img-fluid" alt="" width="267" height="400">            
                                            </div>
                                        </a>
                                        <div class="ps-product__badge"><?php echo e(isset($product_percent) ? round($product_percent) : '0'); ?>%</div>
                                    </div>
                                    <div class="ps-product__container">
                                        <div class="ps-product__content">
                                            <div class="on_producta row mb-2">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="<?php echo e($product->products_id); ?>">Quick View</a>
                                                    <?php if($product_inventory==0): ?>
                                                    <strong class="text-danger"> Out of stock</strong>
                                                    <?php else: ?>
                                                    <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="products_id" value="<?php echo e(isset($product->products_id) ? $product->products_id : null); ?>">
                                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                                    </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$product->products_slug)); ?>"><?php echo $product_name->products_name; ?></a>
                                            <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($product->products_price) ? $product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($product->products_mrp) ? $product->products_mrp : null); ?> </del></p>
                                        </div>
                                        <div class="ps-product__content hover">
                                            <div class="on_producta row mb-2">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="<?php echo e($product->products_id); ?>">Quick View</a>
                                                    <?php if($product_inventory==0): ?>
                                                    <strong class="text-danger"> Out of stock</strong>
                                                    <?php else: ?>
                                                    <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="products_id" value="<?php echo e(isset($product->products_id) ? $product->products_id : null); ?>">
                                                        <input type="hidden" name="type" value="1"/>
                                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                                    </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$product->products_slug)); ?>"><?php echo $product_name->products_name; ?></a>
                                            <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($product->products_price) ? $product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($product->products_mrp) ? $product->products_mrp : null); ?> </del></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="ps-pagination">
                        <?php if(count($products)>0): ?>
                        <?php echo $products->appends(\Request::except('page'))->render(); ?>

                        <?php endif; ?>
                    </div>
                </div>
<!--                <div class="ps-tab" id="tab-2">
                    <div class="ps-shopping-product">
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/1.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__vendor">Sold by:<a href="#">ROBERT’S STORE</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?1310.00</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/1.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Young Shop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?1150.00</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/2.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?42.99 - ?60.00</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/3.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?125.30</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/4.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Global Office</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?55.99</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/5.jpg" alt=""></a>
                                <div class="ps-product__badge">-37%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?32.99 <del>?41.00 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/6.jpg" alt=""></a>
                                <div class="ps-product__badge">-5%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?100.99 <del>?106.00 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/7.jpg" alt=""></a>
                                <div class="ps-product__badge">-16%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Korea Long Sofa Fabric In Blue Navy Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?567.89 <del>?670.20 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/8.jpg" alt=""></a>
                                <div class="ps-product__badge">-16%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Unero Military Classical Backpack</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>02</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?35.89 <del>?42.20 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/9.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Rayban Rounded Sunglass Brown Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>02</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?35.89</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/10.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?29.39 - ?39.99</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/11.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?13.43</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-pagination">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/shop_by_catogory.blade.php ENDPATH**/ ?>