<?php echo view_render_event('bagisto.shop.products.buy_now.before', ['product' => $product]); ?>


<button type="submit" class="theme-btn text-center buynow" <?php echo e(! $product->isSaleable(1) ? 'disabled' : ''); ?>>
    <?php echo e(($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.buy-now')); ?>

</button>

<?php echo view_render_event('bagisto.shop.products.buy_now.after', ['product' => $product]); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/buy-now.blade.php ENDPATH**/ ?>