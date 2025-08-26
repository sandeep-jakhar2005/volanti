<?php
    $attributeRepository = app('\Webkul\Attribute\Repositories\AttributeFamilyRepository');

    $comparableAttributes = $attributeRepository->getComparableAttributesBelongsToFamily();

    $locale = core()->getRequestedLocaleCode();

    $attributeOptionTranslations = DB::table('attribute_option_translations')->where('locale', $locale)->get();
?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="compare-product-template">
        <section class="comparison-component">
            <h1>
                <?php echo e(__('shop::app.customer.compare.compare_similar_items')); ?>

            </h1>

            <button
                v-if="products.length > 0"
                class="btn btn-primary btn-md <?php echo e(core()->getCurrentLocale()->direction == 'rtl' ? 'pull-left' : 'pull-right'); ?>"
                @click="removeProductCompare('all')">
                <?php echo e(__('shop::app.customer.account.wishlist.deleteall')); ?>

            </button>

            <?php echo view_render_event('bagisto.shop.customers.account.compare.view.before'); ?>


            <table class="compare-products">
                <template v-if="isProductListLoaded && products.length > 0">
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
                            <td>
                                <h4 class="fs16"><?php echo e($attribute['admin_name']); ?></h4>
                            </td>

                            <td :key="`title-${index}`" v-for="(product, index) in products">
                                <?php switch($attribute['code']):
                                    case ('name'): ?>
                                        <a :href="`${baseUrl}/${product.url_key}`" class="unset remove-decoration active-hover">
                                            <h5 class="fw6 fs18 mt-0" v-text="product['<?php echo e($attribute['code']); ?>']"></h5>
                                        </a>
                                        <?php break; ?>

                                    <?php case ('product_image'): ?>
                                        <a :href="`${baseUrl}/${product.url_key}`" class="unset">
                                            <img
                                                class="image-wrapper"
                                                :src="product['<?php echo e($attribute['code']); ?>']"
                                                :onerror="`this.src='${baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" alt="" />
                                        </a>
                                        <?php break; ?>

                                    <?php case ('price'): ?>
                                        <span v-html="product['priceHTML']"></span>
                                        <?php break; ?>

                                    <?php case ('addToCartHtml'): ?>
                                        <div class="action">
                                            <div>
                                                <span class="d-inline-block">
                                                    <form :action="`${baseUrl}/checkout/cart/add/${product.product_id}`" method="POST">
                                                        <?php echo csrf_field(); ?>

                                                        <input type="hidden" name="product_id" :value="product.product_id">

                                                        <input type="hidden" name="quantity" value="1">

                                                        <span v-html="product.addToCartHtml"></span>
                                                    </form>
                                                </span>

                                                <span class="icon white-cross-sm-icon remove-product" @click="removeProductCompare(product.id)"></span>
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
                                        <span v-html="product.description" class="desc"></span>
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
                                                <a :href="`${baseUrl}/${product.url_key}`" class="unset">
                                                    <img
                                                        class="image-wrapper"
                                                        :src="storageUrl + product.product['<?php echo e($attribute['code']); ?>']"
                                                        :onerror="`this.src='${baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" alt="" />
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

                <span v-else-if="isProductListLoaded && products.length == 0">
                    <?php echo e(__('shop::app.customer.compare.empty-text')); ?>

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
                    'products': [],
                    'baseUrl': '<?php echo e(url()->to('/')); ?>',
                    'storageUrl': '<?php echo e(Storage::url('/')); ?>',
                    'isCustomer': '<?php echo e(auth()->guard('customer')->user() ? "true" : "false"); ?>' == 'true',
                    'isProductListLoaded': false,
                    'attributeOptions': <?php echo json_encode($attributeOptionTranslations, 15, 512) ?>,
                };
            },

            mounted: function () {
                this.getComparedProducts();
            },

            methods: {
                'getComparedProducts': function () {
                    let items = '';
                    let url = `${this.baseUrl}/${this.isCustomer ? 'comparison' : 'detailed-products'}`;

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

                            if (response.data.products.length > 2) {
                                $('.comparison-component').css('overflow-x', 'scroll');
                            }

                            this.products = response.data.products;
                        })
                        .catch(error => {
                            this.isProductListLoaded = true;
                            console.log("<?php echo e(__('shop::app.common.error')); ?>");
                        });
                    } else {
                        this.isProductListLoaded = true;
                    }
                },

                'removeProductCompare': function (productId) {
                    if (productId == 'all' && ! confirm('<?php echo e(__('shop::app.customer.compare.confirm-remove-all')); ?>')) {
                        return;
                    }

                    if (this.isCustomer) {
                        this.$http.delete(`${this.baseUrl}/comparison?productId=${productId}`)
                        .then(response => {
                            if (productId == 'all') {
                                this.$set(this, 'products', this.products.filter(product => false));
                            } else {
                                this.$set(this, 'products', this.products.filter(product => product.id != productId));
                            }

                            window.flashMessages = [{'type': 'alert-success', 'message': response.data.message }];

                            this.updateCompareCount();

                            this.$root.addFlashMessages();
                        })
                        .catch(error => {
                            console.log("<?php echo e(__('shop::app.common.error')); ?>");
                        });
                    } else {
                        let existingItems = this.getStorageValue('compared_product');

                        if (productId == "all") {
                            updatedItems = [];
                            this.$set(this, 'products', []);
                            window.flashMessages = [{'type': 'alert-success', 'message': '<?php echo e(__('shop::app.customer.compare.removed-all')); ?>' }];
                        } else {
                            updatedItems = existingItems.filter(item => item != productId);
                            this.$set(this, 'products', this.products.filter(product => product.id != productId));
                            window.flashMessages = [{'type': 'alert-success', 'message': '<?php echo e(__('shop::app.customer.compare.removed')); ?>' }];
                        }

                        this.setStorageValue('compared_product', updatedItems);

                        this.$root.addFlashMessages();
                    }

                    this.updateCompareCount();
                },

                'getDynamicHTML': function (input) {
                    var _staticRenderFns;
                    const { render, staticRenderFns } = Vue.compile(input);

                    if (this.$options.staticRenderFns.length > 0) {
                        _staticRenderFns = this.$options.staticRenderFns;
                    } else {
                        _staticRenderFns = this.$options.staticRenderFns = staticRenderFns;
                    }

                    try {
                        var output = render.call(this, this.$createElement);
                    } catch (exception) {
                        console.log(this.__('error.something_went_wrong'));
                    }

                    this.$options.staticRenderFns = _staticRenderFns;

                    return output;
                },

                'isMobile': function () {
                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    return true
                    } else {
                    return false
                    }
                },

                'getStorageValue': function (key) {
                    let value = window.localStorage.getItem(key);

                    if (value) {
                        value = JSON.parse(value);
                    }

                    return value;
                },

                'setStorageValue': function (key, value) {
                    window.localStorage.setItem(key, JSON.stringify(value));

                    return true;
                },

                'getAttributeOptions': function (productDetails, attributeValues, type) {
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

                'updateCompareCount': function () {
                    if (this.isCustomer == "true" || this.isCustomer == true) {
                        this.$http.get(`${this.baseUrl}/items-count`)
                        .then(response => {
                            $('#compare-items-count').html(response.data.compareProductsCount);
                        })
                        .catch(exception => {
                            window.flashMessages = [{
                                'type': `alert-error`,
                                'message': "<?php echo e(__('shop::app.common.error')); ?>"
                            }];

                            this.$root.addFlashMessages();
                        });
                    } else {
                        let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
                        comparedItemsCount = comparedItems ? comparedItems.length : 0;

                        $('#compare-items-count').html(comparedItemsCount);
                    }
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/guest/compare/compare-products.blade.php ENDPATH**/ ?>