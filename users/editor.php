<?php

    include "./userFunctions.php";
   
    $UF = new UserFunctions();
    
    $PRODUCTDATA = $UF->getProduct($_GET['id']);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/content.css" />
    <title>Document</title>
  </head>
  <body
    id="tinymce"
    class="mce-content-body"
    data-id="tiny-vue_18885963821609270016227_ifr"
    spellcheck="false"
    contenteditable="true"
  >

    <p>
      <strong>Prtoduct Name :</strong>
      <?php echo $PRODUCTDATA[0]['productName']?>
      <br />
      <strong>Item type :</strong>
      <?php echo $PRODUCTDATA[0]['productName']?>
      <br />
      <strong>origin :</strong>
      Canada<br />
      <strong>Info :</strong>
      <?php echo $PRODUCTDATA[0]['Description']?><br />
    </p>

  </body>
</html>
