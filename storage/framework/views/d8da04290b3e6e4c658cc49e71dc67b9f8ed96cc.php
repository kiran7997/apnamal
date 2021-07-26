<div class="ps-panel__content">
    <?php if(count($products)>0): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $product_main_image = DB::table('image_categories')->where('image_id', $product->products_image)->value('path');
    $product_images_ids = DB::table('products_images')->where('products_id', $product->products_id)->pluck('image')->toArray();
    $product_images = DB::table('image_categories')->whereIn('image_id', $product_images_ids)->where('image_type', 'ACTUAL')->pluck('path')->toArray();
    $product_name = DB::table('products_description')->where('products_id', $product->products_id)->first();
    $product_inventory_in = DB::table('inventory')->where('products_id', $product->products_id)->where('stock_type', 'in')->sum('stock');
    $product_inventory_out = DB::table('inventory')->where('products_id', $product->products_id)->where('stock_type', 'out')->sum('stock');
    $product_inventory = $product_inventory_in - $product_inventory_out;
    $product_percent = (($product->products_mrp - $product->products_price) * 100) / $product->products_mrp;
    if (!empty($product->products_id)) {
        $total_count_review = DB::table('reviews')->where('products_id', $product->products_id)->count();
        $total_review_sum = DB::table('reviews')->where('products_id', $product->products_id)->sum('reviews_rating');
    } else {
        $total_count_review = '';
    }
    if (!empty($total_count_review)) {
        $total_review = $total_review_sum / $total_count_review;
    } else {
        $total_review = '';
    }
    $round_review = round($total_review);
    ?>
    <div class="ps-product--search-result">
        <div class="ps-product__thumbnail"><a href="<?php echo e(URL::asset('product-detail/'.$product->products_slug)); ?>"><img src="<?php echo e(URL::asset('/'.$product_main_image)); ?>" alt="image"></a></div>
        <div class="ps-product__content"><a class="ps-product__title" href="<?php echo e(URL::asset('product-detail/'.$product->products_slug)); ?>"><?php echo $product_name->products_name; ?></a>
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
            <p class="ps-product__price"><i class="fa fa-inr"></i><?php echo e(isset($product->products_price) ? $product->products_price : null); ?> <del><i class="fa fa-inr"></i><?php echo e(isset($product->products_mrp) ? $product->products_mrp : null); ?> </del></p>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php if(count($products)>0): ?>
<div class="ps-panel__footer text-center"><a href="<?php echo e(URL::to('/shop')); ?>">See all results</a></div>
<?php endif; ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/search_results.blade.php ENDPATH**/ ?>