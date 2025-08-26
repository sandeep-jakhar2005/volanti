<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('velocity::app.admin.contents.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php
            $locale = core()->getRequestedLocaleCode();
            $translation = $content->translations->where('locale', $locale)->first();
        ?>

        <form
            method="POST"
            @submit.prevent="onSubmit"
            enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = history.length > 1 ? document.referrer : '<?php echo e(route('admin.dashboard.index')); ?>'"></i>

                        <?php echo e(__('velocity::app.admin.contents.edit-title')); ?>

                    </h1>

                    <div class="control-group">
                        <select class="control" id="locale-switcher" onChange="window.location.href = this.value">
                            <?php $__currentLoopData = core()->getAllLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e(route('velocity.admin.content.update', $content->id) . '?locale=' . $localeModel->code); ?>" <?php echo e(($localeModel->code) == $locale ? 'selected' : ''); ?>>
                                    <?php echo e($localeModel->name); ?>

                                </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('velocity::app.admin.contents.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <?php echo csrf_field(); ?>
                <input name="_method" type="hidden" value="PUT">

                <input type="hidden" name="locale" value="<?php echo e($locale); ?>"/>

                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.page.before', ['content' => $content]); ?>


                <accordian :title="'<?php echo e(__('velocity::app.admin.contents.tab.page')); ?>'" :active="true">
                    <div slot="body">

                        <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.page.controls.before', ['content' => $content]); ?>


                        <div class="control-group" :class="[errors.has('<?php echo e($locale); ?>[title]') ? 'has-error' : '']">
                            <label for="title" class="required">
                                <?php echo e(__('velocity::app.admin.contents.page.title')); ?>

                                <span class="locale">[<?php echo e($locale); ?>]</span>
                            </label>
                            <input type="text" v-validate="'required|max:100'" class="control" id="title" name="<?php echo e($locale); ?>[title]" value="<?php echo e(old($locale)['title'] ?? ($translation->title ?? '')); ?>" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.page.title')); ?>&quot;"/>

                            <span class="control-error" v-if="errors.has('<?php echo e($locale); ?>[title]')" v-text="errors.first('<?php echo $locale; ?>[title]')"></span>
                        </div>

                        <div class="control-group" :class="[errors.has('position') ? 'has-error' : '']">
                            <label for="position" class="required">
                                <?php echo e(__('velocity::app.admin.contents.page.position')); ?></span>
                            </label>
                            <input type="text" v-validate="'required|numeric|max:2'" class="control" id="position" name="position" value="<?php echo e(old('position') ?? $content->position); ?>" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.page.position')); ?>&quot;"/>
                            <span class="control-error" v-if="errors.has('position')" v-text="errors.first('position')"></span>
                        </div>

                        <div class="control-group" :class="[errors.has('status') ? 'has-error' : '']">
                            <label for="status" class="required"><?php echo e(__('velocity::app.admin.contents.page.status')); ?></label>
                            <select class="control" v-validate="'required'" id="status" name="status" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.page.status')); ?>&quot;">
                                <option value="0" <?php echo e(!$content->status ? 'selected' : ''); ?>>
                                    <?php echo e(__('velocity::app.admin.contents.inactive')); ?>

                                </option>
                                <option value="1" <?php echo e($content->status ? 'selected' : ''); ?>>
                                    <?php echo e(__('velocity::app.admin.contents.active')); ?>

                                </option>
                            </select>
                            <span class="control-error" v-if="errors.has('status')" v-text="errors.first('status')"></span>
                        </div>

                        <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.page.controls.after', ['content' => $content]); ?>


                    </div>
                </accordian>

                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.page.after', ['content' => $content]); ?>


                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.before', ['content' => $content]); ?>


                <accordian :title="'<?php echo e(__('velocity::app.admin.contents.tab.content')); ?>'" :active="true">
                    <div slot="body">

                        <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.controls.before', ['content' => $content]); ?>


                            <content-type></content-type>

                        <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.controls.after', ['content' => $content]); ?>


                    </div>
                </accordian>

                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.after', ['content' => $content]); ?>


            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js')); ?>"></script>

    <script type="text/x-template" id="content-type-template">
        <div>
            

            <div :class="`control-group ${errors.has('content_type') ? 'has-error' : ''}`">
                <label
                    for="content_type"
                    class="required">
                    <?php echo e(__('velocity::app.admin.contents.content.content-type')); ?>

                </label>

                <?php
                    $contentType = $content->content_type;
                ?>

                <select
                    class="control"
                    id="content_type"
                    name="content_type"
                    v-model="content_type"
                    v-validate="'required'"
                    data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.content.content-type')); ?>&quot;" @change="loadFields($event)">

                    <option value="">
                        <?php echo e(__('velocity::app.admin.contents.select')); ?>

                    </option>

                    <?php $__currentLoopData = velocity()->getContentType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $content_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($key); ?>"
                            <?php echo e($contentType == $key ? 'selected' : ''); ?>>
                            <?php echo e($content_type); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <span
                    class="control-error"
                    v-if="errors.has('content_type')"
                    v-text="errors.first('content_type')">
                </span>
            </div>

            <div v-if="content_type == 'link'">
                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.link.before', ['content' => $content]); ?>


                <div :class="`control-group ${errors.has('<?php echo e($locale); ?>[page_link]') ? 'has-error' : ''}`">

                    <label for="page_link" class="required">
                        <?php echo e(__('velocity::app.admin.contents.content.page-link')); ?>

                    </label>

                    <input
                        type="text"
                        id="page_link"
                        class="control"
                        name="<?php echo e($locale); ?>[page_link]"
                        v-validate="'required|max:150'"
                        value="<?php echo e(old($locale)['page_link'] ?? $content->translate($locale) ? $content->translate($locale)['page_link'] : ''); ?>"
                        data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.content.page-link')); ?>&quot;" />

                    <span
                        class="control-error"
                        v-if="errors.has('<?php echo e($locale); ?>[page_link]')"
                        v-text="errors.first('<?php echo $locale; ?>[page_link]')">
                    </span>
                </div>

                <div class="control-group">
                    <label for="link_target">
                        <?php echo e(__('velocity::app.admin.contents.content.link-target')); ?>

                    </label>

                    <select
                        class="control"
                        id="link_target"
                        name="link_target">
                        <option value="0" <?php echo e(!$content->link_target ? 'selected' : ''); ?>>
                            <?php echo e(__('velocity::app.admin.contents.self')); ?>

                        </option>
                        <option value="1" <?php echo e($content->link_target ? 'selected' : ''); ?>>
                            <?php echo e(__('velocity::app.admin.contents.new-tab')); ?>

                        </option>
                    </select>
                </div>

                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.link.after', ['content' => $content]); ?>

            </div>

            <div v-else-if="content_type == 'product'">
                <?php echo $__env->make('velocity::admin.content.content-type.edit-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div v-else-if="content_type == 'static'">
                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.static.before', ['content' => $content]); ?>


                <div :class="`control-group ${errors.has('<?php echo e($locale); ?>[description]') ? 'has-error' : ''}`">
                    <label for="description" class="required"><?php echo e(__('velocity::app.admin.contents.content.static-description')); ?></label>

                    <textarea
                        class="control"
                        id="description"
                        v-validate="'required'"
                        name="<?php echo e($locale); ?>[description]"
                        data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.content.static-description')); ?>&quot;">
                        <?php echo e(old($locale)['description'] ?? $content->translate($locale) ? $content->translate($locale)['description'] : ''); ?>

                    </textarea>

                    <span
                        class="control-error"
                        v-if="errors.has('<?php echo e($locale); ?>[description]')"
                        v-text="errors.first('<?php echo $locale; ?>[description]')">
                    </span>
                </div>

                <?php echo view_render_event('bagisto.admin.content.edit_form_accordian.content.static.after', ['content' => $content]); ?>

            </div>

            <div v-else-if="content_type == 'category'">
                <?php echo $__env->make('velocity::admin.content.content-type.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        Vue.component('content-type', {
            template: '#content-type-template',
            inject: ['$validator'],

            data() {
                return {
                    content_type: <?php echo json_encode($contentType, 15, 512) ?>,
                }
            },

            created() {
                if (this.content_type == 'static') {
                    $(document).ready(function () {
                        tinymce.init({
                            selector: 'textarea#description',
                            height: 200,
                            width: "100%",
                            plugins: 'image imagetools media wordcount save fullscreen code',
                            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code',
                            image_advtab: true
                        });
                    });
                }
            },

            methods: {
                loadFields(event) {
                    var thisthis = this;
                    thisthis.content_type = event.target.value;

                    if ( thisthis.content_type == 'static') {
                        $(document).ready(function () {
                            tinymce.init({
                                selector: 'textarea#description',
                                height: 200,
                                width: "100%",
                                plugins: 'image imagetools media wordcount save fullscreen code',
                                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code',
                                image_advtab: true
                            });
                        });
                    } else {
                        tinymce.remove('#description');
                    }
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/content/edit.blade.php ENDPATH**/ ?>