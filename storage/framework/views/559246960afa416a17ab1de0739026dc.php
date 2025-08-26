<?php $__env->startComponent('shop::emails.layouts.master'); ?>
    <div style="text-align: center;">
        <a href="<?php echo e(config('app.url')); ?>">
            <?php echo $__env->make('shop::emails.layouts.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </a>
    </div>

    <div style="padding: 30px;">
        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            <?php echo e(__('shop::app.mail.update-password.dear', ['name' => $user->name])); ?>,
        </p>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            <?php echo e(__('shop::app.mail.update-password.info')); ?>

        </p>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            <?php echo e(__('shop::app.mail.update-password.thanks')); ?>

        </p>
    </div>
<?php echo $__env->renderComponent(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Providers/../Resources/views/emails/customer/update-password.blade.php ENDPATH**/ ?>