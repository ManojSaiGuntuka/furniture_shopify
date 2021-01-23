<div class="card-columns">
<?php
$products = shopify_call($token, $shop, "/admin/api/2020-10/products.json", array(), 'GET');
$products = json_decode($products['response'], JSON_PRETTY_PRINT);
//$collection_id = $collectionList['custom_collections'][0]['id'];
//echo print_r($products)

foreach($products as $product) {
	foreach($product as $key => $value){

	$images = shopify_call($token, $shop, "/admin/api/2020-10/products/" . $value['id'] . "/images.json", array(), 'GET');
    $images = json_decode($images['response'], JSON_PRETTY_PRINT);

	 
	?>

	<div class="card" product-id ="<?php echo $value['id']; ?>">
    <img class="card-img-top" src="<?php echo $images['images'][0]['src']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"> <?php echo $value['title']; ?> </h5>
      
    </div>
  </div>
	
	<?php
	}
}
?>

</div>  
 
<!-- Modal -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="productsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<form action ="ajax.php">
		<div class = "form-group">
		<label for ="productName"> Product Title </label>
		<input type ="text" class ="form-control" id ="productName">
      </div>
	  
		<div class = "form-group">
		<label for ="productDescription"> Product Description </label>
		<textarea class="form-control" id ="productDescription" rows ="7"> </textarea> 
      </div>

	  <div class = "form-group">
	  <select class = "custom-select" id="productCollection" multiple>
	  <option value ="0"> 0 </option>
	    <option value ="1"> 1</option>
		  <option value ="2"> 2 </option>
		    <option value ="3"> 3 </option>
	  
	  </select>
	  </div>
	  </form>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
