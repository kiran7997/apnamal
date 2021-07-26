<?php
$dataa = array();
$resultt['cart'] = App\Models\Web\Cart::myCart1($dataa);
?>
<?php if(isset($resultt['cart'])): ?>
<a class="header__extra" href="<?php echo e(URL::to('/viewcart')); ?>"><i class="icon-bag2"></i><span><i><?php echo e(count($resultt['cart'])); ?></i></span></a>
<?php else: ?>
<a class="header__extra" href="<?php echo e(URL::to('/viewcart')); ?>"><i class="icon-bag2"></i><span><i>0</i></span></a>
<?php endif; ?>
<div class="ps-cart__content">
    <div class="ps-cart__items">
        <?php $Subtotall = 0; ?>
        <?php if(isset($resultt['cart'])): ?>
        <?php $__currentLoopData = $resultt['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php
            $products_vendor = DB::table('products')->where('products_id',$roww->products_id)->value('vendor');
            $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
            $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
           ?>
        <div class="ps-product--cart-mobile">
            <div class="ps-product__thumbnail"><a href="<?php echo e(URL::to('product-detail/'.$roww->products_slug)); ?>"><img src="<?php echo e(URL::asset('/'.$roww->image_path)); ?>" alt="image"></a></div>
            <div class="ps-product__content">
                <a class="ps-product__remove" href="<?php echo e(URL::to('delete-cart/'.$roww->customers_basket_id)); ?>" onclick="return confirm('Are you sure?');"><i class="icon-cross"></i></a>
                <a href="<?php echo e(URL::to('product-detail/'.$roww->products_slug)); ?>"><?php echo e($roww->products_name); ?></a>
                <p>Seller:<strong> <?php echo e($first_name); ?>  <?php echo e($last_name); ?></strong></p><small><?php echo e($roww->customers_basket_quantity); ?> x <i class="fa fa-inr"></i><?php echo e($roww->price); ?></small>
            </div>
        </div>
        <?php $Subtotall += $roww->customers_basket_quantity * $roww->price; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div class="ps-cart__footer">
        <h3>Sub Total:<strong><i class="fa fa-inr"></i><?php echo e($Subtotall); ?></strong></h3>
        <figure>
            <a class="ps-btn" href="<?php echo e(URL::to('/viewcart')); ?>">View Cart</a>
            <?php if(isset($resultt['cart']) && count($resultt['cart'])>0): ?>
            <a class="ps-btn" href="<?php echo e(URL::to('/checkout')); ?>">Checkout</a>
            <?php endif; ?>
        </figure>
    </div>
</div><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/includes/appendCart.blade.php ENDPATH**/ ?>