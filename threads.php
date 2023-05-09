<?php
require "./services/_dbconnect.php";
$Thread_id = $_GET["thread_id"];


$select_thread_query = "SELECT * FROM `threads` WHERE thread_id = $Thread_id";

$select_thread_result = mysqli_query($connect, $select_thread_query);
$num  = mysqli_num_rows($select_thread_result);

if (true) {
    include "threads_confirm.php";
} else {
    // echo "invalid cat_id";
    echo "<script>window.location.replace('welcome.php');</script>";
}
