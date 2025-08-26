<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('velocity::app.admin.contents.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('velocity::app.admin.contents.title')); ?></h1>
            </div>
            <div class="page-action">
                <a href="<?php echo e(route('velocity.admin.content.create')); ?>" class="btn btn-lg btn-primary">
                    <?php echo e(__('velocity::app.admin.contents.btn-add-content')); ?>

                </a>
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('velocity.admin.content.index')); ?>"></datagrid-plus>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/content/index.blade.php ENDPATH**/ ?>