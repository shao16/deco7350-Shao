<?php
session_start();

$user_id = $_GET['user_id'];
$_SESSION['user_id'] = $user_id;

$con = mysqli_connect("localhost","root","c4ed323b11921eaf","homemeals");

if (!$con){
  die('Could not connect:' .mysqli_connect_error());
}

if(isset($_POST['submit'])){

  $savedmeal_id = $_POST['mealid'];
  $date = $_POST['date'];
  $time = $_POST['time'];


  $sql = "INSERT INTO meal (date, time, savedmeal_id, user_id)
  VALUES ('$date', '$time', '$savedmeal_id', '$user_id')";
  mysqli_query($con, $sql);
  $meal_id = mysqli_insert_id($con);

  $result = mysqli_query($con,"SELECT * FROM savedmeal where savedmeal_id = $savedmeal_id");
  while($row = mysqli_fetch_array($result)){
    $in1 = $row['in1'];
    $un1 = $row['un1'];
    $in2 = $row['in2'];
    $un2 = $row['un2'];
    $in3 = $row['in3'];
    $un3 = $row['un3'];
    $in4 = $row['in4'];
    $un4 = $row['un4'];
  }
  if($in1 == ' '){
    $in1 = '';
  }
  if($in2 == ' '){
    $in2 = '';
  }
  if($in3 == ' '){
    $in3 = '';
  }
  if($in4 == ' '){
    $in4 = '';
  }

  if($in1 != ''){
    $sql2 = "INSERT INTO shoppinglist (name, amount, type, meal_id, user_id) VALUES ('$in1', '$un1', 'ingredient','$meal_id', '')";
    if(!mysqli_query($con, $sql2)){
      echo ("Error description: " . $con -> error);
    }

  }
  if($in2 != ''){
    $sql3 = "INSERT INTO shoppinglist (name, amount, type, meal_id, user_id) VALUES ('$in2', '$un2', 'ingredient','$meal_id', '')";
    mysqli_query($con, $sql3);
  }
  if($in3 != ''){
    $sql4 = "INSERT INTO shoppinglist (name, amount, type, meal_id, user_id) VALUES ('$in3', '$un3', 'ingredient','$meal_id', '')";
    mysqli_query($con, $sql4);
  }
  if($in4 != ''){
    $sql5 = "INSERT INTO shoppinglist (name, amount, type, meal_id, user_id) VALUES ('$in4', '$un4', 'ingredient','$meal_id', '')";
    mysqli_query($con, $sql5);
  }
}

echo "<script>
          location.href='viewmeal.php?user_id=".$user_id."&meal_id=".$meal_id."';
      </script>"; exit;

?>
