<?php



if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['Follow'])) {
    
    $ac_owner_Id = filter($_POST["ac_owner_Id"]);
 
    $exist_query = "SELECT * FROM followers WHERE  ac_owner_Id = '$ac_owner_Id'";
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $row  = mysqli_num_rows($exist_result);
        if ($row >  0) {
            // // echo "exist";
            $exist_result = 1;
            // echo "exist" . "<br>";
        }
        // if($exist_result->num_rows >  0){
        //   $exist_result = 1;
        // }
        else {
            $exist_result = 0;
            // echo "not exist" . "<br>";
        }
    } catch (Exception $e) {
        // echo "Duplicate date Checking failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }
    try {
        $confirm  = (($pass == $c_pass) && isset($pass)) && isset($user);
    } catch (Exception $e) {
        // echo "Pssword confirmaiton failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }


    if ($confirm && !($exist_result)) {
        $v_code = bin2hex(random_bytes(16));
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO `users_entries`( `Username`, `Password`, `First_name`, `Last_name`, `Email`, `img_url`,`verification_code`) VALUES ('$user','$hash','$firstname','$lastname','$email','dummy_profile_img.webp','$v_code')";
        try {
            $insert_result = mysqli_query($connect, $insert_query);

            if ($insert_result) {

                // echo "Data insertion" . "<br>";
                $store = send_mail($email, $v_code);
                if ($store) {
                    // echo ("<br> email shooting successfull <br>");
                } else {
                    // echo ("<br> email shooting failed <br>");
                }
              
            }
        } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }
}
