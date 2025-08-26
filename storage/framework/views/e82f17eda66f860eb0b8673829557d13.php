<?php
    /**
     * @var Webkul\Product\Models\ProductFlat $product
     * @var string $message
     */
    $url = route('shop.productOrCategory.index', $product->url_key);

    if (empty($message)) {
        $message = $product->name;
    }

    $email_url = 'mailto:your@email.com?subject=' . $message . '&body=' . $message . ' ' . $url;
?>

<email-share></email-share>

<?php $__env->startPush('css'); ?>
    <style>
        .bb-social--email a svg > path {
            fill: #272928;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="email-share-link">
        <li class="bb-social-share__item bb-social--email">
            <a href="<?php echo e($email_url); ?>" target="_blank">
                <?php echo $__env->make('social_share::icons.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </li>
    </script>

    <script type="text/javascript">
        Vue.component('email-share', {
            template: '#email-share-link'
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/vendor/bagistobrasil/bagisto-product-social-share/src/Resources/views/links/email.blade.php ENDPATH**/ ?>