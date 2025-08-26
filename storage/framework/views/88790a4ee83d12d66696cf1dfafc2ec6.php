<country-state></country-state>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="country-state-template">
        <div>
            <div class="control-group" :class="[errors.has('country') ? 'has-error' : '']">
                <label for="country" class="<?php echo e(core()->isCountryRequired() ? 'required' : ''); ?>">
                    <?php echo e(__('shop::app.customer.account.address.create.country')); ?>

                </label>

                <select
                    class="control"
                    id="country"
                    type="text"
                    name="country"
                    v-model="country"
                    v-validate="'<?php echo e(core()->isCountryRequired() ? 'required' : ''); ?>'"
                    data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.country')); ?>&quot;">
                    <option value=""></option>

                    <?php $__currentLoopData = core()->countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($country->code === $defaultCountry ? 'selected' : ''); ?>  value="<?php echo e($country->code); ?>"><?php echo e($country->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <span
                    class="control-error"
                    v-text="errors.first('country')"
                    v-if="errors.has('country')">
                </span>
            </div>

            <div class="control-group" :class="[errors.has('state') ? 'has-error' : '']">
                <label for="state" class="<?php echo e(core()->isStateRequired() ? 'required' : ''); ?>">
                    <?php echo e(__('shop::app.customer.account.address.create.state')); ?>

                </label>

                <input
                    class="control"
                    id="state"
                    type="text"
                    name="state"
                    v-model="state"
                    v-validate="'<?php echo e(core()->isStateRequired() ? 'required' : ''); ?>'"
                    data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.state')); ?>&quot;"
                    v-if="! haveStates()"/>

                <select
                    class="control"
                    id="state"
                    name="state"
                    v-model="state"
                    v-validate="'<?php echo e(core()->isStateRequired() ? 'required' : ''); ?>'"
                    data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.state')); ?>&quot;"
                    v-if="haveStates()">
                    <option value=""><?php echo e(__('shop::app.customer.account.address.create.select-state')); ?></option>

                    <option v-for='(state, index) in countryStates[country]' :value="state.code">
                        {{ state.default_name }}
                    </option>
                </select>

                <span class="control-error" v-if="errors.has('state')">
                    {{ errors.first('state') }}
                </span>
            </div>
        </div>
    </script>

    <script>
        Vue.component('country-state', {
            template: '#country-state-template',

            inject: ['$validator'],

            data() {
                return {
                    country: "<?php echo e($countryCode ?? $defaultCountry); ?>",

                    state: "<?php echo e($stateCode); ?>",

                    countryStates: <?php echo json_encode(core()->groupedStatesByCountries(), 15, 512) ?>
                }
            },

            methods: {
                haveStates() {
                    if (this.countryStates[this.country] && this.countryStates[this.country].length)
                        return true;

                    return false;
                },
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/address/country-state.blade.php ENDPATH**/ ?>