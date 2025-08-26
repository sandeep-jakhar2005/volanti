<?php $wishListHelper = app('Webkul\Customer\Helpers\Wishlist'); ?>

<?php echo view_render_event('bagisto.shop.products.wishlist.before'); ?>


    <?php if(auth()->guard('customer')->check()): ?>
        <?php
            /* search wishlist on the basis of product's id so that wishlist id can be catched */
            $wishlist = $wishListHelper->getWishlistProduct($product);

            /* link making */
            $href = isset($route) ? $route : ($wishlist ? route('shop.customer.wishlist.remove', $wishlist->id) : route('shop.customer.wishlist.add', $product->id));

            /* method */
            $method = isset($route) ? 'POST' : ( $wishlist ? 'DELETE' : 'POST' );

            /* is confirmation needed */
            $isConfirm = isset($route) ? 'true' : 'false';

            /* title */
            $title = $wishlist ? __('velocity::app.shop.wishlist.remove-wishlist-text') : __('velocity::app.shop.wishlist.add-wishlist-text');     
        ?>
        
        <a
            class="unset wishlist-icon wishlist<?php echo e($addWishlistClass ?? ''); ?> text-right"
            href="javascript:void(0);"
            title="<?php echo e($title); ?>"
            onclick="submitWishlistForm(
                '<?php echo e($href); ?>',
                '<?php echo e($method); ?>',
                <?php echo e($isConfirm); ?>,
                '<?php echo e(csrf_token()); ?>'
            )"
            >

            <?php if(request()->routeIs('shop.customer.wishlist.index')): ?>
                <wishlist-component add-class="rango-delete fs24"></wishlist-component>
            <?php else: ?>
                <wishlist-component active="<?php echo e($wishlist ? false : true); ?>"></wishlist-component>
            <?php endif; ?>
            
            
            <?php if(isset($text)): ?>
                <?php echo $text; ?>

            <?php elseif($showText ?? false): ?>
                <span><?php echo e(__('admin::app.admin.system.wishlist')); ?></span>
            <?php endif; ?>
        </a>        
    <?php endif; ?>

    <?php if(auth()->guard('customer')->guest()): ?>
        <form           
            id="wishlist-<?php echo e($product->id); ?>"
            action="<?php echo e(route('shop.customer.wishlist.add', $product->id)); ?>"
            method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <a
                    class="unset wishlist-icon wishlist <?php echo e($addWishlistClass ?? ''); ?> text-right"
                    href="javascript:void(0);"
                    title="<?php echo e(__('velocity::app.shop.wishlist.add-wishlist-text')); ?>"
                    onclick="document.getElementById('wishlist-<?php echo e($product->id); ?>').submit();"
                >
                    <wishlist-component active="false"></wishlist-component>

                    <?php if(isset($text)): ?>
                        <?php echo $text; ?>

                    <?php elseif($showText ?? false): ?>
                        <span><?php echo e(__('admin::app.admin.system.wishlist')); ?></span>
                    <?php endif; ?>
                </a>
            </div>
        </form>
    <?php endif; ?>

<?php echo view_render_event('bagisto.shop.products.wishlist.after'); ?>

<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/products/wishlist.blade.php ENDPATH**/ ?>