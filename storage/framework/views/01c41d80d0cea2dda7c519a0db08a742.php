<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.checkout.success.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <div class="order-success-content" style="min-height: 300px;">
        <h1><?php echo e(__('shop::app.checkout.success.thanks')); ?></h1>

        <p>
            <?php if(auth()->guard('customer')->user()): ?>
                <?php echo __('shop::app.checkout.success.order-id-info', [
                        'order_id' => '<a href="' . route('shop.customer.orders.view', $order->id) . '">' . $order->increment_id . '</a>'
                    ]); ?>

            <?php else: ?>
                <?php echo e(__('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id])); ?>

            <?php endif; ?>
        </p>

        <p><?php echo e(__('shop::app.checkout.success.info')); ?></p>

        <?php echo e(view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order])); ?>


        <div class="misc-controls">
            <a style="display: inline-block" href="<?php echo e(route('shop.home.index')); ?>" class="btn btn-lg btn-primary">
                <?php echo e(__('shop::app.checkout.cart.continue-shopping')); ?>

            </a>
        </div>
        
        <?php echo e(view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order])); ?>

        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/checkout/success.blade.php ENDPATH**/ ?>