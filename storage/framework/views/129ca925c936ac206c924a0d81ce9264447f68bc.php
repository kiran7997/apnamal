
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
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__header">
                <h1>Shopping Cart</h1>
            </div>
            
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                    <?php echo session('message'); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--shopping-cart">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $Subtotal = 0; $discount = 0; ?>
                            <?php if(isset($result['cart'])): ?>
                            <?php $__currentLoopData = $result['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php
                                $products_vendor = DB::table('products')->where('products_id',$row->products_id)->value('vendor');
                                $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
                                $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
                                $productDetails = DB::table('products')->where('products_id',$row->products_id)->first();
                              ?>
                            <tr>
                                <td>
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail">
                                            <a href="<?php echo e(URL::to('product-detail/'.$row->products_slug)); ?>"><img src="<?php echo e(URL::asset('/'.$row->image_path)); ?>" alt="image"></a>
                                        </div>
                                        <div class="ps-product__content"><a href="<?php echo e(URL::to('product-detail/'.$row->products_slug)); ?>"><?php echo e($row->products_name); ?></a>
                                            <p>Seller:<strong> <?php echo e($first_name); ?>  <?php echo e($last_name); ?></strong></p>
                                           <?php if($row->type == 1): ?>
                                           <?php else: ?>
                                           <p>Book Type:<strong> <?php echo e(isset($productDetails->buy_for_rent) ? $productDetails->buy_for_rent : null); ?></strong></p>
                                           <?php endif; ?>
                                            <?php if($row->type == 1): ?>
                                                <strong> Buy</strong>
                                            <?php endif; ?>
                                          <br>
                                        </div>
                                    </div> 
                                </td>
                                <td class="price"><i class="fa fa-inr"></i><?php echo e($row->price); ?></td>
                                <td>
                                    <div class="form-group--number">
                                        <button class="up incQty" data-productid="<?php echo e($row->products_id); ?>" data-productprice="<?php echo e($row->price); ?>">+</button>
                                        <button class="down decQty" data-productid="<?php echo e($row->products_id); ?>" data-productprice="<?php echo e($row->price); ?>">-</button>
                                        <input class="form-control" min="1" id="changeQty<?php echo e($row->products_id); ?>" disabled type="text" placeholder="1" value="<?php echo e($row->customers_basket_quantity); ?>">
                                    </div>
                                </td>
                                <td><i class="fa fa-inr"></i><span id="productTotal<?php echo e($row->products_id); ?>"><?php echo e($row->customers_basket_quantity*$row->price); ?></span></td>
                                <td><a href="<?php echo e(URL::to('delete-cart/'.$row->customers_basket_id)); ?>" onclick="return confirm('Are you sure?');"><i class="icon-cross"></i></a></td>
                            </tr>
                            <?php $Subtotal += $row->customers_basket_quantity*$row->price; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="ps-section__cart-actions">
                    <a class="ps-btn" href="<?php echo e(URL::to('/shop')); ?>"><i class="icon-arrow-left"></i> Back to Shop</a>
                    <a class="ps-btn ps-btn--outline" href="<?php echo e(URL::to('/viewcart')); ?>"><i class="icon-sync"></i> Update cart</a>
                </div>
            </div>
            <div class="ps-section__footer">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <?php if(Session::has('coupon_error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                                <?php echo session('coupon_error'); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if(Session::has('coupon_message')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                                <?php echo session('coupon_message'); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <figure>
                            <form action="<?php echo e(url('/apply_coupon')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <figcaption>Coupon Discount</figcaption>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Coupon Name..." name="coupon_code">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="ps-btn ps-btn--outline">Apply</button>
                                </div>
                            </form>
                        </figure>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--shopping-total">
                            <div class="ps-block__header">
                                <p>Subtotal <span class="totalprice"><i class="fa fa-inr"></i><?php echo e($Subtotal); ?></span></p>
                            </div>
                            <?php if(session('coupon')): ?>
                            <?php $session_coupon_data = session('coupon'); ?>
                            <div class="ps-block__header">
                                <span class="ps-block__shop">Coupon(s)</span>
                                <?php $__currentLoopData = $session_coupon_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session_coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($session_coupon->discount_type=='percent'){
                                    $discount += ($Subtotal*$session_coupon->amount)/100;
                                }if($session_coupon->discount_type=='fixed_cart'){
                                    $discount += $session_coupon->amount;
                                } ?>
                                <p><?php echo e($session_coupon->code); ?> <a class="text-danger" href="<?php echo e(url('/removeCoupon/'.$session_coupon->coupans_id)); ?>">Remove</a> <span class="discount_total"><i class="fa fa-minus"></i> <i class="fa fa-inr"></i><?php echo e(number_format($discount,2)); ?></span></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $Subtotal = $Subtotal-$discount; ?>
                            </div>
                            <?php endif; ?>
                            <div class="ps-block__content">
                                <h3>Total <span class="final_total"><i class="fa fa-inr"></i><?php echo e(number_format($Subtotal,2)); ?></span></h3>
                            </div>
                        </div>
                        <?php if(isset($result['cart']) && count($result['cart'])>0): ?>
                            <?php if(auth()->guard('customer')->check()): ?>
                            <a class="ps-btn ps-btn--fullwidth" href="<?php echo e(URL::to('/checkout')); ?>">Proceed to checkout</a>
                            <?php else: ?>
                            <a class="ps-btn ps-btn--fullwidth" href="<?php echo e(URL::to('/guest_checkout')); ?>">Proceed to checkout</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make("web.includes.newsletter", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
 function rentsecurity(id)
   {
    //alert(id);
     // var id = selectObject.value;
      var product_id = $(this).attr('data-productid');
      var rentprice = $(this).attr('data-rentprice');
        
        $.ajax({
           url: "/rent-price",
           type: "get",
           data: { id : id,product_id:product_id,rentprice:rentprice },
           success: function(data){
               alert(data);
               //$("#zone").html('');
              // $("#zone").append(data);
           }
       });
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/cart.blade.php ENDPATH**/ ?>