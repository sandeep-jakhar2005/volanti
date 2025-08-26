<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.transactions.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.sales.transactions.title')); ?></h1>
            </div>

            <div class="page-action">
                <div class="export-import" @click="showModal('downloadDataGrid')">
                    <i class="export-icon"></i>

                    <span>
                        <?php echo e(__('admin::app.export.export')); ?>

                    </span>
                </div>

                <a href="<?php echo e(route('admin.sales.transactions.create')); ?>" class="btn btn-lg btn-primary"><?php echo e(__('admin::app.sales.transactions.create-title')); ?></a>
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.sales.transactions.index')); ?>"></datagrid-plus>
        </div>
    </div>

    <modal id="downloadDataGrid" :is-open="modalIds.downloadDataGrid">
        <h3 slot="header"><?php echo e(__('admin::app.export.download')); ?></h3>

        <div slot="body">
            <export-form></export-form>
        </div>
    </modal>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('admin::export.export', ['gridName' => app('Webkul\Admin\DataGrids\OrderTransactionsDataGrid')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/ACME/paymentProfile/src/Resources/views/admin/sales/transactions/index.blade.php ENDPATH**/ ?>