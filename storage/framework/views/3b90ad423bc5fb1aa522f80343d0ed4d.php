<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.tax-rates.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        @media only screen and (max-width: 450px){
            .content-container .content .page-header .page-title{
                width: 100% !important;
            }

            .content-container .content .page-header .page-action {
                margin-top: 0px !important;
                float: left;
            }

            .export-import {
                margin-top: 0px !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.tax-rates.title')); ?></h1>
            </div>

            <div class="page-action">
                <div class="export-import" @click="showModal('uploadDataGrid')" style="margin-right: 20px;">
                    <i class="import-icon"></i>

                    <span>
                        <?php echo e(__('admin::app.export.import')); ?>

                    </span>
                </div>

                <div class="export-import" @click="showModal('downloadDataGrid')">
                    <i class="export-icon"></i>

                    <span>
                        <?php echo e(__('admin::app.export.export')); ?>

                    </span>
                </div>
                <?php if(bouncer()->hasPermission('settings.taxes.tax-rates.create')): ?>
                    <a href="<?php echo e(route('admin.tax_rates.create')); ?>" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.tax-rates.add-title')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.tax_rates.index')); ?>"></datagrid-plus>
        </div>
    </div>

    <modal id="downloadDataGrid" :is-open="modalIds.downloadDataGrid">
        <h3 slot="header"><?php echo e(__('admin::app.export.download')); ?></h3>

        <div slot="body">
            <export-form></export-form>
        </div>
    </modal>

    <modal id="uploadDataGrid" :is-open="modalIds.uploadDataGrid">
        <h3 slot="header"><?php echo e(__('admin::app.export.upload')); ?></h3>

        <div slot="body">
            <form method="POST" action="<?php echo e(route('admin.tax_rates.import')); ?>" enctype="multipart/form-data" @submit.prevent="onSubmit">
                <?php echo csrf_field(); ?>

                <div class="control-group" :class="[errors.has('file') ? 'has-error' : '']">
                    <label for="file" class="required"><?php echo e(__('admin::app.export.file')); ?></label>

                    <input v-validate="'required'" type="file" class="control" id="file" name="file" data-vv-as="&quot;<?php echo e(__('admin::app.export.file')); ?>&quot;" value="<?php echo e(old('file')); ?>"/ style="padding-top: 5px">

                    <span><?php echo e(__('admin::app.export.allowed-type')); ?></span>

                    <span><b><?php echo e(__('admin::app.export.file-type')); ?></b></span>

                    <span class="control-error" v-if="errors.has('file')">{{ errors.first('file') }}</span>
                </div>

                <button type="submit" class="btn btn-lg btn-primary">
                    <?php echo e(__('admin::app.export.import')); ?>

                </button>
            </form>
        </div>
    </modal>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('admin::export.export', ['gridName' => app('Webkul\Admin\DataGrids\TaxRateDataGrid')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/tax/tax-rates/index.blade.php ENDPATH**/ ?>