<?php include "../inc/connect.php"; ?>
<?php session_start(); ?>
<?php  include "includes/admin_header.php" ?>
<div id="wrapper">
    <?php  include "includes/admin_navigation.php" ?>
    <!-- /.navbar-collapse -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add Materials
                    </h1>
                    <?php $msg = "";
                    if(isset($_POST['create_material'])) {

                        $mat_title = $_POST['mat_title'];

                        if(isset($mat_title) && $mat_title != ""){
                            $query = "INSERT INTO material(mat_title) ";
                            $query .= "VALUES('{$mat_title}')";
                            $create_category_query = mysqli_query($conn, $query);

                            if(!$create_category_query){
                                //die("Query Failed" . mysqli_error($conn));
                                $msg = "Not inserted successfully, please try again later.";
                            }

                            echo  "Materials Created: " . " " . "<a href='view_all_materials.php'> View all Materials </a>";
                        }else{
                            $msg = "please fill above field.";
                        }


                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class= "form-group">
                            <div class= "form-group">
                                <label for= "cat_title"> Enter Material name </label>
                                <input  type="text" class= "form-control" name="mat_title">
                            </div>
                            <div class= "form-group">
                                <input type="submit" class= "btn btn-primary" name="create_material" value="Add Material">
                            </div>
                        </div>
                    </form>
                    <div style="color:red;"><?php if(isset($msg)){ echo $msg;} ?></div>
                </div>
            </div>
        </div>
    </div>