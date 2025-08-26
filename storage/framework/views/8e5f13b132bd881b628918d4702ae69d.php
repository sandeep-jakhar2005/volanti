<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('contact_lang::app.contact.view_title')); ?>

<?php $__env->stopSection(); ?>

<style>
    table{
        margin-top: 20px;
        width:100%;
        border-collapse:collapse;
        border:1px solid #00F;
        font-size:13px;
    }

    table tr{
        padding: 10px;
    }

    table tr th{
        padding: 10px;
        border: 1px solid #e9e9e9;
        font-size: 16px;
        font-weight: bold;
    }

    table tr td{
        padding: 10px;
        border: 1px solid #e9e9e9;
    }

    .message{
        background: #e9e9e9;
        padding: 15px;
        border: 1px solid #ccc;
        margin-top: 20px;
        font-size: 16px;
    }
</style>

<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-header" style="border-bottom: 1px solid #e9e9e9">
            <div class="page-title">
                <h1><?php echo e(__('contact_lang::app.contact.view_title')); ?> of "<?php echo e($contact->name); ?>"</h1>

                <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

            </div>
        </div>

        <div class="page-content">

            <div>
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?php echo e($contact->name); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo e($contact->email); ?></td>
                    </tr>
                </table>
            </div>

            <div class="message">
                <?php echo e($contact->message_body); ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/RKREZA/Contact/src/Providers/../Resources/views/contact/view.blade.php ENDPATH**/ ?>