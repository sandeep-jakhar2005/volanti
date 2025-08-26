
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="small-card-container">

        <div class="col-4 product-image-container mr15">
            <div class="product-image" style="background-image: url(<?php echo e($product['product-image']); ?>)"></div>
        </div>

        <div class="col-8 no-padding card-body">
            <div class="no-padding">
                <span class="fs16"><?php echo e($product['productName']); ?></span>

                <span class="fs18 card-current-price fw6">
                    <?php echo e($product['currency-icon']); ?><?php echo e($product['selling-price']); ?>

                </span>

                <div class="star-rating mt10">
                    <span class="rango-star-fill"></span>
                    <span class="rango-star-fill"></span>
                    <span class="rango-star-fill"></span>
                    <span class="rango-star"></span>
                    <span class="rango-star"></span>
                </div>
            </div>

        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/home/helper/product-small-cart-view.blade.php ENDPATH**/ ?>