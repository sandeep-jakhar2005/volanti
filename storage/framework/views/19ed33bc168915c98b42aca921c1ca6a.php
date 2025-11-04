<?php $__env->startComponent('shop::emails.layouts.master'); ?>
    <div>
        <div style="text-align: center;">
   <a href="<?php echo e(route('shop.home.index')); ?>">
                
                <img style="width: 100%;
                max-width: 300px;
                display: block;
                margin: 0 auto;"
                    src="https://images.squarespace-cdn.com/content/v1/6171dbc44e102724f1ce58cf/eda39336-24c7-499b-9336-c9cee87db776/VolantiStickers-11.jpg?format=1500w"
                    alt="Volantijet Catering" />
            </a>
        </div>

        <div style="padding: 30px;">
            <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
                <p style="font-weight: bold;font-size: 20px;color: #242424;line-height: 24px;">
                    <?php echo e(__('shop::app.mail.customer.registration.dear', ['customer_name' => $data['fullname']])); ?>,
                </p>

                <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                    <?php echo __('shop::app.mail.customer.registration.greeting'); ?>

                </p>
            </div>

            <div style="font-size: 16px;color: #5E5E5E;line-height: 30px;margin-bottom: 20px !important;">
                <?php echo e(__('shop::app.mail.customer.registration.summary')); ?>

            </div>

            <p style="text-align: center;padding: 20px 0;">
                <a href="<?php echo e(route('shop.customer.session.index')); ?>" style="padding: 10px 20px;background: #0041FF;color: #ffffff;text-transform: uppercase;text-decoration: none; font-size: 16px">
                    <?php echo e(__('shop::app.header.sign-in')); ?>

                </a>
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo __('shop::app.mail.order.help', [
                        'support_email' => '<a style="color:#0041FF" href="mailto:' . core()->getSenderEmailDetails()['email'] . '">' . core()->getSenderEmailDetails()['email']. '</a>'
                        ]); ?>

            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.customer.registration.thanks')); ?>

            </p>
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Shop/src/Providers/../Resources/views/emails/customer/registration.blade.php ENDPATH**/ ?>