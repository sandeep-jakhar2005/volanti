<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.review.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <div class="account-head">
            <span class="back-icon"><a href="<?php echo e(route('shop.customer.profile.index')); ?>"><i class="icon icon-menu-back"></i></a></span>

            <span class="account-heading"><?php echo e(__('shop::app.customer.account.review.index.title')); ?></span>

            <?php if(count($reviews) > 1): ?>
                <div class="account-action">
                    <form id="deleteAllReviewForm" action="<?php echo e(route('shop.customer.review.delete_all')); ?>" method="post">
                        <?php echo method_field('delete'); ?>

                        <?php echo csrf_field(); ?>
                    </form>

                    <a href="javascript:void(0);" onclick="confirm('<?php echo e(__('shop::app.customer.account.review.delete-all.confirmation-message')); ?>') ? document.getElementById('deleteAllReviewForm').submit() : null;">
                        <?php echo e(__('shop::app.customer.account.review.delete-all.title')); ?>

                    </a>
                </div>
            <?php endif; ?>

            <span></span>
            
            <div class="horizontal-rule"></div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]); ?>


        <div class="account-items-list">
            <?php if(! $reviews->isEmpty()): ?>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="account-item-card mt-15 mb-15">
                        <div class="media-info">
                            <?php $image = product_image()->getProductBaseImage($review->product); ?>

                            <a href="<?php echo e(route('shop.productOrCategory.index', $review->product->url_key)); ?>" title="<?php echo e($review->product->name); ?>">
                                <img class="media" src="<?php echo e($image['small_image_url']); ?>" alt=""/>
                            </a>

                            <div class="info">
                                <div class="product-name">
                                    <a href="<?php echo e(route('shop.productOrCategory.index', $review->product->url_key)); ?>" title="<?php echo e($review->product->name); ?>">
                                        <?php echo e($review->product->name); ?>

                                    </a>
                                </div>

                                <div class="stars mt-10">
                                    <?php for($i=0 ; $i < $review->rating ; $i++): ?>
                                        <span class="icon star-icon"></span>
                                    <?php endfor; ?>
                                </div>

                                <div class="mt-10" v-pre>
                                    <?php echo e($review->comment); ?>

                                </div>
                            </div>
                        </div>

                        <div class="operations">
                            <form id="deleteReviewForm<?php echo e($review->id); ?>" action="<?php echo e(route('shop.customer.review.delete', $review->id)); ?>" method="post">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                            </form>

                            <a class="mb-50" href="javascript:void(0);" onclick="deleteReview('<?php echo e($review->id); ?>')">
                                <span class="icon trash-icon"></span>
                            </a>
                        </div>
                    </div>

                    <div class="horizontal-rule mb-10 mt-10"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="bottom-toolbar">
                    <?php echo e($reviews->links()); ?>

                </div>
            <?php else: ?>
                <div class="empty mt-15">
                    <?php echo e(__('customer::app.reviews.empty')); ?>

                </div>
            <?php endif; ?>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function deleteReview(reviewId) {
            if (! confirm('<?php echo e(__("shop::app.customer.account.review.delete.confirmation-message")); ?>')) {
                return;
            }

            $(`#deleteReviewForm${reviewId}`).submit();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/reviews/index.blade.php ENDPATH**/ ?>