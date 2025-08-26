<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.reviews.add-review-page-title')); ?> - <?php echo e($product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <section class="review">

        <div class="review-layouter mb-20">
            <div class="product-info">

                <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

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

                <?php echo $__env->make('shop::products.price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

            <div class="review-form">
                <form method="POST" action="<?php echo e(route('shop.reviews.store', $product->id )); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="heading mt-10 mb-25">
                        <span><?php echo e(__('shop::app.reviews.write-review')); ?></span>
                    </div>

                    <div class="control-group" :class="[errors.has('rating') ? 'has-error' : '']">
                        <label for="title" class="required">
                            <?php echo e(__('admin::app.customers.reviews.rating')); ?>

                        </label>

                        <div class="stars">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <span class="star star-<?php echo e($i); ?>" for="star-<?php echo e($i); ?>" onclick="calculateRating(id)" id="<?php echo e($i); ?>"></span>
                            <?php endfor; ?>
                        </div>

                        <input type="hidden" id="rating" name="rating" v-validate="'required'">

                        <div class="control-error" v-if="errors.has('rating')">{{ errors.first('rating') }}</div>
                    </div>

                    <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                        <label for="title" class="required">
                            <?php echo e(__('shop::app.reviews.title')); ?>

                        </label>
                        <input  type="text" class="control" name="title" v-validate="'required'" value="<?php echo e(old('title')); ?>">
                        <span class="control-error" v-if="errors.has('title')">{{ errors.first('title') }}</span>
                    </div>

                    <?php if(
                        core()->getConfigData('catalog.products.review.guest_review')
                        && ! auth()->guard('customer')->user()
                    ): ?>
                        <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                            <label for="title" class="required">
                                <?php echo e(__('shop::app.reviews.name')); ?>

                            </label>
                            <input  type="text" class="control" name="name" v-validate="'required'" value="<?php echo e(old('name')); ?>">
                            <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                        </div>
                    <?php endif; ?>

                    <div class="control-group" :class="[errors.has('comment') ? 'has-error' : '']">
                        <label for="comment" class="required">
                            <?php echo e(__('admin::app.customers.reviews.comment')); ?>

                        </label>
                        <textarea type="text" class="control" name="comment" v-validate="'required'" value="<?php echo e(old('comment')); ?>">
                        </textarea>
                        <span class="control-error" v-if="errors.has('comment')">{{ errors.first('comment') }}</span>
                    </div>

                    <div class="control-group <?php echo $errors->has('images.*') ? 'has-error' : ''; ?>">
                        <label><?php echo e(__('admin::app.catalog.categories.image')); ?></label>

                        <image-wrapper></image-wrapper>

                        <span class="control-error" v-if="<?php echo $errors->has('images.*'); ?>">
                            <?php $count=1 ?>
                            <?php $__currentLoopData = $errors->get('images.*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo str_replace($key, 'Image'.$count, $message[0]); $count++ ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('shop::app.reviews.submit')); ?>

                    </button>

                </form>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script>

        function calculateRating(id) {
            var a = document.getElementById(id);
            document.getElementById("rating").value = id;

            for (let i=1 ; i <= 5 ; i++) {
                if (id >= i) {
                    document.getElementById(i).style.color="#242424";
                } else {
                    document.getElementById(i).style.color="#d4d4d4";
                }
            }
        }

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/reviews/create.blade.php ENDPATH**/ ?>