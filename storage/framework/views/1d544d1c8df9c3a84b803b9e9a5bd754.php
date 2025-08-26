<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.users.roles.edit-role-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.roles.update', $role->id)); ?>" @submit.prevent="onSubmit">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.roles.index')); ?>'"></i>

                        <?php echo e(__('admin::app.users.roles.edit-role-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.users.roles.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <input name="_method" type="hidden" value="PUT">

                    <accordian title="<?php echo e(__('admin::app.users.roles.general')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.users.roles.name')); ?></label>
                                <input type="text" v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;<?php echo e(__('admin::app.users.roles.name')); ?>&quot;" value="<?php echo e(old('name') ?: $role->name); ?>"/>
                                <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="description"><?php echo e(__('admin::app.users.roles.description')); ?></label>
                                <textarea class="control" id="description" name="description"><?php echo e(old('description') ?: $role->description); ?></textarea>
                            </div>
                        </div>
                    </accordian>

                    <accordian title="<?php echo e(__('admin::app.users.roles.access-control')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label for="permission_type"><?php echo e(__('admin::app.users.roles.permissions')); ?></label>
                                <select class="control" name="permission_type" id="permission_type">
                                    <option value="custom" <?php echo e($role->permission_type == 'custom' ? 'selected' : ''); ?>><?php echo e(__('admin::app.users.roles.custom')); ?></option>
                                    <option value="all" <?php echo e($role->permission_type == 'all' ? 'selected' : ''); ?>><?php echo e(__('admin::app.users.roles.all')); ?></option>
                                </select>
                            </div>

                            <div class="control-group tree-wrapper <?php echo e($role->permission_type == 'all' ? 'hide' : ''); ?>">
                                <tree-view value-field="key" id-field="key" items='<?php echo json_encode($acl->items, 15, 512) ?>' value='<?php echo json_encode($role->permissions, 15, 512) ?>' fallback-locale="<?php echo e(config('app.fallback_locale')); ?>"></tree-view>
                            </div>
                        </div>
                    </accordian>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('#permission_type').on('change', function(e) {
                if ($(e.target).val() == 'custom') {
                    $('.tree-wrapper').removeClass('hide')
                } else {
                    $('.tree-wrapper').addClass('hide')
                }

            })
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/users/roles/edit.blade.php ENDPATH**/ ?>