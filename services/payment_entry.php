<?php
include"./_dbconnect.php";
// function filter($string){
//     $string =str_replace("<","&lt;",$string) ;
//     $string =str_replace(">","&gt;",$string) ;
//     return $string;}


// if(isset($_POST[''])){

// }

$subs_owner_ac_Id = ($_POST["subs_owner_ac_Id"]);
$user_Id = ($_POST["user_Id"]);
$amount = ($_POST["amount"]);
$user_name = ($_POST["user_name"]);
$payment_id = ($_POST["payment_id"]);
$user_Email = ($_POST["user_Email"]);
$status = ($_POST["status"]);
$description = ($_POST["description"]);
$currency = ($_POST["currency"]);


// echo  "in payment entry : ";
if (true) {

    $insert_query = "INSERT INTO `payment_entry` (`payment_id`,`user_Email`,`user_id`, `subs_owner_ac_id`,`status`, `amount`, `purpose`, `currency`, `users_name`) VALUES ( '$payment_id', '$user_Email','$user_Id','$subs_owner_ac_Id', '$status', '$amount', '$description', '$currency','$user_name')";
    try {
        $insert_result = mysqli_query($connect, $insert_query);
        if($insert_result){
            // echo " Data insertion  " . "<br>";

        }else{

            // echo "Data insertion failed " . "<br>";
        }
    } catch (Exception $e) {
        // echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }
}
