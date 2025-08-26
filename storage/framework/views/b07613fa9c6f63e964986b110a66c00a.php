
<?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.link.before'); ?>


    <div class="control-group" :class="[errors.has('page_link') ? 'has-error' : '']">
        <label for="page_link" class="required"><?php echo e(__('velocity::app.admin.contents.content.page-link')); ?></label>
        <input type="text" v-validate="'required|max:150'" class="control" id="page_link" name="page_link" value="" data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.content.page-link')); ?>&quot;"/>

        <span class="control-error" v-if="errors.has('page_link')" v-text="errors.first('page_link')"></span>
    </div>

    <div class="control-group">
        <label for="link_target"><?php echo e(__('velocity::app.admin.contents.content.link-target')); ?></label>

        <select class="control" id="link_target" name="link_target" value="">
            <option value="0">
                <?php echo e(__('velocity::app.admin.contents.self')); ?>

            </option>
            <option value="1">
                <?php echo e(__('velocity::app.admin.contents.new-tab')); ?>

            </option>
        </select>
    </div>

<?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.link.after'); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/content/content-type/link.blade.php ENDPATH**/ ?>