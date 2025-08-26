<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('Customer Inquery')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content full-page">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.sales.customersInquery.displayInquerys')); ?>'"></i>

                    <?php echo e(__('Inquiry id')); ?> #<?php echo e($inquerys->id); ?>


                </h1>
            </div>

            <div class="page-action">
            </div>
        </div>

        <div class="page-content">
            <div class="sale-container">

             
                    <div slot="body">
                        <div class="sale">
                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(('Inquery Information')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(('Id')); ?>

                                        </span>

                                        <span class="value">
                                            <a href="<?php echo e(route('admin.sales.customersInquery.viewInquery', $inquerys->id)); ?>">#<?php echo e($inquerys->id); ?></a>
                                        </span>
                                    </div>

                                    <!-- <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.order-date')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e(core()->formatDate($inquerys->created_at, 'Y-m-d H:i:s')); ?>

                                        </span>
                                    </div> -->

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('First Name')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($inquerys->fname); ?>

                                        </span>
                                    </div>


                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('Last Name')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($inquerys->lname); ?>

                                        </span>
                                    </div>


                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('Email')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($inquerys->email); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('Mobile Number')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($inquerys->mobile_number); ?>

                                        </span>
                                    </div>

                                    <div class="row" style="justify-content: normal;display:flex;align-items: start;max-height:200px;overflow:auto;">
                                        <span class="title">
                                            <?php echo e(__('Message')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($inquerys->message); ?>

                                        </span>
                                        </div>

                                    <div class="row" style="justify-content: normal;display:flex;align-items: start;">
                                        <span class="title">
                                            <?php echo e(__('Files')); ?>

                                        </span>
                                    
                                        <span class="value">
                                         
                                        <?php $__currentLoopData = $selectFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <a href="<?php echo e(route('admin.sales.customersInquery.downloadfile', ['file' => basename($file)])); ?>" target="_blank"><?php echo e(basename($file)); ?></a><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                      </span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </accordian>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/ACME/paymentProfile/src/Providers/../Resources/views/admin/sales/customersInquery/view.blade.php ENDPATH**/ ?>