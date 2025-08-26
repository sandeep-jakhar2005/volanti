<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>

<?php echo view_render_event('bagisto.shop.products.list.toolbar.before'); ?>

    <toolbar-component></toolbar-component>
<?php echo view_render_event('bagisto.shop.products.list.toolbar.after'); ?>


<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="toolbar-template">
        <div class="toolbar-wrapper" v-if='currentScreen > 992'>
            <div class="view-mode">
                <?php
                  $viewOption = $toolbarHelper->getViewOption();
                ?>

                <div class="rango-view-grid-container <?php echo e($viewOption === 'grid' ? 'active' : ''); ?>">
                    <a href="<?php echo e($toolbarHelper->getModeUrl('grid')); ?>" class="grid-view unset" aria-label="Grid">
                        <span class="rango-view-grid fs24"></span>
                    </a>
                </div>
                <div class="rango-view-list-container <?php echo e($viewOption === 'list' ? 'active' : ''); ?>" aria-label="List">
                    <a
                        href="<?php echo e($toolbarHelper->getModeUrl('list')); ?>"
                        class="list-view unset">
                        <span class="rango-view-list fs24"></span>
                    </a>
                </div>
            </div>

            <div class="sorter">
                <label><?php echo e(__('shop::app.products.sort-by')); ?></label>

                <select class="selective-div border-normal styled-select" onchange="window.location.href = this.value" aria-label="Sort By">
                    <?php $__currentLoopData = $toolbarHelper->getAvailableOrders(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($toolbarHelper->getOrderUrl($key)); ?>" <?php echo e($toolbarHelper->isOrderCurrent($key) ? 'selected' : ''); ?>>
                            <?php echo e(__('shop::app.products.' . $order)); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <div class="select-icon-container">
                    <span class="select-icon rango-arrow-down"></span>
                </div>
            </div>

            <div class="limiter">
                <label><?php echo e(__('shop::app.products.show')); ?></label>

                <select class="selective-div border-normal styled-select" onchange="window.location.href = this.value" style="width: 57px;" aria-label="Show">

                    <?php $__currentLoopData = $toolbarHelper->getAvailableLimits(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $limit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($toolbarHelper->getLimitUrl($limit)); ?>" <?php echo e($toolbarHelper->isLimitCurrent($limit) ? 'selected' : ''); ?>>
                            <?php echo e($limit); ?>

                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

                <div class="select-icon-container">
                    <span class="select-icon rango-arrow-down"></span>
                </div>
            </div>
        </div>

        <div class="toolbar-wrapper row col-12 remove-padding-margin" v-else>
            <div
                v-if="layeredNavigation"
                class="nav-container scrollable"
                style="
                    z-index: 1000;
                    color: black;
                    position: relative;
                ">
                <div class="header drawer-section">
                    <i class="material-icons" @click="toggleLayeredNavigation">keyboard_backspace</i>

                    <span class="fs24 fw6">
                        <?php echo e(__('velocity::app.shop.general.filter')); ?>

                    </span>
                    <span class="float-right link-color" @click="toggleLayeredNavigation">
                        <?php echo e(__('velocity::app.responsive.header.done')); ?>

                    </span>
                </div>

                <?php if(request()->route()->getName() != 'velocity.search.index'): ?>
                    <?php echo $__env->make('shop::products.list.layered-navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>

            <div class="col-2 col-filter" @click="toggleLayeredNavigation({event: $event, actionType: 'open'})">
                <a class="unset">
                    <i class="material-icons">filter_list</i>
                    <span><?php echo e(__('velocity::app.shop.general.filter')); ?></span>
                </a>
            </div>

            <div class="col-5 col-order">
                <div class="sorter" id="sort-by">

                    <select class="selective-div border-normal styled-select" onchange="window.location.href = this.value">
                        <?php $__currentLoopData = $toolbarHelper->getAvailableOrders(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($toolbarHelper->getOrderUrl($key)); ?>" <?php echo e($toolbarHelper->isOrderCurrent($key) ? 'selected' : ''); ?>>
                                <?php echo e(__('shop::app.products.' . $order)); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <div class="select-icon-container">
                        <span class="select-icon rango-arrow-down"></span>
                    </div>
                </div>
            </div>

            <div class="col-3 col-count">
                <div class="limiter" id="limit-by">

                    <select class="selective-div border-normal styled-select" onchange="window.location.href = this.value" style="width: 57px;" aria-label="Show">

                        <?php $__currentLoopData = $toolbarHelper->getAvailableLimits(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $limit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($toolbarHelper->getLimitUrl($limit)); ?>" <?php echo e($toolbarHelper->isLimitCurrent($limit) ? 'selected' : ''); ?>>
                                <?php echo e($limit); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    <div class="select-icon-container">
                        <span class="select-icon rango-arrow-down"></span>
                    </div>
                </div>
            </div>

            <div class="col-2 col-view">
                <?php
                    $isList = $toolbarHelper->isModeActive('list');
                ?>

                <a
                    class="unset"
                    href="<?php echo e($isList
                        ? $toolbarHelper->getModeUrl('grid')
                        : $toolbarHelper->getModeUrl('list')); ?>">

                    <i class="material-icons">
                        <?php if($isList): ?> list <?php else: ?> view_module <?php endif; ?>
                    </i>
                    <span><?php echo e(__('velocity::app.shop.general.view')); ?></span>
                </a>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        (() => {
            Vue.component('toolbar-component', {
                template: '#toolbar-template',
                data() {
                    return {
                        layeredNavigation: false,
                        currentScreen : window.innerWidth,
                    }
                },

                created() {
                    window.addEventListener('resize', this.handleResize);
                },

                destroyed() {
                    window.removeEventListener('resize', this.handleResize);
                },

                watch: {
                    layeredNavigation(value) {
                        if (value) {
                            document.body.classList.add('open-hamburger');
                        } else {
                            document.body.classList.remove('open-hamburger');
                        }
                    }
                },

                methods: {
                    toggleLayeredNavigation({event, actionType}) {
                        this.layeredNavigation = !this.layeredNavigation;
                    },

                    handleResize() {
                        this.currentScreen = window.innerWidth;
                    }
                }
            })
        })()
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/list/toolbar.blade.php ENDPATH**/ ?>