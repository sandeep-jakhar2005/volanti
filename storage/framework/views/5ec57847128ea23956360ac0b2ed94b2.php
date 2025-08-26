<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.address.edit.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <div class="account-head mb-15">
            <span class="back-icon">
                <a href="<?php echo e(route('shop.customer.addresses.index')); ?>"><i class="icon icon-menu-back"></i></a>
            </span>

            <span class="account-heading"><?php echo e(__('shop::app.customer.account.address.edit.title')); ?></span>

            <span></span>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.address.edit.before', ['address' => $address]); ?>


        <form id="customer-address-form" method="post" action="<?php echo e(route('shop.customer.addresses.update', $address->id)); ?>" @submit.prevent="onSubmit">

            <div class="account-table-content">
                <?php echo method_field('PUT'); ?>

                <?php echo csrf_field(); ?>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.before', ['address' => $address]); ?>


                <div class="control-group" :class="[errors.has('company_name') ? 'has-error' : '']">
                    <label for="company_name"><?php echo e(__('shop::app.customer.account.address.edit.company_name')); ?></label>

                    <input
                        class="control"
                        type="text"
                        name="company_name"
                        value="<?php echo e(old('company_name') ?: $address->company_name); ?>"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.edit.company_name')); ?>&quot;">

                    <span
                        class="control-error"
                        v-text="errors.first('company_name')"
                        v-if="errors.has('company_name')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.company_name.after'); ?>


                <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                    <label for="first_name" class="required"><?php echo e(__('shop::app.customer.account.address.create.first_name')); ?></label>

                    <input
                        class="control"
                        type="text"
                        name="first_name"
                        value="<?php echo e(old('first_name') ?: $address->first_name); ?>"
                        v-validate="'required'"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.first_name')); ?>&quot;">

                    <span
                        class="control-error"
                        v-text="errors.first('first_name')"
                        v-if="errors.has('first_name')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.first_name.after'); ?>


                <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                    <label for="last_name" class="required"><?php echo e(__('shop::app.customer.account.address.create.last_name')); ?></label>

                    <input
                        class="control"
                        type="text"
                        name="last_name"
                        value="<?php echo e(old('last_name') ?: $address->last_name); ?>"
                        v-validate="'required'"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.last_name')); ?>&quot;">

                    <span
                        class="control-error"
                        v-text="errors.first('last_name')"
                        v-if="errors.has('last_name')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.last_name.after'); ?>


                <div class="control-group" :class="[errors.has('vat_id') ? 'has-error' : '']">
                    <label for="vat_id"><?php echo e(__('shop::app.customer.account.address.create.vat_id')); ?>

                        <span class="help-note"><?php echo e(__('shop::app.customer.account.address.create.vat_help_note')); ?></span>
                    </label>

                    <input
                        class="control"
                        type="text"
                        name="vat_id"
                        value="<?php echo e(old('vat_id') ?: $address->vat_id); ?>"
                        v-validate="''"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.vat_id')); ?>&quot;">

                    <span
                        class="control-error"
                        v-text="errors.first('vat_id')"
                        v-if="errors.has('vat_id')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.vat_id.after'); ?>


                <?php $addresses = explode(PHP_EOL, $address->address1); ?>

                <div class="control-group <?php echo e($errors->has('address1.*') ? 'has-error' : ''); ?>">
                    <label for="address_0" class="required"><?php echo e(__('shop::app.customer.account.address.edit.street-address')); ?></label>

                    <input
                        class="control"
                        id="address_0"
                        type="text"
                        name="address1[]"
                        value="<?php echo e($addresses[0] ?? ''); ?>"
                        v-validate="'required'"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.street-address')); ?>&quot;">

                    <span class="control-error"><?php echo e($errors->first('address1.*')); ?></span>
                </div>

                <?php if(
                    core()->getConfigData('customer.address.information.street_lines')
                    && core()->getConfigData('customer.address.information.street_lines') > 1
                ): ?>
                    <div class="control-group" style="margin-top: -10px;">
                        <?php for($i = 1; $i < core()->getConfigData('customer.address.information.street_lines'); $i++): ?>
                            <input
                                class="control"
                                id="address_<?php echo e($i); ?>"
                                type="text"
                                name="address1[<?php echo e($i); ?>]"
                                value="<?php echo e($addresses[$i] ?? ''); ?>">
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.street-addres.after'); ?>


                <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']">
                    <label for="city" class="required"><?php echo e(__('shop::app.customer.account.address.create.city')); ?></label>

                    <input
                        class="control"
                        type="text"
                        name="city"
                        value="<?php echo e(old('city') ?: $address->city); ?>"
                        v-validate="'required|regex:^[a-zA-Z \-]*$'"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.city')); ?>&quot;">

                    <span
                        class="control-error"
                        v-text="errors.first('city')"
                        v-if="errors.has('city')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.create.after'); ?>


                <?php echo $__env->make('shop::customers.account.address.country-state', ['countryCode' => old('country') ?? $address->country, 'stateCode' => old('state') ?? $address->state], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.country-state.after'); ?>


                <div class="control-group" :class="[errors.has('postcode') ? 'has-error' : '']">
                    <label for="postcode" class="<?php echo e(core()->isPostCodeRequired() ? 'required' : ''); ?>"><?php echo e(__('shop::app.customer.account.address.create.postcode')); ?></label>

                    <input
                        type="text"
                        class="control"
                        name="postcode"
                        v-validate="'<?php echo e(core()->isPostCodeRequired() ? 'required' : ''); ?>'"
                        value="<?php echo e(old('postcode') ?: $address->postcode); ?>"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.postcode')); ?>&quot;">

                    <span
                        class="control-error"
                        v-text="errors.first('postcode')"
                        v-if="errors.has('postcode')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.postcode.after'); ?>


                <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                    <label for="phone" class="required"><?php echo e(__('shop::app.customer.account.address.create.phone')); ?></label>

                    <input
                        class="control"
                        type="text"
                        name="phone"
                        value="<?php echo e(old('phone') ?: $address->phone); ?>"
                        v-validate="'required'"
                        data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.phone')); ?>&quot;">

                    <span
                        class="control-error"
                        v-text="errors.first('phone')"
                        v-if="errors.has('phone')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.address.edit_form_controls.after', ['address' => $address]); ?>


                <div class="control-group">
                    <span class="checkbox">
                        <input
                            class="control"
                            id="default_address"
                            type="checkbox"
                            name="default_address"
                            <?php echo e($address->default_address ? 'checked' : ''); ?>>

                        <label class="checkbox-view" for="default_address"></label>

                        <?php echo e(__('shop::app.customer.account.address.default-address')); ?>

                    </span>
                </div>

                <div class="button-group">
                    <button class="btn btn-primary btn-lg" type="submit">
                        <?php echo e(__('shop::app.customer.account.address.create.submit')); ?>

                    </button>
                </div>
            </div>
        </form>

        <?php echo view_render_event('bagisto.shop.customers.account.address.edit.after', ['address' => $address]); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/address/edit.blade.php ENDPATH**/ ?>