<?php

  include "./userFunctions.php";
  
  $UF = new UserFunctions();

  $store_data = $UF->getStoreData();

  if(isset($_POST['remove_from_store'])){

    $UF = new UserFunctions();
    $UF->deleteFromStore($_POST['remove_from_store']);
    
  }

  function counter($store_data){
    if(count($store_data) < 1){
      echo '<h2>Currently You Have 0 Products</h2>';
    }
      else{
        ?><h2>You have <?php echo count($store_data)?> Products In Your Store</h2><br/><br/><?php
      }
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
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <script src="js/owl.carousel.js"></script>
    <script src="js/owl.navigation.js"></script>
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
                      <a href="user_index.php">
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
        <div id="page-content" class="page-layout_content">
          <div id="page-content" class="page-layout_content">
            <div class="page-layout_content-container">
              <div class="page-layout_header">
                <div class="main-layout-header">
                  <div class="main-layout-header_title">
                    <div class="main-layout-header_logo-wrapper">
                      <img class="main-layout-header_logo" src="image/fur.png" />
                    </div>
                    <h2>clickripple</h2>
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
                  <div>
                    <div>
                        <div class="my-products__filters panel">
                           <div class="panel-body align-center">
                              <div class="my-products__filter">
                                 <div class="input-field my-products__filter-item my-products__filter-item--keywords"><input type="text" placeholder="Enter Keywords" class="form-control"></div>
                                 <div class="input-field my-products__filter-item">
                                    <select class="form-control">
                                       <option value="0">
                                          Price updates: All
                                       </option>
                                       <option value="1">
                                          Price updates: On
                                       </option>
                                       <option value="2">
                                          Price updates: Off
                                       </option>
                                    </select>
                                 </div>
                                 <div class="input-field my-products__filter-item">
                                    <select class="form-control">
                                       <option value="0">
                                          Status: All
                                       </option>
                                       <option value="1">
                                          Status: Removed from Shopify
                                       </option>
                                       <option value="2">
                                          Status: Gone from supplier
                                       </option>
                                    </select>
                                 </div>
                                 <!----> 
                                 <div class="my-products__filter-item">
                                    <button type="button" class="btn btn-basic btn-lg btn-block">
                                       <!----> <!----> <span class="btn-title">
                                       Filter
                                       </span> <!---->
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                                                <!----------------------------------------------------first will start------------------------------------------------->

                          <div class="product-collection-carousel">
                            <header class="product-collection-carousel_header">
                              <h3>Product Watch</h3>
                            </header>
                            <div class="product-collection-carousel_carousel">
                              <div class="product-collection-carousel_product-cards">
                                <?php
                                  counter($store_data);
                                ?>
                                <ul>
                                <?php 

                                  
                                    foreach($store_data as $product){
                                ?>

                                  <li>
                                    <div class="product-card-wrapper">
                                      <div class="panel expanding-panel product-card">
                                        <div class="panel-header-with-image">
                                          <div class="product-card_anchor">
                                            <img src="./images/<?php echo $product['productImage']?>" alt="" />
                                          </div>
                                          <div class="discount-notice">
                                            <span class="old-price"><!--C <?php echo $product['productPrice']?>--></span>
                                            <span class="new-discount"></span>
                                          </div>
                                        </div>
                                        <div class="panel-body">
                                          <div class="" style="max-height: none">
                                            <div class="product-card_meta">
                                              <div class="product-card-meta">
                                                <div class="product-card-title">
                                                  <a class="product-card-link">
                                                    <?php echo $product['productName']?>
                                                  </a>
                                                </div>
                                              </div>
                                              <div class="product-price-wrapper">
                                                <h4>
                                                  <span class="product-card-price">C$ <?php echo $product['productPrice']?></span><br>
                                                  Profit : <span class="product-card-price">C$ <?php echo $product['profit']?></span>
                                                </h4>
                                              </div>
                                              <span class="product-card-subtitle">
                                                <div>
                                                  <div class="product-shipping-info">
                                                    Choose shipping country
                                                  </div>
                                                </div>
                                              </span>
                                              <div>
                                                <div class="product-card_reviews">
                                                  <div>
                                                    <svg class="icon-star"></svg>
                                                    <svg class="icon-star"></svg>
                                                    <svg class="icon-star"></svg>
                                                    <svg class="icon-star"></svg>
                                                    <svg class="icon-star"></svg>
                                                  </div>
                                                  <label class="product-card_reviews-count">Stock-<?php echo $product['Stock'] ?></label>
                                                </div>
                                                
                                                
                                              </div>
                                            </div>
                                            <form method="POST">
                                              <button type="submit" name="remove_from_store" class="push-to-shop btn btn-primary btn-regular" value="<?php echo $product['productId']?>" />
                                                    Remove From Store
                                              </button>
                                            </form>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                  </li>
                                  <?php

                                }
                                ?>

                                </ul>
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