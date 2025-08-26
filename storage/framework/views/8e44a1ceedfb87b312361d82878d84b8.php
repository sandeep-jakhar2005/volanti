<?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>
<?php $customHelper = app('Webkul\Velocity\Helpers\Helper'); ?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(trim($product->meta_title) != "" ? $product->meta_title : $product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e(trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '')); ?>"/>

    <meta name="keywords" content="<?php echo e($product->meta_keywords); ?>"/>

    <?php if(core()->getConfigData('catalog.rich_snippets.products.enable')): ?>
        <script type="application/ld+json">
            <?php echo app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product); ?>

        </script>
    <?php endif; ?>

    <?php
        $images = product_image()->getGalleryImages($product);
        
        $productImages = [];

        foreach ($images as $key => $image) {
            array_push($productImages, $image['medium_image_url']);
        }

        $productBaseImage = product_image()->getProductBaseImage($product, $images);
    ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="<?php echo e($product->name); ?>" />

    <meta name="twitter:description" content="<?php echo e($product->description); ?>" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="<?php echo e($productBaseImage['medium_image_url']); ?>" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="<?php echo e($product->name); ?>" />

    <meta property="og:image" content="<?php echo e($productBaseImage['medium_image_url']); ?>" />

    <meta property="og:description" content="<?php echo e($product->description); ?>" />

    <meta property="og:url" content="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .related-products {
            width: 100%;
        }

        .recently-viewed {
            margin-top: 20px;
        }

        .store-meta-images > .recently-viewed:first-child {
            margin-top: 0px;
        }

        .main-content-wrapper {
            margin-bottom: 0px;
        }

        .buynow {
            height: 40px;
            text-transform: uppercase;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('full-content-wrapper'); ?>
    <?php echo view_render_event('bagisto.shop.products.view.before', ['product' => $product]); ?>


    <div class="row no-margin">
        <section class="col-12 product-detail">
            <div class="layouter">
                <product-view>
                    <div class="form-container">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                        <div class="row">
                            
                            <div class="left col-lg-5 col-md-6">
                                <?php echo $__env->make('shop::products.view.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            
                            <div class="right col-lg-7 col-md-6">
                                
                                <div class="info">
                                    <h2 class="col-12"><?php echo e($product->name); ?></h2>

                                    <?php if($total = $reviewHelper->getTotalReviews($product)): ?>
                                        <div class="reviews col-lg-12">
                                            <star-ratings
                                                push-class="mr5"
                                                :ratings="<?php echo e(round($reviewHelper->getAverageRating($product))); ?>"
                                            ></star-ratings>

                                            <div class="reviews">
                                                <span>
                                                    <?php echo e(__('shop::app.reviews.ratingreviews', [
                                                        'rating' => round($reviewHelper->getAverageRating($product)),
                                                        'review' => $total])); ?>

                                                </span>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php echo $__env->make('shop::products.view.stock', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="col-12 price">
                                        <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <?php if(
                                            Webkul\Tax\Helpers\Tax::isTaxInclusive()
                                            && $product->getTypeInstance()->getTaxCategory()
                                        ): ?>
                                            <span>
                                                <?php echo e(__('velocity::app.products.tax-inclusive')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if(count($offers = $product->getTypeInstance()->getCustomerGroupPricingOffers()) > 0): ?>
                                        <div class="col-12">
                                            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($offer); ?> </br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php echo $__env->make('shop::products.view.configurable-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]); ?>


                                    <?php if($product->getTypeInstance()->showQuantityBox()): ?>
                                        <div class="col-12">
                                            <quantity-changer quantity-text="<?php echo e(__('shop::app.products.quantity')); ?>"></quantity-changer>
                                        </div>
                                    <?php else: ?>
                                        <input type="hidden" name="quantity" value="1">
                                    <?php endif; ?>

                                    <?php echo view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]); ?>


                                    <?php echo $__env->make('shop::products.view.downloadable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('shop::products.view.grouped-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('shop::products.view.bundle-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="col-12 product-actions">
                                        <?php if(core()->getConfigData('catalog.products.storefront.buy_now_button_display')): ?>
                                            <?php echo $__env->make('shop::products.buy-now', [
                                                'product' => $product,
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>

                                        <?php echo $__env->make('shop::products.add-to-cart', [
                                            'form' => false,
                                            'product' => $product,
                                            'showCartIcon' => false,
                                            'showCompare' => (bool) core()->getConfigData('general.content.shop.compare_option'),
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>

                                <?php echo $__env->make('shop::products.view.short-description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php echo $__env->make('shop::products.view.attributes', [
                                    'active' => true
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                
                                <?php echo $__env->make('shop::products.view.description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                
                                
                            </div>
                        </div>
                        
                    </div>
                </product-view>
            </div>
            <div class="related-products">
                <?php echo $__env->make('shop::products.view.related-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('shop::products.view.up-sells', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </section>

    
    </div>

    <?php echo view_render_event('bagisto.shop.products.view.after', ['product' => $product]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('vendor/webkul/ui/assets/js/ui.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('themes/velocity/assets/js/jquery-ez-plus.js')); ?>"></script>

    <script type='text/javascript' src='https://unpkg.com/spritespin@4.1.0/release/spritespin.js'></script>

    <script type="text/x-template" id="product-view-template">
        <form
            method="POST"
            id="product-form"
            @click="onSubmit($event)"
            @submit.enter.prevent="onSubmit($event)"
            action="<?php echo e(route('shop.cart.add', $product->id)); ?>"
        >
            <input type="hidden" name="is_buy_now" v-model="is_buy_now">

            <slot v-if="slot"></slot>

            <div v-else>
                <div class="spritespin"></div>
            </div>
        </form>
    </script>

    <script>
        Vue.component('product-view', {
            inject: ['$validator'],
            template: '#product-view-template',
            data: function () {
                return {
                    slot: true,
                    is_buy_now: 0,
                }
            },

            mounted: function () {
                let currentProductId = '<?php echo e($product->url_key); ?>';
                let existingViewed = window.localStorage.getItem('recentlyViewed');

                if (! existingViewed) {
                    existingViewed = [];
                } else {
                    existingViewed = JSON.parse(existingViewed);
                }

                if (existingViewed.indexOf(currentProductId) == -1) {
                    existingViewed.push(currentProductId);

                    if (existingViewed.length > 3)
                        existingViewed = existingViewed.slice(Math.max(existingViewed.length - 4, 1));

                    window.localStorage.setItem('recentlyViewed', JSON.stringify(existingViewed));
                } else {
                    var uniqueNames = [];

                    $.each(existingViewed, function(i, el){
                        if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
                    });

                    uniqueNames.push(currentProductId);

                    uniqueNames.splice(uniqueNames.indexOf(currentProductId), 1);

                    window.localStorage.setItem('recentlyViewed', JSON.stringify(uniqueNames));
                }
            },

            methods: {
                onSubmit: function(event) {
                    if (event.target.getAttribute('type') != 'submit')
                        return;

                    event.preventDefault();

                    this.$validator.validateAll().then(result => {
                        if (result) {
                            this.is_buy_now = event.target.classList.contains('buynow') ? 1 : 0;

                            setTimeout(function() {
                                document.getElementById('product-form').submit();
                            }, 0);
                        } else {
                            this.activateAutoScroll();
                        }
                    });
                },

                activateAutoScroll: function(event) {
                    
                    /**
                     * This is normal Element
                     */
                    const normalElement = document.querySelector(
                        '.control-error:first-of-type'
                    );

                    /**
                     * Scroll Config
                     */
                    const scrollConfig = {
                        behavior: 'smooth',
                        block: 'end',
                        inline: 'nearest',
                    }

                    if (normalElement) {
                        normalElement.scrollIntoView(scrollConfig);
                        return;
                    }
                }
            }
        });

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {
                for (let i=0; i < thumbFrame.length ; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for(let i=0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }
        };
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/view.blade.php ENDPATH**/ ?>