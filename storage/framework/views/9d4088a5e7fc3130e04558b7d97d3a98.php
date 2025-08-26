<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.exchange_rates.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.exchange_rates.update', $exchangeRate->id)); ?>" @submit.prevent="onSubmit">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.exchange_rates.index')); ?>'"></i>

                        <?php echo e(__('admin::app.settings.exchange_rates.edit-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.exchange_rates.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>
                    <input name="_method" type="hidden" value="PUT">

                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo e(__('admin::app.settings.exchange_rates.source_currency')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(__('admin::app.settings.exchange_rates.target_currency')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(__('admin::app.settings.exchange_rates.rate')); ?>

                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php echo view_render_event('bagisto.admin.settings.exchangerate.edit.before'); ?>


                                    <td>
                                        <?php echo e(core()->getBaseCurrencyCode()); ?>

                                    </td>

                                    <td>
                                        <div class="control-group" :class="[errors.has('target_currency') ? 'has-error' : '']">
                                            <select v-validate="'required'" class="control" name="target_currency" data-vv-as="&quot;<?php echo e(__('admin::app.settings.exchange_rates.target_currency')); ?>&quot;">
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($currency->id); ?>" <?php echo e($exchangeRate->target_currency == $currency->id ? 'selected' : ''); ?>>
                                                        <?php echo e($currency->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="control-error" v-if="errors.has('target_currency')">{{ errors.first('target_currency') }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="control-group" :class="[errors.has('rate') ? 'has-error' : '']">
                                            <input v-validate="'required'" class="control" id="rate" name="rate" data-vv-as="&quot;<?php echo e(__('admin::app.settings.exchange_rates.rate')); ?>&quot;" value="<?php echo e(old('rate') ?: $exchangeRate->rate); ?>"/>
                                            <span class="control-error" v-if="errors.has('rate')">{{ errors.first('rate') }}</span>
                                        </div>
                                    </td>

                                    <?php echo view_render_event('bagisto.admin.settings.exchangerate.edit.after'); ?>

                                <tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/settings/exchange_rates/edit.blade.php ENDPATH**/ ?>