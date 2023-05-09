
<?php

session_start();
$loggedin = $_SESSION['loggedin'];
$user = $_SESSION['user_Username'];
// echo $loggedin;
// // echo "<br>";
// echo $user;
// // echo "<br>";
if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) && isset($_SESSION['user_Username'])) {
  $user_First_name =$_SESSION['user_First_name'];
  $user_Last_name = $_SESSION['user_Last_name'];
  $user_Email =$_SESSION['user_Email'];
  $user_Username =$_SESSION['user_Username'] ; 
  $user_Id =$_SESSION['user_Id'];
  $user_phone =$_SESSION['user_phone'];
  // echo "Valid user";
  // echo$user_First_name .$user_Last_name . $user_Email. $user_Username.$user_Id;  echo "Valid user";
} else {
  // echo "INVALID user";
  // echo "<br>";
  // $path  = "Signin";
  header("location: index.php");
}

?>