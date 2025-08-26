<?php $__env->startComponent('shop::emails.layouts.master'); ?>
    <div>
        <div style="text-align: center;">
            <a href="<?php echo e(route('shop.home.index')); ?>">
                <?php echo $__env->make('shop::emails.layouts.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </div>

        <div style="padding: 30px;">
            <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
                <p style="font-weight: bold;font-size: 20px;color: #242424;line-height: 24px;">
                    <?php echo e(__('shop::app.mail.customer.registration.dear-admin', ['admin_name' => core()->getAdminEmailDetails()['name']])); ?>,
                </p>

                <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                    <?php echo __('shop::app.mail.customer.registration.greeting-admin'); ?>

                </p>
            </div>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.customer.registration.thanks')); ?>

            </p>
        </div>
    </div>
<?php echo $__env->renderComponent(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/emails/admin/registration.blade.php ENDPATH**/ ?>