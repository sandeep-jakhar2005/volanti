<?php
    $links = [];
    if (core()->getConfigData('catalog.products.social_share.facebook')) {
        array_push($links, 'facebook');
    }
    if (core()->getConfigData('catalog.products.social_share.instagram')) {
        array_push($links, 'instagram');
    }
    if (core()->getConfigData('catalog.products.social_share.twitter')) {
        array_push($links, 'twitter');
    }
    if (core()->getConfigData('catalog.products.social_share.pinterest')) {
        array_push($links, 'pinterest');
    }
    if (core()->getConfigData('catalog.products.social_share.linkedin')) {
        array_push($links, 'linkedin');
    }
    if (core()->getConfigData('catalog.products.social_share.whatsapp')) {
        array_push($links, 'whatsapp');
    }
    if (core()->getConfigData('catalog.products.social_share.email')) {
        array_push($links, 'email');
    }
    $message = core()->getConfigData('catalog.products.social_share.share_message');
?>

<?php if(core()->getConfigData('catalog.products.social_share.enabled')): ?>
    <aside class="bb-social-share">
        <div class="bb-social-share__title">
            <?php echo e(__('Share Now')); ?>

        </div>
        <ul class="bb-social-share__items">
            <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make(
                    'social_share::links.' . $link,
                    compact('product', 'message')
                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </aside>
<?php endif; ?>

<?php $__env->startPush('css'); ?>
    <style>
        .bb-social-share {
            padding: 1rem 0;
        }

        .bb-social-share__title {
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .bb-social-share__items {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .bb-social-share__item {
            margin-right: 1rem;
        }

        .bb-social-share__item a {
            text-decoration: none;
        }

        .bb-social-share__item a:hover {
            text-decoration: none;
        }

        .bb-social-share__item a svg {
            display: inline-block;
            width: 2rem;
            height: 2rem;
        }
    </style>
<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/vendor/bagistobrasil/bagisto-product-social-share/src/Resources/views/share.blade.php ENDPATH**/ ?>