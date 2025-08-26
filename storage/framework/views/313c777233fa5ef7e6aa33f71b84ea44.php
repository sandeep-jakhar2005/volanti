<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.review.view.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <div class="account-head">
            <span class="account-heading">Reviews</span>
            <div class="horizontal-rule"></div>
        </div>

        <div class="account-items-list">
            <?php if(count($reviews)): ?>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="account-item-card mt-15 mb-15">
                        <div class="media-info">
                            <?php $image = product_image()->getGalleryImages($review->product); ?>
                            <img class="media" src="<?php echo e($image[0]['small_image_url']); ?>" alt="" />

                            <div class="info mt-20">
                                <div class="product-name"><?php echo e($review->product->name); ?></div>

                                <div>
                                    <?php for($i=0;$i<$review->rating;$i++): ?>
                                        <span class="icon star-icon"></span>
                                    <?php endfor; ?>
                                </div>

                                <div v-pre>
                                    <?php echo e($review->comment); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="horizontal-rule mb-10 mt-10"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="empty">
                    <?php echo e(__('customer::app.reviews.empty')); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/reviews/reviews.blade.php ENDPATH**/ ?>