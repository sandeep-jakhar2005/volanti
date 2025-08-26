<input
    type="text"
    name="<?php echo e($attribute->code); ?>"
    value="<?php echo e(old($attribute->code) ?: $product[$attribute->code]); ?>"
    class="control"
    id="<?php echo e($attribute->code); ?>"

    <?php if($attribute->code === 'sku'): ?>
        v-validate="{ required: true, regex: /^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/ }"
    <?php elseif($attribute->code === 'weight'): ?>
        v-validate="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
    <?php else: ?>
        v-validate="'<?php echo e($validations); ?>'"
    <?php endif; ?>

    data-vv-as="&quot;<?php echo e($attribute->admin_name); ?>&quot;"

    <?php echo e(in_array($attribute->code, ['url_key']) ? 'v-slugify' : ''); ?>

    <?php echo e($attribute->code == 'name' && ! $product->url_key  ? 'v-slugify-target=\'url_key\'' : ''); ?>

>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/products/field-types/text.blade.php ENDPATH**/ ?>