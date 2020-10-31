<?php
session_start();

$user_id = $_GET['user_id'];
$shoppinglist_id = $_GET['shoppinglist_id'];
$_SESSION['user_id'] = $user_id;

$con = mysqli_connect("localhost","root","c4ed323b11921eaf","homemeals");

if (!$con){
  die('Could not connect:' .mysqli_connect_error());
}

$sql1 = "UPDATE shoppinglist SET user_id='$user_id' WHERE shoppinglist_id=$shoppinglist_id";
mysqli_query($con, $sql1);

echo "<script>
          location.href='shoppinglist.php?user_id=".$user_id."';
      </script>"; exit;
