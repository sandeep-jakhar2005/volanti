<div class="booking-info-row">
    <span class="icon bp-slot-icon"></span>
    <span class="title">
        <?php echo e(__('bookingproduct::app.shop.products.slot-duration')); ?> :

        <?php echo e(__('bookingproduct::app.shop.products.slot-duration-in-minutes', ['minutes' => $bookingProduct->table_slot->duration])); ?>

    </span>
</div>

<?php $bookingSlotHelper = app('Webkul\BookingProduct\Helpers\TableSlot'); ?>

<div class="booking-info-row">
    <span class="icon bp-slot-icon"></span>
    <span class="title">
        <?php echo e(__('bookingproduct::app.shop.products.today-availability')); ?>

    </span>

    <span class="value">
    
        <?php echo $bookingSlotHelper->getTodaySlotsHtml($bookingProduct); ?>


    </span>

    <div class="toggle" @click="showDaysAvailability = ! showDaysAvailability">
        <?php echo e(__('bookingproduct::app.shop.products.slots-for-all-days')); ?>


        <i class="icon" :class="[! showDaysAvailability ? 'arrow-down-icon' : 'arrow-up-icon']"></i>
    </div>

    <div class="days-availability" v-show="showDaysAvailability">

        <table>
            <tbody>
                <?php $__currentLoopData = $bookingSlotHelper->getWeekSlotDurations($bookingProduct); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($day['name']); ?></td>

                        <td>
                            <?php if(
                                $day['slots']
                                && count($day['slots'])
                            ): ?>
                                <?php $__currentLoopData = $day['slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($slot['from'] . ' - ' . $slot['to']); ?></br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <span class="text-danger"><?php echo e(__('bookingproduct::app.shop.products.closed')); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>

<?php echo $__env->make('bookingproduct::shop.products.view.booking.slots', [
        'bookingProduct' => $bookingProduct,
        'title' => __('bookingproduct::app.shop.products.book-a-table')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="control-group">
    <label><?php echo e(__('bookingproduct::app.shop.products.special-notes')); ?></label>
    <textarea name="booking[note]" class="control" style="width: 100%"/>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/BookingProduct/src/Resources/views/shop/default/products/view/booking/table.blade.php ENDPATH**/ ?>