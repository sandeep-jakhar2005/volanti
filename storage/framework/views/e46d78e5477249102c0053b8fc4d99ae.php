<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.search.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <?php if(request('image-search')): ?>
        <image-search-result-component></image-search-result-component>
    <?php endif; ?>

    <?php if(! $results): ?>
        <?php echo e(__('shop::app.search.no-results')); ?>

    <?php endif; ?>

    <?php if($results): ?>
        <div class="main mb-30" style="min-height: 27vh;">
            <?php if($results->isEmpty()): ?>
                <div class="search-result-status">
                    <h2><?php echo e(__('shop::app.products.whoops')); ?></h2>
                    <span><?php echo e(__('shop::app.search.no-results')); ?></span>
                </div>
            <?php else: ?>
                <div class="search-result-status mb-20">
                    <span>
                        <b><?php echo e($results->total()); ?> </b>

                        <?php echo e(($results->total() == 1) ? __('shop::app.search.found-result') : __('shop::app.search.found-results')); ?>

                    </span>
                </div>

                <div class="product-grid-4">
                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFlat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php echo $__env->make('shop::products.list.card', ['product' => $productFlat->product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php echo $__env->make('ui::datagrid.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script type="text/x-template" id="image-search-result-component-template">
        <div class="image-search-result">
            <div class="searched-image">
                <img :src="searched_image_url" alt=""/>
            </div>

            <div class="searched-terms">
                <h3><?php echo e(__('shop::app.search.analysed-keywords')); ?></h3>

                <div class="term-list">
                    <a v-for="term in searched_terms" :href="'<?php echo e(route('shop.search.index')); ?>?term=' + term">
                        {{ term }}
                    </a>
                </div>
            </div>
        </div>
    </script>

    <script>
        Vue.component('image-search-result-component', {

            template: '#image-search-result-component-template',

            data: function() {
                return {
                    searched_image_url: localStorage.searched_image_url,

                    searched_terms: []
                }
            },

            created: function() {
                if (localStorage.searched_terms && localStorage.searched_terms != '') {
                    this.searched_terms = localStorage.searched_terms.split('_');
                }
            }
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/search/search.blade.php ENDPATH**/ ?>