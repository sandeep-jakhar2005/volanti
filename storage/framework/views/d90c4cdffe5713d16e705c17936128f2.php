<?php $__env->startSection('content-wrapper'); ?>
    <div>
        <?php if(request()->route()->getName() !== 'shop.customer.profile.index'): ?>
            <?php if(Breadcrumbs::exists()): ?>
                <?php echo e(Breadcrumbs::render()); ?>

            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="account-content">
        <?php echo $__env->make('shop::customers.account.partials.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('account-content'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/index.blade.php ENDPATH**/ ?>