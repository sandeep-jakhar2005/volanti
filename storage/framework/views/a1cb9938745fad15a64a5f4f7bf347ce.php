<?php $__env->startSection('page_title'); ?>
 <?php echo e(__('shop::app.customer.reset-password.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

<div class="auth-content">

    <?php echo view_render_event('bagisto.shop.customers.reset_password.before'); ?>


    <form method="post" action="<?php echo e(route('shop.customer.reset_password.store')); ?>" >

        <?php echo e(csrf_field()); ?>


        <div class="login-form">

            <div class="login-text"><?php echo e(__('shop::app.customer.reset-password.title')); ?></div>

            <input type="hidden" name="token" value="<?php echo e(old('token') ?: $token); ?>">

            <?php echo view_render_event('bagisto.shop.customers.reset_password_form_controls.before'); ?>


            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <label for="email"><?php echo e(__('shop::app.customer.reset-password.email')); ?></label>
                <input type="text" v-validate="'required|email'" class="control" id="email" name="email" value="<?php echo e(old('email')); ?>"/>
                <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <label for="password"><?php echo e(__('shop::app.customer.reset-password.password')); ?></label>
                <input type="password" class="control" name="password" v-validate="'required|min:6'" ref="password">
                <span class="control-error" v-if="errors.has('password')">{{ errors.first('password') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('confirm_password') ? 'has-error' : '']">
                <label for="confirm_password"><?php echo e(__('shop::app.customer.reset-password.confirm-password')); ?></label>
                <input type="password" class="control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'">
                <span class="control-error" v-if="errors.has('confirm_password')">{{ errors.first('confirm_password') }}</span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.reset_password_form_controls.before'); ?>


            <input class="btn btn-primary btn-lg" type="submit" value="<?php echo e(__('shop::app.customer.reset-password.submit-btn-title')); ?>">

        </div>
    </form>

    <?php echo view_render_event('bagisto.shop.customers.reset_password.before'); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/signup/reset-password.blade.php ENDPATH**/ ?>