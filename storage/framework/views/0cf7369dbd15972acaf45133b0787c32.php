<?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>

<?php echo view_render_event('bagisto.shop.products.review.before', ['product' => $product]); ?>


<?php if($total = $reviewHelper->getTotalReviews($product)): ?>
    <div class="product-ratings mb-10">
        <span class="stars">
            <?php for($i = 1; $i <= 5; $i++): ?>
                <?php if($i <= round($reviewHelper->getAverageRating($product))): ?>
                    <span class="icon star-icon"></span>
                <?php else: ?>
                    <span class="icon star-icon-blank"></span>
                <?php endif; ?>
            <?php endfor; ?>
        </span>

        <div class="total-reviews">
            <?php echo e(__('shop::app.products.total-rating', [
                        'total_rating' => $reviewHelper->getAverageRating($product),
                        'total_reviews' => $total,
                ])); ?>

        </div>
    </div>
<?php endif; ?>

<?php echo view_render_event('bagisto.shop.products.review.after', ['product' => $product]); ?>

<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/review.blade.php ENDPATH**/ ?>