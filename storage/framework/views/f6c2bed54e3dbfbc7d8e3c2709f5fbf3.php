<?php if($product->type == 'booking'): ?>

    <?php if($bookingProduct = app('\Webkul\BookingProduct\Repositories\BookingProductRepository')->findOneByField('product_id', $product->id)): ?>

        <?php $__env->startPush('css'); ?>
            <link rel="stylesheet" href="<?php echo e(bagisto_asset('css/velocity-booking.css')); ?>">
        <?php $__env->stopPush(); ?>

        <accordian :title="'<?php echo e(__('bookingproduct::app.shop.products.booking-information')); ?>'" :active="true">
            <div slot="header">
                <h3 class="no-margin display-inbl">
                    <?php echo e(__('bookingproduct::app.shop.products.booking-information')); ?>

                </h3>
                <i class="rango-arrow"></i>
            </div>

            <div slot="body">
                <booking-information></booking-information>        
            </div>
        </accordian>

        <?php $__env->startPush('scripts'); ?>

            <script type="text/x-template" id="booking-information-template">
                <div class="booking-information">

                    <?php if($bookingProduct->location != ''): ?>
                        <div class="booking-info-row">
                            <span class="icon bp-location-icon"></span>
                            <span class="title"><?php echo e(__('bookingproduct::app.shop.products.location')); ?></span>
                            <span class="value"><?php echo e($bookingProduct->location); ?></span>
                            <a href="https://maps.google.com/maps?q=<?php echo e($bookingProduct->location); ?>" target="_blank">View on Map</a>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->make('bookingproduct::shop.products.view.booking.' . $bookingProduct->type, ['bookingProduct' => $bookingProduct], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </script>

            <script>
                Vue.component('booking-information', {
                    template: '#booking-information-template',

                    inject: ['$validator'],

                    data: function() {
                        return {
                            showDaysAvailability: false
                        }
                    }
                });
            </script>
        
        <?php $__env->stopPush(); ?>

    <?php endif; ?>

<?php endif; ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/BookingProduct/src/Resources/views/shop/velocity/products/view/booking.blade.php ENDPATH**/ ?>