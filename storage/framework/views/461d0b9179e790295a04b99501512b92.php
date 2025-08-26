<div class="switch-view-container">
    <?php if(request('view_type')): ?>
        <a href="<?php echo e(route('admin.sales.bookings.index')); ?>" class="icon-container" title="<?php echo e(__('bookingproduct::app.admin.sales.bookings.table-view')); ?>">
            <i class="icon table-icon"></i>
        </a>

        <a  class="icon-container active" title="<?php echo e(__('bookingproduct::app.admin.sales.bookings.calender-view')); ?>">
            <i class="icon calendar-white-icon"></i>
        </a>
    <?php else: ?>
        <a class="icon-container active" title="<?php echo e(__('bookingproduct::app.admin.sales.bookings.table-view')); ?>">
            <i class="icon table-white-icon"></i>
        </a>

        <a href="<?php echo e(route('admin.sales.bookings.index', ['view_type' => 'calendar'])); ?>" class="icon-container" title="<?php echo e(__('bookingproduct::app.admin.sales.bookings.calender-view')); ?>">
            <i class="icon calendar-icon"></i>
        </a>
    <?php endif; ?>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/BookingProduct/src/Providers/../Resources/views/admin/sales/bookings/index/view-swither.blade.php ENDPATH**/ ?>