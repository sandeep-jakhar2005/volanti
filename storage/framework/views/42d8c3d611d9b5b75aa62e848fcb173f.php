<form data-vv-scope="payment-form" class="payment-form">
    <div class="form-container">
        <accordian :title="'<?php echo e(__('shop::app.checkout.payment-methods')); ?>'" :active="true">
            <div class="form-header mb-30" slot="header">

                <h3 class="fw6 display-inbl">
                   <?php echo e(__('shop::app.checkout.onepage.payment-methods')); ?>

                </h3>

                <i class="rango-arrow"></i>
            </div>

            <div class="payment-methods" slot="body">
                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php echo view_render_event('bagisto.shop.checkout.payment-method.before', ['payment' => $payment]); ?>


                    <div class="row col-12">
                        <div class="radio">
                            <input
                                type="radio"
                                name="payment[method]"
                                v-validate="'required'"
                                v-model="payment.method"
                                @change="methodSelected()"
                                id="<?php echo e($payment['method']); ?>"
                                value="<?php echo e($payment['method']); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.checkout.onepage.payment-method')); ?>&quot;" />
                            
                            <label for="<?php echo e($payment['method']); ?>" class="radio-view"></label>
                        </div>

                        <div class="pl20">
                            <div class="row">
                                <span class="payment-method method-label">
                                <b><?php echo e($payment['method_title']); ?></b>
                                </span>
                            </div>

                            <div class="row">
                            <span class="method-summary"><?php echo e($payment['description']); ?></span>
                            </div>

                            <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($payment['method']); ?>

                            <?php if(! empty($additionalDetails)): ?>
                                <div class="instructions" v-show="payment.method == '<?php echo e($payment['method']); ?>'">
                                    <label><?php echo e($additionalDetails['title']); ?></label>
                                    <p><?php echo e($additionalDetails['value']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php echo view_render_event('bagisto.shop.checkout.payment-method.after', ['payment' => $payment]); ?>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <span class="control-error" v-if="errors.has('payment-form.payment[method]')" v-text="errors.first('payment-form.payment[method]')"></span>
            </div>
        </accordian>
    </div>
</form><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/checkout/onepage/payment.blade.php ENDPATH**/ ?>