<?php
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['set_profile_image']) && isset($_POST["delete_image"])) {
    $Id = $_SESSION['user_Id'];
    $img_delete_path = "C:\\xampp\\htdocs\\forum\\data\\" . $user_img_url;
    unlink($img_delete_path);
    $query_for_delete_img = "UPDATE `users_entries` SET `img_url` = '' WHERE `users_entries`.`Id` = $Id";

    $result_for_delete_img = mysqli_query($connect, $query_for_delete_img);
    if ($result_for_delete_img) {
       
        $_SESSION['user_img_url']="dummy_profile_img.webp";

        echo "Delete Success";
    }
}

?>