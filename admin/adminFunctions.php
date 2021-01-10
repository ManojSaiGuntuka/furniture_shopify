<?php

    require_once('../DB.php');

    
    if(session_status() == 1){
        session_start();
    }

    class AdminFunctions{

        function __construct(){
            $this->CUR_USER_ID = $_SESSION['adminId'];
        }
        
        function getAdminId(){
            return $this->CUR_USER_ID;
        }

        function getConnection(){		
            $db = new DB('PRODUCTS');
            return $db;			
        }

        function getAllRetailers(){

            $getRetailerQuery = "select * from retailers";
            $getRetailer = $this->getConnection()->query($getRetailerQuery);
            return $getRetailer;

        }

        function updateRetailer($retailerId, $groupId){

            $retailerUpdateQuery = "update retailers set user_group_id = '$groupId' where user_id = '$retailerId'";
            $retailerUpdate = $this->getConnection()->query($retailerUpdateQuery);
            header("Refresh:0");

        }

        function getGroups(){

            $getGroupsQuery = "select * from groups";
            $getGroups = $this->getConnection()->query($getGroupsQuery);
            return $getGroups;

        }

        function getRetailer($retailerId){

            $getRetailerQuery = "select * from retailers where user_id = '$retailerId'";
            $getRetailer = $this->getConnection()->query($getRetailerQuery);
            return $getRetailer[0];

        }

        function deleteRetailer($retailerId){

            $deleteRetailerQuery = "delete from retailers where user_id = '$retailerId'";
            $deleteRetailer = $this->getConnection()->query($deleteRetailerQuery);

        }

        function getAllProducts(){

            $getAllProductsQuery = "select * from products";
            $getAllProducts = $this->getConnection()->query($getAllProductsQuery);
            return $getAllProducts;

        }

    }
?>