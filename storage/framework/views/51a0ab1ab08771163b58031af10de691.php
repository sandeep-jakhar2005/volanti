<?php if($payment['method'] == "mpauthorizenet"): ?>
    <?php echo $__env->make('mpauthorizenet::shop.components.add-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('mpauthorizenet::shop.components.saved-cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/MpAuthorizeNet/src/Resources/views/checkout/card.blade.php ENDPATH**/ ?>