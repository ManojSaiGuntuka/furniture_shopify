<?php

require_once('../DB.php');

include "../inc/connect.php";
    
    if(session_status() == 1){
        session_start();
    }

    class UserFunctions{

        private $CUR_USER_ID ;

        function __construct(){
            $this->CUR_USER_ID = $_SESSION['user_id'];
        }
        
        function getUserId(){
            return $this->CUR_USER_ID;
        }

        function getConnection(){		
            $db = new DB('PRODUCTS');
            return $db;			
        }
        
        function productDeatails($pro_id){
    
            $get_product_details_query = "select * from products where productId = $pro_id";
            $get_product_details = $this->getConnection()->query($get_product_details_query);
            return $get_product_details;
    
        }

        function insertIntoWatchList($pro_id){
            $user_id = $this->getUserId();
            $product_details = $this->productDeatails($pro_id);

                $productId = $product_details[0]['productId'];
                $categoryId = $product_details[0]['categoryId'];
                $productCode = $product_details[0]['productCode'];
                $productName = $product_details[0]['productName'];
                $productStatus = $product_details[0]['productStatus'];
                $productImage = $product_details[0]['productImage'];
                $shippingDate = $product_details[0]['shippingDate'];
                $productColor = $product_details[0]['productColor'];
                $productSize = $product_details[0]['productSize'];
                $poroductPrice = $product_details[0]['productPrice'];
                $Stock = $product_details[0]['Stock'];
                $Description = $product_details[0]['Description'];
                $cat_title = $product_details[0]['cat_title'];
                $mat_id = $product_details[0]['mat_id'];
                $vendor_id = $product_details[0]['vendor_id'];
                $variant_inventory_tracker = $product_details[0]['variant_inventory_tracker'];
                $variant_inventory_policy = $product_details[0]['variant_inventory_policy'];
                $available = $product_details[0]['available'];

            $insert_watchlist_query = "insert into watchlist(user_id, productId,categoryId, productCode, productName, productStatus, productImage, shippingDate, productColor, productSize, productPrice, Stock, Description, cat_title, mat_id, vendor_id, variant_inventory_tracker, variant_inventory_policy, available)
            values('$user_id', '$productId','$categoryId', '$productCode', '$productName', '$productStatus', '$productImage', '$shippingDate', '$productColor', '$productSize', '$poroductPrice', '$Stock', '$Description','$cat_title', '$mat_id', '$vendor_id', '$variant_inventory_tracker', '$variant_inventory_policy', '$available')";

            $this->getConnection()->query($insert_watchlist_query);
            header("Location: ./importproduct.php");
        }
    
        function getWatchListProducts(){
            
            $user_id = $this->getUserId();
            
            $get_user_watchlist_query = "select * from watchlist where user_id = '$user_id'";
            $get_user_watchlist = $this->getConnection()->query($get_user_watchlist_query);
            return $get_user_watchlist;
            }

        function deleteWatchList($watchListId){
            $delete_watchlist_query = "delete from watchlist where watchListId = '$watchListId'";
            $this->getConnection()->query($delete_watchlist_query);
        }

        function addToShopify($productList_id){
            header("Location: ../import_products.php?pid= $product_id");
        }

        function addToStore($product_name, $desc, $newPrice, $watchListId, $product_id){

            $user_id = $this->getUserId();
            
            $insertQuery = "insert into productlist(user_id, product_id, productName, Description, productPrice) values('$user_id', '$product_id','$product_name', '$desc', '$newPrice')";
            //mysqli_query($conn, $insertQuery)
            $this->getConnection()->query($insertQuery);

            $this->deleteWatchList($watchListId);
            
            //header("Location: ./user_products.php");

        }

        function getStoreData(){
            
            $user_id = $this->getUserId();

            $get_storeData_query = "select * from productlist where user_id = $user_id";
            $get_storeData = $this->getConnection()->query($get_storeData_query);

            return $get_storeData;
        }

        function deleteFromStore($prod_id){
            $user_id = $this->getUserId();
            $deleteQuery = "delete from productlist where user_id ='$user_id' and productId='$prod_id'";
            print_r($this->getConnection()->query($deleteQuery));

            header("Refresh:0");
        }
        
    }
    
?>