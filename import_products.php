
<?php

require_once("./inc/functions.php");
require_once('DB.php');

 require_once("./inc/connect.php");


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
			$proift = $_GET['profit'];
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
					'cost' => $data['productPrice'] - $proift,
                    'available' => $data['available'],
                    'fulfillment_service' => $data['inventory_management'],
                    'inventory_policy ' =>'continue',
                    'tracked' => 'true',
                   'inventoryManagement' =>'Clickripplefurniture',
                    'inventory_quantity' => $data['Stock'],
                    'sku' =>$data['Stock']
                ]
			],
            'image'=>  [
				'src' => 'http://ankits-macbook-air.local/furniture/users/images/'.$data['productImage']
			],
			
		];
		
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
		
		//foreach($products as $product){
		
			$data = array();
			$data['productId'] = $products[0]['productId'];
			$data['cat_title']= $products[0]['categoryId'];
			$data['productCode'] = $products[0]['productCode'];
			$data['productName'] = $products[0]['productName'];
			$data['productStatus'] = $products[0]['productStatus'];							
			$data['productImage'] = $products[0]['productImage'];							
			$data['shippingDate'] = $products[0]['shippingDate'];
			$data['productColor'] = $products[0]['productColor'];
			$data['productSize'] = $products[0]['productSize'];
			$data['productPrice'] = $products[0]['productPrice'];
			$data['Stock'] = $products[0]['Stock'];
			$data['Description'] =$products[0]['Description'];
			$data['inventory_management'] = $products[0]['variant_inventory_tracker'];
			$data['tracked'] = $products[0]['variant_inventory_policy'];
			$data['available'] = $products[0]['available'];

			
			$this->createProductsShopify($data);
			//$data['shopify-response'] = $this->createProductsShopify($data);			
			$results[] = $data;
			// wait for half second to compensate 2 calls per second shopify bucket limit (40)
			//usleep(500000); 
		
		//}
		
		$results['end-time'] = date('h:i:s');
		
		return json_encode($results);		
			
	}

	
	
}

$Shopify = new Shopify();
$results = $Shopify->processProductsMigration();
if ($results){
	header("Location: ./users/user_products.php");
}

?>