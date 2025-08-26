<?php
    /**
     * @var Webkul\Product\Models\ProductFlat $product
     * @var string $message
     */
    $url = route('shop.productOrCategory.index', $product->url_key);
    $linkedin_url = 'https://www.linkedin.com/shareArticle?' . http_build_query([
        'mini' => 'true',
        'url' => $url,
        'title' => $product->name,
        'summary' => $message
    ]);
?>

<linkedin-share></linkedin-share>

<?php $__env->startPush('css'); ?>
    <style>
        .bb-social--linkedin a svg > path {
            fill: #1DA1F2;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="linkedin-share-link">
        <li class="bb-social-share__item bb-social--linkedin">
            <a href="#" @click="openSharePopup">
                <?php echo $__env->make('social_share::icons.linkedin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </li>
    </script>

    <script type="text/javascript">
        Vue.component('linkedin-share', {
            template: '#linkedin-share-link',
            data: function () {
                return {
                    shareUrl: '<?php echo e($linkedin_url); ?>'
                }
            },
            methods: {
                openSharePopup: function () {
                    window.open(this.shareUrl, '_blank', 'resizable=yes,top=500,left=500,width=500,height=500')
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/vendor/bagistobrasil/bagisto-product-social-share/src/Resources/views/links/linkedin.blade.php ENDPATH**/ ?>