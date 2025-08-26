<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.marketing.events.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.events.store')); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.events.index')); ?>'"></i>

                        <?php echo e(__('admin::app.marketing.events.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.marketing.events.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.marketing.events.create.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.marketing.events.general')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.marketing.events.name')); ?></label>
                                <input v-validate="'required'" class="control" id="name" name="name" value="<?php echo e(old('name')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.events.name')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('description') ? 'has-error' : '']">
                                <label for="description" class="required"><?php echo e(__('admin::app.marketing.events.description')); ?></label>
                                <textarea v-validate="'required'" class="control" id="description" name="description" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.events.description')); ?>&quot;"><?php echo e(old('description')); ?></textarea>
                                <span class="control-error" v-if="errors.has('description')">{{ errors.first('description') }}</span>
                            </div>

                            <div class="control-group date" :class="[errors.has('date') ? 'has-error' : '']">
                                <label for="date" class="required"><?php echo e(__('admin::app.marketing.events.date')); ?></label>
                                <date>
                                    <input type="text" name="date" class="control" v-validate="'required'" value="<?php echo e(old('date')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.events.date')); ?>&quot;">
                                </date>
                                <span class="control-error" v-if="errors.has('date')">{{ errors.first('date') }}</span>
                            </div>

                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.marketing.events.create.after'); ?>


                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/email-marketing/events/create.blade.php ENDPATH**/ ?>