<div class="ps-shopping-product">
    <div class="row">
        <?php if(count($products)): ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newest_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $newest_product_main_image = DB::table('image_categories')->where('image_id', $newest_product->products_image)->value('path');
        $newest_product_name = DB::table('products_description')->where('products_id', $newest_product->products_id)->value('products_name');
        $product_inventory_in = DB::table('inventory')->where('products_id', $newest_product->products_id)->where('stock_type', 'in')->sum('stock');
        $product_inventory_out = DB::table('inventory')->where('products_id', $newest_product->products_id)->where('stock_type', 'out')->sum('stock');
        $product_inventory = $product_inventory_in - $product_inventory_out;
        $newest_product_percent = (($newest_product->products_mrp - $newest_product->products_price) * 100) / $newest_product->products_mrp;
        ?>
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6  col-6 ">
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
                    <div class="ps-product__content">
                        <div class="on_producta row mb-2">
                            <div class="col-12">
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
                        <a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>"><?php echo e(isset($newest_product_name) ? $newest_product_name : null); ?></a>
                        <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_price) ? $newest_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_mrp) ? $newest_product->products_mrp : null); ?> </del></p>
                    </div>
                    <div class="ps-product__content hover">
                        <div class="on_producta row mb-2">
                            <div class="col-12">
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
                        <a class="ps-product__title" href="<?php echo e(URL::to('product-detail/'.$newest_product->products_slug)); ?>"><?php echo e(isset($newest_product_name) ? $newest_product_name : null); ?></a>
                        <p class="ps-product__price sale"><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_price) ? $newest_product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($newest_product->products_mrp) ? $newest_product->products_mrp : null); ?> </del></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/filterVendorProducts.blade.php ENDPATH**/ ?>