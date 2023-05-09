<?php
include "./validation_of_user.php";
include "./_dbconnect.php";
if (isset($_POST['table_name']) && isset($_POST['condition'])) {
    $table_name = $_POST['table_name'];
    $condition = $_POST['condition'];
    $count_query_result = false;

    $count_query = "SELECT * FROM $table_name WHERE $condition";
    // $count_query = "SELECT * FROM threads WHERE thread_user_id = 114";

    $count_query_result = mysqli_query($connect, $count_query);
    // echo var_dump($count_query_result);
    $num  = mysqli_num_rows($count_query_result);

    // echo $num;
    if ($count_query_result) {
        echo json_encode([
            'count' => $num,
            'status' => 'success',
        ]);
    } else {
        echo json_encode([
            'status' => 'failed',
        ]);
    }

    
}
