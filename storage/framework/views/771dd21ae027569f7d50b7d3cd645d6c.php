<?php $__env->startComponent('shop::emails.layouts.master'); ?>
    <div style="text-align: center;">
        <a href="<?php echo e(config('app.url')); ?>">
            <?php if(core()->getConfigData('general.design.admin_logo.logo_image')): ?>
                <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image'))); ?>" alt="<?php echo e(config('app.name')); ?>" style="height: 40px; width: 110px;"/>
            <?php else: ?>
                <img src="<?php echo e(asset('vendor/webkul/ui/assets/images/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>"/>
            <?php endif; ?>
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
<?php echo $__env->renderComponent(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/emails/admin/update-password.blade.php ENDPATH**/ ?>