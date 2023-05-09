<?php
// $Thread_id = $_GET["thread_id"];
// $cat_id = $_GET["Cat_id"];
if ((($_SERVER["REQUEST_METHOD"] == "POST" )&& isset($_POST['add_comments']) && $_SESSION['loggedin'])) {
    // require "./validation_of_user.php";
    $comment_id = $_POST["comment_id"];
    $Comment_content = $_POST["comment_content"];
    $Comment_content =str_replace("<","&lt;",$Comment_content) ;
    $Comment_content =str_replace(">","&gt;",$Comment_content) ;
    $Related_cat_id_for_reply = $_POST["cat_Id"];
    $Related_thread_id_for_reply = $_POST["add_comment_in_thread_id"];
    $parent_or_child = $_POST["parent_or_child"];
    // $Related_user_id_for_comment = $_POST["user_Id"];
    
    
    // echo $Cat_Id;
    // echo "4hello";
    
    
    // $insert_comment_in_thread_query = "INSERT INTO `comments` (`comment_content`, `related_thread_id`, `comment_time`, `related_user_id`, `related_cat_id`) VALUES ( '".$Comment_content."', '".$Thread_id."', current_timestamp(), '".$user_Id."', '".$Related_cat_id_for_comment."')";
    $insert_reply_in_comment_query = "INSERT INTO `comments` ( `comment_content`, `related_thread_id`, `related_user_id`, `related_cat_id`, `parent_or_child`) VALUES ('".$Comment_content."', '".$Related_thread_id_for_reply."', '".$user_Id."', '".$Related_cat_id_for_reply."',  '".$comment_id."')";

    
    try {
        $add_thread_result = mysqli_query($connect, $insert_reply_in_comment_query);
        echo "Data addition  " . "<br>";
        echo var_dump($Cat_Id);
        
    } catch (Exception $e) {
        echo "Data addition failed " . "<br>";
        echo 'Message: ' . $e->getMessage() . "<br>";
    }
}

?>