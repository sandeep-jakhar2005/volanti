<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.profile.index.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <div class="account-head">
            <span class="back-icon"><a href="<?php echo e(route('shop.customer.profile.index')); ?>"><i class="icon icon-menu-back"></i></a></span>

            <span class="account-heading"><?php echo e(__('shop::app.customer.account.profile.index.title')); ?></span>

            <span class="account-action">
                <a href="<?php echo e(route('shop.customer.profile.edit')); ?>"><?php echo e(__('shop::app.customer.account.profile.index.edit')); ?></a>
            </span>

            <div class="horizontal-rule"></div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]); ?>


        <div class="account-table-content" style="width: 50%;">
            <table style="color: #5E5E5E;">
                <tbody>
                    <?php echo view_render_event('bagisto.shop.customers.account.profile.view.table.before', ['customer' => $customer]); ?>


                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.fname')); ?></td>
                        <td><?php echo e($customer->first_name); ?></td>
                    </tr>

                    <?php echo view_render_event('bagisto.shop.customers.account.profile.view.table.first_name.after', ['customer' => $customer]); ?>


                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.lname')); ?></td>
                        <td><?php echo e($customer->last_name); ?></td>
                    </tr>

                    <?php echo view_render_event('bagisto.shop.customers.account.profile.view.table.last_name.after', ['customer' => $customer]); ?>


                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.gender')); ?></td>
                        <td><?php echo e(__($customer->gender)); ?></td>
                    </tr>

                    <?php echo view_render_event('bagisto.shop.customers.account.profile.view.table.gender.after', ['customer' => $customer]); ?>


                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.dob')); ?></td>
                        <td><?php echo e($customer->date_of_birth); ?></td>
                    </tr>

                    <?php echo view_render_event('bagisto.shop.customers.account.profile.view.table.date_of_birth.after', ['customer' => $customer]); ?>


                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.email')); ?></td>
                        <td><?php echo e($customer->email); ?></td>
                    </tr>

                    <tr>
                        <td> 
                            <button type="submit" @click="showModal('deleteProfile')" class="btn btn-lg btn-primary mt-10">
                                <?php echo e(__('shop::app.customer.account.address.index.delete')); ?>

                            </button>
                        </td>                        
                    </tr>

                    <?php echo view_render_event('bagisto.shop.customers.account.profile.view.table.after', ['customer' => $customer]); ?>

                </tbody>
            </table>           

            <form method="POST" action="<?php echo e(route('shop.customer.profile.destroy')); ?>" @submit.prevent="onSubmit">
                <?php echo csrf_field(); ?>

                <modal id="deleteProfile" :is-open="modalIds.deleteProfile">
                    <h3 slot="header"><?php echo e(__('shop::app.customer.account.address.index.enter-password')); ?></h3>

                    <div slot="body">
                        <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                            <label for="password" class="required"><?php echo e(__('admin::app.users.users.password')); ?></label>
                            <input type="password" v-validate="'required|min:6|max:18'" class="control" id="password" name="password" data-vv-as="&quot;<?php echo e(__('admin::app.users.users.password')); ?>&quot;"/>
                            <span class="control-error" v-if="errors.has('password')">{{ errors.first('password') }}</span>
                        </div>

                        <div class="page-action">
                            <button type="submit"  class="btn btn-lg btn-primary mt-10">
                            <?php echo e(__('shop::app.customer.account.address.index.delete')); ?>

                            </button>
                        </div>
                    </div>
                </modal>
            </form>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/profile/index.blade.php ENDPATH**/ ?>