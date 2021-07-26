
<?php $__env->startSection('content'); ?>
<main class="ps-page--my-account">
    
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                    <li><a href="<?php echo e(URL::to('/profile')); ?>">Account</a></li>
                    <li>Invoices</li>
                </ul>
            </div>
        </div>
    
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    <?php echo $__env->make('web.includes.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Orders</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table ps-table--invoices">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <!--<th>Title</th>-->
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(count($result['orders'])>0): ?>
                                                <?php $i=count($result['orders']); ?>
                                                    <?php $__currentLoopData = $result['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($i); ?></td>
                                                        <!--<td>Marshall Kilburn Portable Wireless Speaker</td>-->
                                                        <td><?php echo e($row->date_purchased); ?></td>
                                                        <td><i class="fa fa-inr"></i><?php echo e($row->order_price); ?></td>
                                                        <td>
                                                            <?php if($row->orders_status=="Completed"): ?>
                                                            <span class="btn btn-outline-success">
                                                            <?php elseif($row->orders_status=="Return"): ?>
                                                            <span class="btn btn-outline-danger">
                                                            <?php elseif($row->orders_status=="Cancel"): ?>
                                                            <span class="btn btn-outline-warning">
                                                            <?php else: ?>
                                                            <span class="btn btn-outline-info">
                                                            <?php endif; ?>
                                                            <?php echo e($row->orders_status); ?>

                                                            </span>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo e(URL::to('view-order/'.$row->orders_id)); ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <?php $i--; ?>
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
            </div>
        </section>
        <?php echo $__env->make('web.includes.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/web/orders.blade.php ENDPATH**/ ?>