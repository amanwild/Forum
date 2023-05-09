<?php
$Thread_id = $_GET["thread_id"];
// $cat_id = $_GET["Cat_id"];
if ((($_SERVER["REQUEST_METHOD"] == "POST" )&& isset($_POST['add_comments']) && $_SESSION['loggedin'])) {
    // require "./validation_of_user.php";
    $Comment_content = $_POST["comment_content"];
    $Comment_content =str_replace("<","&lt;",$Comment_content) ;
    $Comment_content =str_replace(">","&gt;",$Comment_content) ;
    $Related_cat_id_for_comment = $_POST["cat_Id"];
    $Related_thread_id_for_comment = $_POST["add_comment_in_thread_id"];
    // $Related_user_id_for_comment = $_POST["user_Id"];
    
    
    // echo $Cat_Id;
    // echo "4hello";
    
    
    $insert_comment_in_thread_query = "INSERT INTO `comments` (`comment_content`, `related_thread_id`, `comment_time`, `related_user_id`, `related_cat_id`) VALUES ( '".$Comment_content."', '".$Thread_id."', current_timestamp(), '".$user_Id."', '".$Related_cat_id_for_comment."')";
    
    try {
        $add_thread_result = mysqli_query($connect, $insert_comment_in_thread_query);
        // echo "Data addition  " . "<br>";
        // echo var_dump($Cat_Id);
        
    } catch (Exception $e) {
        // echo "Data addition failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }
}

?>