
<?php $__env->startSection('content'); ?>
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(URL::to('/shop')); ?>">Shop</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </div>
    <div class="ps-section--shopping ps-whishlist">
        <div class="container">
            <div class="ps-section__header">
                <h1>Wishlist</h1>
            </div>
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--whishlist">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product name</th>
                                <th>Unit Price</th>
                                <th>Stock Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result['products']['product_data'])): ?>
                            <?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="<?php echo e(URL::to('/UnlikeMyProduct/'.$wishlist->products_id)); ?>"><i class="icon-cross"></i></a></td>
                                <td>
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail">
                                            <a href="<?php echo e(URL::to('/product-detail/'.$wishlist->products_slug)); ?>">
                                                <img src="<?php echo e(URL::asset('/'.$wishlist->image_path)); ?>" alt="image">
                                                </a>
                                                </div>
                                        <div class="ps-product__content">
                                            <a href="<?php echo e(URL::to('/product-detail/'.$wishlist->products_slug)); ?>"><?php echo e($wishlist->products_name); ?></a>
                                            </div>
                                    </div>
                                </td>
                                <td class="price"><i class="fa fa-inr"></i><?php echo e($wishlist->products_price); ?></td>
                                <td><?php if($wishlist->defaultStock>0): ?> <span class="ps-tag ps-tag--in-stock">In-stock</span> <?php else: ?> <span class="ps-tag ps-tag--out-stock">Out-stock</span> <?php endif; ?></td>
                                <td>
                                    <?php if($wishlist->defaultStock==0): ?>
                                        <button class="ps-btn" type="button">Out of Stock</button>
                                    <?php else: ?>
                                        <form action="<?php echo e(url('/addToCart')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="type" value="1"/>
                                            <input type="hidden" name="products_id" value="<?php echo e(isset($wishlist->products_id) ? $wishlist->products_id : null); ?>">
                                            <button class="ps-btn" type="submit">Add to cart</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/wishlist.blade.php ENDPATH**/ ?>