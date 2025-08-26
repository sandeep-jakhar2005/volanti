<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.profile.edit-profile.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <div class="account-head mb-10">
            <span class="back-icon"><a href="<?php echo e(route('shop.customer.profile.index')); ?>"><i class="icon icon-menu-back"></i></a></span>

            <span class="account-heading"><?php echo e(__('shop::app.customer.account.profile.edit-profile.title')); ?></span>

            <span></span>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]); ?>


        <form method="post" action="<?php echo e(route('shop.customer.profile.store')); ?>" @submit.prevent="onSubmit">
            <div class="edit-form">
                <?php echo csrf_field(); ?>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]); ?>


                <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                    <label for="first_name" class="required"><?php echo e(__('shop::app.customer.account.profile.fname')); ?></label>

                    <input type="text" class="control" name="first_name" value="<?php echo e(old('first_name') ?? $customer->first_name); ?>" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.fname')); ?>&quot;">

                    <span class="control-error" v-if="errors.has('first_name')">{{ errors.first('first_name') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.first_name.after'); ?>


                <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                    <label for="last_name" class="required"><?php echo e(__('shop::app.customer.account.profile.lname')); ?></label>

                    <input type="text" class="control" name="last_name" value="<?php echo e(old('last_name') ?? $customer->last_name); ?>" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.lname')); ?>&quot;">

                    <span class="control-error" v-if="errors.has('last_name')">{{ errors.first('last_name') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.last_name.after'); ?>


                <div class="control-group" :class="[errors.has('gender') ? 'has-error' : '']">
                    <label for="email" class="required"><?php echo e(__('shop::app.customer.account.profile.gender')); ?></label>

                    <select name="gender" class="control" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.gender')); ?>&quot;">
                        <option value=""  <?php if($customer->gender == ""): ?> selected <?php endif; ?>><?php echo e(__('admin::app.customers.customers.select-gender')); ?></option>
                        <option value="Other"  <?php if($customer->gender == "Other"): ?> selected <?php endif; ?>><?php echo e(__('shop::app.customer.account.profile.other')); ?></option>
                        <option value="Male"  <?php if($customer->gender == "Male"): ?> selected <?php endif; ?>><?php echo e(__('shop::app.customer.account.profile.male')); ?></option>
                        <option value="Female" <?php if($customer->gender == "Female"): ?> selected <?php endif; ?>><?php echo e(__('shop::app.customer.account.profile.female')); ?></option>
                    </select>

                    <span class="control-error" v-if="errors.has('gender')">{{ errors.first('gender') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.gender.after'); ?>


                <div class="control-group date"  :class="[errors.has('date_of_birth') ? 'has-error' : '']">
                    <label for="date_of_birth"><?php echo e(__('shop::app.customer.account.profile.dob')); ?></label>

                    <date>
                        <input type="date" class="control" name="date_of_birth" value="<?php echo e(old('date_of_birth') ?? $customer->date_of_birth); ?>" v-validate="" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.dob')); ?>&quot;">
                    </date>

                    <span class="control-error" v-if="errors.has('date_of_birth')">{{ errors.first('date_of_birth') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.date_of_birth.after'); ?>


                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <label for="email" class="required"><?php echo e(__('shop::app.customer.account.profile.email')); ?></label>

                    <input type="email" class="control" name="email" value="<?php echo e(old('email') ?? $customer->email); ?>" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.email')); ?>&quot;">

                    <span class="control-error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.email.after'); ?>


                <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                    <label for="phone"><?php echo e(__('shop::app.customer.account.profile.phone')); ?></label>

                    <input type="text" class="control" name="phone" value="<?php echo e(old('phone') ?? $customer->phone); ?>" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.phone')); ?>&quot;">

                    <span class="control-error" v-if="errors.has('phone')">{{ errors.first('phone') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.phone.after'); ?>


                <div class="control-group" :class="[errors.has('oldpassword') ? 'has-error' : '']">
                    <label for="password"><?php echo e(__('shop::app.customer.account.profile.opassword')); ?></label>

                    <input type="password" class="control" name="oldpassword" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.opassword')); ?>&quot;" v-validate="'min:6'">

                    <span class="control-error" v-if="errors.has('oldpassword')">{{ errors.first('oldpassword') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.oldpassword.after'); ?>


                <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                    <label for="password"><?php echo e(__('shop::app.customer.account.profile.password')); ?></label>

                    <input type="password" id="password" class="control" name="password" ref="password" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.password')); ?>&quot;" v-validate="'min:6'">

                    <span class="control-error" v-if="errors.has('password')">{{ errors.first('password') }}</span>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.password.after'); ?>


                <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                    <label for="password"><?php echo e(__('shop::app.customer.account.profile.cpassword')); ?></label>

                    <input type="password" id="password_confirmation" class="control" name="password_confirmation" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.profile.cpassword')); ?>&quot;" v-validate="'min:6|confirmed:password'">

                    <span class="control-error" v-if="errors.has('password_confirmation')">{{ errors.first('password_confirmation') }}</span>
                </div>

                <?php if(core()->getConfigData('customer.settings.newsletter.subscription')): ?>
                    <div class="control-group">
                        <input type="checkbox" id="checkbox2" name="subscribed_to_news_letter"<?php if(isset($customer->subscription)): ?> value="<?php echo e($customer->subscription->is_subscribed); ?>" <?php echo e($customer->subscription->is_subscribed ? 'checked' : ''); ?> <?php endif; ?>>

                        <span><?php echo e(__('shop::app.customer.signup-form.subscribe-to-newsletter')); ?></span>
                    </div>
                <?php endif; ?>

                <?php echo view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]); ?>


                <div class="button-group">
                    <input class="btn btn-primary btn-lg" type="submit" value="<?php echo e(__('shop::app.customer.account.profile.submit')); ?>">
                </div>
            </div>
        </form>

        <?php echo view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/profile/edit.blade.php ENDPATH**/ ?>