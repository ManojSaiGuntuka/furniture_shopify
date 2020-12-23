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
        
        function insertIntoWatchList($pro_id){
            $user_id = $this->getUserId();
            //print_r($pro_id);
            $insert_into_watchlist_query = "insert into watchlist
                (user_id, product_id)
                values($user_id, $pro_id)
            ";

            print_r($this->getConnection()->query($insert_into_watchlist_query));
            header("Location: ./importproduct.php");
        }
    
        function getWatchListProducts(){
            
            $user_id = $this->getUserId();
            $product_arr = array();
            $get_all_product_list_query = "select * from watchlist where user_id = $user_id";   
            $watchList = $this->getConnection()->query($get_all_product_list_query);

            foreach($watchList as $cur_pro_id){

                $cur_id = $cur_pro_id['product_id'];
                $get_pro_query = "select *, product_id from products inner join watchlist on productId = $cur_id";
                $get_pro = $this->getConnection()->query($get_pro_query);
                array_push($product_arr, $get_pro);
            }

            return $product_arr;
        }

        function deleteWatchList($watchListId){
            $delete_watchlist_query = "delete from watchlist where watchListId = '$watchListId'";
            $this->getConnection()->query($delete_watchlist_query);
        }

        function addToStore($prod_id, $product_name, $desc, $newPrice,$watchListId){
            $user_id = $this->getUserId();
            
           $insertQuery = "insert into productlist(product_id, user_id, productName, Description, productPrice) values('$prod_id', '$user_id', '$product_name', '$desc', '$newPrice')";

           /* $insertQuery="INSERT INTO productlist(product_id, user_id, categoryId, productCode, productName,productStatus, productImage, shippingDate, productColor, productSize, productPrice, Stock, Description, cat_title, mat_id, vendor_id, variant_inventory_tracker, variant_inventory_policy, available) VALUES ('$prod_id','$user_id','','','$product_name','active','','','Black','4','$newPrice','8','$desc','','','','','','')";*/
            
            $this->getConnection()->query($insertQuery);
            $this->deleteWatchList($watchListId);
        }

        function deleteFromStore($prod_id){
            $user_id = $this->getUserId();
            
            $insertQuery = "delete from productlist where user_id ='$user_id' and product_id='$prod_id'";
            $this->getConnection()->query($insertQuery);
        }
        
    }
    
?>