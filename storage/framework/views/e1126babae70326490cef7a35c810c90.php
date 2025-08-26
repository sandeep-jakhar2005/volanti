<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.transactions.view-title', ['transaction_id' => $transaction->id])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="content full-page">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.sales.transactions.index')); ?>'"></i>

                    <?php echo e(__('admin::app.sales.transactions.view-title', ['transaction_id' => $transaction->id])); ?>

                </h1>
            </div>

            <div class="page-action">
            </div>
        </div>

        <div class="page-content">
            <div class="sale-container">

                <accordian title="<?php echo e(__('admin::app.sales.transactions.transaction-data')); ?>" :active="true">
                    <div slot="body">
                        <div class="sale">
                            <div class="sale-section" style="width:100%">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.transactions.transaction-data')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.transactions.transaction-id')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($transaction->transaction_id); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.transactions.order-id')); ?>

                                        </span>

                                        <span class="value">
                                            <a href="<?php echo e(route('admin.sales.orders.view', $transaction->order_id)); ?>">
                                                <?php echo e($transaction->order_id); ?>

                                            </a>
                                        </span>
                                    </div>

                                    <?php if($transaction->invoice_id): ?>
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.transactions.invoice-id')); ?>

                                        </span>

                                        <span class="value">
                                            <a href="<?php echo e(route('admin.sales.invoices.view', $transaction->invoice_id)); ?>">
                                                <?php echo e($transaction->invoice_id); ?>

                                            </a>
                                        </span>
                                    </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.transactions.payment-method')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e(core()->getConfigData('sales.paymentmethods.' . $transaction->payment_method . '.title')); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.transactions.status')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($transaction->status); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.transactions.created-at')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e(core()->formatDate($transaction->created_at, 'Y-m-d H:i:s')); ?>

                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </accordian>

                <accordian title="<?php echo e(__('admin::app.sales.transactions.transaction-details')); ?>" :active="true">
                    <div slot="body">
                        <?php
                            $transData = json_decode(json_encode(json_decode($transaction['data'])), true);
                        ?>

                        <div class="sale">
                            <div class="sale-section" style="width: 100%;">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.transactions.transaction-details')); ?></span>
                                </div>

                                <div class="section-content">
                                    <?php $__currentLoopData = $transactionDetailsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <span class="title">
                                                <?php echo e($key); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e($data); ?>

                                            </span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </accordian>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/ACME/paymentProfile/src/Resources/views/admin/sales/transactions/view.blade.php ENDPATH**/ ?>