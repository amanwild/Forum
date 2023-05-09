<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quetions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

</head>

<body>
    <?php

    require "./services/validation_of_user.php";
    require "./services/pick_ago_time.php";
    include "./components/navbar.php";
   

    ?>
    <!-- ################################# ADDING VARIABLES VALUE ######################### -->
    <?php
    $cat_id = $_GET["Cat_id"];
    $select_cat_id_query = "SELECT * FROM `categories` WHERE cat_id = $cat_id";

    $select_cat_id_result = mysqli_query($connect, $select_cat_id_query);
    $num  = mysqli_num_rows($select_cat_id_result);

    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($select_cat_id_result)) {
            $cat_title = $row['cat_title'];
            $cat_created = $row['cat_created'];
            $cat_description = $row['cat_description'];
            $cat_user_id = $row['cat_user_id'];
        }

        $select_username_of_category_query = "SELECT * FROM `users_entries` WHERE Id = $cat_user_id";
        $select_username_of_thread_result = mysqli_query($connect, $select_username_of_category_query);
        while ($row = mysqli_fetch_assoc($select_username_of_thread_result)) {
            $category_owner_result_Username = $row['Username'];
            $category_owner_result_Id = $row['Id'];
            $category_owner_result_dt = $row['dt'];
            $category_owner_result_First_name = $row['First_name'];
            $category_owner_result_Last_name = $row['Last_name'];
            $category_owner_result_Email = $row['Email'];
            $category_owner_result_img_url = $row['img_url'];
            // $cat_title = $row['cat_title'];
            // $cat_created = $row['cat_created'];
            // $cat_description = $row['cat_description'];
            // $cat_user_id = $row['cat_user_id'];
            $cat_time_ago_formate =  time_elapsed_string($cat_created);
        }
   
    // <!-- ################################# USING  VARIABLES VALUE FOR SERVICING ######################### -->
    include "./services/add_new_thread.php";
    include "./modals/add_new_thread_modal.php";
    include "threadlist_confirm.php";
    

     } else {
        $select_email_result = false;
        // echo "invalid cat_id";
        echo "<script>window.location.replace('welcome.php');</script>";
        // header("location: /forum/index.php");
    }
    include "./components/footer.php";
    ?>

</body>

</html>