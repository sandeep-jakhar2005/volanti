<?php echo view_render_event('bagisto.shop.products.view.product-add.before', ['product' => $product]); ?>


<div class="add-to-buttons">
    <?php echo $__env->make('shop::products.add-to-cart', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(core()->getConfigData('catalog.products.storefront.buy_now_button_display')): ?>
        <?php echo $__env->make('shop::products.buy-now', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                                      
    <?php endif; ?>
</div>

<?php echo view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/view/product-add.blade.php ENDPATH**/ ?>