<?php
include './payments/src/instamojo.php';

$api = new Instamojo\Instamojo('test_c20612f86f64ebfd774a0986098', 'test_03e3ec31a2888e218100eac65a7', 'https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];
try {
    $response = $api->paymentRequestStatus($payid);
} catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

if(isset($_GET["payment_request_id"]) && isset($response['payments'][0]['payment_id'])){

    $title = "Payment Successfull";
}else{
    $title = "Payment Failed";

}

include "header.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Payment Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <?php
    if ($response['payments'][0]['amount'] == 100) {
        echo '<style>
            
            .card-body {
                /* fallback for old browsers */
                background: #f093fb;

    
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background-image:  linear-gradient(gold,Goldenrod, yellow,Goldenrod);
            }
    
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }
        </style>';
    }
    if ($response['payments'][0]['amount'] == 50) {
        echo '<style>
            
            .card-body {
                /* fallback for old browsers */
                background: #f093fb;

                background-image:  linear-gradient(LightGray,Silver,LightGrey,Silver);
            }
    
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }
        </style>';
    }
    ?>

</head>

<body>
    <?php
    require "./services/validation_of_user.php";
    // include 'src/instamojo.php';
    include "./components/navbar.php";
    ?>
    <section>
        <div class="container py-5">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                                <div class=" my-4">
                                    <div class="page-header">
                                        <h1> <?= $response['purpose'] ?> </h1>
                                    </div>
                                    <h3 style="color:#6da552">Thank You, Payment Successful!</h3>
                                    <h4 style="color:#6da552">Keep payment deatils safe for future reference.</h4>
                                    <?php
                                    try {
                                        echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>";
                                        echo "<h4>Amount Paid: " . $response['payments'][0]['amount'] . "</h4>";
                                        echo "<h4>Applicant Name: " . $response['payments'][0]['buyer_name'] . "</h4>";
                                        echo "<h4>Applicant Email: " . $response['payments'][0]['buyer_email'] . "</h4>";
                                        echo "<h4>Applicant Mobile Number: " . $response['payments'][0]['buyer_phone'] . "</h4>";
                                        echo "<h4>Payment created at: " . $response['payments'][0]['created_at'] . "</h4>";
                                        // echo "<pre>";
                                        // print_r($response);
                                        // echo "</pre>";
                                    ?>
                                    <?php
                                    } catch (Exception $e) {
                                        print('Error: ' . $e->getMessage());
                                    }
                                    ?>
                                </div> <!-- /container -->
                            </div> <!-- /container -->
                        </div> <!-- /container -->
                    </div> <!-- /container -->
                </div> <!-- /container -->
            </div> <!-- /container -->
        </div> <!-- /container -->

    </section> <!-- /container -->


</body>

</html>