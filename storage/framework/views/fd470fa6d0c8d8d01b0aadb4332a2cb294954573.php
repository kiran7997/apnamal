
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
                <li class="active"><a href="<?php echo e(URL::to('/vendor-dashboard')); ?>">Dashboard</a></li>
                <li><a target="_blank" href="<?php echo e(url('admin/login')); ?>">Products</a></li>
                <li><a href="<?php echo e(URL::to('/vendor-orders')); ?>">Order</a></li>
                <li><a href="javascript:;">Setting</a></li>
                <li><a href="<?php echo e(URL::to('/vendor-store/'.auth()->guard('customer')->user()->id.'/'.str_slug(auth()->guard('customer')->user()->company))); ?>">View Store</a></li>
            </ul>
            <section class="ps-section--account">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ps-section__right">
                        <?php if(Session::has('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                                <?php echo session('error'); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
                                <?php echo session('success'); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form class="ps-form--account-setting" action="<?php echo e(URL::to('/updateMyProfile')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="ps-form__header">
                                <h3> User Information</h3>
                            </div>
                            <div class="ps-form__content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" name="customers_firstname" value="<?php echo e(auth()->guard('customer')->user()->first_name); ?>" placeholder="Please enter first name...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="customers_lastname" value="<?php echo e(auth()->guard('customer')->user()->last_name); ?>" placeholder="Please enter last name...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" type="text" name="customers_telephone" value="<?php echo e(auth()->guard('customer')->user()->phone); ?>" placeholder="Please enter phone number...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="customers_email_address" value="<?php echo e(auth()->guard('customer')->user()->email); ?>" placeholder="Please enter your email...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Birthday</label>
                                            <input class="form-control" name="customers_dob" type="date" value="<?php echo e(auth()->guard('customer')->user()->dob); ?>" placeholder="Please enter your birthday...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="1" <?php if(auth()->guard('customer')->user()->gender==1){echo 'selected';} ?>>Male</option>
                                                <option value="0" <?php if(auth()->guard('customer')->user()->gender==0){echo 'selected';} ?>>Female</option>
                                                <option value="2" <?php if(auth()->guard('customer')->user()->gender==2){echo 'selected';} ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Profile Pic</label>
                                            <input class="form-control" name="picture" type="file">
                                            <?php if(!empty(auth()->guard('customer')->user()->avatar)): ?>
                                            <img src="<?php echo e(URL::asset('/'.auth()->guard('customer')->user()->avatar)); ?>" alt="avatar">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" name="password" type="password" placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input class="form-control" name="re_password" type="password" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Facebook Link</label>
                                            <input class="form-control" required name="facebook_link" type="text" value="<?php echo e(auth()->guard('customer')->user()->facebook_link); ?>" placeholder="Facebook">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Twitter Link</label>
                                            <input class="form-control" required name="twitter_link" type="text" value="<?php echo e(auth()->guard('customer')->user()->twitter_link); ?>" placeholder="Twitter">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Linkedin Link</label>
                                            <input class="form-control" required name="linkdein_link" type="text" value="<?php echo e(auth()->guard('customer')->user()->linkdein_link); ?>" placeholder="Linkedin">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Rss Link</label>
                                            <input class="form-control" required name="rss_link" type="text" value="<?php echo e(auth()->guard('customer')->user()->rss_link); ?>" placeholder="Rss">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" required name="company" type="text" value="<?php echo e(auth()->guard('customer')->user()->company); ?>" placeholder="Please enter your company name...">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Company Details</label>
                                            <textarea class="form-control" required name="company_description" rows="7" placeholder="Please enter your company details..."><?php echo e(auth()->guard('customer')->user()->company_description); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group submit">
                                <button class="ps-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
            <div class="ps-block--vendor-dashboard">
                <div class="ps-block__header">
                    <h3>Sale Report</h3>
                </div>
                <div class="ps-block__content">
                    <form class="ps-form--vendor-datetimepicker" action="<?php echo e(url('vendor-dashboard')); ?>" method="Post"> 
                        <div class="row">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="time-from">From</span></div>
                                    <input class="form-control" type="date" required name="from" value="<?php echo e($from); ?>" aria-label="Username" aria-describedby="time-from">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 "> 
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="time-form">To</span></div>
                                    <input class="form-control" type="date" required name="to" value="<?php echo e($to); ?>" aria-label="Username" aria-describedby="time-to">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                                <button class="ps-btn" type="submit"><i class="icon-sync2"></i> Update</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table ps-table ps-table--vendor">
                            <thead>
                                <tr>
                                    <th>date</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Sold</th>
                                    <th>Commission</th>
                                    <th>Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php $productsale = 0; $productcomission = 0; ?>
                                <?php if(count($products)>0): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $date = \Carbon\Carbon::parse($product->date_purchased); ?>
                                <tr>
                                    <td><?php echo e($date->isoFormat('MMM D, YYYY')); ?></td>
                                    <td><a href="<?php echo e(URL::asset('product-detail/'.$product->products_slug)); ?>"><?php echo e($product->products_name); ?></a></td>
                                    <td><i class="fa fa-inr"></i><?php echo e($product->products_price); ?></td>
                                    <td><?php echo e($product->products_quantity); ?></td>
                                    <td><i class="fa fa-inr"></i><?php echo e($product->final_price); ?></td>
                                    <td>0%</td>
                                </tr>
                                <?php $productsale += $product->products_quantity; $productcomission += $product->final_price; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong><?php echo e($productsale); ?> Sale</strong></td>
                                    <td colspan="2"><strong><i class="fa fa-inr"></i><?php echo e($productcomission); ?></strong></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="ps-block--vendor-dashboard">
                <div class="ps-block__header">
                    <h3>Recent Orders</h3>
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
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/vendor_dashboard.blade.php ENDPATH**/ ?>