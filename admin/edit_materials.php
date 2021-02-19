<?php ob_start(); include "../inc/connect.php"; ?>
<?php session_start(); ?>
<?php  include "includes/admin_header.php"; include "./adminFunctions.php";?>

<?php $AF =  new AdminFunctions();?>

<div id="wrapper">
    <?php  include "includes/admin_navigation.php" ?>
    <!-- /.navbar-collapse -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Material Title
                    </h1>
                    <?php
                    if(isset($_GET['material_id'])){

                        $matDetails = $AF->getMaterial($_GET['material_id']);

                        $mat_title = $matDetails['mat_title'];

                    }

                    if(isset($_POST['update_material'])){

                        $matTitle = $_POST['mat_title'];

                        $AF->updateMaterial($_GET['material_id'], $matTitle);
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class= "form-group">
                            <div class= "form-group">
                                <label for= "mat_title"> Material Title </label>
                                <input value= "<?php if(isset($mat_title)){ echo $mat_title; } ?>" type="text" class= "form-control" name="mat_title">
                            </div>
                            <div class= "form-group">
                                <input type="submit" class= "btn btn-primary" name="update_material" value="Update Material">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php ob_flush(); ?>