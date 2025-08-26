<datetime>
    <input
        type="text"
        name="<?php echo e($attribute->code); ?>"
        value="<?php echo e(old($attribute->code) ?: $product[$attribute->code]); ?>"
        class="control"
        v-validate="'<?php echo e($attribute->is_required ? 'required' : ''); ?>'"
        data-vv-as="&quot;<?php echo e($attribute->admin_name); ?>&quot;"
    >
</datetime>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/catalog/products/field-types/datetime.blade.php ENDPATH**/ ?>