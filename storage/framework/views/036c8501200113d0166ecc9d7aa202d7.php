<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.locales.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.locales.update', $locale->id)); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.locales.index')); ?>'"></i>

                        <?php echo e(__('admin::app.settings.locales.edit-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.settings.locales.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.settings.locale.edit.before', ['locale' => $locale]); ?>


                    <input name="_method" type="hidden" value="PUT">

                    <accordian title="<?php echo e(__('admin::app.settings.locales.general')); ?>" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('code') ? 'has-error' : '']">
                                <label for="code" class="required"><?php echo e(__('admin::app.settings.locales.code')); ?></label>

                                <input type="text" v-validate="'required'" class="control" id="code" name="code" data-vv-as="&quot;<?php echo e(__('admin::app.settings.locales.code')); ?>&quot;" value="<?php echo e(old('code') ?: $locale->code); ?>" disabled="disabled"/>

                                <input type="hidden" name="code" value="<?php echo e($locale->code); ?>"/>

                                <span class="control-error" v-if="errors.has('code')">{{ errors.first('code') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.settings.locales.name')); ?></label>

                                <input v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;<?php echo e(__('admin::app.settings.locales.name')); ?>&quot;" value="<?php echo e(old('name') ?: $locale->name); ?>"/>

                                <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('direction') ? 'has-error' : '']">
                                <label for="direction" class="required"><?php echo e(__('admin::app.settings.locales.direction')); ?></label>

                                <select v-validate="'required'" class="control" id="direction" name="direction" data-vv-as="&quot;<?php echo e(__('admin::app.settings.locales.direction')); ?>&quot;">
                                    <option value="ltr" <?php echo e((old('direction') ?: $locale->direction) == 'ltr' ? 'selected' : ''); ?>>LTR</option>
                                    <option value="rtl" <?php echo e((old('direction') ?: $locale->direction) == 'rtl' ? 'selected' : ''); ?>>RTL</option>
                                </select>

                                <span class="control-error" v-if="errors.has('direction')">{{ errors.first('direction') }}</span>
                            </div>

                            <div class="control-group">
                                <label><?php echo e(__('velocity::app.admin.general.locale_logo')); ?></label>

                                <?php if(
                                    isset($locale)
                                    && $locale->locale_image
                                ): ?>
                                    <image-wrapper
                                        input-name="locale_image"
                                        :multiple="false"
                                        :images='"<?php echo e(Storage:: url($locale->locale_image)); ?>"'
                                        button-label="<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>">
                                    </image-wrapper>
                                <?php else: ?>
                                    <image-wrapper
                                        input-name="locale_image"
                                        :multiple="false"
                                        button-label="<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>">
                                    </image-wrapper>
                                <?php endif; ?>

                                <span class="control-info mt-10"><?php echo e(__('velocity::app.admin.meta-data.image-locale-resolution')); ?></span>
                            </div>
                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.settings.locale.edit.after', ['locale' => $locale]); ?>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/settings/locales/edit.blade.php ENDPATH**/ ?>