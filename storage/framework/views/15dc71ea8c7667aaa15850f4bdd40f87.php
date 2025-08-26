<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.checkout.success.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="container">
        <div class="order-success-content row col-12 offset-1">
            <h1 class="row col-12"><?php echo e(__('shop::app.checkout.success.thanks')); ?></h1>

            <p class="row col-12">
                <?php if(auth()->guard('customer')->user()): ?>
                    <?php echo __('shop::app.checkout.success.order-id-info', [
                            'order_id' => '<a href="' . route('shop.customer.orders.view', $order->id) . '">' . $order->increment_id . '</a>'
                        ]); ?>

                <?php else: ?>
                    <?php echo e(__('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id])); ?>

                <?php endif; ?>
            </p>

            <p class="row col-12">
                <?php echo e(__('shop::app.checkout.success.info')); ?>

            </p>

            <?php echo e(view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order])); ?>

                <div class="row col-12 mt15">
                    <span class="mb30 mr10">
                        <a href="<?php echo e(route('shop.home.index')); ?>" class="theme-btn remove-decoration">
                            <?php echo e(__('shop::app.checkout.cart.continue-shopping')); ?>

                        </a>
                    </span>

                    <?php if(auth()->guard('customer')->guest()): ?>
                        <span class="">
                            <a href="<?php echo e(route('shop.customer.register.index')); ?>" class="theme-btn remove-decoration">
                                <?php echo e(__('shop::app.checkout.cart.continue-registration')); ?>

                            </a>
                        </span>
                    <?php endif; ?>
                </div>
            <?php echo e(view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order])); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/checkout/success.blade.php ENDPATH**/ ?>