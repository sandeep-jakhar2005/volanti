<?php echo view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.before', ['product' => $product]); ?>


<accordian title="<?php echo e(__('admin::app.catalog.products.inventories')); ?>" :active="false">
    <div slot="body">

        <?php echo view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.controls.before', ['product' => $product]); ?>


        <div class="control-group">
            <?php
                $orderedQty = $product->ordered_inventories->pluck('qty')->first() ?? 0;
            ?>

            <div style="margin-bottom: 10px">
                <span class="badge badge-sm badge-warning" style="display: inline-block; padding: 5px;"></span>

                <?php echo e(__('admin::app.catalog.products.pending-ordered-qty', ['qty' => $orderedQty])); ?>

            </div>

            <span class="control-info"><?php echo e(__('admin::app.catalog.products.pending-ordered-qty-info')); ?></span>
        </div>

        <?php $__currentLoopData = $inventorySources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventorySource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $qty = old('inventories[' . $inventorySource->id . ']')
                    ?: (
                        $product->inventories->where('inventory_source_id', $inventorySource->id)->pluck('qty')->first()
                        ?? 0
                    );
            ?>

            <div class="control-group" :class="[errors.has('inventories[<?php echo e($inventorySource->id); ?>]') ? 'has-error' : '']">
                <label><?php echo e($inventorySource->name); ?></label>

                <input type="text" v-validate="'numeric|min:0'" name="inventories[<?php echo e($inventorySource->id); ?>]" class="control" value="<?php echo e($qty); ?>" data-vv-as="&quot;<?php echo e($inventorySource->name); ?>&quot;"/>
                
                <span class="control-error" v-if="errors.has('inventories[<?php echo e($inventorySource->id); ?>]')">{{ errors.first('inventories[<?php echo $inventorySource->id; ?>]') }}</span>
            </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.controls.after', ['product' => $product]); ?>


    </div>
</accordian>

<?php echo view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.after', ['product' => $product]); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/products/accordians/inventories.blade.php ENDPATH**/ ?>