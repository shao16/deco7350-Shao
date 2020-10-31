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
    </style>


    <title>HomeMeals</title>
    </head>
    <body id="page-top">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top pt-3 pb-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">HomeMeals</a>
                      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="white" href="index.php?user_id=<?php echo $user_id ?>">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="meals.php?user_id=<?php echo $user_id ?>">Meals</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="shoppinglist.php?user_id=<?php echo $user_id ?>">Shopping List</a></li>
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
  <div class="row mt-3 mb-2">
    <div class="col-6">
      <h5 class="font-weight-normal">Today's Meals</h5>
    </div>
    <div class="col-6 text-right ">
      <button type="button" onclick="location.href='meals.php?user_id=<?php echo $user_id ?>'" class="btn btn-link pb-0 pt-0 pr-1 blue"><h6 class="font-weight-normal">View All</h6></button>
    </div>
  </div>
<!-- meal card -->
<?php
$result = mysqli_query($con,"SELECT * FROM meal where DATE(date) = CURDATE() order by time desc");
if($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)){
  $mealid = $row['meal_id'];
  $savedmealid = $row['savedmeal_id'];
  $time = $row['time'];
  $chef = $row['user_id'];
  $result2 = mysqli_query($con,"SELECT * FROM savedmeal where savedmeal_id = $savedmealid");
  while($row2 = mysqli_fetch_array($result2)){
?>
  <div class="card mb-2 shadow-sm bg-white rounded" style="width: 100%;">
  <div class="card-body pb-2">
    <div class="row">
      <a href="viewmeal.php?user_id=<?php echo $user_id ?>&meal_id=<?php echo $mealid ?>" class="stretched-link"></a>
      <div class="col-8">
        <h6 class="font-weight-normal mb-2"><?php echo $row2['name']; }?></h6>
        <?php
        if($time == 'Lunch'){
        ?>
        <h5 class="font-weight-normal"><span class="badge badge-pill badge-outline badge-lunch">Lunch</span>&nbsp;&nbsp;
        <?php }else{ ?>
          <h5 class="font-weight-normal"><span class="badge badge-pill badge-outline badge-dinner">Dinner</span>&nbsp;&nbsp;
        <?php } ?>
          <i class="fas fa-user people"></i>
        <?php
        $result3 = mysqli_query($con,"SELECT * FROM eating where meal_id = $mealid");
        $result10 =  mysqli_query($con,"SELECT * FROM eating where meal_id = $mealid and user_id = $user_id");
        $result11 =  mysqli_query($con,"SELECT * FROM noteating where meal_id = $mealid and user_id = $user_id");
        if($result3->num_rows > 0){
        while($row3 = mysqli_fetch_array($result3)){
         ?>
          <i class="fas fa-user people"></i>
        <?php }} ?>
        </h5>
      </div>
      <div class="col-4 text-right">
        <?php
        if($chef == $user_id){
        ?>
        <img src="img/chef.png" class="float-right" alt="chef" height="70%">
        <?php
      }
      elseif($result10->num_rows > 0){
      ?>
        <i class="fas fa-check fa-2x green float-right mt-2 pl-0 pr-0"></i>
      <?php
      }
      elseif($result11->num_rows > 0){
      ?>
        <i class="fas fa-times fa-2x red float-right mt-2 pl-0 pr-0"></i>
      <?php
      }
      else{
        ?>
        <div class="btn-group pl-0 pr-0" role="group" style="z-index: 10;">
          <button type="button" onclick="location.href='#'" class="btn pl-1 pr-1"><i class="far fa-times-circle fa-2x red"></i></button>
          <button type="button" onclick="location.href='#'" class="btn pl-1 pr-1"><i class="far fa-check-circle fa-2x green"></i></button>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
  </div>
<?php }} else{?>
  <div class="col-md-12 mt-3 text-center">
    <i class="fas fa-utensils fa-5x text-secondary"></i><br><br>
    <h5 class="text-secondary">No Meals Today</h5>
  </div>
<?php } ?>
<!-- meal card end -->
<hr>
<div class="row mt-4 mb-2">
  <div class="col-6">
    <h5 class="font-weight-normal">Shopping List</h5>
  </div>
  <div class="col-6 text-right ">
    <button type="button" onclick="location.href='shoppinglist.php?user_id=<?php echo $user_id ?>'" class="btn btn-link pb-0 pt-0 pr-1 blue"><h6 class="font-weight-normal">View All</h6></button>
  </div>
</div>
<?php
$result4 = mysqli_query($con,"SELECT * FROM shoppinglist where user_id = '' ORDER BY shoppinglist_id LIMIT 5");
if($result4->num_rows > 0){
while($row4 = mysqli_fetch_array($result4)){
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
      <div class="col-10">
          <h6 class="font-weight-normal" style="padding-top:3px;"><?php echo $itemname?><?php if($totalamount != 0) {?>&nbsp;x&nbsp;<?php echo ceil($totalamount); }else{}?></h6>
      </div>
      <div class="col-2 text-right">
        <div class="pr-2">
          <input type='checkbox'/>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }} ?>

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
