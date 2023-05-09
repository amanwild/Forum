<?php

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['set_profile_image']) && isset($_POST["submit_image"])) {

    
    $Id = $_SESSION['user_Id'];

    $submit_image = $_POST["submit_image"];
    // $delete_image = $_POST["delete_image"];
    $img_name = $_FILES["my_image"]["name"];
    $img_size = $_FILES["my_image"]["size"];
    $tmp_name = $_FILES["my_image"]["tmp_name"];
    $error = $_FILES["my_image"]["error"];
    if (($error === 0) && ($submit_image)) {
        if ($img_size > 125000) {
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_ex = array("jpeg", "jpg", "png");
            if (in_array($img_ex_lc, $allowed_ex)) {
                $new_img_name = uniqid("IMG-", true) . "." . $img_ex_lc;
                $user_img_url = $new_img_name;

                $img_upload_path = "C:\\xampp\\htdocs\\forum\\data\\" . $new_img_name;
                move_uploaded_FILE($tmp_name, $img_upload_path);
                $query_for_upload_img = "UPDATE `users_entries` SET `img_url` = '$new_img_name' WHERE `users_entries`.`Id` = $Id";

                $result_for_upload_img = mysqli_query($connect, $query_for_upload_img);
                if ($result_for_upload_img) {
                    $_SESSION['user_img_url'] =$user_img_url;
                    echo "Upload Success";
                }
            }
        }
    }

    // if ($delete_image) {


    //     $img_delete_path = "C:\\xampp\\htdocs\\forum\\data\\" . $user_img_url;
    //     unlink($img_delete_path);
    //     $query_for_delete_img = "UPDATE `users_entries` SET `img_url` = '' WHERE `users_entries`.`Id` = $Id";

    //     $result_for_delete_img = mysqli_query($connect, $query_for_delete_img);
    //     if ($result_for_delete_img) {
    //         echo "Delete Success";
    //     }
    // } 
}
