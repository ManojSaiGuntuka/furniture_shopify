<?php
 require_once("../inc/connect.php");

include "./userFunctions.php";
if (!empty($_GET)) {
        $pid = $_GET["pid"];
        $result = mysqli_query($conn, "SELECT * FROM products WHERE productId = $pid");

        
        $resultVendor = mysqli_query($conn, "SELECT DISTINCT r.retailer_id, r.retailer_name FROM products p, retailer r WHERE p.vendor_id = r.retailer_id && p.productId= $pid");
        $query2 =  mysqli_query($conn,"SELECT DISTINCT m.mat_id, m.mat_title FROM products p, material m WHERE p.mat_id = m.mat_id && p.productId= $pid");

    } else {
        header("location: home.php");
        exit;
    }

    $UF = new UserFunctions();

    $curProPrice = $UF->productDeatails($_GET['pid'])[0]['productPrice'];

   if(isset($_POST['onImport'])){
      $UF = new UserFunctions();
      
      $UF->insertIntoWatchList($_GET["pid"]);

      header("Location:./importproduct.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>ClickRipple</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <!--bootstrap css-->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="css/animate-wow.css">
      <!--main css-->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <link rel="stylesheet" href="css/slick.min.css">
      <link rel="stylesheet" href="css/select2.min.css">
      <!--responsive css-->
      <link rel="stylesheet" href="css/responsive.css">




      <style type="text/css">

         header .navbar {
   border-radius: 0px;
}

#header.top-head {
   background: #fff;
}

header .navbar-default {
   background-color: transparent;
   border: none;
   margin-bottom: 0px;
   position: relative;
   -webkit-box-shadow: 0 15px 19px -19px rgba(0, 0, 0, 0.1);
   box-shadow: 0 15px 19px -19px rgba(0, 0, 0, 0.1);
}

header .navbar-default .navbar-header {
   z-index: 1030;
   position: relative;
   background: #fff;
}

header .navbar {
   border-radius: 0px;
}

#header.top-head {
   background: #fff;
}

header .navbar-default {
   background-color: transparent;
   border: none;
   margin-bottom: 0px;
   position: relative;
   -webkit-box-shadow: 0 15px 19px -19px rgba(0, 0, 0, 0.1);
   box-shadow: 0 15px 19px -19px rgba(0, 0, 0, 0.1);
}

header .navbar-default .navbar-header {
   z-index: 1030;
   position: relative;
   background: #fff;
}
         
         .product-page {
   padding-bottom: 0px;
}

.product-page-main {
   background: #f4f9fd;
}

.prod-page-title {
   padding: 20px 0px;
}

.prod-page-title h2 {
   font-size: 25px;
   font-weight: 400;
   color: #333333;
   padding-bottom: 12px;
}

.prod-page-title p {
   margin: 0px;
   font-size: 13px;
   color: #ababab;
}

.prod-page-title p span {
   color: #3ba2ff;
}

.prod-page {
   margin-left: 0px;
}

.prod-page a {
   background: #ffffff;
   color: #333333;
   -webkit-box-shadow: 0 6px 10px -5px rgba(0, 0, 0, 0.1);
   box-shadow: 0 6px 10px -5px rgba(0, 0, 0, 0.1);
   border-radius: 2px;
   clear: both;
   text-align: center;
}

.md-prod-page {
   -webkit-box-shadow: 0 6px 10px -5px rgba(0, 0, 0, 0.1);
   box-shadow: 0 6px 10px -5px rgba(0, 0, 0, 0.1);
}

.md-prod-page-in {
   padding: 11px;
   background: #fff;
   border-bottom: 1px solid #f5f5f5;
}

.pof-text {}

.page-preview {}

.preview {
   display: -webkit-box;
   display: -webkit-flex;
   display: -ms-flexbox;
   display: flex;
   -webkit-box-orient: vertical;
   -webkit-box-direction: normal;
   -webkit-flex-direction: column;
   -ms-flex-direction: column;
   flex-direction: column;
}

@media screen and (max-width: 996px) {
   .preview {
      margin-bottom: 20px;
   }
}

.preview-pic {
   -webkit-box-flex: 1;
   -webkit-flex-grow: 1;
   -ms-flex-positive: 1;
   flex-grow: 1;
}

.preview-thumbnail.nav-tabs {
   border: none;
   margin-top: 15px;
}

.preview-thumbnail.nav-tabs li {
   width: 24%;
   margin: 0 0.5%;
}

.preview-thumbnail.nav-tabs li img {
   max-width: 100%;
   display: block;
}

.preview-thumbnail.nav-tabs li a {
   padding: 0;
   margin: 0;
   border-radius: 2px;
   border: 3px solid #ddd;
}

.preview-thumbnail.nav-tabs li:last-of-type {
   margin-right: 0;
}

.tab-content {
   overflow: hidden;
}

.preview-pic.tab-content {
   border: 3px solid #ddd;
   width: 99%;
   margin: 0.5%;
}

.tab-content img {
   width: 100%;
   -webkit-animation-name: opacity;
   animation-name: opacity;
   -webkit-animation-duration: .3s;
   animation-duration: .3s;
}

.preview-thumbnail.nav-tabs li.active a {
   border: 3px solid #01b888;
}

.btn-dit-list {
   padding-top: 30px;
}

.left-dit-p {
   float: left;
}

.right-dit-p {
   float: right;
}

.left-dit-p p {
   font-size: 11px;
   font-family: 'Raleway', sans-serif;
   font-weight: 300;
   color: #acacac;
   margin: 0px;
}

.right-dit-p .like-list {
   padding: 2px 0px;
}

.description-box {
   padding-top: 22px;
   padding-left: 11px;
   padding-right: 11px;
   padding-bottom: 10px;
   background: #fff;
}

.description-box h4 {
   font-size: 15px;
   font-weight: 700;
   padding-bottom: 10px;
}

.description-box p {
   margin-bottom: 0px;
   font-size: 14px;
   color: #626262;
   line-height: 24px;
}

.dex-a {
   padding-bottom: 25px;
}

.description-box h5 {
   font-size: 13px;
   font-weight: 700;
   padding-bottom: 0px;
   line-height: 34px;
   color: #585858;
   border-right: 1px solid #eeeeee;
}

.spe-a {
   padding-bottom: 25px;
}

.spe-a ul {
   margin: 0px;
   padding: 0px;
}

.spe-a ul li p {
   line-height: 34px;
}

.spe-a ul li {
   border-bottom: 1px solid #eeeeee;
}

.spe-a ul li .col-md-4 {
   padding-left: 0px;
}

.similar-box {
   padding: 40px 0px;
}

.similar-box h2 {
   font-size: 18px;
   color: #343331;
   font-weight: 700;
}

.price-box-right h4 {
   font-size: 16px;
   color: #333333;
   padding-bottom: 10px;
}

.price-box-right h3 {
   font-weight: 700;
   font-size: 21px;
   color: #092749;
   padding-bottom: 16px;
}

.price-box-right h3 span {
   font-size: 14px;
   font-weight: 400;
}

.price-box-right p {
   margin: 0px;
   padding-bottom: 6px;
   font-size: 12px;
}

.price-box-right {
   -webkit-box-shadow: 0 6px 10px -5px rgba(0, 0, 0, 0.1);
   box-shadow: 0 6px 10px -5px rgba(0, 0, 0, 0.1);
   padding: 23px;
   background: #fff;
}

.price-box-right .select2-container--default .select2-selection--single {
   border: 1px solid #dde1e0;
   height: auto;
   min-height: 30px;
}

.price-box-right .select2-container--default .select2-selection--single .select2-selection__arrow {
   border: 1px solid #bdc1c2;
   height: 28px;
   top: 4px;
   right: 5px;
   width: 12px;
}

.price-box-right .select2-container--default .select2-selection--single .select2-selection__arrow b {
   border-width: 4px 3px 0 3px;
   margin-left: -3px;
}

.price-box-right .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
   border-width: 0 3px 4px 3px;
   margin-left: -3px;
}

.price-box-right .select2-container--default .select2-selection--single .select2-selection__rendered {
   min-height: 35px;
   line-height: 32px;
}

.price-box-right .select2-container {
   width: 100%;
}

.price-box-right a {
   /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#00cb96+0,00be8e+100 */
   background: #00cb96;
   /* Old browsers */
   background: -moz-linear-gradient(top, #00cb96 0%, #00be8e 100%);
   /* FF3.6-15 */
   background: -webkit-linear-gradient(top, #00cb96 0%, #00be8e 100%);
   /* Chrome10-25,Safari5.1-6 */
   background: linear-gradient(to bottom, #00cb96 0%, #00be8e 100%);
   /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00cb96', endColorstr='#00be8e', GradientType=0);
   /* IE6-9 */
   color: #fff;
   font-size: 15px;
   font-weight: 700;
   border: 1px solid #01b888;
   padding: 12px 0px;
   display: block;
   margin-top: 18px;
   border-radius: 3px;
   text-align: center;
}

.price-box-right h5 {
   color: #5a5a5a;
   font-size: 14px;
   padding-top: 14px;
   padding-bottom: 35px;
}

.price-box-right ul {
   width: 150px;
}

.price-box-right ul li {
   overflow: auto;
}

.price-box-right ul li p {
   float: left;
   margin: 0px;
   padding: 0px;
   color: #333333;
}

.price-box-right ul li span {
   float: right;
   font-weight: 700;
   color: #333333;
}

/*-- New Layout css --*/

.start-free-box div.container {
   position: relative;
}

.bg_img_left {
   background-position: 142% center;
   background-size: auto 100%;
   background-repeat: no-repeat;
   padding: 0;
   position: absolute;
   right: -45%;
}

.bg_img_right {
   background-position: 142% center;
   background-size: auto 100%;
   background-repeat: no-repeat;
   padding: 0;
   position: absolute;
   left: -45%;
}

.bg_img_left img,
.bg_img_right img {
   width: 100%;
}
      </style>
   </head>
   <body>
       <header id="header" class="top-head">
         <!-- Static navbar -->
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-4 col-sm-12 left-rs">
                     <div class="navbar-header">
                        <a href="home.php" class="navbar-brand"><img src="images/clickripple.png" alt="" style="width: 65%" /></a>
                        <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"> 
                        <span class="sr-only"> Apple</span> 
                        <span class="icon-bar">Orange</span> 
                        <span class="icon-bar">Mango</span> 
                        <span class="icon-bar"></span> 
                        </button>

                     </div>
                    
                  </div>
                  <div class="col-md-8 col-sm-12">
                     
                  </div>
               </div>
            </div>
            <!--/.container-fluid --> 
         </nav>
      </header>
      <!-- Modal -->

      <div class="product-page-main">
         


         

         <div class="container">

            <?php
            
            while($row=mysqli_fetch_array($result)){


            
               ?>
            <div class="row">
               <div class="col-md-12">
                  
                  <div class="prod-page-title">
                     <h2><?php echo $row['productName'] ?></h2>
                     
                  </div>

                  
               </div>
            </div>

            
            <div class="row">
               <div class="col-md-2 col-sm-4">
                  <div class="left-profile-box-m prod-page">
                     <div class="pro-img">
                        <img src="images/150x150.png" alt="#" />
                     </div>
                     <div class="pof-text">
                        <h3></h3>
                        <div class="check-box"></div>
                     </div>
                     <a href="#"></a>
                  </div>
               </div>
               <div class="col-md-7 col-sm-8">
                  <div class="md-prod-page">
                     <div class="md-prod-page-in">
                        <div class="page-preview">
                           <div class="preview">
                              <div class="preview-pic tab-content">
                                 <div class="tab-pane active" id="pic-1"><img src="images/<?php echo $row['productImage']?>" alt="#" /></div>
                                 <div class="tab-pane" id="pic-2"><img src="images/<?php echo $row['productImage']?>" alt="#" /></div>
                                 <div class="tab-pane" id="pic-3"><img src="images/<?php echo $row['productImage']?>" alt="#" /></div>
                                 <div class="tab-pane" id="pic-4"><img src="images/<?php echo $row['productImage']?>" alt="#" /></div>
                              </div>
                              <ul class="preview-thumbnail nav nav-tabs">
                                 <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="images/<?php echo $row['productImage']?>"alt="#" /></a></li>
                                 <li><a data-target="#pic-2" data-toggle="tab"><img src="images/<?php echo $row['productImage']?>"alt="#" /></a></li>
                                 <li><a data-target="#pic-3" data-toggle="tab"><img src="images/<?php echo $row['productImage']?>" alt="#" /></a></li>
                                 <li><a data-target="#pic-4" data-toggle="tab"><img src="images/<?php echo $row['productImage']?>" alt="#" /></a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="btn-dit-list clearfix">
                           <div class="left-dit-p">
                              <div class="prod-btn">
                                 <a href="#"><i class="fa fa-star" aria-hidden="true"></i> Save to wishlist</a>
                                 <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like this</a>
                                 <p>23 likes</p>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <div class="description-box">
                        <div class="dex-a">
                           <h4>Description</h4>
                           <p><?php echo $row['Description']?>
                           </p>
                           <br>
                           <p>Small: H 25 cm / &Oslash; 12 cm</p>
                           <p>Large H 24 cm / &Oslash; 25 cm</p>
                        </div>
                        <div class="spe-a">
                           <h4>Specifications</h4>
                           <ul>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>Measurments</h5>
                                 </div>
                                 <div class="col-md-8">
                                    <p>H25 cm / 0 12 cm and H 24 cm / 0 25 cm</p>
                                 </div>
                              </li>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>Material</h5>
                                 </div>

                                 <div class="col-md-8">
                                 <?php
                                    while($row3= mysqli_fetch_array($query2)){
                                      ?>
                                        
                                    <H1><?php echo $row3['mat_title']?></H1>
                                    <?php
                                    }
                                    ?>
                                 </div>
                              </li>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>Wire</h5>
                                 </div>
                                 <div class="col-md-8">
                                    <p>Wire Name</p>
                                 </div>
                              </li>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>Comdition</h5>
                                 </div>
                                 <div class="col-md-8">
                                    <p>Brand new</p>
                                 </div>
                              </li>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>SKU number</h5>
                                 </div>
                                 <div class="col-md-8">
                                    <p>SKU number</p>
                                 </div>
                              </li>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>Shipping</h5>
                                 </div>
                                 <div class="col-md-8">
                                    <p>Shipping worldwide</p>
                                 </div>
                              </li>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>Warranty</h5>
                                 </div>
                                 <div class="col-md-8">
                                    <p>1 years</p>
                                 </div>
                              </li>
                              <li class="clearfix">
                                 <div class="col-md-4">
                                    <h5>Delivery</h5>
                                 </div>
                                 <div class="col-md-8">
                                    <p>Choose country</p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  
               </div>
               <div class="col-md-3 col-sm-12">
                  <div class="price-box-right">
                     <h4>Price</h4>
                     <h3><?php 
                     
                        $priceMargin = $UF->getMargin();
                        $priceToAdd = $curProPrice*((int)$priceMargin / 100);
                        echo $curProPrice+$priceToAdd;

                     ?><span> &nbsp;pr.peice</span></h3>
                     <p>Option</p>
                     <select class="form-control select2">
                        <option>Shipping</option>
                        <option value="US">USA</option>
                        <option value="CA">CANADA</option>
                        
                     </select>
                     <form method="POST">
                        <input type="submit" value="Add To Import List" name="onImport" class="btn btn-primary btn-regular btn-block"/>
                     </form>
                     <h5><i class="fa fa-clock-o" aria-hidden="true"></i> <strong>16 hours</strong> avg. responsive time</h5>
                  </div>
               </div>
            </div>
         </div>
      
      </div>

      <?php
         }
         ?>
      <footer>
         
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-8">
                     <p><img width="90" src="images/clickripple.png" alt="#" style="margin-top: -5px; background-color: white;width: 50%" /> All Rights Reserved. ClickRipple © 2020</p>
                  </div>
                  
               </div>
            </div>
         </div>
      </footer>
      <!--main js--> 
      <script src="js/jquery-1.12.4.min.js"></script> 
      <!--bootstrap js--> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/bootstrap-select.min.js"></script>
      <script src="js/slick.min.js"></script> 
      <script src="js/select2.full.min.js"></script> 
      <script src="js/wow.min.js"></script> 
      <!--custom js--> 
      <script src="js/custom.js"></script>
   </body>
</html>