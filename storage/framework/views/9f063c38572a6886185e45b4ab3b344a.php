<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.tax-categories.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.tax-categories.title')); ?></h1>
            </div>

            <div class="page-action">
                <?php if(bouncer()->hasPermission('settings.taxes.tax-categories.create')): ?>
                    <a href="<?php echo e(route('admin.tax_categories.create')); ?>" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.tax-categories.add-title')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.tax_categories.index')); ?>"></datagrid-plus>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/tax/tax-categories/index.blade.php ENDPATH**/ ?>