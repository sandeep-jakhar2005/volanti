<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.promotions.catalog-rules.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <catalog-rule></catalog-rule>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="catalog-rule-template">
        <div>
            <form method="POST" action="<?php echo e(route('admin.catalog_rules.store')); ?>" @submit.prevent="onSubmit">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                        <i class="icon angle-left-icon back-link"
                            onclick="window.location = '<?php echo e(route('admin.catalog_rules.index')); ?>'"></i>

                            <?php echo e(__('admin::app.promotions.catalog-rules.add-title')); ?>

                        </h1>
                    </div>

                    <div class="page-action">
                        <button type="submit" class="btn btn-lg btn-primary">
                            <?php echo e(__('admin::app.promotions.catalog-rules.save-btn-title')); ?>

                        </button>
                    </div>
                </div>

                <div class="page-content">
                    <div class="form-container">
                        <?php echo csrf_field(); ?>

                        <?php echo view_render_event('bagisto.admin.promotions.catalog-rules.create.before'); ?>


                        <accordian title="<?php echo e(__('admin::app.promotions.catalog-rules.rule-information')); ?>" :active="true">
                            <div slot="body">
                                <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                    <label for="name" class="required"><?php echo e(__('admin::app.promotions.catalog-rules.name')); ?></label>
                                    <input v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.catalog-rules.name')); ?>&quot;" value="<?php echo e(old('name')); ?>"/>
                                    <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                                </div>

                                <div class="control-group">
                                    <label for="description"><?php echo e(__('admin::app.promotions.catalog-rules.description')); ?></label>
                                    <textarea class="control" id="description" name="description"><?php echo e(old('description')); ?></textarea>
                                </div>

                                <div class="control-group">
                                    <label for="status"><?php echo e(__('admin::app.promotions.catalog-rules.status')); ?></label>

                                    <label class="switch">
                                        <input type="checkbox" id="status" name="status" value="1" <?php echo e(old('status') ? 'checked' : ''); ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="control-group multi-select" :class="[errors.has('channels[]') ? 'has-error' : '']">
                                    <label for="channels" class="required"><?php echo e(__('admin::app.promotions.catalog-rules.channels')); ?></label>

                                    <select class="control" id="channels" name="channels[]" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.catalog-rules.channels')); ?>&quot;" multiple="multiple">

                                        <?php $__currentLoopData = core()->getAllChannels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($channel->id); ?>" <?php echo e(old('channels') && in_array($channel->id, old('channels')) ? 'selected' : ''); ?>>
                                                <?php echo e(core()->getChannelName($channel)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                    <span class="control-error" v-if="errors.has('channels[]')">{{ errors.first('channels[]') }}</span>
                                </div>

                                <div class="control-group multi-select" :class="[errors.has('customer_groups[]') ? 'has-error' : '']">
                                    <label for="customer_groups" class="required"><?php echo e(__('admin::app.promotions.catalog-rules.customer-groups')); ?></label>

                                    <select class="control" id="customer_groups" name="customer_groups[]" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.catalog-rules.customer-groups')); ?>&quot;" multiple="multiple">

                                        <?php $__currentLoopData = app('Webkul\Customer\Repositories\CustomerGroupRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($customerGroup->id); ?>" <?php echo e(old('customer_groups') && in_array($customerGroup->id, old('customer_groups')) ? 'selected' : ''); ?>>
                                                <?php echo e($customerGroup->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                    <span class="control-error" v-if="errors.has('customer_groups[]')">{{ errors.first('customer_groups[]') }}</span>
                                </div>


                                <div class="control-group date">
                                    <label for="starts_from"><?php echo e(__('admin::app.promotions.catalog-rules.from')); ?></label>
                                    
                                    <date>
                                        <input type="text" name="starts_from" class="control" value="<?php echo e(old('starts_from')); ?>"/>
                                    </date>
                                </div>

                                <div class="control-group date" :class="[errors.has('ends_till') ? 'has-error' : '']">
                                    <label for="ends_till"><?php echo e(__('admin::app.promotions.catalog-rules.to')); ?></label>

                                    <date>                          
                                        <input type="text" v-validate="" class="control" id="ends_till" name="ends_till" value="<?php echo e(old('ends_till')); ?>"/>
                                    </date>

                                    <span class="control-error" v-if="errors.has('ends_till')">{{ errors.first('ends_till') }}</span>
                                </div>

                                <div class="control-group">
                                    <label for="sort_order"><?php echo e(__('admin::app.promotions.catalog-rules.priority')); ?></label>
                                    <input type="text" class="control" id="sort_order" name="sort_order" value="<?php echo e(old('sort_order') ?? 0); ?>"/>
                                </div>
                            </div>
                        </accordian>

                        <accordian title="<?php echo e(__('admin::app.promotions.catalog-rules.conditions')); ?>" :active="false">
                            <div slot="body">
                                <div class="control-group">
                                    <label for="condition_type"><?php echo e(__('admin::app.promotions.catalog-rules.condition-type')); ?></label>

                                    <select class="control" id="condition_type" name="condition_type" v-model="condition_type">
                                        <option value="1"><?php echo e(__('admin::app.promotions.catalog-rules.all-conditions-true')); ?></option>
                                        <option value="2"><?php echo e(__('admin::app.promotions.catalog-rules.any-condition-true')); ?></option>
                                    </select>
                                </div>

                                <catalog-rule-condition-item
                                    v-for='(condition, index) in conditions'
                                    :condition="condition"
                                    :key="index"
                                    :index="index"
                                    @onRemoveCondition="removeCondition($event)">
                                </catalog-rule-condition-item>                                     

                                <button type="button" class="btn btn-lg btn-primary" style="margin-top: 20px;" @click="addCondition">
                                    <?php echo e(__('admin::app.promotions.catalog-rules.add-condition')); ?>

                                </button>
                            </div>
                        </accordian>

                        <accordian title="<?php echo e(__('admin::app.promotions.catalog-rules.actions')); ?>" :active="false">
                            <div slot="body">
                                <div class="control-group" :class="[errors.has('action_type') ? 'has-error' : '']">
                                    <label for="action_type" class="required"><?php echo e(__('admin::app.promotions.catalog-rules.action-type')); ?></label>

                                    <select class="control" id="action_type" name="action_type" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.catalog-rules.action-type')); ?>&quot;">
                                        <option value="by_percent" <?php echo e(old('action_type') == 'by_percent' ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.catalog-rules.percentage-product-price')); ?>

                                        </option>
                                        <option value="by_fixed" <?php echo e(old('action_type') == 'by_fixed' ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.catalog-rules.fixed-amount')); ?>

                                        </option>
                                    </select>

                                    <span class="control-error" v-if="errors.has('action_type')">{{ errors.first('action_type') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('discount_amount') ? 'has-error' : '']">
                                    <label for="discount_amount" class="required"><?php echo e(__('admin::app.promotions.catalog-rules.discount-amount')); ?></label>
                                    <input v-validate="'required'" class="control" id="discount_amount" name="discount_amount" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.catalog-rules.discount-amount')); ?>&quot;" value="<?php echo e(old('discount_amount') ?? 0); ?>"/>
                                    <span class="control-error" v-if="errors.has('discount_amount')">{{ errors.first('discount_amount') }}</span>
                                </div>

                                <div class="control-group">
                                    <label for="end_other_rules"><?php echo e(__('admin::app.promotions.catalog-rules.end-other-rules')); ?></label>

                                    <select class="control" id="end_other_rules" name="end_other_rules">
                                        <option value="0" <?php echo e(! old('end_other_rules') ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.catalog-rules.no')); ?>

                                        </option>

                                        <option value="1" <?php echo e(old('end_other_rules') ? 'selected' : ''); ?>>
                                            <?php echo e(__('admin::app.promotions.catalog-rules.yes')); ?>

                                        </option>
                                    </select>
                                </div>
                            </div>
                        </accordian>

                        <?php echo view_render_event('bagisto.admin.promotions.catalog-rules.create.after'); ?>

                    </div>
                </div>
            </form>
        </div>
    </script>

    <script type="text/x-template" id="catalog-rule-condition-item-template">
        <div class="catalog-rule-conditions">
            <div class="attribute">
                <div class="control-group">
                    <select :name="['conditions[' + index + '][attribute]']" class="control" v-model="condition.attribute">
                        <option value=""><?php echo e(__('admin::app.promotions.catalog-rules.choose-condition-to-add')); ?></option>
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

                    <div v-if="matchedAttribute.key == 'product|category_ids'">
                        <tree-view value-field="id" id-field="id" :name-field="'conditions[' + index + '][value]'" input-type="checkbox" :items='matchedAttribute.options' :behavior="'no'" fallback-locale="<?php echo e(config('app.fallback_locale')); ?>"></tree-view>
                    </div>

                    <div v-else>
                        <div class="control-group" :class="[errors.has('conditions[' + index + '][value]') ? 'has-error' : '']" v-if="matchedAttribute.type == 'text' || matchedAttribute.type == 'price' || matchedAttribute.type == 'decimal' || matchedAttribute.type == 'integer'">
                            <input v-validate="matchedAttribute.type == 'price' ? 'decimal:2' : '' || matchedAttribute.type == 'decimal' ? 'decimal:2' : '' || matchedAttribute.type == 'integer' ? 'decimal:2' : '' || matchedAttribute.type == 'text' ? 'regex:^([A-Za-z0-9_ \'\-]+)$' : ''" class="control" :name="['conditions[' + index + '][value]']" v-model="condition.value" data-vv-as="&quot;<?php echo e(__('admin::app.promotions.catalog-rules.conditions')); ?>&quot;"/>
                            <span class="control-error" v-if="errors.has('conditions[' + index + '][value]')" v-text="errors.first('conditions[' + index + '][value]')"></span>
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
                                <option value="1"><?php echo e(__('admin::app.promotions.catalog-rules.yes')); ?></option>
                                <option value="0"><?php echo e(__('admin::app.promotions.catalog-rules.no')); ?></option>
                            </select>
                        </div>

                        <div class="control-group" v-if="matchedAttribute.type == 'select' || matchedAttribute.type == 'radio'">
                            <select :name="['conditions[' + index + '][value]']" class="control" v-model="condition.value" v-if="matchedAttribute.key != 'catalog|state'">
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

                        <div class="control-group multi-select" v-if="matchedAttribute.type == 'multiselect' || matchedAttribute.type == 'checkbox'">
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
        Vue.component('catalog-rule', {
            template: '#catalog-rule-template',

            inject: ['$validator'],

            data: function() {
                return {
                    condition_type: 1,

                    conditions: []
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

        Vue.component('catalog-rule-condition-item', {
            template: '#catalog-rule-condition-item-template',

            props: ['index', 'condition'],

            data: function() {
                return {
                    condition_attributes: <?php echo json_encode(app('\Webkul\CatalogRule\Repositories\CatalogRuleRepository')->getConditionAttributes(), 15, 512) ?>,

                    attribute_type_indexes: {
                        'product': 0
                    },

                    condition_operators: {
                        'price': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.less-than')); ?>'
                            }],
                        'decimal': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.less-than')); ?>'
                            }],
                        'integer': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.less-than')); ?>'
                            }],
                        'text': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '{}',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.contain')); ?>'
                            }, {
                                'operator': '!{}',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.does-not-contain')); ?>'
                            }],
                        'boolean': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }],
                        'date': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.less-than')); ?>'
                            }],
                        'datetime': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }, {
                                'operator': '>=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-greater-than')); ?>'
                            }, {
                                'operator': '<=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.equals-or-less-than')); ?>'
                            }, {
                                'operator': '>',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.greater-than')); ?>'
                            }, {
                                'operator': '<',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.less-than')); ?>'
                            }],
                        'select': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }],
                        'radio': [{
                                'operator': '==',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-equal-to')); ?>'
                            }, {
                                'operator': '!=',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.is-not-equal-to')); ?>'
                            }],
                        'multiselect': [{
                                'operator': '{}',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.contains')); ?>'
                            }, {
                                'operator': '!{}',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.does-not-contain')); ?>'
                            }],
                        'checkbox': [{
                                'operator': '{}',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.contains')); ?>'
                            }, {
                                'operator': '!{}',
                                'label': '<?php echo e(__('admin::app.promotions.catalog-rules.does-not-contain')); ?>'
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
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/promotions/catalog-rules/create.blade.php ENDPATH**/ ?>