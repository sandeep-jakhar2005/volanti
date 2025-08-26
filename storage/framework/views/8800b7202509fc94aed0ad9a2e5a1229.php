<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.transactions.create-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.sales.transactions.index')); ?>'"></i>

                <h1><?php echo e(__('admin::app.sales.transactions.create-title')); ?></h1>
            </div>
        </div>

        <div class="page-content">
            <form method="POST" action="<?php echo e(route('admin.sales.transactions.store')); ?>">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <div class="control-group" :class="[errors.has('invoice_id') ? 'has-error' : '']">
                        <label for="invoice_id" class="required">
                            <?php echo e(__('admin::app.sales.transactions.invoice-id')); ?>

                        </label>

                        <input id="invoice_id" name="invoice_id" class="control" value="<?php echo e(old('invoice_id')); ?>" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.sales.transactions.invoice-id')); ?>&quot;" />

                        <span class="control-error" v-if="errors.has('invoice_id')">{{ errors.first('invoice_id') }}</span>
                    </div>

                    <div class="control-group select" :class="[errors.has('payment_method') ? 'has-error' : '']">
                        <label for="payment-method" class="required"><?php echo e(__('admin::app.sales.transactions.payment-method')); ?> </label>

                        <select id="payment-method" name="payment_method" class="control" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.sales.transactions.payment-method')); ?>&quot;">
                            <option value=""><?php echo e(__('admin::app.select-option')); ?></option>

                            <?php $__currentLoopData = $payment_methods["paymentMethods"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($paymentMethod["method"] == "cashondelivery" || $paymentMethod["method"] == "moneytransfer"): ?>
                                    <option value="<?php echo e($paymentMethod["method"]); ?>"><?php echo e($paymentMethod["method_title"]); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <span class="control-error" v-if="errors.has('payment_method')">{{ errors.first('payment_method') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('amount') ? 'has-error' : '']">
                        <label for="transaction-amount" class="required"><?php echo e(__('admin::app.sales.transactions.transaction-amount')); ?></label>

                        <input id="transaction-amount" name="amount" class="control" value="<?php echo e(old('amount')); ?>" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.sales.transactions.transaction-amount')); ?>&quot;">

                        <span class="control-error" v-if="errors.has('amount')">{{ errors.first('amount') }}</span>
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('admin::app.save')); ?></button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/sales/transactions/create.blade.php ENDPATH**/ ?>