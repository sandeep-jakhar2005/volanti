<?php $__env->startSection('page_title'); ?>
    <?php echo e(trim($product->meta_title) != "" ? $product->meta_title : $product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e(trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '')); ?>"/>

    <meta name="keywords" content="<?php echo e($product->meta_keywords); ?>"/>

    <?php if(core()->getConfigData('catalog.rich_snippets.products.enable')): ?>
        <script type="application/ld+json">
            <?php echo e(app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product)); ?>

        </script>
    <?php endif; ?>

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="<?php echo e($product->name); ?>" />

    <meta name="twitter:description" content="<?php echo htmlspecialchars(trim(strip_tags($product->description))); ?>" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="<?php echo e($productBaseImage['medium_image_url']); ?>" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="<?php echo e($product->name); ?>" />

    <meta property="og:image" content="<?php echo e($productBaseImage['medium_image_url']); ?>" />

    <meta property="og:description" content="<?php echo htmlspecialchars(trim(strip_tags($product->description))); ?>" />

    <meta property="og:url" content="<?php echo e(route('shop.productOrCategory.index', $product->url_key)); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <?php echo view_render_event('bagisto.shop.products.view.before', ['product' => $product]); ?>


    <section class="product-detail">

        <div class="layouter">
            <product-view>
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                    <?php echo $__env->make('shop::products.view.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="details">

                        <div class="product-heading">
                            <span><?php echo e($product->name); ?></span>
                        </div>

                        <?php echo $__env->make('shop::products.review', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.price', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if(
                            Webkul\Tax\Helpers\Tax::isTaxInclusive()
                            && $product->getTypeInstance()->getTaxCategory()
                        ): ?>
                            <div>
                                <?php echo e(__('shop::app.products.tax-inclusive')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(count($product->getTypeInstance()->getCustomerGroupPricingOffers())): ?>
                            <div class="discount-offers">
                                <?php $__currentLoopData = $product->getTypeInstance()->getCustomerGroupPricingOffers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p> <?php echo e($offer); ?> </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->make('shop::products.view.stock', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]); ?>


                        <div class="description">
                            <?php echo $product->short_description; ?>

                        </div>

                        <?php echo view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]); ?>



                        <?php echo view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]); ?>


                        <?php if($product->getTypeInstance()->showQuantityBox()): ?>
                            <quantity-changer></quantity-changer>
                        <?php else: ?>
                            <input type="hidden" name="quantity" value="1">
                        <?php endif; ?>

                        <?php echo view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]); ?>


                        <?php echo $__env->make('shop::products.view.configurable-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.downloadable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.grouped-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.bundle-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]); ?>


                        <accordian :title="'<?php echo e(__('shop::app.products.description')); ?>'" :active="true">
                            <div slot="header">
                                <?php echo e(__('shop::app.products.description')); ?>

                                <i class="icon expand-icon right"></i>
                            </div>

                            <div slot="body">
                                <div class="full-description">
                                    <?php echo $product->description; ?>

                                </div>
                            </div>
                        </accordian>

                        <?php echo view_render_event('bagisto.shop.products.view.description.after', ['product' => $product]); ?>


                        <?php echo $__env->make('shop::products.view.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('shop::products.view.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </product-view>
        </div>

        <?php echo $__env->make('shop::products.view.related-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('shop::products.view.up-sells', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>

    <?php echo view_render_event('bagisto.shop.products.view.after', ['product' => $product]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script type="text/x-template" id="product-view-template">
        <form method="POST" id="product-form" action="<?php echo e(route('shop.cart.add', $product->id)); ?>" @click="onSubmit($event)">

            <input type="hidden" name="is_buy_now" v-model="is_buy_now">

            <slot></slot>

        </form>
    </script>

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <label class="required"><?php echo e(__('shop::app.products.quantity')); ?></label>

            <span class="quantity-container">
                <button type="button" class="decrease" @click="decreaseQty()">-</button>

                <input
                    ref="quantityChanger"
                    :name="controlName"
                    :model="qty"
                    class="control"
                    v-validate="validations"
                    data-vv-as="&quot;<?php echo e(__('shop::app.products.quantity')); ?>&quot;"
                    @keyup="setQty($event)">

                <button type="button" class="increase" @click="increaseQty()">+</button>
            </span>

            <span class="control-error" v-if="errors.has(controlName)">{{ errors.first(controlName) }}</span>
        </div>
    </script>

    <script>

        Vue.component('product-view', {

            template: '#product-view-template',

            inject: ['$validator'],

            data: function() {
                return {
                    is_buy_now: 0,
                }
            },

            methods: {
                onSubmit: function(e) {
                    if (e.target.getAttribute('type') != 'submit')
                        return;

                    e.preventDefault();

                    var this_this = this;

                    this.$validator.validateAll().then(function (result) {
                        if (result) {
                            this_this.is_buy_now = e.target.classList.contains('buynow') ? 1 : 0;

                            setTimeout(function() {
                                document.getElementById('product-form').submit();
                            }, 0);
                        }
                    });
                }
            }
        });

        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                controlName: {
                    type: String,
                    default: 'quantity'
                },

                quantity: {
                    type: [Number, String],
                    default: 1
                },

                minQuantity: {
                    type: [Number, String],
                    default: 1
                },

                validations: {
                    type: String,
                    default: 'required|numeric|min_value:1'
                }
            },

            data: function() {
                return {
                    qty: this.quantity
                }
            },

            mounted: function() {
                this.$refs.quantityChanger.value = this.qty > this.minQuantity
                    ? this.qty
                    : this.minQuantity;
            },

            watch: {
                qty: function (val) {
                    this.$refs.quantityChanger.value = ! isNaN(parseFloat(val)) ? val : 0;

                    this.qty = ! isNaN(parseFloat(val)) ? this.qty : 0;

                    this.$emit('onQtyUpdated', this.qty);

                    this.$validator.validate();
                }
            },

            methods: {
                setQty: function({ target }) {
                    this.qty = parseInt(target.value);
                },

                decreaseQty: function() {
                    if (this.qty > this.minQuantity)
                        this.qty = parseInt(this.qty) - 1;
                },

                increaseQty: function() {
                    this.qty = parseInt(this.qty) + 1;
                }
            }
        });

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {

                for(let i=0; i < thumbFrame.length ; i++) {
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

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/products/view.blade.php ENDPATH**/ ?>