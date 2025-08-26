<?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.static.before'); ?>


    <div class="control-group" :class="[errors.has('description') ? 'has-error' : '']">
        <label for="description" class="required"><?php echo e(__('velocity::app.admin.contents.content.static-description')); ?></label>

        <textarea v-validate="'required'" class="control" id="description" name="description" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.content.static-description')); ?>&quot;"></textarea>

        <span class="control-error" v-if="errors.has('description')" v-text="errors.first('description')"></span>
    </div>

<?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.static.after'); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/content/content-type/static.blade.php ENDPATH**/ ?>