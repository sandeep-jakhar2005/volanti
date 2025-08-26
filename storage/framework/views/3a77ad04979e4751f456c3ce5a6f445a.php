<tbody>
    <?php if($records instanceof \Illuminate\Pagination\LengthAwarePaginator && count($records)): ?>
        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <?php if($enableMassActions): ?>
                    <td>
                        <?php
                            $record_id = $record->{$index};
                        ?>

                        <span class="checkbox">
                            <input type="checkbox" v-model="dataIds" @change="select($event)" value="<?php echo e($record_id); ?>">

                            <label class="checkbox-view" for="checkbox"></label>
                        </span>
                    </td>
                <?php endif; ?>

                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $columnIndex = explode('.', $column['index']);

                        $columnIndex = end($columnIndex);

                        $supportedClosureKey = ['wrapper', 'closure'];

                        $isClosure = ! empty(array_intersect($supportedClosureKey, array_keys($column)));
                    ?>

                    <?php if($isClosure): ?>
                        
                        <?php if(
                            isset($column['wrapper'])
                            && gettype($column['wrapper']) === 'object'
                            && $column['wrapper'] instanceof \Closure
                        ): ?>
                            <?php if(! empty($column['closure'])): ?>
                                <td data-value="<?php echo e($column['label']); ?>"><?php echo $column['wrapper']($record); ?></td>
                            <?php else: ?>
                                <td data-value="<?php echo e($column['label']); ?>"><?php echo e($column['wrapper']($record)); ?></td>
                            <?php endif; ?>
                        <?php elseif(
                            isset($column['closure'])
                            && gettype($column['closure']) === 'object'
                            && $column['closure'] instanceof \Closure
                        ): ?>
                            <td data-value="<?php echo e($column['label']); ?>"><?php echo $column['closure']($record); ?></td>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($column['type'] == 'price'): ?>
                            <?php if(isset($column['currencyCode'])): ?>
                                <td data-value="<?php echo e($column['label']); ?>"><?php echo e(core()->formatPrice($record->{$columnIndex}, $column['currencyCode'])); ?></td>
                            <?php else: ?>
                                <td data-value="<?php echo e($column['label']); ?>"><?php echo e(core()->formatBasePrice($record->{$columnIndex})); ?></td>
                            <?php endif; ?>
                        <?php else: ?>
                            <td data-value="<?php echo e($column['label']); ?>"><?php echo e($record->{$columnIndex}); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($enableActions): ?>
                    <td class="actions" style="white-space: nowrap; width: 100px;" data-value="<?php echo e(__('ui::app.datagrid.actions')); ?>">
                        <div class="action">
                            <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $toDisplay = (isset($action['condition']) && gettype($action['condition']) == 'object')
                                        ? $action['condition']($record)
                                        : true;
                                ?>

                                <?php if($toDisplay): ?>
                                    <a
                                        id="<?php echo e($record->{$action['index'] ?? $index}); ?>"

                                        <?php if($action['method'] == 'GET'): ?>
                                            href="<?php echo e(route($action['route'], $record->{$action['index'] ?? $index})); ?>"
                                        <?php endif; ?>

                                        <?php if($action['method'] != 'GET'): ?>
                                            <?php if(isset($action['function'])): ?>
                                                onclick="<?php echo e($action['function']); ?>"
                                            <?php else: ?>
                                                v-on:click="doAction($event)"
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        data-method="<?php echo e($action['method']); ?>"
                                        data-action="<?php echo e(route($action['route'], $record->{$index})); ?>"
                                        data-token="<?php echo e(csrf_token()); ?>"

                                        <?php if(isset($action['target'])): ?>
                                            target="<?php echo e($action['target']); ?>"
                                        <?php endif; ?>

                                        <?php if(isset($action['title'])): ?>
                                            title="<?php echo e($action['title']); ?>"
                                        <?php endif; ?>
                                    >
                                        <span class="<?php echo e($action['icon']); ?>"></span>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <tr>
            <td colspan="10">
                <p style="text-align: center;"><?php echo e($norecords); ?></p>
            </td>
        </tr>
    <?php endif; ?>
</tbody>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Ui/src/Providers/../Resources/views/datagrid/body.blade.php ENDPATH**/ ?>