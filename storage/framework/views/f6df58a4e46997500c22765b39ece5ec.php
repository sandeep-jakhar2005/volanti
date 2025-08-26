<?php
$locale = core()->getRequestedLocaleCode();
?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.catalog.categories.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.catalog.categories.title')); ?></h1>
            </div>

            <div class="page-action">
                <?php echo view_render_event('bagisto.admin.catalog.categories.create.before'); ?>

                
                <?php if(bouncer()->hasPermission('catalog.categories.create')): ?>
                    <a
                        href="<?php echo e(route('admin.catalog.categories.create')); ?>"
                        class="btn btn-lg btn-primary"
                    >
                        <?php echo e(__('admin::app.catalog.categories.add-title')); ?>

                    </a>
                <?php endif; ?>

                <?php echo view_render_event('bagisto.admin.catalog.categories.create.after'); ?>

            </div>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.categories.list.before'); ?>


        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.catalog.categories.index')); ?>"></datagrid-plus>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.categories.list.after'); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("input[type='checkbox']").change(deleteCategory);
        });

        /**
         * Delete category function. This function name is present in category datagrid.
         * So outside scope function should be loaded `onclick` rather than `v-on`.
         */
        let deleteCategory = function(e, type) {
            let indexes;

            if (type == 'delete') {
                indexes = $(e.target).parent().attr('id');
            } else {
                $("input[type='checkbox']").attr('disabled', true);

                let formData = {};
                $.each($('form').serializeArray(), function(i, field) {
                    formData[field.name] = field.value;
                });

                indexes = formData.indexes;
            }

            if (indexes) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('admin.catalog.categories.product.count')); ?>',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        indexes: indexes
                    },
                    success: function(data) {
                        $("input[type='checkbox']").attr('disabled', false);
                        if (data.product_count > 0) {
                            let message = "<?php echo e(trans('ui::app.datagrid.mass-action.delete-category-product')); ?>";

                            if (type == 'delete') {
                                doAction(e, message);
                            } else {
                                $('form').attr('onsubmit', 'return confirm("' + message + '")');
                            }
                        } else {
                            let message = "<?php echo e(__('ui::app.datagrid.click_on_action')); ?>";

                            if (type == 'delete') {
                                doAction(e, message);
                            } else {
                                $('form').attr('onsubmit', 'return confirm("' + message + '")');
                            }
                        }
                    }
                });
            } else {
                $("input[type='checkbox']").attr('disabled', false);
            }
        }

        /**
         * Reload page.
         */
        function reloadPage(getVar, getVal) {
            let url = new URL(window.location.href);

            url.searchParams.set(getVar, getVal);

            window.location.href = url.href;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/categories/index.blade.php ENDPATH**/ ?>