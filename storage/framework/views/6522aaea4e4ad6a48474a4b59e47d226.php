<?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>
<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>

<?php
    $list = $toolbarHelper->getCurrentMode() == 'list'
        ? true
        : false;

    $productBaseImage = product_image()->getProductBaseImage($product);

    $totalReviews = $reviewHelper->getTotalReviews($product);

    $avgRatings = ceil($reviewHelper->getAverageRating($product));
?>

<?php echo view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]); ?>

    <?php if(! empty($list)): ?>
        <div class="col-12 lg-card-container list-card product-card row">
            <div class="product-image">
                <a
                    title="<?php echo e($product->name); ?>"
                    href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>">
                    <img
                        src="<?php echo e($productBaseImage['medium_image_url']); ?>"
                        :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" alt="" />

                    <div class="quick-view-in-list">
                        <product-quick-view-btn :quick-view-details="<?php echo e(json_encode($velocityHelper->formatProduct($product))); ?>"></product-quick-view-btn>
                    </div>
                </a>
            </div>

            <div class="product-information">
                <div>
                    <div class="product-name">
                        <a
                            href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                            title="<?php echo e($product->name); ?>" class="unset">

                            <span class="fs16"><?php echo e($product->name); ?></span>
                        </a>

                        <?php if(! empty($additionalAttributes)): ?>
                            <?php if(isset($item->additional['attributes'])): ?>
                                <div class="item-options">

                                    <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="product-price">
                        <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if( $totalReviews ): ?>
                        <div class="product-rating">
                            <star-ratings ratings="<?php echo e($avgRatings); ?>"></star-ratings>

                            <span><?php echo e($totalReviews); ?> Ratings</span>
                        </div>
                    <?php endif; ?>

                    <div class="cart-wish-wrap mt5">
                        <?php echo $__env->make('shop::products.add-to-cart', [
                            'addWishlistClass'  => 'pl10',
                            'product'           => $product,
                            'addToCartBtnClass' => 'medium-padding',
                            'showCompare'       => (bool) core()->getConfigData('general.content.shop.compare_option'),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card grid-card product-card-new">
            <a
                href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                title="<?php echo e($product->name); ?>"
                class="<?php echo e($cardClass ?? 'product-image-container'); ?>">

                <img
                    loading="lazy"
                    class="card-img-top"
                    alt="<?php echo e($product->name); ?>"
                    src="<?php echo e($productBaseImage['large_image_url']); ?>"
                    :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />

                    <product-quick-view-btn :quick-view-details="<?php echo e(json_encode($velocityHelper->formatProduct($product))); ?>"></product-quick-view-btn>
            </a>


          
            <?php if(! $product->getTypeInstance()->haveDiscount() && $product->new): ?>
                <div class="sticker new">
                    <?php echo e(__('shop::app.products.new')); ?>

                </div>
            <?php endif; ?>

            <div class="card-body">
                <div class="product-name col-12 no-padding">
                    <a
                        href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>"
                        title="<?php echo e($product->name); ?>"
                        class="unset">

                 

                        <span class="fs16 card-title"><?php echo e($product->name); ?></span>

                        <?php if(! empty($additionalAttributes)): ?>
                            <?php if(isset($item->additional['attributes'])): ?>
                                <div class="item-options">

                                    <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>
                </div>

                <div class="product-price fs16">
                    <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <?php if($totalReviews): ?>
                    <div class="product-rating col-12 no-padding card-text">
                        <star-ratings ratings="<?php echo e($avgRatings); ?>"></star-ratings>
                        <span class="align-top card-text">
                            <?php echo e(__('velocity::app.products.ratings', ['totalRatings' => $totalReviews ])); ?>

                        </span>
                    </div>
                <?php else: ?>
                    <div class="product-rating col-12 no-padding">
                        <span class="fs14"><?php echo e(__('velocity::app.products.be-first-review')); ?></span>
                    </div>
                    <div class="single-catagory-page-plus-icon-img">
                    <a href="#"><img src=" <?php echo e(asset('themes/velocity/assets/images/plus.png')); ?>" class=""></a>
                     </div>
                    
                <?php endif; ?>

                <div class="cart-wish-wrap no-padding ml0">
                    <?php echo $__env->make('shop::products.add-to-cart', [
                        'product'           => $product,
                        'btnText'           => $btnText ?? null,
                        'moveToCart'        => $moveToCart ?? null,
                        'wishlistMoveRoute' => $wishlistMoveRoute ?? null,
                        'reloadPage'        => $reloadPage ?? null,
                        'addToCartForm'     => $addToCartForm ?? false,
                        'addToCartBtnClass' => $addToCartBtnClass ?? '',
                        'showCompare'       => (bool) core()->getConfigData('general.content.shop.compare_option'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php echo view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]); ?>

<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/list/card.blade.php ENDPATH**/ ?>