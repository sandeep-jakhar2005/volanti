<?php echo view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]); ?>


    <accordian :title="'<?php echo e(__('shop::app.products.short-description')); ?>'" :active="true">
        <div slot="header">
            <h3 class="no-margin display-inbl">
                <?php echo e(__('velocity::app.products.short-description')); ?>

            </h3>

            <i class="rango-arrow"></i>
        </div>

        <div slot="body">
            <div class="full-short-description">
                <?php echo $product->short_description; ?>

            </div>
        </div>
    </accordian>

<?php echo view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/view/short-description.blade.php ENDPATH**/ ?>