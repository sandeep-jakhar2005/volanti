<?php
    request()->query->remove('featured');

    request()->query->add([
        'new'   => 1,
        'order' => 'rand',
        'limit' => request()->get('count')
            ?? core()->getConfigData('catalog.products.homepage.no_of_new_product_homepage'),
    ]);

    $products = app(\Webkul\Product\Repositories\ProductRepository::class)->getAll();
?>

<?php if($products->count()): ?>
    <section class="featured-products">

        <div class="featured-heading">
            <?php echo e(__('shop::app.home.new-products')); ?><br/>

            <span class="featured-seperator" style="color: #d7dfe2;">_____</span>
        </div>

        <div class="product-grid-4">

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFlat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php echo $__env->make('shop::products.list.card', ['product' => $productFlat], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </section>
<?php endif; ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/home/new-products.blade.php ENDPATH**/ ?>