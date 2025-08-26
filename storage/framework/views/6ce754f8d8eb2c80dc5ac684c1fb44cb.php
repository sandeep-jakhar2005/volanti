<div class="control-group" style="margin-top: 5px;">

    <?php $__currentLoopData = $attribute->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="checkbox" style="margin-top: 5px;">
            <input  type="checkbox" name="<?php echo e($attribute->code); ?>[]" value="<?php echo e($option->id); ?>" <?php echo e(in_array($option->id, explode(',', $product[$attribute->code])) ? 'checked' : ''); ?>>

            <label class="checkbox-view"></label>
            <?php echo e($option->admin_name); ?>

        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/catalog/products/field-types/checkbox.blade.php ENDPATH**/ ?>