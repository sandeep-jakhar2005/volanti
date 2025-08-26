<div class="form-container">
    <div class="form-header mb-30">
        <span class="checkout-step-heading"><?php echo e(__('shop::app.checkout.onepage.summary')); ?></span>
    </div>

    <div class="address-summary">
        <?php if($billingAddress = $cart->billing_address): ?>
            <div class="billing-address">
                <div class="card-title mb-20">
                    <b><?php echo e(__('shop::app.checkout.onepage.billing-address')); ?></b>
                </div>

                <div class="card-content">
                    <ul>
                        <li class="mb-10">
                            <?php echo e($billingAddress->company_name ?? ''); ?>

                        </li>
                        <li class="mb-10">
                            <b><?php echo e($billingAddress->first_name); ?> <?php echo e($billingAddress->last_name); ?></b>
                        </li>
                        <li class="mb-10">
                            <?php echo e($billingAddress->address1); ?>,<br/>
                        </li>

                        <li class="mb-10">
                            <?php echo e($billingAddress->postcode . " " . $billingAddress->city); ?>

                        </li>

                        <li class="mb-10">
                            <?php echo e($billingAddress->state); ?>

                        </li>

                        <li class="mb-10">
                            <?php echo e(core()->country_name($billingAddress->country)); ?> <?php echo e($billingAddress->postcode); ?>

                        </li>

                        <span class="horizontal-rule mb-15 mt-15"></span>

                        <li class="mb-10">
                            <?php echo e(__('shop::app.checkout.onepage.contact')); ?> : <?php echo e($billingAddress->phone); ?>

                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if(
            $cart->haveStockableItems()
            && $shippingAddress = $cart->shipping_address
        ): ?>
            <div class="shipping-address">
                <div class="card-title mb-20">
                    <b><?php echo e(__('shop::app.checkout.onepage.shipping-address')); ?></b>
                </div>

                <div class="card-content">
                    <ul>
                        <li class="mb-10">
                            <?php echo e($shippingAddress->company_name ?? ''); ?>

                        </li>
                        <li class="mb-10">
                            <b><?php echo e($shippingAddress->first_name); ?> <?php echo e($shippingAddress->last_name); ?></b>
                        </li>
                        <li class="mb-10">
                            <?php echo e($shippingAddress->address1); ?>,<br/>
                        </li>

                        <li class="mb-10">
                            <?php echo e($shippingAddress->postcode . " " . $shippingAddress->city); ?>

                        </li>

                        <li class="mb-10">
                            <?php echo e($shippingAddress->state); ?>

                        </li>

                        <li class="mb-10">
                            <?php echo e(core()->country_name($shippingAddress->country)); ?>

                        </li>

                        <span class="horizontal-rule mb-15 mt-15"></span>

                        <li class="mb-10">
                            <?php echo e(__('shop::app.checkout.onepage.contact')); ?> : <?php echo e($shippingAddress->phone); ?>

                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div class="cart-item-list mt-20">
        <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
            ?>

            <div class="item mb-5" style="margin-bottom: 5px;">
                <div class="item-image">
                    <img src="<?php echo e($productBaseImage['medium_image_url']); ?>"  alt=""/>
                </div>

                <div class="item-details">

                    <?php echo view_render_event('bagisto.shop.checkout.name.before', ['item' => $item]); ?>


                    <div class="item-title">
                        <?php echo e($item->product->name); ?>

                    </div>

                    <?php echo view_render_event('bagisto.shop.checkout.name.after', ['item' => $item]); ?>

                    <?php echo view_render_event('bagisto.shop.checkout.price.before', ['item' => $item]); ?>


                    <div class="row">
                        <span class="title">
                            <?php echo e(__('shop::app.checkout.onepage.price')); ?>

                        </span>
                        <span class="value">
                            <?php echo e(core()->currency($item->base_price)); ?>

                        </span>
                    </div>

                    <?php echo view_render_event('bagisto.shop.checkout.price.after', ['item' => $item]); ?>

                    <?php echo view_render_event('bagisto.shop.checkout.quantity.before', ['item' => $item]); ?>


                    <div class="row">
                        <span class="title">
                            <?php echo e(__('shop::app.checkout.onepage.quantity')); ?>

                        </span>
                        <span class="value">
                            <?php echo e($item->quantity); ?>

                        </span>
                    </div>

                    <?php echo view_render_event('bagisto.shop.checkout.quantity.after', ['item' => $item]); ?>


                    <?php echo view_render_event('bagisto.shop.checkout.options.before', ['item' => $item]); ?>


                    <?php if(isset($item->additional['attributes'])): ?>
                        <div class="item-options">

                            <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="order-description mt-20">
        <div class="pull-left" style="width: 60%; float: left;">
            <?php if($cart->haveStockableItems()): ?>
                <div class="shipping">
                    <div class="decorator">
                        <i class="icon shipping-icon"></i>
                    </div>

                    <div class="text">
                        <?php echo e(core()->currency($cart->selected_shipping_rate->base_price)); ?>


                        <div class="info">
                            <?php echo e($cart->selected_shipping_rate->method_title); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="payment">
                <div class="decorator">
                    <i class="icon payment-icon"></i>
                </div>

                <div class="text">
                    <?php echo e(core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title')); ?>

                </div>
            </div>

        </div>

        <div class="pull-right" style="width: 40%; float: left;">
            <slot name="summary-section"></slot>
        </div>
    </div>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/checkout/onepage/review.blade.php ENDPATH**/ ?>