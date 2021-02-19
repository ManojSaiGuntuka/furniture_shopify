<?php ob_start(); include "../inc/connect.php"; ?>
<?php session_start(); ?>
<?php

if(!(isset($_SESSION['adminId']))){

    header("Location: index.php");

}
?>
<?php  include "includes/admin_header.php" ?>
<div id="wrapper">
    <?php  include "includes/admin_navigation.php" ?>
    <!-- /.navbar-collapse -->
    <div id="page-wrapper">
        <div class="container-fluid">

        <?php if(isset($_GET['deleted']) && $_GET['deleted'] == true){ ?>
            <div class="alert alert-success" id="deleteMsg" role="alert" style="position:absolute;z-index: 99; right:1%;">
                 <a href="#" class="alert-link">Deleted!</a>. Record deleted Successfully.
            </div>

        <?php }?>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        View All Materials	 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <a href="add_materials.php"> <input type="button" class= "btn btn-primary"   value="Add Materials"> </a>
                    </h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Material Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM material";
                        $selected_materials = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($selected_materials)) {
                            $mat_id = $row['mat_id'];
                            $mat_title = $row['mat_title'];

                            echo "<tr>";

                            echo "<td>$mat_title </td>";

                            $query = "SELECT * FROM material WHERE mat_id = {$mat_id}";
                            $select_materials_edit = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($select_materials_edit)){
                                $mat_id = $row['mat_id'];
                                $mat_title = $row['mat_title'];


                            }


                            echo "<td><a href='edit_materials.php?material_id={$mat_id}'> Edit </a></td>";
                            echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to delete'); \" href='view_all_materials.php?delete={$mat_id}'> Delete </a></td>";
                            echo "</tr>";


                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    if(isset($_GET['delete'])){

                        $get_mat_id = $_GET['delete'];

                        $query = "DELETE FROM material WHERE mat_id ={$get_mat_id} ";
                        $delete_query = mysqli_query($conn, $query);
                        header("Location: view_all_materials.php?deleted=true");

                    }

                    ?>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        </body>
                                        <script>
                                            $(document).ready(function(){
                                                $("#deleteMsg").delay(5000).slideUp(300);
                                            });
                                        </script>
                                        <html>
                                        <?php ob_flush(); ?>