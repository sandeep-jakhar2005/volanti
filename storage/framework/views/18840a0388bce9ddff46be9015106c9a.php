<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.order.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <div class="account-head mb-10">
            <span class="back-icon"><a href="<?php echo e(route('shop.customer.profile.index')); ?>"><i class="icon icon-menu-back"></i></a></span>

            <span class="account-heading">
                <?php echo e(__('shop::app.customer.account.order.index.title')); ?>

            </span>
            <div class="horizontal-rule"></div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.orders.list.before'); ?>


        <div class="account-items-list">
            <div class="account-table-content">
                
                <datagrid-plus src="<?php echo e(route('shop.customer.orders.index')); ?>"></datagrid-plus>
                
            </div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.orders.list.after'); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/orders/index.blade.php ENDPATH**/ ?>