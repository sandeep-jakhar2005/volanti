<?php if(count($sliderData)): ?>
    <section class="slider-block">
        <image-slider :slides='<?php echo json_encode($sliderData, 15, 512) ?>' public_path="<?php echo e(url()->to('/')); ?>"></image-slider>
    </section>
<?php endif; ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/home/slider.blade.php ENDPATH**/ ?>