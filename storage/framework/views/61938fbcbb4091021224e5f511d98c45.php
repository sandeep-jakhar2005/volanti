<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('bookingproduct::app.admin.sales.bookings.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('themes/default/assets/css/admin-booking.css')); ?>">

    <style>
        .grid-container .datagrid-filters .filter-right {
            grid-template-columns: auto auto auto;
        }
        
        @media only screen and (max-width: 768px) {
            .vuecal__no-event {
                padding-top: 0rem !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('themes/default/assets/js/admin-booking.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('bookingproduct::app.admin.sales.bookings.title')); ?></h1>
            </div>
        </div>

        <div class="page-content">

            <?php
                $viewType = request()->view_type ?? "table";
            ?>

            <?php if($viewType == "table"): ?>
            
                <datagrid-plus src="<?php echo e(route('admin.sales.bookings.get')); ?>">
                    <template v-slot:extra-filters>
                        <?php echo $__env->make('bookingproduct::admin.sales.bookings.index.view-swither', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </template>
                </datagrid-plus>

            <?php else: ?>

                <?php echo $__env->make('bookingproduct::admin.sales.bookings.index.calendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/BookingProduct/src/Providers/../Resources/views/admin/sales/bookings/index.blade.php ENDPATH**/ ?>