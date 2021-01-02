
<?php
   include "./userFunctions.php";
   
   $UF = new UserFunctions();
   $shipping_charge =0;
   $watchListData = $UF->getWatchListProducts();
   
    if(isset($_POST['import_to_store'])){
   
       $UF = new UserFunctions();
         
         $pro_Name = $_POST['change_title'];
         $description = $_POST['new_description'];
         $watch_list_id = $_POST['import_to_store'];
         $newPrice = $_POST['newPrice'];
         $productImage = $_POST['imageOfProduct'];
         $Stock = $_POST['stock_inv'];
   
       $cur_pro_id = $_POST['item-id'];
       $UF->addToStore($pro_Name, $description, $newPrice, $productImage, $watch_list_id, $cur_pro_id,$Stock);
   
    }
   
    if(isset($_POST['deleteFromWishList'])){
   
     $UF = new UserFunctions();
   
       $watch_list_id = $_POST['deleteFromWishList'];
   
     $UF->deleteWatchList($watch_list_id);
     header("Refresh:0");
   }
   
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
      <link rel="stylesheet" href="css/skin.css" />
      <link rel="stylesheet" href="css/owl.carousel.min.css" />
      <link rel="stylesheet" href="css/owl.theme.default.min.css" />
      <script src="js/owl.carousel.js"></script>
      <script src="js/owl.navigation.js"></script>
      <script src="js/jquery.min.js"></script>
      <title>Import List</title>
   </head>
   <body>
      <div id="app">
         <div id="clickripple-merchants" class="clickripple-merchants">
            <div class="page-layout import-list page-layout-full-width">
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
                                    <a href="#">
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
                                    <a href="#">
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
                                    <a href="#">
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
                                    <a href="#">
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
                                    <a href="#">
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
               <div id="page-content" class="page-layout_content">
                  <div class="page-layout_content-container">
                     <div class="page-layout_header">
                        <div class="main-layout-header">
                           <div class="main-layout-header_title">
                              <!----->
                              <h2>
                                 Import List 
                              </h2>
                              <!----->
                           </div>
                           <div class="main-layout-header_middle">
                              <div class="main-layout-header_content">
                                 <!---->
                              </div>
                              <div class="main-layout-header_actions">
                                 <!------>
                                 <div class="action-btn">
                                    <!----->
                                    <button class="btn btn-basic btn-regular" type="button">
                                       <!---->
                                       <span class="btn-icon-wrap">
                                          <svg class="icon-base">
                                             <use xlink:href="#icon-add">
                                                <symbol id="icon-add" viewBox="0 0 20 20">
                                                   <path d="M15 9h-4V5a1 1 0 0 0-2 0v4H5a1 1 0 0 0 0 2h4v4a1 1 0 0 0 2 0v-4h4a1 1 0 0 0 0-2z"></path>
                                                </symbol>
                                             </use>
                                          </svg>
                                       </span>
                                       <span class="btn-title">Add by URL or ID</span>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div class="main-layout-header_account-menu">
                              <div class="account-menu-wrapper">
                                 <div id="clickrippleAccountMenuContainer" class="AccountMenu_AccountMenu">
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
                     <div class="page-layout_body">
                        <div class="page-layout_body-content">
                           <div  class="notification-messages" slot="notification-messages">
                              <!---->
                              <!---->
                           </div>
                           <div class="import-list-content">
                              <div class="o-banner o-banner-danger">
                                 <svg class="o-banner_icon-circle">
                                    <use xlink:href="#icon-danger-circle">
                                       <symbol id="icon-danger-circle" viewBox="0 0 20 20">
                                          <path d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm3.7 10.3a1 1 0 1 1-1.4 1.4L10 11.42l-2.3 2.3a1 1 0 0 1-1.4
                                             0 1 1 0 0 1 0-1.42L8.58 10l-2.3-2.3A1 1 0 1 1 7.7 6.3L10 8.58l2.3-2.3a1 1 0 1 1 1.4 1.42L11.42 10l2.3 2.3z"></path>
                                       </symbol>
                                    </use>
                                 </svg>
                                 <div class="o-banner_content">
                                    <div class="o-banner_content-wrapper">
                                       <!----->
                                       <div class="o-banner_content-body">
                                          Import to store action will be enabled when a store is assigned.
                                       </div>
                                    </div>
                                    <div class="o-banner_content-actions">
                                       <div class="action-btn">
                                          <button class="btn btn-basic btn-sm" type="button">
                                             <!---->
                                             <!---->
                                             <span class="btn-title">Connect a store</span>
                                             <!---->
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel import-list-filter">
                                 <form class="import-list-filter_form" method="GET">
                                    <div class="import-list-filter_input">
                                       <div class="input-block import-list-filter_title-input" label="Enter Keywords" placeholder="Enter Keywords" name="filter[keywords]" value="">
                                          <div class="input-field input-field-no-value input-field-has-label" placeholder="Enter Keywords" name="filter[keywords]">
                                             <!---->
                                             <input id="input-block" class="form-control" placeholder="Enter Keywords" name="filter[keywords]" type="text"/>
                                             <!---->
                                             <label class="label-control" for="input-block">
                                             Enter Keywords
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="import-list-filter_button">
                                       <button class="btn btn-basic btn-lg" type="submit">
                                          <!---->
                                          <!---->
                                          <span class="btn-title">Search</span>
                                          <!---->
                                       </button>
                                    </div>
                                 </form>
                              </div>
                              <div class="bulk-actions import-list_bulk-actions">
                                 <div class="bulk-actions-desktop">
                                    <div class="btn-group">
                                       <label class="bulk-actions_item btn btn-basic" for="showing 1 products">
                                       <input id="showing 1 products" class="bulk-actions_checkbox" type="checkbox"/>
                                       Showing 1 products
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="import-products">
                              <div class="panel import-product">
                              <div>
                                 <?php
                                        if(count($watchListData) > 0){
                                          for($index = 0; $index < count($watchListData); $index++){
                                 ?>
                                 

                                 <div class="panel-body import-list">
                                    <div class="tabs">
                                       <div class="tabs-header">
                                          <div class="tab-titles">
                                             <ul class="nav-tabs">
                                                <li class="">
                                                   <span class="for-checkbox">
                                                   <input type="checkbox">
                                                   </span>
                                                </li>
                                                <li class="tab-li  active" data-toggle="tabs-1">
                                                   <a class="tab-link "   href="#">
                                                   <span class="tab-link-border">
                                                   <span class="tab-link-background">
                                                   <span>Products</span>
                                                   </span>
                                                   </span>
                                                   </a>
                                                </li>
                                                <li class="tab-li " data-toggle="tabs-2">
                                                   <a class="tab-link"   href="#">
                                                   <span class="tab-link-border">
                                                   <span class="tab-link-background">
                                                   <span>Description</span>
                                                   </span>
                                                   </span>
                                                   </a>
                                                </li>
                                                <li class="tab-li " data-toggle="tabs-3">
                                                   <a class="tab-link"   href="#">
                                                   <span class="tab-link-border">
                                                   <span class="tab-link-background">
                                                   <span>Variants</span>
                                                   </span>
                                                   </span>
                                                   </a>
                                                </li>
                                                <li class="tab-li " data-toggle="tabs-4">
                                                   <a class="tab-link"   href="#">
                                                   <span class="tab-link-border">
                                                   <span class="tab-link-background">
                                                   <span>Images</span>
                                                   </span>
                                                   </span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                          <div class="tab-actions">
                                             <div class="-flex -flex-right">
                                                <div class="popover dropdown -padding-xs" data-trekkie-id="dropdown">
                                                   <span class="popover-wrapper">
                                                      <button class="dropdown_toggle btn btn-basic btn-regular btn-dropdown" type="button" tabindex="0">
                                                         <span class="btn-title">
                                                         <span class="dropdown_title">
                                                         <span>More actions</span>
                                                         </span>
                                                         </span>
                                                         <span class="btn-icon-wrap">
                                                            <svg class="icon-base">
                                                               <use xlink:href = "#icon-small-arrow-down">
                                                                  <symbol id="icon-small-arrow-down" viewBox="0 0 20 20">
                                                                     <path d="M13.7 8.3a1 1 0 0 0-1.4 0L10 10.58l-2.3-2.3A1 1 0 1 0 6.3 9.7l3 3a1 1 0 0 0 1.4 0l3-3a1 1 0 0 0 0-1.42z"></path>
                                                                  </symbol>
                                                               </use>
                                                            </svg>
                                                         </span>
                                                      </button>
                                                   </span>
                                                   <div class="popover-body popover-body-right">
                                                      <ul class="dropdown_list">
                                                         <li tabindex="-1">
                                                            <button class="btn btn-basic btn-regular btn-block" type="button" tabindex="0">
                                                            <span class="btn-title">
                                                            <span>Select Product to Override</span>
                                                            </span>
                                                            </button>
                                                         </li>
                                                         <li tabindex="-1">
                                                            <button class="btn btn-basic btn-regular btn-block" type="button" tabindex="0">
                                                            <span class="btn-title">
                                                            <span>Split Product</span>
                                                            </span>
                                                            </button>
                                                         </li>
                                                         <li tabindex="-1">
                                                            <button class="btn btn-basic btn-regular btn-block" type="button" tabindex="0">
                                                            <span class="btn-title">
                                                            <span>Remove Product</span>
                                                            </span>
                                                            </button>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                                <span class="-padding-xs">
                                                <button class="push-to-shop btn btn-primary btn-regular" type="button" disabled="disabled">
                                                <span class="btn-title">Import to store</span>
                                                </button>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tabs-body always-display">
                                          <div class="tab-content tabs-1" >
                                             <div class="product-main-tab">
                                                <div class="product-main-tab_image-container">
                                                   <div class="product-img">
                                                      <img class="import-list-main-tab_image" src=""alt="furniture">
                                                   </div>
                                                </div>
                                                <div class="product-main-tab_description">
                                                   <div class="product-main-tab_title-link">
                                                      <div class="product-main-tab_title-heading">original title :</div>
                                                      <div>
                                                         <a class="chevron-link" href="#">
                                                            View original product-card
                                                           
                                                         </a>
                                                      </div>
                                                   </div>
                                                   <div class="product-main-tab_title-text">
                                                      <img class="product-main-tab_logo" src="image/fur.png">
                                                      <span>
														<?php print_r($watchListData[$index]['productName']);?>
                                                      </span>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-xs-12 product-meta-wrapper -margin-bottom-xs">
                                                         <div class="supplier-info">
                                                            <span>
                                                               <!----->
                                                               <span class="supplier-info_name-prefix">by</span>
                                                               <a class="supplier-info_name-link" href="#">
                                                               <span class="supplier-info_name">Homeware Store (ClickRipple)</span>
                                                               </a>
                                                            </span>
                                                            <!---->
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="">
                                                      <div class="input-block product-main-tab_title-input" label="Change title" placeholder="Change title" maxlength="225" value="" >
                                                        <div class="input-field input-field-has-label" placeholder="Change title" maxlength="225">
                                      
                                                    <input name="change_title" value="<?php print_r($watchListData[$index]['productName']);?>" maxlength="255" id="input-block-cdb45960-3e70-11eb-ae62-d1bc52611a4c" type="text" class="form-control"> <!----> <!----> 
                                                    <label class="label-control" for="input-block">Change title</label>

                                                        </div>
                                                      </div>
                                                      <div>
                                                         <div>
                                                            <div class="multiselect" tabindex="-1" max-height="600">
                                                               <div class="multiselect_select"></div>
                                                               <div class="multiselect_tags">
                                                                  <div class="multiselect_tags-wrap">
                                                                     <div id="ajaxCollections" class="input-block multiselect_input" name="" autocomplete="off" placeholder="Choose collection" tabindex="0"
                                                                        style="position: absolute; z-index: -1; padding: 0px;">
                                                                        <div class="input-field input-field-no-value" name="" autocomplete="off" placeholder="Choose collections" tabindex="0">
                                                                           <input id="ajaxCollections" class="form-control" name="" autocomplete="off" placeholder="Choose collections" tabindex="0" type="text"/>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <span class="multiselect_placeholder">Choose collections</span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="product-type-tags">
                                                            <div class="multiselect-type">
                                                               <div class="multiselect" tabindex="-1" max-height="600">
                                                                  <div class="multiselect_select"></div>
                                                                  <div class="multiselect_tags">
                                                                     <div class="multiselect_tags-wrap">
                                                                        <div id="ajaxTypes" class="input-block multiselect_input" name="" autocomplete="off" placeholder="Choose type" tabindex="0"
                                                                           style="position: absolute; z-index: -1; padding: 0px;">
                                                                           <div class="input-field input-field-no-value" name="" autocomplete="off" placeholder="Choose type" tabindex="0">
                                                                              <input id="ajaxTypes" class="form-control" name="" autocomplete="off" placeholder="Choose type" tabindex="0" type="text"/>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <span class="multiselect_placeholder">Choose type</span>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="multiselect-tags">
                                                               <div class="multiselect" tabindex="-1" max-height="600">
                                                                  <div class="multiselect_select"></div>
                                                                  <div class="multiselect_tags">
                                                                     <div class="multiselect_tags-wrap">
                                                                        <div id="ajaxTags" class="input-block multiselect_input" name="" autocomplete="off" placeholder="Insert tags here" tabindex="0"
                                                                           style="position: absolute; z-index: -1; padding: 0px;">
                                                                           <div class="input-field input-field-no-value" name="" autocomplete="off" placeholder="Insert tags here" tabindex="0">
                                                                              <input id="ajaxTags" class="form-control" name="" autocomplete="off" placeholder="Insert tags here" tabindex="0" type="text"/>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <span class="multiselect_placeholder">Insert tags here</span>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="tab-content tabs-2" >
                                             <div class="tox tox-tinymce" role="aplication" style="visibility: hidden; height: 500px;" aria-disabled="false">
                                                <div class="text-editor-container">
                                                   <div class="tox-editor-header" data-alloy-vertical-dir="toptobottom">
                                                      <div class="tox-toolbar-overload" role="group" aria-disabled="false">
                                                         <div class="tox-toolbar_primary" role="group">
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="Source code" type="button" tabindex="-1" aria-disabled="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="nonzero">
                                                                           <path d="M9.8 15.7c.3.3.3.8 0 1-.3.4-.9.4-1.2 0l-4.4-4.1a.8.8 0 010-1.2l4.4-4.2c.3-.3.9-.3 1.2 0 .3.3.3.8
                                                                              0 1.1L6 12l3.8 3.7zM14.2 15.7c-.3.3-.3.8 0 1 .4.4.9.4 1.2 0l4.4-4.1c.3-.3.3-.9 0-1.2l-4.4-4.2a.8.8 0 00-1.2
                                                                              0c-.3.3-.3.8 0 1.1L18 12l-3.8 3.7z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="undo" type="button" tabindex="-1" aria-disabled="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="nonzero">
                                                                           <path d="M6.4 8H12c3.7 0 6.2 2 6.8 5.1.6 2.7-.4 5.6-2.3 6.8a1 1 0 01-1-1.8c1.1-.6 1.8-2.7 
                                                                              1.4-4.6-.5-2.1-2.1-3.5-4.9-3.5H6.4l3.3 3.3a1 1 0 11-1.4 1.4l-5-5a1 1 0 010-1.4l5-5a1 1 0 011.4 1.4L6.4 8z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <button class="tox-tbtn" aria-label="redo" type="button" tabindex="-1" aria-disabled="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="nonzero">
                                                                           <path d="M17.6 10H12c-2.8 0-4.4 1.4-4.9 3.5-.4 2 .3 4 1.4 4.6a1 1 0 11-1 1.8c-2-1.2-2.9-4.1-2.3-6.8.6-3 3-5.1
                                                                              6.8-5.1h5.6l-3.3-3.3a1 1 0 111.4-1.4l5 5a1 1 0 010 1.4l-5 5a1 1 0 01-1.4-1.4l3.3-3.3z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn tox-tbtn-select tox-tbtn-bespoke" aria-label="block" type="button" unselectable="on" tabindex="-1" style="user-select:none" aria-expanded="false">
                                                                  <span class="tox-tbtn_select-label">Paragraph</span>
                                                                  <div class="tox-tbtn_select-chevron">
                                                                     <svg width="10" height="10">
                                                                        <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2
                                                                           0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z" fill-rule="nonzero"></path>
                                                                     </svg>
                                                                  </div>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn tox-tbtn-enabled" aria-label="bold" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M7.8 19c-.3 0-.5 0-.6-.2l-.2-.5V5.7c0-.2 0-.4.2-.5l.6-.2h5c1.5 0 2.7.3 3.5 1 .7.6 1.1 1.4 1.1 2.5a3 3 0 01-.6 
                                                                              1.9c-.4.6-1 1-1.6 1.2.4.1.9.3 1.3.6s.8.7 1 1.2c.4.4.5 1 .5 1.6 0 1.3-.4 2.3-1.3 3-.8.7-2.1 1-3.8 1H7.8zm5-8.3c.6 0 1.2-.1
                                                                              1.6-.5.4-.3.6-.7.6-1.3 0-1.1-.8-1.7-2.3-1.7H9.3v3.5h3.4zm.5 6c.7 0 1.3-.1 1.7-.4.4-.4.6-.9.6-1.5s-.2-1-.7-1.4c-.4-.3-1-.4-2-.4H9.4v3.8h4z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <button class="tox-tbtn" aria-label="italic" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M16.7 4.7l-.1.9h-.3c-.6 0-1 0-1.4.3-.3.3-.4.6-.5 1.1l-2.1 9.8v.6c0 .5.4.8 1.4.8h.2l-.2.8H8l.2-.8h.2c1.1 0 1.8-.5
                                                                              2-1.5l2-9.8.1-.5c0-.6-.4-.8-1.4-.8h-.3l.2-.9h5.8z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <button class="tox-tbtn" aria-label="strikethrough" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M15.6 8.5c-.5-.7-1-1.1-1.3-1.3-.6-.4-1.3-.6-2-.6-2.7 0-2.8 1.7-2.8 2.1 0 1.6 1.8 2 3.2 2.3 4.4.9 4.6 2.8 4.6 3.9 0 1.4-.7 4.1-5 4.1A6.2
                                                                              6.2 0 017 16.4l1.5-1.1c.4.6 1.6 2 3.7 2 1.6 0 2.5-.4 3-1.2.4-.8.3-2-.8-2.6-.7-.4-1.6-.7-2.9-1-1-.2-3.9-.8-3.9-3.6C7.6 6 10.3 
                                                                              5 12.4 5c2.9 0 4.2 1.6 4.7 2.4l-1.5 1.1z"></path>
                                                                           <path d="M5 11h14a1 1 0 010 2H5a1 1 0 010-2z" fill-rule="nonzero"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <div class="tox-split-button" aria-label="background color" role="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class=" tox-tbtn" role="presentation" tabindex="-1" aria-disabled="false">
                                                                     <span class="tox-icon tox-tbtn_icon-wrap">
                                                                        <svg width="24" height="24">
                                                                           <g fill-rule="evenodd">
                                                                              <path id="tox-icon-highlight-bg-color_color" d="M3 18h18v3H3z"></path>
                                                                              <path d="M7.7 16.7H3l3.3-3.3-.7-.8L10.2 8l4 4.1-4 4.2c-.2.2-.6.2-.8 0l-.6-.7-1.1 1.1zm5-7.5L11 
                                                                                 7.4l3-2.9a2 2 0 012.6 0L18 6c.7.7.7 2 0 2.7l-2.9 2.9-1.8-1.8-.5-.6" fill-rule="nonzero"></path>
                                                                           </g>
                                                                        </svg>
                                                                     </span>
                                                                  </span>
                                                                  <span class="tox-tbtn tox-split-button_chevron" role="presentation" tabindex="-1" aria-disabled="false">
                                                                     <svg width="10" height="10">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z" fill-rule="nonzero"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="insert/edit link" type="button" tabindex="-1" aria-disabled="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="nonzero">
                                                                           <path d="M6.2 12.3a1 1 0 011.4 1.4l-2.1 2a2 2 0 102.7 2.8l4.8-4.8a1 1 0 000-1.4 1 1 0
                                                                              111.4-1.3 2.9 2.9 0 010 4L9.6 20a3.9 3.9 0 01-5.5-5.5l2-2zm11.6-.6a1 1 0 01-1.4-1.4l2-2a2 
                                                                              2 0 10-2.6-2.8L11 10.3a1 1 0 000 1.4A1 1 0 119.6 13a2.9 2.9 0 010-4L14.4 4a3.9 3.9 0 015.5 5.5l-2 2z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="insert/edit image" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="nonzero">
                                                                           <path d="M5 15.7l3.3-3.2c.3-.3.7-.3 1 0L12 15l4.1-4c.3-.4.8-.4 1 0l2 1.9V5H5v10.7zM5 18V19h3l2.8-2.9-2-2L5 
                                                                              17.9zm14-3l-2.5-2.4-6.4 6.5H19v-4zM4 3h16c.6 0 1 .4 1 1v16c0 .6-.4 1-1 1H4a1 1 0 01-1-1V4c0-.6.4-1 1-1zm6 8a2 2 0 100-4 2 2 0 000 4z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="align left" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h8c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0
                                                                              8h8c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2zm0-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <button class="tox-tbtn" aria-label="align center" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm3 4h8c.6 0 1 .4 1 1s-.4 1-1 1H8a1 1 0 110-2zm0 8h8c.6 0
                                                                              1 .4 1 1s-.4 1-1 1H8a1 1 0 010-2zm-3-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <button class="tox-tbtn" aria-label="align right" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm6 4h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 
                                                                              8h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm-6-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <button class="tox-tbtn" aria-label="justify" type="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 
                                                                              4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <div class="tox-split-button" aria-label="bullet list" role="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class=" tox-tbtn" role="presentation" tabindex="-1" aria-disabled="false" >
                                                                     <span class="tox-icon tox-tbtn_icon-wrap">
                                                                        <svg width="24" height="24">
                                                                           <path d="M11 5h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 6h8c.6 0 1 .4 
                                                                              1 1s-.4 1-1 1h-8a1 1 0 010-2zM4.5 6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1
                                                                              0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1zm0 6c0-.4.1-.8.4-1 .3-.4.7-.5 
                                                                              1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1zm0 
                                                                              6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 
                                                                              0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1z" fill-rule="evenodd"></path>
                                                                        </svg>
                                                                     </span>
                                                                  </span>
                                                                  <span class="tox-tbtn tox-split-button_chevron" role="presentation" tabindex="-1" aria-disabled="false">
                                                                     <svg width="10" height="10">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z" fill-rule="nonzero"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                               <div class="tox-split-button" aria-label="number list" role="button" tabindex="-1" aria-disabled="false" aria-pressed="false">
                                                                  <span class=" tox-tbtn" role="presentation" tabindex="-1" aria-disabled="false" >
                                                                     <span class="tox-icon tox-tbtn_icon-wrap">
                                                                        <svg width="24" height="24">
                                                                           <g fill-rule="evenodd">
                                                                              <path d="M10 17h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0-6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0-6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0
                                                                                 110-2zM6 4v3.5c0 .3-.2.5-.5.5a.5.5 0 01-.5-.5V5h-.5a.5.5 0 010-1H6zm-1 8.8l.2.2h1.3c.3 0 .5.2.5.5s-.2.5-.5.5H4.9a1 1 0
                                                                                 01-.9-1V13c0-.4.3-.8.6-1l1.2-.4.2-.3a.2.2 0 00-.2-.2H4.5a.5.5 0 01-.5-.5c0-.3.2-.5.5-.5h1.6c.5 0 .9.4.9 1v.1c0 .4-.3.8-.6
                                                                                 1l-1.2.4-.2.3zM7 17v2c0 .6-.4 1-1 1H4.5a.5.5 0 010-1h1.2c.2 0 .3-.1.3-.3 0-.2-.1-.3-.3-.3H4.4a.4.4 0 110-.8h1.3c.2 0
                                                                                 .3-.1.3-.3 0-.2-.1-.3-.3-.3H4.5a.5.5 0 110-1H6c.6 0 1 .4 1 1z" fill-rule="evenodd"></path>
                                                                           </g>
                                                                        </svg>
                                                                     </span>
                                                                  </span>
                                                                  <span class="tox-tbtn tox-split-button_chevron" role="presentation" tabindex="-1" aria-disabled="false">
                                                                     <svg width="10" height="10">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z" fill-rule="nonzero"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                               <button class="tox-tbtn tox-tbtn-disabled" aria-label="decrease indent" type="button" tabindex="-1" aria-disabled="true" >
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M7 5h12c.6 0 1 .4 1 1s-.4 1-1 1H7a1 1 0 110-2zm5 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm0 4h7c.6 0 1
                                                                              .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm-5 4h12a1 1 0 010 2H7a1 1 0 010-2zm1.6-3.8a1 1 0 01-1.2 1.6l-3-2a1 1 0 010-1.6l3-2a1
                                                                              1 0 011.2 1.6L6.8 12l1.8 1.2z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                               <button class="tox-tbtn" aria-label="increase" type="button" tabindex="-1" aria-disabled="false" >
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M7 5h12c.6 0 1 .4 1 1s-.4 1-1 1H7a1 1 0 110-2zm5 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm0 4h7c.6 0 
                                                                              1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm-5 4h12a1 1 0 010 2H7a1 1 0 010-2zm-2.6-3.8L6.2 12l-1.8-1.2a1 1 0 011.2-1.6l3
                                                                              2a1 1 0 010 1.6l-3 2a1 1 0 11-1.2-1.6z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="horizontal line" type="button" tabindex="-1" aria-disabled="false" >
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M4 11h16v2H4z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="clear formatting" type="button" tabindex="-1" aria-disabled="false" >
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M13.2 6a1 1 0 010 .2l-2.6 10a1 1 0 01-1 .8h-.2a.8.8 0 01-.8-1l2.6-10H8a1 1 0
                                                                              110-2h9a1 1 0 010 2h-3.8zM5 18h7a1 1 0 010 2H5a1 1 0 010-2zm13 1.5L16.5 18 15 19.5a.7.7 0 
                                                                              01-1-1l1.5-1.5-1.5-1.5a.7.7 0 011-1l1.5 1.5 1.5-1.5a.7.7 0 011 1L17.5 17l1.5 1.5a.7.7 0 01-1 1z"></path>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                            <div class="tox-toolbar_group" title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1">
                                                               <button class="tox-tbtn" aria-label="horizontal line" type="button" tabindex="-1" aria-disabled="false" >
                                                                  <span class="tox-icon tox-tbtn_icon-wrap">
                                                                     <svg width="24" height="24">
                                                                        <g fill-rule="evenodd">
                                                                           <path d="M12 5.5a6.5 6.5 0 00-6 9 6.3 6.3 0 001.4 2l1 1a6.3 6.3 0 003.6 1 6.5 6.5 0 006-9 6.3 6.3 0 
                                                                              00-1.4-2l-1-1a6.3 6.3 0 00-3.6-1zM12 4a7.8 7.8 0 015.7 2.3A8 8 0 1112 4z"></path>
                                                                           <path d="M9.6 9.7a.7.7 0 01-.7-.8c0-1.1 1.5-1.8 3.2-1.8 1.8 0 3.2.8 3.2 2.4 0 1.4-.4 
                                                                              2.1-1.5 2.8-.2 0-.3.1-.3.2a2 2 0 00-.8.8.8.8 0 01-1.4-.6c.3-.7.8-1 1.3-1.5l.4-.2c.7-.4.8-.6.8-1.5 0-.5-.6-.9-1.7-.9-.5 0-1 .1-1.4.3-.2 0-.3.1-.3.2v-.2c0
                                                                              .4-.4.8-.8.8z" fill-rule="nonzero"></path>
                                                                           <circle cx="12" cy="16" r="1"></circle>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="tox-anchorbar"></div>
                                                   </div>
                                                   <div class="tox-sidebar-wrap" >
                                                      <div class="tox-edit-area">
                                                         <iframe id="tiny-vue_18885963821609270016227_ifr" src="editor.html" class="tox-edit-area_iframe" allowtransparency="true" frameborder="0" >
                                                         </iframe>
                                                         <div class="tox-sidebar" role="complementary">
                                                            <div class="tox-sidebar_slider tox-sidebar-sliding-closed" data-alloy-tabstop="true" tabindex="-1" style="width: 0px;">
                                                               <div class="tox-sidebar_pane-container"></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="tox-statusbar">
                                                      <div class="tox-statusbar_text-container">
                                                         <div class="tox-statusbar_path" role="navigation" aria-disabled="false">
                                                            <div class="tox-statusbar_path-item" role="button" tabindex="-1" aria-level="1" aria-disabled="false">p</div>
                                                            <div class="tox-statusbar_path-divider" aria-hidden="true">>></div>
                                                            <div class="tox-statusbar_path-item" role="button" tabindex="-1" aria-level="2" aria-disabled="false">strong</div>
                                                         </div>
                                                         <button class="tox-statusbar_wordcount" type="button" tabindex="-1">66 words</button>
                                                         <span class="tox-statusbar_branding">
                                                         <a href="#" rel="noopener" tabindex="-1">Powered by tiny</a>
                                                         </span>
                                                      </div>
                                                      <div class="tox-statusbar_resize-handle" aria-hidden="true">
                                                         <svg width="10" height="10">
                                                            <g fill-rule="nonzero">
                                                               <path d="M8.1 1.1A.5.5 0 119 2l-7 7A.5.5 0 111 8l7-7zM8.1 5.1A.5.5 0 119 6l-3 3A.5.5 0 115 8l3-3z"></path>
                                                            </g>
                                                         </svg>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="tab-content tabs-3"  >
                                             <div class="import-list-variants-tab" >
                                                <div class="import-list-variants-tab_variants">
                                                   <div class="col-sm-5">
                                                      <div class="-flex -flex-middle auto-updating-switch">
                                                         <div class="auto-updating-switch_text">
                                                            <span>Automatically update price when cost changes</span>
                                                            <a target="_blank" href="#">Manage auto update setting (disabled)</a>
                                                         </div>
                                                         <div>
                                                            <div class="toggle auto-updating-switch_toggle-spacing toggle-disabled">
                                                               <svg class="toggle_icon toggle_icon-tick">
                                                                  <use xlink:href="#icon-toggle-tick">
                                                                     <symbol id="icon-toggle-tick" viewBox="0 0 8 6">
                                                                        <path d="M7.694 1.784L4 5.478a1.045 1.045 0 0 1-1.478 0l-.738-.74L.306 3.263a1.045 1.045 0 0
                                                                           1 1.478-1.478l1.477 1.478L6.216.306a1.045 1.045 0 0 1 1.478 1.478" fill="#FFF" fill-rule="evenodd" opacity="0.8"></path>
                                                                     </symbol>
                                                                  </use>
                                                               </svg>
                                                               <div class="toggle_handle"></div>
                                                               <svg class="toggle_icon toggle_icon-cross">
                                                                  <use xlink:href="#icon-toggle-cross">
                                                                     <symbol id="icon-toggle-cross" viewBox="0 0 8 8">
                                                                        <path d="M7.707 6.293a.999.999 0 1 1-1.414 1.414L4 5.414 1.707 7.707a.997.997 0 0 1-1.414 0 .999.999 0 0 1 0-1.414L2.586 4 .293 
                                                                           1.707A.999.999 0 1 1 1.707.293L4 2.586 6.293.293a.999.999 0 1 1 1.414 1.414L5.414 4l2.293 2.293z" fill="#FFF" fill-rule="evenodd" opacity="0.8"></path>
                                                                     </symbol>
                                                                  </use>
                                                               </svg>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-7"></div>
                                                </div>
                                                <div class="import-list-variants-tab_banners"></div>
                                                <div class="variants-table">
                                                   <table class="table-condensed variants-table_table">
                                                      <thead>
                                                         <tr>
                                                            <th class="variants-table_sticky variants-table_sticky-checkbox">
                                                               <input type="checkbox"/>
                                                            </th>
                                                            <th class="variants-table_sticky variants-table_sticky-img">Use all</th>
                                                            <th class="variants-table_sku">SKU</th>
                                                            <th class="variants-table_variants">Color</th>
                                                            <th class="variants-table_variants">Ships From</th>
                                                            <th>Cost</th>
                                                            <th class="variants-table_shipping">Shipping</th>
                                                            <th>Price</th>
                                                            <th>Profit</th>
                                                            <th class="variants-table_compare-at">Compare at price</th>
                                                            <th>Inventory</th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr class="row-action">
                                                            <td colspan="6"></td>
                                                            <td class="product-variants-bulk-actions_shipping-column">
                                                               <a class="product-variants-bulk-actions_shipping-modal-link" data-trekkie-id="product-variants:shipping-country"
                                                                  data-trekkie-country="unitedStates" href="#" title="united States">
                                                                  <svg class="product-variants-bulk-actions_link-icon icon-base">
                                                                     <use xlink:href="#icon-small-arrow-down">
                                                                        <symbol id="icon-small-arrow-down" viewBox>
                                                                           <path d="M13.7 8.3a1 1 0 0 0-1.4 0L10 10.58l-2.3-2.3A1 1 0 1 0 6.3 9.7l3 3a1 1 0 0 0 1.4 0l3-3a1 1 0 0 0 0-1.42z"></path>
                                                                        </symbol>
                                                                     </use>
                                                                  </svg>
                                                                  United States<br>
                                                                  <span class="product-variants-bulk-actions_link-small-text">Seller's Shipping Method</span>
                                                               </a>
                                                            </td>
                                                            <td>
                                                               <div class="float-left">
                                                                  <div class="change-all-prices">
                                                                     <div class="popover dropdown" data-trekkie-id="dropdown">
                                                                        <span class="popover-wrapper">
                                                                           <button class="dropdown_toggle btn btn-basic btn-sm btn-dropdown" type="button" tabindex="0">
                                                                              <span class="btn-title">
                                                                              <span class="dropdown_title">
                                                                              <span>Change All</span>
                                                                              </span>
                                                                              </span>
                                                                              <span class="btn-icon-wrap">
                                                                                 <svg class="icon-base">
                                                                                    <use xlink:href="#icon-small-arrow-down">
                                                                                       <symbol id="icon-small-arrow-down" viewBox>
                                                                                          <path d="M13.7 8.3a1 1 0 0 0-1.4 0L10 10.58l-2.3-2.3A1 1 0 1 0 6.3 9.7l3 3a1 1 0 0 0 1.4 0l3-3a1 1 0 0 0 0-1.42z"></path>
                                                                                       </symbol>
                                                                                    </use>
                                                                                 </svg>
                                                                              </span>
                                                                           </button>
                                                                        </span>
                                                                        <div class="popover-body popover-body-right">
                                                                           <ul class="dropdown_list">
                                                                              <li tabindex="-1">
                                                                                 <button class="btn btn-basic btn-regular btn-block" type="button" tabindex="0">
                                                                                 <span class="btn-title">
                                                                                 <span>Change All</span>
                                                                                 </span>
                                                                                 </button>
                                                                              </li>
                                                                              <li tabindex="-1">
                                                                                 <button class="btn btn-basic btn-regular btn-block" type="button" tabindex="0">
                                                                                 <span class="btn-title">
                                                                                 <span>Multiple by</span>
                                                                                 </span>
                                                                                 </button>
                                                                              </li>
                                                                           </ul>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                               <div class="float-left">
                                                                  <div class="change-all-prices">
                                                                     <div class="popover dropdown" data-trekkie-id="dropdown">
                                                                        <span class="popover-wrapper">
                                                                           <button class="dropdown_toggle btn btn-basic btn-sm btn-dropdown" type="button" tabindex="0">
                                                                              <span class="btn-title">
                                                                              <span class="dropdown_title">
                                                                              <span>Change All</span>
                                                                              </span>
                                                                              </span>
                                                                              <span class="btn-icon-wrap">
                                                                                 <svg class="icon-base">
                                                                                    <use xlink:href="#icon-small-arrow-down">
                                                                                       <symbol id="icon-small-arrow-down" viewBox>
                                                                                          <path d="M13.7 8.3a1 1 0 0 0-1.4 0L10 10.58l-2.3-2.3A1 1 0 1 0 6.3 9.7l3 3a1 1 0 0 0 1.4 0l3-3a1 1 0 0 0 0-1.42z"></path>
                                                                                       </symbol>
                                                                                    </use>
                                                                                 </svg>
                                                                              </span>
                                                                           </button>
                                                                        </span>
                                                                        <div class="popover-body popover-body-right">
                                                                           <ul class="dropdown_list">
                                                                              <li tabindex="-1">
                                                                                 <button class="btn btn-basic btn-regular btn-block" type="button" tabindex="0">
                                                                                 <span class="btn-title">
                                                                                 <span>Change All</span>
                                                                                 </span>
                                                                                 </button>
                                                                              </li>
                                                                              <li tabindex="-1">
                                                                                 <button class="btn btn-basic btn-regular btn-block" type="button" tabindex="0">
                                                                                 <span class="btn-title">
                                                                                 <span>Multiple by</span>
                                                                                 </span>
                                                                                 </button>
                                                                              </li>
                                                                           </ul>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </td>
                                                            <td colspan="2"></td>
                                                         </tr>
                                                         <tr class="">
                                                            <td class="variants-table_sticky variants-table_sticky-checkbox">
                                                               <input type="checkbox" value="1">
                                                               </input>
                                                            </td>
                                                            <td class="variants-table_sticky variants-table_sticky-img">
                                                               <div>
                                                                  <img class="variants-table_product-image" src="image/sofa-icon.png">
                                                               </div>
                                                            </td>
                                                            <td>
                                                               <input class="form-control" type="text" placeholder="" value ="<?php echo $watchListData[$index]['']; ?>">
                                                            </td>
                                                            <td>
                                                               <input class="form-control" type="text" placeholder="">
                                                            </td>
                                                            <td>
                                                               <input class="form-control" type="text" placeholder="Canada">
                                                            </td>
                                                            <td>
                                                               <div class="money-view">
                                                                  <div class="money-view_field money-view_field-original">
                                                                     <span>C$ <?php echo $watchListData[$index]['productPrice']; ?></span>
                                                                  </div>
                                                               </div>
                                                            </td>
                                                            <td>
                                                               <div class="money-view">
                                                                  <div class="money-view_field money-view_field-original">
                                                                     <span> C$<?php $shipping_charge= ?>50.20</span>
                                                                  </div>
                                                               </div>
                                                            </td>
                                                            <td>
                                                               <div class="input-group">
                                                                  <div class="money-input variants-table_price">
                                                                     <div class="input-block">
                                                                        <div class="input-field">
                                                                           <div class="form-control input-with-symbol">
                                                                              <span class="input-symbol">US$ </span>
                                                                              <input class="form-control" type="text" placeholder="<?php echo $watchListData[$index]['productPrice'] + $shipping_charge; ?>">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </td>
                                                            <td>
                                                               <span class="variants-table_column-negative">
                                                                  <div class="money-view">
                                                                     <div class="money-view_field money-view_field-original">
                                                                        <span></span>
                                                                     </div>
                                                                  </div>
                                                               </span>
                                                            </td>
                                                            <td>
                                                               <div class="input-group">
                                                                  <div class="money-input">
                                                                     <div class="input-block">
                                                                        <div class="input-field">
                                                                           <div class="form-control input-with-symbol input-empty">
                                                                              <span class="input-symbol"></span>
                                                                              <input class="form-control" type="text" placeholder="0.00"/>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </td>
                                                            <td class="variants-table_stock-left"><?php echo $watchListData[$index]['Stock']; ?> </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                                <div class="product-variants-tab_various-currency-link">
                                                   Here are some additional
                                                   <button class="btn btn-link btn-regular" type="button">
                                                   <span class="btn-title">details about price setting.</span>
                                                   </button>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="tab-content tabs-4">
                                             <div class="import-list-images-tab " >
                                                <div class="image-selector">
                                                   <div class="dropzone dz-clickable">
                                                      <ul class="image-selector_draggable">
                                                         <li class="image-selector_thumbnail">
                                                            <div class="product-image product-image-is-selected">
                                                               <div class="product-image_corner-marker">
                                                                  <span class="product-image_status-icon">
                                                                  </span>
                                                               </div>
                                                               <div class="product-image_overlay">
                                                                  <div class="product-image_actions">
                                                                     <button class="image-selector_product-image-button">
                                                                        <svg class="icon-base">
                                                                           <use xlink:href="#icon-view">
                                                                              <symbol id="icon-view" viewBox="0 0 20 20">
                                                                                 <path d="M17.8 9.1C16.4 6.1 13.4 4 10 4S3.6 6.1 2.2 9.1c-.3.6-.3 1.2 0 1.8 1.4 3 4.4 5.1 7.8 5.1s6.4-2.1 
                                                                                    7.8-5.1c.3-.6.3-1.2 0-1.8zM10 13c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z"></path>
                                                                              </symbol>
                                                                           </use>
                                                                        </svg>
                                                                     </button>
                                                                  </div>
                                                               </div>
                                                               <img class="product-image_img" src="image/sofa.jpg">
                                                            </div>
                                                         </li>
                                                         <li class="image-selector_thumbnail">
                                                            <div class="product-image product-image-is-selected">
                                                               <div class="product-image_corner-marker">
                                                                  <span class="product-image_status-icon">
                                                                  </span>
                                                               </div>
                                                               <div class="product-image_overlay">
                                                                  <div class="product-image_actions">
                                                                     <button class="image-selector_product-image-button">
                                                                        <svg class="icon-base">
                                                                           <use xlink:href="#icon-view">
                                                                              <symbol id="icon-view" viewBox="0 0 20 20">
                                                                                 <path d="M17.8 9.1C16.4 6.1 13.4 4 10 4S3.6 6.1 2.2 9.1c-.3.6-.3 1.2 0 1.8 1.4 3 4.4 5.1 7.8 5.1s6.4-2.1 
                                                                                    7.8-5.1c.3-.6.3-1.2 0-1.8zM10 13c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z"></path>
                                                                              </symbol>
                                                                           </use>
                                                                        </svg>
                                                                     </button>
                                                                  </div>
                                                               </div>
                                                               <img class="product-image_img" src="image/sofa.jpg">
                                                            </div>
                                                         </li>
                                                         <li class="image-selector_thumbnail">
                                                            <div class="product-image product-image-is-selected">
                                                               <div class="product-image_corner-marker">
                                                                  <span class="product-image_status-icon">
                                                                  </span>
                                                               </div>
                                                               <div class="product-image_overlay">
                                                                  <div class="product-image_actions">
                                                                     <button class="image-selector_product-image-button">
                                                                        <svg class="icon-base">
                                                                           <use xlink:href="#icon-view">
                                                                              <symbol id="icon-view" viewBox="0 0 20 20">
                                                                                 <path d="M17.8 9.1C16.4 6.1 13.4 4 10 4S3.6 6.1 2.2 9.1c-.3.6-.3 1.2 0 1.8 1.4 3 4.4 5.1 7.8 5.1s6.4-2.1 
                                                                                    7.8-5.1c.3-.6.3-1.2 0-1.8zM10 13c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z"></path>
                                                                              </symbol>
                                                                           </use>
                                                                        </svg>
                                                                     </button>
                                                                  </div>
                                                               </div>
                                                               <img class="product-image_img" src="image/sofa.jpg">
                                                            </div>
                                                         </li>
                                                         <li class="image-selector_thumbnail">
                                                            <div class="product-image product-image-is-selected">
                                                               <div class="product-image_corner-marker">
                                                                  <span class="product-image_status-icon">
                                                                  </span>
                                                               </div>
                                                               <div class="product-image_overlay">
                                                                  <div class="product-image_actions">
                                                                     <button class="image-selector_product-image-button">
                                                                        <svg class="icon-base">
                                                                           <use xlink:href="#icon-view">
                                                                              <symbol id="icon-view" viewBox="0 0 20 20">
                                                                                 <path d="M17.8 9.1C16.4 6.1 13.4 4 10 4S3.6 6.1 2.2 9.1c-.3.6-.3 1.2 0 1.8 1.4 3 4.4 5.1 7.8 5.1s6.4-2.1 
                                                                                    7.8-5.1c.3-.6.3-1.2 0-1.8zM10 13c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z"></path>
                                                                              </symbol>
                                                                           </use>
                                                                        </svg>
                                                                     </button>
                                                                  </div>
                                                               </div>
                                                               <img class="product-image_img" src="image/sofa.jpg">
                                                            </div>
                                                         </li>
                                                         <li class="image-selector_thumbnail">
                                                            <div class="product-image product-image-is-selected">
                                                               <div class="product-image_corner-marker">
                                                                  <span class="product-image_status-icon">
                                                                  </span>
                                                               </div>
                                                               <div class="product-image_overlay">
                                                                  <div class="product-image_actions">
                                                                     <button class="image-selector_product-image-button">
                                                                        <svg class="icon-base">
                                                                           <use xlink:href="#icon-view">
                                                                              <symbol id="icon-view" viewBox="0 0 20 20">
                                                                                 <path d="M17.8 9.1C16.4 6.1 13.4 4 10 4S3.6 6.1 2.2 9.1c-.3.6-.3 1.2 0 1.8 1.4 3 4.4 5.1 7.8 5.1s6.4-2.1 
                                                                                    7.8-5.1c.3-.6.3-1.2 0-1.8zM10 13c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z"></path>
                                                                              </symbol>
                                                                           </use>
                                                                        </svg>
                                                                     </button>
                                                                  </div>
                                                               </div>
                                                               <img class="product-image_img" src="image/sofa.jpg">
                                                            </div>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
								 
								 <?php
										  }
										}
								 ?>
                              </div>
                           </div>
						  
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         /* document.querySelector('.tabs').addEventListener('click', function (){
              $('.tabs-product').css("display","block");
              $('.tabs-variants').css("display","none");
              $('.tabs-description').css("display","none");
              $('.tabs-images').css("display","none");
          })
          document.querySelector('#variants').addEventListener('click', function (){
              $('.product-main-tab').css("display","none");
              $('.import-list-variants-tab').css("display","block");
         
          })*/
          $(document).ready(()=>{
         
              $(".always-display .tab-content").hide();
              $(".always-display .tab-content:first-child").show();
         
              $("ul li").click(function(){
                $("ul li").removeClass("active");
                $(this).addClass("active");
         
                var current_tab = $(this).attr("data-toggle");
                $(".always-display .tab-content").hide();
                $("."+current_tab).show();
              })
          })
         
         
      </script>
      <script>
         $(document).ready(function(){
           $(".dropdown_toggle").dropdown(toggle);
         });
      </script>
   </body>
</html>

