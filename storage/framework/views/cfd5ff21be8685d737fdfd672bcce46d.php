<?php
    $channel = core()->getCurrentChannel();

    $homeSEO = $channel->home_seo;

    if (isset($homeSEO)) {
        $homeSEO = json_decode($channel->home_seo);

        $metaTitle = $homeSEO->meta_title;

        $metaDescription = $homeSEO->meta_description;

        $metaKeywords = $homeSEO->meta_keywords;
    }
?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(isset($metaTitle) ? $metaTitle : ""); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>

    <?php if(isset($homeSEO)): ?>
        <?php if(isset($metaTitle)): ?>
            <meta name="title" content="<?php echo e($metaTitle); ?>" />
        <?php endif; ?>

        <?php if(isset($metaDescription)): ?>
            <meta name="description" content="<?php echo e($metaDescription); ?>" />
        <?php endif; ?>

        <?php if(isset($metaKeywords)): ?>
            <meta name="keywords" content="<?php echo e($metaKeywords); ?>" />
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <?php echo view_render_event('bagisto.shop.home.content.before'); ?>


    <?php if(! is_null($channel->home_page_content)): ?>
        <?php echo Blade::render($channel->home_page_content); ?>

    <?php else: ?>
        <?php echo $__env->make('shop::home.slider', ['sliderData' => $sliderData], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('shop::home.featured-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('shop::home.new-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo e(view_render_event('bagisto.shop.home.content.after')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/home/index.blade.php ENDPATH**/ ?>