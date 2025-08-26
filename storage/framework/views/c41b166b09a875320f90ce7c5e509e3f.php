<?php
    /**
     * @var Webkul\Product\Models\ProductFlat $product
     * @var string $message
     */
    $url = route('shop.productOrCategory.index', $product->url_key);
    $twitter_url = 'https://twitter.com/intent/tweet?' . http_build_query([
        'url' => $url,
        'text' => $message,
    ]);
?>

<twitter-share></twitter-share>

<?php $__env->startPush('css'); ?>
    <style>
        .bb-social--twitter a svg > path {
            fill: #1DA1F2;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="twitter-share-link">
        <li class="bb-social-share__item bb-social--twitter">
            <a href="#" @click="openSharePopup">
                <?php echo $__env->make('social_share::icons.twitter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </li>
    </script>

    <script type="text/javascript">
        Vue.component('twitter-share', {
            template: '#twitter-share-link',
            data: function () {
                return {
                    shareUrl: '<?php echo e($twitter_url); ?>'
                }
            },
            methods: {
                openSharePopup: function () {
                    window.open(this.shareUrl, '_blank', 'resizable=yes,top=500,left=500,width=500,height=500')
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/vendor/bagistobrasil/bagisto-product-social-share/src/Resources/views/links/twitter.blade.php ENDPATH**/ ?>