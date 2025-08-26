<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.order.view.page-tile', ['order_id' => $order->increment_id])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .account-content .account-layout .account-head {
            margin-bottom: 0px;
        }
        .sale-summary .dash-icon {
            margin-right: 30px;
            float: right;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-detail-wrapper'); ?>
    <div class="account-head">
        <span class="account-heading">
            <?php echo e(__('shop::app.customer.account.order.view.page-tile', ['order_id' => $order->increment_id])); ?>

        </span>

        <?php if($order->canCancel()): ?>
            <span class="account-action">
                <form id="cancelOrderForm" action="<?php echo e(route('shop.customer.orders.cancel', $order->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                </form>

                <a href="javascript:void(0);" class="theme-btn light unset float-right" onclick="cancelOrder('<?php echo e(__('shop::app.customer.account.order.view.cancel-confirm-msg')); ?>')" style="float: right">
                    <?php echo e(__('shop::app.customer.account.order.view.cancel-btn-title')); ?>

                </a>
            </span>
        <?php endif; ?>
    </div>

    <?php echo view_render_event('bagisto.shop.customers.account.orders.view.before', ['order' => $order]); ?>


    <div class="sale-container mt10">
        <tabs>
            <tab name="<?php echo e(__('shop::app.customer.account.order.view.info')); ?>" :selected="true">

                <div class="sale-section">
                    <div class="section-content">
                        <div class="row col-12">
                            <label class="mr20">
                                <?php echo e(__('shop::app.customer.account.order.view.placed-on')); ?>

                            </label>

                            <span class="value">
                                <?php echo e(core()->formatDate($order->created_at, 'd M Y')); ?>

                            </span>
                        </div>
                    </div>
                </div>

                <div class="sale-section">
                    <div class="section-title">
                        <span><?php echo e(__('shop::app.customer.account.order.view.products-ordered')); ?></span>
                    </div>

                    <div class="section-content">
                    <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.SKU')); ?></th>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.product-name')); ?></th>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.price')); ?></th>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.item-status')); ?></th>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?></th>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.tax-percent')); ?></th>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.tax-amount')); ?></th>
                                        <th><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.SKU')); ?>">
                                                <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                                            </td>

                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.product-name')); ?>">
                                                <?php echo e($item->name); ?>


                                                <?php if(isset($item->additional['attributes'])): ?>
                                                    <div class="item-options">

                                                        <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>

                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.price')); ?>">
                                                <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                            </td>

                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.item-status')); ?>">
                                                <span class="qty-row">
                                                    <?php echo e(__('shop::app.customer.account.order.view.item-ordered', ['qty_ordered' => $item->qty_ordered])); ?>

                                                </span>

                                                <span class="qty-row">
                                                    <?php echo e($item->qty_invoiced ? __('shop::app.customer.account.order.view.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : ''); ?>

                                                </span>

                                                <span class="qty-row">
                                                    <?php echo e($item->qty_shipped ? __('shop::app.customer.account.order.view.item-shipped', ['qty_shipped' => $item->qty_shipped]) : ''); ?>

                                                </span>

                                                <span class="qty-row">
                                                    <?php echo e($item->qty_refunded ? __('shop::app.customer.account.order.view.item-refunded', ['qty_refunded' => $item->qty_refunded]) : ''); ?>

                                                </span>

                                                <span class="qty-row">
                                                    <?php echo e($item->qty_canceled ? __('shop::app.customer.account.order.view.item-canceled', ['qty_canceled' => $item->qty_canceled]) : ''); ?>

                                                </span>
                                            </td>

                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?>">
                                                <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                            </td>

                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.tax-percent')); ?>">
                                                <?php echo e(number_format($item->tax_percent, 2)); ?>%
                                            </td>

                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.tax-amount')); ?>">
                                                <?php echo e(core()->formatPrice($item->tax_amount, $order->order_currency_code)); ?>

                                            </td>

                                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?>">
                                                <?php echo e(core()->formatPrice($item->total + $item->tax_amount - $item->discount_amount, $order->order_currency_code)); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="totals">
                            <table class="sale-summary">
                                <tbody>
                                    <tr>
                                        <td><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?>

                                            <span class="dash-icon">-</span>
                                        </td>
                                        <td><?php echo e(core()->formatPrice($order->sub_total, $order->order_currency_code)); ?></td>
                                    </tr>

                                    <?php if($order->haveStockableItems()): ?>
                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.shipping-handling')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($order->shipping_amount, $order->order_currency_code)); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if($order->base_discount_amount > 0): ?>
                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.coupon')); ?>

                                                <?php if($order->coupon_code): ?>
                                                    (<?php echo e($order->coupon_code); ?>)
                                                <?php endif; ?>
                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($order->discount_amount, $order->order_currency_code)); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr class="border-bottom">
                                        <td><?php echo e(__('shop::app.customer.account.order.view.tax')); ?>

                                            <span class="dash-icon">-</span>
                                        </td>
                                        <td><?php echo e(core()->formatPrice($order->tax_amount, $order->order_currency_code)); ?></td>
                                    </tr>

                                    <tr class="fw6">
                                        <td><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?>

                                            <span class="dash-icon">-</span>
                                        </td>
                                        <td><?php echo e(core()->formatPrice($order->grand_total, $order->order_currency_code)); ?></td>
                                    </tr>

                                    <tr class="fw6">
                                        <td><?php echo e(__('shop::app.customer.account.order.view.total-paid')); ?>

                                            <span class="dash-icon">-</span>
                                        </td>
                                        <td><?php echo e(core()->formatPrice($order->grand_total_invoiced, $order->order_currency_code)); ?></td>
                                    </tr>

                                    <tr class="fw6">
                                        <td><?php echo e(__('shop::app.customer.account.order.view.total-refunded')); ?>

                                            <span class="dash-icon">-</span>
                                        </td>
                                        <td><?php echo e(core()->formatPrice($order->grand_total_refunded, $order->order_currency_code)); ?></td>
                                    </tr>

                                    <tr class="fw6">
                                        <td><?php echo e(__('shop::app.customer.account.order.view.total-due')); ?>

                                            <span class="dash-icon">-</span>
                                        </td>

                                        <?php if($order->status !== 'canceled'): ?>
                                            <td><?php echo e(core()->formatPrice($order->total_due, $order->order_currency_code)); ?></td>
                                        <?php else: ?>
                                            <td><?php echo e(core()->formatPrice(0.00, $order->order_currency_code)); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </tab>

            <?php if($order->invoices->count()): ?>
                <tab name="<?php echo e(__('shop::app.customer.account.order.view.invoices')); ?>">

                    <?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="sale-section">
                            <div class="section-title">
                                <span><?php echo e(__('shop::app.customer.account.order.view.individual-invoice', ['invoice_id' => $invoice->increment_id ?? $invoice->id])); ?></span>

                                <a href="<?php echo e(route('shop.customer.orders.print', $invoice->id)); ?>" class="float-right">
                                    <?php echo e(__('shop::app.customer.account.order.view.print')); ?>

                                </a>
                            </div>

                            <div class="section-content">
                                <div class="table-responsive">
                                    <div class="table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('shop::app.customer.account.order.view.SKU')); ?></th>
                                                    <th><?php echo e(__('shop::app.customer.account.order.view.product-name')); ?></th>
                                                    <th><?php echo e(__('shop::app.customer.account.order.view.price')); ?></th>
                                                    <th><?php echo e(__('shop::app.customer.account.order.view.qty')); ?></th>
                                                    <th><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?></th>
                                                    <th><?php echo e(__('shop::app.customer.account.order.view.tax-amount')); ?></th>
                                                    <th><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?></th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td data-value="<?php echo e(__('shop::app.customer.account.order.view.SKU')); ?>">
                                                            <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                                                        </td>

                                                        <td data-value="<?php echo e(__('shop::app.customer.account.order.view.product-name')); ?>">
                                                            <?php echo e($item->name); ?>

                                                        </td>

                                                        <td data-value="<?php echo e(__('shop::app.customer.account.order.view.price')); ?>">
                                                            <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                        </td>

                                                        <td data-value="<?php echo e(__('shop::app.customer.account.order.view.qty')); ?>">
                                                            <?php echo e($item->qty); ?>

                                                        </td>

                                                        <td data-value="<?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?>">
                                                            <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                        </td>

                                                        <td data-value="<?php echo e(__('shop::app.customer.account.order.view.tax-amount')); ?>">
                                                            <?php echo e(core()->formatPrice($item->tax_amount, $order->order_currency_code)); ?>

                                                        </td>

                                                        <td data-value="<?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?>">
                                                            <?php echo e(core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code)); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="totals">
                                    <table class="sale-summary">
                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($invoice->sub_total, $order->order_currency_code)); ?></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.shipping-handling')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($invoice->shipping_amount, $order->order_currency_code)); ?></td>
                                        </tr>

                                        <?php if($invoice->base_discount_amount > 0): ?>
                                            <tr>
                                                <td><?php echo e(__('shop::app.customer.account.order.view.discount')); ?>

                                                    <span class="dash-icon">-</span>
                                                </td>
                                                <td><?php echo e(core()->formatPrice($invoice->discount_amount, $order->order_currency_code)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.tax')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($invoice->tax_amount, $order->order_currency_code)); ?></td>
                                        </tr>

                                        <tr class="fw6">
                                            <td><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($invoice->grand_total, $order->order_currency_code)); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tab>
            <?php endif; ?>

            <?php if($order->shipments->count()): ?>
                <tab name="<?php echo e(__('shop::app.customer.account.order.view.shipments')); ?>">

                    <?php $__currentLoopData = $order->shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="sale-section">
                            <div class="section-content">
                                <div class="row col-12">
                                    <label class="mr20">
                                    <?php echo e(__('shop::app.customer.account.order.view.tracking-number')); ?>

                                    </label>

                                    <span class="value">
                                        <?php echo e($shipment->track_number); ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="sale-section">
                            <div class="section-title">
                                <span><?php echo e(__('shop::app.customer.account.order.view.individual-shipment', ['shipment_id' => $shipment->id])); ?></span>
                            </div>

                            <div class="section-content">

                                <div class="table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.SKU')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.product-name')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.qty')); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $__currentLoopData = $shipment->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.SKU')); ?>"><?php echo e($item->sku); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.product-name')); ?>"><?php echo e($item->name); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.qty')); ?>"><?php echo e($item->qty); ?></td>
                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tab>
            <?php endif; ?>

            <?php if($order->refunds->count()): ?>
                <tab name="<?php echo e(__('shop::app.customer.account.order.view.refunds')); ?>">

                    <?php $__currentLoopData = $order->refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="sale-section">
                            <div class="section-title">
                                <span><?php echo e(__('shop::app.customer.account.order.view.individual-refund', ['refund_id' => $refund->id])); ?></span>
                            </div>

                            <div class="section-content">
                                <div class="table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.SKU')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.product-name')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.price')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.qty')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.tax-amount')); ?></th>
                                                <th><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $__currentLoopData = $refund->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.SKU')); ?>"><?php echo e($item->child ? $item->child->sku : $item->sku); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.product-name')); ?>"><?php echo e($item->name); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.price')); ?>"><?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.qty')); ?>"><?php echo e($item->qty); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?>"><?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.tax-amount')); ?>"><?php echo e(core()->formatPrice($item->tax_amount, $order->order_currency_code)); ?></td>
                                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?>"><?php echo e(core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if(! $refund->items->count()): ?>
                                                <tr>
                                                    <td class="empty" colspan="7"><?php echo e(__('shop::app.common.no-result-found')); ?></td>
                                                <tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="totals">
                                    <table class="sale-summary">
                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($refund->sub_total, $order->order_currency_code)); ?></td>
                                        </tr>

                                        <?php if($refund->shipping_amount > 0): ?>
                                            <tr>
                                                <td><?php echo e(__('shop::app.customer.account.order.view.shipping-handling')); ?>

                                                    <span class="dash-icon">-</span>
                                                </td>
                                                <td><?php echo e(core()->formatPrice($refund->shipping_amount, $order->order_currency_code)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($refund->discount_amount > 0): ?>
                                            <tr>
                                                <td><?php echo e(__('shop::app.customer.account.order.view.discount')); ?>

                                                    <span class="dash-icon">-</span>
                                                </td>
                                                <td><?php echo e(core()->formatPrice($order->discount_amount, $order->order_currency_code)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($refund->tax_amount > 0): ?>
                                            <tr>
                                                <td><?php echo e(__('shop::app.customer.account.order.view.tax')); ?>

                                                    <span class="dash-icon">-</span>
                                                </td>
                                                <td><?php echo e(core()->formatPrice($refund->tax_amount, $order->order_currency_code)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.adjustment-refund')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($refund->adjustment_refund, $order->order_currency_code)); ?></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo e(__('shop::app.customer.account.order.view.adjustment-fee')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($refund->adjustment_fee, $order->order_currency_code)); ?></td>
                                        </tr>

                                        <tr class="fw6">
                                            <td><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?>

                                                <span class="dash-icon">-</span>
                                            </td>
                                            <td><?php echo e(core()->formatPrice($refund->grand_total, $order->order_currency_code)); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tab>
            <?php endif; ?>
        </tabs>

        <div class="sale-section">
            <div class="section-content" style="border-bottom: 0">
                <div class="order-box-container">
                    <?php if($order->billing_address): ?>
                        <div class="box">
                            <div class="box-title">
                                <?php echo e(__('shop::app.customer.account.order.view.billing-address')); ?>

                            </div>

                            <div class="box-content">
                                <?php echo $__env->make('admin::sales.address', ['address' => $order->billing_address], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.billing-address.after', ['order' => $order]); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($order->shipping_address): ?>
                        <div class="box">
                            <div class="box-title">
                                <?php echo e(__('shop::app.customer.account.order.view.shipping-address')); ?>

                            </div>

                            <div class="box-content">
                                <?php echo $__env->make('admin::sales.address', ['address' => $order->shipping_address], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping-address.after', ['order' => $order]); ?>

                            </div>
                        </div>

                        <div class="box">
                            <div class="box-title">
                                <?php echo e(__('shop::app.customer.account.order.view.shipping-method')); ?>

                            </div>

                            <div class="box-content">
                                <?php echo e($order->shipping_title); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping-method.after', ['order' => $order]); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="box">
                        <div class="box-title">
                            <?php echo e(__('shop::app.customer.account.order.view.payment-method')); ?>

                        </div>

                        <div class="box-content">
                            <?php echo e(core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title')); ?>


                            <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method); ?>

                            <?php if(! empty($additionalDetails)): ?>
                                <div class="instructions">
                                    <label><?php echo e($additionalDetails['title']); ?></label>
                                    <p><?php echo e($additionalDetails['value']); ?></p>
                                </div>
                            <?php endif; ?>

                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.payment-method.after', ['order' => $order]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo view_render_event('bagisto.shop.customers.account.orders.view.after', ['order' => $order]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function cancelOrder(message) {
            if (! confirm(message)) {
                return;
            }

            $('#cancelOrderForm').submit();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/customers/account/orders/view.blade.php ENDPATH**/ ?>