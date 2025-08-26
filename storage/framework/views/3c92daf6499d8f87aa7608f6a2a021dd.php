<div class="auth-content form-container register-form display-none">
    <div class="container ">
        
        <div class="col-lg-10 col-md-12 offset-lg-1">
            <h2 class="fs24 fw6 text-center register-head my-5">
                <?php echo e(__('velocity::app.customer.signup-form.user-registration')); ?>

            </h2>
            <div class="body col-12 border-0 p-0">
                

                <?php echo view_render_event('bagisto.shop.customers.signup.before'); ?>


                <form method="POST" id="form2" action="<?php echo e(route('shop.customer.register.create')); ?>"
                    @submit.prevent="onSubmit">

                    <?php echo e(csrf_field()); ?>


                    <div class="row">
                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.before'); ?>


                        <div class="control-group col-6 mb-3" :class="[errors.has('first_name') ? 'has-error' : '']">
                            <label for="first_name" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.firstname')); ?>

                            </label>

                            <input type="text" class="form-control form-control-lg  " name="first_name"
                                v-validate="'required'" value="<?php echo e(old('first_name')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.firstname')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('first_name')"
                                v-text="errors.first('first_name')"></span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after'); ?>


                        <div class="control-group col-6 mb-3" :class="[errors.has('last_name') ? 'has-error' : '']">
                            <label for="last_name" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.lastname')); ?>

                            </label>

                            <input type="text" class="form-control form-control-lg  " name="last_name"
                                v-validate="'required'" value="<?php echo e(old('last_name')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.lastname')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('last_name')"
                                v-text="errors.first('last_name')"></span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after'); ?>


                        <div class="control-group col-6 mb-3" :class="[errors.has('email') ? 'has-error' : '']">
                            <label for="email" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.email')); ?>

                            </label>

                            <input type="email" class="form-control form-control-lg  " name="email"
                                v-validate="'required|email'" value="<?php echo e(old('email')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.email')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('email')"
                                v-text="errors.first('email')"></span>
                        </div>

                        

                        <div class="control-group col-6 mb-3" :class="[errors.has('phone') ? 'has-error' : '']">
                            <label for="Phone Number" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.phonenumber')); ?>

                            </label>
                            <input type="text" class="control form-control form-control-lg  " id="phone"
                                name="phone" value="<?php echo e(old('phone')); ?>" v-validate="'required|numeric'"
                                data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.phone')); ?>&quot;">
                            <span class="control-error" v-if="errors.has('phone')"
                                v-text="errors.first('phone')"></span>
                        </div>

                        

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.email.after'); ?>


                        <div class="control-group col-6 mb-3" :class="[errors.has('password') ? 'has-error' : '']">
                            <label for="password" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.password')); ?>

                            </label>

                            <input type="password" class="form-control form-control-lg  " name="password"
                                v-validate="'required|min:6'" ref="password" value="<?php echo e(old('password')); ?>"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.password')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('password')"
                                v-text="errors.first('password')"></span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.password.after'); ?>


                        <div class="control-group col-6 mb-3"
                            :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                            <label for="password_confirmation" class="required label-style">
                                <?php echo e(__('shop::app.customer.signup-form.confirm_pass')); ?>

                            </label>

                            <input type="password" class="form-control form-control-lg  "
                                name="password_confirmation" v-validate="'required|min:6|confirmed:password'"
                                data-vv-as="&quot;<?php echo e(__('shop::app.customer.signup-form.confirm_pass')); ?>&quot;" />

                            <span class="control-error" v-if="errors.has('password_confirmation')"
                                v-text="errors.first('password_confirmation')"></span>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.password_confirmation.after'); ?>

                    </div>
                    <div class="control-group">

                        <?php echo Captcha::render(); ?>


                    </div>

                    <?php if(core()->getConfigData('customer.settings.newsletter.subscription')): ?>
                        <div class="control-group">
                            <input type="checkbox" id="checkbox2" name="is_subscribed">
                            <span><?php echo e(__('shop::app.customer.signup-form.subscribe-to-newsletter')); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php echo view_render_event('bagisto.shop.customers.signup_form_controls.after'); ?>


                    <button class="theme-btn register-btn" type="submit" id="submit-form2">
                        <?php echo e(__('shop::app.customer.signup-form.title')); ?>

                    </button>
                </form>

                <?php echo view_render_event('bagisto.shop.customers.signup.after'); ?>

            </div>
        </div>
    </div>
</div>  <?php /**PATH /home/ubuntu/volantiScottsdale/packages/ACME/CateringPackage/src/Resources/views/shop/volantijetcatering/customer/d.blade.php ENDPATH**/ ?>