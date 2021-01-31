<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>
<?php

include "includes/admin_header.php";
include "../users/userFunctions.php";

$UF = new UserFunctions();

if(isset($_GET['cancel'])){
    //$AF->deleteRetailer($_GET['delete']);
}
?>
<?php
$created_max = $created_min = $store = $orderNumber = $paymentType = null;
//$status = 'fulfilled';
if(isset($_POST['fromDate']) && $_POST['fromDate'] != '' && !is_null($_POST['fromDate']) && isset($_POST['toDate']) && $_POST['toDate'] != '' && !is_null($_POST['toDate'])){
    $created_max = $_POST['toDate']."T23:59:59-05:00";
    $created_min =$_POST['fromDate']."T00:00:01-05:00";
}
if(isset($_POST['selectStore']) && $_POST['selectStore'] != '' && !is_null($_POST['selectStore'])){
    $store = $_POST['selectStore'];
}
if(isset($_POST['orderNumber']) && $_POST['orderNumber'] != '' && !is_null($_POST['orderNumber'])){
    $orderNumber = $_POST['orderNumber'];
}
if(isset($_POST['selectedPaymentType']) && $_POST['selectedPaymentType'] != '' && !is_null($_POST['selectedPaymentType'])){
    $paymentType = $_POST['selectedPaymentType'];
}
/*------------------------------------------------*/
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    switch ($search){
        case "today":
            $selectedDate = date("Y-m-d");

            $created_max = $selectedDate."T23:59:59-05:00";
            $created_min = $selectedDate."T00:00:01-05:00";
            break;
        case "yesterday":
            $selectedDate = date("Y-m-d", strtotime("yesterday"));

            $created_max = $selectedDate."T23:59:59-05:00";
            $created_min = $selectedDate."T00:00:01-05:00";

            break;
        case "currentWeek":
            //check the current day
            if(date('D')!='Mon')
            { $fromDate = date('Y-m-d',strtotime('last Monday')); }else{ $fromDate = date('Y-m-d'); }
            //always next saturday
            if(date('D')!='Sun')
            { $toDate = date('Y-m-d',strtotime('next Sunday')); }else{ $toDate = date('Y-m-d'); }

            $created_max = $toDate."T00:00:01-05:00";
            $created_min = $fromDate."T23:59:59-05:00";
            break;
        case "previousWeek":
            $fromDate = date("Y-m-d", strtotime("last week monday"));
            $toDate = date("Y-m-d", strtotime("last week sunday"));

            $created_max = $toDate."T00:00:01-05:00";
            $created_min = $fromDate."T23:59:59-05:00";
            break;
        case "currentMonth":
            $fromDate = date('Y-m-01');
            $toDate = date('Y-m-t');

            $created_max = $toDate."T00:00:01-05:00";
            $created_min = $fromDate."T23:59:59-05:00";
            break;
        case "previousMonth":
            $fromDate = date("Y-n-j", strtotime("first day of previous month"));
            $toDate = date("Y-n-j", strtotime("last day of previous month"));

            $created_max = $toDate."T00:00:01-05:00";
            $created_min = $fromDate."T23:59:59-05:00";
            break;
        case "currentYear":
            $fromDate = date("Y-m-d", strtotime('first day of January '.date('Y') ));
            $toDate = date("Y-m-d", strtotime('last day of December '.date('Y') ));

            $created_max = $toDate."T00:00:01-05:00";
            $created_min = $fromDate."T23:59:59-05:00";
            break;
        case "previousYear":
            $year = date('Y') - 1; // Get current year and subtract 1
            $start = strtotime("January 1st, {$year}") ;
            $fromDate = date('Y-m-d', $start);
            $end = strtotime("December 31st, {$year}");
            $toDate = date('Y-m-d', $end);

            $created_max = $toDate."T00:00:01-05:00";
            $created_min = $fromDate."T23:59:59-05:00";
            break;
        default:
            echo "";
    }

}
/*------------------------------------------------*/
$allOrdersData = $UF->getOrderEarnings($created_min,$created_max,$store,$orderNumber,$paymentType, $store);
//print_r($allOrdersData);
$json = json_decode($allOrdersData['response'], 1);

$ordersStatus = $json['orders'];
//print_r($ordersStatus);
//$selectedOrders = $ordersStatus;

$selectStores = array();
$selectPaymentType = array();
$selectedStatus = array();
$selectedOrders = array();

//header('Content-Type: application/json');
/*------------------------------------------------*/
?>
<?php

    if($store == ""){
        
        //$markUpAmount = $UF->getMarkup("clickrippleappfurniture.myshopify.com");

    }else{
        //$markUpAmount = $UF->getMarkup($store);
    }

?>
<link rel="stylesheet" href="css/panel.css" />
<link rel="stylesheet" href="css/order.css" />

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td{
    padding:10px;
}
</style>

<body>

<div id="wrapper">
    <?php  include "includes/admin_navigation.php" ?>
    <div id="page-wrapper">
        <h3 class="page-header">Admin Earning Report By Store</h3>
        <div class="container-fluid">

            <div class="order-dashboard">

                <!--custom code-->
                <div>
                    <a href="?search=today">Today</a> | <a href="?search=yesterday">Yesterday</a> |
                    <a href="?search=currentWeek">Current Week</a> | <a href="?search=previousWeek">Previous Week</a> |
                    <a href="?search=currentMonth">Current Month</a> | <a href="?search=previousMonth">Previous Month</a> |
                    <a href="?search=currentYear">Current Year</a> | <a href="?search=previousYear">Previous Year</a> |

                </div>

                <div class="my-products__filters panel">
                    <div class="panel-body align-center">
                        <!--customCode-->
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <!--endCustomCode-->
                            <div class="my-products__filter">
                                <div class="input-field my-products__filter-item my-products__filter-item--keywords col-sm-3"><input type="date" id="fromDate" name="fromDate" placeholder="From Date" class="form-control"></div>
                                <div class="input-field my-products__filter-item my-products__filter-item--keywords col-sm-3"><input type="date" id="toDate" name="toDate" placeholder="To Date" class="form-control"></div>
                                <div class="input-field my-products__filter-item col-sm-3">
                                    <select id="selectStore" class="form-control" name="selectStore">
                                    <option value="">Select Store</option>
                                    <?php $stores = $UF->viewAllStores();
                                    
                                        foreach($stores as $store){
                                    
                                    ?>
                                            <option value="<?php echo $store['store_url']; ?>">
                                                <?php echo $store['store_url']; ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="input-field my-products__filter-item my-products__filter-item--keywords col-sm-3"><input id="orderNumber" name="orderNumber" type="text" placeholder="Order Number" class="form-control"></div>
                                <div class="input-field my-products__filter-item col-sm-3" style="margin-top:20px;">
                                    <select id="selectPaymentType" class="form-control" name="selectedPaymentType">
                                        <option disabled selected>Select Payment Type</option>
<!--                                        --><?php //foreach ($selectPaymentType as $paymentType){ ?>
<!--                                            <option value="--><?php //if(isset($paymentType['payment_gateway_names'][0])){ echo $paymentType['payment_gateway_names'][0]; } ?><!--">-->
<!--                                                --><?php //if(isset($paymentType['payment_gateway_names'][0])){ echo $paymentType['payment_gateway_names'][0]; } ?>
<!--                                            </option>-->
<!--                                        --><?php //} ?>

                                        <option value="authorize_net">authorize_net</option>
                                        <option value="manual">manual</option>
<!--                                    <option value="Cash on Delivery (COD)">Cash on Delivery (COD)</option>-->
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="my-products__filter-item text-center">
                        <div class="mb-3 row">
                            <button type="submit" class="btn btn-basic" name="submit"><!--onclick="makeEarningSelection()"-->
                                 <span class="btn-title">Search</span>
                            </button>
                            <button type="reset" class="btn btn-basic " name="reset"><!--onclick="makeEarningSelection()"-->
                                <span class="btn-title">Reset</span>
                            </button>
                        </div>
                    </div>
                        <!--customCode-->
                        </form>
                        <!--endCustomCode-->
                </div>
                <!--end custom code-->

                <div class="order-table">
                    <table class="order-table_table">
                        <thead class="order-table_thead">
                        <tr>
                            <th class="order-no">Order No#</th>
                            <th class="date-time">Order Date</th>
                            <th class="user-name">Price</th>
                            <th class="store-name">Mark up Amount</th>
                            <th class="delivery">Shipping Paid</th>
                            <th class="price">Refund</th>
                            <th class="order-placed">Total Earning</th>
                            <th class="payment-mode">Order Status</th>
                            <th class="action">Payment Method</th>
                        </tr>
                        </thead>
                        <tbody class="order-table_tbody">
                        <?php
                        foreach ($ordersStatus as $item){
                            
                            if(sizeof($UF->getProfitForProduct($item['line_items'][0]['product_id'])) > 0){

                                $profit = $UF->getProfitForProduct($item['line_items'][0]['product_id'])[0]['cost'];

                            }else{

                                $profit = 0;

                            }
                            ?>

                            

                            <tr>
                                <td><?php echo $item['id']; ?></td>
                                <td><?php $date=date_create($item['created_at']); echo date_format($date,'j<\s\u\p>S</\s\u\p> F, Y H:i a');  //echo date_format($date,"d F, Y H:i a"); ?></td>
                                <td><?php echo $item['total_price'] - $profit; ?></td>
                                <td></td>
                                <td>50 CAD<?php //echo $item['total_shipping_price_set']['shop_money']['amount']; ?></td>
                                <td><?php if(isset($item['refunds'][0]['transactions'][0]['amount'])){echo $item['refunds'][0]['transactions'][0]['amount']." ".$item['refunds'][0]['transactions'][0]['currency'];} ?></td>
                                <td></td>

                                <td><?php echo $item['financial_status']; ?></td>
                                <td><?php if(isset($item['payment_gateway_names'][0])){ echo $item['payment_gateway_names'][0]; } ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php if(isset($msg)){ echo $msg; } ?>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
