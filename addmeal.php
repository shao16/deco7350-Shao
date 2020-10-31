<?php
session_start();

$user_id = $_GET['user_id'];
$_SESSION['user_id'] = $user_id;

$con = mysqli_connect("localhost","root","c4ed323b11921eaf","homemeals");

if (!$con){
  die('Could not connect:' .mysqli_connect_error());
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
    background-color: #ffa500;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 0px solid white;
}
.add {
  background-color : #31B0D5;
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


    <title>Add Meal</title>
    </head>
    <body id="page-top">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top pt-3 pb-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">HomeMeals</a>
                      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                      <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php?user_id=<?php echo $user_id ?>">Home</a></li>
                      <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="white" href="meals.php?user_id=<?php echo $user_id ?>">Meals</a></li>
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
  <div class="row mt-3">
    <div class="col-12">
      <h5 class="text-center mb-3">Add a Planned Meal</h5>
    </div>
    <!-- <div class="col-6 text-right ">
      <button type="button" class="btn btn-link pb-0 pt-0 pr-1 blue"><h6 class="font-weight-normal">View All</h6></button>
    </div> -->
  </div>
  <div class="container">
    <form class="forms" action="a_addmeal.php?user_id=<?php echo $user_id ?>" method="post" autocomplete="off">
      <div class="form-group">
        <br>
        <!-- <label for="inputName">Meal Name</label> -->
        <?php
        $options = $con->query("SELECT * FROM savedmeal");
        echo '<select id="inputUser1" class="form-control" name="mealid">';
        echo '<option selected> Select a Meal . . . </option>';
        while($o = $options->fetch_object()) {
            echo '<option value="'.$o->savedmeal_id.'">'.$o->name.'</option>';
        }
        ?>
      </select>
      </div>
      <div class="form-group">
        <label for="inputName">Date</label>
        <input type="date" id="inputDate" class="form-control" placeholder="mm/dd/yyyy" name="date" required>
      </div>
      <div class="form-group">
        <label for="inputName">Time</label>
        <select class="form-control" id="exampleFormControlSelect1" name="time" required>
        <option selected>Select a Time . . .</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
    </select></div><br>
<hr>


      <button class="btn btn-lg btn-primary btn-block mt-3 mb-4" type="submit" name="submit">Save</button>
    </form>
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
