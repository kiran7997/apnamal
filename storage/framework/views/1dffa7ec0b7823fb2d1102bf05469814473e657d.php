<div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><a href="javascript:;" class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></a>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                <div class="ps-product__header">
                    <div class="ps-product__thumbnail text-center" data-vertical="false">
                        <div class="ps-product__images" data-arrow="true">
                            <div class="item">
                                <img class="img-fluid w-50" id="product_image_modal" src="img/products/detail/fullwidth/1.png" alt="" ></div>
<!--                            <div class="item"><img src="img/products/detail/fullwidth/22.png" alt=""></div>
                            <div class="item"><img src="img/products/detail/fullwidth/33.png" alt=""></div>-->
                        </div>
                    </div>
                   
                    <div class="ps-product__info">
                        <h1 id="products_name_modal"></h1>
                        
                        <div class="ps-product__meta">
                            <p>Author: <a href="javascript:;" id="author_name">Sony</a></p>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select>
                                <span id="count_review_modal">1</span><span>review</span>
                            </div>
                        </div>
                        
                        <h4 class="ps-product__price"><i class="fa fa-inr"></i><span id="products_price_modal">36.78 – ?56.99</span></h4>
                        <div class="ps-product__desc">
                            <strong>Seller :</strong> <span id="vendor_name_modal"></span>
                        <!-- <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>-->
                            <span id="products_specification_modal">
<!--                                <ul class="ps-list--dot">
                                    <li> Unrestrained and portable active stereo speaker</li>
                                    <li> Free from the confines of wires and chords</li>
                                    <li> 20 hours of portable capabilities</li>
                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                    <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                </ul>-->
                            </span>
                        </div>
                        <div class="ps-product__shopping">
                            
                            <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="type" value="1"/>
                                <input type="hidden" name="products_id" class="product_id_cart_modal" value="">
                                <button class="ps-btn ps-btn--black">Add to cart</button>
                            </form>
                            
                            <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="type" value="2"/>
                                <input type="hidden" name="products_id" id="product_id_cart_modal_rent" value="">
                            </form>
                            
                            <div class="ps-product__actions">
                                <form action="<?php echo e(url('/likeMyProduct')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="products_id" class="product_id_cart_modal" value="">
                                    <button class="btn btn-link" type="submit">
                                        <i class="icon-heart"></i>
                                    </button>
                                </form>
                                <!--<a href="javascript:;"><i class="icon-chart-bars"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/includes/modals.blade.php ENDPATH**/ ?>