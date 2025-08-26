
<?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.link.before'); ?>


<div class="control-group" :class="[errors.has('<?php echo $locale; ?>[page_link]') ? 'has-error' : '']">
    <label for="page_link" class="required">
        <?php echo e(__('velocity::app.admin.contents.content.category-slug')); ?>

    </label>

    <?php
       $pageTarget = isset($locale) ? (old($locale)['page_link'] ?? (isset($content) ? $content->translate($locale) ? $content->translate($locale)['page_link'] : '' : '')) : '';
    ?>

    <input
        type="text"
        id="page_link"
        class="control"
        value="<?php echo e($pageTarget); ?>"
        name="<?php echo e($locale); ?>[page_link]"
        v-validate="'required|max:150'"
        @input="$event.target.value=$event.target.value.toLowerCase()"
        data-vv-as="&quot;<?php echo e(__('velocity::app.admin.contents.content.category-slug')); ?>&quot;" />

    <span class="control-error" v-if="errors.has('<?php echo $locale; ?>[page_link]')" v-text="errors.first('<?php echo $locale; ?>[page_link]')"></span>
</div>

<div class="control-group">
    <label for="link_target">
        <?php echo e(__('velocity::app.admin.contents.content.link-target')); ?>

    </label>

    <?php
       $linkTarget = isset($locale) ? (old($locale)['link_target'] ?? (isset($content) ? $content->translate($locale) ? $content->translate($locale)['link_target'] : '' : '')) : '';
    ?>

    <select class="control" id="link_target" name="<?php echo e($locale); ?>[link_target]" value="">
        <option value="0">
            <?php echo e(__('velocity::app.admin.contents.self')); ?>

        </option>
        <option value="1" <?php if($linkTarget == 1): ?> selected="selected" <?php endif; ?>>
            <?php echo e(__('velocity::app.admin.contents.new-tab')); ?>

        </option>
    </select>
</div>

<?php echo view_render_event('bagisto.admin.content.create_form_accordian.content.link.after'); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/admin/content/content-type/category.blade.php ENDPATH**/ ?>