<?php if($bookingProduct->default_slot->duration): ?>
    <div class="booking-info-row">
        <span class="icon bp-slot-icon"></span>
        <span class="title">
            <?php echo e(__('bookingproduct::app.shop.products.slot-duration')); ?> :

            <?php echo e(__('bookingproduct::app.shop.products.slot-duration-in-minutes', ['minutes' => $bookingProduct->default_slot->duration])); ?>

        </span>
    </div>
<?php endif; ?>

<?php echo $__env->make('bookingproduct::shop.products.view.booking.slots', ['bookingProduct' => $bookingProduct], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/BookingProduct/src/Resources/views/shop/default/products/view/booking/default.blade.php ENDPATH**/ ?>