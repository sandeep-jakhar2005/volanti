<?php $__env->startSection('content-wrapper'); ?>
    <div class="error-container" style="width: 100%; display: flex; justify-content: center;">
        <div class="wrapper" style="display: flex; height: 100vh; width: 80vw;
    justify-content: space-between; align-items: center;">
            <div class="error-box">
                <div class="error-title">404</div>
                <div class="error-messgae">Page Not Found</div>
                <div class="error-description"></div>
                <a href="url()->to('/')">GO TO HOME</a>
                
                Show the exception here or error message here.
            </div>

        <div class="error-graphic" style="height: 236px; width: 255px; border: 1px solid red; background-image: url('.<?php echo e(asset('images.error')); ?>.')">
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/error.blade.php ENDPATH**/ ?>