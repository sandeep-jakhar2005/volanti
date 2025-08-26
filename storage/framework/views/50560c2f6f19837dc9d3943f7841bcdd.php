<?php if($product->type == 'grouped'): ?>
    <?php echo view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]); ?>


    <div class="col-12 grouped-product-container">
        <?php
            $groupedProducts = $product->grouped_products()->orderBy('sort_order')->get();
        ?>

        <?php if($groupedProducts->count()): ?>
            <div class="grouped-product-list">
                <ul type="none">
                    <li>
                        <span><?php echo e(__('shop::app.products.name')); ?></span>
                        <span><?php echo e(__('shop::app.products.qty')); ?></span>
                    </li>
                    <?php $__currentLoopData = $groupedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($groupedProduct->associated_product->getTypeInstance()->isSaleable()): ?>
                            <li>
                                <span class="name">
                                    <?php echo e($groupedProduct->associated_product->name); ?>


                                    <?php echo $__env->make('shop::products.price', ['product' => $groupedProduct->associated_product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </span>

                                <span class="qty">
                                    <quantity-changer
                                        :control-name="'qty[<?php echo e($groupedProduct->associated_product_id); ?>]'"
                                        :validations="'required|numeric|min_value:0'"
                                        quantity="<?php echo e($groupedProduct->qty); ?>"
                                        quantity-text="<?php echo e(__('shop::app.products.quantity')); ?>"
                                        min-quantity="0">
                                    </quantity-changer>
                                </span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <?php echo view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]); ?>

<?php endif; ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/view/grouped-products.blade.php ENDPATH**/ ?>