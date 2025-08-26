<?php $toolbarHelper = app('Webkul\Product\Helpers\Toolbar'); ?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.wishlist.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-detail-wrapper'); ?>
    <div class="account-head">
        <span class="account-heading"><?php echo e(__('shop::app.customer.account.wishlist.title')); ?></span>

        <?php if(count($items)): ?>
            <span class="account-action d-inline-flex">
                <form id="remove-all-wishlist" class="d-none" action="<?php echo e(route('shop.customer.wishlist.remove_all')); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>

                    <?php echo csrf_field(); ?>
                </form>

                <?php if($isSharingEnabled): ?>
                    <a
                        class="remove-decoration theme-btn light"
                        href="javascript:void(0);"
                        onclick="window.showShareWishlistModal();">
                        <?php echo e(__('shop::app.customer.account.wishlist.share')); ?>

                    </a>

                    &nbsp;
                <?php endif; ?>

                <a
                    class="remove-decoration theme-btn light"
                    href="javascript:void(0);"
                    onclick="window.deleteAllWishlist();">
                    <?php echo e(__('shop::app.customer.account.wishlist.deleteall')); ?>

                </a>
            </span>
        <?php endif; ?>
    </div>

    <?php echo view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]); ?>


    <div class="wishlist-container">
        <?php if($items->count()): ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('shop::customers.account.wishlist.wishlist-product', [
                    'item' => $item,
                    'visibility' => $isSharingEnabled
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div>
                <?php echo e($items->links()); ?>

            </div>
        <?php else: ?>
            <div class="empty">
                <?php echo e(__('customer::app.wishlist.empty')); ?>

            </div>
        <?php endif; ?>
    </div>

    <?php if($isSharingEnabled): ?>
        <div id="shareWishlistModal" class="d-none">
            <modal id="shareWishlist" :is-open="modalIds.shareWishlist">
                <h3 slot="header">
                    <?php echo e(__('shop::app.customer.account.wishlist.share-wishlist')); ?>

                </h3>

                <i class="rango-close"></i>

                <div slot="body">
                    <share-component></share-component>
                </div>
            </modal>
        </div>
    <?php endif; ?>

    <?php echo view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php if($isSharingEnabled): ?>
        <script type="text/x-template" id="share-component-template">
            <form method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="label-style mandatory">
                        <?php echo e(__('shop::app.customer.account.wishlist.wishlist-sharing')); ?>

                    </label>

                    <select name="shared" class="form-control" @change="shareWishlist($event.target.value)">
                        <option value="0" :selected="! isWishlistShared"><?php echo e(__('shop::app.customer.account.wishlist.disable')); ?></option>
                        <option value="1" :selected="isWishlistShared"><?php echo e(__('shop::app.customer.account.wishlist.enable')); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="label-style mandatory">
                        <?php echo e(__('shop::app.customer.account.wishlist.visibility')); ?>

                    </label>

                    <div>
                        <span class="badge badge-success" v-if="isWishlistShared">
                            <?php echo e(__('shop::app.customer.account.wishlist.public')); ?>

                        </span>

                        <span class="badge badge-danger" v-else>
                            <?php echo e(__('shop::app.customer.account.wishlist.private')); ?>

                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label-style mandatory">
                        <?php echo e(__('shop::app.customer.account.wishlist.shared-link')); ?>

                    </label>

                    <div class="input-group" v-if="isWishlistShared">
                        <input
                            type="text"
                            class="form-control"
                            v-model="wishlistSharedLink"
                            v-on:focus="$event.target.select()"
                            ref="sharedLink"
                        />

                        <div class="input-group-append">
                            <button
                                class="btn btn-outline-secondary theme-btn"
                                style="padding: 6px 20px"
                                id="copy-btn"
                                title="<?php echo e(__('shop::app.customer.account.wishlist.copy-link')); ?>"
                                type="button"
                                @click="copyToClipboard"
                            >
                                <?php echo e(__('shop::app.customer.account.wishlist.copy')); ?>

                            </button>
                        </div> 
                    </div>

                    <p class="alert alert-danger" v-else>
                        <?php echo e(__('shop::app.customer.account.wishlist.enable-wishlist-info')); ?>

                    </p>
                </div>
            </form>
        </script>

        <script>
            /**
             * Show share wishlist modal.
             */
            function showShareWishlistModal() {
                document.getElementById('shareWishlistModal').classList.remove('d-none');

                window.app.showModal('shareWishlist');
            }

            Vue.component('share-component', {
                template: '#share-component-template',

                inject: ['$validator'],

                data: function () {
                    return {
                        isWishlistShared: parseInt("<?php echo e($isWishlistShared); ?>"),

                        wishlistSharedLink: "<?php echo e($wishlistSharedLink); ?>".replace("&amp;", "&"),
                    }
                },

                methods: {
                    shareWishlist: function(val) {
                        var self = this;

                        this.$root.showLoader();

                        this.$http.post("<?php echo e(route('shop.customer.wishlist.share')); ?>", {
                            shared: val
                        })
                        .then(function(response) {
                            self.$root.hideLoader();

                            self.isWishlistShared = response.data.isWishlistShared;

                            self.wishlistSharedLink = response.data.wishlistSharedLink;
                        })
                        .catch(function (error) {
                            self.$root.hideLoader();

                            window.location.reload();
                        })
                    },

                    copyToClipboard: function() {
                        this.$refs.sharedLink.focus();
                        document.execCommand('copy');
                        showCopyMessage();
                    }
                }
            });
        </script>
    <?php endif; ?>

    <script>
        /**
         * Delete all wishlist.
         */
        function deleteAllWishlist() {
            if (confirm('<?php echo e(__('shop::app.customer.account.wishlist.confirm-delete-all')); ?>')) document.getElementById('remove-all-wishlist').submit();

            return;
        }

        function showCopyMessage()
        {
            $('#copy-btn').text("<?php echo e(__('shop::app.customer.account.wishlist.copied')); ?>");
            $('#copy-btn').css({backgroundColor: '#146e24'});
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/customers/account/wishlist/wishlist.blade.php ENDPATH**/ ?>