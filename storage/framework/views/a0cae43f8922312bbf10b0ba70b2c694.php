<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-2 lg-card-container">
        <div class="card padding-10">

            
            <?php if($product['actual-price'] > $product['selling-price']): ?>
                <button type="button" class="sale-btn card-sale-btn fw6">Sale</button>
            <?php endif; ?>

            
            <div class="card-product-image-container">
                <div
                    class="background-image-group"
                    style="background-image: url(<?php echo e($product['product-image']); ?> );">
                </div>
            </div>

            <div class="card-bottom-container">

                <div class="card-body no-padding">
                    <span class="fs16 hide-text"><?php echo e($product['productName']); ?></span>
                    <div class="fs18 card-price-container">

                        <span class="card-current-price fw6 mr10">
                            <?php echo e($product['currency-icon']); ?><?php echo e($product['selling-price']); ?>

                        </span>

                        <?php if($product['actual-price'] > $product['selling-price']): ?>
                            <span class="card-actual-price mr10">
                                <?php echo e($product['currency-icon']); ?><?php echo e($product['actual-price']); ?>

                            </span>

                            <span class="card-discount">
                                <?php echo e((($product['actual-price'] - $product['selling-price']) * 100) / $product['actual-price']); ?>%
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if($product['review-count']): ?>
                    <div class="star-rating mt10">
                        <span class="rango-star-fill"></span>
                        <span class="rango-star-fill"></span>
                        <span class="rango-star-fill"></span>
                        <span class="rango-star"></span>
                        <span class="rango-star"></span>
                        <span><?php echo e($product['review-count']); ?> reviews</span>
                    </div>
                <?php else: ?>
                    <div class="mt10">
                        <span class="fs14">Be the first to write a review</span>
                    </div>
                <?php endif; ?>

                <div class="button-row mt10 card-bottom-container">
                    <button class="btn btn-add-to-cart">
                        <span class="rango-cart-1 fs20"></span>
                        <span class="fs14 align-vertical-top fw6">ADD TO CART</span>
                    </button>
                    
                    <span class="rango-heart"></span>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/home/helper/product-large-cart-view.blade.php ENDPATH**/ ?>