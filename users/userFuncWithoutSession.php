<?php

require_once $_SERVER['DOCUMENT_ROOT']."/furniture/DB.php";

class FunctionsWithoutSession{

    function getConnection(){

        $db = new DB("PRODUCTS");
        return $db;

    }

    function hasUserProducts($userId){

        $hasUserProductId = "select * from productlist where user_id = '$userId'";
        $hasUserProduct = $this->getConnection()->query($hasUserProductId);
        return $hasUserProduct;

    }

}

?>

