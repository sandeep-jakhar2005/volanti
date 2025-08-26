<?php $__env->startComponent('shop::emails.layouts.master'); ?>

    <div>
        <div style="text-align: center;">
            <a href="<?php echo e(config('app.url')); ?>">
                <?php echo $__env->make('shop::emails.layouts.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </div>

        <div  style="font-size:16px; color:#242424; font-weight:600; margin-top: 60px; margin-bottom: 15px">
                <?php echo __('shop::app.mail.customer.verification.heading'); ?>

        </div>

        <div>
            <?php echo __('shop::app.mail.customer.verification.summary'); ?>

        </div>

        <div  style="margin-top: 40px; text-align: center">
            <a href="<?php echo e(route('shop.customer.verify', $data['token'])); ?>" style="font-size: 16px;
            color: #FFFFFF; text-align: center; background: #0031F0; padding: 10px 100px;text-decoration: none;">
                <?php echo __('shop::app.mail.customer.verification.verify'); ?>

            </a>
        </div>
    </div>

<?php echo $__env->renderComponent(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/emails/customer/verification-email.blade.php ENDPATH**/ ?>