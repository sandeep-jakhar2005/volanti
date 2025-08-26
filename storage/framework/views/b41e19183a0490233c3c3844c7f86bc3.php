<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.login-form.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="auth-content form-container">

        <?php echo view_render_event('bagisto.shop.customers.login.before'); ?>


            <div class="container custom-auth-container">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <div class="heading">
                        <h2 class="fs24 fw6">
                            <?php echo e(__('velocity::app.customer.login-form.customer-login')); ?>

                        </h2>

                        <a href="<?php echo e(route('shop.customer.register.index')); ?>" class="btn-new-customer">
                            <button type="button" class="theme-btn light">
                                <?php echo e(__('velocity::app.customer.login-form.sign-up')); ?>

                            </button>
                        </a>
                    </div>

                    <div class="body col-12">
                        <div class="form-header">
                            <h3 class="fw6">
                                <?php echo e(__('velocity::app.customer.login-form.registered-user')); ?>

                            </h3>

                            <p class="fs16">
                                <?php echo e(__('velocity::app.customer.login-form.form-login-text')); ?>

                            </p>
                        </div>

                        <form
                            method="POST"
                            action="<?php echo e(route('shop.customer.session.create')); ?>"
                            @submit.prevent="onSubmit">

                            <?php echo e(csrf_field()); ?>


                            <?php echo view_render_event('bagisto.shop.customers.login_form_controls.before'); ?>


                            <div class="form-group" :class="[errors.has('email') ? 'has-error' : '']">
                                <label for="email" class="mandatory label-style">
                                    <?php echo e(__('shop::app.customer.login-form.email')); ?>

                                </label>

                                <input
                                    type="text"
                                    class="form-style"
                                    name="email"
                                    v-validate="'required|email'"
                                    value="<?php echo e(old('email')); ?>"
                                    data-vv-as="&quot;<?php echo e(__('shop::app.customer.login-form.email')); ?>&quot;" />

                                <span class="control-error" v-if="errors.has('email')" v-text="errors.first('email')"></span>
                            </div>

                            <div class="form-group" :class="[errors.has('password') ? 'has-error' : '']">
                                <label for="password" class="mandatory label-style">
                                    <?php echo e(__('shop::app.customer.login-form.password')); ?>

                                </label>

                                <input
                                    type="password"
                                    class="form-style"
                                    name="password"
                                    id="password"
                                    v-validate="'required'"
                                    value="<?php echo e(old('password')); ?>"
                                    data-vv-as="&quot;<?php echo e(__('shop::app.customer.login-form.password')); ?>&quot;" />

                                <input
                                    type="checkbox"
                                    onclick="myFunction()"
                                    id="shoPassword"
                                    class="show-password"
                                />

                                <?php echo e(__('shop::app.customer.login-form.show-password')); ?>


                                <a href="<?php echo e(route('shop.customer.forgot_password.create')); ?>" class=" show-password float-right">
                                    <?php echo e(__('shop::app.customer.login-form.forgot_pass')); ?>  
                                </a>

                                <div class="mt10">
                                    <span class="control-error" v-if="errors.has('password')" v-text="errors.first('password')"></span>
                                    <?php if(Cookie::has('enable-resend')): ?>
                                        <?php if(Cookie::get('enable-resend') == true): ?>
                                            <a href="<?php echo e(route('shop.customer.resend.verification_email', Cookie::get('email-for-resend'))); ?>"><?php echo e(__('shop::app.customer.login-form.resend-verification')); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">

                                <?php echo Captcha::render(); ?>


                            </div>

                            <?php echo view_render_event('bagisto.shop.customers.login_form_controls.after'); ?>


                            <input class="theme-btn" type="submit" value="<?php echo e(__('shop::app.customer.login-form.button_title')); ?>">

                        </form>
                    </div>
                </div>
            </div>

        <?php echo view_render_event('bagisto.shop.customers.login.after'); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php echo Captcha::renderJS(); ?>


<script>
    $(function(){       
        $(":input[name=email]").focus();
    });

    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    
</script>

<?php $__env->stopPush(); ?>




<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/customers/session/index.blade.php ENDPATH**/ ?>