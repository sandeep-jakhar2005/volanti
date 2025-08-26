<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.subscribers.title-edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.customers.subscribers.update', $subscriber->id)); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.customers.subscribers.index')); ?>'"></i>

                        <?php echo e(__('admin::app.customers.subscribers.title-edit')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.customers.subscribers.edit-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <label for="title"><?php echo e(__('admin::app.customers.subscribers.email')); ?></label>
                    <input type="text" class="control" name="email" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.customers.subscribers.email')); ?>&quot;" value="<?php echo e($subscriber->email ?: old('email')); ?>" disabled>
                    <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                </div>

                <div class="control-group" :class="[errors.has('is_subscribed') ? 'has-error' : '']">
                    <label for="title"><?php echo e(__('admin::app.customers.subscribers.is_subscribed')); ?></label>

                    <select class="control" name="is_subscribed" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.customers.subscribers.is_subscribed')); ?>&quot;">
                        <option value="1" <?php if($subscriber->is_subscribed == 1): ?> selected <?php endif; ?>><?php echo e(__('admin::app.common.true')); ?></option>
                        <option value="0" <?php if($subscriber->is_subscribed == 0): ?> selected <?php endif; ?>><?php echo e(__('admin::app.common.false')); ?></option>
                    </select>

                    <span class="control-error" v-if="errors.has('is_subscribed')">{{ errors.first('is_subscribed') }}</span>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/email-marketing/subscribers/edit.blade.php ENDPATH**/ ?>