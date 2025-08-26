<?php if((bool) core()->getConfigData('general.content.shop.compare_option')): ?>
    <compare-component-with-badge
        is-customer="<?php echo e(auth()->guard('customer')->check() ? 'true' : 'false'); ?>"
        is-text="<?php echo e(! empty($isText) ? 'true' : 'false'); ?>"
        src="<?php echo e(auth()->guard('customer')->check() ? route('velocity.customer.product.compare') : route('velocity.product.compare')); ?>">
    </compare-component-with-badge>
<?php endif; ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/layouts/particals/compare.blade.php ENDPATH**/ ?>