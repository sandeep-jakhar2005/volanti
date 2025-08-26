<?php
    $direction = core()->getCurrentLocale()->direction;
?>

<recently-viewed
    title="<?php echo e(__('velocity::app.products.recently-viewed')); ?>"
    no-data-text="<?php echo e(__('velocity::app.products.not-available')); ?>"
    add-class="<?php echo e(isset($addClass) ? $addClass . " $direction": ''); ?>"
    quantity="<?php echo e($quantity ?? null); ?>"
    add-class-wrapper="<?php echo e($addClassWrapper ?? ''); ?>">
</recently-viewed>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/list/recently-viewed.blade.php ENDPATH**/ ?>