<body>
<?php
// echo "<br>hello in add cat service<br>";


if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['Category'])) {
    
    echo "enter in add cat service<br>";
    $user_Id = $_SESSION["user_Id"];

    $title = $_POST["title"];
    $title =str_replace("<","&lt;",$title) ;
    $title =str_replace(">","&gt;",$title) ;
    $description = $_POST["description"];
    $description =str_replace("<","&lt;",$description) ;
    $description =str_replace(">","&gt;",$description) ;

    $exist_result = false;
    $exist_query = "SELECT * FROM categories WHERE  cat_title = '$title'";
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $row  = mysqli_num_rows($exist_result);
        if ($row >  0) {
            $exist_result = true;
            echo "<script>alert('Category Already exist');</script>". "<br>";
        }else{
            $exist_result = false;
            echo "not exist". "<br>";
            
        }
       
        
    } catch (Exception $e) {
        echo "Duplicate date Checking failed " . "<br>";
        echo 'Message: ' . $e->getMessage() . "<br>";
    }
    
    
    
    if (!$exist_result) {
        echo "Duplicate date Checking failed " . "<br>";
       
        // $add_query = "INSERT INTO `categories` (`cat_title`, `cat_description`, `cat_created`, `cat_id`, `cat_user_id`) VALUES ('gg', 'sad', current_timestamp(), NULL, '115')";
        $add_query = "INSERT INTO `categories`( `cat_title`, `cat_description`, `cat_user_id`) VALUES ('$title','$description','$user_Id')";
        try {
            $add_result = mysqli_query($connect, $add_query);
            echo "Data addition  " . "<br>";

            if ($add_result) {
                echo "Data addition failed " . "<br>";
                header("location: welcome.php");
            } else {
                $path  = "Signin";
            }
        } catch (Exception $e) {
            echo "Data addition failed " . "<br>";
            echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }
}
?></body>