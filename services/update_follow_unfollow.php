<?php
include "./validation_of_user.php";
include "./_dbconnect.php";
if (isset($_POST['type']) && isset($_POST['ac_owner_Id'])) {
    $ac_owner_Id = $_POST['ac_owner_Id'];
    $user_Id = $_SESSION['user_Id'];
    $id = $user_Id.'_'.$ac_owner_Id;
    $type = $_POST['type'];
    $update_result = false;
    if ($type == "remove" && ($ac_owner_Id != $user_Id)) {
        $id = $ac_owner_Id . '_' . $user_Id;
        $update_query = "DELETE FROM `following_table` WHERE `following_table`.`id` = '$id'";
        $update_result = mysqli_query($connect, $update_query);
    }
    if ($type == "follow" && ($ac_owner_Id != $user_Id)) {
        $update_query = "INSERT INTO `following_table` (`id`,`follower_id`, `following_id`) VALUES ('$id','$user_Id', '$ac_owner_Id')";
        $update_result = mysqli_query($connect, $update_query);
    }
    if ($type == "unfollow" && ($ac_owner_Id != $user_Id)) {
        $update_query = "DELETE FROM `following_table` WHERE `following_table`.`id` = '$id'";
        $update_result = mysqli_query($connect, $update_query);
    }
    if ($update_result) {
        echo json_encode([
            'type' => $type,
            'status' => 'success',
        ]);
    } else {
        echo json_encode([
            'type' => $type,
            'status' => 'failed',
        ]);
    }
}
