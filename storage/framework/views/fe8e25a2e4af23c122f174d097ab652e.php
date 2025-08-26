<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>
<?php $productRepository = app('Webkul\Product\Repositories\ProductRepository'); ?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(trim($category->meta_title) != "" ? $category->meta_title : $category->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e($category->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($category->meta_keywords); ?>" />

    <?php if(core()->getConfigData('catalog.rich_snippets.categories.enable')): ?>
        <script type="application/ld+json">
            <?php echo app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category); ?>

        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .product-price span:first-child, .product-price span:last-child {
            font-size: 18px;
            font-weight: 600;
        }

        @media only screen and (max-width: 992px) {
            .main-content-wrapper .vc-header {
                box-shadow: unset;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php
    $isProductsDisplayMode = in_array(
        $category->display_mode, [
            null,
            'products_only',
            'products_and_description'
        ]
    );

    $isDescriptionDisplayMode = in_array(
        $category->display_mode, [
            null,
            'description_only',
            'products_and_description'
        ]
    );
?>

<?php $__env->startSection('content-wrapper'); ?>
    <category-component></category-component>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="category-template">
        <section class="row col-12 velocity-divide-page category-page-wrapper">
            <?php echo view_render_event('bagisto.shop.productOrCategory.index.before', ['category' => $category]); ?>


            <?php if(in_array($category->display_mode, [null, 'products_only', 'products_and_description'])): ?>
                <?php echo $__env->make('shop::products.list.layered-navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="category-container right">
                <div class="row remove-padding-margin">
                    <div class="pl0 col-12">
                        <h2 class="fw6 mb10"><?php echo e($category->name); ?></h2>

                        <?php if($isDescriptionDisplayMode): ?>
                            <?php if($category->description): ?>
                                <div class="category-description">
                                    <?php echo $category->description; ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 no-padding">
                        <div class="hero-image">
                            <?php if(!is_null($category->category_banner)): ?>
                                <img class="logo" src="<?php echo e($category->banner_url); ?>" alt="" width="100%" height="350px" />
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class='col-md-12'>
                        <div class='carousel-products sub-category'>
                            <carousel-component
                                :slides-per-page="slidesPerPage"
                                pagination-enabled="hide"
                                :slides-count="<?php echo e(count($childCategory)); ?>">

                                <?php $__currentLoopData = $childCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $childSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <slide slot="slide-<?php echo e($index); ?>">
                                        <div class='childSubCategory'>
                                            <a href='<?php echo e(url($childSubCategory->url_path)); ?>'>
                                                <div>
                                                    <img src='<?php echo e($childSubCategory->getImageUrlAttribute()?? url("/vendor/webkul/ui/assets/images/product/small-product-placeholder.png")); ?>'>
                                                    <label><?php echo e($childSubCategory->name); ?></label>
                                                </div>
                                            </a>
                                        </div>
                                    </slide>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </carousel-component>
                        </div>
                    </div>
                </div>

                <?php if($isProductsDisplayMode): ?>
                    <div class="filters-container">
                        <template v-if="products.length >= 0">
                            <?php echo $__env->make('shop::products.list.toolbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </template>
                    </div>

                    <div
                        class="category-block"
                        <?php if($category->display_mode == 'description_only'): ?>
                            style="width: 100%"
                        <?php endif; ?>>

                        <shimmer-component v-if="isLoading" shimmer-count="4"></shimmer-component>

                        <template v-else-if="products.length > 0">
                            <?php if($toolbarHelper->getCurrentMode() == 'grid'): ?>
                                <div class="row col-12 remove-padding-margin">
                                    <product-card
                                        :key="index"
                                        :product="product"
                                        v-for="(product, index) in products">
                                    </product-card>
                                </div>
                            <?php else: ?>
                                <div class="product-list">
                                    <product-card
                                        list=true
                                        :key="index"
                                        :product="product"
                                        v-for="(product, index) in products">
                                    </product-card>
                                </div>
                            <?php endif; ?>

                            <?php echo view_render_event('bagisto.shop.productOrCategory.index.pagination.before', ['category' => $category]); ?>


                            <div class="bottom-toolbar" v-html="paginationHTML"></div>

                            <?php echo view_render_event('bagisto.shop.productOrCategory.index.pagination.after', ['category' => $category]); ?>

                        </template>

                        <div class="product-list empty" v-else>
                            <h2><?php echo e(__('shop::app.products.whoops')); ?></h2>
                            <p><?php echo e(__('shop::app.products.empty')); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php echo view_render_event('bagisto.shop.productOrCategory.index.after', ['category' => $category]); ?>

        </section>
    </script>

    <script>
        Vue.component('category-component', {
            template: '#category-template',

            data: function () {
                return {
                    'products': [],
                    'isLoading': true,
                    'paginationHTML': '',
                    'currentScreen': window.innerWidth,
                    'slidesPerPage': 5,
                }
            },

            created: function () {
                this.getCategoryProducts();
                this.setSlidesPerPage(this.currentScreen);
            },

            methods: {
                'getCategoryProducts': function () {
                    this.$http.get(`${this.$root.baseUrl}/category-products/<?php echo e($category->id); ?>${window.location.search}`)
                    .then(response => {
                        this.isLoading = false;
                        this.products = response.data.products;
                        this.paginationHTML = response.data.paginationHTML;
                    })
                    .catch(error => {
                        this.isLoading = false;
                        console.log(this.__('error.something_went_wrong'));
                    })
                },

                setSlidesPerPage: function (width) {
                    if (width >= 1200) {
                        this.slidesPerPage = 5;
                    } else if (width < 1200 && width >= 626) {
                        this.slidesPerPage = 3;
                    } else if (width < 626 && width >= 400) {
                        this.slidesPerPage = 2;
                    } else {
                        this.slidesPerPage = 1;
                    }
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/index.blade.php ENDPATH**/ ?>