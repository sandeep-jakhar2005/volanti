<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.reviews.product-review-page-title')); ?>

<?php $__env->stopSection(); ?>

<?php
    $ratings = [
        '', '', '', ''
    ];

    $ratings = [
        10, 30, 20, 15, 25
    ];

    $totalReviews = 25;
    $totalRatings = array_sum($ratings);

?>

<?php $__env->startPush('css'); ?>
    <style>
        .reviews {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="container">
        <div class="row review-page-container">
            <?php echo $__env->make('shop::products.view.small-view', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-lg-7 col-md-12 fs16">
                <h2 class="full-width mb30">Rating and Reviews</h2>

                <?php echo $__env->make('shop::products.view.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/reviews/index.blade.php ENDPATH**/ ?>