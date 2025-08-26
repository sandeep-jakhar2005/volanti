<?php echo $__env->make('paymentprofile::admin.links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        /* Reset some default styles to ensure consistency */
        body,
        table,
        td,
        p {
            margin: 0;
            padding: 0;
            font-family: arial;
            color: #444444;
        }

        /* Set the background color for the entire email */
        body {
            background-color: #fff;
        }

        /* Add some spacing around the content */
        table.wrapper {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 0;
            background-color: #ffffff;
        }

        /* Style the header section */
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }

        /* Style the receipt details section */
        .receipt-details {
            padding: 20px;
        }

        /* Style the table */
        table.receipt-table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Style the table headers */
        table.receipt-table th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: left;
        }

        /* Style the table rows */
        table.receipt-table td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        /* Style the total amount */
        .total-amount {
            text-align: right;
            font-weight: bold;
        }

        /* Add some spacing for better readability */
        p {
            margin-bottom: 10px;
        }

        /* @media only screen and (max-width: 520px) {
                    table tr {
                        display: flex !important;
                        flex-wrap: wrap;
                        gap: 10px;
                    }
                } */

        @media only screen and (max-width: 768px) {
            table.wrapper {
                max-width: 100% !important;
            }

            table.receipt-table th,
            table.receipt-table td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            table.wrapper img {
                width: 100%;
                max-width: 100%;
                height: auto;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<table class="wrapper">
    
    
    <tr
        style="
          background: #f6f6f6;
          margin-top: 20px;
          border-top: 1px dashed black;
          padding: 20px;
          display: flex;
          justify-content: space-between;
        ">
        <td style="width: 50%; text-align: left">
            <h1
                style="
              padding-bottom: 15px;
              color: #000000;
              font-size: 24px;
              font-weight: bold;
              margin-top: 0;
            ">
                Thank you for your order!
            </h1>
            <p style="padding-bottom: 0px">
                Order No: <strong><?php echo e($order->increment_id); ?></strong>
            </p>

            <a href="<?php echo e(route('order-invoice-view', ['orderid' => $order->id, 'customerid' => $order->customer_id])); ?>"
                style="
              background: #444444;
              text-decoration: none;
              border-radius: 5px;
              float: left;
              border: none;
              color: #fff;
              font-weight: 600;
              padding: 9px 15px;
            ">Place
                Order</a>
        </td>
        <td style="width: 50%; text-align: right">
            <p>
                Need Help? <br />
                Call us <a href="tel:1-866-864-8488">(1-866-864-8488)</a> or
                <a href="#" style="color: #007bff; font-weight: 600">Email us
                </a>
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width: 100%">
            <div
                style="
              border-top: 1px dotted black;
              border-bottom: 1px dotted black;
              padding: 0;
              text-align: center;
            ">
                <h3 style="padding: 15px 0px;font-weight: bold;margin: 0px;font-size: 20px;">
                    Order Details
                </h3>
            </div>
        </td>
    </tr>
    <tr
        style="
          background: #f6f6f6;
          padding: 20px;
          display: block;
          vertical-align: text-top;
        ">
        <td>
            <table>
                <tr>
                    <td colspan="3">Order No: <?php echo e($order->increment_id); ?></td>
                </tr>
                <tr>
                    <td colspan="3">Order Date & Time : <?php echo e($order->created_at); ?></td>
                </tr>
                <tr style="padding-top: 30px; display: flex; gap: 20px">
                    <td>
                        <div class="order-details">
                            <p>
                                <b>Fbo Detail</b>
                            </p>
                            
                            <p style="margin-bottom: 0px">
                                <?php echo e($order->fbo_full_name); ?>

                                <span style="float: left; width: 100%">
                                    <?php echo e($order->fbo_email_address); ?>

                                </span>
                                <span style="float: left; width: 100%">
                                    <?php echo e($order->fbo_phone_number); ?>

                                </span>
                            </p>
                        </div>
                    </td>
                    <td style="padding-left: 20px">
                        <div class="order-details">
                            <p>
                                <b>Address</b>
                            </p>
                            
                            <?php if(isset($order->billing_address)): ?>
                                <p style="margin-bottom: 0px">
                                    <span style="float: left; width: 100%">
                                        <?php echo e($order->billing_address->airport_name); ?>

                                    </span>
                                    <span style="float: left; width: 100%">
                                        <?php echo e($order->billing_address->address1); ?>

                                    </span>
                                </p>
                            <?php endif; ?>

                        </div>
                    </td>
                    <td style="padding-left: 20px">
                        <div class="order-details">
                            <p><b>Payment : AuthorizeNet</b></p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%">
                <tr>
                    <td>
                        <div
                            style="
                    background: #f6f6f6;
                    width: 100%;
                    float: left;
                    padding: 20px 0 20px 0;
                    display: block;
                    vertical-align: text-top;
                    border-top: 1px dotted black;
                    border-bottom: 1px dotted black;
                    margin-top: 20px;">
                            <div class="table-responsive">
                                <table style="width: -webkit-fill-available ;">
                                    <tbody>
                                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $optionLabel = null;
                                                $specialInstruction = null;
                                                $notes = null;
                                                if (isset($item->additional['attributes'])) {
                                                    $attributes = $item->additional['attributes'];

                                                    foreach ($attributes as $attribute) {
                                                        if (
                                                            isset($attribute['option_label']) &&
                                                            $attribute['option_label'] != ''
                                                        ) {
                                                            $optionLabel = $attribute['option_label'];
                                                        }
                                                    }
                                                }

                                                if (isset($item->additional['special_instruction'])) {
                                                    $specialInstruction = $item->additional['special_instruction'];
                                                }
                                            ?>
                                            <tr class="order_view_table_body" style="height: 110px;">
                                                <td
                                                    style="
                                                max-width: 130px;">
                                                    <div>
                                                        <img class="product__img"
                                                            src="https://s22908.pcdn.co/wp-content/uploads/2022/11/why-data-privacy-is-important.jpg"
                                                            alt="Product" style="height: 70px;width: 80px;" />
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <?php echo e($item->name); ?>

                                                    <?php if($optionLabel): ?>
                                                        (<?php echo e($optionLabel); ?>)
                                                    <?php endif; ?>
                                                </td>

                                                <?php if($order->status === 'pending'): ?>
                                                    <td>NA</td>
                                                <?php else: ?>
                                                    <td><?php echo e(core()->formatBasePrice($order->base_price)); ?></td>
                                                <?php endif; ?>

                                                <td>
                                                    <span class="qty-row">
                                                        Qty:
                                                        <?php echo e($item->qty_ordered); ?>

                                                    </span>

                                                </td>
                                                <?php if($order->status === 'pending'): ?>
                                                    <td>NA</td>
                                                <?php else: ?>
                                                    <td><?php echo e(core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount)); ?>

                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr
        style="
        background: #fff;
        margin-top: 20px;
        padding: 15px 0 40px 0;
        display: block;
        ">
        <td>
            <table>
                <tr
                    style="
                vertical-align: text-top;
                display: flex;
                justify-content: space-between;
                vertical-align: text-top;">
                    <td width="50%">
                        <div>
                            <b class="text-break">ORDER NOTES1: </b>
                            
                            <p>
                                Our products are made to order and are expertly handcrafted
                                in solid wood. Your satisfaction is our goal and we assure
                                you that, just like hundreds of our customers, you will find
                                the wait to be well worth it!
                            </p>
                            <p>
                                <b>
                                    Regards, <br />
                                    VolantiJetCatering
                                </b>
                            </p>
                        </div>
                    </td>
                    <td width="50%">
                        <p style="margin-bottom: 10px; text-align: right">
                            SubTotal :
                            
                            <strong><?php echo e($order->grand_total); ?></strong>
                            
                        </p>
                        

                        <p style="margin-bottom: 10px; text-align: right">
                            Tax :
                            
                            <?php if(isset($item->base_tax_amount)): ?>
                                <strong><?php echo e(core()->formatBasePrice($item->base_tax_amount)); ?></strong>
                            <?php endif; ?>

                            
                        </p>

                        <p style="margin-bottom: 10px; text-align: right">
                            Order Total :
                            
                            <strong><?php echo e($order->grand_total); ?></strong>
                            
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/ACME/paymentProfile/src/Resources/views/admin/sales/invoices/mail/create.blade.php ENDPATH**/ ?>