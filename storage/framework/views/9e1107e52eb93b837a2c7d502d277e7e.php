<?php echo view_render_event('bagisto.shop.products.buy_now.before', ['product' => $product]); ?>


<button
    type="submit"
    class="btn btn-lg btn-primary buynow"
    <?php echo e(! $product->isSaleable(1) ? 'disabled' : ''); ?>

>
    <?php echo e(__('shop::app.products.buy-now')); ?>

</button>

<?php echo view_render_event('bagisto.shop.products.buy_now.after', ['product' => $product]); ?>

<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/buy-now.blade.php ENDPATH**/ ?>