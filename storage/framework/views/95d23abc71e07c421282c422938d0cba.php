<?php
    /**
     * @var Webkul\Product\Models\ProductFlat $product
     * @var string $message
     */
    $url = urlencode(route('shop.productOrCategory.index', $product->url_key));
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
?>

<facebook-share></facebook-share>

<?php $__env->startPush('css'); ?>
    <style>
        .bb-social--facebook a svg > path {
            fill: #3b5998;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="facebook-share-link">
        <li class="bb-social-share__item bb-social--facebook">
            <a href="#" @click="openSharePopup">
                <?php echo $__env->make('social_share::icons.facebook', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </li>
    </script>

    <script type="text/javascript">
        Vue.component('facebook-share', {
            template: '#facebook-share-link',
            data: function () {
                return {
                    shareUrl: '<?php echo e($facebook_url); ?>'
                }
            },
            methods: {
                openSharePopup: function () {
                    window.open(this.shareUrl, '_blank', 'resizable=yes,top=500,left=500,width=500,height=500')
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/vendor/bagistobrasil/bagisto-product-social-share/src/Resources/views/links/facebook.blade.php ENDPATH**/ ?>