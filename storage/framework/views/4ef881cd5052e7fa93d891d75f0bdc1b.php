<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.addresses.title', ['customer_name' => $customer->first_name . ' ' . $customer->last_name])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.customer.edit', ['id' => $customer->id])); ?>'"></i>

                    <?php echo e(__('admin::app.customers.addresses.title', ['customer_name' => $customer->first_name . ' ' . $customer->last_name])); ?>

                </h1>
            </div>

            <div class="page-action">
            <?php if(bouncer()->hasPermission('customers.addresses.create ')): ?>
                <a href="<?php echo e(route('admin.customer.addresses.create', ['id' => $customer->id])); ?>" class="btn btn-lg btn-primary">
                    <?php echo e(__('admin::app.customers.addresses.create-btn-title')); ?>

                </a>
            <?php endif; ?>
            </div>
        </div>

        <?php echo view_render_event('bagisto.admin.customer.addresses.list.before'); ?>


        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.customer.addresses.index', $customer->id)); ?>"></datagrid-plus>
        </div>

        <?php echo view_render_event('bagisto.admin.customer.addresses.list.after'); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/customers/addresses/index.blade.php ENDPATH**/ ?>