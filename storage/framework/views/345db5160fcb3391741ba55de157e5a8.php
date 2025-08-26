<?php
    $productBaseImage = product_image()->getProductBaseImage($product);
    $image = $productBaseImage['medium_image_url'] ?: asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png');
    $url = route('shop.productOrCategory.index', $product->url_key);
    $pinterest_url = 'https://pinterest.com/pin/create/button/?' . http_build_query([
        'url' => $url,
        'media' => $image,
        'description' => $message,
    ]);
?>

<pinterest-share></pinterest-share>

<?php $__env->startPush('css'); ?>
    <style>
        .bb-social--pinterest a svg > path {
            fill: #c8232c;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="pinterest-share-link">
        <li class="bb-social-share__item bb-social--pinterest">
            <a href="#" @click="openSharePopup">
                <?php echo $__env->make('social_share::icons.pinterest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </li>
    </script>

    <script type="text/javascript">
        Vue.component('pinterest-share', {
            template: '#pinterest-share-link',
            data: function () {
                return {
                    shareUrl: '<?php echo e($pinterest_url); ?>'
                }
            },
            methods: {
                openSharePopup: function () {
                    window.open(this.shareUrl, '_blank', 'resizable=yes,top=500,left=500,width=500,height=500')
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/vendor/bagistobrasil/bagisto-product-social-share/src/Resources/views/links/pinterest.blade.php ENDPATH**/ ?>