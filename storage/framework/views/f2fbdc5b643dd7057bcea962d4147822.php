<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.review.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-detail-wrapper'); ?>
    <div class="reviews-head mb20">
        <span class="account-heading"><?php echo e(__('shop::app.customer.account.review.index.title')); ?></span>

        <?php if(count($reviews) > 1): ?>
            <div class="account-action float-right">
                <form id="deleteAllReviewForm" action="<?php echo e(route('shop.customer.review.delete_all')); ?>" method="post">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                </form>

                <a href="javascript:void(0);" class="theme-btn light unset" onclick="confirm('<?php echo e(__('shop::app.customer.account.review.delete-all.confirmation-message')); ?>') ? document.getElementById('deleteAllReviewForm').submit() : null;">
                    <?php echo e(__('shop::app.customer.account.review.delete-all.title')); ?>

                </a>
            </div>
        <?php endif; ?>
    </div>

    <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]); ?>


    <div class="reviews-container">
        <?php if(! $reviews->isEmpty()): ?>
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row col-12 lg-card-container list-card product-card">
                    <div class="product-image">
                        <?php
                            $image = product_image()->getProductBaseImage($review->product);
                        ?>

                        <a
                            title="<?php echo e($review->product->name); ?>"
                            href="<?php echo e(url()->to('/').'/'.$review->product->url_key); ?>">
                            <img src="<?php echo e($image['small_image_url']); ?>" title="<?php echo e($review->product->name); ?>">
                        </a>
                    </div>

                    <div class="product-information p-2">
                        <div class="d-flex justify-content-between">
                            <div class="product-name">
                                <a
                                    href="<?php echo e(url()->to('/').'/'.$review->product->url_key); ?>"
                                    title="<?php echo e($review->product->name); ?>" class="unset">

                                    <span class="fs16"><?php echo e($review->product->name); ?></span>
                                </a>

                                <star-ratings ratings="<?php echo e($review->rating); ?>"></star-ratings>

                                <h5 class="fw6" v-pre><?php echo e($review->title); ?></h5>

                                <p v-pre><?php echo e($review->comment); ?></p>
                            </div>  

                            <div>
                                <form id="deleteReviewForm<?php echo e($review->id); ?>" action="<?php echo e(route('shop.customer.review.delete', $review->id)); ?>" method="post">
                                    <?php echo method_field('delete'); ?>

                                    <?php echo csrf_field(); ?>
                                </form>

                                <a class="unset" href="javascript:void(0);" onclick="deleteReview('<?php echo e($review->id); ?>')">
                                    <span class="rango-delete fs24"></span>
                                    
                                    <span class="align-vertical-top"><?php echo e(__('shop::app.checkout.cart.remove')); ?></span>
                                </a>
                            </div>                      
                        </div>
                    </div>
                </div>               
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="bottom-toolbar">
                <?php echo e($reviews->links()); ?>

            </div>
        <?php else: ?>
            <div class="fs16">
                <?php echo e(__('customer::app.reviews.empty')); ?>

            </div>
        <?php endif; ?>
    </div>

    <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="load-more-template">
        <div class="col-12 row justify-content-center">
            <button type="button" class="theme-btn light" @click="loadNextPage">Load More</button>
        </div>
    </script>

    <script type="text/javascript">
        (() => {
            Vue.component('load-more-btn', {
                template: '#load-more-template',

                methods: {
                    'loadNextPage': function () {
                        let splitedParamsObject = {};

                        let searchedString = window.location.search;
                        searchedString = searchedString.replace('?', '');

                        let splitedParams = searchedString.split('&');

                        splitedParams.forEach(value => {
                            let splitedValue = value.split('=');
                            splitedParamsObject[splitedValue[0]] = splitedValue[1];
                        });

                        splitedParamsObject[page]
                    }
                }
            });
        })();

        function deleteReview(reviewId) {
            if (! confirm('<?php echo e(__("shop::app.customer.account.review.delete.confirmation-message")); ?>')) {
                return;
            }

            $(`#deleteReviewForm${reviewId}`).submit();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/customers/account/reviews/index.blade.php ENDPATH**/ ?>