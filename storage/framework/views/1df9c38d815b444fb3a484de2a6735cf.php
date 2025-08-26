<?php $__env->startSection('page_title'); ?>
 <?php echo e(__('shop::app.customer.reset-password.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

<div class="auth-content">
    <?php echo view_render_event('bagisto.shop.customers.reset_password.before'); ?>

        <div class="auth-content form-container">
            <div class="container">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <div class="heading">
                        <h2 class="fs24 fw6">
                            <?php echo e(__('shop::app.customer.reset-password.title')); ?>

                        </h2>
                    </div>

                    <div class="body col-12">

                        <?php echo view_render_event('bagisto.shop.customers.forget_password.before'); ?>


                        <form
                            method="POST"
                            @submit.prevent="onSubmit"
                            action="<?php echo e(route('shop.customer.reset_password.store')); ?>">

                            <?php echo e(csrf_field()); ?>


                            <input type="hidden" name="token" value="<?php echo e($token); ?>">

                            <?php echo view_render_event('bagisto.shop.customers.forget_password_form_controls.before'); ?>


                            <div :class="`form-group ${errors.has('email') ? 'has-error' : ''}`">
                                <label for="email" class="required label-style mandatory">
                                    <?php echo e(__('shop::app.customer.reset-password.email')); ?>

                                </label>

                                <input
                                    id="email"
                                    type="text"
                                    name="email"
                                    class="form-style"
                                    value="<?php echo e(old('email')); ?>"
                                    v-validate="'required|email'" />

                                <span class="control-error" v-if="errors.has('email')" v-text="errors.first('email')"></span>
                            </div>

                            <div :class="`form-group ${errors.has('password') ? 'has-error' : ''}`">
                                <label for="password" class="required label-style mandatory">
                                    <?php echo e(__('shop::app.customer.reset-password.password')); ?>

                                </label>

                                <input
                                    ref="password"
                                    class="form-style"
                                    name="password"
                                    type="password"
                                    v-validate="'required|min:6'" />

                                <span class="control-error" v-if="errors.has('password')" v-text="errors.first('password')"></span>
                            </div>

                            <div :class="`form-group ${errors.has('confirm_password') ? 'has-error' : ''}`">
                                <label for="confirm_password" class="required label-style mandatory">
                                    <?php echo e(__('shop::app.customer.reset-password.confirm-password')); ?>

                                </label>

                                <input
                                    type="password"
                                    class="form-style"
                                    name="password_confirmation"
                                    v-validate="'required|min:6|confirmed:password'" />

                                <span class="control-error" v-if="errors.has('password_confirmation')" v-text="errors.first('password_confirmation')"></span>
                            </div>

                            <?php echo view_render_event('bagisto.shop.customers.forget_password_form_controls.after'); ?>


                            <button class="theme-btn" type="submit">
                                <?php echo e(__('shop::app.customer.reset-password.submit-btn-title')); ?>

                            </button>
                        </form>


                        <?php echo view_render_event('bagisto.shop.customers.forget_password.after'); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php echo view_render_event('bagisto.shop.customers.reset_password.before'); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/customers/signup/reset-password.blade.php ENDPATH**/ ?>