<?php
    $youMayAlsoLikeIt = $youMayAlsoLikeIts;
?>

 <?php if($youMayAlsoLikeIt->count()): ?>
    <div class="attached-products-wrapper">

        <div class="title">
            
            <span class="border-bottom"></span>
        </div>

        <div class="product-grid-4">

            <?php $__currentLoopData = $youMayAlsoLikeIt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $youMayAlsoLike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php echo $__env->make('shop::products.list.card', ['product' => $youMayAlsoLike], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>
<?php endif; ?> <?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/view/you-may-also-like.blade.php ENDPATH**/ ?>