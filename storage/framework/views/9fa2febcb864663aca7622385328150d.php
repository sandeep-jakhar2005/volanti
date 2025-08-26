<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.reviews.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.customer.review.update', $review->id)); ?>">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.customer.review.index')); ?>'"></i>

                        <?php echo e(__('admin::app.customers.reviews.edit-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.account.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">

                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <input name="_method" type="hidden" value="PUT">

                    <accordian title="<?php echo e(__('admin::app.account.general')); ?>" :active="true">
                        <div slot="body">

                            <div class="control-group">
                                <label for="name" > <?php echo e(__('admin::app.customers.reviews.title')); ?></label>
                                <input type="text"  class="control" id="name" name="name" value="<?php echo e(old('name') ?: $review->title); ?>" disabled/>
                            </div>

                            <div class="control-group">
                                <label for="name" ><?php echo e(__('admin::app.customers.reviews.rating')); ?></label>
                                <div class="stars">
                                    <?php for($i = 1; $i <= $review->rating; $i++): ?>
                                        <span class="icon star-icon"></span>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="name" class="required"><?php echo e(__('admin::app.customers.reviews.status')); ?></label>
                                <select  class="control" name="status">
                                    <option value="approved" <?php echo e($review->status == "approved" ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.customers.reviews.approved')); ?>

                                    </option>

                                    <option value="disapproved" <?php echo e($review->status == "disapproved" ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.customers.reviews.disapproved')); ?>

                                    </option>

                                    <option value="pending" <?php echo e($review->status == "pending" ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.customers.reviews.pending')); ?>

                                    </option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="name"><?php echo e(__('admin::app.customers.reviews.comment')); ?></label>
                                <textarea class="control" disabled v-pre><?php echo e($review->comment); ?></textarea>
                            </div>

                            <?php if(count($review->images) > 0): ?>
                                <div class="control-group">
                                    <label for="images" ><?php echo e(__('admin::app.catalog.categories.image')); ?></label>

                                    <div class="image-wrapper">
                                        <?php $__currentLoopData = $review->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="image-item">
                                                <img class="preview" src="<?php echo e($image->url); ?>">
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </accordian>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/customers/reviews/edit.blade.php ENDPATH**/ ?>