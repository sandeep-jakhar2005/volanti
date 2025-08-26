<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.invoices.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="content full-page">
        <form method="POST" action="<?php echo e(route('admin.sales.invoices.store', $order->id)); ?>" @submit.prevent="onSubmit">
            <?php echo csrf_field(); ?>

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.sales.invoices.index')); ?>'"></i>

                        <?php echo e(__('admin::app.sales.invoices.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.sales.invoices.save-btn-title')); ?>

                    </button>
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
                                                <?php echo e(__('admin::app.sales.invoices.order-id')); ?>

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
                                                <?php echo e($order->customer_full_name); ?>

                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                <?php echo e(__('admin::app.sales.orders.email')); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e($order->customer_email); ?>

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

                                        <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method); ?>

                                        <?php if(! empty($additionalDetails)): ?>
                                            <div class="row">
                                                <span class="title">
                                                    <?php echo e($additionalDetails['title']); ?>

                                                </span>

                                                <span class="value">
                                                    <?php echo e($additionalDetails['value']); ?>

                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if($order->shipping_address): ?>
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
                                <?php endif; ?>
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
                                                <th><?php echo e(__('admin::app.sales.invoices.qty-ordered')); ?></th>
                                                <th><?php echo e(__('admin::app.sales.invoices.qty-to-invoice')); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($item->qty_to_invoice > 0): ?>
                                                    <tr>
                                                        <td><?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?></td>
                                                        <td>
                                                            <?php echo e($item->name); ?>


                                                            <?php if(isset($item->additional['attributes'])): ?>
                                                                <div class="item-options">

                                                                    

                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($item->qty_ordered); ?></td>
                                                        <td>
                                                            <div class="control-group" :class="[errors.has('invoice[items][<?php echo e($item->id); ?>]') ? 'has-error' : '']">

                                                                <input type="text" v-validate="'required|numeric|min:0'" class="control" id="invoice[items][<?php echo e($item->id); ?>]" name="invoice[items][<?php echo e($item->id); ?>]" value="<?php echo e($item->qty_to_invoice); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.sales.invoices.qty-to-invoice')); ?>&quot;"/>
                                                                <span class="control-error" v-if="errors.has('invoice[items][<?php echo e($item->id); ?>]')" v-text="errors.first('invoice[items][<?php echo e($item->id); ?>]')"></span>
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </accordian>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/sales/invoices/create.blade.php ENDPATH**/ ?>