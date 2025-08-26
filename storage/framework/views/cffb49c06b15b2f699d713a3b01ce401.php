<div class="footer-copy-right">
    <span>
        <?php if(core()->getConfigData('general.content.footer.footer_content')): ?>
            <?php echo core()->getConfigData('general.content.footer.footer_content'); ?>

        <?php else: ?>
            <?php echo trans('admin::app.footer.copy-right'); ?>

        <?php endif; ?>
    </span>
</div>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/layouts/footer/copy-right.blade.php ENDPATH**/ ?>