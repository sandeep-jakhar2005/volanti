<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.users.reset-password.title')); ?>

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
                <h1><?php echo e(__('admin::app.users.reset-password.title')); ?></h1>

                <form method="POST" action="<?php echo e(route('admin.reset_password.store')); ?>" @submit.prevent="onSubmit">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email"><?php echo e(__('admin::app.users.reset-password.email')); ?></label>
                        <input type="text" v-validate="'required|email'" class="control" id="email" name="email" data-vv-as="&quot;<?php echo e(__('admin::app.users.reset-password.email')); ?>&quot;" value="<?php echo e(old('email')); ?>"/>
                        <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password"><?php echo e(__('admin::app.users.reset-password.password')); ?></label>
                        <input type="password" v-validate="'required|min:6'" class="control" id="password" name="password" ref="password" data-vv-as="&quot;<?php echo e(__('admin::app.users.reset-password.password')); ?>&quot;"/>
                        <span class="control-error" v-if="errors.has('password')">{{ errors.first('password') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                        <label for="password_confirmation"><?php echo e(__('admin::app.users.reset-password.confirm-password')); ?></label>
                        <input type="password" v-validate="'required|min:6|confirmed:password'" class="control" id="password_confirmation" name="password_confirmation" data-vv-as="&quot;<?php echo e(__('admin::app.users.reset-password.confirm-password')); ?>&quot;" data-vv-as="password"/>
                        <span class="control-error" v-if="errors.has('password_confirmation')">{{ errors.first('password_confirmation') }}</span>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-xl btn-primary"><?php echo e(__('admin::app.users.reset-password.submit-btn-title')); ?></button>
                    </div>

                    <div class="control-group" style="margin-bottom: 0">
                        <a href="<?php echo e(route('admin.session.create')); ?>">
                            <i class="icon primary-back-icon" style="vertical-align: bottom"></i>
                            <?php echo e(__('admin::app.users.reset-password.back-link-title')); ?>

                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.anonymous-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/users/reset-password/create.blade.php ENDPATH**/ ?>