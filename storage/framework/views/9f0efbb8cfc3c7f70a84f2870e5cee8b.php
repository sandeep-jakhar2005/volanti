<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>

<div class="<?php echo e($toolbarHelper->isModeActive('grid') ? 'cart-wish-wrap' : 'default-wrap'); ?>">
    <form action="<?php echo e(route('shop.cart.add', $product->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
        <input type="hidden" name="quantity" value="1">
        <button class="btn btn-lg btn-primary addtocart" <?php echo e($product->isSaleable() ? '' : 'disabled'); ?>><?php echo e(($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.add-to-cart')); ?></button>
    </form>

    <?php if((bool) core()->getConfigData('general.content.shop.wishlist_option')): ?>
        <?php echo $__env->make('shop::products.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if((bool) core()->getConfigData('general.content.shop.compare_option')): ?>
        <?php echo $__env->make('shop::products.compare', [
            'productId' => $product->id
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/add-buttons.blade.php ENDPATH**/ ?>