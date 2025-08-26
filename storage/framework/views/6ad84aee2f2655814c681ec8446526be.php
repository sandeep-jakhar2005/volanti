<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.marketing.sitemaps.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.sitemaps.store')); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.sitemaps.index')); ?>'"></i>

                        <?php echo e(__('admin::app.marketing.sitemaps.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.marketing.sitemaps.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.marketing.sitemaps.create.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.marketing.sitemaps.general')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('file_name') ? 'has-error' : '']">
                                <label for="file_name" class="required"><?php echo e(__('admin::app.marketing.sitemaps.file-name')); ?></label>
                                <input v-validate="'required'" class="control" id="file_name" name="file_name" value="<?php echo e(old('file_name')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.sitemaps.file-name')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('file_name')">{{ errors.first('file_name') }}</span>
                                <span class="control-info"><?php echo e(__('admin::app.marketing.sitemaps.file-name-info')); ?></span>
                            </div>

                            <div class="control-group" :class="[errors.has('path') ? 'has-error' : '']">
                                <label for="path" class="required"><?php echo e(__('admin::app.marketing.sitemaps.path')); ?></label>
                                <input v-validate="'required'" class="control" id="path" name="path" value="<?php echo e(old('path')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.sitemaps.path')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('path')">{{ errors.first('path') }}</span>
                                <span class="control-info"><?php echo e(__('admin::app.marketing.sitemaps.path-info')); ?></span>
                            </div>

                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.marketing.sitemaps.create.after'); ?>


                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/sitemaps/create.blade.php ENDPATH**/ ?>