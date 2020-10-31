<?php
session_start();

$user_id = $_GET['user_id'];
$_SESSION['user_id'] = $user_id;

$con = mysqli_connect("localhost","root","c4ed323b11921eaf","homemeals");

if (!$con){
  die('Could not connect:' .mysqli_connect_error());
}

  if($user_id == "1"){
    $colour = "#7B449B";
  }
  if($user_id == "2"){
    $colour = "#8DD6EC";
  }
  if($user_id == "3"){
    $colour = "#F89C57";
  }
  if($user_id == "4"){
    $colour = "#F37C9B";
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/website.css">
    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="image/spud_icon.png" /> -->
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    .badge-outline {
      color: black;
      border: 1px solid #999;
      background-color: transparent;
    }
    .badge-outline.badge-lunch {
        border-color: #F5C02C;
        color: #F5C02C;
    }
    .badge-outline.badge-dinner {
        border-color: #BE83B9;
        color:#BE83B9;
    }
    .red{
      color:#C9406A;
    }
    .green{
      color:#1AB08A;
    }
    .blue{
      color:#7DA2A9;
    }
    .people{
      color:#7DA2A9;
    }
    input[type='checkbox']:after {
    width: 30px;
    height: 30px;
    border-radius: 30px;
    top: -5px;
    left: -5px;
    position: relative;
    background-color: #fff;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 2px solid #cccccc;
    }

input[type='checkbox']:checked:after {
    width: 30px;
    height: 30px;
    border-radius: 30px;
    top: -5px;
    left: -5px;
    position: relative;
    background-color: <?php echo $colour ?>;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 0px solid white;
}
.badge-circle {
     border-radius: 0;
     font-size: 14px;
     line-height: 1;
     font-weight: normal
 }

 .badge-outline-J {
     color: #7B449B;
     border: 3px solid #7B449B;
     padding: .25rem .55rem;
 }
 .badge-outline-S {
     color: #8DD6EC;
     border: 3px solid #8DD6EC;
     padding: .25rem .5rem;
 }
 .badge-outline-P {
     color: #F89C57;
     border: 3px solid #F89C57;
     padding: .25rem .45rem;
 }
 .badge-outline-Y {
     color: #F37C9B;
     border: 3px solid #F37C9B;
     padding: .25rem .5rem;
 }
 .badge-circle.badge-pill {
     border-radius: 10rem
 }

.add {
  background-color : #7DA2A9;
  color: white;
  border-radius: 100px;
  border: none;
  padding: 12px 17px;
}

#mybutton {
  position: fixed;
  bottom: 20px;
  right: 20px;
}

    </style>


    <title>Shopping List</title>
    </head>
    <body id="page-top">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top pt-3 pb-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">HomeMeals</a>
                      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                      <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php?user_id=<?php echo $user_id ?>">Home</a></li>
                      <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="meals.php?user_id=<?php echo $user_id ?>">Meals</a></li>
                      <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="white" href="shoppinglist.php?user_id=<?php echo $user_id ?>">Shopping List</a></li>
                        <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="media.html">Media</a></li> -->
                    </ul>
                    <!-- <ul class="navbar-nav ml-auto">

                        <li class="nav-item mx-0 mx-lg-1 dropdown">
                          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-lg"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="makerlogin.php">Sign Out</a>
                          </div>
                        </li>
                    </ul> -->
                </div>
            </div>
    </nav>
<br><br><br>
<div class="container mt-4">
  <h5 class="font-weight-normal mb-3">Shopping List</h5>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-secondary" id="ingredient-tab" data-toggle="tab" href="#ingredient" role="tab" aria-controls="ingredient" aria-selected="true">Ingredients</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-secondary" id="miscellaneous-tab" data-toggle="tab" href="#miscellaneous" role="tab" aria-controls="miscellaneous" aria-selected="false">Miscellaneous</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-secondary" id="bought-tab" data-toggle="tab" href="#bought" role="tab" aria-controls="bought" aria-selected="false">Bought</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent" style="font-size:14px;">
  <div class="tab-pane fade show active" id="ingredient" role="tabpanel" aria-labelledby="ingredient-tab">
    <div class="container">
      <br>
      <?php
      $result4 = mysqli_query($con,"SELECT * FROM shoppinglist where user_id = '' and type='ingredient' ORDER BY shoppinglist_id");
      if($result4->num_rows > 0){
      while($row4 = mysqli_fetch_array($result4)){
        $mealid = $row4['meal_id'];
        $ppl = 0;
        $totalamount = 0;
        $amount = $row4['amount'];
        $itemname = $row4['name'];
        $shoppinglist_id = $row4['shoppinglist_id'];
        if($mealid > 0){
          $result5 = mysqli_query($con,"SELECT * FROM eating where meal_id = $mealid");
          $ppl = $result5->num_rows;
        }
        if($ppl != 0){
          $totalamount = ($ppl + 1) * $amount;
        }else{
          $totalamount = $amount;
        }

      ?>
      <div class="card mb-2 shadow-sm bg-white rounded" style="width: 100%;" id="<?php echo $shoppinglist_id?>">
        <div class="card-body">
          <div class="row">
            <div class="col-10">
                <h6 class="font-weight-normal" style="padding-top:3px;"><?php echo $itemname?><?php if($totalamount != 0) {?>&nbsp;x&nbsp;<?php echo ceil($totalamount); }else{}?></h6>
            </div>
            <div class="col-2 text-right">
              <div class="pr-2">
                <input type='checkbox' onclick="location.href='a_bought.php?user_id=<?php echo $user_id ?>&shoppinglist_id=<?php echo $shoppinglist_id ?>'"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }} ?>
    </div>
  </div>
<div class="tab-pane fade" id="miscellaneous" role="tabpanel" aria-labelledby="miscellaneous-tab">
  <div class="container">
    <br>
    <?php
    $result4 = mysqli_query($con,"SELECT * FROM shoppinglist where user_id = '' and type='miscellaneous' ORDER BY shoppinglist_id");
    if($result4->num_rows > 0){
    while($row4 = mysqli_fetch_array($result4)){
      $mealid = $row4['meal_id'];
      $ppl = 0;
      $totalamount = 0;
      $amount = $row4['amount'];
      $itemname = $row4['name'];
      $shoppinglist_id = $row4['shoppinglist_id'];
      if($mealid > 0){
        $result5 = mysqli_query($con,"SELECT * FROM eating where meal_id = $mealid");
        $ppl = $result5->num_rows;
      }
      if($ppl != 0){
        $totalamount = ($ppl + 1) * $amount;
      }else{
        $totalamount = $amount;
      }

    ?>
    <div class="card mb-2 shadow-sm bg-white rounded" style="width: 100%;" id="<?php echo $shoppinglist_id?>">
      <div class="card-body">
        <div class="row">
          <div class="col-10">
              <h6 class="font-weight-normal" style="padding-top:3px;"><?php echo $itemname?><?php if($totalamount != 0) {?>&nbsp;x&nbsp;<?php echo ceil($totalamount); }else{}?></h6>
          </div>
          <div class="col-2 text-right">
            <div class="pr-2">
              <input type='checkbox' onclick="location.href='a_bought.php?user_id=<?php echo $user_id ?>&shoppinglist_id=<?php echo $shoppinglist_id ?>'"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }} ?>
  </div>
</div>
<div class="tab-pane fade" id="bought" role="tabpanel" aria-labelledby="bought-tab">
  <div class="container">
    <br>
    <?php
    $result4 = mysqli_query($con,"SELECT * FROM shoppinglist where user_id != '' ORDER BY shoppinglist_id desc");
    if($result4->num_rows > 0){
    while($row4 = mysqli_fetch_array($result4)){
      $boughtby = $row4['user_id'];
      $mealid = $row4['meal_id'];
      $ppl = 0;
      $totalamount = 0;
      $amount = $row4['amount'];
      $itemname = $row4['name'];
      if($mealid > 0){
        $result5 = mysqli_query($con,"SELECT * FROM eating where meal_id = $mealid");
        $ppl = $result5->num_rows;
      }
      if($ppl != 0){
        $totalamount = ($ppl + 1) * $amount;
      }else{
        $totalamount = $amount;
      }

    ?>
    <div class="card mb-2 shadow-sm bg-white rounded" style="width: 100%;">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
              <h6 class="font-weight-normal" style="padding-top:3px;"><?php echo $itemname?><?php if($totalamount != 0) {?>&nbsp;x&nbsp;<?php echo ceil($totalamount); }else{}?></h6>
          </div>
          <div class="col-3 text-right pr-2">
            <div class="pr-0">
              <?php
              $initial = '';
              if($boughtby == 1){
                $initial = 'J';
              }
              if($boughtby == 2){
                $initial = 'S';
              }
              if($boughtby == 3){
                $initial = 'P';
              }
              if($boughtby == 4){
                $initial = 'Y';
              }
               ?>
              <span class="badge badge-circle badge-pill badge-outline-<?php echo $initial; ?>"><b><?php echo $initial; ?></b></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }} ?>
  </div>
</div>
<div id="mybutton">
  <button class="add" data-toggle="modal" data-target="#Modal"><h3 class="pb-0 mb-0"><i class="fas fa-plus"></i></h3></button>
</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ml-5 mr-5">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add an Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><br>
      <div class="container">
      <form class="forms" action="a_addshoppinglist.php?user_id=<?php echo $user_id ?>" method="post" autocomplete="off">
        <div class="form-group">
          <label for="inputName">Item Name</label>
          <input type="text" id="inputName" class="form-control" placeholder="Enter Item Name" name="name" required autofocus>
        </div>
        <div class="form-group">
          <label for="inputAmount" class="form-label">Amount</label>
          <select class="form-control" id="exampleFormControlSelect1" name="amount" required>
            <option selected value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
          <hr>
        <button class="btn btn-lg btn-primary btn-block mt-2 mb-4" type="submit" name="submit">Add</button>
      </form>
      </div>
    </div>
    </div>
  </div>
</div>


</div>
<br>
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="js/portfolio.js"></script>
  </body>
</html>
