<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.note.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.customer.note.store', $customer->id)); ?>">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.customer.index')); ?>'"></i>

                        <?php echo e(__('admin::app.customers.note.title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.customers.note.save-note')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <input name="_method" type="hidden" value="PUT">

                    <input name="_customer" type="hidden" value="<?php echo e($customer->id); ?>">

                    <div class="control-group" :class="[errors.has('channel_id') ? 'has-error' : '']">
                        <label for="notes"><?php echo e(__('admin::app.customers.note.enter-note')); ?> for <?php echo e($customer->name); ?></label>

                        <textarea class="control" name="notes" v-pre><?php echo e($customer->notes); ?></textarea>

                        <span class="control-error" v-if="errors.has('notes')">{{ errors.first('notes') }}</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/customers/note.blade.php ENDPATH**/ ?>