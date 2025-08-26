<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.signup-form.page-title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-wrapper'); ?>

<div class="auth-content">

    <div class="sign-up-text">
        <?php echo e(__('shop::app.customer.signup-text.account_exists')); ?> - <a href="<?php echo e(route('shop.customer.session.index')); ?>"><?php echo e(__('shop::app.customer.signup-text.title')); ?></a>
    </div>

    <?php echo view_render_event('bagisto.shop.customers.signup.before'); ?>


    <form method="post" action="<?php echo e(route('shop.customer.register.create')); ?>" @submit.prevent="onSubmit">

        <?php echo e(csrf_field()); ?>


        <div class="login-form">
            <div class="login-text"><?php echo e(__('shop::app.customer.signup-form.title')); ?></div>

            <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.before'); ?>


            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                <label for="first_name" class="required"><?php echo e(__('shop::app.customer.signup-form.firstname')); ?></label>
                <input type="text" class="control" name="first_name" v-validate="'required'" value="<?php echo e(old('first_name')); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.firstname')); ?>&quot;">
                <span class="control-error" v-if="errors.has('first_name')">{{ errors.first('first_name') }}</span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after'); ?>


            <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                <label for="last_name" class="required"><?php echo e(__('shop::app.customer.signup-form.lastname')); ?></label>
                <input type="text" class="control" name="last_name" v-validate="'required'" value="<?php echo e(old('last_name')); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.lastname')); ?>&quot;">
                <span class="control-error" v-if="errors.has('last_name')">{{ errors.first('last_name') }}</span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after'); ?>


            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <label for="email" class="required"><?php echo e(__('shop::app.customer.signup-form.email')); ?></label>
                <input type="email" class="control" name="email" v-validate="'required|email'" value="<?php echo e(old('email')); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.email')); ?>&quot;">
                <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.email.after'); ?>


            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <label for="password" class="required"><?php echo e(__('shop::app.customer.signup-form.password')); ?></label>
                <input type="password" class="control" name="password" v-validate="'required|min:6'" ref="password" value="<?php echo e(old('password')); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.password')); ?>&quot;">
                <span class="control-error" v-if="errors.has('password')">{{ errors.first('password') }}</span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.password.after'); ?>


            <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                <label for="password_confirmation" class="required"><?php echo e(__('shop::app.customer.signup-form.confirm_pass')); ?></label>
                <input type="password" class="control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.confirm_pass')); ?>&quot;">
                <span class="control-error" v-if="errors.has('password_confirmation')">{{ errors.first('password_confirmation') }}</span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.password_confirmation.after'); ?>


            

            

            <div class="control-group">

                <?php echo Captcha::render(); ?>


            </div>

            <?php if(core()->getConfigData('customer.settings.newsletter.subscription')): ?>
                <div class="control-group">
                    <input type="checkbox" id="checkbox2" name="is_subscribed">
                    <span><?php echo e(__('shop::app.customer.signup-form.subscribe-to-newsletter')); ?></span>
                </div>
            <?php endif; ?>

            <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.after'); ?>


            <button class="btn btn-primary btn-lg" type="submit">
                <?php echo e(__('shop::app.customer.signup-form.button_title')); ?>

            </button>

        </div>
    </form>

    <?php echo view_render_event('bagisto.shop.customers.signup.after'); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>
        $(function(){
            $(":input[name=first_name]").focus();
        });
    </script>

<?php echo Captcha::renderJS(); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/signup/index.blade.php ENDPATH**/ ?>