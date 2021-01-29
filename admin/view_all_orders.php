<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>
<?php

include "includes/admin_header.php";

include "../users/userFunctions.php";

$UF = new UserFunctions();
?>
<?php



if(isset($_POST['getStore'])){

    $selectedStore = $_POST['currentStore'];

    header("Location: view_all_orders.php?store=".$selectedStore);

}

if(isset($_GET['store'])){

    $store = $_GET['store'];
    $allOrdersData = $UF->getOrdersFromStore($store);
    $orders = json_decode($allOrdersData, 1);
    //print_r($orders);   
    if( !isset($orders['errors']) ){
    
        $ordersStatus = $orders['orders'];

    }
    //print_r($allOrdersData);

}else{

    $allOrdersData = $UF->getOrders();

    $json = json_decode($allOrdersData['data'], 1);

    $ordersStatus = $json['orders'];

}

if(isset($ordersStatus)){

    $numOfFullFilled = 0;
    $numOfPending = 0;

foreach ($ordersStatus as $rkey => $orderStatus){
	if ($orderStatus['fulfillment_status'] == 'fulfilled'){
		$fullOrders[] = $orderStatus;
	}
	if ($orderStatus['fulfillment_status'] == '' && $orderStatus['financial_status'] != 'paid') {
		$pendingOrders[] = $orderStatus;
	}if ($orderStatus['financial_status'] == 'refunded') {
		$canceldOrders[] = $orderStatus;
	}
}

foreach ($ordersStatus as $rkey => $orderStatus){

	if ($orderStatus['fulfillment_status'] != 'fulfilled' && $orderStatus['financial_status'] == 'paid'){
        $ordersToBeShip[] = $orderStatus;
        $totalEarnings[] = $orderStatus['total_price'];
	}
	
}


}
 if(!isset($_GET['store'])){

    $_GET['store'] = "clickrippleappfurniture.myshopify.com";
 }
    

if(isset($_POST['close'])){

    header("Location: ./view_all_orders.php");

}

if(isset($_POST['deleteOrder'])){
    
    $store = $_GET['store'];

    $UF->deleteOrder($_POST['deleteOrder'], $store);

}


$fulfilled = array();
$cancelledOrders = array();
$pending = array();
$allRecords = array();
$selectedStatus = array();


?>

    <link rel="stylesheet" href="./css/panel.css" />
    <link rel="stylesheet" href="./css/order.css" />
    <link rel="stylesheet" href="./css/orderStyle.css" />
    <link rel="stylesheet" href="./css/buttonsStyle.css" />
    <link rel="stylesheet" href="./css/popupStyle.css" />

<body>

<div id="wrapper">
    <?php  include "includes/admin_navigation.php" ?>
    <div id="page-wrapper">
        <div class="container-fluid">
        <div class="orderButton">
                        
        <div class="btn-group">
            <a href="./add_product.php">Add New Product</a>
            <a href="./add_categories.php">Add New Category</a>
            <a href="./add_groups.php">Add New Group</a>
            <a href="./view_all_retailers.php">View All Retailers</a>
            <a href="./edit_admin.php?editAdminId=<?php echo $_SESSION['adminId']?>">General Settings</a>
        </div>
        <?php

        
        
        if(isset($_POST['cancelOrder'])){
        
            $productId = $_GET['productId'];
            $store = $_GET['store'];
            
            $cancellationReason = $_POST['cancellationReason'];
            $cancellationCharges = $_POST['cancellationCharges'];

            unset($_GET['productId']);
        
            $cancel = $UF->cancelOrder($productId, $cancellationReason, $cancellationCharges, $store);
            if($cancel){
                header("Location: view_all_orders.php");
            }
        }
        ?>
        
            <div class="order-dashboard">
            <br>
            <form method="post">
                            Select Store : 
                            <select name="currentStore">
                            
                                <?php
                                
                                    $stores = $UF->viewAllStores();
                                    foreach($stores as $store){
                                        ?>
                                        
                                        <option value="<?php echo $store['store_url']?>"><?php echo $store['store_url']?></option>
                                        
                                        <?php
                                    }
                                
                                ?>

                            </select>
                            <input type="submit" name="getStore" value="Select This Store">

                        </form>

                        <div class="orderStatics">

                            <div class="title">
                                <span class="orderTitle">Order Statistics For This Store</span>
                            </div>
                            <div class="orderButton">
                                <div class="orderbtn totalOrder">
                                    <a href="view_all_orders.php?status=no&store=<?php if(isset($_GET['store'])){
                                        echo $_GET['store'];
                                        }else{
                                            echo "clickrippleappfurniture.shopify.com";
                                        }
                                        ?>" class="total">
                                        <svg class="icon">
                                            <use xlink:href="#icon-cube">
                                                <symbol id="icon-cube" viewBox="131 -131 512 512">
                                                    <path
                                                            d="M280.5,299.2l90.6-45.8v-73.8l-90.6,39.2V299.2z M265.5,191.8l95.3-41.1l-95.3-41.1l-95.3,41.1L265.5,191.8
                        z M522.5,299.2l90.6-45.8v-73.8l-90.6,39.2V299.2z M506.6,191.8l95.3-41.1l-95.3-41.1l-95.3,41.1L506.6,191.8z M401,122.7
                        l90.6-39.2V20.9L401,60.1V122.7z M386.1,33l103.7-44.8l-103.7-44L282.4-11L386.1,33z M643,155.4v98.1c0,5.6-1.9,11.2-4.7,15.9
                        c-2.8,4.7-7.5,8.4-12.1,11.2l-105.6,53.3c-3.7,1.9-8.4,3.7-13.1,3.7c-4.7,0-9.3-0.9-13.1-3.7l-105.6-53.3c-0.9,0-0.9-0.9-1.9-0.9
                        c0,0-0.9,0.9-1.9,0.9l-105.6,53.3c-3.7,1.9-8.4,3.7-13.1,3.7c-4.7,0-9.3-0.9-13.1-3.7l-105.4-53.3c-5.6-2.8-9.3-6.5-12.1-11.2
                        c-2.8-4.7-4.7-10.3-4.7-15.9v-98.1c0-5.6,1.9-11.2,4.7-16.8c3.7-4.7,7.5-8.4,13.1-11.2l102.8-43.9v-94.4c0-5.6,1.9-11.2,4.7-16.8
                        c2.8-5.6,7.5-8.4,13.1-11.2L375-84.7c3.7-1.9,7.5-2.8,12.1-2.8c4.7,0,8.4,0.9,12.1,2.8L504.7-39c5.6,2.8,10.3,6.5,13.1,11.2
                        c2.8,4.7,4.7,10.3,4.7,16.8v94.4l102.8,43.9c5.6,2.8,10.3,6.5,13.1,11.2C641.1,144.2,643,149.8,643,155.4z"
                                                    ></path>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Total Orders</span>
                                            <span class="order-nos"><?php 
                                            
                                            if(isset($ordersStatus)){
                                                print(sizeOf($ordersStatus));
                                            }
                                            
                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="orderbtn processedOrder">
                                    <a href="view_all_orders.php?status=pending&store=<?php if(isset($_GET['store'])){
                                        echo $_GET['store'];
                                        }else{
                                            echo "clickrippleappfurniture.shopify.com";
                                        }
                                        ?>" class="processed">
                                        <svg class="icon">
                                            <use xlink:href="#icon-sqaure">
                                                <symbol id="icon-sqaure" viewBox="0 0 1000 1000">
                                                    <g>
                                                        <g>
                                                            <path
                                                                    d="M745,193.8H71.3C37.4,193.8,10,221.2,10,255v673.8c0,33.8,27.4,61.3,61.3,61.3H745c33.8,0,
                          61.3-27.4,61.3-61.3V255C806.3,221.2,778.8,193.8,745,193.8z M745,898.1c0,17-13.7,30.6-30.6,30.6H101.9c-16.9
                          ,0-30.6-13.7-30.6-30.6V285.6c0-16.9,13.7-30.6,30.6-30.6h612.5c16.9,0,30.6,13.7,30.6,30.6V898.1z M928.8,
                          10H316.3C282.4,10,255,37.4,255,71.3v61.3h61.3v-30.6c0-16.9,13.7-30.6,30.6-30.6h551.3c16.9,0,30.6,13.7,30.6,
                          30.6v551.3c0,16.9-13.7,30.6-30.6,30.6h-30.6V745h61.3c33.8,0,61.3-27.4,61.3-61.3V71.3C990,37.4,962.6,10,928.8,10z"
                                                            ></path>
                                                        </g>
                                                    </g>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Proccessing Orders</span>
                                            <span class="order-nos"><?php 
                                            
                                            if(isset($pendingOrders)){
                                                echo sizeOf($pendingOrders);
                                            }else{
                                                echo 0;
                                            }

                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="orderbtn cancelledOrder">
                                    <a href="view_all_orders.php?status=cancelled&store=<?php if(isset($_GET['store'])){
                                        echo $_GET['store'];
                                        }else{
                                            echo "clickrippleappfurniture.shopify.com";
                                        }
                                        ?>" class="cancel">
                                        <svg class="icon">
                                            <use xlink:href="#icon-danger-circle">
                                                <symbol id="icon-danger-circle" viewBox="0 0 20 20">
                                                    <path
                                                            d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm3.7 10.3a1 1 0 1 1-1.4 1.4L10 11.42l-2.3 2.3a1 1 0 0 1-1.4
                               0 1 1 0 0 1 0-1.42L8.58 10l-2.3-2.3A1 1 0 1 1 7.7 6.3L10 8.58l2.3-2.3a1 1 0 1 1 1.4 1.42L11.42 10l2.3 2.3z"
                                                    ></path>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Cancelled Orders</span>
                                            <span class="order-nos"><?php
                                            
                                            if(isset($canceldOrders)){
                                                echo sizeOf($canceldOrders);
                                            }else{
                                                echo 0;
                                            }
                                            
                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="orderbtn completedOrder">
                                    <a href="view_all_orders.php?status=fulfilled&store=<?php if(isset($_GET['store'])){
                                        echo $_GET['store'];
                                        }else{
                                            echo "clickrippleappfurniture.shopify.com";
                                        }
                                        ?>" class="completed">
                                        <svg class="icon">
                                            <use xlink:href="#icon-checkmark">
                                                <symbol id="icon-checkmark" viewBox="0 0 26 26">
                                                    <path
                                                            d="M 22.566406 4.730469 L 20.773438 3.511719 C 20.277344 3.175781 19.597656 3.304688 19.265625 3.796875
                        L 10.476563 16.757813 L 6.4375 12.71875 C 6.015625 12.296875 5.328125 12.296875 4.90625 12.71875 L 3.371094 14.253906
                        C 2.949219 14.675781 2.949219 15.363281 3.371094 15.789063 L 9.582031 22 C 9.929688 22.347656 10.476563 22.613281
                        10.96875 22.613281 C 11.460938 22.613281 11.957031 22.304688 12.277344 21.839844 L 22.855469 6.234375 C 23.191406
                        5.742188 23.0625 5.066406 22.566406 4.730469 Z"
                                                    ></path>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Completed Orders</span>
                                            <span class="order-nos" ><?php 
                                            
                                                if(isset($fullOrders)){
                                                    print_r(sizeOf($fullOrders));
                                                }else{

                                                    echo 0;

                                                }

                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="orderbtn processedOrder">
                                    <a href="view_all_orders.php?status=pending" class="processed">
                                        <svg class="icon">
                                            <use xlink:href="#icon-sqaure">
                                                <symbol id="icon-sqaure" viewBox="0 0 1000 1000">
                                                    <g>
                                                        <g>
                                                            <path
                                                                    d="M745,193.8H71.3C37.4,193.8,10,221.2,10,255v673.8c0,33.8,27.4,61.3,61.3,61.3H745c33.8,0,
                                        61.3-27.4,61.3-61.3V255C806.3,221.2,778.8,193.8,745,193.8z M745,898.1c0,17-13.7,30.6-30.6,30.6H101.9c-16.9
                                        ,0-30.6-13.7-30.6-30.6V285.6c0-16.9,13.7-30.6,30.6-30.6h612.5c16.9,0,30.6,13.7,30.6,30.6V898.1z M928.8,
                                        10H316.3C282.4,10,255,37.4,255,71.3v61.3h61.3v-30.6c0-16.9,13.7-30.6,30.6-30.6h551.3c16.9,0,30.6,13.7,30.6,
                                        30.6v551.3c0,16.9-13.7,30.6-30.6,30.6h-30.6V745h61.3c33.8,0,61.3-27.4,61.3-61.3V71.3C990,37.4,962.6,10,928.8,10z"
                                                            ></path>
                                                        </g>
                                                    </g>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Total Retailers</span>
                                            <span class="order-nos"><?php 
                                            
                                            print($UF->getNumOfRetailers());

                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="orderbtn processedOrder">
                                    <a href="view_all_orders.php?status=pending" class="processed">
                                        <svg class="icon">
                                            <use xlink:href="#icon-sqaure">
                                                <symbol id="icon-sqaure" viewBox="0 0 1000 1000">
                                                    <g>
                                                        <g>
                                                            <path
                                                                    d="M745,193.8H71.3C37.4,193.8,10,221.2,10,255v673.8c0,33.8,27.4,61.3,61.3,61.3H745c33.8,0,
                                        61.3-27.4,61.3-61.3V255C806.3,221.2,778.8,193.8,745,193.8z M745,898.1c0,17-13.7,30.6-30.6,30.6H101.9c-16.9
                                        ,0-30.6-13.7-30.6-30.6V285.6c0-16.9,13.7-30.6,30.6-30.6h612.5c16.9,0,30.6,13.7,30.6,30.6V898.1z M928.8,
                                        10H316.3C282.4,10,255,37.4,255,71.3v61.3h61.3v-30.6c0-16.9,13.7-30.6,30.6-30.6h551.3c16.9,0,30.6,13.7,30.6,
                                        30.6v551.3c0,16.9-13.7,30.6-30.6,30.6h-30.6V745h61.3c33.8,0,61.3-27.4,61.3-61.3V71.3C990,37.4,962.6,10,928.8,10z"
                                                            ></path>
                                                        </g>
                                                    </g>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Total Orders To Be Shipped</span>
                                            <span class="order-nos"><?php 
                                            
                                            if(isset($ordersToBeShip)){
                                                echo sizeof($ordersToBeShip);
                                            }

                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="orderbtn processedOrder">
                                    <a href="view_all_orders.php?status=pending" class="processed">
                                        <svg class="icon">
                                            <use xlink:href="#icon-sqaure">
                                                <symbol id="icon-sqaure" viewBox="0 0 1000 1000">
                                                    <g>
                                                        <g>
                                                            <path
                                                                    d="M745,193.8H71.3C37.4,193.8,10,221.2,10,255v673.8c0,33.8,27.4,61.3,61.3,61.3H745c33.8,0,
                                        61.3-27.4,61.3-61.3V255C806.3,221.2,778.8,193.8,745,193.8z M745,898.1c0,17-13.7,30.6-30.6,30.6H101.9c-16.9
                                        ,0-30.6-13.7-30.6-30.6V285.6c0-16.9,13.7-30.6,30.6-30.6h612.5c16.9,0,30.6,13.7,30.6,30.6V898.1z M928.8,
                                        10H316.3C282.4,10,255,37.4,255,71.3v61.3h61.3v-30.6c0-16.9,13.7-30.6,30.6-30.6h551.3c16.9,0,30.6,13.7,30.6,
                                        30.6v551.3c0,16.9-13.7,30.6-30.6,30.6h-30.6V745h61.3c33.8,0,61.3-27.4,61.3-61.3V71.3C990,37.4,962.6,10,928.8,10z"
                                                            ></path>
                                                        </g>
                                                    </g>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Total Earnings</span>
                                            <span class="order-nos"><?php 

                                            if(isset($totalEarnings)){
                                                print(array_sum($totalEarnings));
                                            }

                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="orderbtn processedOrder">
                                    <a href="view_all_products.php" class="processed">
                                        <svg class="icon">
                                            <use xlink:href="#icon-sqaure">
                                                <symbol id="icon-sqaure" viewBox="0 0 1000 1000">
                                                    <g>
                                                        <g>
                                                            <path
                                                                    d="M745,193.8H71.3C37.4,193.8,10,221.2,10,255v673.8c0,33.8,27.4,61.3,61.3,61.3H745c33.8,0,
                          61.3-27.4,61.3-61.3V255C806.3,221.2,778.8,193.8,745,193.8z M745,898.1c0,17-13.7,30.6-30.6,30.6H101.9c-16.9
                          ,0-30.6-13.7-30.6-30.6V285.6c0-16.9,13.7-30.6,30.6-30.6h612.5c16.9,0,30.6,13.7,30.6,30.6V898.1z M928.8,
                          10H316.3C282.4,10,255,37.4,255,71.3v61.3h61.3v-30.6c0-16.9,13.7-30.6,30.6-30.6h551.3c16.9,0,30.6,13.7,30.6,
                          30.6v551.3c0,16.9-13.7,30.6-30.6,30.6h-30.6V745h61.3c33.8,0,61.3-27.4,61.3-61.3V71.3C990,37.4,962.6,10,928.8,10z"
                                                            ></path>
                                                        </g>
                                                    </g>
                                                </symbol>
                                            </use>
                                        </svg>
                                        <div class="order-detail">
                                            <span class="orderTitle">Total Products</span>
                                            <span class="order-nos"><?php 
                                            
                                            print($UF->getNumOfProducts());

                                            ?></span>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        
                        <div class="form-popup" id="myForm">
                                    <form method = "POST" class="form-container">
                                        <h1>Cancel Order</h1>

                                    <label for="Cancellation Reason"><b>Cancellation Reason</b></label><br>
                                    <textarea name="cancellationReason" ></textarea>
                                    
                                    <br>

                                    <label for="charges"><b>Cancellation Charges To Apply For User</b></label>
                                    <input type="text" value=0 name="cancellationCharges" required>

                                    <label for="charges"><b>Refund Amount</b></label>
                                    <input type="text" value=0 name="cancellationCharges" required>
                                    
                                    <b>Notes</b>
                                    <ol>

                                        <li>Set the cancellation charges as per the Order and Delivery Status. Also, the expected payouts
                                            shown here are just for your review to check how much to pay if the order will de delivered.
                                        </li>

                                        <li>
                                            If this order contains any wallet settlement than wallet amount will be
                                            refunded back to User's wallet as soon as you mark this order as 'CANCEL'.
                                        </li>

                                        <li>
                                            Cancellation charges is not applicable on status 'Payment not initiated'
                                        </li>

                                    </ol>
                                    <input type="text" name="hiddenStore" value="<?php echo $_GET['store']?>">
                                    <input type="submit" name="cancelOrder" class="btn" value="Cancel Order">
                                    <input type="submit" name="close" class="btn cancel" value="Close">
                                    

                                </form>
                            </div>
                        </div>

                        <div class="order-table">
                            <table class="order-table_table" cellspacing=10 cellpadding="5px">
                                <thead class="order-table_thead">
                                <tr>
                                    <th class="order-no">Order No#</th>
                                    <th class="date-time">Order Date</th>
                                    <th class="user-name">User Name</th>
                                    <th class="store-name">Store Name</th>
                                    <th class="delivery">Delivery Driver</th>
                                    <th class="price">Order Total</th>
                                    <th class="order-placed">Order Status</th>
                                    <th class="payment-mode">Payment Mode</th>
                                    <th class="action">Action</th>
                                    <th class="action">Shipping</th>
                                    <th class="action">Delete</th>
                                </tr>
                                </thead>
                                <tbody class="order-table_tbody">
                                <?php
                                //                            foreach ($allOrders->orders as $order){
                                //                                echo "<tr>";
                                //                                echo "<td>".$order->id."</td>";
                                //                                echo "<td>".$order->created_at."</td>";
                                //                                echo "<td></td>"; //".$order->customer->first_name." ".$order->customer->last_name."
                                //                                echo "<td>".$order->source_name."</td>";
                                //                                echo "<td></td>";
                                //                                echo "<td>".$order->total_price."</td>"; //".$order->customer->orders_count."
                                //                                echo "<td>".$order->fulfillment_status."</td>"; //order_status_url
                                //                                foreach ($order->payment_gateway_names as $mode){ // processing_method
                                //                                    echo "<td>".$mode."</td>";
                                //                                }
                                //                                echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to cancel order?   '); \" href='view_all_orders.php?cancel={$order->id}'>Cancel Order</a></td>";
                                //                                echo "</tr>";
                                //                            }
                                if(isset($ordersStatus)){

                                
                                foreach ($ordersStatus as $rkey => $orderStatus){
                                    if ($orderStatus['fulfillment_status'] == 'fulfilled'){
                                        $fulfilled[] = $orderStatus;
                                    }
                                    if ($orderStatus['fulfillment_status'] == '' && $orderStatus['financial_status'] != 'paid') {
                                        $pending[] = $orderStatus;
                                    }
                                    if ($orderStatus['fulfillment_status'] == 'fulfilled' || $orderStatus['fulfillment_status'] == ''){
                                        $allRecords[] = $orderStatus;
                                    }if ($orderStatus['financial_status'] == 'refunded') {
                                        $cancelledOrders[] = $orderStatus;
                                    }
                                }
                            }

                                if(isset($_GET['status']) && $_GET['status'] == "pending"){
                                    $selectedStatus = $pending;
                                }elseif(isset($_GET['status']) && $_GET['status'] == "fulfilled"){
                                    $selectedStatus = $fulfilled;
                                }elseif(isset($_GET['status']) && $_GET['status'] == "no"){
                                    $selectedStatus = $allRecords;
                                }elseif(isset($_GET['status']) && $_GET['status'] == "cancelled"){
                                    $selectedStatus = $cancelledOrders;
                                }else{
                                    $selectedStatus = $allRecords;
                                }

                                

                                foreach ($selectedStatus as $item){?>
                                    <tr>
                                        <input type="hidden" name="cancelproductId" value=<?php echo $item['id']?>>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['created_at']; ?></td>
                                        <td class="user-name"><?php if(isset($item['customer']['first_name'])){ echo $item['customer']['first_name']; }if(isset($item['customer']['last_name'])){ echo $item['customer']['last_name']; } ?><br />Phone: <?php if(isset($item['customer']['phone'])){ echo $item['customer']['phone']; } ?></td>
                                        <td class="store-name"><?php if(isset($item['line_items'][0]['fulfillment_service'])){ echo $item['line_items'][0]['fulfillment_service']; } ?><br />phone:***********</td> <?php //$item['source_name'];  ?>
                                        <td></td>
                                        <td><?php echo $item['total_price']; ?></td>
										<td><?php 
											echo $item['financial_status'];
										?></td>
                                        <td><?php
                                        
                                        $payment = $item['payment_gateway_names'];

                                        if(sizeOf($payment)>0){
                                            echo $payment[0];
                                        }else{
                                            echo "Unkonwn";
                                        }
                                        
                                        ?></td>
                                        <?php if ($item['financial_status'] != 'refunded' && $item['financial_status'] != 'partially_refunded'){?>
                                            <td class="cancelledbtn"><a class= "btn btn-primary"  href="./view_all_orders.php?productId=<?php echo $item['id']?>&store=<?php echo $_GET['store']?>">Cancel Order</a></td>
                                        <?php } else{?>
                                            <td class="cancelledbtn">Cannot Cancel a Refunded Order</td>
                                        <?php }?>
                                        <?php if($item['financial_status'] === 'paid'){?>    
                                            <td class="cancelledbtn">
                                                Pick Shipper
                                                <select name="shipper">
                                                    <option value="ups"> UPS </option>
                                                    <option value="canadapost"> Canada Post </option>
                                                    <option value="fedex"> FedEx </option>
                                                    <option value="dhl"> DHL </option>
                                                </select>
                                            <form method="post">                                        
                                                <input type="submit" name="ship" value="Assign Shipping"/>
                                            </form>
                                            </td>
                                        <?php } else{?>
                                        <td>Not Applicable for Unpaid Orders</td>
                                            <?php }?>
                                        <td>
                                        
                                            <form method="post">
                                                <button type="submit" name="deleteOrder" value=<?php echo $item['id']?> class= "btn btn-primary">Delete This Order</button>
                                            </form>
                                        
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                                
                                </tbody>
                            </table>

                            

            </div>

        </div>
    </div>
</div>
<?php
if(isset($_GET['productId'])){

?>

<script>

    function openForm() {
        
        document.getElementById("myForm").style.display = "block";
        var x = document.getElementsByTagName("BODY")[0]
        console.log(x)
        
    }
    
    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

    openForm()

</script>

<?php

}?>
</body>
</html>



