<?php echo view_render_event('bagisto.shop.products.add_to_cart.before', ['product' => $product]); ?>


<button
    type="submit"
    class="btn btn-lg btn-primary addtocart"
    <?php echo e(! $product->isSaleable() ? 'disabled' : ''); ?>

>
    <?php echo e($product->type == 'booking' ? __('shop::app.products.book-now') : __('shop::app.products.add-to-cart')); ?>

</button>

<?php echo view_render_event('bagisto.shop.products.add_to_cart.after', ['product' => $product]); ?>

<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/add-to-cart.blade.php ENDPATH**/ ?>