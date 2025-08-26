<div class="order-summary">
    <h3><?php echo e(__('shop::app.checkout.total.order-summary')); ?></h3>

    <div class="item-detail">
        <label>
            <?php echo e(intval($cart->items_qty)); ?>

            <?php echo e(__('shop::app.checkout.total.sub-total')); ?>

            <?php echo e(__('shop::app.checkout.total.price')); ?>

        </label>
        <label class="right"><?php echo e(core()->currency($cart->base_sub_total)); ?></label>
    </div>

    <?php if($cart->selected_shipping_rate): ?>
        <div class="item-detail">
            <label><?php echo e(__('shop::app.checkout.total.delivery-charges')); ?></label>
            <label class="right"><?php echo e(core()->currency($cart->selected_shipping_rate->base_price)); ?></label>
        </div>
    <?php endif; ?>

    <?php if($cart->base_tax_total): ?>
        <?php $__currentLoopData = Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($cart, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxRate => $baseTaxAmount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item-detail">
            <label id="taxrate-<?php echo e(core()->taxRateAsIdentifier($taxRate)); ?>"><?php echo e(__('shop::app.checkout.total.tax')); ?> <?php echo e($taxRate); ?> %</label>
            <label class="right" id="basetaxamount-<?php echo e(core()->taxRateAsIdentifier($taxRate)); ?>"><?php echo e(core()->currency($baseTaxAmount)); ?></label>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <div class="item-detail" id="discount-detail" <?php if($cart->base_discount_amount && $cart->base_discount_amount > 0): ?> style="display: block;" <?php else: ?> style="display: none;" <?php endif; ?>>
        <label>
            <?php echo e(__('shop::app.checkout.total.disc-amount')); ?>

        </label>
        <label class="right">
            -<?php echo e(core()->currency($cart->base_discount_amount)); ?>

        </label>
    </div>


    <div class="payable-amount" id="grand-total-detail">
        <label><?php echo e(__('shop::app.checkout.total.grand-total')); ?></label>
        <label class="right" id="grand-total-amount-detail">
            <?php echo e(core()->currency($cart->base_grand_total)); ?>

        </label>
    </div>
</div><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/checkout/total/summary.blade.php ENDPATH**/ ?>