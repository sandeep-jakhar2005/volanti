<?php $rateHelper = app('Webkul\Shipping\Helper\Rate'); ?>
<div>
    <?php $__currentLoopData = $rateHelper->collectRates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="shipping-method">
            <input type="radio" name="price"> $<?php echo e(core()->currency($count)); ?>  <span> <?php echo e($key); ?> </span>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<style>
    span {
        margin-left: 10px;
    }
</style><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/index.blade.php ENDPATH**/ ?>