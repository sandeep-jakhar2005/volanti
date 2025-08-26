<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.shipments.view-title', ['shipment_id' => $shipment->id])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <?php $order = $shipment->order; ?>

    <div class="content full-page">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.sales.shipments.index')); ?>'"></i>

                    <?php echo e(__('admin::app.sales.shipments.view-title', ['shipment_id' => $shipment->id])); ?>

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
                                            <?php echo e(__('admin::app.sales.shipments.order-id')); ?>

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
                                            <?php echo e($shipment->order->customer_full_name); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.email')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($shipment->order->customer_email); ?>

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

                                    <?php if(
                                        $shipment->inventory_source
                                        || $shipment->inventory_source_name
                                    ): ?>
                                        <div class="row">
                                            <span class="title">
                                                <?php echo e(__('admin::app.sales.shipments.inventory-source')); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e($shipment->inventory_source ? $shipment->inventory_source->name : $shipment->inventory_source_name); ?>

                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.shipments.carrier-title')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($shipment->carrier_title); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.shipments.tracking-number')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($shipment->track_number); ?>

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
                                            <th><?php echo e(__('admin::app.sales.orders.qty')); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $__currentLoopData = $shipment->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($item->sku); ?></td>
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
                                                <td><?php echo e($item->qty); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </accordian>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/sales/shipments/view.blade.php ENDPATH**/ ?>