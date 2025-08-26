<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.login-form.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="auth-content">
        <div class="sign-up-text">
            <?php echo e(__('shop::app.customer.login-text.no_account')); ?> - <a href="<?php echo e(route('shop.customer.register.index')); ?>"><?php echo e(__('shop::app.customer.login-text.title')); ?></a>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.login.before'); ?>


        <form method="POST" action="<?php echo e(route('shop.customer.session.create')); ?>" @submit.prevent="onSubmit">

            <?php echo e(csrf_field()); ?>


            <div class="login-form">
                <div class="login-text"><?php echo e(__('shop::app.customer.login-form.title')); ?></div>

                <?php echo view_render_event('bagisto.shop.customers.login_form_controls.before'); ?>


                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <label for="email" class="required"><?php echo e(__('shop::app.customer.login-form.email')); ?></label>
                    <input type="text" class="control" name="email" v-validate="'required|email'" value="<?php echo e(old('email')); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.login-form.email')); ?>&quot;">
                    <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                </div>

                <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                    <label for="password" class="required"><?php echo e(__('shop::app.customer.login-form.password')); ?>  </label>
                    <input type="password" v-validate="'required|min:6'" class="control" id="password" name="password" data-vv-as="&quot;<?php echo e(__('admin::app.users.sessions.password')); ?>&quot;" value=""/>
                   <span class="control-error" v-if="errors.has('password')">{{ errors.first('password') }}</span>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="checkbox"  id="shoPassword" ><?php echo e(__('shop::app.customer.login-form.show-password')); ?>  
                    </div>

                    <div class="col-md-6">
                        <div class="forgot-password-link">
                            <a href="<?php echo e(route('shop.customer.forgot_password.create')); ?>"><?php echo e(__('shop::app.customer.login-form.forgot_pass')); ?></a>

                            <div class="mt-10">
                                <?php if(Cookie::has('enable-resend')): ?>
                                    <?php if(Cookie::get('enable-resend') == true): ?>
                                        <a href="<?php echo e(route('shop.customer.resend.verification_email', Cookie::get('email-for-resend'))); ?>"><?php echo e(__('shop::app.customer.login-form.resend-verification')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="control-group">

                    <?php echo Captcha::render(); ?>

                    
                </div>

                <?php echo view_render_event('bagisto.shop.customers.login_form_controls.after'); ?>


                <input class="btn btn-primary btn-lg" type="submit" value="<?php echo e(__('shop::app.customer.login-form.button_title')); ?>">
            </div>

        </form>

        <?php echo view_render_event('bagisto.shop.customers.login.after'); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php echo Captcha::renderJS(); ?>

<script>
    $(document).ready(function(){
        $("#shoPassword").click(function() {              
            var input = $('#password').attr("type");
            if (input == "password") {
                $('#password').attr("type", "text");
            } else {
                $('#password').attr("type", "password");
            }
        });
        $(":input[name=email]").focus();
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/session/index.blade.php ENDPATH**/ ?>