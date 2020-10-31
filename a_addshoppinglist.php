<?php
session_start();

$user_id = $_GET['user_id'];
$_SESSION['user_id'] = $user_id;

$con = mysqli_connect("localhost","root","c4ed323b11921eaf","homemeals");

if (!$con){
  die('Could not connect:' .mysqli_connect_error());
}

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $amount = $_POST['amount'];

    $sql= "INSERT INTO shoppinglist (name, amount, type, meal_id, user_id)
    VALUES ('$name', '$amount', 'miscellaneous', 0, '')";
    if(!mysqli_query($con, $sql)){
      echo ("Error description: " . $con -> error);
    }
    $shoppinglist_id = mysqli_insert_id($con);

}

echo "<script>
          location.href='shoppinglist.php?user_id=".$user_id."';
      </script>"; exit;

?>
