<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('velocity::app.admin.contents.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <?php $locale = core()->getRequestedLocaleCode(); ?>

        <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = history.length > 1 ? document.referrer : '<?php echo e(route('admin.dashboard.index')); ?>'"></i>

                        <?php echo e(__('velocity::app.admin.contents.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('velocity::app.admin.contents.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="locale" value="all"/>

                <?php echo view_render_event('bagisto.admin.content.create_form_accordian.page.before'); ?>


                <accordian :title="'<?php echo e(__('velocity::app.admin.contents.tab.page')); ?>'" :active="true">
                    <div slot="body">

                        <?php echo view_render_event('bagisto.admin.content.create_form_accordian.page.controls.before'); ?>


                        <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                            <label for="title" class="required">
                                <?php echo e(__('velocity::app.admin.contents.page.title')); ?>

                            </label>
                            <input type="text" v-validate="'required|max:100'" class="control" id="title" name="title" value="" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.page.title')); ?>&quot;"/>
                            <span class="control-error" v-if="errors.has('title')" v-text="errors.first('title')"></span>
                        </div>

                        <div class="control-group" :class="[errors.has('position') ? 'has-error' : '']">
                            <label for="position" class="required">
                                <?php echo e(__('velocity::app.admin.contents.page.position')); ?></span>
                            </label>
                            <input type="text" v-validate="'required|numeric|max:2'" class="control" id="position" name="position" value="" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.page.position')); ?>&quot;"/>
                            <span class="control-error" v-if="errors.has('position')" v-text="errors.first('position')"></span>
                        </div>

                        <div class="control-group" :class="[errors.has('status') ? 'has-error' : '']">
                            <label for="status" class="required"><?php echo e(__('velocity::app.admin.contents.page.status')); ?></label>
                            <select class="control" v-validate="'required'" id="status" name="status" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.page.status')); ?>&quot;">
                                <option value="1">
                                    <?php echo e(__('velocity::app.admin.contents.active')); ?>

                                </option>
                                <option value="0">
                                    <?php echo e(__('velocity::app.admin.contents.inactive')); ?>

                                </option>
                            </select>
                            <span class="control-error" v-if="errors.has('status')" v-text="errors.first('status')"></span>
                        </div>

                        <?php echo view_render_event('bagisto.admin.content.create_form_accordian.page.controls.after'); ?>


                    </div>
                </accordian>

                <?php echo view_render_event('bagisto.admin.content.create_form_accordian.page.after'); ?>


                <?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.before'); ?>


                <accordian :title="'<?php echo e(__('velocity::app.admin.contents.tab.content')); ?>'" :active="true">
                    <div slot="body">

                        <?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.controls.before'); ?>


                            <content-type></content-type>

                        <?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.controls.after'); ?>


                    </div>
                </accordian>

                <?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.after'); ?>


            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js')); ?>"></script>

    <script type="text/x-template" id="content-type-template">
        <div>
            

            <div class="control-group" :class="[errors.has('content_type') ? 'has-error' : '']">
                <label for="content_type" class="required"><?php echo e(__('velocity::app.admin.contents.content.content-type')); ?></label>

                <select class="control" v-model="content_type" v-validate="'required'" id="content_type" name="content_type" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.content.content-type')); ?>&quot;" @change="loadFields($event)">
                    <option value=""><?php echo e(__('velocity::app.admin.contents.select')); ?></option>

                    <?php $__currentLoopData = velocity()->getContentType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $content_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($content_type); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <span class="control-error" v-if="errors.has('content_type')" v-text="errors.first('content_type')"></span>
            </div>

            <div v-if="content_type == 'link'">
                <?php echo $__env->make('velocity::admin.content.content-type.link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div v-else-if="content_type == 'product'">
                <?php echo $__env->make('velocity::admin.content.content-type.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div v-else-if="content_type == 'static'">
                <?php echo $__env->make('velocity::admin.content.content-type.static', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    content_type: '',
                }
            },
            methods: {
                loadFields(event) {
                    this.content_type = event.target.value;

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
                }
            }
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/content/create.blade.php ENDPATH**/ ?>