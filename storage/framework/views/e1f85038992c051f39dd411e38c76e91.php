<select v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($attribute->code); ?>" name="<?php echo e($attribute->code); ?>[]" data-vv-as="&quot;<?php echo e($attribute->admin_name); ?>&quot;" multiple>

    <?php $__currentLoopData = $attribute->options()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($option->id); ?>" <?php echo e(in_array($option->id, explode(',', $product[$attribute->code])) ? 'selected' : ''); ?>>
            <?php echo e($option->admin_name); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/catalog/products/field-types/multiselect.blade.php ENDPATH**/ ?>