<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.marketing.templates.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.email_templates.store')); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.email_templates.index')); ?>'"></i>

                        <?php echo e(__('admin::app.marketing.templates.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.marketing.templates.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.marketing.templates.create.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.marketing.templates.general')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.marketing.templates.name')); ?></label>
                                <input v-validate="'required'" class="control" id="name" name="name" value="<?php echo e(old('name')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.templates.name')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('status') ? 'has-error' : '']">
                                <label for="status" class="required"><?php echo e(__('admin::app.marketing.templates.status')); ?></label>
                                <select class="control" v-validate="'required'" id="status" name="status" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.templates.display-mode')); ?>&quot;">
                                    <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.marketing.templates.active')); ?>

                                    </option>
                                    <option value="inactive" <?php echo e(old('status') == 'inactive' ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.marketing.templates.inactive')); ?>

                                    </option>
                                    <option value="draft" <?php echo e(old('status') == 'draft' ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.marketing.templates.draft')); ?>

                                    </option>
                                </select>
                                <span class="control-error" v-if="errors.has('status')">{{ errors.first('status') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('content') ? 'has-error' : '']">
                                <label for="content" class="required"><?php echo e(__('admin::app.marketing.templates.content')); ?></label>
                                <textarea v-validate="'required'" class="control" id="content" name="content" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.templates.content')); ?>&quot;"><?php echo e(old('content')); ?></textarea>
                                <span class="control-error" v-if="errors.has('content')">{{ errors.first('content') }}</span>
                            </div>
                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.marketing.templates.create.after'); ?>


                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('admin::layouts.tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $(document).ready(function () {
            tinyMCEHelper.initTinyMCE({
                selector: 'textarea#content',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code table lists link hr',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor link hr | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code | table',
                image_advtab: true,
            });
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/email-marketing/templates/create.blade.php ENDPATH**/ ?>