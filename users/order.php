<?php

   include "./userFunctions.php"; include "./userFuncWithoutSession.php";

   $UF = new UserFunctions();

   $OrderData = $UF->getOrders()['data'];
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="css/sidenav_style.css" />
      <link rel="stylesheet" href="css/import_style1.css">
      <link rel="stylesheet" href="css/import_style2.css">
      <link rel="stylesheet" href="css/import_style3.css">
      <link rel="stylesheet" href="css/styles.css" />
      <link rel="stylesheet" href="css/owl.carousel.min.css" />
      <link rel="stylesheet" href="css/owl.theme.default.min.css" />
      <script src="js/owl.carousel.js"></script>
      <script src="js/owl.navigation.js"></script>
      <script src="../js/shopify.js"></script>
      <title>Product</title>
   </head>
   <body>
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
                                    <a href="<?php
                      
                                    $WF = new FunctionsWithoutSession();
                                    if(sizeOf($WF->hasUserProducts($UF->getUserId())) > 0){
                                       echo "totalSale.php";
                                       }else{
                                       echo "user_index.php";
                                       }
                                 
                                 ?>">
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
                                                   <path
                                                      d="M10.983 7.022a2 2 0 1 1 3.999-.002 2 2 0 0 1-4 .002zm-.98-5c-.55-.003-1.633.613-2.02 1l-5 5c-1.73 1.729-.814 3.186 
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
                                                   <path
                                                      d="M10 1a1 1 0 011 1v5.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L9 7.586V2a1 1 0 011-1z" />
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
                                                   <path
                                                      d="M17.7 16.3l-3.1-3.11A6.94 6.94 0 0 0 16 9 6.96 6.96 0 0 0 4.05 4.05a6.96 6.96 0 0 0 0 9.9A6.96 6.96 0 0 0 9 16a6.94 6.94 0 0 0 4.19-1.4l3.1 3.1a1 1 0 0 0 1.42 0 1 1
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
                                                <path
                                                   d="M17.12 8.9l-1.26-.17a5.96 5.96 0 0 0-.82-1.98l.78-1a1 1 0 0
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
                                 <!----> <!---->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="page-layout__body">
                        <!----> 
                        <div class="page-layout__body-content">
                           <div data-v-538e13d8="" class="notification-messages" slot="notification-messages">
                              <!----> <!---->
                           </div>
                           <div class="orders-page__banners">
                              <!----> <!----> 
                              <div class="feature-flag-ali-express-api"></div>
                              <!----> <!----> <!----> <!---->
                           </div>
                           <div class="orders-filter orders-page__filters">
                              <div class="orders-filter__container">
                                 <div class="input-block orders-filter__keyword-input" id="orders-filter-keyword" placeholder="Enter Keywords" value="">
                                    <div class="input-field input-field--no-value" placeholder="Enter Keywords">
                                       <!----> <input placeholder="Enter Keywords" id="orders-filter-keyword" type="text" class="form-control"> <!----> <!----> <!----> <!----> 
                                    </div>
                                    <!----> <!---->
                                 </div>
                                 <button type="submit" class="orders-filter__keyword-button btn btn-basic btn-lg">
                                    <!----> <!----> <span class="btn-title">
                                    Filter
                                    </span> <!---->
                                 </button>
                                 <div data-trekkie-id="popover" class="popover double-date-picker orders-filter__datepicker-wide">
                                    <span class="popover-wrapper">
                                       <button type="button" class="double-date-picker__toggle btn btn-basic btn-regular btn-dropdown">
                                          <!----> <!----> <span class="btn-title">
                                          Nov 21, 2020 - Dec 21, 2020
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
                                          <div class="double-date-picker__container">
                                             <div class="double-date-picker__calendars">
                                                <div class="flatpickr-input" readonly="readonly"></div>
                                                <div class="flatpickr-calendar rangeMode animate inline showTimeInput" tabindex="-1" style="width: 250px;">
                                                   <div class="flatpickr-months">
                                                      <span class="flatpickr-prev-month">
                                                         <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                                                            <g></g>
                                                            <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path>
                                                         </svg>
                                                      </span>
                                                      <div class="flatpickr-month">
                                                         <div class="flatpickr-current-month">
                                                            <span class="cur-month" title="Scroll to increment">November </span>
                                                            <div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" tabindex="-1" title="Scroll to increment" aria-label="Year" data-max="2020"><span class="arrowUp"></span><span class="arrowDown"></span></div>
                                                         </div>
                                                      </div>
                                                      <span class="flatpickr-next-month">
                                                         <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                                                            <g></g>
                                                            <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path>
                                                         </svg>
                                                      </span>
                                                   </div>
                                                   <div class="flatpickr-innerContainer">
                                                      <div class="flatpickr-rContainer">
                                                         <div class="flatpickr-weekdays">
                                                            <div class="flatpickr-weekdaycontainer">
                                                               <span class="flatpickr-weekday">
                                                               Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
                                                               </span>
                                                            </div>
                                                         </div>
                                                         <div class="flatpickr-days" tabindex="-1">
                                                            <div class="dayContainer"><span class="flatpickr-day " aria-label="November 1, 2020" tabindex="-1">1</span><span class="flatpickr-day " aria-label="November 2, 2020" tabindex="-1">2</span><span class="flatpickr-day " aria-label="November 3, 2020" tabindex="-1">3</span><span class="flatpickr-day " aria-label="November 4, 2020" tabindex="-1">4</span><span class="flatpickr-day " aria-label="November 5, 2020" tabindex="-1">5</span><span class="flatpickr-day " aria-label="November 6, 2020" tabindex="-1">6</span><span class="flatpickr-day " aria-label="November 7, 2020" tabindex="-1">7</span><span class="flatpickr-day " aria-label="November 8, 2020" tabindex="-1">8</span><span class="flatpickr-day " aria-label="November 9, 2020" tabindex="-1">9</span><span class="flatpickr-day " aria-label="November 10, 2020" tabindex="-1">10</span><span class="flatpickr-day " aria-label="November 11, 2020" tabindex="-1">11</span><span class="flatpickr-day " aria-label="November 12, 2020" tabindex="-1">12</span><span class="flatpickr-day " aria-label="November 13, 2020" tabindex="-1">13</span><span class="flatpickr-day " aria-label="November 14, 2020" tabindex="-1">14</span><span class="flatpickr-day " aria-label="November 15, 2020" tabindex="-1">15</span><span class="flatpickr-day " aria-label="November 16, 2020" tabindex="-1">16</span><span class="flatpickr-day " aria-label="November 17, 2020" tabindex="-1">17</span><span class="flatpickr-day " aria-label="November 18, 2020" tabindex="-1">18</span><span class="flatpickr-day " aria-label="November 19, 2020" tabindex="-1">19</span><span class="flatpickr-day " aria-label="November 20, 2020" tabindex="-1">20</span><span class="flatpickr-day selected startRange" aria-label="November 21, 2020" tabindex="-1">21</span><span class="flatpickr-day inRange" aria-label="November 22, 2020" tabindex="-1">22</span><span class="flatpickr-day inRange" aria-label="November 23, 2020" tabindex="-1">23</span><span class="flatpickr-day inRange" aria-label="November 24, 2020" tabindex="-1">24</span><span class="flatpickr-day inRange" aria-label="November 25, 2020" tabindex="-1">25</span><span class="flatpickr-day inRange" aria-label="November 26, 2020" tabindex="-1">26</span><span class="flatpickr-day inRange" aria-label="November 27, 2020" tabindex="-1">27</span><span class="flatpickr-day inRange" aria-label="November 28, 2020" tabindex="-1">28</span><span class="flatpickr-day inRange" aria-label="November 29, 2020" tabindex="-1">29</span><span class="flatpickr-day inRange" aria-label="November 30, 2020" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 1, 2020" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 2, 2020" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 3, 2020" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 4, 2020" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 5, 2020" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 6, 2020" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 7, 2020" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 8, 2020" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 9, 2020" tabindex="-1">9</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 10, 2020" tabindex="-1">10</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 11, 2020" tabindex="-1">11</span><span class="flatpickr-day nextMonthDay inRange" aria-label="December 12, 2020" tabindex="-1">12</span></div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="flatpickr-input" readonly="readonly"></div>
                                                <div class="flatpickr-calendar rangeMode animate inline showTimeInput" tabindex="-1" style="width: 250px;">
                                                   <div class="flatpickr-months">
                                                      <span class="flatpickr-prev-month">
                                                         <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                                                            <g></g>
                                                            <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path>
                                                         </svg>
                                                      </span>
                                                      <div class="flatpickr-month">
                                                         <div class="flatpickr-current-month">
                                                            <span class="cur-month" title="Scroll to increment">December </span>
                                                            <div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" tabindex="-1" title="Scroll to increment" aria-label="Year" data-max="2020"><span class="arrowUp"></span><span class="arrowDown"></span></div>
                                                         </div>
                                                      </div>
                                                      <span class="flatpickr-next-month disabled">
                                                         <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                                                            <g></g>
                                                            <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path>
                                                         </svg>
                                                      </span>
                                                   </div>
                                                   <div class="flatpickr-innerContainer">
                                                      <div class="flatpickr-rContainer">
                                                         <div class="flatpickr-weekdays">
                                                            <div class="flatpickr-weekdaycontainer">
                                                               <span class="flatpickr-weekday">
                                                               Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
                                                               </span>
                                                            </div>
                                                         </div>
                                                         <div class="flatpickr-days" tabindex="-1">
                                                            <div class="dayContainer"><span class="flatpickr-day prevMonthDay inRange" aria-label="November 29, 2020" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay inRange" aria-label="November 30, 2020" tabindex="-1">30</span><span class="flatpickr-day inRange" aria-label="December 1, 2020" tabindex="-1">1</span><span class="flatpickr-day inRange" aria-label="December 2, 2020" tabindex="-1">2</span><span class="flatpickr-day inRange" aria-label="December 3, 2020" tabindex="-1">3</span><span class="flatpickr-day inRange" aria-label="December 4, 2020" tabindex="-1">4</span><span class="flatpickr-day inRange" aria-label="December 5, 2020" tabindex="-1">5</span><span class="flatpickr-day inRange" aria-label="December 6, 2020" tabindex="-1">6</span><span class="flatpickr-day inRange" aria-label="December 7, 2020" tabindex="-1">7</span><span class="flatpickr-day inRange" aria-label="December 8, 2020" tabindex="-1">8</span><span class="flatpickr-day inRange" aria-label="December 9, 2020" tabindex="-1">9</span><span class="flatpickr-day inRange" aria-label="December 10, 2020" tabindex="-1">10</span><span class="flatpickr-day inRange" aria-label="December 11, 2020" tabindex="-1">11</span><span class="flatpickr-day inRange" aria-label="December 12, 2020" tabindex="-1">12</span><span class="flatpickr-day inRange" aria-label="December 13, 2020" tabindex="-1">13</span><span class="flatpickr-day inRange" aria-label="December 14, 2020" tabindex="-1">14</span><span class="flatpickr-day inRange" aria-label="December 15, 2020" tabindex="-1">15</span><span class="flatpickr-day inRange" aria-label="December 16, 2020" tabindex="-1">16</span><span class="flatpickr-day inRange" aria-label="December 17, 2020" tabindex="-1">17</span><span class="flatpickr-day inRange" aria-label="December 18, 2020" tabindex="-1">18</span><span class="flatpickr-day inRange" aria-label="December 19, 2020" tabindex="-1">19</span><span class="flatpickr-day inRange" aria-label="December 20, 2020" tabindex="-1">20</span><span class="flatpickr-day today selected endRange" aria-label="December 21, 2020" aria-current="date" tabindex="-1">21</span><span class="flatpickr-day disabled" aria-label="December 22, 2020">22</span><span class="flatpickr-day disabled" aria-label="December 23, 2020">23</span><span class="flatpickr-day disabled" aria-label="December 24, 2020">24</span><span class="flatpickr-day disabled" aria-label="December 25, 2020">25</span><span class="flatpickr-day disabled" aria-label="December 26, 2020">26</span><span class="flatpickr-day disabled" aria-label="December 27, 2020">27</span><span class="flatpickr-day disabled" aria-label="December 28, 2020">28</span><span class="flatpickr-day disabled" aria-label="December 29, 2020">29</span><span class="flatpickr-day disabled" aria-label="December 30, 2020">30</span><span class="flatpickr-day disabled" aria-label="December 31, 2020">31</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 1, 2021">1</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 2, 2021">2</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 3, 2021">3</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 4, 2021">4</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 5, 2021">5</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 6, 2021">6</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 7, 2021">7</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 8, 2021">8</span><span class="flatpickr-day nextMonthDay disabled" aria-label="January 9, 2021">9</span></div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="double-date-picker__buttons">
                                                <button type="button" class="btn btn-basic btn-regular">
                                                   <!----> <!----> <span class="btn-title">Cancel</span> <!---->
                                                </button>
                                                <button type="button" class="btn btn-primary btn-regular">
                                                   <!----> <!----> <span class="btn-title">Apply</span> <!---->
                                                </button>
                                             </div>
                                          </div>
                                          <div class="double-date-picker__filter">
                                             <ul>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Today</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Yesterday</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Last 7 days</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Last 30 days</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Last 90 days</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Week to date</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Month to date</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Quarter to date</span> <!---->
                                                   </button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-basic btn-regular btn-block">
                                                      <!----> <!----> <span class="btn-title">Year to date</span> <!---->
                                                   </button>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="orders-filter__container orders-filter--desktop-hidden">
                                 <div class="orders-filter__datepicker-narrow">
                                    <div class="input-block" id="orders-start" type="date" icon="calendar" label="Start date" placeholder="Start date" required="required" value="2020-11-21">
                                       <div class="input-field input-field--has-label input-icon-block" placeholder="Start date" required="required">
                                          <!----> <input placeholder="Start date" required="required" id="orders-start" type="date" class="form-control"> <!----> 
                                          <svg class="icon-base">
                                             <use xlink:href="/images/icons.svg?v=2.10.3#icon-calendar"></use>
                                          </svg>
                                          <label for="orders-start" class="label-control">
                                          Start date
                                          </label> <!----> 
                                       </div>
                                       <!----> <!---->
                                    </div>
                                    <div class="input-block" id="orders-end" type="date" icon="calendar" label="End date" placeholder="End date" required="required" value="2020-12-21">
                                       <div class="input-field input-field--has-label input-icon-block" placeholder="End date" required="required">
                                          <!----> <input placeholder="End date" required="required" id="orders-end" type="date" class="form-control"> <!----> 
                                          <svg class="icon-base">
                                             <use xlink:href="/images/icons.svg?v=2.10.3#icon-calendar"></use>
                                          </svg>
                                          <label for="orders-end" class="label-control">
                                          End date
                                          </label> <!----> 
                                       </div>
                                       <!----> <!---->
                                    </div>
                                 </div>
                              </div>
                              <div class="orders-filter__container">
                                 <div class="orders-filter__list">
                                    <div data-trekkie-id="popover:orders-filter-list-filter-fulfillment" class="popover orders-filter__item js-testing-fulfillment">
                                       <span class="popover-wrapper">
                                          <button type="button" class="btn btn-basic btn-regular btn-dropdown">
                                             <!----> <!----> <span class="btn-title">
                                             Fulfillment Status: <span>All</span></span> 
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
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Fulfilled</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Unfulfilled</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Partially fulfilled</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div data-trekkie-id="popover:orders-filter-list-filter-financial" class="popover orders-filter__item js-testing-financial">
                                       <span class="popover-wrapper">
                                          <button type="button" class="btn btn-basic btn-regular btn-dropdown">
                                             <!----> <!----> <span class="btn-title">
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
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Authorized</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Paid</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Partially paid</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Refunded</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Partially refunded</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div data-trekkie-id="popover:orders-filter-list-filter-flags" class="popover orders-filter__item js-testing-flags">
                                       <span class="popover-wrapper">
                                          <button type="button" class="btn btn-basic btn-regular btn-dropdown">
                                             <!----> <!----> <span class="btn-title">
                                             Flags Status: <span>All</span></span> 
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
                                                <label>
                                                   <input type="checkbox"> 
                                                   <svg class="icon-base icon-bookmark-o color-info">
                                                      <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark-o"></use>
                                                   </svg>
                                                   <span>None</span> <span class="badge badge-success" style="display: none;">
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> 
                                                   <svg class="icon-base icon-bookmark color-info">
                                                      <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                   </svg>
                                                   <span>Grey</span> <span class="badge badge-success" style="display: none;">
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> 
                                                   <svg class="icon-base icon-bookmark color-primary">
                                                      <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                   </svg>
                                                   <span>Blue</span> <span class="badge badge-success" style="display: none;">
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> 
                                                   <svg class="icon-base icon-bookmark color-success">
                                                      <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                   </svg>
                                                   <span>Green</span> <span class="badge badge-success" style="display: none;">
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> 
                                                   <svg class="icon-base icon-bookmark color-warning">
                                                      <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                   </svg>
                                                   <span>Yellow</span> <span class="badge badge-success" style="display: none;">
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> 
                                                   <svg class="icon-base icon-bookmark color-danger">
                                                      <use xlink:href="/images/icons.svg?v=2.10.3#icon-bookmark"></use>
                                                   </svg>
                                                   <span>Red</span> <span class="badge badge-success" style="display: none;">
                                                   </span>
                                                </label>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div data-trekkie-id="popover:orders-filter-list-filter-states" class="popover orders-filter__item js-testing-states">
                                       <span class="popover-wrapper">
                                          <button type="button" class="btn btn-basic btn-regular btn-dropdown">
                                             <!----> <!----> <span class="btn-title">
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
                                                <label>
                                                   <input type="checkbox"> <!----> <span>To Order</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>In Processing</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
                                             </li>
                                             <li tabindex="-1">
                                                <label>
                                                   <input type="checkbox"> <!----> <span>Shipped</span> <span class="badge badge-success" style="display: none;">
                                                   0
                                                   </span>
                                                </label>
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
                                    <!----> <!----> <span class="btn-title">
                                    Export
                                    </span> <!---->
                                 </button>
                                 <div class="feature-flag-ali-express-api"></div>
                              </div>
                           </div>
                           <?php 
                              require_once("../inc/connect.php");
                               $query = "SELECT * FROM orders ";
                               $select_all_orders_query = mysqli_query($conn, $query);
                               while($row1= mysqli_fetch_assoc($select_all_orders_query)){
                                 
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
                                                   <!----> <!----> 
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
                                                   <!----> <!----> 
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
                                                   <!----> <!----> 
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
                                                   <!----> <!----> 
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
                                                   <!----> <!----> 
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
                                                   <!----> <!----> 
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
                                          <?php echo $row1['orderID'] ?>
                                          </a>
                                          <?php echo $row1['orderDate'] ?>
                                       </div>
                                    </div>
                                    <div data-v-3f2546ba="" class="order-header__order-status">
                                       <div data-v-147e2c88="" data-v-3f2546ba="" class="order-status"><span data-v-147e2c88="" class="badge badge-default">
                                          UnPaid
                                          </span> <span data-v-147e2c88="" class="badge badge-default">
                                          Unfulfilled
                                          </span>
                                       </div>
                                       <!---->
                                    </div>
                                    <div data-v-3f2546ba="" class="order-header__customer">
                                       <span data-v-3f2546ba="">
                                       Customer:<?php echo $row1['customerName'] ?>
                                       </span> <a data-v-3f2546ba="" href="#">
                                       </a> <!---->
                                    </div>
                                 </div>
                                 <div class="order__banners">
                                    <!----> <!----> <!---->
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
                                          <!----> <!----> 
                                          <div data-v-26db1937="" class="order-supplier__column order-supplier__actions">
                                             <div data-v-26db1937="" data-trekkie-id="dropdown" class="popover dropdown order-more-actions order-supplier__action order-supplier__action--desktop order-more-actions--more-actions" suppliers-source="[object Object]">
                                                <span class="popover-wrapper">
                                                   <button type="button" class="dropdown__toggle btn btn-basic btn-regular btn-dropdown" tabindex="0">
                                                      <!----> <!----> 
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
                                                            <!----> <!----> <span class="btn-title"><span>Add CR order number</span></span> <!---->
                                                         </button>
                                                      </li>
                                                      <li tabindex="-1">
                                                         <button type="button" class="btn btn-basic btn-regular btn-block" tabindex="0">
                                                            <!----> <!----> <span class="btn-title"><span>Mark as shipped</span></span> <!---->
                                                         </button>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div data-v-26db1937="" data-trekkie-id="dropdown" class="popover dropdown order-more-actions order-supplier__action order-supplier__action--mobile order-more-actions--more-actions" suppliers-source="[object Object]">
                                                <span class="popover-wrapper">
                                                   <button type="button" class="dropdown__toggle btn btn-basic btn-regular btn-dropdown" tabindex="0">
                                                      <!----> <!----> 
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
                                                            <!----> <!----> <span class="btn-title"><span>Add CR order number</span></span> <!---->
                                                         </button>
                                                      </li>
                                                      <li tabindex="-1">
                                                         <button type="button" class="btn btn-basic btn-regular btn-block" tabindex="0">
                                                            <!----> <!----> <span class="btn-title"><span>Mark as shipped</span></span> <!---->
                                                         </button>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <!----> <!----> <!----> <!----> <!---->
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
                                                <h3><?php echo $row1['customerName'] ?></h3>
                                                <span>
                                                <br></span>
                                                <!---->
                                             </div>
                                             <div class="order-item__price order-item__price--full-width">
                                                <?php echo $row1['quantity']?> x <?php echo $row1['price_per_item'] ?> CAD
                                             </div>
                                             <!----> 
                                             <div class="order-item__last">
                                                <!----> <!----> <!---->
                                             </div>
                                          </div>
                                          <!----> <!---->
                                       </div>
                                       <!---->
                                    </div>
                                 </div>
                                 <div data-v-fb5dde7a="" class="order-note-line">
                                    <div data-v-fb5dde7a="" class="order-note-line__description">
                                    </div>
                                    <div data-v-fb5dde7a="" class="order-note-line__action">
                                       <button data-v-fb5dde7a="" type="button" class="btn btn-basic btn-sm">
                                          <!----> <!----> <span class="btn-title">
                                          Add note
                                          </span> <!---->
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php }?>
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
                                       <!----> <!---->
                                    </button>
                                 </li>
                                 <!----> 
                                 <li>
                                    <button type="button" class="btn btn-basic btn-regular active">
                                       <!----> <!----> <span class="btn-title">
                                       1
                                       </span> <!---->
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
                                       <!----> <!---->
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
      <script>
         $(document).ready(function(){
           $(".dropdown_toggle").dropdown(toggle);
         });
      </script>
   </body>
</html>