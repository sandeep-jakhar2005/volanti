<?php echo $__env->make('velocity::guest.compare.compare-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('velocity::app.customer.compare.compare_similar_items')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-detail-wrapper'); ?>
    <div class="compare-container">
        <compare-product></compare-product>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/customers/account/compare/index.blade.php ENDPATH**/ ?>