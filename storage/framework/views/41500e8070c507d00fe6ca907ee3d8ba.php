<div v-if="is_customer_exist">
    <div class="control-group" id="password">
        <label for="password"><?php echo e(__('shop::app.checkout.onepage.password')); ?></label>

        <input type="password" class="control" id="password" name="password" v-model="address.billing.password"/>
    </div>

    <div class="control-group" id="login-and-forgot-btn">
        <div class="forgot-password-link"  style="float: right; margin-right: 503px; margin-top: 11px;">
            <a href="<?php echo e(route('shop.customer.forgot_password.create')); ?>"><?php echo e(__('shop::app.customer.login-form.forgot_pass')); ?></a>

            <div class="mt-10">
                <?php if(
                    Cookie::has('enable-resend')
                    && Cookie::get('enable-resend') == true
                ): ?>
                    <a href="<?php echo e(route('shop.customer.resend.verification_email', Cookie::get('email-for-resend'))); ?>"><?php echo e(__('shop::app.customer.login-form.resend-verification')); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <button type='button' id="" class="btn btn-primary btn-lg btn-login" @click="loginCustomer">
            <?php echo e(__('shop::app.customer.login-form.button_title')); ?>

        </button>
    </div>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/checkout/onepage/customer-checkout.blade.php ENDPATH**/ ?>