
<?php $__env->startSection('content'); ?>
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(URL::to('/shop')); ?>">Shop</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <div class="ps-checkout ps-section--shopping">
        <div class="container">
            <div class="ps-section__header">
                <h1>Checkout</h1>
            </div>
            <div class="ps-section__content">
                <form class="ps-form--checkout" action="<?php echo e(URL::to('/place_order')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                            <div class="ps-form__billing-info">
                                <h3 class="ps-form__heading">Billing Details</h3>
                                <div class="form-group">
                                    <label>First Name<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="firstname" value="<?php echo e(isset($default_address->billing_name) ? $default_address->billing_name : null); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Last Name<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="lastname" value="<?php echo e(isset($default_address->billing_name) ? $default_address->billing_name : null); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Company Name<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="company" value="<?php echo e(isset($default_address->billing_company) ? $default_address->billing_company : null); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Email Address<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="email" name="email" value="<?php echo e(isset($default_address->email) ? $default_address->email : null); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Country<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <select id="country" name="countries_id" class="form-control" required>
                                            <?php if(count($result['countries'])>0): ?>
                                            <?php $__currentLoopData = $result['countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->countries_id); ?>"><?php echo e($country->countries_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>State<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <select id="zone" name="zone_id" class="form-control" required>
                                            <option value="">Select State</option>
                                            <?php if(count($result['zones'])>0): ?>
                                                <?php $__currentLoopData = $result['zones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($zone->zone_id); ?>"><?php echo e($zone->zone_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>City<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="city" value="<?php echo e(isset($default_address->billing_city) ? $default_address->billing_city : null); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Postcode<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control place_order_chk_pincode" minlength="6" maxlength="6" type="text" id="postcode" name="postcode" value="<?php echo e(isset($default_address->billing_postcode) ? $default_address->billing_postcode : null); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="phone" value="<?php echo e(isset($default_address->billing_phone) ? $default_address->billing_phone : null); ?>" required>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Address<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        <textarea class="form-control" rows="4" name="address" required><?php echo e(isset($default_address->billing_street_address) ? $default_address->billing_street_address : null); ?></textarea>
                                    </div>
                                </div> 
                                <?php if(empty(session('customers_id'))): ?>
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" name="create_account" id="create-account">
                                        <label for="create-account">Create an account?</label>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control place_order_chk_pincode" type="checkbox" name="ship_to_different" id="cb01">
                                        <label for="cb01">Ship to a different address?</label>
                                    </div>
                                </div>
                                
                                <div id="different_shipping_address" class="d-none">
                                    <h3 class="ps-form__heading">Shipping Details</h3>
                                    <div class="form-group">
                                        <label>Company Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="shipping_company" value="<?php echo e(isset($default_address->delivery_company) ? $default_address->delivery_company : null); ?>" id="shipping_company" disabled required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Country<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <select id="shipping_country" name="shipping_countries_id" class="form-control" disabled required>
                                                <?php if(count($result['countries'])>0): ?>
                                                <?php $__currentLoopData = $result['countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->countries_id); ?>"><?php echo e($country->countries_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>State<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <select id="shipping_zone" name="shipping_zone_id" class="form-control" disabled required>
                                                <option value="">Select State</option>
                                                <?php if(count($result['zones'])>0): ?>
                                                <?php $__currentLoopData = $result['zones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($zone->zone_id); ?>" <?php if(isset($default_address->delivery_state) && $default_address->delivery_state==$zone->zone_name){echo 'selected';} ?>><?php echo e($zone->zone_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>City<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="shipping_city" value="<?php echo e(isset($default_address->delivery_city) ? $default_address->delivery_city : null); ?>" disabled id="shipping_city" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Postcode<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control place_order_chk_pincode" type="text" id="shipping_postcode" minlength="6" maxlength="6" name="shipping_postcode" value="<?php echo e(isset($default_address->delivery_postcode) ? $default_address->delivery_postcode : null); ?>" disabled id="shipping_postcode" required>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label>Phone<sup>*</sup> 
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="shipping_phone" value="<?php echo e(isset($default_address->delivery_phone) ? $default_address->delivery_phone : null); ?>" disabled id="shipping_phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <textarea class="form-control" rows="4" name="shipping_address" disabled id="shipping_address" required><?php echo e(isset($default_address->delivery_street_address) ? $default_address->delivery_street_address : null); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-40"> Addition information</h3>
                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <div class="form-group__content">
                                        <textarea class="form-control" rows="7" name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <h3 class="mt-40"> Payment Method</h3>
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" name="payment_method" id="cb02" value="cash_on_delivery" checked required>
                                        <label for="cb02">Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                            <div class="ps-form__total">
                                <h3 class="ps-form__heading">Your Order</h3>
                                <div class="content">
                                    <div class="ps-block--checkout-total">
                                        <div class="ps-block__header">
                                            <p>Product</p>
                                            <p>Total</p>
                                        </div>
                                        <div class="ps-block__content">
                                            <table class="table ps-block__products">
                                                <tbody>
                                                    <?php
                                                    $Subtotal = 0;
                                                    $shipping_rate = 0;
                                                    $discount = 0;
                                                    if(isset($result['shipping_methods'][0]['services'][0]['rate'])){
                                                        $shipping_rate = $result['shipping_methods'][0]['services'][0]['rate']; ?>
                                                    <input type="hidden" value="<?php echo e($shipping_rate); ?>" id="shipping">
                                                    <?php }else{
                                                        $shipping_rate = 0; ?>
                                                    <input type="hidden" value="<?php echo e($shipping_rate); ?>" id="shipping">
                                                    <?php }
                                                    ?>
                                                    <?php if(isset($result['cart'])): ?>
                                                    <?php $__currentLoopData = $result['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $products_vendor = DB::table('products')->where('products_id',$row->products_id)->value('vendor');
                                                        $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
                                                        $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
                                                       ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo e(URL::to('/product-detail/'.$row->products_slug)); ?>"><?php echo e($row->products_name); ?> * <b><?php echo e($row->customers_basket_quantity); ?></b></a>
                                                            <p>Seller:<strong> <?php echo e($first_name); ?>  <?php echo e($last_name); ?></strong></p>
                                                            <?php if($row->type == 1): ?>
                                                                <p><strong>Buy</strong></p>
                                                            <?php else: ?>
                                                                <p><strong>On Rent</strong></p>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><i class="fa fa-inr"></i><?php echo e($row->customers_basket_quantity*$row->price); ?></td>
                                                    </tr>
                                                    <?php $Subtotal += $row->customers_basket_quantity*$row->price; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                            <input type="hidden" value="<?php echo e($Subtotal); ?>" id="Subtotal">
                                            <h4 class="ps-block__title">Subtotal <span><i class="fa fa-inr"></i><?php echo e(number_format($Subtotal,2)); ?></span></h4>
                                            <div class="ps-block__shippings">
                                                <figure>
                                                    <p>Tax(<span id="tax_percent">0</span>%) <i class="fa fa-inr"></i><span id="tax_rate">0</span></p>
                                                    <p>Shipping <i class="fa fa-inr"></i><span><?php echo e($shipping_rate); ?></span></p>
<!--                                                    <h4>YOUNG SHOP Shipping</h4>
                                                    <p>Free shipping</p>
                                                    <a href="#"> MVMTH Classical Leather Watch In Black ×1</a>-->
                                                </figure>
<!--                                                <?php if(isset($result['cart'])): ?>
                                                <?php $__currentLoopData = $result['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <figure>
                                                    <h4>ROBERT’S STORE Shipping</h4>
                                                    <a href="<?php echo e(URL::to('/product-detail/'.$row->products_slug)); ?>"><?php echo e($row->products_name); ?> * <b><?php echo e($row->customers_basket_quantity); ?></b></a>
                                                    <p>Free shipping</p>
                                                </figure>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>-->
                                            </div>
                                            <?php if(isset($result['coupon'])): ?>
                                            <h4 class="ps-block__title">Coupons</h4>
                                            <div class="ps-block__shippings">
                                                <?php $__currentLoopData = $result['coupon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session_coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($session_coupon->discount_type=='percent'){
                                                    $discount += ($Subtotal*$session_coupon->amount)/100;
                                                }if($session_coupon->discount_type=='fixed_cart'){
                                                    $discount += $session_coupon->amount;
                                                } ?>
                                                <figure>
                                                    <p><?php echo e($session_coupon->code); ?> <i class="fa fa-inr"></i><span><?php echo e(number_format($discount,2)); ?></span></p>
                                                </figure>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php $Subtotal = $Subtotal-$discount; ?>
                                            </div>
                                            <?php endif; ?>
                                            <h3>Total <i class="fa fa-inr"></i><span id="final_total"><?php echo e(number_format($Subtotal+$shipping_rate,2)); ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="alert alert-success alert-dismissible d-none" id="place_order_success" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                                            Delivery available at this location.
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>-->
                                    </div>
                                    <div class="alert alert-danger alert-dismissible d-none" id="place_order_error" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                                        <span id="failedmsg"> Please enter your pincode.</span>
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>-->
                                    </div>
                                    <button type="button" id="place_order_chk_pincode" class="ps-btn ps-btn--fullwidth place_order_chk_pincode <?php if($submitBlocked==1){echo 'd-none';} ?>">Click here to Check Delivery at your Pincode</button>
                                    <button type="submit" id="place_order_at_pincode" class="ps-btn ps-btn--fullwidth <?php if($submitBlocked==0){echo 'd-none';} ?>">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/checkout.blade.php ENDPATH**/ ?>