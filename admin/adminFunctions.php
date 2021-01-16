<?php

    include '../DB.php';

    
    if(session_status() == 1){
        session_start();
    }
    
    class AdminFunctions{

        function __construct(){
            if (isset($_SESSION['adminId'])){
                $this->CUR_USER_ID = $_SESSION['adminId'];
            }

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

        function isUserNameExist($userName){

            $userNameQuery = "select * from admin where adminName = '$userName'";
            $userData = $this->getConnection()->query($userNameQuery);
            return sizeOf($userData);

        }

        function isEmailExist($email){

            $userNameQuery = "select * from admin where email = '$email'";
            $userData = $this->getConnection()->query($userNameQuery);
            return $userData;

        }

        function insertAdmin($adminName, $email, $password){

            $options = [
                'cost' => 12,
            ];
            $password = password_hash($password, PASSWORD_BCRYPT, $options);

            $insertAdminQuery = "insert into admin(adminName, password, email) values('$adminName', '$password', '$email')";
            $insertAdmin = $this->getConnection()->query($insertAdminQuery);
            return $insertAdmin;

        }

        function isRetailerNameExist($userName){

            $userNameQuery = "select * from retailers where username = '$userName'";
            $userData = $this->getConnection()->query($userNameQuery);
            return sizeOf($userData);

        }

        function isRetailerEmailExist($email){

            $userNameQuery = "select * from retailers where user_email = '$email'";
            $userData = $this->getConnection()->query($userNameQuery);
            return $userData;

        }

        function insertRetailer($adminName, $email, $password){

            $options = [
                'cost' => 12,
            ];
            $password = password_hash($password, PASSWORD_BCRYPT, $options);

            $insertAdminQuery = "insert into admin(adminName, password, email) values('$adminName', '$password', '$email')";
            $insertAdmin = $this->getConnection()->query($insertAdminQuery);
            return $insertAdmin;

        }

        function  getGroupCommission($retailerGroup){

            $getCommissionQuery = "select commission from groups where group_category = '$retailerGroup'";
            $getCommission = $this->getConnection()->query($getCommissionQuery);
            return $getCommission[0];

        }

        function isGroup($groupName){

            $getGroupNameQuery = "select * from groups where group_category = '$groupName'";
            $getGroupName = $this->getConnection()->query($getGroupNameQuery);
            return $getGroupName;

        }

        function isGroupCommission($groupCommission){

            $getGroupCommissionQuery = "select * from groups where commission = '$groupCommission'";
            $getGroupCommission = $this->getConnection()->query($getGroupCommissionQuery);
            return $getGroupCommission;

        }

        function loginAdmin($email, $password){

            if($this->isEmailExist($email)){
                
                $hashPassword = $this->isEmailExist($email)[0]['password'];

                if(password_verify($password, $hashPassword)){

                    $userDetailQuery = "select * from admin where email = '$email'";
                    $userDetail = $this->getConnection()->query($userDetailQuery);
                    
                    $_SESSION['adminId'] = $userDetail[0]['adminId'];
                    $_SESSION['adminName'] = $userDetail[0]['adminName'];

                    header("Location: view_all_products.php");

                }

            }else{
                return false;
            }

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

        function updateCategory($catId, $catTitle, $cat_tags, $productImage, $product_image_temp){

            move_uploaded_file($product_image_temp, "../images/$productImage");
            $updateQuery = "update category set cat_title = '$catTitle', cat_tags='$cat_tags', cat_image ='$productImage' where cat_id = '$catId'";
            $this->getConnection()->query($updateQuery);
            header("Location: view_all_categories.php");

        }

        function getCategory($catId){

            $getCatQuery = "select * from category where cat_id = '$catId'";
            $getCat = $this->getConnection()->query($getCatQuery);
            return $getCat[0];

        }

    }
?>