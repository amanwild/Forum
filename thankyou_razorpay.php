<?php
require "./services/validation_of_user.php";
require "./services/_dbconnect.php";
$payid = $_GET["payment_id"];
$subs_owner_ac_Id = $_GET["subs_owner_ac_Id"];
try {
    $select_payment_query = "SELECT * FROM payment_entry WHERE  payment_id = '$payid' AND subs_owner_ac_id = '$subs_owner_ac_Id'";
    $select_payment_result = mysqli_query($connect, $select_payment_query);
    $num  = mysqli_num_rows($select_payment_result);

    $is_valid_payment_id = false;
    // echo $payid.$subs_owner_ac_Id;
    if ($num > 0) {
        $is_valid_payment_id = true;

        while ($row = mysqli_fetch_assoc($select_payment_result)) {

            $user_id =  $row['user_id'];
            if ($user_id == $user_Id) {
                $subs_owner_ac_id =   $row['subs_owner_ac_id'];
                $time_stamp =       $row['time_stamp'];
                $payment_id =    $row['payment_id'];
                $users_name =    $row['users_name'];
                $amount =    $row['amount'];
                $description =    $row['purpose'];

                $select_user_query = "SELECT * FROM users_entries WHERE  Id = '$subs_owner_ac_id'";
                $select_user_result = mysqli_query($connect, $select_user_query);
                $num  = mysqli_num_rows($select_user_result);

                if ($num > 0) {

                    while ($row = mysqli_fetch_assoc($select_user_result)) {

                        $subs_owner_ac_First_name =  $row['First_name'];
                        $subs_owner_ac_img_url =  $row['img_url'];
                        $subs_owner_ac_Last_name =   $row['Last_name'];
                        $subs_owner_ac_Email =       $row['Email'];
                        $subs_owner_ac_Username =    $row['Username'];
                        $subs_owner_ac_img_url =    $row['img_url'];
                        $subs_owner_ac_phone =          $row['phone'];
                        $subs_owner_ac_address =          $row['address'];
                        $subs_owner_ac_designation =          $row['designation'];
                    }
                }
            }
        }
    } else {
        // echo "<script>window.location.replace('welcome.php');</script>";
        echo "Error";
    }
} catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

if (isset($_GET["payment_request_id"]) && isset($response['payments'][0]['payment_id'])) {

    $title = "Payment Successfull";
} else {
    $title = "Payment Failed";
}

include "header.php";
if ($amount == 100) {
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
if ($amount == 0) {
    echo '<style>
            
            .card-body {
                /* fallback for old browsers */
                background:  #cd7f32;

    
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background-image:  linear-gradient(bronze,#cd7f32, #FFC300,#cd7f32);
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
if ($amount == 50) {
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



<body>
    <?php

    // include 'src/instamojo.php';
    include "./components/navbar.php";
    ?>
    <section>
        <div class="container py-5">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body ">
                            <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                                <div class=" my-4">
                                    <div class="d-flex  mt-0 text-center">
                                        <div class="font-weight-bold mb-0 mr-auto d-inline  text-algn-left">
                                            <div class="d-flex  mt-3">

                                                <h1 class=" p-2 my-auto mr-auto d-inline"><?= $description ?></h1>


                                            </div>
                                            <h3 style="color:#6da552">Thank You, Payment Successful!</h3>

                                        </div>
                                        <div class="d-sticky display-left my-auto mr-0" style="border-radius:8px">
                                            <?php
                                            echo '<img src="/forum/data/' . $subs_owner_ac_img_url . '" class="rounded-circle img-fluid p-1 m-1" width=90px class="mr-3 p-1" alt="."/>';
                                            ?>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="col-lg-12">
                                        <div class="row mx-5">

                                            <?php
                                            try {
                                                echo "<div class='row '><div class='col-lg-4 mx-auto'><h4>Applicant Name </h4></div> <div class='col-lg-6 px-auto'><h5> :  " . $users_name . "</h5></div></div>";
                                                echo "<div class='row '><div class='col-lg-4 mx-auto'><h4>Payment ID  :</h4></div> <div class='col-lg-6 px-auto'><h5> :  " . $payment_id . "</h5></div></div>";
                                                echo "<div class='row '><div class='col-lg-4 mx-auto'><h4>Amount Paid </h4></div> <div class='col-lg-6 px-auto'><h5> :  " . $amount . "</h5></div></div>";
                                                echo "<div class='row '><div class='col-lg-4 mx-auto'><h4>Applicant Email </h4></div> <div class='col-lg-6 px-auto'><h5> :  " . $user_Email . "</h5></div></div>";
                                                echo "<div class='row '><div class='col-lg-4 mx-auto'><h4>Applicant Mobile Number </h4></div> <div class='col-lg-6 px-auto'><h5> :  " . $user_phone . "</h5></div></div>";
                                                echo "<div class='row '><div class='col-lg-4 mx-auto'><h4>Payment created at </h4></div> <div class='col-lg-6 px-auto'><h5> :  " . $time_stamp . "</h5></div></div>";
                                                // echo "<pre>";
                                                // print_r($response);
                                                // echo "</pre>";
                                            ?>
                                            <?php
                                            } catch (Exception $e) {
                                                print('Error: ' . $e->getMessage());
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</body>

<?php

include "./components/footer.php";
?>