<div class="control-group">
    <label><?php echo e(__('velocity::app.admin.meta-data.category-logo')); ?></label>

    <?php if(! empty($category->category_icon_url)): ?>
        <image-wrapper
            :multiple="false"
            input-name="category_icon_path"
            images="<?php echo e($category->category_icon_url); ?>"
            button-label="<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>">
        </image-wrapper>
    <?php else: ?>
        <image-wrapper
            :multiple="false"
            input-name="category_icon_path"
            button-label="<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>">
        </image-wrapper>
    <?php endif; ?>

    <span class="control-info"><?php echo e(__('admin::app.catalog.products.image-drop')); ?></span>

    <span class="control-info mt-10"><?php echo e(__('admin::app.catalog.categories.image-size-logo')); ?></span>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/catelog/categories/category-icon.blade.php ENDPATH**/ ?>