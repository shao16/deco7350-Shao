<?php
session_start();

$user_id = $_GET['user_id'];
$_SESSION['user_id'] = $user_id;

$con = mysqli_connect("localhost","root","c4ed323b11921eaf","homemeals");

if (!$con){
  die('Could not connect:' .mysqli_connect_error());
}

$ing1 = '';
$ing2 = '';
$ing3 = '';
$ing4 = '';
$unit1 = '';
$unit2 = '';
$unit3 = '';
$unit4 = '';


if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($con, $_POST['name']);
  $ing1 = mysqli_real_escape_string($con, $_POST['ing1']);
  $ing2 = mysqli_real_escape_string($con, $_POST['ing2']);
  $ing3 = mysqli_real_escape_string($con, $_POST['ing3']);
  $ing4 = mysqli_real_escape_string($con, $_POST['ing4']);
  $unit1 = mysqli_real_escape_string($con, $_POST['unit1']);
  $unit2 = mysqli_real_escape_string($con, $_POST['unit2']);
  $unit3 = mysqli_real_escape_string($con, $_POST['unit3']);
  $unit4 = mysqli_real_escape_string($con, $_POST['unit4']);

  if($unit1 == ''){
    $unit1 = 0.00;
  }
  if($unit2 == ''){
    $unit2 = 0.00;
  }
  if($unit3 == ''){
    $unit3 = 0.00;
  }
  if($unit4 == ''){
    $unit4 = 0.00;
  }

  $sql = "INSERT INTO savedmeal (name, in1, un1, in2, un2, in3, un3, in4, un4)
  VALUES ('$name', '$ing1', '$unit1', '$ing2', '$unit2', '$ing3', '$unit3', '$ing4', '$unit4')";
  if(!mysqli_query($con, $sql)){
    echo ("Error description: " . $con -> error);
  }
  $savedmeal_id = mysqli_insert_id($con);
}

echo "<script>
          location.href='addmeal.php?user_id=".$user_id."';
      </script>"; exit;

?>
