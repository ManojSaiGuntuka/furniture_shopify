
<?php

require_once("./inc/functions.php");
require_once('DB.php');

 require_once("./inc/connect.php");

/*if (!empty($_GET)) {
        $pid = $_GET["pid"];
        $result = mysqli_query($conn, "SELECT * FROM products WHERE productId = $pid");

        
        $resultVendor = mysqli_query($conn, "SELECT DISTINCT r.retailer_id, r.retailer_name FROM products p, retailer r WHERE p.vendor_id = r.retailer_id && p.productId= $pid");
    } else {
        header("location: home.php");
        exit;
    } */



class Shopify {

	// Initializing pdo instance & shopify api credentials 
	private $db;

	 private $api_key = "43c249091a227bea5ca0733355a3b05d";
	 private $shared_secret = "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";
	 private $store = "clickrippleappfurniture.myshopify.com";



	function __construct(){		
		$this->db = new DB('PRODUCTS');			
	}
	
	//Constructing store url
	private function storeUrl(){	
		return "https://".$this->api_key.":".$this->shared_secret."@".$this->store;		
	}

	// Fetching customers data from mysql database
	private function fetchProducts(){
		if (!empty($_GET)) {
		
		$pid = $_GET["pid"];

		$query = "select * from productlist  WHERE productId = $pid";		
		$rows = $this->db->query($query);

		return $rows;
	}
		
	}
	/*

	Variant Inventory Tracker,
	Variant Inventory Qty,
	Variant Inventory Policy,
	Variant Fulfillment Service,
	Variant Price,
	Variant Compare At Price,
	Variant Requires Shipping,
	Variant Taxable,
	Variant Barcode,
	Image Src,
	Image Alt Text
	*/


	
	
	// Responsible for creating products through shopify api
	private function createProductsShopify($data) {

		 
    		$product = [];
    		$product['product'] = [
            'title'=> $data['productName'],
            'body_html'=>$data['Description'],
            'vendor'=>'clickrippleappfurniture',
            'product_type'=>$data['cat_title'],
            'tags' =>'' ,
            'published'=>1,
            'available' => $data['available'],
            'variants'=> [
                [
                    'price'=> $data['productPrice'],
                    'available' => $data['available'],
                    'fulfillment_service' => $data['inventory_management'],
                    'inventory_policy ' =>'continue',
                    'tracked' => 'true',
                   'inventoryManagement' =>'Clickripplefurniture',
                    'inventory_quantity' => $data['Stock'],
                    'sku' =>$data['Stock']


                ]
            ],
            'images'=> [
                [
                    'src'=> $data['productImage'].'jpg',
                ]
                
            ]

        ];


		/*$product = array("product"=>array(
			"variant_sku" => $data['productId'],		
			"productCod" => $data['productCode'],
			"product_type" => $data['cat_title'],
			"title" => $data['productName'],
			"product_type"=>$data['cat_title'],
			"productStatus" => $data['productStatus'],							
			"productImage" => $data['productImage'],						
			"shippingDate" => $data['shippingDate'],
			"body_html" => $data['Description'],
			"Option1 Name" => $data['productPrice'],
			"price" => $data['productPrice'],
			"varinat-inventory-management" => $data ['inventory-management'],
			"inventory-qty" => $data ['Stock'],
			"inventory-policy" => $data['inventory-policy'],


		));	*/
		
		
		
		$url = $this->storeUrl()."/admin/products.json";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_VERBOSE, 0);
		//curl_setopt($curl, CURLOPT_HEADER, 1);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($product));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$response['data'] = curl_exec ($curl);
		if(curl_errno($curl))
		{
			$response['error'] = 'Curl error: ' . curl_error($curl);
		}
		curl_close ($curl);		
		return $response;

	}
	
	
	
	// Responsible for fetching products  from db then exporting to shopify
	public function processProductsMigration(){
		
		$results = array();
		$results['start-time'] = date('h:i:s'); 
		$products = $this->fetchProducts();	
		
		foreach($products as $product){
		
			$data = array();
			$data['productId'] = $product['productId'];
			$data['cat_title']= $product['categoryId'];
			$data['productCode'] = $product['productCode'];
			$data['productName'] = $product['productName'];
			$data['productStatus'] = $product['productStatus'];							
			$data['productImage'] = $product['productImage'];							
			$data['shippingDate'] = $product['shippingDate'];
			$data['productColor'] = $product['productColor'];
			$data['productSize'] = $product['productSize'];
			$data['productPrice'] = $product['productPrice'];
			$data['Stock'] = $product['Stock'];
			$data['Description'] =$product['Description'];
			$data['inventory_management'] = $product['variant_inventory_tracker'];
			$data['tracked'] = $product['variant_inventory_policy'];
			$data['available'] = $product['available'];

			

			$data['shopify-response'] = $this->createProductsShopify($data);			
			$results[] = $data;
			// wait for half second to compensate 2 calls per second shopify bucket limit (40)
			usleep(500000); 
		
		}
		
		$results['end-time'] = date('h:i:s');
		
		return json_encode($results);		
			
	}

	
	
}

// Launching migration process now
$Shopify = new Shopify();
$results = $Shopify->processProductsMigration();
header("Location: ./users/user_products.php");
//echo "<pre>"; print_r($results);

?>