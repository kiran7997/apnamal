
<?php $__env->startSection('content'); ?>
<style>
.product-review ul li {
	display: inline-block;
	padding: 0.2rem;
</style>
<div class="ps-breadcrumb">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
<!--            <li><a href="shop-default.html">Consumer Electrics</a></li>
            <li><a href="shop-default.html">Refrigerators</a></li>-->
            <li><?php echo isset($product_name->products_name) ? $product_name->products_name : null; ?></li>
        </ul>
    </div>
</div>
<div class="ps-page--product">
    <div class="ps-container">
        <div class="ps-page__container">
            <div class="ps-page__left">
                <div class="ps-product--detail ps-product--fullwidth">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="true">
                            <figure>
                                <div class="ps-wrapper">
                                    <div class="ps-product__gallery slick-initialized slick-slider" data-arrow="true">
                                        <a href="javascript:;" class="slick-arrow slick-disabled" aria-disabled="true" style=""><i class="fa fa-angle-left"></i>
                                        </a>
                                        <div aria-live="polite" class="slick-list draggable">
                                            <div class="slick-track" role="listbox" style="opacity: 1; width: 1041px;">
                                                <div class="item slick-slide slick-current slick-active text-center single_product_image_wrap" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="">
                                                    <a href="<?php echo e(URL::asset('/'.$product_main_image)); ?>" tabindex="0">
                                                        <img src="<?php echo e(URL::asset('/'.$product_main_image)); ?>" alt="image" class="img-fluid w-100">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="slick-arrow" style="" aria-disabled="false"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="ps-product__variants slick-initialized slick-slider slick-vertical" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                <div aria-live="polite" class="slick-list draggable" style="height: 280px;">
                                    <div class="slick-track" role="listbox" style="opacity: 1; height: 210px; transform: translate3d(0px, 0px, 0px);">
                                        <div class="item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 60px;">
                                            <img src="<?php echo e(URL::asset('/'.$product_main_image)); ?>" alt="">
                                        </div>
                                        <?php if(count($product_images)>0): ?>
                                        <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p=>$product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item slick-slide slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 60px;">
                                            <img src="<?php echo e(URL::asset('/'.$product_image)); ?>" alt="">
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1><?php echo isset($product_name->products_name) ? $product_name->products_name : null; ?></h1>
                            <div class="ps-product__meta">
                    <?php
                    if(!empty($product->products_id)){
                     $total_count_review = DB::table('reviews')->where('products_id',$product->products_id)->count();
                     $total_review_sum = DB::table('reviews')->where('products_id',$product->products_id)->sum('reviews_rating');
                    }else{
                        $total_count_review = '';
                    }
                    if(!empty($total_count_review)){
                        $total_review = $total_review_sum/$total_count_review;
                       } else {
                           $total_review = '';
                      }
                      $round_review = round($total_review);
                    ?>
                                <div class="ps-product__rating">
                                    <div class="br-wrapper br-theme-fontawesome-stars">
                                        <div class="br-widget br-readonly">
                                          <?php if($round_review == 5): ?>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="5" class="br-selected br-current"></a>
                                          <?php elseif($round_review == 4): ?>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          <?php elseif($round_review == 3): ?>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          <?php elseif($round_review == 2): ?>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          <?php elseif($round_review == 1): ?>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          <?php else: ?>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          <?php endif; ?>
                                            <div class="br-current-rating">1</div>
                                        </div>
                                    </div>
                                    <span><?php echo e($total_count_review); ?> review</span>
                                </div>
<!--                                <div class="ps-product__actions ml-5">
                                    <form action="<?php echo e(url('/likeMyProduct')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="products_id" value="<?php echo e(isset($product->products_id) ? $product->products_id : null); ?>">
                                        <button type="submit" class="btn btn-link">
                                            <i class="icon-heart"></i>
                                        </button>
                                    </form>
                                </div>-->
                            </div>
                             <?php
                                if(!empty($product->vendor)){
                                        $vendorfname = DB::table('users')->where('id',$product->vendor)->value('first_name');
                                        $vendorlname = DB::table('users')->where('id',$product->vendor)->value('last_name');
                                        $vendorcompany = DB::table('users')->where('id',$product->vendor)->value('company');
                                } else {
                                        $vendorname = '';
                                }
                              ?>
                           <?php if(!empty($product->vendor)): ?>
                            <p>Seller : <a href="<?php echo e(url('vendor-store/'.$product->vendor.'/'.str_slug($vendorcompany))); ?>"><strong><?php echo e($vendorfname); ?> <?php echo e($vendorlname); ?></strong></a></p>
                           <?php endif; ?>
                            <h4 class="ps-product__price">
                                <i class="fa fa-inr"></i>
                                <?php echo isset($product->products_price) ? $product->products_price : null; ?>

                                <span type="" class="btn btn-link ml-5" data-toggle="tooltip" data-placement="right" title="Ship this item into your cart qualifier for free shipping. All orders for eligible items amounting to RS 150 or more quantity for free shipping with your stepdoor/city.">
                               <i class="fa fa-question-circle fx-3 fa-3x" aria-hidden="true"></i>
                              </span>
                            </h4>
                           
                            <div class="ps-product__desc">
                                <?php echo isset($product->short_description) ? $product->short_description : null; ?>

                            </div>
                            <div class="ps-product__shopping">
                                    <?php
                                    $product_inventory_in = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','in')->sum('stock');
                                    $product_inventory_out = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','out')->sum('stock');
                                    $product_inventory = $product_inventory_in-$product_inventory_out;
                                    if (empty(session('customers_id'))) {
                                        $customers_id = '';
                                    } else {
                                        $customers_id = session('customers_id');
                                    }
                                    $session_id = Session::getId();
                                    if (empty($customers_id)) {
                                        $exist = DB::table('customers_basket')->where([
                                                    ['session_id', '=', $session_id],
                                                    ['products_id', '=', $product->products_id],
                                                    ['is_order', '=', 0],
                                                ])->get();
                                    } else {
                                        $exist = DB::table('customers_basket')->where([
                                                    ['customers_id', '=', $customers_id],
                                                    ['products_id', '=', $product->products_id],
                                                    ['is_order', '=', 0],
                                                ])->get();
                                    }
                                    ?>
                                <?php if($product_inventory==0): ?>
                                <strong class="ps-btn text-danger"> Out of stock</strong>
                                <?php else: ?>
                                <figure>
                                    <figcaption>Quantity</figcaption>
                                    <div class="form-group--number">
                                        <button class="up incQty" data-productid="<?php echo e($product->products_id); ?>" data-productprice="<?php echo e($product->products_price); ?>"><i class="fa fa-plus"></i></button>
                                        <button class="down decQty" data-productid="<?php echo e($product->products_id); ?>" data-productprice="<?php echo e($product->products_price); ?>"><i class="fa fa-minus"></i></button>
                                        <input class="form-control" min="1" id="changeQty<?php echo e($product->products_id); ?>" disabled type="text" value="<?php echo e(isset($exist[0]->customers_basket_quantity) ? $exist[0]->customers_basket_quantity : '1'); ?>">
                                    </div>
                                </figure>
                                <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="type" value="1"/>
                                    <input type="hidden" name="products_id" value="<?php echo e(isset($product->products_id) ? $product->products_id : null); ?>">
                                    <button class="ps-btn ps-btn--black" type="submit">Add to cart</button>
                                </form>
                                <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="type" value="2"/>
                                    <input type="hidden" name="products_id" value="<?php echo e(isset($product->products_id) ? $product->products_id : null); ?>">
                                </form>
                                <div class="ps-product__shopping text-center border-bottom-0 mb-0 pb-0">
                               
                               <form action="<?php echo e(url('/likeMyProduct')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="products_id" value="<?php echo e(isset($product->products_id) ? $product->products_id : null); ?>">
                                    <button type="submit" class="btn-warning ps-btn">
                                        Add to wishlist
                                    </button>
                                </form>
                               
                           </div>
                                </div>
                           
                                 <div class="ps-product__shopping">
                                
                                <?php endif; ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="chk_availability" placeholder="Enter Postal Code">
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="checkps-btn mb-2 chk_availability">Check For Availability</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-success alert-dismissible d-none" id="chk_availability_success" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                                            Delivery available at this Postal code.
                                    </div>
                                    <div class="alert alert-danger alert-dismissible d-none" id="chk_availability_error" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                                            Delivery is not available at this Postal code.
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <?php
                    if(!empty($product->products_id)){
                     $review = DB::table('reviews')->where('products_id',$product->products_id)->get();
                     $count_review = DB::table('reviews')->where('products_id',$product->products_id)->count();
                     $review_sum = DB::table('reviews')->where('products_id',$product->products_id)->sum('reviews_rating');
                    }else{
                        $count_review = '';
                        
                        $review = array();
                    }
                    if(!empty($count_review)){
                          $total = $review_sum/$count_review;
                         } else {
                             $total = '';
                        }
                  if(!empty($product->products_id)){
                    $onestar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',1)->count();
                    $twostar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',2)->count();
                    $threestar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',3)->count();
                    $fourstar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',4)->count();
                    $fivestar = DB::table('reviews')->where('products_id',$product->products_id)->where('reviews_rating',5)->count();
                  } else {
                      $onestar = '';
                      $twostar = '';
                      $threestar = '';
                      $fourstar = '';
                      $fivestar = '';
                    }
                    
                    ?>
                    <div class="ps-product__content ps-tab-root">
                         <div class="ps-product__specification">
                                <?php echo isset($product->specification) ? $product->specification : null; ?>

                            </div>
                            <div class="ps-product__sharing">
                                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=&t=<?php echo e(Request::fullUrl()); ?>"><i class="fa fa-facebook"></i></a>
                                <a class="twitter" href="https://twitter.com/intent/tweet?<?php echo e(Request::fullUrl()); ?>"><i class="fa fa-twitter"></i></a>
                            <!--<a class="google" href="https://plus.google.com/share?url="><i class="fa fa-google-plus"></i></a>-->
                                <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(Request::fullUrl()); ?>"><i class="fa fa-linkedin"></i></a>
                           <!-- <a class="instagram" href="javascript:;"><i class="fa fa-instagram"></i></a>-->
                            </div>
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">Description</a></li>
                            <li><a href="#tab-2">Specification</a></li>
                            <li><a href="#tab-3">Vendor</a></li>
                            <li><a href="#tab-4">Reviews (<?php echo e($count_review); ?>)</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-document">
                                    <?php echo isset($product_name->products_description) ? $product_name->products_description : null; ?>

                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                <?php echo isset($product->specification) ? $product->specification : null; ?>

                            </div>
                            <?php
                              if(!empty($product->vendor)){
                                  $vendor = DB::table('users')->where('id',$product->vendor)->first();
                              } else {
                                  $vendor = '';
                              }
                            ?>
                            <div class="ps-tab" id="tab-3">
                                <h4><?php echo e(isset($vendor->first_name) ? $vendor->first_name : null); ?></h4>
                                <p><?php echo e(isset($vendor->company_description) ? $vendor->company_description : null); ?></p>
                                <!-- <a href="javascript:;">More Products from gopro</a>-->
                            </div>
                            <div class="ps-tab" id="tab-4">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                        <div class="ps-block--average-rating">
                                            <div class="ps-block__header">
                                              <?php if(!empty($total)): ?>
                                                <h3><?php echo e(number_format($total,1)); ?></h3>
                                                <?php else: ?>
                                                <h3>0</h3>
                                              <?php endif; ?>
                                                <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select>
                                                    <div class="br-widget br-readonly">
                                                       <?php if(!empty($total)): ?>
                                                        <?php for($i=0; $i < 5; ++$i): ?>
                                                            <i class="font-13 fa fa-star<?php echo e($total<=$i?'-o':''); ?>"></i>
                                                          <?php endfor; ?>
                                                          <?php else: ?>
                                                          <a href="javascript:;" data-rating-value="1" data-rating-text="1" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                          <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <span><?php echo e($count_review); ?> Review</span>
                                            </div>
                                            <div class="ps-block__star"><span>5 Star</span>
                                                <div class="ps-progress" data-value="<?php echo e($fivestar); ?>"><span style="width: <?php echo e($fivestar); ?>%;"></span></div><span><?php echo e($fivestar); ?>%</span>
                                            </div>
                                            <div class="ps-block__star"><span>4 Star</span>
                                                <div class="ps-progress" data-value="<?php echo e($fourstar); ?>"><span style="width: <?php echo e($fourstar); ?>%;"></span></div><span><?php echo e($fourstar); ?>%</span>
                                            </div>
                                            <div class="ps-block__star"><span>3 Star</span>
                                                <div class="ps-progress" data-value="<?php echo e($threestar); ?>"><span style="width: <?php echo e($threestar); ?>%;"></span></div><span><?php echo e($threestar); ?>%</span>
                                            </div>
                                            <div class="ps-block__star"><span>2 Star</span>
                                                <div class="ps-progress" data-value="<?php echo e($twostar); ?>"><span style="width: <?php echo e($twostar); ?>%;"></span></div><span><?php echo e($twostar); ?>%</span>
                                            </div>
                                            <div class="ps-block__star"><span>1 Star</span>
                                                <div class="ps-progress" data-value="<?php echo e($onestar); ?>"><span style="width: <?php echo e($onestar); ?>%;"></span></div><span><?php echo e($onestar); ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                        <?php if(Session::has('flash_message')): ?>
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                                            <?php echo e(Session::get('flash_message')); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php endif; ?>
                                        <form class="ps-form--review productreview" action="<?php echo e(URL::to('/productreview')); ?>" method="post" id="removestarfromlist">
                                            <?php echo e(csrf_field()); ?>

                                            <h4>Submit Your Review</h4>
                                        <?php if(count($review)>0): ?>
                                          <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php
                                           $users = DB::table('users')->where('id',$rate->customers_id)->first();
                                          ?>
                                          <h6><?php echo e(isset($users->first_name) ? $users->first_name : null); ?>  <?php echo e(isset($users->last_name) ? $users->last_name : null); ?></h6>
                                          <?php for($j=0; $j < 5; ++$j): ?>
                                            <i class="font-13 fa fa-star<?php echo e($rate->reviews_rating<=$j?'-o':''); ?>"></i>
                                          <?php endfor; ?>
                                          <strong><?php echo e($rate->review_comment); ?></strong>
                                         <hr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                            
                                    <input type="hidden" id="products_id" name="products_id" value="<?php echo e(isset($product->products_id) ? $product->products_id : null); ?>">
                                        <div class="form-group form-group__rating">
                                                <label>Your rating of this product</label>
                                                <div class="pl-4 rppgrating">
                									<input type="radio" id="star1" name="rating" value="1">
                									<label for="star1" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star2" name="rating" value="2">
                									<label for="star2" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star3" name="rating" value="3">
                									<label for="star3" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star4" name="rating" value="4">
                									<label for="star4" title="text"><i class="fa fa-star"></i></label>
                									<input type="radio" id="star5" name="rating" value="5">
                									<label for="star5" title="text"><i class="fa fa-star"></i></label>
                								 </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <textarea class="form-control" id="review_comment" required name="review_comment" rows="6" placeholder="Write your review here"></textarea>
                                            </div>
                                        <?php if(auth()->guard('customer')->check()): ?>
                                            <div class="form-group submit"> 
                                                <button class="ps-btn" type="submit">Submit Review</button>
                                            </div>
                                          <?php else: ?>
                                            <div class="form-group submit">
                                                <a href="<?php echo e(url('login')); ?>" class="ps-btn">Submit Review</a>
                                            </div>
                                         <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-tab active" id="tab-6">
                                <p>Sorry no more offers available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-page__right">
                <aside class="widget widget_product widget_features">
                    <p><i class="icon-network"></i> Shipping in tri-city</p>
                    <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
                    <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
                    <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
                </aside>
                <aside class="widget widget_sell-on-site">
                    <p><i class="icon-store"></i> Sell on www.apnamal.com?<a href="<?php echo e(url('/vendor-registration')); ?>"> Register Now !</a></p>
                </aside>
                <aside class="widget widget_same-brand">
                    <h3>New Arrivals</h3>
                    <div class="widget__content">
<?php if(isset($same_new_products)): ?>
<?php $__currentLoopData = $same_new_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $same_new_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$same_new_product_main_image = DB::table('image_categories')->where('image_id', $same_new_product->products_image)->value('path');
$same_new_product_name = DB::table('products_description')->where('products_id', $same_new_product->products_id)->first();
$same_new_product_percent = (($same_new_product->products_mrp - $same_new_product->products_price)*100) /$same_new_product->products_mrp;
if(!empty($same_new_product->products_id)){
 $total_count_review = DB::table('reviews')->where('products_id',$same_new_product->products_id)->count();
 $total_review_sum = DB::table('reviews')->where('products_id',$same_new_product->products_id)->sum('reviews_rating');
}else{
    $total_count_review = '';
}
if(!empty($total_count_review)){
    $total_review = $total_review_sum/$total_count_review;
   } else {
       $total_review = '';
  }
  $round_review = round($total_review);
?>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="<?php echo e(URL::to('product-detail/'.$same_new_product->products_slug)); ?>">
                                    <img src="<?php echo e(URL::asset('/'.$same_new_product_main_image)); ?>" alt="image">
                                </a>
                                <div class="ps-product__badge"><?php echo e(isset($same_new_product_percent) ? round($same_new_product_percent) : '0'); ?>%</div>
                            </div>
                            <div class="ps-product__container">
                                <a class="ps-product__vendor" href="javascript:;">Robert's Store</a>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$same_new_product->products_slug)); ?>"><?php echo e($same_new_product_name->products_name); ?></a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars">
                                            <div class="br-widget br-readonly">
                                              <?php if($round_review == 5): ?>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="5" class="br-selected br-current"></a>
                                              <?php elseif($round_review == 4): ?>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              <?php elseif($round_review == 3): ?>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              <?php elseif($round_review == 2): ?>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              <?php elseif($round_review == 1): ?>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              <?php else: ?>
                                                <a href="javascript:;" data-rating-value="1" data-rating-text="1" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                                <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                              <?php endif; ?>
                                            </div>
                                        </div>
                                        <span><?php echo e($total_count_review); ?> review</span>
                                    </div>
                                    <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e($same_new_product->products_price); ?> <del><i class="fa fa-inr"></i><?php echo e($same_new_product->products_mrp); ?> </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$same_new_product->products_slug)); ?>"><?php echo e($same_new_product_name->products_name); ?></a>
                                    <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e($same_new_product->products_price); ?> <del><i class="fa fa-inr"></i><?php echo e($same_new_product->products_mrp); ?> </del></p>
                                </div>
                            </div>
                        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                        <!--<p class="text-right">View More Same New Releases</p>-->
                    </div>
                </aside>
            </div>
        </div>
        <div class="ps-product-list ps-clothings">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2149px;">
 <?php if(isset($related_products)): ?>
    <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $related_product_main_image = DB::table('image_categories')->where('image_id', $related_product->products_image)->value('path');
    $related_product_name = DB::table('products_description')->where('products_id', $related_product->products_id)->first();
    $related_product_percent = (($related_product->products_mrp - $related_product->products_price)*100) /$related_product->products_mrp;
    $product_inventory_in = DB::table('inventory')->where('products_id',$related_product->products_id)->where('stock_type','in')->sum('stock');
    $product_inventory_out = DB::table('inventory')->where('products_id',$related_product->products_id)->where('stock_type','out')->sum('stock');
    $product_inventory = $product_inventory_in-$product_inventory_out;
?>
                 <div class="owl-item" style="width: 214.833px;"><div class="BooksPanel ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="<?php echo e(URL::to('product-detail/'.$related_product->products_slug)); ?>" class="books-panel-item-wrap is-book-panel-trigger selected">
                                <div class="book-thumb-img-wrap has-edge">
                                    <img src="<?php echo e(URL::asset('/'.$related_product_main_image)); ?>" class="w-100 img-fluid" alt="" width="267" height="400">            
                                </div>
                            </a>
                            <div class="ps-product__badge"><?php echo e(isset($related_product_percent) ? round($related_product_percent) : '0'); ?>%</div>
                        </div>
                         
                        <div class="ps-product__container">
                            <div class="on_producta row mb-2">
                                <div class="col-12 d-flex justify-content-between">
                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="<?php echo e($related_product->products_id); ?>">Quick View</a>
                                    <?php if($product_inventory==0): ?>
                                    <strong class="text-danger"> Out of stock</strong>
                                    <?php else: ?>
                                    <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="type" value="1"/>
                                        <input type="hidden" name="products_id" value="<?php echo e(isset($related_product->products_id) ? $related_product->products_id : null); ?>">
                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$related_product->products_slug)); ?>"><?php echo e($related_product_name->products_name); ?></a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e($related_product->products_price); ?> <del><i class="fa fa-inr"></i><?php echo e($related_product->products_mrp); ?> </del></p>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$related_product->products_slug)); ?>"><?php echo e($related_product_name->products_name); ?></a>
                                <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e($related_product->products_price); ?> <del><i class="fa fa-inr"></i><?php echo e($related_product->products_mrp); ?> </del></p>
                            </div>
                        </div>
                    </div>
                </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev disabled"><i class="icon-chevron-left"></i></button>
                            <button type="button" role="presentation" class="owl-next"><i class="icon-chevron-right"></i></button>
                        </div>
                        <div class="owl-dots">
                            <button role="button" class="owl-dot active"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make("web.includes.newsletter", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/productDetail.blade.php ENDPATH**/ ?>