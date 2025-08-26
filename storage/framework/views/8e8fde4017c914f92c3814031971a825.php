<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.customers.groups.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.groups.update', $group->id)); ?>">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.groups.index')); ?>'"></i>

                        <?php echo e(__('admin::app.customers.groups.edit-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.customers.groups.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">

                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <input name="_method" type="hidden" value="PUT">

                    <div class="control-group" :class="[errors.has('code') ? 'has-error' : '']">
                        <label for="code" class="required"><?php echo e(__('admin::app.customers.groups.code')); ?></label>
                        <input type="text" v-validate="'required'" class="control" id="code" name="code" data-vv-as="&quot;<?php echo e(__('admin::app.customers.groups.code')); ?>&quot;" value="<?php echo e(old('code') ?: $group->code); ?>" disabled="disabled"/>
                        <input type="hidden" name="code" value="<?php echo e($group->code); ?>"/>
                        <span class="control-error" v-if="errors.has('code')">{{ errors.first('code') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                        <label for="name" class="required">
                            <?php echo e(__('admin::app.customers.groups.name')); ?>

                        </label>
                        <input type="text" class="control" name="name" v-validate="'required'" value="<?php echo e(old('name') ?: $group->name); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.customers.groups.name')); ?>&quot;">
                        <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/customers/groups/edit.blade.php ENDPATH**/ ?>