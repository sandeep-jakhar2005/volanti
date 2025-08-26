<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('velocity::app.admin.category.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = history.length > 1 ? document.referrer : '<?php echo e(route('admin.dashboard.index')); ?>'"></i>

                        <?php echo e(__('velocity::app.admin.category.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('velocity::app.admin.category.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <?php echo csrf_field(); ?>

                <?php echo view_render_event('bagisto.admin.category.create_form_accordian.general.before'); ?>


                <accordian :title="'<?php echo e(__('velocity::app.admin.category.tab.general')); ?>'" :active="true">
                    <div slot="body">

                        <?php echo view_render_event('bagisto.admin.category.create_form_accordian.general.content.before'); ?>


                            <div class="control-group" :class="[errors.has('category_id') ? 'has-error' : '']">
                                <label for="category_id" class="required">
                                    <?php echo e(__('velocity::app.admin.category.select-category')); ?>

                                </label>

                                <select v-validate="'required'" class="control" id="category_id" name="category_id" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.category.select-category')); ?>&quot;">
                                    <option value=""><?php echo e(__('velocity::app.admin.category.select')); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <span class="control-error" v-if="errors.has('category_id')" v-text="errors.first('category_id')"></span>
                            </div>

                            <div class="control-group" :class="[errors.has('icon') ? 'has-error' : '']">
                                <label for="icon" class="required">
                                    <?php echo e(__('velocity::app.admin.category.icon-class')); ?>

                                </label>

                                <input type="text" v-validate="'required'" class="control" id="icon" name="icon" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.category.icon-class')); ?>&quot;" />

                                <span class="control-error" v-if="errors.has('icon')" v-text="errors.first('icon')"></span>
                            </div>

                            <div class="control-group" :class="[errors.has('tooltip') ? 'has-error' : '']">
                                <label for="tooltip">
                                    <?php echo e(__('velocity::app.admin.category.tooltip-content')); ?>

                                </label>

                                <textarea v-validate="'max:250'" class="control" id="tooltip" name="tooltip" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.category.tooltip-content')); ?>&quot;"></textarea>

                                <span class="control-error" v-if="errors.has('tooltip')" v-text="errors.first('tooltip')"></span>
                            </div>

                            <div class="control-group" :class="[errors.has('status') ? 'has-error' : '']">
                                <label for="status" class="required"><?php echo e(__('velocity::app.admin.category.status')); ?></label>
                                <select class="control" v-validate="'required'" id="status" name="status" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.category.status')); ?>&quot;">
                                    <option value="1">
                                        <?php echo e(__('velocity::app.admin.category.active')); ?>

                                    </option>
                                    <option value="0">
                                        <?php echo e(__('velocity::app.admin.category.inactive')); ?>

                                    </option>
                                </select>
                                <span class="control-error" v-if="errors.has('status')" v-text="errors.first('status')"></span>
                            </div>

                        <?php echo view_render_event('bagisto.admin.category.create_form_accordian.general.content.after'); ?>


                    </div>
                </accordian>

                <?php echo view_render_event('bagisto.admin.category.create_form_accordian.general.after'); ?>


            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/category/create.blade.php ENDPATH**/ ?>