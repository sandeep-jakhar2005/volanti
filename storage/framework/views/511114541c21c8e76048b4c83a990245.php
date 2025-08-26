<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.marketing.campaigns.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">

        <form method="POST" action="<?php echo e(route('admin.campaigns.store')); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.campaigns.index')); ?>'"></i>

                        <?php echo e(__('admin::app.marketing.campaigns.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.marketing.campaigns.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.marketing.templates.create.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.marketing.campaigns.general')); ?>" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.marketing.campaigns.name')); ?></label>
                                <input v-validate="'required'" class="control" id="name" name="name" value="<?php echo e(old('name')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.campaigns.name')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('subject') ? 'has-error' : '']">
                                <label for="subject" class="required"><?php echo e(__('admin::app.marketing.campaigns.subject')); ?></label>
                                <input v-validate="'required'" class="control" id="subject" name="subject" value="<?php echo e(old('subject')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.campaigns.subject')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('subject')">{{ errors.first('subject') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('marketing_event_id') ? 'has-error' : '']">
                                <label for="event" class="required"><?php echo e(__('admin::app.marketing.campaigns.event')); ?></label>
                                <select class="control" v-validate="'required'" id="marketing_event_id" name="marketing_event_id" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.campaigns.event')); ?>&quot;">
                                    <?php $__currentLoopData = app('Webkul\Marketing\Repositories\EventRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($event->id); ?>" <?php echo e(old('marketing_event_id') == $event->id ? 'selected' : ''); ?>>
                                            <?php echo e($event->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="control-error" v-if="errors.has('marketing_event_id')">{{ errors.first('marketing_event_id') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('marketing_template_id') ? 'has-error' : '']">
                                <label for="marketing_template_id" class="required"><?php echo e(__('admin::app.marketing.campaigns.email-template')); ?></label>

                                <select v-validate="'required'" class="control" id="marketing_template_id" name="marketing_template_id" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.campaigns.email-template')); ?>&quot;">
                                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($template->id); ?>" <?php echo e(old('marketing_template_id') == $template->id ? 'selected' : ''); ?>>
                                            <?php echo e($template->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                                <span class="control-error" v-if="errors.has('marketing_template_id')">{{ errors.first('marketing_template_id') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('status') ? 'has-error' : '']">
                                <label for="status" class="required"><?php echo e(__('admin::app.marketing.campaigns.status')); ?></label>
                                <select class="control" v-validate="'required'" id="status" name="status" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.campaigns.display-mode')); ?>&quot;">
                                    <option value="0" <?php echo e(old('status') == 0 ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.marketing.campaigns.inactive')); ?>

                                    </option>
                                    <option value="1" <?php echo e(old('status') == 1 ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.marketing.campaigns.active')); ?>

                                    </option>
                                </select>
                                <span class="control-error" v-if="errors.has('status')">{{ errors.first('status') }}</span>
                            </div>

                        </div>
                    </accordian>

                    <accordian title="<?php echo e(__('admin::app.marketing.campaigns.audience')); ?>" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('channel_id') ? 'has-error' : '']">
                                <label for="channel_id" class="required"><?php echo e(__('admin::app.marketing.campaigns.channel')); ?></label>
                                <select v-validate="'required'" class="control" id="channel_id" name="channel_id" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.campaigns.channel')); ?>&quot;">
                                    <?php $__currentLoopData = app('Webkul\Core\Repositories\ChannelRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($channel->id); ?>" <?php echo e(old('channel_id') == $channel->id ? 'selected' : ''); ?>>
                                            <?php echo e(core()->getChannelName($channel)); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="control-error" v-if="errors.has('channel_id')">{{ errors.first('channel_id') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('customer_group_id') ? 'has-error' : '']">
                                <label for="customer_group_id" class="required"><?php echo e(__('admin::app.marketing.campaigns.customer-group')); ?></label>
                                <select v-validate="'required'" class="control" id="customer_group_id" name="customer_group_id" data-vv-as="&quot;<?php echo e(__('admin::app.marketing.campaigns.customer-group')); ?>&quot;">
                                    <?php $__currentLoopData = app('Webkul\Customer\Repositories\CustomerGroupRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customerGroup->id); ?>" <?php echo e(old('customer_group_id') == $customerGroup->id ? 'selected' : ''); ?>>
                                            <?php echo e($customerGroup->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="control-error" v-if="errors.has('customer_group_id')">{{ errors.first('customer_group_id') }}</span>
                            </div>

                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.marketing.templates.create.after'); ?>


                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Resources/views/marketing/email-marketing/campaigns/create.blade.php ENDPATH**/ ?>