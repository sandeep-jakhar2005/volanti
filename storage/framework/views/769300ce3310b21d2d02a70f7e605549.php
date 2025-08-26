<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.inventory_sources.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.inventory_sources.title')); ?></h1>
            </div>

            <div class="page-action">
                <?php if(bouncer()->hasPermission('settings.inventory_sources.create')): ?>
                    <a href="<?php echo e(route('admin.inventory_sources.create')); ?>" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.inventory_sources.add')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.inventory_sources.index')); ?>"></datagrid-plus>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Providers/../Resources/views/settings/inventory_sources/index.blade.php ENDPATH**/ ?>