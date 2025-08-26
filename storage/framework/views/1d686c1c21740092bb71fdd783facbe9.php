<?php
    use Carbon\Carbon;
?>

<html>

<head>
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                background-color: #ffffff;
            }
        }
        /** Define the margins of your page **/
        /** Define the margins of your page **/
        /* @page {
            margin: 150px 40px;
        } */



        .w-100 {
            width: 100%;
        }


        /* Added CSS for the table layout */
        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        header h2 {
            color: #aa1d25;
        }

        .header-table td {
            border: 1px solid white;
            padding: 5px;


        }
        .info-2 {
            background-color: #f6f6f7;
        }
  

        header img {
            max-width: 100px;
        }

        header hr {
            border: 1px solid #aa1d25;
            width: 60%;
            margin-right: 0;
        }

        footer {
            position: fixed;
            bottom: -130px;
            left: 0px;
            right: 0px;
            margin: 0;
            /** Extra personal styles **/

            color: black;
            text-align: center;
            line-height: 35px;
            border-top: 2px solid #a7a7a7;
            padding-top: 20px;
        }

        footer p {
            text-align: center;
            margin: 0;
            font-size: 13px;
            line-height: 18px;
            font-family: sans-serif;
        }

        .left p,
        .left {
            text-align: left !important;
        }

        p,
        td,
        h1,
        h2,
        h3,
        th {
            font-family: sans-serif;
        }

        main p {
            font-family: sans-serif;
        }

        .left div {
            margin-top: 10px;
        }

        .center p {
            text-align: center;
        }

        .red-heading {
            color: #aa1d25;
            font-weight: 700;

        }

        .intro {
            margin: auto;
        }

        .intro td {
            width: 25%;
            max-width: 400px;
            padding: 0 10px;
            vertical-align: top;
        }

        .intro p {
            font-size: 17px;
            font-weight: 700;
            font-family: sans-serif;
        }


        .info-2 td {
            border: none;
            padding: 10px;
        }

        .info-2 p {
            text-align: center;
        }

        .item {
            width: 100%;
        }

        .item td {
            text-align: center;
        }

        .item th {
            padding: 10px 10px;
        }

        .item td {
            padding: 5px;
        }

        .item-category {
            background-color: #f0f0f0;
            width: 100%;
        }

        .item-category td {
            text-align: left;
        }

        .cost td {
            padding: 5px;
        }
        .gray-background{
            background-color:#e0e0e0;
            border:2px solid #6f6f6f;
        }

        .cost td {
            font-weight: 700;
        }

        .agent {
            width: 100%;
            margin-top: 10px;
        }

        .agent th,
        .agent td {
            text-align: left;
            padding: 5px;
        }
        footer{
            position: relative;
            bottom: 0;
        }
    </style>
</head>

<body>
    <?php
        $date = Carbon::createFromFormat('Y-m-d', $order->delivery_date)->format('l, m/d/Y');
    ?>

    <!-- Define header and footer blocks before your content -->
    <header>
        <div class="pagenum"></div>

        <table class="header-table">
            <tr>
                <td class="left">
                    <h3>WORK TICKET</h3>
                </td>
                <td colspan="2" class="left">

                    <p><b>#<?php echo e($order->id); ?>-<?php echo e($packaging[0]->slip_sequence); ?></b></p>
                </td>
                <td colspan="2">
                    <?php echo $barcode; ?>

                    <P class="left"><?php echo e($barcode_no); ?></P>
                </td>
            </tr>

        </table>
        <table>
            <tr>
                <td class="min-width200"><b>Order</b></td>
                <td><?php echo e($order->id); ?></td>
            </tr>
        </table>
    </header>


    <!-- Wrap the content of your PDF inside a main tag -->
    <main>

        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="min-width200"><b>Location</b></td>
                        </tr>
                        <tr>
                            <td class="min-width200"><b>Date</b></td>
                        </tr>
                        <tr>
                            <td class="min-width200"><b>Time</b></td>
                        </tr>
                        <tr>
                            <td class="min-width200"><b>Tail</b></td>
                        </tr>
                        <tr>
                            <td class="min-width200"><b>Handler Agent Name</b></td>
                        </tr>
                        <tr>
                            <td class="min-width200"><b>Handler Agent Mobile No.</b></td>
                        </tr>
                        <tr>
                            <td class="min-width200"><b>Handler Agent PPR Permit</b></td>
                        </tr>

                    </table>
                </td>
                <td>
                    <table class="gray-background">

                        <tr>
                            <td><?php echo e($addresses[0]->airport_name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e($date); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e($order->delivery_time); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e($order->fbo_tail_number); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(isset($order->Name) ? $order->Name : 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(isset($order->Mobile) ? $order->Mobile : 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(isset($order->PPR_Permit) ? $order->PPR_Permit : 'N/A'); ?></td>
                        </tr>

                    </table>
                </td>
            </tr>


        </table>


        <table cellspacing="10">
            <tr>
                <th>
                    <p class="">Quantity</p>
                </th>
                <th>
                    <p class=" left">Item Description</p>
                </th>
            </tr>
            <?php $__currentLoopData = $dataArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="mb-10" colspan="2">
                    
                    <td><?php echo e($item_detail['qty']); ?></td>
                    <td>
                        <p class="m-0"><b>Item Name:</b> <?php echo e($item_detail['product_name']); ?></p>
                        <p class="m-0"><b>Item Description:</b> <?php echo e($item_detail['product_description']); ?> </p>
                        <?php if(isset($item_detail['additional'])): ?>
                            <?php
                                $dataArray = json_decode($item_detail['additional'], true);
                            ?>
                            <?php if(isset($dataArray['special_instruction'])): ?>
                                <?php
                                    $specialInstruction = $dataArray['special_instruction'];
                                ?>
                                <p class="m-0"><b>Special Instruction:</b> <?php echo e($specialInstruction); ?> </p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

    </main>

    <footer>
        <p class="left"><?php echo e(now()->format('m/d/Y g:i A')); ?></p>
    </footer>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/ACME/paymentProfile/src/Resources/views/admin/sales/orders/print/print-package-slip.blade.php ENDPATH**/ ?>