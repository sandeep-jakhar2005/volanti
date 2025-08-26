<?php
    $productBaseImage = product_image()->getProductBaseImage($product);
?>

<div class="col-lg-3 col-md-12">
    <a class="row" href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>">
        <img src="<?php echo e($productBaseImage['medium_image_url']); ?>" class="col-12" alt="" />
    </a>

    <a class="row pt15 unset" href="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>">
        <h2 class="col-12 fw6 link-color"><?php echo e($product->name); ?></h2>
    </a>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/view/small-view.blade.php ENDPATH**/ ?>