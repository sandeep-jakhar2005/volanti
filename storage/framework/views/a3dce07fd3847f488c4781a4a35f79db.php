<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.promotions.cart-rules.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <cart-rule></cart-rule>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="cart-rule-template">
        <div>
            <form method="POST" action="<?php echo e(route('admin.cart_rules.store')); ?>" @submit.prevent="onSubmit">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            <i class="icon angle-left-icon back-link"
                            onclick="window.location = '<?php echo e(route('admin.cart_rules.index')); ?>'"></i>

                            <?php echo e(__('admin::app.promotions.cart-rules.add-title')); ?>

                        </h1>
                    </div>

                    <div class="page-action">
                        <button type="submit" class="btn btn-lg btn-primary">
                            <?php echo e(__('admin::app.promotions.cart-rules.save-btn-title')); ?>

                        </button>
                    </div>
                </div>

                <div class="page-content">
                    <div class="form-container">
                        <?php echo csrf_field(); ?>

                        <?php echo view_render_event('bagisto.admin.promotions.cart-rules.create.before'); ?>


                        <accordian title="<?php echo e(__('admin::app.promotions.cart-rules.rule-information')); ?>" :active="true">
                            <div slot="body">

                                <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                    <label for="name" class="required"><?php echo e(__('admin::app.promotions.cart-rules.name')); ?></label>
                                    <input v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.name')); ?>&quot;" value="<?php echo e(old('name')); ?>"/>
                                    <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                                </div>

                                <div class="control-group">
                                    <label for="description"><?php echo e(__('admin::app.promotions.cart-rules.description')); ?></label>
                                    <textarea class="control" id="description" name="description"><?php echo e(old('description')); ?></textarea>
                                </div>

                                <div class="control-group">
                                    <label for="status"><?php echo e(__('admin::app.promotions.cart-rules.status')); ?></label>

                                    <label class="switch">
                                        <input type="checkbox" id="status" name="status" value="1" <?php echo e(old('status') ? 'checked' : ''); ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="control-group multi-select" :class="[errors.has('channels[]') ? 'has-error' : '']">
                                    <label for="channels" class="required"><?php echo e(__('admin::app.promotions.cart-rules.channels')); ?></label>

                                    <select class="control" id="channels" name="channels[]" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.channels')); ?>&quot;" multiple="multiple">

                                        <?php $__currentLoopData = core()->getAllChannels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($channel->id); ?>" <?php echo e(old('channels') && in_array($channel->id, old('channels')) ? 'selected' : ''); ?>>
                                                <?php echo e(core()->getChannelName($channel)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                    <span class="control-error" v-if="errors.has('channels[]')">{{ errors.first('channels[]') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('customer_groups[]') ? 'has-error' : '']">
                                    <label for="customer_groups" class="required"><?php echo e(__('admin::app.promotions.cart-rules.customer-groups')); ?></label>

                                    <select class="control" id="customer_groups" name="customer_groups[]" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.customer-groups')); ?>&quot;" multiple="multiple">

                                        <?php $__currentLoopData = app('Webkul\Customer\Repositories\CustomerGroupRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($customerGroup->id); ?>" <?php echo e(old('customer_groups') && in_array($customerGroup->id, old('customer_groups')) ? 'selected' : ''); ?>>
                                                <?php echo e($customerGroup->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                    <span class="control-error" v-if="errors.has('customer_groups[]')">{{ errors.first('customer_groups[]') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('coupon_type') ? 'has-error' : '']">
                                    <label for="coupon_type" class="required"><?php echo e(__('admin::app.promotions.cart-rules.coupon-type')); ?></label>

                                    <select class="control" id="coupon_type" name="coupon_type" v-model="coupon_type" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.coupon-type')); ?>&quot;">
                                        <option value="0" <?php echo e(old('coupon_type') == 0 ? 'selected' : ''); ?>><?php echo e(__('admin::app.promotions.cart-rules.no-coupon')); ?></option>
                                        <option value="1" <?php echo e(old('coupon_type') == 1 ? 'selected' : ''); ?>><?php echo e(__('admin::app.promotions.cart-rules.specific-coupon')); ?></option>
                                    </select>

                                    <span class="control-error" v-if="errors.has('coupon_type')">{{ errors.first('coupon_type') }}</span>
                                </div>

                                <div v-if="parseInt(coupon_type)">
                                    <div class="control-group" :class="[errors.has('use_auto_generation') ? 'has-error' : '']">
                                        <label for="use_auto_generation" class="required"><?php echo e(__('admin::app.promotions.cart-rules.auto-generate-coupon')); ?></label>

                                        <select class="control" id="use_auto_generation" name="use_auto_generation" v-model="use_auto_generation" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.auto-generate-coupon')); ?>&quot;">
                                            <option value="0"><?php echo e(__('admin::app.promotions.cart-rules.no')); ?></option>
                                            <option value="1"><?php echo e(__('admin::app.promotions.cart-rules.yes')); ?></option>
                                        </select>

                                        <span class="control-error" v-if="errors.has('use_auto_generation')">{{ errors.first('use_auto_generation') }}</span>
                                    </div>

                                    <div v-if="! parseInt(use_auto_generation)">
                                        <div class="control-group" :class="[errors.has('coupon_code') ? 'has-error' : '']">
                                            <label for="coupon_code" class="required"><?php echo e(__('admin::app.promotions.cart-rules.coupon-code')); ?></label>
                                            <input v-validate="'required'" class="control" id="coupon_code" name="coupon_code" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.coupon-code')); ?>&quot;" value="<?php echo e(old('coupon_code')); ?>"/>
                                            <span class="control-error" v-if="errors.has('coupon_code')">{{ errors.first('coupon_code') }}</span>
                                        </div>
                                    </div>

                                    <div class="control-group" :class="[errors.has('uses_per_coupon') ? 'has-error' : '']">
                                        <label for="uses_per_coupon"><?php echo e(__('admin::app.promotions.cart-rules.uses-per-coupon')); ?></label>
                                        <input v-validate="'numeric'" class="control" id="uses_per_coupon" name="uses_per_coupon" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.uses-per-coupon')); ?>&quot;"  value="<?php echo e(old('uses_per_coupon')); ?>"/>
                                        <span class="control-error" v-if="errors.has('uses_per_coupon')">{{ errors.first('uses_per_coupon') }}</span>
                                    </div>
                                </div>

                                <div class="control-group" :class="[errors.has('usage_per_customer') ? 'has-error' : '']">
                                    <label for="usage_per_customer"><?php echo e(__('admin::app.promotions.cart-rules.uses-per-customer')); ?></label>
                                    <input v-validate="'numeric'" class="control" id="usage_per_customer" name="usage_per_customer" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.uses-per-customer')); ?>&quot;"  value="<?php echo e(old('usage_per_customer')); ?>"/>
                                    <span class="control-info"><?php echo e(__('admin::app.promotions.cart-rules.uses-per-customer-control-info')); ?></span>
                                    <span class="control-error" v-if="errors.has('usage_per_customer')">{{ errors.first('usage_per_customer') }}</span>
                                </div>

                                <div class="control-group date">
                                    <label for="starts_from"><?php echo e(__('admin::app.promotions.cart-rules.from')); ?></label>
                                    <datetime>
                                        <input type="text" name="starts_from" class="control" value="<?php echo e(old('starts_from')); ?>"/>
                                    </datetime>
                                </div>

                                <div class="control-group date" :class="[errors.has('ends_till') ? 'has-error' : '']">
                                    <label for="ends_till"><?php echo e(__('admin::app.promotions.cart-rules.to')); ?></label>

                                    <datetime>
                                        <input type="text" v-validate="" class="control" name="ends_till" value="<?php echo e(old('ends_till')); ?>"/>
                                    </datetime>

                                    <span class="control-error" v-if="errors.has('ends_till')">{{ errors.first('ends_till') }}</span>
                                </div>

                                <div class="control-group">
                                    <label for="sort_order"><?php echo e(__('admin::app.promotions.cart-rules.priority')); ?></label>
                                    <input type="text" class="control" id="sort_order" name="sort_order" value="<?php echo e(old('sort_order') ?? 0); ?>"/>
                                </div>

                            </div>
                        </accordian>

                        <accordian title="<?php echo e(__('admin::app.promotions.cart-rules.conditions')); ?>" :active="false">
                            <div slot="body">

                                <div class="control-group">
                                    <label for="condition_type"><?php echo e(__('admin::app.promotions.cart-rules.condition-type')); ?></label>

                                    <select class="control" id="condition_type" name="condition_type" v-model="condition_type">
                                        <option value="1"><?php echo e(__('admin::app.promotions.cart-rules.all-conditions-true')); ?></option>
                                        <option value="2"><?php echo e(__('admin::app.promotions.cart-rules.any-condition-true')); ?></option>
                                    </select>
                                </div>

                                <cart-rule-condition-item
                                    v-for='(condition, index) in conditions'
                                    :condition="condition"
                                    :key="index"
                                    :index="index"
                                    @onRemoveCondition="removeCondition($event)">
                                </cart-rule-condition-item>
                                
                                <button type="button" class="btn btn-lg btn-primary" style="margin-top: 20px;" @click="addCondition">
                                    <?php echo e(__('admin::app.promotions.cart-rules.add-condition')); ?>

                                </button>

                            </div>
                        </accordian>

                        <accordian title="<?php echo e(__('admin::app.promotions.cart-rules.actions')); ?>" :active="false">
                            <div slot="body">

                                <div class="control-group" :class="[errors.has('action_type') ? 'has-error' : '']">
                                    <label for="action_type" class="required"><?php echo e(__('admin::app.promotions.cart-rules.action-type')); ?></label>

                                    <select class="control" id="action_type" name="action_type" v-validate="'required'" v-model="action_type" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.action-type')); ?>&quot;">
                                        <option value="by_percent" <?php echo e(old('action_type') == 'by_percent' ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.cart-rules.percentage-product-price')); ?>

                                        </option>
                                        <option value="by_fixed" <?php echo e(old('action_type') == 'by_fixed' ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.cart-rules.fixed-amount')); ?>

                                        </option>
                                        <option value="cart_fixed" <?php echo e(old('action_type') == 'cart_fixed' ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.cart-rules.fixed-amount-whole-cart')); ?>

                                        </option>
                                        <option value="buy_x_get_y" <?php echo e(old('action_type') == 'buy_x_get_y' ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.cart-rules.buy-x-get-y-free')); ?>

                                        </option>
                                    </select>

                                    <span class="control-error" v-if="errors.has('action_type')">{{ errors.first('action_type') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('discount_amount') ? 'has-error' : '']">
                                    <label for="discount_amount" class="required"><?php echo e(__('admin::app.promotions.cart-rules.discount-amount')); ?></label>
                                    <input v-validate="'required'" class="control" id="discount_amount" name="discount_amount" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.cart-rules.discount-amount')); ?>&quot;" value="<?php echo e(old('discount_amount') ?? 0); ?>"/>
                                    <span class="control-error" v-if="errors.has('discount_amount')">{{ errors.first('discount_amount') }}</span>
                                </div>

                                <div class="control-group">
                                    <label for="discount_quantity"><?php echo e(__('admin::app.promotions.cart-rules.discount-quantity')); ?></label>
                                    <input class="control" id="discount_quantity" name="discount_quantity" value="<?php echo e(old('discount_quantity') ?? 0); ?>"/>
                                </div>

                                <div class="control-group">
                                    <label for="discount_step"><?php echo e(__('admin::app.promotions.cart-rules.discount-step')); ?></label>
                                    <input class="control" id="discount_step" name="discount_step" value="<?php echo e(old('discount_step') ?? 0); ?>"/>
                                </div>

                                <div class="control-group">
                                    <label for="apply_to_shipping"><?php echo e(__('admin::app.promotions.cart-rules.apply-to-shipping')); ?></label>

                                    <select class="control" id="apply_to_shipping" name="apply_to_shipping" :disabled="action_type == 'cart_fixed'">
                                        <option value="0" <?php echo e(! old('apply_to_shipping') ? 'selected' : ''); ?>><?php echo e(__('admin::app.promotions.cart-rules.no')); ?></option>
                                        <option value="1" <?php echo e(old('apply_to_shipping') ? 'selected' : ''); ?>><?php echo e(__('admin::app.promotions.cart-rules.yes')); ?></option>
                                    </select>
                                </div>

                                <div class="control-group">
                                    <label for="free_shipping"><?php echo e(__('admin::app.promotions.cart-rules.free-shipping')); ?></label>

                                    <select class="control" id="free_shipping" name="free_shipping">
                                        <option value="0" <?php echo e(! old('free_shipping') ? 'selected' : ''); ?>><?php echo e(__('admin::app.promotions.cart-rules.no')); ?></option>
                                        <option value="1" <?php echo e(old('free_shipping') ? 'selected' : ''); ?>><?php echo e(__('admin::app.promotions.cart-rules.yes')); ?></option>
                                    </select>
                                </div>

                                <div class="control-group">
                                    <label for="end_other_rules"><?php echo e(__('admin::app.promotions.cart-rules.end-other-rules')); ?></label>

                                    <select class="control" id="end_other_rules" name="end_other_rules">
                                        <option value="0" <?php echo e(! old('end_other_rules') ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.cart-rules.no')); ?>

                                        </option>

                                        <option value="1" <?php echo e(old('end_other_rules') ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.cart-rules.yes')); ?>

                                        </option>
                                    </select>
                                </div>

                            </div>
                        </accordian>

                        <?php echo view_render_event('bagisto.admin.promotions.cart-rules.create.after'); ?>

                    </div>
                </div>
            </form>
        </div>
    </script>

    <script type="text/x-template" id="cart-rule-condition-item-template">
        <div class="cart-rule-conditions">
            <div class="attribute">
                <div class="control-group">
                    <select :name="['conditions[' + index + '][attribute]']" class="control" v-model="condition.attribute">
                        <option value=""><?php echo e(__('admin::app.promotions.cart-rules.choose-condition-to-add')); ?></option>
                        <optgroup v-for='(conditionAttribute, index) in condition_attributes' :label="conditionAttribute.label">
                            <option v-for='(childAttribute, index) in conditionAttribute.children' :value="childAttribute.key">
                                {{ childAttribute.label }}
                            </option>
                        </optgroup>
                    </select>
                </div>
            </div>

            <div class="operator">
                <div class="control-group" v-if="matchedAttribute">
                    <select :name="['conditions[' + index + '][operator]']" class="control" v-model="condition.operator">
                        <option v-for='operator in condition_operators[matchedAttribute.type]' :value="operator.operator">
                            {{ operator.label }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="value">
                <div v-if="matchedAttribute">
                    <input type="hidden" :name="['conditions[' + index + '][attribute_type]']" v-model="matchedAttribute.type">

                    <div v-if="matchedAttribute.key == 'product|category_ids' || matchedAttribute.key == 'product|category_ids' || matchedAttribute.key == 'product|parent::category_ids'">
                        <tree-view value-field="id" id-field="id" :name-field="'conditions[' + index + '][value]'" input-type="checkbox" :items='matchedAttribute.options' :behavior="'no'" fallback-locale="<?php echo e(config('app.fallback_locale')); ?>"></tree-view>
                    </div>

                    <div v-else>
                        <div class="control-group" v-if="matchedAttribute.type == 'text' || matchedAttribute.type == 'price' || matchedAttribute.type == 'decimal' || matchedAttribute.type == 'integer'">
                            <input class="control" :name="['conditions[' + index + '][value]']" v-model="condition.value"/>
                        </div>

                        <div class="control-group date" v-if="matchedAttribute.type == 'date'">
                            <date>
                                <input class="control" :name="['conditions[' + index + '][value]']" v-model="condition.value"/>
                            </date>
                        </div>

                        <div class="control-group date" v-if="matchedAttribute.type == 'datetime'">
                            <datetime>
                                <input class="control" :name="['conditions[' + index + '][value]']" v-model="condition.value"/>
                            </datetime>
                        </div>

                        <div class="control-group" v-if="matchedAttribute.type == 'boolean'">
                            <select :name="['conditions[' + index + '][value]']" class="control" v-model="condition.value">
                                <option value="1"><?php echo e(__('admin::app.promotions.cart-rules.yes')); ?></option>
                                <option value="0"><?php echo e(__('admin::app.promotions.cart-rules.no')); ?></option>
                            </select>
                        </div>

                        <div class="control-group" v-if="matchedAttribute.type == 'select' || matchedAttribute.type == 'radio'">
                            <select :name="['conditions[' + index + '][value]']" class="control" v-model="condition.value" v-if="matchedAttribute.key != 'cart|state'">
                                <option v-for='option in matchedAttribute.options' :value="option.id">
                                    {{ option.admin_name }}
                                </option>
                            </select>

                            <select :name="['conditions[' + index + '][value]']" class="control" v-model="condition.value" v-else>
                                <optgroup v-for='option in matchedAttribute.options' :label="option.admin_name">
                                    <option v-for='state in option.states' :value="state.code">
                                        {{ state.admin_name }}
                                    </option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="control-group" v-if="matchedAttribute.type == 'multiselect' || matchedAttribute.type == 'checkbox'">
                            <select :name="['conditions[' + index + '][value][]']" class="control" v-model="condition.value" multiple>
                                <option v-for='option in matchedAttribute.options' :value="option.id">
                                    {{ option.admin_name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actions">
                <i class="icon trash-icon" @click="removeCondition"></i>
            </div>
        </div>
    </script>

    <script>
        Vue.component('cart-rule', {
            template: '#cart-rule-template',

            inject: ['$validator'],

            data: function() {
                return {
                    coupon_type: 0,

                    use_auto_generation: 0,

                    condition_type: 1,

                    conditions: [],

                    action_type: "<?php echo e(old('action_type') ?: 'by_percent'); ?>"
                }
            },

            methods: {
                addCondition: function() {
                    this.conditions.push({
                        'attribute': '',
                        'operator': '==',
                        'value': '',
                    });
                },

                removeCondition: function(condition) {
                    let index = this.conditions.indexOf(condition)

                    this.conditions.splice(index, 1)
                },

                onSubmit: function(e) {
                    this.$root.onSubmit(e)
                },

                onSubmit: function(e) {
                    this.$root.onSubmit(e)
                },

                redirectBack: function(fallbackUrl) {
                    this.$root.redirectBack(fallbackUrl)
                }
            }
        });

        Vue.component('cart-rule-condition-item', {
            template: '#cart-rule-condition-item-template',

            props: ['index', 'condition'],

            data: function() {
                return {
                    condition_attributes: <?php echo json_encode(app('\Webkul\CartRule\Repositories\CartRuleRepository')->getConditionAttributes(), 15, 512) ?>,

                    attribute_type_indexes: {
                        'cart': 0,

                        'cart_item': 1,

                        'product': 2
                    },

                    condition_operators: {
                        'price': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.less-than')); ?>'
                            }],
                        'decimal': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.less-than')); ?>'
                            }],
                        'integer': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.less-than')); ?>'
                            }],
                        'text': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '{}',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.contain')); ?>'
                            }, {
                                'operator': '!{}',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.does-not-contain')); ?>'
                            }],
                        'boolean': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }],
                        'date': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.less-than')); ?>'
                            }],
                        'datetime': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.less-than')); ?>'
                            }],
                        'select': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }],
                        'radio': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.is-not-equal-to')); ?>'
                            }],
                        'multiselect': [{
                                'operator': '{}',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.contains')); ?>'
                            }, {
                                'operator': '!{}',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.does-not-contain')); ?>'
                            }],
                        'checkbox': [{
                                'operator': '{}',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.contains')); ?>'
                            }, {
                                'operator': '!{}',
                                'label': '<?php echo e(__('admin::app.promotions.cart-rules.does-not-contain')); ?>'
                            }]
                    }
                }
            },

            computed: {
                matchedAttribute: function () {
                    if (this.condition.attribute == '')
                        return;

                    let self = this;

                    let attributeIndex = this.attribute_type_indexes[this.condition.attribute.split("|")[0]];

                    matchedAttribute = this.condition_attributes[attributeIndex]['children'].filter(function (attribute) {
                        return attribute.key == self.condition.attribute;
                    });

                    if (matchedAttribute[0]['type'] == 'multiselect' || matchedAttribute[0]['type'] == 'checkbox') {
                        this.condition.operator = '{}';

                        this.condition.value = [];
                    }

                    return matchedAttribute[0];
                }
            },

            methods: {
                removeCondition: function() {
                    this.$emit('onRemoveCondition', this.condition)
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/promotions/cart-rules/create.blade.php ENDPATH**/ ?>