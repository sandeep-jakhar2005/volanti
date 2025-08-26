<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.users.forget-password.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .button-group {
            margin-bottom: 25px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-content">
            <div class="form-container" style="text-align: left">
                <h1><?php echo e(__('admin::app.users.forget-password.header-title')); ?></h1>

                <form method="POST" action="<?php echo e(route('admin.forget_password.store')); ?>" @submit.prevent="onSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email" class="required"><?php echo e(__('admin::app.users.forget-password.email')); ?></label>
                        <input type="text" v-validate="'required'" class="control" id="email" name="email" data-vv-as="&quot;<?php echo e(__('admin::app.users.forget-password.email')); ?>&quot;" value="<?php echo e(old('email')); ?>"/>
                        <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                    </div>

                    <div class="button-group">
                        <button class="btn btn-xl btn-primary"><?php echo e(__('admin::app.users.forget-password.submit-btn-title')); ?></button>
                    </div>

                    <div class="control-group" style="margin-bottom: 0">
                        <a href="<?php echo e(route('admin.session.create')); ?>">
                            <i class="icon primary-back-icon" style="vertical-align: bottom"></i>
                            <?php echo e(__('admin::app.users.forget-password.back-link-title')); ?>

                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.anonymous-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/users/forget-password/create.blade.php ENDPATH**/ ?>