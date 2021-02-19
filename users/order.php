<?php

	 require_once('stripeconfig.php');
  include "./userFunctions.php";

  $UF = new UserFunctions();

 $allOrdersData = $UF->getOrders(); // The Store Data
 $json = json_decode($allOrdersData['data'], 1);

$ordersStatus = $json['orders'];

$fulfilled = array();
$Unfulfilled = array();
$partiallyfulfilled = array();


$authorized = array();
$paid = array();
$partiallypaid = array();
$refunded = array();
$partiallyrefunded = array();

$toorder = array();
$processing = array();
$shipped = array();


$allRecords = array();
$selectedStatus = array();

foreach ($ordersStatus as $rkey => $orderStatus){
	if ($orderStatus['fulfillment_status'] == 'fulfilled'){
		$fulfilled[] = $orderStatus;
   }
   if ($orderStatus['fulfillment_status'] == 'Unfulfilled'){
		$Unfulfilled[] = $orderStatus;
   }
   if ($orderStatus['fulfillment_status'] == 'partiallyfulfilled'){
		$partiallyfulfilled[] = $orderStatus;
	}
}

foreach ($ordersStatus as $rkey => $orderStatus){
	if ($orderStatus['financial_status'] == 'authorized'){
		$authorized[] = $orderStatus;
	}
	if ($orderStatus['financial_status'] == 'refunded') {
		$refunded[] = $orderStatus;
   }
   if ($orderStatus['financial_status'] == 'paid') {
		$paid[] = $orderStatus;
   }
   if ($orderStatus['financial_status'] == 'partiallypaid') {
		$partiallypaid[] = $orderStatus;
   }
   if ($orderStatus['financial_status'] == 'refunded') {
		$refunded[] = $orderStatus;
   }
   if ($orderStatus['financial_status'] == 'partiallyrefunded') {
		$partiallyrefunded[] = $orderStatus;
   }
   if($orderStatus['financial_status'] == "paid" && $orderStatus['fulfillment_status'] == "fulfilled"){

      $toorder[] = $orderStatus;
   
    }
}
foreach ($ordersStatus as $rkey => $orderStatus){
	if ($orderStatus['fulfillment_status'] == 'toorder'){
		$toorder[] = $orderStatus;
   }
   if ($orderStatus['fulfillment_status'] == 'processing'){
		$processing[] = $orderStatus;
   }
   if ($orderStatus['fulfillment_status'] == 'shipped'){
		$shipped[] = $orderStatus;
	}
}
if(isset($_GET['status']) && $_GET['status'] == "unfulfilled"){                        
   $selectedStatus = $unfulfilled;  
}elseif(isset($_GET['status']) && $_GET['status'] == "fulfilled"){
   $selectedStatus = $fulfilled;
}elseif(isset($_GET['status']) && $_GET['status'] == "partiallyfulfilled"){
   $selectedStatus = $partiallyfulfilled;   
}elseif(isset($_GET['status']) && $_GET['status'] == "authorized"){
   $selectedStatus = $authorized;
}elseif(isset($_GET['status']) && $_GET['status'] == "paid"){
   $selectedStatus = $paid;
}elseif(isset($_GET['status']) && $_GET['status'] == "partiallypaid"){
   $selectedStatus = $partiallypaid;
}elseif(isset($_GET['status']) && $_GET['status'] == "refunded"){
   $selectedStatus = $refunded;
}elseif(isset($_GET['status']) && $_GET['status'] == "partiallyrefunded"){
   $selectedStatus = $partiallyrefunded;
}elseif(isset($_GET['status']) && $_GET['status'] == "toorder"){
   $selectedStatus = $toorder;
}elseif(isset($_GET['status']) && $_GET['status'] == "processing"){
   $selectedStatus = $processing;
}elseif(isset($_GET['status']) && $_GET['status'] == "shipped"){
   $selectedStatus = $shipped;
}else{
   $selectedStatus = $allRecords;
}

// $orderDurationPeriod = date("M j, Y", strtotime("-30 day"));
                        

if(isset($_GET['search']))
{
    $search = $_GET['search'];
    switch ($search){
        case "today":
            $selectedDate = date("Y-m-d");
            foreach ($ordersStatus as $rkey => $orderStatus) {
                //if (substr($orderStatus['created_at'],0,-15) == $selectedDate && $orderStatus['fulfillment_status'] == 'fulfilled') {
                  if (substr($orderStatus['created_at'],0,-15) == $selectedDate) {
                    $selectedStatus[] = $orderStatus;
                  
                }
            }
            break;
        case "yesterday":
            $selectedDate = date("Y-m-d", strtotime("yesterday"));
            foreach ($ordersStatus as $rkey => $orderStatus) {
                  if (substr($orderStatus['created_at'],0,-15) == $selectedDate) {
                    $selectedStatus[] = $orderStatus;
                }
            }
            break;
        
        case "last7days":
            $fromDate = date("Y-m-d");
            $toDate = date("Y-m-d", strtotime("-7 day"));
            foreach ($ordersStatus as $rkey => $orderStatus) {
                if (substr($orderStatus['created_at'],0,-15) <= $fromDate && substr($orderStatus['created_at'],0,-15) >= $toDate) {
                    $selectedStatus[] = $orderStatus;
                }
            }
            break;
        case "last30days":
            $fromDate = date("Y-m-d");
            $toDate = date("Y-m-d", strtotime("-30 day"));
            foreach ($ordersStatus as $rkey => $orderStatus) {
                if (substr($orderStatus['created_at'],0,-15) <= $fromDate && substr($orderStatus['created_at'],0,-15) >= $toDate) {
                    $selectedStatus[] = $orderStatus;
                }
            }
            break;
        case "last90days":
            $fromDate = date("Y-m-d");
            $toDate = date("Y-m-d", strtotime("-90 day"));
            foreach ($ordersStatus as $rkey => $orderStatus) {
                if (substr($orderStatus['created_at'],0,-15) <= $fromDate && substr($orderStatus['created_at'],0,-15) >= $toDate) {
                    $selectedStatus[] = $orderStatus;
                }
            }
            break;
            
        default:
            echo "";
    }
}

if(isset($_GET['fromDate']) && $_GET['fromDate'] !== null && isset($_GET['toDate']) && $_GET['toDate'] !== null){
    $fromDate = date("Y-m-d", strtotime($_GET['fromDate']));
    $toDate =  date("Y-m-d", strtotime($_GET['toDate']));

    foreach ($ordersStatus as $rkey => $orderStatus) {
        if (substr($orderStatus['created_at'],0,-15) >= $fromDate && substr($orderStatus['created_at'],0,-15) <= $toDate) {
            $selectedStatus[] = $orderStatus;
        }
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/jquery.min.js"></script><link rel="stylesheet" href="css/sidenav_style.css" />
    <link rel="stylesheet" href="css/import_style1.css">
   <link rel="stylesheet" href="css/import_style2.css">
   <link rel="stylesheet" href="css/import_style3.css">
   <link rel="stylesheet" href="css/styles.css" />
   <link rel="stylesheet" href="css/owl.carousel.min.css" />
   <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="js/owl.carousel.js"></script>
   <script src="js/owl.navigation.js"></script>
  <script src="../js/shopify.js"></script>
   <script src="../js/moment.js"></script>
   <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://checkout.stripe.com/checkout.js"></script>

    <script>
		$(window).on("load", function() {
            $(".loader").fadeOut("slow");
        });
        
		$(document).ready(function() {
			$('.place_order_testing').show();
			
			$('.place_order_testing').on('click', function() {
                var ordernumber = $(this).data('order');
                var total = $(this).data('total');
				var line_id =$(this).data('line');

                var handler = StripeCheckout.configure({
				
                key: '<?php echo $stripe["publishable_key"] ?>',
                image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                locale: 'auto',
				
				
                token: function(token,amount) {
					var ord_num = ordernumber;
					var lines_id =line_id;
					var amt = (total*100) ;
					console.log(lines_id);
					
					
					
                    $.ajax({
                        url: 'charge.php',
                        type: 'post',
                        data: {
                            token: token.id,
                            email: token.email,
                            amount:   amt,
                        },
						
                        success: function(response) {
							alert(response);
                            if (response == "success") {
                                
                                var ord = ord_num;
								var line =lines_id;
								
								//console.log(line_ids);
                                // AJAX request
                                $.ajax({
                                    url: 'placeorder.php?ord_id=ord',
                                    type: 'post',
                                    data: {
                                        
                                        ord_id:  ord,
										line_ids : line
							
                                    },
                                    success: function(response) {
										alert(response);
										
								if (response == "success") {
                                            alert("Order Fullfilled successfully..");
                                            //$('#orderPlaced').modal();
                                            // window.location.href = "home.php";
                                        } else if(response == "fail2"){
                                            //alert("Order Fullfilled successfully..");
											alert("fail2 success");
                                        } else if(response == "fail3"){
                                            //alert("Order Fullfilled successfully..");
											alert("fail2 success");
                                        }
										
										else{
											alert("Not success");
											
										}
										
										
                                    }
                                });
                            } else {
                                alert('Request failed.');
                            }
                        }
                    });

                    
                }
            });
			
			// Open Checkout with further options:
								handler.open({
									name: 'ClickRipple',
									description: 'Payment Details',
									amount: total * 100,
									email: 'manoj@clickripple.com'
								});
            });
		});
    </script>
   <script>
      function filterOrdersBySelection(item){
         console.log($selectedStatus);
      }
      function showChecklistItems(item) {
         var itemType = item.getAttribute("data-trekkie-id");
         item.classList.add("open");
      }
      
      function hideChecklistItems(item) {
         var itemType = item.getAttribute("data-trekkie-id");
         item.classList.remove("open") ;
      }
      function showDropdownItems(item) {
         var itemType = item.getAttribute("data-trekkie-id");
         item.classList.add("open");
      }
      
      function hideDropdownItems(item) {
         var itemType = item.getAttribute("data-trekkie-id");
         item.classList.remove("open") ;
      }

      $(document).ready(function() {
          let selectedFromDate, selectedToDate, url;
          // $(".dropdown_toggle").dropdown(toggle);
          $("#datepicker").on("change",function(){
              selectedFromDate = $(this).val();

              url = "?fromDate="+selectedFromDate;
          });
          $("#datepicker2").on("change",function(){
              selectedToDate = $(this).val();

              if(url){
                  url = url.concat("&toDate="+selectedToDate);
                  $(location).attr('href',url);
              }
              //alert(selectedToDate);
          });
          //alert(url);
      });

      function displayCalendar(){
         // $( "#datepicker" ).mobiscroll().datepicker({
         //    calendarType: 'month',
         //    pages : 2
         // });
          $( "#datepicker" ).datepicker().show();
          $( "#datepicker2" ).datepicker().show();
      }
      function hideCalendar(){
          $( "#datepicker" ).datepicker().hide();
          $( "#datepicker2" ).datepicker().hide();
      }
   </script>
   <title>Product</title>
</head>

<body>

   <h1 id="testH1"></h1>
   <div id="app">
      <div id="clickripple-merchants" class="clickripple-merchants">
         <div class="page-layout explore">
            <div class="page-layout_nav">
               <div class="main-wrapper">
                  <nav class="wrapper">
                     <div class="nav">
                        <div class="logo">
                           <a href="#">
                              <img src="image/logo.png" alt="clickripple" />
                           </a>
                        </div>
                        <div class="scroll">
                           <ul class="pages">
                              <li class="nav-item">
                                 <a href="home.php">
                                    <span class="nav-item_icon">
                                       <svg class="icon-base">
                                          <use xlink:href="#icon-sidebar-home">
                                             <symbol id="icon-sidebar-home" viewBox="0 0 20 20">
                                                <path d="M16 10a3.97 3.97 0 0 1-2-.54 3.97 3.97 0 0 1-4 0 3.97 3.97 0 0 1-4 0A3.97 3.97 0 0 1 4 
                                                      10a4.1 4.1 0 0 1-1-.14V16a2 2 0 0 0 2 2h3v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4h3a2 2 0 0 0
                                                      2-2V9.86a3.94 3.94 0 0 1-1 .14zm-1.24-8H5.24a2 2 0 0 0-1.8 1.1L2 6a2 2 0 1 0 4 0 2 2 0
                                                      1 0 4 0 2 2 0 1 0 4 0 2 2 0 1 0 4 0l-1.45-2.9A2 2 0 0 0 14.76 2z" />
                                             </symbol>
                                          </use>
                                       </svg>
                                    </span>
                                    <span class="nav-item_title">Home</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="importproduct.php">
                                    <span class="nav-item_icon">
                                       <svg class="icon-base">
                                          <use xlink:href="#icon-sidebar-import-list">
                                             <symbol id="icon-sidebar-import-list" viewBox="0 0 20 20">
                                                <path d="M18 17a1 1 0 01-1 1H3a1 1 0 01-1-1v-3a1 1 0 112 0v2h12v-2a1 1 0 112 0v3zm-9-6.414V3a1 
                                                      1 0 112 0v7.586l2.293-2.293a.999.999 0 111.414 1.414l-3.984 3.983a.998.998 0 01-1.446 0L5.293 
                                                      9.707a.997.997 0 010-1.414.999.999 0 011.414 0L9 10.586z" />
                                             </symbol>
                                          </use>
                                       </svg>
                                    </span>
                                    <span class="nav-item_title">Import List</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="user_products.php">
                                    <span class="nav-item_icon">
                                       <svg class="icon-base">
                                          <use xlink:href="#icon-sidebar-products">
                                             <symbol id="icon-sidebar-products" viewBox="0 0 20 20">
                                                <path d="M10.983 7.022a2 2 0 1 1 3.999-.002 2 2 0 0 1-4 .002zm-.98-5c-.55-.003-1.633.613-2.02 1l-5 5c-1.73 1.729-.814 3.186 
                                                      0 4l5 5c.814.814 2.28 1.719 4 0l5.009-5c.386-.387 1.008-1.47 1.008-2.02v-4.98c0-1.981-1.026-3-3.025-3h-4.972z" />
                                             </symbol>
                                          </use>
                                       </svg>
                                    </span>
                                    <span class="nav-item_title">Products</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="order.php">
                                    <span class="nav-item_icon">
                                       <svg class="icon-base">
                                          <use xlink:href="#icon-sidebar-orders">
                                             <symbol id="icon-sidebar-orders" viewBox="0 0 20 20">
                                                <path d="M10 1a1 1 0 011 1v5.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L9 7.586V2a1 1 0 011-1z" />
                                                <path d="M6 3a1 1 0 00-1-1H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2h-1a1 1 0 100 2h1v8h-1.764a2 2 0 00-1.789 
                                                      1.106L12 14H8l-.447-.894A2 2 0 005.763 12H4V4h1a1 1 0 001-1z" />
                                             </symbol>
                                          </use>
                                       </svg>
                                    </span>
                                    <span class="nav-item_title">Orders</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="#">
                                    <span class="nav-item_icon">
                                       <svg class="icon-base">
                                          <use xlink:href="#icon-sidebar-notification">
                                             <symbol id="icon-sidebar-notification" viewBox="0 0 20 20">
                                                <path d="M9.7 18a2.99 2.99 0 0 0 2.82-2H6.9a2.99 2.99 0 0 0 2.82 2zm7.3-6a1 1 0 0 1-1-1V8A6 6 0 1 0 4 8v3a1
                                                      1 0 0 1-1 1 1 1 0 0 0 0 2h14a1 1 0 0 0 0-2z" />
                                             </symbol>
                                          </use>
                                       </svg>
                                    </span>
                                    <span class="nav-item_title">Notifications</span>
                                 </a>
                              </li>
                           </ul>
                           <ul class="sources">
                              <li class="nav-item nav-item-active">
                                 <a href="./user_index.php">
                                    <span class="nav-item_icon">
                                       <svg class="icon-base">
                                          <use xlink:href="#icon-sidebar-search">
                                             <symbol id="icon-sidebar-search" viewBox="0 0 20 20">
                                                <path d="M17.7 16.3l-3.1-3.11A6.94 6.94 0 0 0 16 9 6.96 6.96 0 0 0 4.05 4.05a6.96 6.96 0 0 0 0 9.9A6.96 6.96 0 0 0 9 16a6.94 6.94 0 0 0 4.19-1.4l3.1 3.1a1 1 0 0 0 1.42 0 1 1
                                                      0 0 0 0-1.4zm-5.16-3.76a4.97 4.97 0 0 1-7.07 0 4.97 4.97 0 0 1 0-7.08 4.96 4.96 0 0 1 7.07 0 4.97 4.97 0 0 1 0 7.08z" />
                                             </symbol>
                                          </use>
                                       </svg>
                                    </span>
                                    <span class="nav-item_title"> Find Products</span>
                                 </a>
                              </li>
                              <div class="sources_items"></div>
                           </ul>
                        </div>
                        <ul class="account">
                           <li class="nav-item">
                              <a href="#">
                                 <span class="nav-item_icon">
                                    <svg class="icon-base">
                                       <use xlink:href="#icon-sidebar-setting">
                                          <symbol id="icon-sidebar-setting" viewBox="0 0 20 20">
                                             <path d="M17.12 8.9l-1.26-.17a5.96 5.96 0 0 0-.82-1.98l.78-1a1 1 0 0
                                                   0-.08-1.32l-.17-.17a1 1 0 0 0-1.32-.08l-1 .78a5.95 5.95 0 0 0-1.98-.82l-.16-1.26a1 1 0 0 0-1-.88h-.23a1 1 0 0
                                                   0-.99.88l-.16 1.26a5.96 5.96 0 0 0-1.98.82l-1-.78a1 1 0 0 0-1.32.08l-.17.17a1 1 0 0 0-.08 1.32l.78 1a5.96 5.96 
                                                   0 0 0-.82 1.98l-1.26.16a1 1 0 0 0-.88 1v.23a1 1 0 0 0 .88.99l1.26.16c.15.71.43 1.38.82 1.98l-.78 1a1 1 0
                                                   0 0 .08 1.32l.17.17a1 1 0 0 0 1.32.08l1-.78a5.95 5.95 0 0 0 1.98.82l.16 1.26a1 1 0 0 0 1 .88h.23a1 1 0 
                                                   0 0 .99-.88l.16-1.26a5.96 5.96 0 0 0 1.98-.82l1 .78a1 1 0 0 0 1.32-.08l.17-.17a1 1 0 0 0
                                                   .08-1.32l-.78-1a5.95 5.95 0 0 0 .82-1.98l1.26-.16a1 1 0 0 0 .88-1v-.23a1 1 0 0 0-.88-.99zM10 13a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                          </symbol>
                                       </use>
                                    </svg>
                                 </span>
                                 <span class="nav-item_title">Settings</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#">
                                 <span class="nav-item_icon">
                                    <svg class="icon-base">
                                       <use xlink:href="#icon-sidebar-support">
                                          <symbol id="icon-sidebar-support" viewBox="0 0 20 20">
                                             <path d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm.7 12.74a1 1 0 0 1-.7.26c-.26 0-.5-.09-.69-.26A.94.94 0 0 1 9 14c0-.28.1-.52.3-.71a1.02 1.02 
                                                   0 0 1 1.41 0c.2.19.29.43.29.7 0 .31-.1.56-.3.75zm2.32-6.08c-.14.26-.3.49-.5.68l-.96.87a3.52 3.52 0 0 0-.28.28.94.94 0 
                                                   0 0-.13.19.94.94 0 0 0-.07.17l-.09.37c-.09.5-.42.78-.92.78a.93.93 0 0 1-.67-.26 1 1 0 0 1-.28-.75 2.32 2.32 0 0 
                                                   1 .6-1.6l.67-.63.5-.45c.09-.1.17-.2.22-.3a.6.6 0 0 0 .08-.3.72.72 0 0 0-.25-.55.95.95 0 0 0-.67-.24c-.33 0-.57.08-.71.23a2.1 
                                                   2.1 0 0 0-.43.81c-.2.67-.64.8-.97.8a.96.96 0 0 1-.72-.29.93.93 0 0 1-.28-.66c0-.4.12-.8.37-1.21.25-.4.62-.73 1.1-.99s1.02-.39 
                                                   1.64-.39c.57 0 1.09.11 1.53.33.46.21.81.52 1.06.9a2.25 2.25 0 0 1 .16 2.2z" />
                                          </symbol>
                                       </use>
                                    </svg>
                                 </span>
                                 <span class="nav-item_title">Help Center</span>
                                 <span class="nav-item_counter">
                                    <svg class="icon-base">
                                       <use xlink:href="#icon-sidebar-external-link">
                                          <symbol id="icon-sidebar-external-link" viewBox="0 0 20 20">
                                             <path fill-rule="nonzero" d="M14 12h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2v2H6v8h8v-2zm-1.414-6H11a1 1 0 
                                                   0 1 0-2h5v5a1 1 0 0 1-2 0V7.414l-3.793 3.793a1 1 0 1 1-1.414-1.414L12.586 6z" />
                                          </symbol>
                                       </use>
                                    </svg>
                                 </span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
            <div class="page-layout__contextual-header page-layout__contextual-header--mobile" style="display: none;">
               <div class="vue-portal-target"></div>
            </div>
            <div id="page-content" class="page-layout__content">
               <div class="page-layout__content-container">
                  <div class="page-layout__header">
                     <div class="page-layout__contextual-header page-layout__contextual-header--desktop" style="display: none;">
                        <div class="vue-portal-target"></div>
                     </div>
                     <div class="main-layout-header">
                        <div class="main-layout-header__title">
                           <!---->
                           <h2>Orders</h2>
                           <!---->
                        </div>
                        <div class="main-layout-header__middle">
                           <div class="main-layout-header__content">
                              <!---->
                           </div>
                           <div class="main-layout-header__actions">
                              <!---->
                              <!---->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="page-layout__body">
                     <!---->
                     <div class="page-layout__body-content">
                        <div data-v-538e13d8="" class="notification-messages" slot="notification-messages">
                           <!---->
                           <!---->
                        </div>
                        <div class="orders-page__banners">
                           <!---->
                           <!---->
                           <div class="feature-flag-ali-express-api"></div>
                           <!---->
                           <!---->
                           <!---->
                           <!---->
                        </div>
                        <div class="orders-filter orders-page__filters">
                           <div class="orders-filter__container">
                              <div class="input-block orders-filter__keyword-input" id="orders-filter-keyword" placeholder="Enter Keywords" value="">
                                 <div class="input-field input-field--no-value" placeholder="Enter Keywords">
                                    <!----> <input placeholder="Enter Keywords" id="orders-filter-keyword" type="text" class="form-control">
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                 </div>
                                 <!---->
                                 <!---->
                              </div>
                              <button type="submit" class="orders-filter__keyword-button btn btn-basic btn-lg">
                                 <!---->
                                 <!----> <span class="btn-title">
                                    Filter
                                 </span>
                                 <!---->
                              </button>
                              <div data-trekkie-id="popover" class="popover double-date-picker orders-filter__datepicker-wide" onmouseover="showChecklistItems(this)" onmouseout="hideChecklistItems(this)">
                                 <span class="popover-wrapper">
                                    <button type="button" class="double-date-picker__toggle btn btn-basic btn-regular btn-dropdown">

                                            <span class="btn-title">
                                                <div onmouseenter="displayCalendar()" onmouseout="hideCalendar()">
                                                    <?php echo date("M j, Y", strtotime("-30 day"))."-"; ?><?php echo date("M j, Y")?>
                                                </div>
                                            </span>

                                             <span class="btn-icon-wrap">
                                                <svg class="icon-base">
                                                   <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-down"></use>
                                                </svg>
                                             </span>
                                    </button>
                                 </span>

                                 <div class="popover-body popover-body-right">
                                    <div class="double-date-picker__body">
                                        
                                             <div style="display: flex;width:auto;">
                                                      <div id="datepicker" onmouseover="displayCalendar()">
                                                            <h4 style="text-align: center;">From</h4>
                                                      </div>
                                                      <div id="datepicker2" onmouseover="displayCalendar()" style="display: block" >
                                                            <h4 style="text-align: center;">To</h4>
                                                      </div>
                                             </div>

                                             <div>
                                             <a href="?search=today" style="width: 100%; height: auto;color: #000000; background-color: #f6f6f9; text-align: center;padding: 5px 10px;">Today</a><br>
                                              <a href="?search=yesterday" style="width: 100%; height: auto;color: #000000; background-color: #f6f6f9;text-align: center;padding: 5px 10px;">Yesterday</a><br>
                                              <a href="?search=last7days" style="width: 100%; height: auto;color: #000000; background-color: #f6f6f9;text-align: center;padding: 5px 10px;">Last 7 days</a><br>
                                              <a href="?search=last30days" style="width: 100%; height: auto;color: #000000; background-color: #f6f6f9;text-align: center;padding: 5px 10px;">Last 30 days</a><br>
                                              <a href="?search=last90days" style="width: 100%; height: auto;color: #000000; background-color: #f6f6f9;text-align: center;padding: 5px 10px;">Last 90 days</a><br>
                                              <a style="width: 100%; height: auto;color: #000000; background-color: #f6f6f9;text-align: center;padding: 5px 10px;">Custom Range</a><br>
                                             </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                                
                           <div class="orders-filter__container">
                              <div class="orders-filter__list">
                                 <div data-trekkie-id="popover:orders-filter-list-filter-fulfillment" onmouseover="showChecklistItems(this)" onmouseout="hideChecklistItems(this)" class="popover orders-filter__item js-testing-fulfillment">
                                    <span class="popover-wrapper">
                                       <button type="button" class="btn btn-basic btn-regular btn-dropdown">
                                          <!---->
                                          <!----> <span class="btn-title">
                                             Fulfillment Status: <span>All</span></span>
                                          <span class="btn-icon-wrap">
                                             <!-- <svg class="icon-base">
                                                   <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-down"></use>
                                                </svg> -->
                                          </span>
                                       </button>
                                    </span>
                                    <div class="popover-body popover-body-left">
                                       <ul class="orders-filter__dropdown">
                                          <li tabindex="-1">
                                          <a href="?status=fulfilled"><label>
                                                <!-- <input type="checkbox" class="fulfillmentDropdown" name="ids" value="Fulfilled" > -->
                                                 <span>Fulfilled</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href="?status=Unfulfilled"><label>
                                                 <!-- <input type="checkbox" class="fulfillmentDropdown" name="ids" value="Unfulfilled"> -->
                                                 <span>Unfulfilled</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href = "?status=partiallyfulfilled"><label>
                                                <!-- <input type="checkbox" class="fulfillmentDropdown" name="ids" value="Partially fulfilled"> -->
                                                 <span>Partially fulfilled</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div data-trekkie-id="popover:orders-filter-list-filter-financial" onmouseover="showChecklistItems(this)" onmouseout="hideChecklistItems(this)" class="popover orders-filter__item js-testing-financial">
                                    <span class="popover-wrapper">
                                       <button type="button" class="btn btn-basic btn-regular btn-dropdown">
                                          <!---->
                                          <!----> <span class="btn-title">
                                             Financial Status: <span>All</span></span>
                                          <span class="btn-icon-wrap">
                                             <svg class="icon-base">
                                                <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-down"></use>
                                             </svg>
                                          </span>
                                       </button>
                                    </span>
                                    <div class="popover-body popover-body-left">
                                       <ul class="orders-filter__dropdown">
                                          <li tabindex="-1">
                                          <a href="?status=authorized"><label>
                                                <!-- <input type="checkbox"> -->
                                                <!----> <span>Authorized</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href="?status=paid"><label>
                                                <!-- <input type="checkbox"> -->
                                                 <span>Paid</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href="?status=partiallypaid"><label>
                                                <!-- <input type="checkbox"> -->
                                                 <span>Partially paid</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href="?status=refunded"><label>
                                                <!-- <input type="checkbox"> -->
                                                 <span>Refunded</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href="?status=partiallyrefunded"><label>
                                                <!-- <input type="checkbox"> -->
                                                 <span>Partially refunded</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>

                                 <div data-trekkie-id="popover:orders-filter-list-filter-states" onmouseover="showChecklistItems(this)" onmouseout="hideChecklistItems(this)" class="popover orders-filter__item js-testing-states">
                                    <span class="popover-wrapper">
                                       <button type="button" class="btn btn-basic btn-regular btn-dropdown">
                                          <!---->
                                          <!----> <span class="btn-title">
                                             Order Status: <span>All</span></span>
                                          <span class="btn-icon-wrap">
                                             <svg class="icon-base">
                                                <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-down"></use>
                                             </svg>
                                          </span>
                                       </button>
                                    </span>
                                    <div class="popover-body popover-body-left">
                                       <ul class="orders-filter__dropdown">
                                          <li tabindex="-1">
                                          <a href="?status=Toorder"><label>
                                                <!-- <input type="checkbox"> -->
                                                <!----> <span>To Order</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href="?status=Inprocessing"> <label>
                                                <!-- <input type="checkbox"> -->
                                                <!----> <span>In Processing</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label></a>
                                          </li>
                                          <li tabindex="-1">
                                          <a href="?status=Shipped"><label>
                                                <!-- <input type="checkbox"> -->
                                                <!----> <span>Shipped</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                </span>
                                             </label><a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <!---->
                              </div>
                           </div>
                        </div>
                        <div class="orders-page__bulk-actions">
                           <!---->
                           <div class="orders-page__bulk-actions-container">
                              <button type="button" class="btn btn-basic btn-regular">
                                 <!---->
                                 <!----> <span class="btn-title">
                                    Export
                                 </span>
                                 <!---->
                              </button>
                              <div class="feature-flag-ali-express-api"></div>
                           </div>
                        </div>

                        <?php
                              
                                foreach ($selectedStatus as $row1){
                        ?>

                           <div class="order">
                              <div class="panel">
                                 <div data-v-3f2546ba="" class="order-header panel-body">
                                    <div data-v-3f2546ba="" class="order-header__statuses">
                                       <!---->
                                       <div data-v-55495210="" data-v-3f2546ba="" class="order-flag">
                                          <span data-v-55495210="">
                                             <svg data-v-55495210="" class="icon-base color-info-dark">
                                                <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark-o"></use>
                                             </svg>
                                          </span>
                                          <ul data-v-55495210="">
                                             <li data-v-55495210="">
                                                <button data-v-55495210="" type="button" class="btn btn-basic btn-sm active">
                                                   <!---->
                                                   <!---->
                                                   <span class="btn-title">
                                                      <svg data-v-55495210="" class="icon-base color-info-dark">
                                                         <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark-o"></use>
                                                      </svg>
                                                   </span>
                                                   <!---->
                                                </button>
                                             </li>
                                             <li data-v-55495210="">
                                                <button data-v-55495210="" type="button" class="btn btn-basic btn-sm">
                                                   <!---->
                                                   <!---->
                                                   <span class="btn-title">
                                                      <svg data-v-55495210="" class="icon-base color-info">
                                                         <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                      </svg>
                                                   </span>
                                                   <!---->
                                                </button>
                                             </li>
                                             <li data-v-55495210="">
                                                <button data-v-55495210="" type="button" class="btn btn-basic btn-sm">
                                                   <!---->
                                                   <!---->
                                                   <span class="btn-title">
                                                      <svg data-v-55495210="" class="icon-base color-primary">
                                                         <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                      </svg>
                                                   </span>
                                                   <!---->
                                                </button>
                                             </li>
                                             <li data-v-55495210="">
                                                <button data-v-55495210="" type="button" class="btn btn-basic btn-sm">
                                                   <!---->
                                                   <!---->
                                                   <span class="btn-title">
                                                      <svg data-v-55495210="" class="icon-base color-success">
                                                         <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                      </svg>
                                                   </span>
                                                   <!---->
                                                </button>
                                             </li>
                                             <li data-v-55495210="">
                                                <button data-v-55495210="" type="button" class="btn btn-basic btn-sm">
                                                   <!---->
                                                   <!---->
                                                   <span class="btn-title">
                                                      <svg data-v-55495210="" class="icon-base color-warning">
                                                         <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                      </svg>
                                                   </span>
                                                   <!---->
                                                </button>
                                             </li>
                                             <li data-v-55495210="">
                                                <button data-v-55495210="" type="button" class="btn btn-basic btn-sm">
                                                   <!---->
                                                   <!---->
                                                   <span class="btn-title">
                                                      <svg data-v-55495210="" class="icon-base color-danger">
                                                         <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                      </svg>
                                                   </span>
                                                   <!---->
                                                </button>
                                             </li>
                                          </ul>
                                       </div>
                                       <img data-v-3f2546ba="" src="https://cdn.oberlo.com/img/shop-icon-shopify.svg" alt="Shopify Logo" class="order-header__logo">
                                       <div data-v-3f2546ba="" class="order-header__order"><a data-v-3f2546ba="" target="_blank" href="https://clickrippleappfurniture.myshopify.com/admin/orders/3129308545211">
                                             <?php echo $row1['id'];  //echo $row1['orderID'] ?>
                                          </a>
                                          <?php echo $row1['created_at'] ?>
                                       </div>
                                    </div>
                                    <div data-v-3f2546ba="" class="order-header__order-status">
                                       <div data-v-147e2c88="" data-v-3f2546ba="" class="order-status"><span data-v-147e2c88="" class="badge badge-default">
                                       <?php echo $row1['fulfillment_status']?>
                                          </span> <span data-v-147e2c88="" class="badge badge-default">
                                          <?php echo $row1['financial_status']?>
                                          </span>
                                       </div>
                                       <!---->
                                    </div>
                                    <div data-v-3f2546ba="" class="order-header__customer">
                                       <span data-v-3f2546ba="">
                                       Customer:<?php if(isset($row1['customer'])){echo $row1['customer']['first_name'];} ?>
                                       </span> <a data-v-3f2546ba="" href="#">
                                       </a>
                                       <!---->
                                    </div>
                                 </div>
                                 <div class="order__banners">
                                    <!---->
                                    <!---->
                                    <!---->
                                 </div>
                                 <div data-v-3651c292="" class="order-body panel-body">
                                    <!---->
                                    <div data-v-26db1937="" data-v-3651c292="" class="order-supplier">
                                       <div data-v-26db1937="" class="order-supplier__wrapper">
                                          <div data-v-26db1937="" class="order-supplier__column order-supplier__state">
                                             <!---->
                                             <div data-v-26db1937="" class="container-flex">
                                                <!----> <span class="badge badge-warning">
                                                   To Order
                                                </span>
                                             </div>
                                          </div>
                                          <div data-v-26db1937="" class="order-supplier__column order-supplier__name">
                                             <div data-v-26db1937="" class="order-supplier__icon ali-supplier"></div>
                                             <a data-v-26db1937="" href="" target="_blank" class="-margin-left-xs">
                                                <div data-v-26db1937="" class="blue-color"> ClickRipple Furniture</div>
                                             </a>
                                          </div>
                                          <!---->
                                          <!---->
                                          <div data-v-26db1937="" class="order-supplier__column order-supplier__actions">
                                          <div data-v-26db1937="" data-trekkie-id="dropdown"  onmouseover="showDropdownItems(this)" onmouseout="hideDropdownItems(this)" class="popover dropdown order-more-actions order-supplier__action order-supplier__action--desktop order-more-actions--more-actions" suppliers-source="[object Object]">
                                               <span class="popover-wrapper">
                                                   <button type="button" class="dropdown__toggle btn btn-basic btn-regular btn-dropdown" tabindex="0">
                                                      <!---->
                                                      <!---->
                                                      <span class="btn-title">
                                                         <div>
                                                            <div data-v-500dbcaf="" class="ellipsis-btn ellipsis-btn"><span data-v-500dbcaf="" class="dot"></span> <span data-v-500dbcaf="" class="dot"></span> <span data-v-500dbcaf="" class="dot"></span></div>
                                                            <div class="title">
                                                               <div class="desktop-title">
                                                                  Actions
                                                               </div>
                                                               <div class="mobile-title">
                                                                  Actions
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </span>
                                                      <span class="btn-icon-wrap">
                                                         <svg class="icon-base">
                                                            <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-down"></use>
                                                         </svg>
                                                      </span>
                                                   </button>
                                                </span>
                                                <div class="popover-body popover-body-right">
                                                   <ul class="dropdown__list">
                                                      <li tabindex="-1">
                                                         <button type="button" class="btn btn-basic btn-regular btn-block" tabindex="0">
                                                            <!---->
                                                            <!----> <span class="btn-title"><span>Add CR order number</span></span>
                                                            <!---->
                                                         </button>
                                                      </li>
                                                      <li tabindex="-1">
                                                         <button type="button" class="btn btn-basic btn-regular btn-block" tabindex="0">
                                                            <!---->
                                                            <!----> <span class="btn-title"><span>Mark as shipped</span></span>
                                                            <!---->
                                                         </button>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div data-v-26db1937="" data-trekkie-id="dropdown" class="popover dropdown order-more-actions order-supplier__action order-supplier__action--mobile order-more-actions--more-actions" suppliers-source="[object Object]">
                                                <span class="popover-wrapper">
                                                   <button type="button" class="dropdown__toggle btn btn-basic btn-regular btn-dropdown" tabindex="0">
                                                      <!---->
                                                      <!---->
                                                      <span class="btn-title">
                                                         <div>
                                                            <div data-v-500dbcaf="" class="ellipsis-btn ellipsis-btn"><span data-v-500dbcaf="" class="dot"></span> <span data-v-500dbcaf="" class="dot"></span> <span data-v-500dbcaf="" class="dot"></span></div>
                                                            <div class="title">
                                                               <div class="desktop-title">
                                                                  Actions
                                                               </div>
                                                               <div class="mobile-title">
                                                                  Actions
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </span>
                                                      <span class="btn-icon-wrap">
                                                         <svg class="icon-base">
                                                            <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-down"></use>
                                                         </svg>
                                                      </span>
                                                   </button>
                                                </span>
                                                <div class="popover-body popover-body-right">
                                                   <ul class="dropdown__list">
                                                      <li tabindex="-1">
                                                         <button type="button" class="btn btn-basic btn-regular btn-block" tabindex="0">
                                                            <!---->
                                                            <!----> <span class="btn-title"><span>Add CR order number</span></span>
                                                            <!---->
                                                         </button>
                                                      </li>
                                                      <li tabindex="-1">
                                                         <button type="button" class="btn btn-basic btn-regular btn-block" tabindex="0">
                                                            <!---->
                                                            <!----> <span class="btn-title"><span>Mark as shipped</span></span>
                                                            <!---->
                                                         </button>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <!---->
                                             <!---->
                                             <!---->
                                             <!---->
                                             <!---->
                                          </div>
                                       </div>
                                    </div>
                                    <div data-v-85c95172="" data-v-3651c292="" class="order-items">
                                       <div data-v-85c95172="" class="order-items__block">
                                          <!---->
                                          <div data-v-85c95172="" class="order-item order-items__item">
                                             <div class="order-item__image"><img src="" alt="" class="order-thumbnail"></div>
                                             <div class="order-item__meta order-item__meta-span">
                                                <a href="<!--https://app.oberlo.com/product-sources/459/products/33012648882-->" target="_blank">
                                                </a>
                                                <h3><?php if(isset($row1['customer'])){echo $row1['customer']['first_name'];} ?></h3>
                                                <span>
                                                   <br></span>
                                                <!---->
                                             </div>
                                             <div class="order-item__price order-item__price--full-width">
                                                <?php echo $row1['line_items'][0]['quantity'] ?> x <?php echo $row1['total_price'] ?> CAD
                                             </div>
                                             <!---->
                                             <div class="order-item__last">
                                                <!---->
                                                <!---->
                                                <!---->
                                             </div>
                                          </div>
                                          <!---->
                                          <!---->
                                       </div>
                                       <!---->
                                    </div>
                                 </div>
                                 <div data-v-fb5dde7a="" class="order-note-line">
                                    <div data-v-fb5dde7a="" class="order-note-line__description">
                                    </div>
                                    <div data-v-fb5dde7a="" class="">
                                       <button data-v-fb5dde7a="" type="button" class="btn btn-basic btn-sm place_order_testing" data-order="<?php echo $row1['id']; ?>" data-total="<?php echo $row1['line_items'][0]['price']; ?>" data-line=" <?php echo $row1['line_items'][0]['id'];?>"> <!--id="place_order"-->
                                         
                                          Pay
                                         
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                        
                        
                        <div class="pagination-wrapper" style="display: none;">
                           <ul class="pagination">
                              <li>
                                 <button type="button" disabled="disabled" class="btn btn-basic btn-regular btn-no-text">
                                    <!---->
                                    <span class="btn-icon-wrap">
                                       <svg class="icon-base">
                                          <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-left"></use>
                                       </svg>
                                    </span>
                                    <!---->
                                    <!---->
                                 </button>
                              </li>
                              <!---->
                              <li>
                                 <button type="button" class="btn btn-basic btn-regular active">
                                    <!---->
                                    <!----> <span class="btn-title">
                                       1
                                    </span>
                                    <!---->
                                 </button>
                              </li>
                              <!---->
                              <li>
                                 <button type="button" disabled="disabled" class="btn btn-basic btn-regular btn-no-text">
                                    <!---->
                                    <span class="btn-icon-wrap">
                                       <svg class="icon-base">
                                          <use xlink:href="/images/icons.svg?v=2.10.3#icon-small-arrow-right"></use>
                                       </svg>
                                    </span>
                                    <!---->
                                    <!---->
                                 </button>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="page-layout__footer" style="display: none;"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
</html>
