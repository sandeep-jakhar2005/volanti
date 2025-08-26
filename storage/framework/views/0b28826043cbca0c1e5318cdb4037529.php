<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('velocity::app.admin.category.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('velocity::app.admin.category.title')); ?></h1>
            </div>
            <div class="page-action">
                <a href="<?php echo e(route('velocity.admin.category.create')); ?>" class="btn btn-lg btn-primary">
                    <?php echo e(__('velocity::app.admin.category.btn-add-category')); ?>

                </a>
            </div>
        </div>

        <div class="page-content">
            <?php $velocity_category = app('Webkul\Velocity\DataGrids\CategoryDataGrid'); ?>
            <?php echo $velocity_category->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/category/index.blade.php ENDPATH**/ ?>