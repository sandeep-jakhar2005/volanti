<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.reviews.product-review-page-title')); ?> - <?php echo e($product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <section class="review">

        <div class="review-layouter">
            <?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>

            <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

            <div class="product-info">
                <div class="product-image">
                    <a href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>" title="<?php echo e($product->name); ?>">
                        <img src="<?php echo e($productBaseImage['medium_image_url']); ?>" alt="" />
                    </a>
                </div>

                <div class="product-name mt-20">
                    <a href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>" title="<?php echo e($product->name); ?>">
                        <span><?php echo e($product->name); ?></span>
                    </a>
                </div>

                <div class="product-price mt-10">
                    <span class="pro-price"><?php echo e(core()->currency($product->getTypeInstance()->getMinimalPrice())); ?></span>
                </div>
            </div>

            <div class="review-form">
                <div class="heading mt-10">
                    <span> <?php echo e(__('shop::app.reviews.rating-reviews')); ?> </span>

                    <?php if(
                        core()->getConfigData('catalog.products.review.guest_review')
                        || auth()->guard('customer')->check()
                    ): ?>
                        <a href="<?php echo e(route('shop.reviews.create', $product->url_key)); ?>" class="btn btn-lg btn-primary right">
                            <?php echo e(__('shop::app.products.write-review-btn')); ?>

                        </a>
                    <?php endif; ?>
                </div>

                <div class="ratings-reviews mt-35">
                    <div class="left-side">
                        <span class="rate">
                            <?php echo e($reviewHelper->getAverageRating($product)); ?>

                        </span>

                        <span class="stars">
                            <?php for($i = 1; $i <= 5; $i++): ?>

                              <?php if($i <= round($reviewHelper->getAverageRating($product))): ?>
                                <span class="icon star-icon"></span>
                              <?php else: ?>
                                <span class="icon star-icon-blank"></span>
                              <?php endif; ?>

                            <?php endfor; ?>
                        </span>

                        <div class="total-reviews mt-5">
                            <?php echo e(__('shop::app.reviews.ratingreviews', [
                                'rating' => $reviewHelper->getAverageRating($product),
                                'review' => $reviewHelper->getTotalReviews($product)])); ?>

                        </div>
                    </div>

                    <div class="right-side">

                        <?php $__currentLoopData = $reviewHelper->getPercentageRating($product); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rater 5star">
                                <div class="rate-number" id=<?php echo e($key); ?><?php echo e(__('shop::app.reviews.id-star')); ?>></div>
                                <div class="star-name"><?php echo e(__('shop::app.reviews.star')); ?></div>
                                <div class="line-bar">
                                    <div class="line-value" id="<?php echo e($key); ?>"></div>
                                </div>
                                <div class="percentage">
                                    <span>
                                        <?php echo e(__('shop::app.reviews.percentage', ['percentage' => $count])); ?>

                                    </span>
                                </div>
                            </div>
                            <br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

                <div class="rating-reviews">
                    <div class="reviews">

                        <?php $__currentLoopData = $reviewHelper->getReviews($product)->paginate(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="review">
                                <div class="title">
                                    <?php echo e($review->title); ?>

                                </div>

                                <span class="stars">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= $review->rating): ?>
                                            <span class="icon star-icon"></span>
                                        <?php else: ?>
                                            <span class="icon star-icon-blank"></span>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </span>

                                <div class="message">
                                    <?php echo e($review->comment); ?>

                                </div>

                                <div class="image">
                                    <?php if(count($review->images) > 0): ?>
                                        <?php $__currentLoopData = $review->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img src="<?php echo e($image->url); ?>">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                                <div class="reviewer-details">
                                    <span class="by">
                                        <?php echo e(__('shop::app.products.by', ['name' => $review->name])); ?>,
                                    </span>

                                    <span class="when">
                                        <?php echo e(core()->formatDate($review->created_at, 'F d, Y')); ?>

                                    </span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>

        window.onload = (function() {
            var percentage = {};
            <?php foreach ($reviewHelper->getPercentageRating($product) as $key => $count) { ?>

                percentage = <?php echo "'$count';"; ?>
                id = <?php echo "'$key';"; ?>
                idNumber = id + 'star';

                document.getElementById(id).style.width = percentage + "%";
                document.getElementById(id).style.height = 4 + "px";
                document.getElementById(idNumber).innerHTML = id ;

            <?php } ?>
        })();

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/reviews/index.blade.php ENDPATH**/ ?>