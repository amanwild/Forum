<?php

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['Contactus'])) {

    $user = filter($_POST["username"]);
    $contact_title = filter($_POST["contact_title"]);
    $contact_description = filter($_POST["contact_description"]);
    $firstname = filter($_POST["firstname"]);
    $lastname = filter($_POST["lastname"]);
    $email = filter($_POST["email"]);
    $gender = filter($_POST["gender"]);
    $contact_no = filter($_POST["contact_no"]);



    // $validation_of_user_query = "SELECT * FROM users_entries WHERE  Username = '$user'";
    // try {
    //     $validation_of_user_result = mysqli_query($connect, $validation_of_user_query);
    //     $row  = mysqli_num_rows($validation_of_user_result);
    //     if ($row >  0) {
    //         $validation_of_user_result = 1;
    //         echo "exist" . "<br>";
    //     } else {
    //         $validation_of_user_result = 0;
    //         echo "not exist" . "<br>";
    //     }
    // } catch (Exception $e) {
    //     echo "Duplicate date Checking failed " . "<br>";
    //     echo 'Message: ' . $e->getMessage() . "<br>";
    // }
    // if($validation_of_user_result){
        // echo "here  " . "<br>";
    $add_contact_us_query = "INSERT INTO `contact_us.` ( `Contact_First_name`, `Contact_Last_name`, `Contact_Username`, `Contact_Email`, `Contact_Gender`, `Contact_Title`, `Contact_Description`, `Contact_No`) VALUES ( '" . $firstname . "', '" . $lastname . "', '" . $user . "', '" . $email . "', '" . $gender . "', '" . $contact_title . "', '" . $contact_description . "', '" . $contact_no . "')";
    try {
        $add_contact_us_result = mysqli_query($connect, $add_contact_us_query);
        if($add_contact_us_result){

            // echo "Data insertion  " . "<br>";
        }else{
            
            // echo "Data insertion failed " . "<br>";
        }

        if ($insert_result) {
            header("location: Login.php");
        } 
    } catch (Exception $e) {
        // echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }

    // }else{
    //     echo
    //     "invalid user";
    // }
}
