<?php $wishListHelper = app('Webkul\Customer\Helpers\Wishlist'); ?>

<?php if(auth()->guard('customer')->check()): ?>
    <?php echo view_render_event('bagisto.shop.products.wishlist.before'); ?>


    <form id="wishlist-<?php echo e($product->id); ?>" action="<?php echo e(route('shop.customer.wishlist.add', $product->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
    </form>

    <a
        <?php if($wishListHelper->getWishlistProduct($product)): ?>
            class="add-to-wishlist already"
            title="<?php echo e(__('shop::app.customer.account.wishlist.remove-wishlist-text')); ?>"
        <?php else: ?>
            class="add-to-wishlist"
            title="<?php echo e(__('shop::app.customer.account.wishlist.add-wishlist-text')); ?>"
        <?php endif; ?>
        id="wishlist-changer"
        style="margin-right: 15px;"
        href="javascript:void(0);"
        onclick="document.getElementById('wishlist-<?php echo e($product->id); ?>').submit();">

        <span class="icon wishlist-icon"></span>

    </a>

    <?php echo view_render_event('bagisto.shop.products.wishlist.after'); ?>

<?php endif; ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/wishlist.blade.php ENDPATH**/ ?>