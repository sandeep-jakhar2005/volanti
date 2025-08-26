<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.checkout.cart.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <section class="cart">
        <?php if($cart): ?>
            <div class="title">
                <?php echo e(__('shop::app.checkout.cart.title')); ?>

            </div>

            <div class="cart-content">
                <div class="left-side">
                    <div style="display: flex;justify-content: flex-end;margin-bottom: 20px;">
                        <form
                            method="POST"
                            action="<?php echo e(route('shop.cart.remove.all.items')); ?>">
                            <?php echo csrf_field(); ?>
                            <button
                                type="submit"
                                onclick="return confirm('<?php echo e(__('shop::app.checkout.cart.confirm-action')); ?>')"
                                class="btn btn-lg btn-primary">

                                <?php echo e(__('shop::app.checkout.cart.remove-all-items')); ?>

                            </button>
                        </form>
                    </div>
                    <form action="<?php echo e(route('shop.checkout.cart.update')); ?>" method="POST" @submit.prevent="onSubmit">

                        <div class="cart-item-list" style="margin-top: 0">
                            <?php echo csrf_field(); ?>
                            <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);

                                    if (is_null($item->product->url_key)) {
                                        if (! is_null($item->product->parent)) {
                                            $url_key = $item->product->parent->url_key;
                                        }
                                    } else {
                                        $url_key = $item->product->url_key;
                                    }
                                ?>

                                <div class="item mt-5">
                                    <div class="item-image" style="margin-right: 15px;">
                                        <a href="<?php echo e(route('shop.productOrCategory.index', $url_key)); ?>"><img src="<?php echo e($productBaseImage['medium_image_url']); ?>" alt="" /></a>
                                    </div>

                                    <div class="item-details">

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.name.before', ['item' => $item]); ?>


                                        <div class="item-title">
                                            <a href="<?php echo e(route('shop.productOrCategory.index', $url_key)); ?>">
                                                <?php echo e($item->product->name); ?>

                                            </a>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.name.after', ['item' => $item]); ?>



                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.price.before', ['item' => $item]); ?>


                                        <div class="price">
                                            <?php echo e(core()->currency($item->base_price)); ?>

                                        </div>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.price.after', ['item' => $item]); ?>



                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.options.before', ['item' => $item]); ?>


                                        <?php if(isset($item->additional['attributes'])): ?>
                                            <div class="item-options">

                                                <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.options.after', ['item' => $item]); ?>



                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.quantity.before', ['item' => $item]); ?>


                                        <div class="misc">
                                            <?php if($item->product->getTypeInstance()->showQuantityBox() === true): ?>
                                                <quantity-changer
                                                    :control-name="'qty[<?php echo e($item->id); ?>]'"
                                                    quantity="<?php echo e($item->quantity); ?>">
                                                </quantity-changer>
                                            <?php endif; ?>

                                            <span class="remove">
                                                <a href="<?php echo e(route('shop.checkout.cart.remove', $item->id)); ?>" onclick="removeLink('<?php echo e(__('shop::app.checkout.cart.cart-remove-action')); ?>')"><?php echo e(__('shop::app.checkout.cart.remove-link')); ?></a></span>

                                            <?php if(auth()->guard('customer')->check()): ?>
                                                <?php if((bool) core()->getConfigData('general.content.shop.wishlist_option')): ?>
                                                    <span class="towishlist">
                                                            <?php if(
                                                                $item->parent_id != 'null'
                                                                || $item->parent_id != null
                                                            ): ?>
                                                            <a
                                                                href="javascript:void(0);"
                                                                onclick="moveToWishlist('<?php echo e(__('shop::app.checkout.cart.cart-remove-action')); ?>', '<?php echo e(route('shop.move_to_wishlist', $item->id)); ?>')">
                                                                    <?php echo e(__('shop::app.checkout.cart.move-to-wishlist')); ?>

                                                                </a>
                                                        <?php else: ?>
                                                            <a
                                                                href="javascript:void(0);"
                                                                onclick="moveToWishlist('<?php echo e(__('shop::app.checkout.cart.cart-remove-action')); ?>', '<?php echo e(route('shop.move_to_wishlist', $item->child->id)); ?>')">
                                                                    <?php echo e(__('shop::app.checkout.cart.move-to-wishlist')); ?>

                                                                </a>
                                                        <?php endif; ?>
                                                        </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item.quantity.after', ['item' => $item]); ?>


                                        <?php if(! cart()->isItemHaveQuantity($item)): ?>
                                            <div class="error-message mt-15">
                                                * <?php echo e(__('shop::app.checkout.cart.quantity-error')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <?php echo view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]); ?>


                        <div class="misc-controls">
                            <a href="<?php echo e(route('shop.home.index')); ?>" class="link"><?php echo e(__('shop::app.checkout.cart.continue-shopping')); ?></a>

                            <div style="display:flex;">
                                <?php if($cart->hasProductsWithQuantityBox()): ?>
                                    <button type="submit" class="btn btn-lg btn-primary" id="update_cart_button">
                                        <?php echo e(__('shop::app.checkout.cart.update-cart')); ?>

                                    </button>
                                <?php endif; ?>

                                <?php if(! cart()->hasError()): ?>
                                    <?php
                                        $minimumOrderAmount = (float) core()->getConfigData('sales.orderSettings.minimum-order.minimum_order_amount') ?? 0;
                                    ?>

                                    <proceed-to-checkout
                                        href="<?php echo e(route('shop.checkout.onepage.index')); ?>"
                                        add-class="btn btn-lg btn-primary"
                                        text="<?php echo e(__('shop::app.checkout.cart.proceed-to-checkout')); ?>"
                                        is-minimum-order-completed="<?php echo e($cart->checkMinimumOrder()); ?>"
                                        minimum-order-message="<?php echo e(__('shop::app.checkout.cart.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)])); ?>">
                                    </proceed-to-checkout>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php echo view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]); ?>

                    </form>
                </div>

                <div class="right-side">
                    <?php echo view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]); ?>


                    <?php echo $__env->make('shop::checkout.total.summary', ['cart' => $cart], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <coupon-component></coupon-component>

                    <?php echo view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]); ?>

                </div>
            </div>

            <?php echo $__env->make('shop::products.view.cross-sells', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php else: ?>

            <div class="title">
                <?php echo e(__('shop::app.checkout.cart.title')); ?>

            </div>

            <div class="cart-content">
                <p>
                    <?php echo e(__('shop::app.checkout.cart.empty')); ?>

                </p>

                <p style="display: inline-block;">
                    <a style="display: inline-block;" href="<?php echo e(route('shop.home.index')); ?>" class="btn btn-lg btn-primary"><?php echo e(__('shop::app.checkout.cart.continue-shopping')); ?></a>
                </p>
            </div>

        <?php endif; ?>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('shop::checkout.cart.coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <div class="wrap">
                <label><?php echo e(__('shop::app.products.quantity')); ?></label>

                <button type="button" class="decrease" @click="decreaseQty()">-</button>

                <input
                    ref="quantityChanger"
                    class="control"
                    :name="controlName"
                    :model="qty"
                    v-validate="validations"
                    data-vv-as="&quot;<?php echo e(__('shop::app.products.quantity')); ?>&quot;"
                    @keyup="setQty($event)">

                <button type="button" class="increase" @click="increaseQty()">+</button>
            </div>

            <span class="control-error" v-if="errors.has(controlName)">{{ errors.first(controlName) }}</span>
        </div>
    </script>

    <script>
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
                    if (this.qty > this.minQuantity) {
                        this.qty = parseInt(this.qty) - 1;
                    }
                },

                increaseQty: function() {
                    this.qty = parseInt(this.qty) + 1;
                }
            }
        });

        function removeLink(message) {
            if (! confirm(message)) {
                event.preventDefault();

                return;
            }
        }

        function moveToWishlist(message, route) {
            if (! confirm(message)) {
                event.preventDefault();
                return;
            }

            axios.post(route, {'redirect': false})
                .then((response) => {
                    location.reload();
                });
        }

        function updateCartQunatity(operation, index) {
            var quantity = document.getElementById('cart-quantity'+index).value;

            if (operation == 'add') {
                quantity = parseInt(quantity) + 1;
            } else if (operation == 'remove') {
                if (quantity > 1) {
                    quantity = parseInt(quantity) - 1;
                } else {
                    alert('<?php echo e(__('shop::app.products.less-quantity')); ?>');
                }
            }

            document.getElementById('cart-quantity'+index).value = quantity;

            event.preventDefault();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/checkout/cart/index.blade.php ENDPATH**/ ?>