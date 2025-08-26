<?php
    $attributeRepository = app('\Webkul\Attribute\Repositories\AttributeFamilyRepository');
    $comparableAttributes = $attributeRepository->getComparableAttributesBelongsToFamily();

    $locale = core()->getRequestedLocaleCode();

    $attributeOptionTranslations = app('\Webkul\Attribute\Repositories\AttributeOptionTranslationRepository')->where('locale', $locale)->get();
?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="compare-product-template">
        <section class="cart-details row no-margin col-12">
            <h2 class="fw6 col-6">
                <?php echo e(__('velocity::app.customer.compare.compare_similar_items')); ?>

            </h2>

            <div class="col-6" v-if="products.length > 0">
                <button
                    class="theme-btn light float-right"
                    @click="removeProductCompare('all')">
                    <?php echo e(__('shop::app.customer.account.wishlist.deleteall')); ?>

                </button>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.compare.view.before'); ?>


            <table class="row compare-products">
                <shimmer-component v-if="!isProductListLoaded && !isMobile()"></shimmer-component>

                <template v-else-if="isProductListLoaded && products.length > 0">
                    <?php
                        $comparableAttributes = $comparableAttributes->toArray();

                        array_splice($comparableAttributes, 1, 0, [[
                            'code' => 'product_image',
                            'admin_name' => __('velocity::app.customer.compare.product_image'),
                        ]]);

                        array_splice($comparableAttributes, 2, 0, [[
                            'code' => 'addToCartHtml',
                            'admin_name' => __('velocity::app.customer.compare.actions'),
                        ]]);
                    ?>

                    <?php $__currentLoopData = $comparableAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="header">
                                <span class="fs16 font-weight-bold"><?php echo e(empty($attribute['name']) ? $attribute['admin_name'] : $attribute['name']); ?></span>
                            </td>

                            <td :key="`title-${index}`" v-for="(product, index) in products">
                                <?php switch($attribute['code']):
                                    case ('name'): ?>
                                        <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset remove-decoration active-hover">
                                            <h2 class="fw6 fs18" v-text="product['<?php echo e($attribute['code']); ?>']"></h2>
                                        </a>
                                        <?php break; ?>

                                    <?php case ('product_image'): ?>
                                        <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset">
                                            <img
                                                class="image-wrapper"
                                                :src="product['<?php echo e($attribute['code']); ?>']"
                                                onload="window.updateHeight ? window.updateHeight() : ''"
                                                :onerror="`this.src='${$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`"
                                                alt=""/>
                                        </a>
                                        <?php break; ?>

                                    <?php case ('price'): ?>
                                        <span v-html="product['priceHTML']"></span>
                                        <?php break; ?>

                                    <?php case ('addToCartHtml'): ?>
                                        <div class="action">
                                            <vnode-injector :nodes="getDynamicHTML(product.addToCartHtml)"></vnode-injector>
                                            <div class="comparison-remove" style="">
                                                <span class="rango-delete fs24" @click="removeProductCompare(product.id)"></span>
                                        
                                                <span class="align-vertical-top" @click="removeProductCompare(product.id)"><?php echo e(__('shop::app.checkout.cart.remove')); ?></span>
                                            </div>
                                        </div>
                                        <?php break; ?>

                                    <?php case ('color'): ?>
                                        <span v-html="product.color_label" class="fs16"></span>
                                        <?php break; ?>

                                    <?php case ('size'): ?>
                                        <span v-html="product.size_label" class="fs16"></span>
                                        <?php break; ?>

                                    <?php case ('description'): ?>
                                        <span v-html="product.description"></span>
                                        <?php break; ?>

                                    <?php default: ?>
                                        <?php switch($attribute['type']):
                                            case ('boolean'): ?>
                                                <span
                                                    v-text="product.product['<?php echo e($attribute['code']); ?>']
                                                            ? '<?php echo e(__('velocity::app.shop.general.yes')); ?>'
                                                            : '<?php echo e(__('velocity::app.shop.general.no')); ?>'"
                                                ></span>
                                                <?php break; ?>;

                                            <?php case ('checkbox'): ?>
                                                <span v-if="product.product['<?php echo e($attribute['code']); ?>']" v-html="getAttributeOptions(product['<?php echo e($attribute['code']); ?>'] ? product : product.product['<?php echo e($attribute['code']); ?>'] ? product.product : null, '<?php echo e($attribute['code']); ?>', 'multiple')" class="fs16"></span>
                                                <span v-else class="fs16">__</span>
                                                <?php break; ?>;

                                            <?php case ('select'): ?>
                                                <span v-if="product.product['<?php echo e($attribute['code']); ?>']" v-html="getAttributeOptions(product['<?php echo e($attribute['code']); ?>'] ? product : product.product['<?php echo e($attribute['code']); ?>'] ? product.product : null, '<?php echo e($attribute['code']); ?>', 'single')" class="fs16"></span>
                                                <span v-else class="fs16">__</span>
                                                <?php break; ?>;

                                            <?php case ('multiselect'): ?>
                                                <span v-if="product.product['<?php echo e($attribute['code']); ?>']" v-html="getAttributeOptions(product['<?php echo e($attribute['code']); ?>'] ? product : product.product['<?php echo e($attribute['code']); ?>'] ? product.product : null, '<?php echo e($attribute['code']); ?>', 'multiple')" class="fs16"></span>
                                                <span v-else class="fs16">__</span>
                                                <?php break; ?>

                                            <?php case ('file'): ?>
                                            <?php case ('image'): ?>
                                                <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset">
                                                    <img
                                                        class="image-wrapper"
                                                        onload="window.updateHeight ? window.updateHeight() : ''"
                                                        :src="storageUrl + product.product['<?php echo e($attribute['code']); ?>']"
                                                        :onerror="`this.src='${$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`"
                                                        alt=""/>
                                                </a>
                                                <?php break; ?>;

                                            <?php default: ?>
                                                <span v-html="product['<?php echo e($attribute['code']); ?>'] ? product['<?php echo e($attribute['code']); ?>'] : product.product['<?php echo e($attribute['code']); ?>'] ? product.product['<?php echo e($attribute['code']); ?>'] : '__'" class="fs16"></span>
                                                <?php break; ?>;
                                        <?php endswitch; ?>

                                        <?php break; ?>

                                <?php endswitch; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </template>

                <span v-else-if="isProductListLoaded && products.length == 0" class="col-12">
                    {{ __('customer.compare.empty-text') }}
                </span>
            </table>

            <?php echo view_render_event('bagisto.shop.customers.account.compare.view.after'); ?>

        </section>
    </script>

    <script>
        Vue.component('compare-product', {
            template: '#compare-product-template',

            data: function () {
                return {
                    count: 0,
                    products: [],
                    storageUrl: '<?php echo e(Storage::url('/')); ?>',
                    isCustomer: '<?php echo e(auth()->guard('customer')->user() ? "true" : "false"); ?>' == "true",
                    isProductListLoaded: false,
                    attributeOptions: <?php echo json_encode($attributeOptionTranslations, 15, 512) ?>,
                };
            },

            mounted: function () {
                this.removeInactiveItems();

                this.activateSlider();
            },

            methods: {
                removeInactiveItems: function () {
                    let items = '';
                    let url = `${this.$root.baseUrl}/${this.isCustomer ? 'comparison' : 'detailed-products'}`;

                    let data = {
                        params: {'data': true}
                    }

                    if (! this.isCustomer) {
                        items = this.getStorageValue('compared_product');
                        items = items ? items.join('&') : '';

                        data = {
                            params: {
                                items
                            }
                        };
                    }

                    if (this.isCustomer || (! this.isCustomer && items != "")) {
                        this.$http.get(url, data)
                        .then(response => {
                            this.isProductListLoaded = true;

                            this.products = response.data.products;

                            this.products.forEach(product => {
                                if (product.status != 1) {
                                    let existingItems = this.getStorageValue('compared_product');
                                    let updatedItems = existingItems.filter(item => item != product.id);
                                    
                                    this.$set(this, 'products', this.products.filter(product => product.id != product.id));

                                    this.setStorageValue('compared_product', updatedItems);
                                    
                                    this.$root.headerItemsCount++;

                                    this.count++;
                                } 
                            });

                            if (this.count > 0) {
                                window.showAlert(
                                    `alert-info`,
                                    this.__('shop.general.alert.info'),
                                    `${this.__('products.product-removed')}`
                                );
                            }

                            this.getComparedProducts();
                        })
                        .catch(error => {
                            this.isProductListLoaded = true;
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        this.isProductListLoaded = true;
                    }
                },
                
                getComparedProducts: function () {
                    let items = '';
                    let url = `${this.$root.baseUrl}/${this.isCustomer ? 'comparison' : 'detailed-products'}`;

                    let data = {
                        params: {'data': true}
                    }

                    if (! this.isCustomer) {
                        items = this.getStorageValue('compared_product');
                        items = items ? items.join('&') : '';

                        data = {
                            params: {
                                items
                            }
                        };
                    }

                    if (this.isCustomer || (! this.isCustomer && items != "")) {
                        this.$http.get(url, data)
                        .then(response => {
                            this.isProductListLoaded = true;

                            this.products = response.data.products;
                        })
                        .catch(error => {
                            this.isProductListLoaded = true;
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        this.isProductListLoaded = true;
                    }
                },

                removeProductCompare: function (productId) {
                    if (productId == 'all' && ! confirm('<?php echo e(__('shop::app.customer.compare.confirm-remove-all')); ?>')) {
                        return;
                    }

                    if (this.isCustomer) {
                        this.$http.delete(`${this.$root.baseUrl}/comparison?productId=${productId}`)
                        .then(response => {
                            if (productId == 'all') {
                                this.$set(this, 'products', this.products.filter(product => false));
                            } else {
                                this.$set(this, 'products', this.products.filter(product => product.id != productId));
                            }

                            this.$root.headerItemsCount++;

                            window.showAlert(`alert-${response.data.status}`, response.data.label, response.data.message);
                        })
                        .catch(error => {
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        let existingItems = this.getStorageValue('compared_product');

                        if (productId == "all") {
                            updatedItems = [];
                            this.$set(this, 'products', []);

                            window.showAlert(
                                `alert-success`,
                                this.__('shop.general.alert.success'),
                                `${this.__('customer.compare.removed-all')}`
                            );
                        } else {
                            updatedItems = existingItems.filter(item => item != productId);
                            this.$set(this, 'products', this.products.filter(product => product.id != productId));

                            window.showAlert(
                                `alert-success`,
                                this.__('shop.general.alert.success'),
                                `${this.__('customer.compare.removed')}`
                            );
                        }

                        this.setStorageValue('compared_product', updatedItems);
                    }

                    this.$root.headerItemsCount++;
                },

                getAttributeOptions: function (productDetails, attributeValues, type) {
                    var attributeOptions = '__';

                    if (productDetails && attributeValues) {
                        var attributeItems;

                        if (type == "multiple") {
                            attributeItems = productDetails[attributeValues].split(',');
                        } else if (type == "single") {
                            attributeItems = productDetails[attributeValues];
                        }

                        attributeOptions = this.attributeOptions.filter(option => {
                            if (type == "multiple") {
                                if (attributeItems.indexOf(option.attribute_option_id.toString()) > -1) {
                                    return true;
                                }
                            } else if (type == "single") {
                                if (attributeItems == option.attribute_option_id.toString()) {
                                    return true;
                                }
                            }

                            return false;
                        });

                        attributeOptions = attributeOptions.map(option => {
                            return option.label;
                        });

                        attributeOptions = attributeOptions.join(', ');
                    }

                    return attributeOptions;
                },

                activateSlider: function () {
                    /* main slider */
                    const slider = document.querySelector('.compare-products');

                    let startX;
                    let scrollLeft;

                    /* check for mouse down */
                    let isMouseDown = false;

                    slider.addEventListener('mousedown', (e) => {
                        isMouseDown = true;
                        slider.classList.add('active');

                        startX = e.pageX - slider.offsetLeft;
                        scrollLeft = slider.scrollLeft;
                    });

                    slider.addEventListener('mouseleave', () => {
                        isMouseDown = false;
                        slider.classList.remove('active');
                    });

                    slider.addEventListener('mouseup', () => {
                        isMouseDown = false;
                        slider.classList.remove('active');
                    });

                    slider.addEventListener('mousemove', (e) => {
                        if (! isMouseDown) {
                            return;
                        }

                        e.preventDefault();

                        const x = e.pageX - slider.offsetLeft;
                        const walk = (x - startX) * 3;
                        slider.scrollLeft = scrollLeft - walk;
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/guest/compare/compare-products.blade.php ENDPATH**/ ?>