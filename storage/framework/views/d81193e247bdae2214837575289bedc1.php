<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.promotions.catalog-rules.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.promotions.catalog-rules.title')); ?></h1>
            </div>

            <div class="page-action">
                <?php if(bouncer()->hasPermission('marketing.promotions.catalog-rules')): ?>
                    <a href="<?php echo e(route('admin.catalog_rules.create')); ?>" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.promotions.catalog-rules.add-title')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.catalog_rules.index')); ?>"></datagrid-plus>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/promotions/catalog-rules/index.blade.php ENDPATH**/ ?>