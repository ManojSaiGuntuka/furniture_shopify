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

$allOrdersData = $UF->getOrders();

//$allOrders = json_decode($allOrdersData['data']);

$json = json_decode($allOrdersData['data'], 1);

$ordersStatus = $json['orders'];


$selectStores = array();
$selectPaymentType = array();
$selectedStatus = array();
$selectedOrders = array();

//header('Content-Type: application/json');

//print_r($allOrders->orders);

/*------------------------------------------------*/

$msg = '';
if(isset($_GET['fromDate']) && isset($_GET['toDate'])){
    $fromDate = $_GET['fromDate'];
    $toDate = $_GET['toDate'];

}
if(isset($_GET['selectStore'])){
    $selectStore = $_GET['selectStore'];
    foreach ($ordersStatus as $rkey => $orderStatus) {
        if ($orderStatus['source_name'] == $selectStore) {
            $selectedOrders[] = $orderStatus;
        }
    }
}
if(isset($_GET['orderNumber']) && $_GET['orderNumber'] != ''){
    $orderNumber = $_GET['orderNumber'];
    foreach ($ordersStatus as $rkey => $orderStatus) {
        if ($orderStatus['id'] == $orderNumber) {
            $selectedOrders[] = $orderStatus;
            //$msg = '';
        }
        //else{
            //$msg = 'No record found.';
        //}
    }
}
if(isset($_GET['selectedPaymentType'])){
    $selectedPaymentType = $_GET['selectedPaymentType'];
    foreach ($ordersStatus as $rkey => $orderStatus) {
        if ($orderStatus['payment_gateway_names'][0] == $selectedPaymentType) {
            $selectedOrders[] = $orderStatus;
        }
    }
}
/*------------------------------------------------*/
?>
<?php

                        foreach ($ordersStatus as $rkey => $orderStatus){               //making data
                            if ($orderStatus['source_name'] != ''){
                                $selectStores[] = $orderStatus;
                            }
                            if ($orderStatus['payment_gateway_names'][0] != ''){
                                $selectPaymentType[] = $orderStatus;
                            }

//                            if ($orderStatus['fulfillment_status'] == '') {
//                                $pending[] = $orderStatus;
//                            }
//                            if ($orderStatus['fulfillment_status'] == 'fulfilled' || $orderStatus['fulfillment_status'] == ''){
//                                $allRecords[] = $orderStatus;
//                            }
                        }
//                        if(isset($_GET['status']) && $_GET['status'] == "pending"){         //showing data
//                            $selectedStatus = $pending;
//                        }elseif(isset($_GET['status']) && $_GET['status'] == "fulfilled"){
//                            $selectedStatus = $fulfilled;
//                        }elseif(isset($_GET['status']) && $_GET['status'] == "no"){
//                            $selectedStatus = $allRecords;
//                        }else{
//                            $selectedStatus = $allRecords;
//                        }
?>
<link rel="stylesheet" href="./css/panel.css" />
<link rel="stylesheet" href="./css/order.css" />
<body>

<div id="wrapper">
    <?php  include "includes/admin_navigation.php" ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="order-dashboard">

                <!--custom code-->
                <div class="my-products__filters panel">
                    <div class="panel-body align-center">
                        <!--customCode-->
                        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <!--endCustomCode-->
                        <div class="my-products__filter">
                            <div class="input-field my-products__filter-item my-products__filter-item--keywords"><input type="date" id="fromDate" name="fromDate" placeholder="From Date" class="form-control"></div>
                            <div class="input-field my-products__filter-item my-products__filter-item--keywords"><input type="date" id="toDate" name="toDate" placeholder="To Date" class="form-control"></div>
                            <div class="input-field my-products__filter-item">
                                <select id="selectStore" class="form-control" name="selectStore">
                                    <option disabled selected>Select Store</option>
                                    <?php foreach ($selectStores as $store){ ?>
                                    <option value="<?php echo $store['source_name']; ?>">
                                        <?php echo $store['source_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-field my-products__filter-item my-products__filter-item--keywords"><input id="orderNumber" name="orderNumber" type="text" placeholder="Order Number" class="form-control"></div>
                            <div class="input-field my-products__filter-item">
                                <select id="selectPaymentType" class="form-control" name="selectedPaymentType">
                                    <option disabled selected>Select Payment Type</option>
                                    <?php foreach ($selectPaymentType as $paymentType){ ?>
                                        <option value="<?php echo $paymentType['payment_gateway_names'][0]; ?>">
                                            <?php echo $paymentType['payment_gateway_names'][0]; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!---->
                            <div class="my-products__filter-item">
                                <button type="submit" class="btn btn-basic btn-lg btn-block" name="submit"><!--onclick="makeEarningSelection()"-->
                                    <!----> <!----> <span class="btn-title">
                                       Filter
                                       </span> <!---->
                                </button>
                            </div>
                        </div>
                            <!--customCode-->
                        </form>
                            <!--endCustomCode-->
                    </div>
                </div>
                <!--end custom code-->

                <div class="order-table">
                    <table class="order-table_table">
                        <thead class="order-table_thead">
                        <tr>
                            <th class="order-no">Order No#</th>
                            <th class="date-time">Order Date</th>
                            <th class="user-name">A=Total Order Amount</th>
                            <th class="store-name">B=Site Commission</th>
                            <th class="delivery">c=Delivery Charges</th>
                            <th class="price">D=OutStanding Amount</th>
                            <th class="order-placed">E=Delivery Tip</th>
                            <th class="payment-mode">F=Driver Pay Amount</th>
                            <th class="payment-mode">G=Admin Earning Amount</th>
                            <th class="payment-mode">Order Status</th>
                            <th class="action">Payment Method</th>
                        </tr>
                        </thead>
                        <tbody class="order-table_tbody">
                        <?php

//                        foreach ($ordersStatus as $rkey => $orderStatus){               //making data
//                            if ($orderStatus['created_at'] != ''){
//                                //$fulfilled[] = $orderStatus;
//                                $obj = JSON.parse($orderStatus['created_at']);
                                //JSON.useDateParser($orderStatus['created_at']);
                            //}
//                            if ($orderStatus['fulfillment_status'] == '') {
//                                $pending[] = $orderStatus;
//                            }
//                            if ($orderStatus['fulfillment_status'] == 'fulfilled' || $orderStatus['fulfillment_status'] == ''){
//                                $allRecords[] = $orderStatus;
//                            }
                        //}
//                        if(isset($_GET['status']) && $_GET['status'] == "pending"){         //showing data
//                            $selectedStatus = $pending;
//                        }elseif(isset($_GET['status']) && $_GET['status'] == "fulfilled"){
//                            $selectedStatus = $fulfilled;
//                        }elseif(isset($_GET['status']) && $_GET['status'] == "no"){
//                            $selectedStatus = $allRecords;
//                        }else{
//                            $selectedStatus = $allRecords;
//                        }


                        foreach ($selectedOrders as $item){?>
                            <tr>
                                <td><?php echo $item['id']; ?></td>
                                <td><?php echo $item['created_at']; ?></td>
                                <td><?php echo $item['total_price']; ?></td>
                                <td><?php //echo $item['id']; ?></td>
                                <td><?php echo $item['total_shipping_price_set']['shop_money']['amount']; ?></td>
                                <td><?php //echo $item['id']; ?></td>
                                <td><?php //echo $item['id']; ?></td>
                                <td><?php //echo $item['id']; ?></td>
                                <td><?php //echo $item['id']; ?></td>
                                <td><?php echo $item['fulfillment_status']; ?></td>
                                <td><?php echo $item['payment_gateway_names'][0]; ?></td>
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
<script>
    function makeEarningSelection(){
        let fromDate = document.getElementById('fromDate').value;
        let ToDate = document.getElementById('ToDate').value;
        let selectStore = document.getElementById('selectStore').value;
        let orderNumber = document.getElementById('orderNumber').value;
        let selectPaymentType = document.getElementById('selectPaymentType').value;
        //console.log(selectStore);
    }
</script>
</html>
