
<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Vendors <small>Vendors...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
                <li class=" active">Vendors</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            

                            <!--  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6 form-inline">
                                                <form name='filter' id="registration" class="filter  " method="get" action="<?php echo e(url('admin/manufacturers/filter')); ?>">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <div class="input-group-form search-panel ">
                                                      <select type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="FilterBy" id="FilterBy" >
                                                        <option value="" selected disabled hidden><?php echo e(trans('labels.Filter By')); ?></option>
                                                        <option value="Name" <?php if(isset($name)): ?> <?php if($name == "Name"): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.Name')); ?></option>
                                                        <option value="URL" <?php if(isset($name)): ?> <?php if($name == "URL"): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.URL')); ?></option>
                                                      </select>
                                                      <input type="text" class="form-control input-group-form " name="parameter" placeholder="<?php echo e(trans('labels.Search')); ?>..." id="parameter" <?php if(isset($param)): ?> value="<?php echo e($param); ?>" <?php endif; ?>>
                                                      <button class="btn btn-primary " type="submit" id="submit"><span class="glyphicon glyphicon-search"></span></button>
                                                      <?php if(isset($param,$name)): ?>  <a class="btn btn-danger " href="<?php echo e(URL::to('admin/manufacturers/display')); ?>"><i class="fa fa-ban" aria-hidden="true"></i> </a><?php endif; ?>
                                                    </div>
                                                </form>
                                                <div class="col-lg-4 form-inline" id="contact-form12"></div>
                                        </div>
                                    </div>
                                </div>-->

                        <!--  <div class="box-tools pull-right">
                                <a href="javascript:;" type="button" class="btn btn-block btn-primary">Vendors</a>
                            </div>-->
                        
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php if(count($errors) > 0): ?>					
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        <h4 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Error!</h4>
                                        <ul class="mb-0 px-0 list-style-none">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><i class="fa fa-chevron-right"></i> <?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(Session::has('flash_message')): ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        <h4 class="text-success mb-0"><i class="fa fa-check-circle"></i> <?php echo e(Session::get('flash_message')); ?></h4>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                           
                            <div class="row">
                           <!--  <p class="col-sm-6 col-lg-4"><strong >Total Earnings : </strong><span><?php echo e(number_format($sold_cost_vendor_completed),2); ?></span></p>
                                 <p class="col-sm-6 col-lg-4"><strong >Pending Earnings : </strong><span><?php echo e(number_format($sold_cost_vendor_pending),2); ?></span></p>
                                 <p class="col-sm-6 col-lg-4"><strong >Delivered Earnings : </strong><span><?php echo e(number_format($sold_cost_vendor_completed),2); ?></span></p>-->
                             <p class="col-sm-6 col-lg-6"><strong >Total Earned : </strong><span><?php echo e(number_format($total_earned),2); ?></span></p>
                             <p class="col-sm-6 col-lg-6"><strong >Total Products : </strong><span><?php echo e($total_products); ?></span></p>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty Sold</th>
                                            <th>Commission</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php $productsale = 0; $productcomission = 0; ?>
                                        <?php if(count($products)>0): ?>
                                          <?php $i=1; ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $date = \Carbon\Carbon::parse($product->date_purchased); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <td><?php echo e($date->isoFormat('MMM D, YYYY')); ?></td>
                                                <td><?php echo e($product->products_name); ?></td>
                                                <td><i class="fa fa-inr"></i><?php echo e($product->products_price); ?></td>
                                                <td><?php echo e($product->products_quantity); ?></td> 
                                                <td><i class="fa fa-inr"></i><?php echo e($product->final_price); ?></td>
                                            </tr>
                                            <?php 
                                            $i++;
                                            ?>
                                            <?php $productsale += $product->products_quantity; $productcomission += $product->final_price; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td colspan="4"><strong>Total</strong></td>
                                                <td><strong><?php echo e($productsale); ?> Sale</strong></td>
                                                <td colspan="3"><strong><i class="fa fa-inr"></i><?php echo e($productcomission); ?></strong></td>
                                            </tr>
                                        <?php endif; ?>
                                              
                                        </tbody>
                                    </table>
                                  
                                    <div class="col-xs-12 text-right">
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->

            <!-- deleteManufacturerModal -->
            <div class="modal fade" id="manufacturerModal" tabindex="-1" role="dialog" aria-labelledby="deleteManufacturerModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="deleteManufacturerModalLabel"><?php echo e(trans('labels.DeleteManufacturer')); ?></h4>
                        </div>
                        <?php echo Form::open(array('url' =>'admin/manufacturers/delete', 'name'=>'deleteManufacturer', 'id'=>'deleteManufacturer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

                        <?php echo Form::hidden('action',  'delete', array('class'=>'form-control')); ?>

                        <?php echo Form::hidden('manufacturers_id',  '', array('class'=>'form-control', 'id'=>'manufacturers_id')); ?>

                        <div class="modal-body">
                            <p><?php echo e(trans('labels.DeleteManufacturerText')); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.Close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.Delete')); ?></button>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwwwqrxa/domains/apnamal.com/public_html/resources/views/admin/vendor/viewearning.blade.php ENDPATH**/ ?>