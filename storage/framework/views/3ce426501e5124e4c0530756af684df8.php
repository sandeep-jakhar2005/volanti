<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.catalog.attributes.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.catalog.attributes.title')); ?></h1>
            </div>

            <div class="page-action">
                <?php if(bouncer()->hasPermission('catalog.attributes.create')): ?>
                    <a
                        href="<?php echo e(route('admin.catalog.attributes.create')); ?>"
                        class="btn btn-lg btn-primary"
                    >
                        <?php echo e(__('admin::app.catalog.attributes.add-title')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.attributes.list.before'); ?>


        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.catalog.attributes.index')); ?>"></datagrid-plus>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.attributes.list.after'); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/catalog/attributes/index.blade.php ENDPATH**/ ?>