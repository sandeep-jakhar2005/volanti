
<?php $__env->startSection('content-wrapper'); ?>
<?php if ($__env->exists('mpauthorizenet::shop.checkout.card-script')) echo $__env->make('mpauthorizenet::shop.checkout.card-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container my-5 order_invoice_view">
        <div class="invoice_view_header d-flex justify-content-between">
            <h2>Custom Order Payment</h2>
        
            
        </div>

        <section class="customer_detail">
            <h5 class="bg-dark p-2 text-light">Customer</h5>
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-5 fbo__detail">
                    

                    <h4><?php echo e(__('shop::app.fbo-detail.client-info')); ?></h4>
                    <p class="m-0"><?php echo e($order->fbo_full_name); ?></p>
                    <p class="m-0"><?php echo e($order->fbo_email_address); ?></p>
                    <p class="mb-3"><?php echo e($order->fbo_phone_number); ?></p>
                    <h4><?php echo e(__('shop::app.fbo-detail.aircraft-info')); ?></h4>
                    <p class="m-0"><?php echo e($order->fbo_tail_number); ?></p>
                    <p class="m-0">Packaging: <?php echo e($order->fbo_packaging); ?></p>
                    <p>Service Packaging: <?php echo e($order->fbo_service_packaging); ?></p>
                    <?php if(isset($order->delivery_date) && $order->delivery_date != ''): ?>
                        <?php
                            $date = $order->delivery_date;

                            // Create a DateTime object from the date string
                            $dateObj = new DateTime($date);

                            // Get today's date
                            $today = new DateTime('today');

                            // Get tomorrow's date
                            $tomorrow = new DateTime('tomorrow');

                            // Compare the delivery date with today's date and tomorrow's date
                            if ($dateObj->format('Y-m-d') == $today->format('Y-m-d')) {
                                // If delivery date is today, show today's date in the desired format
    $formattedDate = 'Today'; // Example format: "Thursday 3/26"
} elseif ($dateObj->format('Y-m-d') == $tomorrow->format('Y-m-d')) {
    // If delivery date is tomorrow, show tomorrow's date in the desired format
                                $formattedDate = 'Tomorrow'; // Example format: "Friday 3/27"
                            } else {
                                // If not today or tomorrow, show the delivery date in the original format
                                // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                                $dayOfWeek = $dateObj->format('w');

                                // Array of days of the week
                                $daysOfWeek = [
                                    'Sunday',
                                    'Monday',
                                    'Tuesday',
                                    'Wednesday',
                                    'Thursday',
                                    'Friday',
                                    'Saturday',
                                ];

                                // Get the day of the week name
                                $dayName = $daysOfWeek[$dayOfWeek];

                                // Get the month
                                $month = $dateObj->format('n');

                                // Get the day of the month
                                $dayOfMonth = $dateObj->format('j');

                                // Format the date string
                                $formattedDate = $dayName . ' ' . $month . '/' . $dayOfMonth;
                            }
                        ?>
                        <p>Delivery Date: <?php echo e($formattedDate); ?></p>
                    <?php endif; ?>
                    <?php if(isset($order->delivery_time) && $order->delivery_time != ''): ?>
                        <p class="mb-3">Delivery Time: <?php echo e($order->delivery_time); ?></p>
                    <?php endif; ?>
                </div>

                <div class="col-sm-12 col-md-8 col-lg-5 airport_address">
                    <h4 class="">Address</h4>

                    <strong><?php echo e($order->shipping_address->airport_name); ?></strong>
                    <p> <?php echo e($order->shipping_address->address1); ?> </p>
                </div>
            </div>
        </section>

        <section class="shopping_cart my-3">
            <h5 class="bg-dark p-2 text-light">Shopping Cart</h5>
            <div class="row my-3">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="table">
                        <div class="table-responsive">
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="order_view_table_head">
                                        <th>Product</th>
                                        
                                        
                                        
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>

                                <tbody class="table__body">
                                    <?php
                                        $orders = DB::table('order_items')
                                            ->where('order_id', $order->id)
                                            ->where('parent_id', null)
                                            ->get();
                                        // dd($orders)
                                    ?>
                                    
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
                                            // dd($notes);
                                            $notes = DB::table('order_items')
                                                ->where('id', $item->id)
                                                ->where('order_id', $order->increment_id)
                                                ->value('additional_notes');

                                            // $truncatedNotes = Str::limit($notes, $limit = 9, $end = '...');

                                        ?>

                                        <tr class="order_view_table_body">
                                            
                                            <td class="product_name">
                                                <?php echo e($item->name); ?>

                                                <?php if($optionLabel): ?>
                                                    (<?php echo e($optionLabel); ?>)
                                                <?php endif; ?>
                                                <?php if(!empty($specialInstruction)): ?>
                                                <div class="" style="gap:4px;font-size:11px;"><span>Special Instruction:  </span>
                                                    <p class="m-0 display__notes" style="font-weight:500;"> <?php echo e($specialInstruction); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if(!empty($notes)): ?>
                                                <div class="" style="gap:4px;font-size:11px;"><span>Notes:  </span>
                                                <p class="m-0 display__notes" style="font-weight:500;"> <?php echo e($notes); ?></p>
                                                </div>
                                            <?php endif; ?>
                                            </td>

                                            

                                            <td><?php echo e(core()->formatBasePrice($item->base_price)); ?></td>

                                            <td>
                                                <span class="qty-row">
                                                    <?php echo e($item->qty_ordered); ?>

                                                </span>

                                            </td>

                                            <td><?php echo e(core()->formatBasePrice($item->base_total - $item->base_discount_amount)); ?>

                                            </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="order__view__payment">
                        <h5>Order summary</h5>
                        
                        <div class="card order__view__payment">
                            <div class="row p-2 order__view__total fs13">
                                <p class="col-7 cart_text">Cart Total</p>
                                <p class="col-5 total"><?php echo e(core()->formatBasePrice($order->sub_total)); ?></p>
                                
                                
                                

                                
                                <p class="col-7 cart_text m-0">
                                    Tax
                                </p>

                                <?php if(isset($order->tax_amount)): ?>
                                    <p class="col-5 tax m-0"><?php echo e(core()->formatBasePrice($order->tax_amount)); ?></p>
                                <?php else: ?>
                                    <p class="col-5 total m-0"><?php echo e(core()->formatBasePrice(0.0)); ?> </p>
                                <?php endif; ?>
                                <p class="col-7 cart_text">
                                    Handler Charges
                                </p>
                                <?php if(isset($agent) && isset($agent->Handling_charges) && $agent->Handling_charges != ''): ?>
                                    <p class="col-5 tax"><?php echo e(core()->formatBasePrice($agent->Handling_charges)); ?></p>
                                <?php else: ?>
                                    <p class="col-5 total"><?php echo e(core()->formatBasePrice(0.0)); ?> </p>
                                <?php endif; ?>
                                <p class="col-7 cart_text fs17" style="color:#f84661 !important">
                                    <?php if($order->status === 'paid'): ?>
                                        Paid amount
                                    <?php else: ?>
                                        Order Total
                                    <?php endif; ?>
                                </p>

                                <p class="col-5 total fs17" style="color: rgb(248, 70, 97) !important;">
                                    <?php if(isset($agent->Handling_charges)): ?>
                                        <?php echo e(core()->formatBasePrice($order->grand_total + $agent->Handling_charges)); ?>

                                    <?php else: ?>
                                        <?php echo e(core()->formatBasePrice($order->grand_total)); ?>

                                    <?php endif; ?>
                                </p>









                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </section>  

        <?php
        $order_status = DB::table('order_status_log')
        ->join('order_status', 'order_status_log.status_id', '=', 'order_status.id')
        ->where('order_status_log.order_id', $order->id)
        ->select('order_status.status') 
        ->pluck('order_status.status');
    
        $paymentButtonVisible = !$order_status->contains('paid');

            // $cards = collect();
            $cards = app('Webkul\MpAuthorizeNet\Repositories\MpAuthorizeNetRepository')->findWhere([
                'customers_id' => $order->customer_id,
            ]);
        ?>

        <div class="paymen__section">

            <?php if($order->status === 'paid' && !session('payment_success_' . $order->id)): ?>
                <?php
                    session()->flash('success', 'Payment paid successfully');
                    session(['payment_success_' . $order->id => true]);
                    
                ?>
            <?php endif; ?>

            <!-- sandeep delete deliverd and shipped -->
            <?php if(!in_array($order->status, ['pending', 'canceled', 'rejected', 'paid']) && $paymentButtonVisible): ?>
                

                <div class="payment_section w-50" style="">
                    <div class="">

                    <div class="fs19 pb-4">
                        <span><strong>Debit or Credit Card</strong></span>
                    </div>
                    <div class="" style="background: rgb(251 251 251);">
                    <div class="payment ml-3 mr-3 pt-2" style="border-bottom: 2px solid #a9a9a9;">    
                    <div>
                            <img src="<?php echo e(asset('themes/volantijetcatering/assets/images/visa.png')); ?>" alt="Authorize.net Logo" width="35px" class="mr-2" id="AuthorizeNet_image">
                            <img src="<?php echo e(asset('themes/volantijetcatering/assets/images/shopping.png')); ?>" alt="Authorize.net Logo" width="35px" class="mr-2" id="AuthorizeNet_image">
                            <img src="<?php echo e(asset('themes/volantijetcatering/assets/images/discover.png')); ?>" alt="Authorize.net Logo" width="35px" class="mr-2" id="AuthorizeNet_image">
                            <img src="<?php echo e(asset('themes/volantijetcatering/assets/images/american-express.png')); ?>" alt="Authorize.net Logo" width="35px" id="AuthorizeNet_image">
                    </div>
                   
                    <?php if(isset($cards) && count($cards) > 0): ?>
                    <div class="existing_card pt-2">
                        <?php echo $__env->make(
                            'mpauthorizenet::shop.volantijetcatering.components.saved-cards',
                            [
                                'customerId' => $order->customer_id,
                            ]
                        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
          
                    <?php endif; ?>
                </div>
                <div id="customAcceptUIContainer" class="p-3 mr-2 mr-lg-0 mr-md-0"></div>
                    </div>

                    </div>
                        <div class="card_erorr_message p-2 d-none" style="color:red;">
                          <span class="payment_error_message"></span>
                        </div>
                        <input type="hidden" id="order_order_id" value="<?php echo e($order->increment_id); ?>">
                        <input type="hidden" id="order_customer_id" value="<?php echo e($order->customer_id); ?>">
                <div class="pt-4">
                    <button type="button" class="invoice_view_pay_button pay_disable" id="collect_payment"
                        disabled>Place Order 

                    
                    </button>
                </div>
                </div>
            <?php endif; ?>
            <!-- Modal -->

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('mpauthorizenet::shop.volantijetcatering.checkout.card-script', [
        'orderId' => $order->id,
        'customerId' => $order->customer_id,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/volantiScottsdale/resources/themes/volantijetcatering/views/sales/invoice-detail.blade.php ENDPATH**/ ?>