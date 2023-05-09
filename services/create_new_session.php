<?php

include "./_dbconnect.php";
session_start();

if (($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST['Login'])) {

  $user = $_POST["username"];
  $user = str_replace("<", "&lt;", $user);
  $user = str_replace(">", "&gt;", $user);

  $pass = $_POST["password"];
  $pass = str_replace("<", "&lt;", $pass);
  $pass = str_replace(">", "&gt;", $pass);

  $Login = $_POST["Login"];
  $Login = str_replace("<", "&lt;", $Login);
  $Login = str_replace(">", "&gt;", $Login);



  echo "login";

  //for wtihout hashing
  // $login_query = "SELECT * FROM users_entries WHERE  Username = '$user'AND Password = '$pass'";
  $login_query = "SELECT * FROM users_entries WHERE  Username = '$user'";
  $login_result = mysqli_query($connect, $login_query);
  $num  = mysqli_num_rows($login_result);

  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($login_result)) {
      if (password_verify($pass, $row['Password'])) {
        $user_First_name =  $row['First_name'];
        $user_Last_name =   $row['Last_name'];
        $user_Email =       $row['Email'];
        $user_Username =    $row['Username'];
        $user_Id =          $row['Id'];
        $user_img_url =          $row['img_url'];
        $user_phone =          $row['phone'];
        echo "login";
        $login_result = true;
        if ($login_result) {
          try {



            $_SESSION['user_First_name'] = $user_First_name;
            $_SESSION['user_Last_name'] = $user_Last_name;
            $_SESSION['user_Email'] = $user_Email;
            $_SESSION['user_Id'] = $user_Id;
            $_SESSION['user_Username'] = $user_Username;
            $_SESSION['user_img_url'] = $user_img_url;
            $_SESSION['user_phone'] = $user_phone;

            $_SESSION['loggedin'] = true;
            $_SESSION['connect'] = false;


            $_SESSION['mess'] = "";
            $_SESSION['insert_result'] = false;
            $_SESSION['Logout_result'] = false;
            $_SESSION['select_result'] = false;
            $_SESSION['login_result'] = false;
            $_SESSION['delete_result'] = false;
            $_SESSION['update_result'] = false;
            $_SESSION['confirm'] = false;
            $_SESSION['exist_result'] = false;
            $_SESSION['Signin'] = false;
            $_SESSION['insert_result'] = false;
            $_SESSION['please_login'] = false;
            $_SESSION['Login'] = false;

            // reloction path or change path to Welcome page
            echo "Login success " . "<br>";
            header("location: /forum/welcome.php");
          } catch (Exception $e) {
            echo "Login failed " . "<br>";
            echo 'Message: ' . $e->getMessage() . "<br>";
            header("location: /forum/index.php");
          }
        } else {
          $login_result = false;
          echo "fetch user date failed";
          // header("location: /forum/index.php");
        }
      } else {
        $login_result = false;
        echo "invalid password";
        // header("location: /forum/index.php");
      }
    }
  } else {
    $login_result = false;
    echo "invalid username";
    // header("location: /forum/index.php");
  }
}
