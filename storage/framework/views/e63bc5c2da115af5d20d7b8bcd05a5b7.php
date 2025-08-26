<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.exchange_rates.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.exchange_rates.title')); ?></h1>
            </div>

            <div class="page-action">
                <a href="<?php echo e(route('admin.exchange_rates.update_rates')); ?>" class="btn btn-lg btn-primary">
                    <?php echo e(__('admin::app.settings.exchange_rates.update-rates')); ?>

                </a>
                <?php if(bouncer()->hasPermission('settings.exchange_rates.create')): ?>
                    <a href="<?php echo e(route('admin.exchange_rates.create')); ?>" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.exchange_rates.add-title')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.exchange_rates.index')); ?>"></datagrid-plus>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/settings/exchange_rates/index.blade.php ENDPATH**/ ?>