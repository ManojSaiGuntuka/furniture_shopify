<?php

require_once('../DB.php');

    
    if(session_status() == 1){
        session_start();
    }

    if(!(isset($_SESSION['user_id'])) && !(isset($_SESSION['adminId']))){

        header("Location: ../users_login.php");

    }

    class UserFunctions{

        private $CUR_USER_ID ;

        function getProduct($proId){

            $productQuery = "select * from products where productId = '$proId'";
            $product = $this->getConnection()->query($productQuery);
            return $product;

        }

        function __construct(){

            if(isset($_SESSION['user_id'])){
                $this->CUR_USER_ID = $_SESSION['user_id'];
            }
            
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

            print_r($insert_watchlist_query);

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

            print_r($productList_id);
            header("Location: ../import_products.php?pid=$productList_id");

        }

        function isProductStore($proId, $userId){

            
            $getProductQuery = "select * from productlist where product_id ='$proId' and user_id = '$userId'";
            $getProduct = $this->getConnection()->query($getProductQuery);
            return sizeOf($getProduct);

        }

        function addToStore($product_name, $desc, $productImage, $productColor, $newPrice, $watchListId, $product_id, $profit ){

            $user_id = $this->getUserId();
            
            $userProducts = $this->isProductStore($product_id, $user_id);
            if($userProducts === 0){
                $insertQuery = "insert into productlist(product_id, user_id, productName, productImage, productColor, productPrice, Description, profit) 
                            values('$product_id', '$user_id', '$product_name', '$productImage', '$productColor', '$newPrice', '$desc', '$profit')";


                $this->getConnection()->query($insertQuery);

                $this->addToShopify($this->getConnection()->lastInsertId());

                $this->deleteWatchList($watchListId);

                return true;

            }else{

                return False;

            }
            

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
            $this->deleteFromShopifyStore($prod_id);

        }

        function deleteFromShopifyStore($prod_id){

            header("Refresh:0");

        }
        
        function getOrders(){

            $url = "https://43c249091a227bea5ca0733355a3b05d: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@clickrippleappfurniture.myshopify.com/admin/orders.json";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_VERBOSE, 0);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response['data'] = curl_exec ($curl);
            if(curl_errno($curl))
            {
                $response['error'] = 'Curl error: ' . curl_error($curl);
            }
            curl_close ($curl);		
            return $response;

        }

        function getEarnings(){

            $allOrders = $this->getOrders();
            $json = json_decode($allOrders['data'], 1);

            $ordersStatus = $json['orders'];

            foreach ($ordersStatus as $rkey => $orderStatus){
                if ($orderStatus['fulfillment_status'] == 'fulfilled'){
                    $fullOrders[] = $orderStatus['total_price'];
                }
            }

            return $fullOrders[0];

        }


        function getMargin(){

            $userId = $this->getUserId();
            $getCurUserGroupQuery = "select user_group_id from retailers where user_id = $userId";
            $getCurUserGroup = $this->getConnection()->query($getCurUserGroupQuery)[0]['user_group_id'];
            $getCurGroupMarginQuery = "select commission from groups where group_category = '$getCurUserGroup'";
            $getCurGroupMargin = $this->getConnection()->query($getCurGroupMarginQuery)[0]['commission'];

            return $getCurGroupMargin;

        }

    }
    
?>