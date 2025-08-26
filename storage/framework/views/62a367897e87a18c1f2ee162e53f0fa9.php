<?php echo view_render_event('bagisto.shop.products.view.stock.before', ['product' => $product]); ?>


<div class="col-12 availability">
    <?php
        $inStock = $product->haveSufficientQuantity(1);
    ?>

    <label class="<?php echo e($inStock ? 'active' : ''); ?> disable-box-shadow">
        <?php if($inStock): ?>
            <?php echo e(__('shop::app.products.in-stock')); ?>

        <?php else: ?>
            <?php echo e(__('shop::app.products.out-of-stock')); ?>

        <?php endif; ?>
    </label>
</div>

<?php echo view_render_event('bagisto.shop.products.view.stock.after', ['product' => $product]); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/view/stock.blade.php ENDPATH**/ ?>