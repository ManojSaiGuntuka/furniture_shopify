
<?php

  include("./userFunctions.php");

  $UF = new UserFunctions();

  $getAllProductsQuery = "select * from products";
  $products = $UF->getConnection()->query($getAllProductsQuery);

  if(isset($_POST['addToImportList'])){
    
    $UF->insertIntoWatchList($_POST['addToImportList']);

    header("location: ./importproduct.php");

  }

  if (isset($_POST['logout'])){
    session_destroy();
    header("Location: http://ankits-macbook-air.local/furniture/"); 
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/sidenav_style.css" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <script src="js/owl.carousel.js"></script>
  <script src="js/owl.navigation.js"></script>
  <title>Find Product</title>
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
                      <a href="./order.php">
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
                      <form method="post">
                        <input type=submit class="nav-item_title" name="logout" value="Logout"/>
                      </form>
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
                  <div class="main-layout-header_middle">
                    <div class="main-layout-header_content">
                      <form class="product-searchbar">
                        <div id="keywords" class="input-block product-searchbar_input product-searchbar-has-icon"
                          placeholder="Search products" type="search" value="">
                          <div class="input-field input-field-no-value input-group" placeholder="Search products">
                            <input id="keywords" class="form-control" placeholder="Serach products" type="search" />

                            <div class="product-searchbar_addon-wrapper">
                              <svg class="product-searchbar_icon icon-base" aria-hidden="true">
                                <use xlink:href="#icon-sidebar-search">
                                  <symbol id="icon-sidebar-search" viewBox="0 0 20 20">
                                    <path
                                      d="M17.7 16.3l-3.1-3.11A6.94 6.94 0 0 0 16 9 6.96 6.96 0 0 0 4.05 4.05a6.96 6.96 0 0 0 0 9.9A6.96 6.96 0 0 0 9 16a6.94 6.94 0 0 0 4.19-1.4l3.1 3.1a1 1 0 0 0 1.42 0 1 1
                                     0 0 0 0-1.4zm-5.16-3.76a4.97 4.97 0 0 1-7.07 0 4.97 4.97 0 0 1 0-7.08 4.96 4.96 0 0 1 7.07 0 4.97 4.97 0 0 1 0 7.08z" />
                                  </symbol>
                                </use>
                              </svg>
                              <div class="popover dropdown product-searchbar_dropdown" data-trekkie-id="dropdown">
                                <span class="popover-wrapper">
                                  <button class="dropdown_toggle btn btn-basic btn-regular btn-dropdown" type="button"
                                    tabindex="0">
                                    <span class="btn-title">
                                      <span class="dropdown_title">
                                        <span>in All Categories</span>
                                      </span>
                                    </span>
                                    <span class="btn-icon-wrap">
                                      <svg class="icon-base">
                                        <use xlink:href="#icon-small-arrow-down">
                                          <symbol id="icon-small-arrow-down" viewBox="0 0 20 20">
                                            <path
                                              d="M13.7 8.3a1 1 0 0 0-1.4 0L10 10.58l-2.3-2.3A1 1 0 1 0 6.3 9.7l3 3a1 1 0 0 0 1.4 0l3-3a1 1 0 0 0 0-1.42z" />
                                          </symbol>
                                        </use>
                                      </svg>
                                    </span>
                                  </button>
                                </span>
                                <div class="popover-body popover-body-right">
                                  <ul class="dropdown_list">
                                    <li tabindex="-1">
                                      <button class="btn btn-basic btn-regular btn-block active" type="button"
                                        tabindex="0">
                                        <span class="btn-title">
                                          <span>All Categories</span>
                                        </span>
                                      </button>
                                    </li>
                                  </ul>
                                  <ul class="dropdown_list">
                                    <li tabindex="-1">
                                      <button class="btn btn-basic btn-regular btn-block active" type="button"
                                        tabindex="0">
                                        <span class="btn-title">
                                          <span>tables</span>
                                        </span>
                                      </button>
                                    </li>
                                    <li tabindex="-1">
                                      <button class="btn btn-basic btn-regular btn-block active" type="button"
                                        tabindex="0">
                                        <span class="btn-title">
                                          <span>chairs</span>
                                        </span>
                                      </button>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-primary btn-lg" type="button">
                          <span class="btn-title">Search</span>
                        </button>
                      </form>
                    </div>
                    <div class="main-layout-header_actions">
                      <!------>
                      <!------->
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
                  <div>
                    <div>
                      <div class="product-search-landing" search-title="search Products">
                        <div class="panel featured-categories product-search-landing_featured-categories">
                          <div class="panel-body">
                            <ul class="categories-list">
                              <li class="featured">

                                <button class="margin btn" type="button">
                                  <svg class="icon-lg">
                                    <use xlink:href="#chairs">
                                      <symbol id="chairs" viewBox="0 0 40 40">
                                        <g>
                                          <path id="Transparent" d="M9 29h2v2H9v-2zm4 0h2v2h-2v-2zm12 0h2v2h-2v-2zm4 0h2v2h-2v-2zM9 25h2v2H9v-2zm4 0h2v2h-2v-2zm12 0h2v2h-2v-2zm4 
                                              0h2v2h-2v-2zM9 21h2v2H9v-2zm4 0h2v2h-2v-2zm12 0h2v2h-2v-2zm4 0h2v2h-2v-2zM9 17h2v2H9v-2zm20 0h2v2h-2v-2zM9 13h2v2H9v-2zm20
                                               0h2v2h-2v-2zm-12-3h6l-3.05 4.02L17 10z" opacity="0.2"></path>
                                          <path id="shape1"
                                            d="M31 7a3 3 0 0 1 3 3v22a3 3 0 0 1-3 3h-8.33L20 37l-2.67-2H9a3 3 0 0 1-3-3V10a3 3 0 0 1 3-3h.61l.44-1.32.02-.04.04-.07a1 1 0
                                               0 1 .16-.25l.04-.04a.98.98 0 0 1 .28-.19l.06-.02c.1-.04.22-.07.34-.07H29a1 1 0 0 1 .34.07l.06.02c.1.05.2.11.28.2.02 0
                                                .02.02.04.03.06.07.12.16.16.25l.04.07.02.04.44 1.32H31zm-7.41 3H16.4l3.6 3.59L23.59 10zm4.97-2.15l-7.2 7.2 2.02 2.3
                                                 5.52-8.5-.34-1zm-17.46 1l5.52 8.5 2.01-2.3-7.2-7.2-.33 1zM31 9h-.02a1 1 0 0 1-.14.54l-6.5 10a1 1 0 0 1-1.6.12l-.18-.22-1.76
                                                  1.76L23.75 33H31a1 1 0 0 0 1-1V10a1 1 0 0 0-1-1zM17.44 19.44l-.19.22a1 1 0 0 1-1.59-.12l-6.5-10A.98.98 0 0 1 9.02 9H9a1 1
                                                   0 0 0-1 1v22a1 1 0 0 0 1 1h7.25l2.95-11.8-1.76-1.76zM26.6 7H13.4l1.05 1.05a.47.47 0 0 1 .2-.05h10.67c.07 0 .14.02.2.05L26.6 7z">
                                          </path>
                                        </g>
                                      </symbol>
                                    </use>
                                  </svg>
                                  <span class="featured-categories_title">chairs</span>
                                </button>

                              </li>
                              <li class="featured">

                                <button class="margin btn" type="button">
                                  <svg class="icon-lg">
                                    <use xlink:href="#chairs">
                                      <symbol id="chairs" viewBox="0 0 40 40">
                                        <g>
                                          <path id="Transparent"
                                            d="M15.93 18.31l-2.14-2.14A9.94 9.94 0 0 1 19 14.05v3.03c-1.13.16-2.18.6-3.07 1.23zM14.4 28.2l-2.14 
                                              2.14A9.95 9.95 0 0 1 10.05 25h3.03a6.95 6.95 0 0 0 1.32 3.19zm9.9 1.32l2.14 2.14a9.95 9.95 0 0 1-5.44 
                                              2.3v-3.03a6.96 6.96 0 0 0 3.3-1.4zM29.95 23h-3.03a6.95 6.95 0 0 0-1.32-3.19l2.14-2.14a9.94 9.94 0 0 1 2.2 5.33z"
                                            opacity="0.2"></path>
                                          <path id="shape1" d="M22 10a2 2 0 0 1-4 0l.01-.1A2 2 0 0 1 19.98 8h.04a2 2 0 0 1 1.97 1.9l.01.1zm2.19 8.4c-.92-.69-2-1.15-3.19-1.32v-3.03c2.01.2
                                               3.85 1 5.33 2.2l-2.14 2.15zm2.73 4.6a6.96 6.96 0 0 0-1.32-3.19l2.14-2.14a9.94 9.94 0 0 1 2.2 5.33h-3.02zm-1.23 5.07A6.95 
                                               6.95 0 0 0 26.92 25h3.03a9.94 9.94 0 0 1-2.12 5.2l-2.14-2.13zM21 30.92a6.97 6.97 0 0 0 3.3-1.4l2.14 2.13a9.95 9.95 0 0
                                                1-5.44 2.3v-3.03zm-5.19-1.32c.92.69 2 1.15 3.19 1.32v3.03c-2.01-.2-3.85-1-5.33-2.2l2.14-2.15zM13.08 25a6.96 6.96 0 0
                                                 0 1.32 3.19l-2.14 2.14A9.95 9.95 0 0 1 10.05 25h3.03zm1.4-5.3a6.95 6.95 0 0 0-1.4 3.3h-3.03a9.95 9.95 0 0 1 2.3-5.44l2.14 
                                                 2.14zM19 17.07c-1.13.16-2.18.6-3.07 1.23l-2.14-2.14A9.95 9.95 0 0 1 19 14.05v3.03zm3.75 2.75a5.01 5.01 0 0 1 .88 7.59 4.97
                                                  4.97 0 0 1-7.8-.67 4.97 4.97 0 0 1 .75-6.38A5.13 5.13 0 0 1 20 19c1.02 0 1.96.3 2.75.83zM33.01 3.5a1 1 0 0 0-1.78-.92c-1.27
                                                   2.49-4.28 4.39-7.98 5.1a3.99 3.99 0 0 0-6.5 0c-3.72-.71-6.74-2.63-8-5.13a1 1 0 1 0-1.79.9C8.5 6.47 11.9 8.7
                                                    16.04 9.58c-.01.14-.04.28-.04.42 0 .92.32 1.76.84 2.43a12 12 0 1 0 6.31 0A3.9 3.9 0 0 0 24 
                                                    10c0-.14-.03-.28-.04-.42C28.08 8.71 31.48 6.5 33 3.5z"></path>
                                        </g>
                                      </symbol>
                                    </use>
                                  </svg>
                                  <span class="featured-categories_title">chairs</span>
                                </button>

                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                              <li class="featured">
                                <button>
                                  <button class="margin btn" type="button">
                                    <svg class="icon-lg"></svg>
                                    <span class="featured-categories_title">chairs</span>
                                  </button>
                                </button>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div>
                          <!----------------------------------------------------first will start------------------------------------------------->

                          <!--------------------------------------- next will start----------------------------------------------------------------------------->

                          <div class="product-collection-carousel">
                            <header class="product-collection-carousel_header">
                              <h3>Product Watch</h3>
                            </header>
                
                            <div class="product-collection-carousel_carousel">
                              <div class="product-collection-carousel_product-cards">
                                <ul>
                                  
                                  <?php foreach($products as $product) {?>
                                  <li>
                                    <div class="product-card-wrapper">
                                      <div class="panel expanding-panel product-card">
                                        <div class="panel-header-with-image">
                                          <div class="product-card_anchor">
                                            <img src="./images/<?php echo $product['productImage']?>" alt="sofa" />
                                          </div>
                                          <div class="discount-notice">
                                            <span class="old-price">US $5.87 - $15.65</span>
                                            <span class="new-discount">30% off</span>
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
                                                  <span class="product-card-price">US $4 - $11</span>
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
                                                  <label class="product-card_reviews-count">(112)</label>
                                                </div>
                                                <div class="product-card_stat">
                                                  <div class="product-card_stat-name">
                                                    Imports
                                                  </div>
                                                  <div class="product-card_stat-value">
                                                    2756
                                                  </div>
                                                </div>
                                                <div class="product-card_stat">
                                                  <div class="product-card_stat-name" aria-describedby="tootltip_w">
                                                    Orders
                                                  </div>
                                                  <div class="product-card_stat-value">
                                                    756
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="product-card-actions">
                                              <form method="post">
                                                <button type="submit" class="btn btn-primary btn-regular btn-block btn-title" type="button"
                                                  value=<?php echo $product['productId']?> name="addToImportList">
                                                  Add To Import List
                                                </button>
                                              
                                            </div>

                                            <br/>
                                            <a
                                              class="btn btn-primary btn-regular btn-block btn-title" type="button"
                                              href="./product_detail.php?pid=<?php echo $product['productId']?>">
                                               View This Product</a>
                                              </form>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                  <?php } ?>
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