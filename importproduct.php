<!DOCTYPE html>

<html>
<head>
  
<title>Import List</title>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<style type="text/css">
  .tab-pane {
    padding:20px;
}
</style>
    </head>
    <body>
      <ul class="nav nav-tabs" id="myForm">
      <li class="active"><a href="Products">Un</a></li>
      <li><a href="#two">Description</a></li>
      <li><a href="#three">Variants</a></li>
      </ul>

    <form action="" method="post">
      <div class="tab-content">
        <div class="tab-pane active" id="one">
          <input type="text" class="form-control" name="name" placeholder="enter name">
        </div>
        <div class="tab-pane" id="two">
          <input type="text" class="form-control" name="email" placeholder="enter email">
        </div>
        <div class="tab-pane" id="three">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>    
      </div>
    </form>

    <script src="js/jquery-1.12.4.min.js"></script> 
      <!--bootstrap js--> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/bootstrap-select.min.js"></script>
      <script src="js/slick.min.js"></script> 
      <script src="js/wow.min.js"></script>
      <!--custom js--> 
      <script src="js/custom.js"></script>
    </body>


 </html>