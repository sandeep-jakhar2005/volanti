<?php echo view_render_event('bagisto.shop.products.add_to.before', ['product' => $product]); ?>


<div class="cart-fav-seg">
    <?php echo $__env->make('shop::products.add-to-cart', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('shop::products.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo view_render_event('bagisto.shop.products.add_to.after', ['product' => $product]); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/add-to.blade.php ENDPATH**/ ?>