<?php include "../inc/connect.php"; include "./adminFunctions.php"?>
<?php include "includes/admin_header.php" ?>
<div id="wrapper">
<?php include "includes/admin_navigation.php" ?>
<!-- /.navbar-collapse -->        
<div id="page-wrapper">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
<h1 class="page-header">
   Edit Retailers					   
</h1>
<?php

   $AF = new AdminFunctions();

   if (isset($_GET['retailer_id'])){
       
    $retailerData = $AF->getRetailer($_GET['retailer_id']);

    $retailer_name = $retailerData['username'];
    $retailer_address = $retailerData['user_address'];
    $retailer_group = $retailerData['user_group_id'];
    $user_email = $retailerData['user_email'];
   
    $groupCommision = $AF->getGroupCommission($retailer_group);
    $groups = $AF->getGroups();

   }

   if (isset($_POST['update_retailers'])){
       
    $groupdId = $_POST['retailer_group'];
    $groupCommision = $AF->getGroupCommission($retailer_group);
    $AF->updateRetailer($_GET['retailer_id'], $groupdId);

   }
   ?>
<form action="" method="post" enctype="multipart/form-data">

   <div class= "form-group">
      <label for= "retailer_name"> Retailer Name </label>
      <input readonly value= "<?php echo $retailer_name; ?>" type="text" class= "form-control" name="retailer_name">
   </div>

   <div class= "form-group">
      <label for= "retailer_address">Retailer Address </label>
      <input readonly value= "<?php echo $retailer_address; ?>"type="text" class= "form-control" name="retailer_address">
   </div>

   <div class= "form-group">
      <label for= "retailer_address"> Retailer Email </label>
      <input readonly value= "<?php echo $user_email; ?>"type="text" class= "form-control" name="retailer_address">
   </div>

   <div class= "form-group">
      <label for= "retailer_group"> Retailer Group : <?php echo $retailer_group?> <?php print_r($AF->getGroupCommission($retailer_group)['commission'])?></label>
        <br/>
      <label for="retailer_group">Change Retailer Group to : </label>
       <select name="retailer_group">
            <?php foreach($groups as $group){?>
                <option class="" value=<?php echo $group['group_category']?>><?php echo $group['group_category']?>  <?php echo $AF->getGroupCommission($group['group_category'])['commission']?></option>
            <?php }?>
       </select>
         
      

   </div>

   <div class= "form-group">
      <input type="submit" class= "btn btn-primary" name="update_retailers" value="Update retailer">
   </div>

</form>
<div>
<div>
<div></div>