<div class="ps-shopping-product">
    <div class="row" id="here_i_am">
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
        ?>
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6  col-6 ">
            <div class="BooksPanel ps-product">
                <div class="ps-product__thumbnail">
                    <a href="<?php echo e(URL::asset('product-detail/'.$product->products_slug)); ?>" class="books-panel-item-wrap is-book-panel-trigger selected">
                        <div class="book-thumb-img-wrap has-edge">
                            <img src="<?php echo e(URL::asset('/'.$product_main_image)); ?>" class="w-100 img-fluid" alt="image" width="267" height="400">            
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
        
        
        <?php else: ?>
        <h1> Sorry, We couldn't find any matches for "<?php echo e($search); ?>".</h1>
        <br>
        <div class="ps-panel__footer text-center">
			<a href="<?php echo e(URL::to('/shop')); ?>">See all results</a>
		</div>
        
        <?php endif; ?>
    </div>
</div>
<script>
$('#product-quickview').on('shown.bs.modal', function(e) {
    $('.ps-product--quickview .ps-product__images').slick('setPosition');
});
$('.product-quickview').on('click', function (e) {
    var id = $(this).attr('data-productid');
    $.ajax({
        url: "/get-product-details-modal",
        type: "get",
        data: { id : id },
        success: function(data){
            $("#product_image_modal").attr('src',data.image);
            $("#products_name_modal").html('');
            $("#products_name_modal").text(data.products_name);
            $("#author_name").html('');
            $("#author_name").text(data.author_name);
            $("#products_specification_modal").html('');
            $("#products_specification_modal").html(data.specification).text();
            $("#products_price_modal").html('');
            $("#products_price_modal").text(data.products_price);
            $(".product_id_cart_modal").val('');
            $(".product_id_cart_modal").val(data.product_id);
            $("#product_id_cart_modal_rent").val('');
            $("#product_id_cart_modal_rent").val(data.product_id);
            $("#vendor_name_modal").html('');
            $("#vendor_name_modal").text(data.vendor_name);
            $("#count_review_modal").html('');
            $("#count_review_modal").text(data.count_review);
            //$("#product_id_buy_modal").attr('data-productid','');
            //$("#product_id_buy_modal").attr('data-productid',data.product_id);
        }
    });
});
</script><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/filterproducts.blade.php ENDPATH**/ ?>