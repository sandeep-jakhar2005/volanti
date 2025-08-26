<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.tax-categories.edit.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.tax_categories.update', $taxCategory->id)); ?>" @submit.prevent="onSubmit">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.tax_categories.index')); ?>'"></i>

                        <?php echo e(__('admin::app.settings.tax-categories.edit.title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.tax-categories.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="control-group" :class="[errors.has('code') ? 'has-error' : '']">
                        <label for="code" class="required"><?php echo e(__('admin::app.settings.tax-categories.code')); ?></label>

                        <input v-validate="'required'" class="control" id="code" name="code" data-vv-as="&quot;<?php echo e(__('admin::app.configuration.tax-categories.code')); ?>&quot;" value="<?php echo e(old('code') ?: $taxCategory->code); ?>"/>

                        <span class="control-error" v-if="errors.has('code')">{{ errors.first('code') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                        <label for="name" class="required"><?php echo e(__('admin::app.settings.tax-categories.name')); ?></label>
                        <input v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;<?php echo e(__('admin::app.configuration.tax-categories.name')); ?>&quot;" value="<?php echo e(old('name') ?: $taxCategory->name); ?>"/>

                        <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('description') ? 'has-error' : '']">
                        <label for="description" class="required"><?php echo e(__('admin::app.settings.tax-categories.description')); ?></label>
                        <textarea v-validate="'required'" class="control" id="description" name="description" data-vv-as="&quot;<?php echo e(__('admin::app.configuration.tax-categories.description')); ?>&quot;"><?php echo e($taxCategory->description); ?></textarea>

                        <span class="control-error" v-if="errors.has('description')">{{ errors.first('description') }}</span>
                    </div>

                    <?php $selectedOptions = old('taxrates') ?: $taxCategory->tax_rates()->pluck('tax_rates.id')->toArray() ?>

                    <div class="control-group multi-select" :class="[errors.has('taxrates[]') ? 'has-error' : '']">
                        <label for="taxrates" class="required"><?php echo e(__('admin::app.settings.tax-categories.select-taxrates')); ?></label>

                        <?php $taxRates = app('Webkul\Tax\Repositories\TaxRateRepository'); ?>
                        <select multiple="multiple" class="control" id="taxrates" name="taxrates[]" data-vv-as="&quot;<?php echo e(__('admin::app.settings.tax-categories.select-taxrates')); ?>&quot;" v-validate="'required'">
                            <?php $__currentLoopData = $taxRates->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxRate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($taxRate->id); ?>"  <?php echo e(in_array($taxRate->id, $selectedOptions) ? 'selected' : ''); ?>>
                                    <?php echo e($taxRate->identifier); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <span class="control-error" v-if="errors.has('taxrates[]')">{{ errors.first('taxrates[]') }}</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/tax/tax-categories/edit.blade.php ENDPATH**/ ?>