<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('mpauthorizenet::app.customer.account.savecard.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

<?php 
if (core()->getConfigData('sales.paymentmethods.mpauthorizenet.debug') == '1') {
    $merchantLoginId = core()->getConfigData('sales.paymentmethods.mpauthorizenet.test_api_login_ID');
    $merchantAuthentication = core()->getConfigData('sales.paymentmethods.mpauthorizenet.test_transaction_key');
} else {
    $merchantLoginId = core()->getConfigData('sales.paymentmethods.mpauthorizenet.api_login_ID');
    $merchantAuthentication = core()->getConfigData('sales.paymentmethods.mpauthorizenet.transaction_key');
}
?>

<div class="account-content">   
    <?php if(core()->getConfigData('sales.paymentmethods.mpauthorizenet.debug') == '1'): ?>
    <script type="text/javascript" src="<?php echo e(asset('vendor/webkul/mpauthorizenet/assets/js/AcceptUITest.js')); ?>" charset="utf-8"></script>
    <?php else: ?>
    <script type="text/javascript" src="<?php echo e(asset('vendor/webkul/mpauthorizenet/assets/js/AcceptUI.js')); ?>" charset="utf-8"></script>
    <?php endif; ?>

    <?php echo $__env->make('shop::customers.account.partials.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form id="paymentForm" method="POST" action="">
        <input type="hidden" name="dataValue" id="dataValue" />
        <input type="hidden" name="dataDescriptor" id="dataDescriptor" />
        <button type="button" id="authorizePay" style="display:none"
            class="AcceptUI"
            data-billingAddressOptions='{"show":true, "required":false}' 
            data-apiLoginID="<?php echo e($merchantLoginId); ?>" 
            data-clientKey="<?php echo e(core()->getConfigData('sales.paymentmethods.mpauthorizenet.client_key')); ?>"
            data-acceptUIFormBtnTxt="Submit" 
            data-acceptUIFormHeaderTxt="Card Information" 
            data-responseHandler="responseHandler">Pay
        </button>
    </form>

    <div class="account-layout">

        <div class="account-head">
            <span class="back-icon"><a href="<?php echo e(route('customer.account.index')); ?>"><i class="icon icon-menu-back"></i></a></span>
            <span class="account-heading"><?php echo e(__('mpauthorizenet::app.customer.account.savecard.index.title')); ?></span>

            <span class="account-action">
                <a id="add-new-card" style="cursor: pointer;"><?php echo e(__('mpauthorizenet::app.customer.account.savecard.index.add')); ?></a>    
            </span>
        
            <div class="horizontal-rule"></div>
        </div>

        <div class="account-items-list">
            <div class="table" style="margin-top:10px;">
                    <table >
                        <thead style="text-align: center;">
                            <tr>
                                <th><?php echo e(__('mpauthorizenet::app.customer.account.savecard.index.isdefault')); ?></th>
    
                                <th><?php echo e(__('mpauthorizenet::app.customer.account.savecard.index.id')); ?></th>
            
                                <th><?php echo e(__('mpauthorizenet::app.customer.account.savecard.index.card-number')); ?></th>
            
                                <th><?php echo e(__('mpauthorizenet::app.customer.account.savecard.index.action')); ?></th>
            
                            </tr>
                        </thead>
            
                        <tbody style="text-align:center;" class="list-order">
                            <tr></tr>
                            <?php $__currentLoopData = $cardDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$cardDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="row<?php echo e($cardDetails->id); ?>">
                                <td>
                                    <span class="radio" style="margin-top: 0px !important;">
                                        <input type="radio" class="isdefault" id="<?php echo e($cardDetails->id); ?>" name="radio" <?php if($cardDetails->is_default == '1'): ?> checked="checked" <?php endif; ?>>
                                        <label class="radio-view" for="<?php echo e($cardDetails->id); ?>"></label>
                                    </span>
                                </td>
                                <td><?php echo e($cardDetails->id); ?></td>
                                <td><?php echo e($cardDetails->last_four); ?></td>
                                <td><span class="icon trash-icon delete" id="<?php echo e($cardDetails->id); ?>" style="cursor:pointer;"></span></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
              </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).on("click","#add-new-card",function() {
        $("#authorizePay").trigger('click');
    });

    $(document).on("click",".isdefault",function(){
        id = this.id;
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('mpauthorizenet.account.make.card.default')); ?>",
            data: {id:this.id},
            success: function( response ) {
                if (response.success == 'true') {
                    console.log('updated');
                } else {
                    console.log('not updated !');
                }
            }
        });
    });

    $(document).on("click",'.delete',function(){
        var result = confirm("Are you sure want to delete this card ?");
        if (result) {
            var row = "#"+'row'+this.id;
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('mpauthorizenet.delete.saved.cart')); ?>", 
                data: {id:this.id},
                success: function( response ) {
                    if (response == '1') {
                        $(row).css('display', 'none');
                    }
                }
            });
        }
    });

    function responseHandler(response) {
        if (response.messages.resultCode === "Error") {
            var i = 0;
            while (i < response.messages.message.length) {
                alert(response.messages.message[i].text);
                console.log(
                    response.messages.message[i].code + ": " +
                    response.messages.message[i].text
                );
                i = i + 1;
            }
        } else {
            paymentFormUpdate(response);
        }
    }

    function paymentFormUpdate(response) {
        
        document.getElementById("dataDescriptor").value = response.opaqueData.dataDescriptor;
        document.getElementById("dataValue").value = response.opaqueData.dataValue;

        _token = "<?php echo e(csrf_token()); ?>";

        $.ajax({
            type: "POST",
            url: "<?php echo e(route('mpauthorizenet.account.store.card')); ?>",
            data: {_token:_token,response:response},
            success: function( response ) {
                if (response.cardExist != 'true') { 
                    var $tr = $('<tr id="row'+response.id+'">');
                    $tr.append($('<td/>').html('<span class="radio"><input type="radio" id="'+response.id+'" name="radio" class="isdefault"><label class="radio-view" for="'+response.id+'"></label> </span>'));
                    $tr.append($('<td/>').html(response.id));
                    $tr.append($('<td/>').html(response.last_four));
                    $tr.append($('<td/>').html('<span class="delete icon trash-icon" id='+response.id+' style="cursor:pointer;"></span>'));
                    $('.list-order tr:first').before($tr);
                } else {
                    alert('Card already exist !');
                }
            }
        });
    }

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/MpAuthorizeNet/src/Resources/views/shop/default/customer/account/savecard/savecard.blade.php ENDPATH**/ ?>