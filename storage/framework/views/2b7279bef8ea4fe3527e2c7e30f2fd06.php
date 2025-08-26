<?php if((bool) core()->getConfigData('general.content.shop.wishlist_option')): ?>
    <wishlist-component-with-badge
        is-customer="<?php echo e(auth()->guard('customer')->check() ? 'true' : 'false'); ?>"
        is-text="<?php echo e(isset($isText) && $isText ? 'true' : 'false'); ?>"
        src="<?php echo e(route('shop.customer.wishlist.index')); ?>">
    </wishlist-component-with-badge>

<?php endif; ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/layouts/particals/wishlist.blade.php ENDPATH**/ ?>