<?php $__env->startSection('content'); ?>
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(URL::to('/profile')); ?>">Account</a></li>
                <li>Invoice Detail</li>
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php echo $__env->make('web.includes.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-8">
                    <div class="ps-section__right">
                        <div class="ps-section--account-setting">
                            <div class="ps-section__header">
                                <h3>Invoice #<?php echo e(isset($result['orders'][0]->orders_id) ? $result['orders'][0]->orders_id : '-'); ?> - <strong><?php echo e(isset($result['orders'][0]->orders_status) ? $result['orders'][0]->orders_status : '-'); ?></strong></h3>
                            </div>
                            <div class="ps-section__content">
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Billing Address</figcaption>
                                            <div class="ps-block__content"><strong><?php echo e(isset($result['orders'][0]->billing_name) ? $result['orders'][0]->billing_name : '-'); ?></strong>
                                                <p>Address: <?php echo e(isset($result['orders'][0]->billing_street_address) ? $result['orders'][0]->billing_street_address : '-'); ?>, <?php echo e(isset($result['orders'][0]->billing_city) ? $result['orders'][0]->billing_city : '-'); ?>, <?php echo e(isset($result['orders'][0]->billing_state) ? $result['orders'][0]->billing_state : '-'); ?>, <?php echo e(isset($result['orders'][0]->billing_country) ? $result['orders'][0]->billing_country : '-'); ?></p>
                                                <p>Phone: <?php echo e(isset($result['orders'][0]->billing_phone) ? $result['orders'][0]->billing_phone : '-'); ?></p>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Shipping Address</figcaption>
                                            <div class="ps-block__content"><strong><?php echo e(isset($result['orders'][0]->delivery_name) ? $result['orders'][0]->delivery_name : '-'); ?></strong>
                                                <p>Address: <?php echo e(isset($result['orders'][0]->delivery_street_address) ? $result['orders'][0]->delivery_street_address : '-'); ?>, <?php echo e(isset($result['orders'][0]->delivery_city) ? $result['orders'][0]->delivery_city : '-'); ?>, <?php echo e(isset($result['orders'][0]->delivery_state) ? $result['orders'][0]->delivery_state : '-'); ?>, <?php echo e(isset($result['orders'][0]->delivery_country) ? $result['orders'][0]->delivery_country : '-'); ?></p>
                                                <p>Phone: <?php echo e(isset($result['orders'][0]->delivery_phone) ? $result['orders'][0]->delivery_phone : '-'); ?></p>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Shipping Fee</figcaption>
                                            <div class="ps-block__content">
                                                <p><i class="fa fa-inr"></i><?php echo e(isset($result['orders'][0]->shipping_cost) ? $result['orders'][0]->shipping_cost : '-'); ?></p>
                                            </div>
                                            <figcaption>Tax</figcaption>
                                            <div class="ps-block__content">
                                                <p><i class="fa fa-inr"></i><?php echo e(isset($result['orders'][0]->total_tax) ? $result['orders'][0]->total_tax : '-'); ?></p>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <figure class="ps-block--invoice">
                                            <figcaption>Discount</figcaption>
                                            <div class="ps-block__content">
                                                <p><i class="fa fa-inr"></i><?php echo e(isset($result['orders'][0]->coupon_amount) ? number_format($result['orders'][0]->coupon_amount,2) : '-'); ?></p>
                                            </div>
                                            <figcaption>Payment Method</figcaption>
                                            <div class="ps-block__content">
                                                <p><?php echo e(isset($result['orders'][0]->payment_method) ? $result['orders'][0]->payment_method : '-'); ?></p>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table ps-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                                <th>Return</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($result['orders'][0]->products)>0): ?>
                                            <?php $__currentLoopData = $result['orders'][0]->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $order_product = DB::table('products')->where('products_id',$row->products_id)->first();
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail">
                                                            <a href="<?php echo e(URL::to('product-detail/'.$order_product->products_slug)); ?>">
                                                                <img src="<?php echo e(URL::to('/'.$row->image)); ?>" alt="image">
                                                            </a>
                                                        </div>
                                                        <div class="ps-product__content">
                                                            <a href="<?php echo e(URL::to('product-detail/'.$order_product->products_slug)); ?>"><?php echo e(isset($row->products_name) ? $row->products_name : null); ?></a>
                                                            <p>Sold By:<strong> YOUNG SHOP</strong></p>
                                                            <?php if($row->type == 1): ?>
                                                              <p><strong> Buy</strong></p>
                                                             <?php else: ?>
                                                              <p><strong> On Rent</strong></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span><i class="fa fa-inr"></i><?php echo e(isset($row->products_price) ? $row->products_price : '0.00'); ?></span></td>
                                                <td class="text-center"><?php echo e(isset($row->products_quantity) ? $row->products_quantity : '1'); ?></td>
                                                <td><span><i class="fa fa-inr"></i><?php echo e(isset($row->final_price) ? $row->final_price : '0.00'); ?></span></td>
                                                <td>
                                                    <?php
                                                        $returned = \App\Models\Web\OrderReturns::query()->where('order_product_id','=', $row->orders_products_id)->first();
                                                    ?>
                                                    <!--<a href="<?php echo e(URL::to('return-order/'.$row->orders_id)); ?>" data-toggle="tooltip" title="Return This Item"><i class="fa fa-undo" style="font-size:32px;color:red"></i></a>-->
                                                    <?php if(empty($returned)): ?>
                                                        <?php if($result['orders'][0]->orders_status_id != 2): ?>
                                                            <?php if($row->products_quantity ==0): ?>
                                                                <i style="color: red;">Cancelled</i>
                                                            <?php else: ?>
                                                                
                                                            <button type="button" data-toggle="tooltip" title="Cancel This Item" data-value="<?php echo e($row->products_id); ?>"
                                                                class="btn btn-label-danger btn-lg btn-upper cancelBtn" data-toggle="modal"
                                                                data-id = <?php echo $row->orders_id; ?>><i class="fa fa-times" style="font-size:32px;color:red"></i>
                                                            </button>
                                                            <?php endif; ?>    
                                                        <?php else: ?>
                                                        <?php if($row->products_quantity >0): ?>
                                                        
                                                            <button type="button" data-toggle="tooltip" title="Return This Item" data-value="<?php echo e($row->products_id); ?>"
                                                                class="btn btn-label-primary btn-lg btn-upper openBtn" data-toggle="modal"
                                                                data-id = <?php echo $row->orders_id; ?>><i class="fa fa-undo" style="font-size:32px;color:red"></i>
                                                            </button>
                                                        <?php else: ?>
                                                            <i style="color: red;"><b>Cancelled</b></i>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if($returned->status == 1): ?>
                                                            <i style="color: red;"><b>Raised return</b></i>
                                                        <?php elseif($returned->status == 2): ?>
                                                            <i style="color: red;"><b>Return declined</b></i>
                                                        <?php else: ?>
                                                            <i style="color: green;"><b>Returned</b></i>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="ps-section__footer"><a class="ps-btn ps-btn--sm" href="<?php echo e(URL::to('/orders')); ?>">Back to invoices</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--begin::Modal-->
<div class="modal fade" id="kt_modal_4_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<!--end::Modal-->
        
    </section>
    <script >
        $(document).ready(function () {
            
            
        $('.cancelBtn').on('click', function () {
            var order_id = $(this).data('id');
            var pruduct_id = $(this).data('value');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                    type: 'GET',
                    url: '/cancel-item/' + order_id+'/'+pruduct_id,
                    dataType: 'HTML',
    
                    success: function (data) {
                        console.log(data);
                        $(this).attr('value','Cancelled');
                    },
                }).then(data => {
                    window.location.reload();
                    console.log(data);
                })
                .catch(error => {
                    var xhr = $.ajax();
                    console.log(xhr);
                    console.log(error);
                })
    
        });
            
            
            
        $('.openBtn').on('click', function () {
            var order_id = $(this).data('id');
            var pruduct_id = $(this).data('value');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                    type: 'GET',
                    url: '/request-return/' + order_id+'/'+pruduct_id,
                    dataType: 'HTML',
    
                    success: function (data) {
    
                    },
                }).then(data => {
                    $('.modal-content').html(data);
                    $('#kt_modal_4_2').modal("show");
                })
                .catch(error => {
                    var xhr = $.ajax();
                    console.log(xhr);
                    console.log(error);
                })
    
        });
    });
    </script>
    
    <?php echo $__env->make('web.includes.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/view-order.blade.php ENDPATH**/ ?>