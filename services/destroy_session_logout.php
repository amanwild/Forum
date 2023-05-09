<?php
// require "./Components/create_session_login_account.php";
// echo" 3Session is Destroyed ";    echo"<br>";
if(($_SERVER["REQUEST_METHOD"]=="POST")&&  isset($_POST["Logout"])){
        
    // echo" Session is Destroyed ";    echo"<br>";
    
    try {

        session_start();
        $_SESSION["loggedout"] =true;
        session_unset();
        session_destroy();
        $Logout_result = 1;
        // echo" Session is Destroyed ";    echo"<br>";
        
        // echo"Please set Session variables from "set or start session"to log in";    echo"<br>";
        header("location: /forum/index.php");
    }
    
    catch (\Throwable $th) {
        $Logout_result = 0;
        // echo"Please set Session variables from "set or start session"to log in ".$th;    echo"<br>";
        //throw $th;
    }
    
}
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//     $loggedin = true;
   
    
    
// } else {
//     // header("location: /forum/index.php");
//     echo '
//     ';
// }




// // session_start();
// if (isset($_SESSION['loggedin'])) {
//     $user = $_SESSION['username'];
//     // echo"Valid user";
// } else {
//     // echo"INVALID user";
//     $path  = "Signin";
//     // header("location: Login.php");
// }
?>