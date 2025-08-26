<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.wishlist.customer-name', ['name' => $customer->name])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>

    <div class="account-layout">
        <div class="account-head mb-15">
            <span class="account-heading"><?php echo e(__('shop::app.customer.account.wishlist.customer-name', ['name' => $customer->name])); ?></span>

            <div class="horizontal-rule"></div>
        </div>

        <div class="account-items-list">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('shop::customers.account.wishlist.wishlist-product', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/wishlist/wishlist-shared.blade.php ENDPATH**/ ?>