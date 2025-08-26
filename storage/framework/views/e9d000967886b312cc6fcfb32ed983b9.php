<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.orders.title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('create.custom.add-order')); ?>" @submit.prevent="onSubmit">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link"
                            onclick="window.location = '<?php echo e(route('admin.sales.order.index')); ?>'"></i>
                        Add Order
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        Save Order
                    </button>
                </div>
            </div>

            <div class="page-content">
                <?php echo csrf_field(); ?>
                <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                    <label for="name" class="required">Full Name</label>
                    <input class="control" v-validate="'required'" id="name" name="name" value="<?php echo e(old('name')); ?>"/>
                    <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                </div>
                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <label for="email" class="required">Email</label>
                    <input type="email" class="control" v-validate="'required'" id="email" name="email" value="<?php echo e(old('email')); ?>"/>
                    <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                </div>
                <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                    <label for="phone" class="required">Phone Number</label>
                    <input type="number" class="control" v-validate="'required'" id="phone" name="phone" value="<?php echo e(old('phone')); ?>"/>
                    <span class="control-error" v-if="errors.has('phone')">{{ errors.first('phone') }}</span>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/ACME/paymentProfile/src/Resources/views/admin/sales/orders/custom-order/create.blade.php ENDPATH**/ ?>