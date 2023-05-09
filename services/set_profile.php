<?php
include "filter_user_input.php";
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['set_profile'])) {
    function filter($string){
        $string =str_replace("<","&lt;",$string) ;
        $string =str_replace(">","&gt;",$string) ;
        return $string;}

    $user = filter($_POST["username"]);
    $phone = filter($_POST["phone"]);
    $address = filter($_POST["address"]);
    $designation = filter($_POST["designation"]);
    $firstname = filter($_POST["firstname"]);
    $lastname = filter($_POST["lastname"]);
    $email = filter($_POST["email"]);




    //  echo$user.$hash.$firstname.$lastname.$email. "<br>";

    // echo $signin;
    $exist_result = false;

    $Id = $_SESSION['user_Id'];
    $exist_query = "SELECT * FROM users_entries WHERE  Username = '$user'";
    $auth_success = 1;
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        // $row  = mysqli_num_rows($exist_result);
        while ($row = mysqli_fetch_assoc($exist_result)) {

            $user_Id =   $row['Id'];


            if ($user_Id == $Id) {
                // // echo "exist";
                $auth_success = 1;
                echo "self username" . "<br>";
            } else {
                $auth_success = 0;
                echo "invalid username" . "<br>";
            }
        }
    } catch (Exception $e) {
        echo "Duplicate data Checking failed " . "<br>";
        echo 'Message: ' . $e->getMessage() . "<br>";
    }


    if ($auth_success) {
        $update_query = "UPDATE `users_entries` SET `Username` = '$user', `First_name` = '$firstname', `Last_name` = '$lastname', `Email` = '$email', `phone` = '$phone', `designation` = '$designation', `address` = '$address' WHERE `users_entries`.`Id` = $Id";

        // $update_query = "INSERT INTO `users_entries`( `Username`, `First_name`, `Last_name`, `Email`, `phone`, `designation`, `address`) VALUES ('$user','$firstname','$lastname','$email','$phone','$designation','$address')";
        $user_len = strlen($user);
        $firstname_len = strlen($firstname);
        $lastname_len = strlen($lastname);
        $email_len = strlen($email);


        try {
            if ($connect && $user_len > 0 && $firstname_len > 0 && $lastname_len > 0) {
                $update_result = mysqli_query($connect, $update_query);
                $_SESSION['user_First_name'] =$firstname;
                $_SESSION['user_Last_name'] =$lastname;
                $_SESSION['user_Email'] =$email;
                $_SESSION['user_Username'] =$user;
                echo "Data updation  " . "<br>";
                header("location: profile.php");
            }
        } catch (Exception $e) {
            echo "Data updation failed " . "<br>";
            echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }
}
