<?php
    $brandname = app('Webkul\Velocity\Helpers\Helper');
    $topBrandsCollection = $brandname->getBrandsWithCategories();
?>

<?php if(! empty($topBrandsCollection)): ?>
    <div class="top-brands">
        <div class="top-brands-body">
                <?php if($topBrandsCollection): ?>
                    <div class="top-brands-header">
                        <h2><?php echo e(__('velocity::app.shop.general.top-brands')); ?></h2>
                    </div>

                    <ul class="list-group">
                        <?php $__currentLoopData = $topBrandsCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName => $brandsCollection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="row col-12">
                                <label class="mr10"><?php echo e($categoryName); ?> : </label>

                                <span>
                                    <?php $__currentLoopData = $brandsCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandIndex => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($brand); ?>

                                        <?php if($brandIndex + 1 !== sizeof($brandsCollection)): ?>
                                            |
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/layouts/footer/top-brands.blade.php ENDPATH**/ ?>