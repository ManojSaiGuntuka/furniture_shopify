
<?php

  include "./userFunctions.php";

  $UF = new UserFunctions();

  $data = $UF->getFullOrders();

  //$costs = $UF->getCosts();
  //print_r($data['response']);

  $json = json_decode($data['response'], 1);

  $orders = $json['orders'];

  $earnings = array();
  $earnings2 = array();

  $from = null;
  $to = null;

  if(isset($_POST["showRecords"])){

    $from = $_POST['from'];
    $to = $_POST['to'];

    header("location: totalSale.php?from=".$from."&to=".$to);

  }



  if(!(isset($_GET["from"]) && isset($_GET["to"]))){

    foreach ($orders as $order){

      $myOrders[] = $order;
      $myOrdersTotalPrice[] = $order["total_price"];
      $cost = $UF->getProfitForProduct($order['line_items'][0]['product_id']);;
      
      if(sizeof($cost) > 0){

        $newCost = $order['total_price'] - $cost[0]['cost'];

      }else{

        $newCost = $order['total_price'];

      }
      $myOrdersTotalCost[] = $newCost;

      $date = strtotime($order['created_at']);
      array_push($earnings, array("x" => intval($date*1000), "y" => floatval($order['total_price'])));
  
      }

    foreach ($orders as $order){
  
        $date = strtotime($order['created_at']);
        
        if(sizeof($UF->getProfitForProduct($order['line_items'][0]['product_id'])) > 0){

          $cost = $UF->getProfitForProduct($order['line_items'][0]['product_id'])[0]['cost'];

        }else{

          $cost = 0;

        }
        
        array_push($earnings2, array("x" => intval($date*1000), "y" => floatval($order['total_price'] - $cost )));
  
      }
      
    }
    //print_r(array_sum($myOrdersTotalPrice));
    //print_r(array_sum($myOrdersTotalCost));

  if(isset($_GET["from"]) && isset($_GET["to"])){
    
    $from = $_GET["from"];
    $to = $_GET["to"];
  }

  foreach ($orders as $order){

    if($from != "" && $to !=""){
      
      if($order['created_at'] >= $from && $order['created_at'] <= $to){
        
        $myOrders[] = $order;
        $myOrdersTotalPrice[] = $order["total_price"];
        $cost = $UF->getProfitForProduct($order['line_items'][0]['product_id']);;
      
        if(sizeof($cost) > 0){

        $newCost = $order['total_price'] - $cost[0]['cost'];

        }else{

          $newCost = $order['total_price'];

        }
        $myOrdersTotalCost[] = $newCost;

        $paidOrder[] = $order;
        $date = strtotime($order['created_at']);
        array_push($earnings, array("x" => intval($date*1000), "y" => floatval($order['total_price'])));

      }

    }

  }

  foreach ($orders as $order){

    if($from != "" && $to !=""){
      
      if($order['created_at'] >= $from && $order['created_at'] <= $to){
        $date = strtotime($order['created_at']);
        
        if(sizeof($UF->getProfitForProduct($order['line_items'][0]['product_id'])) > 0){

          $cost = $UF->getProfitForProduct($order['line_items'][0]['product_id'])[0]['cost'];

        }else{

          $cost = 0;

        }
        
        array_push($earnings2, array("x" => intval($date*1000), "y" => floatval($order['total_price'] - $cost )));

      }

    }

  }

  if(isset($myOrders)){

    foreach($myOrders as $myOrder){

      if($myOrder['financial_status'] == "paid" && $myOrder['fulfillment_status'] == ""){

        $toOrder[] = $myOrder;

      }

    }

  }

  /*foreach ($orders as $order){

    if($from != "" && $to !=""){

      if($order['created_at'] >= $from && $order['created_at'] <= $to){

        $date = strtotime($order['created_at']);
        array_push($earnings2, array("x" => intval($date*1000), "y" => floatval($order['total_price_usd'])));

      }

    }

  }*/

  if(isset($_POST['logout'])){

      session_destroy();
      header("Location: ../users_login.php");

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css?v=1.1" />
    <link rel="stylesheet" href="css/styles.css" />

    <link rel="stylesheet" href="css/skin.css" />
    <link rel="stylesheet" href="css/owl/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl/owl.theme.default.min.css" />
    <script src="js/owl.carousel.js"></script>
    <script src="js/owl.navigation.js"></script>
    <script type="text/javascript" src="js/canvasjs.min.js"></script>
    <script type="text/javascript" src="js/utlis.js"></script>  
    <title>Dashboard</title>
  
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td{
          padding:10px;
      }
    </style>

  </head>

  <body>
    <div id="app">
      <div id="clickripple-merchants" class="clickripple-merchants">
        <div class="page-layout dashboard">
          <div class="page-layout_nav">
            <div class="main-wrapper">
              <nav class="wrapper">
                <div class="nav">
                  <div class="logo">
                    <a href="#">
                      <img src="image/logo.png" alt="clickripple" />
                    </a>
                    <form method="POST"> <input type="submit" value="Logout" name="logout"></form>
                  </div>
                  <div class="scroll">
                    <ul class="pages">
                      <li class="nav-item">
                        <a href="./totalSale.php">
                          <span class="nav-item_icon">
                            <svg class="icon-base">
                              <use xlink:href="#icon-sidebar-home">
                                <symbol
                                  id="icon-sidebar-home"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M16 10a3.97 3.97 0 0 1-2-.54 3.97 3.97 0 0 1-4 0 3.97 3.97 0 0 1-4 0A3.97 3.97 0 0 1 4 
                                      10a4.1 4.1 0 0 1-1-.14V16a2 2 0 0 0 2 2h3v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4h3a2 2 0 0 0
                                       2-2V9.86a3.94 3.94 0 0 1-1 .14zm-1.24-8H5.24a2 2 0 0 0-1.8 1.1L2 6a2 2 0 1 0 4 0 2 2 0
                                        1 0 4 0 2 2 0 1 0 4 0 2 2 0 1 0 4 0l-1.45-2.9A2 2 0 0 0 14.76 2z"
                                  />
                                </symbol>
                              </use>
                            </svg>
                          </span>
                          
                          <span class="nav-item_title">Home</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./importproduct.php">
                          <span class="nav-item_icon">
                            <svg class="icon-base">
                              <use xlink:href="#icon-sidebar-import-list">
                                <symbol
                                  id="icon-sidebar-import-list"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M18 17a1 1 0 01-1 1H3a1 1 0 01-1-1v-3a1 1 0 112 0v2h12v-2a1 1 0 112 0v3zm-9-6.414V3a1 
                                  1 0 112 0v7.586l2.293-2.293a.999.999 0 111.414 1.414l-3.984 3.983a.998.998 0 01-1.446 0L5.293 
                                  9.707a.997.997 0 010-1.414.999.999 0 011.414 0L9 10.586z"
                                  />
                                </symbol>
                              </use>
                            </svg>
                          </span>
                          <span class="nav-item_title">Import List</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./user_products.php">
                          <span class="nav-item_icon">
                            <svg class="icon-base">
                              <use xlink:href="#icon-sidebar-products">
                                <symbol
                                  id="icon-sidebar-products"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M10.983 7.022a2 2 0 1 1 3.999-.002 2 2 0 0 1-4 .002zm-.98-5c-.55-.003-1.633.613-2.02 1l-5 5c-1.73 1.729-.814 3.186 
                                  0 4l5 5c.814.814 2.28 1.719 4 0l5.009-5c.386-.387 1.008-1.47 1.008-2.02v-4.98c0-1.981-1.026-3-3.025-3h-4.972z"
                                  />
                                </symbol>
                              </use>
                            </svg>
                          </span>
                          <span class="nav-item_title">Products</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./order.php">
                          <span class="nav-item_icon">
                            <svg class="icon-base">
                              <use xlink:href="#icon-sidebar-orders">
                                <symbol
                                  id="icon-sidebar-orders"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M10 1a1 1 0 011 1v5.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L9 7.586V2a1 1 0 011-1z"
                                  />
                                  <path
                                    d="M6 3a1 1 0 00-1-1H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2h-1a1 1 0 100 2h1v8h-1.764a2 2 0 00-1.789 
                                1.106L12 14H8l-.447-.894A2 2 0 005.763 12H4V4h1a1 1 0 001-1z"
                                  />
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
                                <symbol
                                  id="icon-sidebar-notification"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M9.7 18a2.99 2.99 0 0 0 2.82-2H6.9a2.99 2.99 0 0 0 2.82 2zm7.3-6a1 1 0 0 1-1-1V8A6 6 0 1 0 4 8v3a1
                                   1 0 0 1-1 1 1 1 0 0 0 0 2h14a1 1 0 0 0 0-2z"
                                  />
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
                                <symbol
                                  id="icon-sidebar-search"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M17.7 16.3l-3.1-3.11A6.94 6.94 0 0 0 16 9 6.96 6.96 0 0 0 4.05 4.05a6.96 6.96 0 0 0 0 9.9A6.96 6.96 0 0 0 9 16a6.94 6.94 0 0 0 4.19-1.4l3.1 3.1a1 1 0 0 0 1.42 0 1 1
                                   0 0 0 0-1.4zm-5.16-3.76a4.97 4.97 0 0 1-7.07 0 4.97 4.97 0 0 1 0-7.08 4.96 4.96 0 0 1 7.07 0 4.97 4.97 0 0 1 0 7.08z"
                                  />
                                </symbol>
                              </use>
                            </svg>
                          </span>
                          <span class="nav-item_title">Products</span>
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
                              <symbol
                                id="icon-sidebar-setting"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  d="M17.12 8.9l-1.26-.17a5.96 5.96 0 0 0-.82-1.98l.78-1a1 1 0 0
                                 0-.08-1.32l-.17-.17a1 1 0 0 0-1.32-.08l-1 .78a5.95 5.95 0 0 0-1.98-.82l-.16-1.26a1 1 0 0 0-1-.88h-.23a1 1 0 0
                                  0-.99.88l-.16 1.26a5.96 5.96 0 0 0-1.98.82l-1-.78a1 1 0 0 0-1.32.08l-.17.17a1 1 0 0 0-.08 1.32l.78 1a5.96 5.96 
                                  0 0 0-.82 1.98l-1.26.16a1 1 0 0 0-.88 1v.23a1 1 0 0 0 .88.99l1.26.16c.15.71.43 1.38.82 1.98l-.78 1a1 1 0
                                   0 0 .08 1.32l.17.17a1 1 0 0 0 1.32.08l1-.78a5.95 5.95 0 0 0 1.98.82l.16 1.26a1 1 0 0 0 1 .88h.23a1 1 0 
                                   0 0 .99-.88l.16-1.26a5.96 5.96 0 0 0 1.98-.82l1 .78a1 1 0 0 0 1.32-.08l.17-.17a1 1 0 0 0
                                    .08-1.32l-.78-1a5.95 5.95 0 0 0 .82-1.98l1.26-.16a1 1 0 0 0 .88-1v-.23a1 1 0 0 0-.88-.99zM10 13a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
                                />
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
                              <symbol
                                id="icon-sidebar-support"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm.7 12.74a1 1 0 0 1-.7.26c-.26 0-.5-.09-.69-.26A.94.94 0 0 1 9 14c0-.28.1-.52.3-.71a1.02 1.02 
                                0 0 1 1.41 0c.2.19.29.43.29.7 0 .31-.1.56-.3.75zm2.32-6.08c-.14.26-.3.49-.5.68l-.96.87a3.52 3.52 0 0 0-.28.28.94.94 0 
                                0 0-.13.19.94.94 0 0 0-.07.17l-.09.37c-.09.5-.42.78-.92.78a.93.93 0 0 1-.67-.26 1 1 0 0 1-.28-.75 2.32 2.32 0 0 
                                1 .6-1.6l.67-.63.5-.45c.09-.1.17-.2.22-.3a.6.6 0 0 0 .08-.3.72.72 0 0 0-.25-.55.95.95 0 0 0-.67-.24c-.33 0-.57.08-.71.23a2.1 
                                2.1 0 0 0-.43.81c-.2.67-.64.8-.97.8a.96.96 0 0 1-.72-.29.93.93 0 0 1-.28-.66c0-.4.12-.8.37-1.21.25-.4.62-.73 1.1-.99s1.02-.39 
                                1.64-.39c.57 0 1.09.11 1.53.33.46.21.81.52 1.06.9a2.25 2.25 0 0 1 .16 2.2z"
                                />
                              </symbol>
                            </use>
                          </svg>
                        </span>
                        <span class="nav-item_title">Help Center</span>
                        <span class="nav-item_counter">
                          <svg class="icon-base">
                            <use xlink:href="#icon-sidebar-external-link">
                              <symbol
                                id="icon-sidebar-external-link"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="nonzero"
                                  d="M14 12h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2v2H6v8h8v-2zm-1.414-6H11a1 1 0 
                                0 1 0-2h5v5a1 1 0 0 1-2 0V7.414l-3.793 3.793a1 1 0 1 1-1.414-1.414L12.586 6z"
                                />
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
          <div id="page-content" class="page-layout_content">
            <div class="page-layout_content-container">
              <div class="page-layout_header">
                <div class="main-layout-header">
                  <div class="main-layout-header_title">
                    <!----->
                    <h2>Home</h2>
                    <!----->
                  </div>
                  <div class="main-layout-header_middle">
                    <div class="main-layout-header_content">
                      <!---->
                    </div>
                    <div class="main-layout-header_actions">
                      <!------>
                    </div>
                  </div>
                  <div class="main-layout-header_end">
                    <div class="main-layout-header_account-menu">
                      <div class="account-menu-wrapper">
                        <div
                          id="clickrippleAccountMenuContainer"
                          class="AccountMenu_AccountMenu"
                        >
                          <div class="MenuHeader_Header">
                            <button class="Toggle_Toggle">
                              <div class="Toggle_PersoanlInfo">
                                <span class="Avatar_Conatiner">
                                  <span class="Avatar_Avatar">R</span>
                                </span>
                              </div>
                              <span class="Toggle_UserInfo">
                                <span class="Toggle_storeName">Account</span>
                                <span class="Toggle_FirstName">
                                  <span>rawat.manish416@</span>
                                  <svg class="Toggle_Arrow"></svg>
                                </span>
                              </span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="page-layout_body">
                <div class="page-layout_body-content">
                  <div
                    class="notification-messages"
                    slot="notification-messages"
                  >
                    <!---->
                    <!---->
                  </div>

                  <div>
                    <div class="dashboard_grid">
                      <div class="dashboard-filter dashboard_sales-filter">
                        <h4 class="dashboard-filter_title">Total Sales</h4>
                        <div
                          class="popover double-date-picker dashboard-filter_datepicker-wide"
                        >
                          <span class="popover-wrapper">
                            <button
                              class="double-date-picker_toggle btn btn-basic btn-regular btn-dropdown"
                              type="button"
                            >
                               &nbsp;
                              <form method="post">
                              From : 
                                <input type="date" name="from"><br/><br/>
                              To  : 
                              <input type="date" name="to"><br/><br/>
                              <input type="submit" value="Show Records" name="showRecords"/>
                            </form>
                              <span class="btn-icon-wrap">
                                
                                  <use xlink:href="#icon-small-arrow-down">
                                    <symbol
                                      id="icon-small-arrow-down"
                                      viewBox="0 0 20 20"
                                    >
                                      <path
                                        d="M13.7 8.3a1 1 0 0 0-1.4 0L10 10.58l-2.3-2.3A1 1 0 1 0 6.3 9.7l3 3a1 1 0 0 0 1.4 0l3-3a1 1 0 0 0 0-1.42z"
                                      />
                                    </symbol>
                                  </use>
                                </svg>
                              </span>
                            </button>
                          </span>
                          <div class="popover-body popover-body-right">
                            <div class="double-date-picker_body">
                              <div class="double-date-picker_container">
                                <div class="double-date-picker_calendars">
                                  <div
                                    class="flatpickr-calendar rangeMode animate inline showTimeInput"
                                    tabindex="-1"
                                    style="width: 250px"
                                  >
                                    <div class="flatpickr-months">
                                      <span class="flatpickr-prev-month"></span>
                                      <div class="flatpicker-month">
                                        <div class="flatpickr-current-month">
                                          <span
                                            class="cur-month"
                                            title="scroll to increment"
                                          >
                                            January
                                          </span>
                                          <div class="numInputWrapper">
                                            <input
                                              class="numInput cur-year"
                                              type="text"
                                              tabindex="-1"
                                              pattern="\d"
                                              aria-label="year"
                                            />
                                            <span class="arrowup"></span>
                                            <span class="arrowdown"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <span class="flatpickr-next-month"></span>
                                    </div>
                                    <div class="flatpickr-innerContainer">
                                      <div class="flatpickr-rConatiner">
                                        <div class="flatpickr-weekdays">
                                          <div
                                            class="flatpickr-weekdaycontainer"
                                          >
                                            <span class="flatpickr-weekday"
                                              >Sun</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Mon</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Tue</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Wed</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Thu</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Fri</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Sat</span
                                            >
                                          </div>
                                        </div>
                                        <div
                                          class="flatpickr-days"
                                          tabindex="-1"
                                        ></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div
                                    class="flatpickr-calendar rangeMode animate inline showTimeInput"
                                    tabindex="-1"
                                    style="width: 250px"
                                  >
                                    <div class="flatpickr-months">
                                      <span class="flatpickr-prev-month"></span>
                                      <div class="flatpicker-month">
                                        <div class="flatpickr-current-month">
                                          <span
                                            class="cur-month"
                                            title="scroll to increment"
                                          >
                                            January
                                          </span>
                                          <div class="numInputWrapper">
                                            <input
                                              class="numInput cur-year"
                                              type="text"
                                              tabindex="-1"
                                              pattern="\d"
                                              aria-label="year"
                                            />
                                            <span class="arrowup"></span>
                                            <span class="arrowdown"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <span
                                        class="flatpickr-next-month disabled"
                                      ></span>
                                    </div>
                                    <div class="flatpickr-innerContainer">
                                      <div class="flatpickr-rConatiner">
                                        <div class="flatpickr-weekdays">
                                          <div
                                            class="flatpickr-weekdaycontainer"
                                          >
                                            <span class="flatpickr-weekday"
                                              >Sun</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Mon</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Tue</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Wed</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Thu</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Fri</span
                                            >
                                            <span class="flatpickr-weekday"
                                              >Sat</span
                                            >
                                          </div>
                                        </div>
                                        <div
                                          class="flatpickr-days"
                                          tabindex="-1"
                                        ></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="double-date-picker_buttons">
                                  <button
                                    class="btn btn-basic btn-regular"
                                    type="button"
                                  >
                                    <span class="btn-title">Cancel</span>
                                  </button>
                                  <button
                                    class="btn btn-basic btn-regular"
                                    type="button"
                                  >
                                    <span class="btn-title">Apply</span>
                                  </button>
                                </div>
                              </div>
                              <div class="double-date-picker_filter">
                                <ul>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title">Today</span>
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title">Yestday</span>
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title">Last 7 Days</span>
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title"
                                        >Last 30 Days</span
                                      >
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title"
                                        >Last 90 Days</span
                                      >
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title">Week Date</span>
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title">Month Date</span>
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title"
                                        >Quarter Date</span
                                      >
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      class="btn btn-basic btn-regular btn-block"
                                      type="button"
                                    >
                                      <span class="btn-title"
                                        >Year to Date</span
                                      >
                                    </button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a
                        class="panel btn-notification dashboard_notifications"
                        href="order.php"
                      >
                        <svg
                          class="btn-notification_icon icon-base icon-orders"
                        >
                          <use xlink:href="#order-new">
                            <symbol id="order-new" viewBox="0 0 20 20">
                              <path
                                d="M10 1a1 1 0 011 1v5.586l1.293-1.293a1 1 0 111.414 1.414l-3 3A1 1 0 0110 11a1 1 0 01-.707-.293l-3-3a1 1 0 011.414-1.414L9 7.586V2a1 1 0 011-1z"
                              />

                              <path
                                d="M6 3a1 1 0 00-1-1H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2h-1a1 1 0 100 2h1v8h-1.764a2 2 0 00-1.789 1.106L12 14H8l-.447-.894A2 2 0 005.763 12H4V4h1a1 1 0 001-1z"
                              ></path>
                            </symbol>
                          </use>
                        </svg>
                        <span class="btn-notification_title">To Order</span>
                        <?php
                        
                          if(isset($toOrder)){
                            echo sizeof($toOrder);
                          }else{
                            echo 0;
                          }

                        ?>
                        <svg
                          class="btn-notification_arrow icon-full-arrow-right icon-base"
                        >
                          <use xlink:href="#arrow-right">
                            <symbol id="arrow-right" viewBox="0 0 20 20">
                              <path
                                d="M15.92 10.38a1 1 0 0 0-.21-1.09l-4-4a1 1 0 1 0-1.42 1.42L12.6 9H5a1 1 0 1 0 0 2h7.59l-2.3 2.3a1 1 0 1 0 1.42 1.4l4-4a1 1 0 0 0 .21-.32z"
                              />
                            </symbol>
                          </use>
                        </svg>
                      </a>
                      <a
                        class="panel btn-notification dashboard_notifications"
                        href="order.php"
                      >
                        <svg
                          class="btn-notification_icon icon-base icon-orders"
                        >
                          <use xlink:href="#order-new">
                            <symbol id="order-new" viewBox="0 0 20 20">
                              <path
                                d="M10 1a1 1 0 011 1v5.586l1.293-1.293a1 1 0 111.414 1.414l-3 3A1 1 0 0110 11a1 1 0 01-.707-.293l-3-3a1 1 0 011.414-1.414L9 7.586V2a1 1 0 011-1z"
                              />

                              <path
                                d="M6 3a1 1 0 00-1-1H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2h-1a1 1 0 100 2h1v8h-1.764a2 2 0 00-1.789 1.106L12 14H8l-.447-.894A2 2 0 005.763 12H4V4h1a1 1 0 001-1z"
                              ></path>
                            </symbol>
                          </use>
                        </svg>
                        <span class="btn-notification_title"
                          >In Processing</span
                        >
                        <svg
                          class="btn-notification_arrow icon-full-arrow-right icon-base"
                        >
                          <use xlink:href="#arrow-right">
                            <symbol id="arrow-right" viewBox="0 0 20 20">
                              <path
                                d="M15.92 10.38a1 1 0 0 0-.21-1.09l-4-4a1 1 0 1 0-1.42 1.42L12.6 9H5a1 1 0 1 0 0 2h7.59l-2.3 2.3a1 1 0 1 0 1.42 1.4l4-4a1 1 0 0 0 .21-.32z"
                              />
                            </symbol>
                          </use>
                        </svg>
                      </a>
                      <a
                        class="panel btn-notification dashboard_notifications"
                        href="#"
                      >
                        <svg
                          class="btn-notification_icon icon-base icon-orders"
                        >
                          <use xlink:href="#icon-bell">
                            <symbol id="icon-bell" viewBox="0 0 512 512">
                              <path
                                d="m256 512c48 0 88-31 103-73l-206 0c15 42 55 73 103 73z m219-183l-36 0 0-153c0-97-82-176-183-176-101 0-183 79-183 176l0 153-36 0c-21 0-37 16-37 37 0 20 16 36 37 36l438 0c21 0 37-16 37-36 0-21-16-37-37-37z"
                              />
                            </symbol>
                          </use>
                        </svg>
                        <span class="btn-notification_title"
                          >Notifications</span
                        >
                        <svg
                          class="btn-notification_arrow icon-full-arrow-right icon-base"
                        >
                          <use xlink:href="#arrow-right">
                            <symbol id="arrow-right" viewBox="0 0 20 20">
                              <path
                                d="M15.92 10.38a1 1 0 0 0-.21-1.09l-4-4a1 1 0 1 0-1.42 1.42L12.6 9H5a1 1 0 1 0 0 2h7.59l-2.3 2.3a1 1 0 1 0 1.42 1.4l4-4a1 1 0 0 0 .21-.32z"
                              />
                            </symbol>
                          </use>
                        </svg>
                      </a>

                      
                        
                        <script>
                        window.onload = function () {
 
                          var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            title:{
                              text: "My Orders"
                            },
                            subtitles: [{
                              text: "EARNINGS VS COST",
                              fontSize: 18
                            }],
                            
                            axisY: {
                              prefix: "$"
                            },
                            legend:{
                              cursor: "not-allowed",
                              itemclick: toggleDataSeries
                            },
                            toolTip: {
                              shared: true
                            }, 
                            dataPointMaxWidth: 20,
                            data: [
                            {
                              type: "splineArea",
                              
                              name: "Sold For",
                              showInLegend: "true",
                              xValueType: "dateTime",
                              xValueFormatString: "MMM YYYY",
                              yValueFormatString: "$#,##0.##",
                              dataPoints: <?php echo json_encode($earnings); ?>
                            },
                            {
                              type: "splineArea",
                              name: "Base Price",
                              showInLegend: "true",
                              xValueType: "dateTime",
                              xValueFormatString: "DD MMM YYYY",
                              yValueFormatString: "$#,##0.##",
                              dataPoints: <?php echo json_encode($earnings2); ?>
                            }
                            ]
                            });
                                                  
                                                  chart.render();
                          
                                                  function toggleDataSeries(e){
                                                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                                      e.dataSeries.visible = false;
                                                    }
                                                    else{
                                                      e.dataSeries.visible = true;
                                                    }
                                                    chart.render();
                                                  }
                                                  
                                                  }
                      </script>
                      <div class="dashboard_chart">
                        <div class="panel dashboard-chart">
                          <div id="chartContainer" style="height: 370px; width: 100%;">
                          
                          </div>
                          <?php if(!isset($myOrders) || sizeof($myOrders) == 0){
                            ?>
                              <h2>No Orders To Display During this Time Period</h2>
                            <?php
                          }?>
                               
                          <div class="dashboard_metrics">
                        <div class="panel dashboard-metrics">
                          <div class="panel-header container-flex flex-between">
                            <h3>Overview</h3>
                            <div class="container-flex">
                              <svg class="icon-sidebar-setting -cursor-pointer">
                                <use xlink:href="#icon-side-setting">
                                  <symbol
                                    id="icon-side-setting"
                                    viewBox="0 0 20 20"
                                  >
                                    <path
                                      d="M17.12 8.9l-1.26-.17a5.96 5.96 0 0 0-.82-1.98l.78-1a1 1 0 0 0-.08-1.32l-.17-.17a1 1 0 0 0-1.32-.08l-1 .78a5.95
                                       5.95 0 0 0-1.98-.82l-.16-1.26a1 1 0 0 0-1-.88h-.23a1 1 0 0 0-.99.88l-.16 1.26a5.96 5.96 0 0 0-1.98.82l-1-.78a1 1
                                        0 0 0-1.32.08l-.17.17a1 1 0 0 0-.08 1.32l.78 1a5.96 5.96 0 0 0-.82 1.98l-1.26.16a1 1 0 0 0-.88 1v.23a1 1 0 0 0
                                         .88.99l1.26.16c.15.71.43 1.38.82 1.98l-.78 1a1 1 0 0 0 .08 1.32l.17.17a1 1 0 0 0 1.32.08l1-.78a5.95 5.95 0 0 0
                                          1.98.82l.16 1.26a1 1 0 0 0 1 .88h.23a1 1 0 0 0 .99-.88l.16-1.26a5.96 5.96 0 0 0 1.98-.82l1 .78a1 1 0 0 0 
                                          1.32-.08l.17-.17a1 1 0 0 0 .08-1.32l-.78-1a5.95 5.95 0 0 0 .82-1.98l1.26-.16a1 1 0 0 0 .88-1v-.23a1 1 0 0
                                           0-.88-.99zM10 13a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
                                    />
                                  </symbol>
                                </use>
                              </svg>
                            </div>
                            
                          </div>
                          <div class="orders-overview">
                              <p><strong>Sales</strong>&nbsp;&nbsp;&nbsp;<?php
                              
                                if(isset($myOrdersTotalPrice)){

                                  echo "$".array_sum($myOrdersTotalPrice);

                                }
                              
                              ?></p>
                              <p><strong>Orders</strong>&nbsp;&nbsp;&nbsp;<?php
                              if(isset($myOrders)){
                                echo sizeof($myOrders);
                              }else{
                                echo 0;
                              }
                              ?></p>
                              <hr>
                              <p><strong>Base Price </strong>&nbsp;&nbsp;&nbsp;<?php
                              
                              if(isset($myOrdersTotalPrice)){

                                echo "$".array_sum($myOrdersTotalCost);

                              }
                            
                            ?></p>
                              <hr>
                              <p><strong>Earnings</strong>&nbsp;&nbsp;&nbsp;<?php
                              
                              if(isset($myOrdersTotalPrice) && isset($myOrdersTotalCost)){

                                $totalPrice = array_sum($myOrdersTotalPrice);
                                $totalCost = array_sum($myOrdersTotalCost);
                                echo "$".floatval($totalPrice-$totalCost);

                              }
                            
                            ?></p>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="dashboard_top-products">
                        <div class="panel dashboard-table">
                              <table cellpadding=10>

                              <tr>
                              
                                <th>Serial Number</th>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Cost</th>
                                <th>Ordered On</th>
                              
                              </tr>

                              <?php
                                $counter = 1;
                                if(isset($myOrders)){

                                  foreach($myOrders as $myOrder){
                                    ?>
                                    <tr>
                                      <p>
                                        <td><?php echo $counter.".  ";?></td>
                                        <td><a href="https://clickrippleappfurniture.myshopify.com/admin/orders/<?php echo $myOrder['id']?>"><?php echo $myOrder['id']?></a></td>
                                        <td><?php print_r($myOrder['line_items'][0]['title'])?></td>
                                        <td><strong></strong><?php echo $myOrder['total_price']?></td>
                                        <td><?php 
                                        
                                        $cost = $UF->getProfitForProduct($myOrder['line_items'][0]['product_id']);
                                        if(sizeof($cost) > 0){

                                          echo $myOrder['total_price'] - $cost[0]['cost'];

                                        }else{

                                          echo $myOrder['total_price'];

                                        }
                                        
                                        ?></td>
                                        <td><?php 
                                        $dateOld = $myOrder['created_at'];
                                        $dateNew = date_create($dateOld);
                                        echo date_format($dateNew, 'l, F d y h:i:s');
                                        ?></td>
                                      </p></a>
                                      <?php $counter = $counter+1?>
                                      </tr>
                                    <?php
                                  }

                                }
                              
                              ?>
                              </table>
                            
                          </div>
                          
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
