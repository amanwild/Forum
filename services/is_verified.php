<?php



if (($_SERVER["REQUEST_METHOD"] == "GET") &&  isset($_GET['v_code']) && isset($_GET['email'])) {
    $verified =false;
    require "_dbconnect.php";
    $v_code = $_GET["v_code"];
    $email = $_GET["email"];

    $select_user_query = "SELECT * FROM users_entries WHERE  Email = '$email'";
    $select_user_result = mysqli_query($connect, $select_user_query);
    $num  = mysqli_num_rows($select_user_result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($select_user_result)) {


            $verification_code =  $row['verification_code'];
            $Id =  $row['Id'];

            $select_email_result = true;
            if ($v_code == $verification_code) {
                try {

                    // echo "V Code matches success " . "<br>";
                    $update_status_query = "UPDATE `users_entries` SET `is_verifed` = '1' WHERE `users_entries`.`Id` = $Id";
                    $update_status_result = mysqli_query($connect, $update_status_query);
                    if ($update_status_result) {
                        $verified =true;
                        // echo "verification success " . "<br>";
                    } else {
                        // echo "verification failed " . "<br>";
                    }

                    // header("location: /forum/welcome.php");
                } catch (Exception $e) {
                    // echo "verification failed " . "<br>";
                    // echo 'Message: ' . $e->getMessage() . "<br>";
                    // header("location: /forum/index.php");
                }
            }
        }
    } else {
        $select_email_result = false;
        // echo "invalid email";
        // header("location: /forum/index.php");
    }
}
