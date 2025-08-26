<div class="col-12 lg-card-container list-card product-card row">
    <div class="product-image">
        <?php
            $image = $item->product->getTypeInstance()->getBaseImage($item);
        ?>

        <a
            title="<?php echo e($item->product->name); ?>"
            href="<?php echo e(route('shop.productOrCategory.index', $item->product->url_key)); ?>">

            <img
                src="<?php echo e($image['medium_image_url']); ?>"
                :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" alt="" />

                <div class="quick-view-in-list">
            </div>
        </a>
    </div>

    <div class="product-information">
        <div class="p-2">
            <div class="product-name">
                <a
                    href="<?php echo e(route('shop.productOrCategory.index', $item->product->url_key)); ?>"
                    title="<?php echo e($item->product->name); ?>" class="unset">

                    <span class="fs16"><?php echo e($item->product->name); ?></span>


                    <?php if(isset($item->additional['attributes'])): ?>
                        <div class="item-options">
                            <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <b><?php echo e($attribute['attribute_name']); ?> : </b> <?php echo e($attribute['option_label']); ?>

                                </br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </a>

                <?php if(isset($item->product->additional['attributes'])): ?>
                    <div class="item-options">
                        <?php $__currentLoopData = $item->product->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <b><?php echo e($attribute['attribute_name']); ?> : </b> <?php echo e($attribute['option_label']); ?>

                            </br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="product-price">
                <?php echo $__env->make('shop::products.price', ['product' => $item->product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="cart-wish-wrap mt5">
                <?php if($visibility ?? false): ?>
                    <div class="mb-2">
                        <span class="fs16">
                            <?php echo e(__('shop::app.customer.account.wishlist.visibility')); ?> :

                            <span class="badge <?php echo e($item->shared ? 'badge-success' : 'badge-danger'); ?>">
                                <?php echo e($item->shared ? __('shop::app.customer.account.wishlist.public') : __('shop::app.customer.account.wishlist.private')); ?>

                            </span>
                        </span>
                    </div>
                <?php endif; ?>

                <div>
                    <?php echo $__env->make('shop::products.add-to-cart', [
                        'reloadPage'        => true,
                        'addWishlistClass'  => 'pl10',
                        'product'           => $item->product,
                        'addToCartBtnClass' => 'medium-padding',
                        'showCompare'       => false
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/customers/account/wishlist/wishlist-product.blade.php ENDPATH**/ ?>