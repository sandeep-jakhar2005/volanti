<?php $__env->startComponent('shop::emails.layouts.master'); ?>
    <div style="text-align: center;">
        <a href="<?php echo e(route('shop.home.index')); ?>">
            <?php echo $__env->make('shop::emails.layouts.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </a>
    </div>

    <div style="padding: 30px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
                <?php echo e(__('shop::app.mail.order.cancel.heading')); ?>

            </span> <br>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.order.cancel.dear', ['customer_name' => $order->customer_full_name])); ?>,
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo __('shop::app.mail.order.cancel.greeting', [
                    'order_id' => '<a href="' . route('shop.customer.orders.view', $order->id) . '" style="color: #0041FF; font-weight: bold;">#' . $order->increment_id . '</a>',
                    'created_at' => core()->formatDate($order->created_at, 'Y-m-d H:i:s')
                    ]); ?>

            </p>
        </div>

        <div style="font-weight: bold;font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 20px !important;">
            <?php echo e(__('shop::app.mail.order.cancel.summary')); ?>

        </div>

        <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
            <?php if($order->shipping_address): ?>
                <div style="line-height: 25px;">
                    <div style="font-weight: bold;font-size: 16px;color: #242424;">
                        <?php echo e(__('shop::app.mail.order.cancel.shipping-address')); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->company_name ?? ''); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->name); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->address1); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->postcode . " " . $order->shipping_address->city); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->state); ?>

                    </div>

                    <div>
                        <?php echo e(core()->country_name($order->shipping_address->country)); ?>

                    </div>

                    <div>---</div>

                    <div style="margin-bottom: 40px;">
                        <?php echo e(__('shop::app.mail.order.cancel.contact')); ?> : <?php echo e($order->shipping_address->phone); ?>

                    </div>

                    <div style="font-size: 16px;color: #242424; font-weight: bold">
                        <?php echo e(__('shop::app.mail.order.cancel.shipping')); ?>

                    </div>

                    <div style="font-size: 16px;color: #242424;">
                        <?php echo e($order->shipping_title); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php if($order->billing_address): ?>
                <div style="line-height: 25px;">
                    <div style="font-weight: bold;font-size: 16px;color: #242424;">
                        <?php echo e(__('shop::app.mail.order.cancel.billing-address')); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->company_name ?? ''); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->address1); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->postcode . " " . $order->billing_address->city); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->state); ?>

                    </div>

                    <div>
                        <?php echo e(core()->country_name($order->billing_address->country)); ?>

                    </div>

                    <div>---</div>

                    <div style="margin-bottom: 40px;">
                        <?php echo e(__('shop::app.mail.order.cancel.contact')); ?> : <?php echo e($order->billing_address->phone); ?>

                    </div>

                    <div style="font-size: 16px; color: #242424; font-weight: bold">
                        <?php echo e(__('shop::app.mail.order.cancel.payment')); ?>

                    </div>

                    <div style="font-size: 16px; color: #242424;">
                        <?php echo e(core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="section-content">
            <div class="table mb-20">
                <table style="overflow-x: auto; border-collapse: collapse;
                border-spacing: 0;width: 100%">
                    <thead>
                    <tr style="background-color: #f2f2f2">
                        <th style="text-align: left;padding: 8px"><?php echo e(__('shop::app.customer.account.order.view.SKU')); ?></th>
                        <th style="text-align: left;padding: 8px"><?php echo e(__('shop::app.customer.account.order.view.product-name')); ?></th>
                        <th style="text-align: left;padding: 8px"><?php echo e(__('shop::app.customer.account.order.view.price')); ?></th>
                        <th style="text-align: left;padding: 8px"><?php echo e(__('shop::app.customer.account.order.view.qty')); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.SKU')); ?>" style="text-align: left;padding: 8px">
                                <?php echo e($item->child ? $item->child->sku : $item->sku); ?>

                            </td>

                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.product-name')); ?>" style="text-align: left;padding: 8px">
                                <?php echo e($item->name); ?>


                                <?php if(isset($item->additional['attributes'])): ?>
                                    <div class="item-options">

                                        <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                <?php endif; ?>
                            </td>

                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.price')); ?>" style="text-align: left;padding: 8px">
                                <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                            </td>

                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.qty')); ?>" style="text-align: left;padding: 8px">
                                <?php echo e($item->qty_canceled); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="font-size: 16px;color: #242424;line-height: 30px;float: right;width: 40%;margin-top: 20px;">
            <div>
                <span><?php echo e(__('shop::app.mail.order.cancel.subtotal')); ?></span>
                <span style="float: right;">
                    <?php echo e(core()->formatPrice($order->sub_total, $order->order_currency_code)); ?>

                </span>
            </div>

            <div>
                <span><?php echo e(__('shop::app.mail.order.cancel.shipping-handling')); ?></span>
                <span style="float: right;">
                    <?php echo e(core()->formatPrice($order->shipping_amount, $order->order_currency_code)); ?>

                </span>
            </div>

            <?php $__currentLoopData = Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($order, false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxRate => $taxAmount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <span id="taxrate-<?php echo e(core()->taxRateAsIdentifier($taxRate)); ?>"><?php echo e(__('shop::app.mail.order.cancel.tax')); ?> <?php echo e($taxRate); ?> %</span>
                    <span id="taxamount-<?php echo e(core()->taxRateAsIdentifier($taxRate)); ?>" style="float: right;">
                    <?php echo e(core()->formatPrice($taxAmount, $order->order_currency_code)); ?>

                </span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($order->discount_amount > 0): ?>
                <div>
                    <span><?php echo e(__('shop::app.mail.order.cancel.discount')); ?></span>
                    <span style="float: right;">
                        <?php echo e(core()->formatPrice($order->discount_amount, $order->order_currency_code)); ?>

                    </span>
                </div>
            <?php endif; ?>

            <div style="font-weight: bold">
                <span><?php echo e(__('shop::app.mail.order.cancel.grand-total')); ?></span>
                <span style="float: right;">
                    <?php echo e(core()->formatPrice($order->grand_total, $order->order_currency_code)); ?>

                </span>
            </div>
        </div>

        <div style="margin-top: 65px;font-size: 16px;color: #5E5E5E;line-height: 24px;display: inline-block">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.order.cancel.final-summary')); ?>

            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo __('shop::app.mail.order.cancel.help', [
                        'support_email' => '<a style="color:#0041FF" href="mailto:' . core()->getAdminEmailDetails()['email'] . '">' . core()->getAdminEmailDetails()['email']. '</a>'
                        ]); ?>

            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.order.cancel.thanks')); ?>

            </p>
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/emails/sales/order-cancel.blade.php ENDPATH**/ ?>