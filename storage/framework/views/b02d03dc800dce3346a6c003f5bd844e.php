<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.cms.pages.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
    @media only screen and (max-width: 768px){
        .content-container .content .page-header .page-action button {
            position: relative;
            right: 0px !important;
            top: 0px !important;
        }

        .content-container .content .page-header .page-title .control-group {
            margin-top: 20px!important;
            width: 100%!important;
            margin-left: 0!important;
        }
    }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php
            $locale = core()->getRequestedLocaleCode();
        ?>

        <form method="POST" id="page-form" action="" @submit.prevent="onSubmit">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.cms.index')); ?>'"></i>

                        <?php echo e(__('admin::app.cms.pages.edit-title')); ?>

                    </h1>

                    <div class="control-group">
                        <select class="control" id="locale-switcher" onChange="window.location.href = this.value">
                            <?php $__currentLoopData = core()->getAllLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e(route('admin.cms.edit', $page->id) . '?locale=' . $localeModel->code); ?>" <?php echo e(($localeModel->code) == $locale ? 'selected' : ''); ?>>
                                    <?php echo e($localeModel->name); ?>

                                </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="page-action">
                    <?php if($page->translate($locale)): ?>
                        <a href="<?php echo e(route('shop.cms.page', $page->translate($locale)['url_key'])); ?>" class="btn btn-lg btn-primary" target="_blank">
                            <?php echo e(__('admin::app.cms.pages.preview')); ?>

                        </a>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.cms.pages.edit-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">

                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.cms.pages.edit_form_accordian.general.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.cms.pages.general')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('<?php echo e($locale); ?>[page_title]') ? 'has-error' : '']">
                                <label for="page_title" class="required"><?php echo e(__('admin::app.cms.pages.page-title')); ?></label>

                                <input type="text" class="control" name="<?php echo e($locale); ?>[page_title]" v-validate="'required'" value="<?php echo e(old($locale)['page_title'] ?? ($page->translate($locale)['page_title'] ?? '')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.page-title')); ?>&quot;">

                                <span class="control-error" v-if="errors.has('<?php echo e($locale); ?>[page_title]')">{{ errors.first('<?php echo $locale; ?>[page_title]') }}</span>
                            </div>

                            <div class="control-group multi-select" :class="[errors.has('channels[]') ? 'has-error' : '']">
                                <label for="url-key" class="required"><?php echo e(__('admin::app.cms.pages.channel')); ?></label>

                                <?php $selectedOptionIds = old('inventory_sources') ?: $page->channels->pluck('id')->toArray() ?>

                                <select type="text" class="control" name="channels[]" v-validate="'required'" value="<?php echo e(old('channel[]')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.channel')); ?>&quot;" multiple="multiple">
                                    <?php $__currentLoopData = app('Webkul\Core\Repositories\ChannelRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($channel->id); ?>" <?php echo e(in_array($channel->id, $selectedOptionIds) ? 'selected' : ''); ?>>
                                            <?php echo e(core()->getChannelName($channel)); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <span class="control-error" v-if="errors.has('channels[]')">{{ errors.first('channels[]') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('<?php echo e($locale); ?>[html_content]') ? 'has-error' : '']">
                                <label for="html_content" class="required"><?php echo e(__('admin::app.cms.pages.content')); ?></label>

                                <textarea type="text" class="control" id="content" name="<?php echo e($locale); ?>[html_content]" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.content')); ?>&quot;"><?php echo e(old($locale)['html_content'] ?? ($page->translate($locale)['html_content'] ?? '')); ?></textarea>

                                <span class="control-error" v-if="errors.has('<?php echo e($locale); ?>[html_content]')">{{ errors.first('<?php echo $locale; ?>[html_content]') }}</span>
                            </div>
                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.cms.pages.edit_form_accordian.general.after'); ?>


                    <?php echo view_render_event('bagisto.admin.cms.pages.edit_form_accordian.seo.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.cms.pages.seo')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label for="meta_title"><?php echo e(__('admin::app.cms.pages.meta_title')); ?></label>

                                <input type="text" class="control" name="<?php echo e($locale); ?>[meta_title]" value="<?php echo e(old($locale)['meta_title'] ?? ($page->translate($locale)['meta_title'] ?? '')); ?>">
                            </div>

                            <div class="control-group" :class="[errors.has('<?php echo e($locale); ?>[url_key]') ? 'has-error' : '']">
                                <label for="url-key" class="required"><?php echo e(__('admin::app.cms.pages.url-key')); ?></label>

                                <input type="text" class="control" name="<?php echo e($locale); ?>[url_key]" v-validate="'required'" value="<?php echo e(old($locale)['url_key'] ?? ($page->translate($locale)['url_key'] ?? '')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.url-key')); ?>&quot;">

                                <span class="control-error" v-if="errors.has('<?php echo e($locale); ?>[url_key]')">{{ errors.first('<?php echo $locale; ?>[url_key]') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="meta_keywords"><?php echo e(__('admin::app.cms.pages.meta_keywords')); ?></label>

                                <textarea type="text" class="control" name="<?php echo e($locale); ?>[meta_keywords]"><?php echo e(old($locale)['meta_keywords'] ?? ($page->translate($locale)['meta_keywords'] ?? '')); ?></textarea>

                            </div>

                            <div class="control-group">
                                <label for="meta_description"><?php echo e(__('admin::app.cms.pages.meta_description')); ?></label>

                                <textarea type="text" class="control" name="<?php echo e($locale); ?>[meta_description]"><?php echo e(old($locale)['meta_description'] ?? ($page->translate($locale)['meta_description'] ?? '')); ?></textarea>

                            </div>
                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.cms.pages.edit_form_accordian.seo.after'); ?>

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
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor alignleft aligncenter alignright alignjustify | link hr | numlist bullist outdent indent  | removeformat | code | table',
                image_advtab: true,
                valid_elements : '*[*]',
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/cms/edit.blade.php ENDPATH**/ ?>