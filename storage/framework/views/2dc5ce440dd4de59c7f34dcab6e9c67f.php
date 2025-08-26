<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.addresses.edit-title')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="content">
        <?php echo view_render_event('admin.customer.addresses.edit.before', ['address' => $address]); ?>


            <form method="post" action="<?php echo e(route('admin.customer.addresses.update', $address->id)); ?>" @submit.prevent="onSubmit">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.customer.addresses.index', ['id' => $address->customer_id])); ?>'"></i>
    
                            <?php echo e(__('admin::app.customers.addresses.edit-title')); ?>

                        </h1>
                    </div>

                    <div class="page-action">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <?php echo e(__('admin::app.customers.addresses.save-btn-title')); ?>

                        </button>
                    </div>
                </div>

                <div class="page-content">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="PUT">

                    <input type="hidden" name="customer_id" value="<?php echo e($address->customer_id); ?>">

                    <accordian title="<?php echo e(__('admin::app.customers.addresses.general')); ?>" :active="true">
                        <div slot="body">

                            <?php $addresses = explode(PHP_EOL, $address->address1); ?>

                            <div class="control-group" :class="[errors.has('company_name') ? 'has-error' : '']">
                                <label for="company_name"><?php echo e(__('shop::app.customer.account.address.create.company_name')); ?></label>
                                <input type="text" class="control" name="company_name" value="<?php echo e(old('company_name') ?: $address->company_name); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.company_name')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('company_name')">{{ errors.first('company_name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                                <label for="first_name" class="required"><?php echo e(__('shop::app.customer.account.address.create.first_name')); ?></label>
                                <input type="text" class="control" name="first_name" v-validate="'required'" value="<?php echo e(old('first_name') ?:$address->first_name); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.first_name')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('first_name')">{{ errors.first('first_name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                                <label for="last_name" class="required"><?php echo e(__('shop::app.customer.account.address.create.last_name')); ?></label>
                                <input type="text" class="control" name="last_name" v-validate="'required'" value="<?php echo e(old('last_name') ?: $address->last_name); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.last_name')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('last_name')">{{ errors.first('last_name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('vat_id') ? 'has-error' : '']">
                                <label for="vat_id"><?php echo e(__('shop::app.customer.account.address.create.vat_id')); ?></label>
                                <input type="text" class="control" name="vat_id" v-validate="" value="<?php echo e(old('vat_id') ?: $address->vat_id); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.vat_id')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('vat_id')">{{ errors.first('vat_id') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('address1[]') ? 'has-error' : '']">
                                <label for="address_0" class="required"><?php echo e(__('shop::app.customer.account.address.edit.street-address')); ?></label>
                                <input type="text" class="control" name="address1[]" id="address_0" v-validate="'required'" value="<?php echo e($addresses[0] ?? ''); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.street-address')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('address1[]')">{{ errors.first('address1[]') }}</span>
                            </div>

                            <?php if(
                                core()->getConfigData('customer.address.information.street_lines')
                                && core()->getConfigData('customer.address.information.street_lines') > 1
                            ): ?>
                                <div class="control-group" style="margin-top: -10px;">
                                    <?php for($i = 1; $i < core()->getConfigData('customer.address.information.street_lines'); $i++): ?>
                                        <input type="text" class="control" name="address1[<?php echo e($i); ?>]" id="address_<?php echo e($i); ?>" value="<?php echo e($addresses[$i] ?? ''); ?>">
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>

                            <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']">
                                <label for="city" class="required"><?php echo e(__('shop::app.customer.account.address.create.city')); ?></label>
                                <input type="text" class="control" name="city" v-validate="'required|regex:^[a-zA-Z \-]*$'" value="<?php echo e(old('city') ?: $address->city); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.city')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('city')">{{ errors.first('city') }}</span>
                            </div>

                            <?php echo $__env->make('admin::customers.country-state', ['countryCode' => old('country') ?? $address->country, 'stateCode' => old('state') ?? $address->state], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="control-group" :class="[errors.has('postcode') ? 'has-error' : '']">
                                <label for="postcode" class="required"><?php echo e(__('shop::app.customer.account.address.create.postcode')); ?></label>
                                <input type="text" class="control" name="postcode" v-validate="'required'" value="<?php echo e(old('postcode') ?: $address->postcode); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.postcode')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('postcode')">{{ errors.first('postcode') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                                <label for="phone" class="required"><?php echo e(__('shop::app.customer.account.address.create.phone')); ?></label>
                                <input type="text" class="control" name="phone" v-validate="'required|numeric'" value="<?php echo e($address->phone); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.phone')); ?>&quot;">
                                <span class="control-error" v-if="errors.has('phone')">{{ errors.first('phone') }}</span>
                            </div>

                            <div class="control-group">
                                <span class="checkbox">
                                    <input type="checkbox" class="control" id="default_address" name="default_address" <?php echo e($address->default_address ? 'checked' : ''); ?> >

                                    <label class="checkbox-view" for="default_address"></label>
                                    <?php echo e(__('admin::app.customers.addresses.default-address')); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </accordian>
            </form>


        <?php echo view_render_event('admin.customer.addresses.edit.after', ['address' => $address]); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/customers/addresses/edit.blade.php ENDPATH**/ ?>