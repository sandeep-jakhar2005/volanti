<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.refunds.view-title', ['refund_id' => $refund->id])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <?php $order = $refund->order; ?>

    <div class="content full-page">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.sales.refunds.index')); ?>'"></i>

                    <?php echo e(__('admin::app.sales.refunds.view-title', ['refund_id' => $refund->id])); ?>

                </h1>
            </div>

            <div class="page-action">
            </div>
        </div>

        <div class="page-content">
            <div class="sale-container">

                <accordian title="<?php echo e(__('admin::app.sales.orders.order-and-account')); ?>" :active="true">
                    <div slot="body">
                        <div class="sale">
                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.orders.order-info')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.refunds.order-id')); ?>

                                        </span>

                                        <span class="value">
                                            <a href="<?php echo e(route('admin.sales.orders.view', $order->id)); ?>">#<?php echo e($order->increment_id); ?></a>
                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.order-date')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e(core()->formatDate($order->created_at, 'Y-m-d H:i:s')); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.order-status')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->status_label); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.channel')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->channel_name); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.orders.account-info')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.customer-name')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($refund->order->customer_full_name); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.email')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($refund->order->customer_email); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </accordian>

                <?php if(
                    $order->billing_address
                    || $order->shipping_address
                ): ?>
                    <accordian title="<?php echo e(__('admin::app.sales.orders.address')); ?>" :active="true">
                        <div slot="body">
                            <div class="sale">
                                <?php if($order->billing_address): ?>
                                    <div class="sale-section">
                                        <div class="secton-title">
                                            <span><?php echo e(__('admin::app.sales.orders.billing-address')); ?></span>
                                        </div>

                                        <div class="section-content">

                                            <?php echo $__env->make('admin::sales.address', ['address' => $order->billing_address], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($order->shipping_address): ?>
                                    <div class="sale-section">
                                        <div class="secton-title">
                                            <span><?php echo e(__('admin::app.sales.orders.shipping-address')); ?></span>
                                        </div>

                                        <div class="section-content">

                                            <?php echo $__env->make('admin::sales.address', ['address' => $order->shipping_address], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </accordian>
                <?php endif; ?>

                <accordian title="<?php echo e(__('admin::app.sales.orders.payment-and-shipping')); ?>" :active="true">
                    <div slot="body">
                        <div class="sale">
                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.orders.payment-info')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.payment-method')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e(core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title')); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.currency')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->order_currency_code); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.orders.shipping-info')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.shipping-method')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->shipping_title); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.shipping-price')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </accordian>

                <accordian title="<?php echo e(__('admin::app.sales.orders.products-ordered')); ?>" :active="true">
                    <div slot="body">

                        <div class="table">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('admin::app.sales.orders.SKU')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.product-name')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.price')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.qty')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.subtotal')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.tax-amount')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.discount-amount')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.grand-total')); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $__currentLoopData = $refund->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($item->child ? $item->child->sku : $item->sku); ?></td>

                                                <td>
                                                    <?php echo e($item->name); ?>


                                                    <?php if(isset($item->additional['attributes'])): ?>
                                                        <div class="item-options">

                                                            <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?php echo e(core()->formatBasePrice($item->base_price)); ?></td>

                                                <td><?php echo e($item->qty); ?></td>

                                                <td><?php echo e(core()->formatBasePrice($item->base_total)); ?></td>

                                                <td><?php echo e(core()->formatBasePrice($item->base_tax_amount)); ?></td>

                                                <td><?php echo e(core()->formatBasePrice($item->base_discount_amount)); ?></td>

                                                <td><?php echo e(core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if(! $refund->items->count()): ?>
                                            <tr>
                                                <td class="empty" colspan="7"><?php echo e(__('admin::app.common.no-result-found')); ?></td>
                                            <tr>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <table class="sale-summary">
                            <tr>
                                <td><?php echo e(__('admin::app.sales.orders.subtotal')); ?></td>
                                <td>-</td>
                                <td><?php echo e(core()->formatBasePrice($refund->base_sub_total)); ?></td>
                            </tr>

                            <?php if($refund->base_shipping_amount > 0): ?>
                                <tr>
                                    <td><?php echo e(__('admin::app.sales.orders.shipping-handling')); ?></td>
                                    <td>-</td>
                                    <td><?php echo e(core()->formatBasePrice($refund->base_shipping_amount)); ?></td>
                                </tr>
                            <?php endif; ?>

                            <?php if($refund->base_tax_amount > 0): ?>
                                <tr>
                                    <td><?php echo e(__('admin::app.sales.orders.tax')); ?></td>
                                    <td>-</td>
                                    <td><?php echo e(core()->formatBasePrice($refund->base_tax_amount)); ?></td>
                                </tr>
                            <?php endif; ?>

                            <?php if($refund->base_discount_amount > 0): ?>
                                <tr>
                                    <td><?php echo e(__('admin::app.sales.orders.discount')); ?></td>
                                    <td>-</td>
                                    <td>-<?php echo e(core()->formatBasePrice($refund->base_discount_amount)); ?></td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <td><?php echo e(__('admin::app.sales.refunds.adjustment-refund')); ?></td>
                                <td>-</td>
                                <td><?php echo e(core()->formatBasePrice($refund->base_adjustment_refund)); ?></td>
                            </tr>

                            <tr>
                                <td><?php echo e(__('admin::app.sales.refunds.adjustment-fee')); ?></td>
                                <td>-</td>
                                <td><?php echo e(core()->formatBasePrice($refund->base_adjustment_fee)); ?></td>
                            </tr>

                            <tr class="bold">
                                <td><?php echo e(__('admin::app.sales.orders.grand-total')); ?></td>
                                <td>-</td>
                                <td><?php echo e(core()->formatBasePrice($refund->base_grand_total)); ?></td>
                            </tr>
                        </table>

                    </div>
                </accordian>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/sales/refunds/view.blade.php ENDPATH**/ ?>