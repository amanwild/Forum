<?php 
$subs_name = $_POST["subs_name"] ;
$price = $_POST["subs_price"];
$subs_owner_ac_Id = $_POST["subs_owner_ac_Id"];
$subs_owner_ac_Username = $_POST["subs_owner_ac_Username"];

if(isset($_POST['subs_silver'])){

    $subs_silver = $_POST["subs_silver"];
}
if(isset($_POST['subs_gold'])){

    $subs_silver = $_POST["subs_gold"];
}


include '../payments/src/instamojo.php';
include "../services/get_profile.php";

$api = new Instamojo\Instamojo('test_c20612f86f64ebfd774a0986098', 'test_03e3ec31a2888e218100eac65a7','https://test.instamojo.com/api/1.1/');

try {
        $response = $api->paymentRequestCreate(array(
        "purpose" => $subs_name."ship of @".$subs_owner_ac_Username,
        "amount" => $price,
        "buyer_name" => $user_Username,
        "phone" => $user_phone,
        "send_email" => false,
        "send_sms" => false,
        "email" => $user_Email,
        "mobile" => $phone,
        "shipping_city" => $user_address,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://localhost:8080/forum/thankyou.php",
        "webhook" => "https://www.djtechblog.com/php/projects/payments/webhook.php"
        ));
 
    $pay_ulr = $response['longurl'];
    
 

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>