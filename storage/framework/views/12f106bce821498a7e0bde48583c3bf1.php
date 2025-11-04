<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('contact_lang::app.contact.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('contact_lang::app.contact.title')); ?></h1>
            </div>
        </div>

        <div class="page-content">
            <?php $contactGrid = app('Webkul\RKREZA\Contact\DataGrids\ContactDataGrid'); ?>

            <?php echo $contactGrid->render(); ?>

        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/RKREZA/Contact/src/Providers/../Resources/views/contact/index.blade.php ENDPATH**/ ?>