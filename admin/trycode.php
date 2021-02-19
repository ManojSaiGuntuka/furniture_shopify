<?php include "../inc/connect.php"; ?>
<?php
//
//if(isset($_POST['Submit'])){
//    $totalDivCount = $_POST['totalDivCount'];
//    $productId = 1;
//    for($i=0; $i<$totalDivCount; $i++){
//        if($i == 0){
//            $boxNumber = $i+1;
//            $length = $_POST['length_'];
//            $width = $_POST['width_'];
//            $height = $_POST['height_'];
//        }else{
//            $boxNumber = $i+1;
//            $length = $_POST['length_'.$i];
//            $width = $_POST['width_'.$i];
//            $height = $_POST['height_'.$i];
//        }
//      $query = mysqli_query($conn, "insert into product_boxes (boxNumber,length,width,height,productId) values('$boxNumber','$length','$width','$height','$productId')");
//    //$query = 1;
//    }
//    if($query){
//        echo "success";
//    }else{
//        echo "no success";
//    }
//}
//
//?>
<!--<html>-->
<!---->
<!--<head>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--</head>-->
<!---->
<!--<body>-->
<!--<div id="order-details-booking">-->
<!--    <blockquote>Self-order Menu</blockquote>-->
<!--    <form method="post">-->
<!--        <input type="text" class="totalDivCount" name="totalDivCount" value="" hidden>-->
<!--        <div class="row">-->
<!---->
<!--            <div class="form-holder col-xs-12">-->
<!--                Box <span class="totalDivCountPreviousText">1</span><span class="totalDivCountText"></span>-->
<!--                <div class="input-field col s4">-->
<!--                    <input type="text" id="item-code" class="length" placeholder="Length" name="length_"/>-->
<!--                </div>-->
<!--                <div class="input-field col s2">-->
<!--                    <input type="text" id="item-code" class="width" placeholder="Width" name="width_"/>-->
<!--                </div>-->
<!--                <div class="input-field col s5">-->
<!--                    <input type="text" id="item-code" class="height" placeholder="Height" name="height_"/>-->
<!--                </div>-->
<!--                <div class="col s1">-->
<!--                    <i class="material-icons remove">- remove</i>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-holder-append"></div>-->
<!--            <div class="row">-->
<!--                <div class="col-xs-4">-->
<!--                    <i class="material-icons add">+ add</i>-->
<!--                </div></div>-->
<!--        </div>-->
<!--        <div>-->
<!--            <input type="submit" name="Submit"/>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!---->
<!---->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script>-->
<!--    // Cloning Form-->
<!--    var id_count = 1;-->
<!--    //let count = $('.count').val();-->
<!---->
<!--    $('.add').on('click', function() {-->
<!--        var source = $('.form-holder:first'), clone = source.clone();-->
<!--        clone.find(':input').attr('id', function(i, val) {-->
<!--            return val + id_count;-->
<!--        });-->
<!--        clone.find(':input').attr('name', function(i, val) {-->
<!--            return val + id_count;-->
<!--        });-->
<!--        clone.find('.totalDivCountText').text(function(i, val) {-->
<!--            return i+1 + id_count;-->
<!--        });-->
<!--        clone.find('.totalDivCountPreviousText').text('');-->
<!--        clone.appendTo('.form-holder-append');-->
<!--        id_count++;-->
<!---->
<!--        $('.totalDivCount').val(id_count);-->
<!---->
<!---->
<!--        // console.log(count++);-->
<!--        // $(this).closest('.length').attr('name','length_'+count);-->
<!--        //$('.width').attr('name','width_'+count);-->
<!--        //$('.height').attr('name','height_'+count);-->
<!--    });-->
<!---->
<!--    // Removing Form Field-->
<!--    $('body').on('click', '.remove', function() {-->
<!--        var closest = $(this).closest('.form-holder').remove();-->
<!--    });-->
<!--</script>-->
<!--<script>-->
<!--     language: lang-js -->
<!---->
<!--    // $('#order-details-booking').on('click','.material-icons',function(){-->
<!--    //     $(this).closest('.row').clone().appendTo('#order-details-booking').find("input[type='text']").val("");//use closest to avoid multiple selection and clear input text elements-->
<!--    // });-->
<!--</script>-->
<!--</body>-->
<!---->
<!--</html>-->















<?php
//if(isset($_POST['submit'])){
//    // Include the database configuration file
//    ////include_once 'dbConfig.php';
//
//    // File upload configuration
//    $uploads_dir = '../images/';
//
//    $imageArr = array();
//
//    foreach ($_FILES["image"]["error"] as $key => $error) {
//
//
//        if ($error == UPLOAD_ERR_OK) {
//            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
//            $detectedType = exif_imagetype($_FILES["image"]["tmp_name"][$key]);
//
//            if(!in_array($detectedType, $allowedTypes)){
//                echo 1;
//            }else{
//                echo 0;
//            }
////            $tmp_name = $_FILES["image"]["tmp_name"][$key];
////            $name = $_FILES["image"]["name"][$key];
////            move_uploaded_file($tmp_name, $uploads_dir.$name);
////            array_push($imageArr,$name);
//        }
//
//    }
//
////    $imageArr=serialize($imageArr);
////
////    $sql=mysqli_query($conn,"INSERT INTO products SET productImages='".$imageArr."'");
//
//    //After that use unserialize() function,this will show the array of that multiple image. user the bellow code:
//
//}
//$sql1=mysqli_query($conn,"Select productImages from products");
//$images = array();
//while($result=mysqli_fetch_array($sql1)){
//
//    $images = unserialize($result['productImages']); //,['allowed_classes' => true]
//    if(is_array($images) || is_object($images)){
//        foreach ($images as $image){
//           $imagePath = '../users/images/'.$image;
//            echo "<img src=$imagePath width='100px' height='100px'/>";
//            //echo "<br>".$imagePath;
//        }echo "<br>";
//    }
//
//}
//?>
<?php
if(isset($_POST['submit'])){
    $collection = $_POST['test'];
    //echo $collection;
    print_r($collection);
}
    ?>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
</head>
<body>
<!--    <form action="" method="post" enctype="multipart/form-data">-->
<!--        Select Image Files to Upload:-->
<!--        <input type="file" name="image[]" multiple >-->
<!--        <input type="submit" name="submit" value="UPLOAD">-->
<!--    </form>-->
<form method="post">
    <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="test[]">
        <option value=""></option>
        <option>American Black Bear</option>
        <option>Asiatic Black Bear</option>
        <option>Brown Bear</option>
        <option>Giant Panda</option>
        <option>Sloth Bear</option>
        <option>Sun Bear</option>
        <option>Polar Bear</option>
        <option>Spectacled Bear</option>
    </select>
    <input type="submit" name="submit">
</form>
</body>
<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>
</html>
