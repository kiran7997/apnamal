
<?php $__env->startSection('content'); ?>
<div class="ps-page--single">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(URL::to('/vendor-store/'.auth()->guard('customer')->user()->id.'/'.str_slug(auth()->guard('customer')->user()->company))); ?>">Vendor Store</a></li>
                <li>Vendor Dashboard</li>
            </ul>
        </div>
    </div>
</div>
<div class="ps-vendor-dashboard">
    <div class="container">
        <div class="ps-section__header">
            <h3>Vendor Dashboard</h3>
        </div>
        <div class="ps-section__content">
            <ul class="ps-section__links">
                <li><a href="<?php echo e(URL::to('/vendor-dashboard')); ?>">Dashboard</a></li>
                <li><a href="javascript:;">Products</a></li>
                <li class="active"><a href="<?php echo e(URL::to('/vendor-orders')); ?>">Order</a></li>
                <li><a href="javascript:;">Setting</a></li>
                <li><a href="<?php echo e(URL::to('/vendor-store/'.auth()->guard('customer')->user()->id.'/'.str_slug(auth()->guard('customer')->user()->company))); ?>">View Store</a></li>
            </ul>
            
            <div class="ps-block--vendor-dashboard">
                <div class="ps-block__header">
                    <h3>Vendor Orders</h3>
                </div>
                <div class="ps-block__content">
                    <div class="table-responsive">
                        <table class="table ps-table ps-table--vendor">
                            <thead>
                                <tr>
                                    <th>date</th>
                                    <th>Order ID</th>
                                    <th>Shipping</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($recent_orders)>0): ?>
                                <?php $__currentLoopData = $recent_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $date1 = \Carbon\Carbon::parse($recent_order->date_purchased);
                                $orders_status_history = DB::table('orders_status_history')
					->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
					->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
					->select('orders_status_description.orders_status_name', 'orders_status.orders_status_id')
					->where('orders_id',$recent_order->orders_id)
                                        ->orderby('orders_status_history.orders_status_history_id', 'DESC')->first();
                                ?>
                                <tr>
                                    <td><?php echo e($date1->isoFormat('MMM D, YYYY')); ?></td>
                                    <td><a href="javascript:;"><?php echo e($recent_order->orders_id); ?></a></td>
                                    <td><i class="fa fa-inr"></i><?php echo e($recent_order->shipping_cost); ?></td>
                                    <td><i class="fa fa-inr"></i><?php echo e($recent_order->order_price); ?></td>
                                    <td><?php echo e(isset($orders_status_history) ? $orders_status_history->orders_status_name : null); ?></td>
                                    <td><a href="javascript:;">View Detail</a></td>
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
</div>
<?php echo $__env->make('web.includes.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/vendor_orders.blade.php ENDPATH**/ ?>