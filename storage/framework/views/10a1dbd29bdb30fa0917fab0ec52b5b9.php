<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.address.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('account-content'); ?>
    <div class="account-layout">
        <div class="account-head">
            <span class="back-icon">
                <a href="<?php echo e(route('shop.customer.profile.index')); ?>">
                    <i class="icon icon-menu-back"></i>
                </a>
            </span>

            <span class="account-heading"><?php echo e(__('shop::app.customer.account.address.index.title')); ?></span>

            <?php if(! $addresses->isEmpty()): ?>
                <span class="account-action">
                    <a href="<?php echo e(route('shop.customer.addresses.create')); ?>"><?php echo e(__('shop::app.customer.account.address.index.add')); ?></a>
                </span>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <div class="horizontal-rule"></div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.address.list.before', ['addresses' => $addresses]); ?>


        <div class="account-table-content">
            <?php if($addresses->isEmpty()): ?>
                <div><?php echo e(__('shop::app.customer.account.address.index.empty')); ?></div>

                <br/>

                <a href="<?php echo e(route('shop.customer.addresses.create')); ?>"><?php echo e(__('shop::app.customer.account.address.index.add')); ?></a>
            <?php else: ?>
                <div class="address-holder">
                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="address-card">
                            <div class="details">
                                <span class="bold"><?php echo e(auth()->guard('customer')->user()->name); ?></span>

                                <ul class="address-card-list">
                                    <li class="mt-5">
                                        <?php echo e($address->company_name); ?>

                                    </li>

                                    <li class="mt-5">
                                        <?php echo e($address->first_name); ?>

                                    </li>

                                    <li class="mt-5">
                                        <?php echo e($address->last_name); ?>

                                    </li>

                                    <li class="mt-5">
                                        <?php echo e($address->address1); ?>

                                    </li>

                                    <li class="mt-5">
                                        <?php echo e($address->city); ?>

                                    </li>

                                    <li class="mt-5">
                                        <?php echo e($address->state); ?>

                                    </li>

                                    <li class="mt-5">
                                        <?php echo e(core()->country_name($address->country)); ?> <?php echo e($address->postcode); ?>

                                    </li>

                                    <li class="mt-10">
                                        <?php echo e(__('shop::app.customer.account.address.index.contact')); ?>

                                        : <?php echo e($address->phone); ?>

                                    </li>
                                </ul>

                                <div class="control-links mt-20">
                                    <span>
                                        <a href="<?php echo e(route('shop.customer.addresses.edit', $address->id)); ?>">
                                            <?php echo e(__('shop::app.customer.account.address.index.edit')); ?>

                                        </a>
                                    </span>

                                    <span>
                                        <a href="javascript:void(0);" onclick="deleteAddress('<?php echo e(__('shop::app.customer.account.address.index.confirm-delete')); ?>', '<?php echo e($address->id); ?>')">
                                            <?php echo e(__('shop::app.customer.account.address.index.delete')); ?>

                                        </a>

                                        <form id="deleteAddressForm<?php echo e($address->id); ?>" action="<?php echo e(route('shop.customer.addresses.delete', $address->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>

                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function deleteAddress(message, addressId) {
            if (! confirm(message)) {
                return;
            }

            $(`#deleteAddressForm${addressId}`).submit();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Resources/views/customers/account/address/index.blade.php ENDPATH**/ ?>