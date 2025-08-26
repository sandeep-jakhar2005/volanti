<?php
    $reviews = app('Webkul\Velocity\Helpers\Helper')->getShopRecentReviews(4);
?>

<div class="container-fluid reviews-container">
    <?php if($reviews->isNotEmpty()): ?>
        <card-list-header
            heading="<?php echo e(__('velocity::app.home.customer-reviews')); ?>"
        ></card-list-header>

        <div class="row">
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-12 review-wrapper">
                    <div class="card no-padding">
                        <div class="review-info">
                            <div class="customer-info">
                                <div class="align-vertical-top">
                                    <span class="customer-name fs20 display-inbl">
                                        <?php echo e(strtoupper(substr( $review['name'], 0, 1 ))); ?>

                                    </span>
                                </div>

                                <div>
                                    <h3 class="fs20 fw6 no-margin display-block">
                                        <?php echo e($review['name']); ?>

                                    </h3>

                                    <div class="product-info fs16">
                                        <span><?php echo e(__('velocity::app.products.reviewed')); ?>- <a class="remove-decoration link-color" href="<?php echo e(route('shop.productOrCategory.index', $review->product->url_key)); ?>"><?php echo e($review->product->name); ?></a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="star-ratings fs16">
                                <star-ratings :ratings="<?php echo e($review['rating']); ?>"></star-ratings>
                            </div>

                            <div class="review-description">
                                <p class="review-content fs16"><?php echo e($review['comment']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        (() => {
            $('.carousel-showmanymoveone .item').each(() => {
                var itemToClone = $(this);
                var i;
                for (i = 1; i < 4; i++ ) {
                    itemToClone = itemToClone.next();

                    // wrap around if at end of item collection
                    if (! itemToClone.length) {
                        itemToClone = $(this).siblings(':first');
                    }

                    // grab item, clone, add marker class, add to collection
                    itemToClone.children(':first-child').clone()
                        .addClass("cloneditem-"+(i))
                        .appendTo($(this));
                }
            });

            $(document).on('click', '.rango-arrow-left', () => {
                $('.prev-slider').click();
            });

            $(document).on('click', '.rango-arrow-right', () => {
                $('.next-slider').click();
            });

        })();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/home/customer-reviews.blade.php ENDPATH**/ ?>