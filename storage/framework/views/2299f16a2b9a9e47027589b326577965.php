<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.notification.notification-title')); ?>

<?php $__env->stopSection(); ?>

<?php 
    $orderStatus = [
        'all' => trans('admin::app.notification.status.all'),
        'pending' => trans('admin::app.notification.status.pending'),
        'canceled'=> trans('admin::app.notification.status.canceled'),
        'closed' => trans('admin::app.notification.status.closed'),
        'completed'=> trans('admin::app.notification.status.completed'),
        'processing' => trans('admin::app.notification.status.processing') 
    ];

    $orderStatusMessages = [
        'pending' => trans('admin::app.notification.order-status-messages.pending'),
        'canceled'=> trans('admin::app.notification.order-status-messages.canceled'),
        'closed' => trans('admin::app.notification.order-status-messages.closed'),
        'completed'=> trans('admin::app.notification.order-status-messages.completed'),
        'processing' => trans('admin::app.notification.order-status-messages.processing') 
    ];
?>

<?php $__env->startPush('css'); ?>
    <style>
        .sr-only{
            display:none;
        }

        .pagination .page-item {          
            height: 40px !important;
            width: 40px !important;
            margin-right: 5px;
            font-size: 16px;
            display: inline-block;
            color: #3a3a3a;
            vertical-align: middle;
            text-decoration: none;
            text-align: center;
        }

        .page-item .pagination-page-nav .active .page-link {
            color:#fff !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <notification-list  
        url="<?php echo e(route('admin.notification.get_notification')); ?>"
        order-view-url="<?php echo e(\URL::to('/')); ?>/<?php echo e(config('app.admin_url')); ?>/viewed-notifications/"
        pusher-key="<?php echo e(env('PUSHER_APP_KEY')); ?>"
        pusher-cluster="<?php echo e(env('PUSHER_APP_CLUSTER')); ?>"
        title=" <?php echo e(__('admin::app.notification.notification-title')); ?>"
        order-status="<?php echo e(json_encode($orderStatus)); ?>"
        order-status-messages="<?php echo e(json_encode($orderStatusMessages)); ?>"
        no-record-text="<?php echo e(__('admin::app.notification.no-record')); ?>"
        locale-code=<?php echo e(core()->getCurrentLocale()->code); ?>>
    </notification-list>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Providers/../Resources/views/notifications/index.blade.php ENDPATH**/ ?>