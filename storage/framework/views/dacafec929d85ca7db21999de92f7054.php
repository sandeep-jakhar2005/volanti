<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.customers.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.customer.index')); ?>'"></i>
                    <?php echo e(__('admin::app.users.users.confirm-delete-title')); ?>

                </h1>
            </div>
        </div>

        <div class="page-content">
            <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" @submit.prevent="onSubmit">
                <?php echo csrf_field(); ?>
                <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                    <label for="password" class="required">
                        <?php echo e(__('admin::app.users.users.current-password')); ?>

                    </label>

                    <input type="password" v-validate="'required'" class="control" id="password" name="password" data-vv-as="&quot;<?php echo e(__('admin::app.users.users.password')); ?>&quot;"/>

                    <span class="control-error" v-if="errors.has('password')">
                        {{ errors.first('password') }}
                    </span>
                </div>

                <input type="submit" class="btn btn-md btn-primary" value="<?php echo e(__('admin::app.users.users.confirm-delete')); ?>">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/customers/confirm-password.blade.php ENDPATH**/ ?>