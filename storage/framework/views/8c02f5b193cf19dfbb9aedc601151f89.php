<?php $__env->startSection('page_title'); ?>
 <?php echo e(__('shop::app.customer.forgot-password.page_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .button-group {
            margin-bottom: 25px;
        }
        .primary-back-icon {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-wrapper'); ?>

<div class="auth-content">

    <?php echo view_render_event('bagisto.shop.customers.forget_password.before'); ?>


    <form method="post" action="<?php echo e(route('shop.customer.forgot_password.store')); ?>" @submit.prevent="onSubmit">

        <?php echo e(csrf_field()); ?>


        <div class="login-form">

            <div class="login-text"><?php echo e(__('shop::app.customer.forgot-password.title')); ?></div>

            <?php echo view_render_event('bagisto.shop.customers.forget_password_form_controls.before'); ?>


            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <label for="email"><?php echo e(__('shop::app.customer.forgot-password.email')); ?></label>
                <input type="email" class="control" name="email" v-validate="'required|email'">
                <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.forget_password_form_controls.before'); ?>


            <div class="button-group">
                <button type="submit" class="btn btn-lg btn-primary">
                    <?php echo e(__('shop::app.customer.forgot-password.submit')); ?>

                </button>
            </div>

            <div class="control-group" style="margin-bottom: 0px;">
                <a href="<?php echo e(route('shop.customer.session.index')); ?>">
                    <i class="icon primary-back-icon"></i>
                    <?php echo e(__('shop::app.customer.reset-password.back-link-title')); ?>

                </a>
            </div>

        </div>
    </form>

    <?php echo view_render_event('bagisto.shop.customers.forget_password.before'); ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/signup/forgot-password.blade.php ENDPATH**/ ?>