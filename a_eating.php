<?php
session_start();

$user_id = $_GET['user_id'];
$meal_id = $_GET['meal_id'];
$_SESSION['user_id'] = $user_id;

$con = mysqli_connect("localhost","root","c4ed323b11921eaf","homemeals");

if (!$con){
  die('Could not connect:' .mysqli_connect_error());
}

$sql= "INSERT INTO eating (meal_id, user_id) VALUES ('$meal_id', '$user_id')";
mysqli_query($con, $sql);

echo "<script>
          location.href='javascript:history.back()';
      </script>"; exit;
