<div class="account-item-card mt-15 mb-15">
    <div class="media-info">
        <?php
            $image = $item->product->getTypeInstance()->getBaseImage($item);
        ?>

        <a href="<?php echo e(route('shop.productOrCategory.index', $item->product->url_key)); ?>" title="<?php echo e($item->product->name); ?>">
            <img class="media" src="<?php echo e($image['small_image_url']); ?>" alt="" />
        </a>

        <div class="info">
            <div class="product-name">
                <?php echo e($item->product->name); ?>


                <?php if(isset($item->additional['attributes'])): ?>
                    <div class="item-options">
                        <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <b><?php echo e($attribute['attribute_name']); ?> : </b> <?php echo e($attribute['option_label']); ?>

                            </br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($visibility ?? false): ?>
                <div class="mb-2">
                    <span class="fs16">
                        <?php echo e(__('shop::app.customer.account.wishlist.visibility')); ?> :

                        <span class="badge badge-sm <?php echo e($item->shared ? 'badge-success' : 'badge-danger'); ?>">
                            <?php echo e($item->shared ? __('shop::app.customer.account.wishlist.public') : __('shop::app.customer.account.wishlist.private')); ?>

                        </span>
                    </span>
                </div>
            <?php endif; ?>

            <span class="stars" style="display: inline">
                <?php for($i = 1; $i <= $reviewHelper->getAverageRating($item->product); $i++): ?>
                    <span class="icon star-icon"></span>
                <?php endfor; ?>
            </span>
        </div>
    </div>

    <div class="operations">
        <form id="wishlist-<?php echo e($item->id); ?>" action="<?php echo e(route('shop.customer.wishlist.remove', $item->id)); ?>" method="POST">
            <?php echo method_field('DELETE'); ?>

            <?php echo csrf_field(); ?>
        </form>

        <?php if(auth()->guard('customer')->check()): ?>
            <a
                class="mb-50"
                href="javascript:void(0);"
                onclick="document.getElementById('wishlist-<?php echo e($item->id); ?>').submit();">
                <span class="icon trash-icon"></span>
            </a>
        <?php endif; ?>

        <a href="<?php echo e(route('shop.customer.wishlist.move', $item->id)); ?>" class="btn btn-primary btn-md">
            <?php echo e(__('shop::app.customer.account.wishlist.move-to-cart')); ?>

        </a>
    </div>
</div>

<div class="horizontal-rule mb-10 mt-10"></div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/wishlist/wishlist-product.blade.php ENDPATH**/ ?>