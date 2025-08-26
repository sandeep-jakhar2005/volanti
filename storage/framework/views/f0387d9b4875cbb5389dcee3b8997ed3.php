<?php echo $__env->make('shop::guest.compare.compare-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.compare.compare_similar_items')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <?php echo view_render_event('bagisto.shop.customers.account.comparison.list.before'); ?>


        <div class="account-items-list">
            <div class="account-table-content">
                <compare-product></compare-product>
            </div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.comparison.list.after'); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/compare/index.blade.php ENDPATH**/ ?>