<?php
if ((($_SERVER["REQUEST_METHOD"] == "POST" )&& isset($_POST['add_thread'])) && $_SESSION['loggedin'] ) {
    $title = $_POST["Q_title"];
    $title =str_replace("<","&lt;",$title) ;
    $title =str_replace(">","&gt;",$title) ;
    $description = $_POST["Q_description"];
    $description =str_replace("<","&lt;",$description) ;
    $description =str_replace(">","&gt;",$description) ;
    
    $Add_thread = $_POST["add_thread"];
    
    
    
    
    $add_thread_query = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('".$title."','".$description."', '".$cat_id."', '".$user_Id."');";
    try {
        $add_thread_result = mysqli_query($connect, $add_thread_query);
        // echo "Data addition  " . "<br>";
    } catch (Exception $e) {
        // echo "Data addition failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }
}

?>