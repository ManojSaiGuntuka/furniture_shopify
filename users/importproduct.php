<?php
   include "./userFunctions.php";
   
   $UF = new UserFunctions();
   $shipping_charge =50;
   $watchListData = $UF->getWatchListProducts();
   
    if(isset($_POST['import_to_store'])){
   
       $UF = new UserFunctions();
   
         $product_name = $_POST['change_title'];
         $desc = $_POST['new_description'];
         $watch_list_id = $_POST['import_to_store'];
         $newPrice = $_POST['newPrice'];
         $productImage = $_POST['productImage'];
         $watchListId = $_POST['import_to_store'];
         $productColor = $_POST['productColor'];
         $profit = $_POST['profit_input'];
         $cur_pro_id = $_POST['item_id'];
   
      $addedToStore = $UF->addToStore($product_name, $desc, $productImage,$productColor, $newPrice, $watchListId, $cur_pro_id, $profit);
   
      if($addedToStore === false){
         print($addedToStore);
         ?>
<script>
   alert("You already have this product in your store")
   
</script>
<?php
   header("Refresh: 0");
   }
   
   
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
      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({selector:'textarea', height : "480"});</script>
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
                                 <a href="./user_index.php">
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
                                 <a href="./importproduct.php">
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
                                 <a href="./user_products.php">
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
                                 <form method = "post">
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
                                                         <input type="hidden" name="productImage" value="<?php echo $watchListData[$index]['productImage'];?>"/>
                                                         <img class="import-list-main-tab_image" name="productImage" src="./images/<?php echo $watchListData[$index]['productImage'];?>"alt="furniture">
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
                                                <textarea name="new_description"><?php echo $watchListData[0]['Description']?></textarea>
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
                                                                     <img class="variants-table_product-image" src="./images/<?php echo $watchListData[$index]['productImage']?>">
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <input class="form-control" type="text" placeholder="" value ="<?php echo $watchListData[$index]['vendor_id']; ?>">
                                                               </td>
                                                               <td>
                                                                  <input type="hidden" name="item_id" value=<?php echo $watchListData[$index]['productId']?>>
                                                                  <input class="form-control" type="text" name="productColor" value=<?php echo $watchListData[$index]['productColor']?>>
                                                               </td>
                                                               <td>
                                                                  <input class="form-control" type="text" placeholder="Canada">
                                                               </td>
                                                               <td>
                                                                  <div class="money-view">
                                                                     <div class="money-view_field money-view_field-original">
                                                                        C$ <span id = "price"><?php 
                                                                           $priceMargin = $UF->getMargin();
                                                                           $priceToAdd = $watchListData[$index]['productPrice']*((int)$priceMargin / 100);
                                                                           echo $watchListData[$index]['productPrice']+$priceToAdd;
                                                                           ?></span>
                                                                     </div>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="money-view">
                                                                     <div class="money-view_field money-view_field-original">
                                                                        C$ <span id="shippingCost"> 50.20</span>
                                                                     </div>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="input-group">
                                                                     <div class="money-input variants-table_price">
                                                                        <div class="input-block">
                                                                           <div class="input-field">
                                                                              <div class="form-control input-with-symbol">
                                                                                 <span class="input-symbol " >US$ </span>
                                                                                 
                                                                                 <input class="form-control customPrice" id="<?php echo $index?>" type="text" name="newPrice"  value="<?php 

                                                                                    $priceMargin = $UF->getMargin();
                                                                                    $priceToAdd = $watchListData[$index]['productPrice']*((int)$priceMargin / 100);
                                                                                    echo $watchListData[$index]['productPrice']+$priceToAdd + $shipping_charge; 
                                                                                    
                                                                                    ?>">
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="input-group">
                                                                     <div class="money-input">
                                                                        <div class="input-block">
                                                                           <div class="input-field">
                                                                              <div class="money-view_field money-view_field-original">
                                                                                 <input type="text" class="form-control customNewPrice" readonly id="profit_input" name="profit_input" value="0"/>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </td>
                                                               <td class="variants-table_stock-left" name="stock"><?php echo $watchListData[$index]['Stock']; ?> </td>
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
                                          <button type="submit" name="import_to_store" class="push-to-shop btn btn-primary btn-regular" value="<?php echo $watchListData[$index]['watchListId']?>" >
                                          Import To Store
                                          </button>
                                          <button type="submit" name="deleteFromWishList" class="push-to-shop btn btn-primary btn-regular" value="<?php echo $watchListData[$index]['watchListId']?>" />
                                          Delete From Watchlist
                                          </button>
                                       </div>
                                    </div>
                                 </form>
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
           
            $(".customPrice").on("change", function(){

               var price = $("#price").html();
               
               let shippingCost = $('#shippingCost').html();

               let newPrice = (parseFloat($(this).val()) - (parseFloat(price) + parseFloat(shippingCost))).toFixed(2)
               $("#profit_input").val(newPrice)
               console.log(shippingCost, price)

            });
            
         
         });
         
         
         
      </script>
   </body>
</html>