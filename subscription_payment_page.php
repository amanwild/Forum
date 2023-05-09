<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Payment</title>
    <style>

    </style>
</head>

<body>
    <?php

    require "./services/validation_of_user.php";

    echo "here  " . "<br>" . $user_Id . $user_Id;
    echo "validaion was executed";


    include "./components/navbar.php";




    $product_name = "ABC";
    $price = 10;
    $name = "AMN";
    $phone = 8555562233;
    $email = "amansahu1130@gmail.com";



    if ((isset($_GET['user_Id'])) && ($_SERVER["REQUEST_METHOD"] == "GET")) {

        $subs_owner_ac_Id = filter($_GET["user_Id"]);
        echo  $user_Id . $user_Id . " CONFIRM GET REQUEST";
    } else {
        echo '<script type="text/javascript">location.href = "welcome.php";</script>';
        // header("location: welcome.php");
        exit();
    }

    $select_user_query = "SELECT * FROM users_entries WHERE  Id = '$subs_owner_ac_Id'";
    $select_user_result = mysqli_query($connect, $select_user_query);
    $num  = mysqli_num_rows($select_user_result);

    if ($num > 0) {
        echo "here";
        while ($row = mysqli_fetch_assoc($select_user_result)) {

            $subs_owner_ac_First_name =  $row['First_name'];
            $subs_owner_ac_Last_name =   $row['Last_name'];
            $subs_owner_ac_Email =       $row['Email'];
            $subs_owner_ac_Username =    $row['Username'];
            $subs_owner_ac_Id =    $row['Id'];

            $subs_owner_ac_phone =          $row['phone'];
            $subs_owner_ac_address =          $row['address'];
            $subs_owner_ac_designation =          $row['designation'];
            $subs_owner_ac_img_url =          $row['img_url'];
        }
    }






    ?>

    <section style="background-color: #eee;">
        <div class="container py-5">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="jumbotron py-1" style="border-radius:8px">
                                <div class=" my-4">
                                    <div class="d-flex  mt-0">
                                        <div class="font-weight-bold mb-0 mr-auto d-inline  text-algn-left">
                                            <div class="d-flex  mt-3">

                                                <h1 class=" p-2 my-auto mr-auto d-inline">Subscribe to <?= $subs_owner_ac_First_name . $subs_owner_ac_Last_name ?> </h1>


                                            </div>
                                            <p class="lead p-3">
                                                <?= "@" . $subs_owner_ac_Username; ?></p>

                                        </div>
                                        <div class="d-sticky display-left my-auto mr-0" style="border-radius:8px">
                                            <?php
                                            echo '<img src="/forum/data/' . $subs_owner_ac_img_url . '" class="rounded-circle img-fluid p-1 m-1" width=90px class="mr-3 p-1" alt="."/>';
                                            ?>
                                        </div>
                                        <hr class="my-4">
                                    </div>


                                    <p> This forum is for Sharing knowledge. Use proper language, Keep it friendly, Be courteous and respectful. Appreciate that others may have an opinion different from your, Stay on topic , Share your knowledge , Refrain from demeaning, discriminatory, or harassing behaviour and speech,
                                    </p>





                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="/forum/data/free.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h4 class="my-3">Bronze Member</h4>
                            <h6 class="my-3">You will get regular updates</h6>
                            <p class="text-muted mb-4">Lifetime free</p>
                            <div class="d-flex justify-content-center mb-2">

                                <form method="post" action="/forum/payments/pay.php">
                                    <input type="hidden" class="Follow" id="Follow" name="Follow" value="Follow">
                                    <input type="hidden" class="subs_owner_ac_Id" id="subs_owner_ac_Id" name="subs_owner_ac_Id" value="<?= $subs_owner_ac_Id ?>">
                                    <input type="hidden" class="subs_owner_ac_Username" id="subs_owner_ac_Username" name="subs_owner_ac_Username" value="<?= $subs_owner_ac_Username ?>">
                                    <script>
                                        Follow.value = true;
                                    </script>

                                    <button type="submit" class="btn btn-primary ms-1">JOIN FOR FREE </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="/forum/data/50.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h4 class="my-3">Silver Member</h4>
                            <h6 class="my-3">You will get notification of post</h6>
                            <p class="text-muted mb-4">Valid for 25 days</p>

                            <div class="d-flex justify-content-center mb-2">

                                <form method="post" action="/forum/services/pay.php">
                                    <input type="hidden" class="subs_silver" id="subs_silver" name="subs_silver" >
                                    <input type="hidden" class="subs_name" id="subs_name" name="subs_name" value="Silver Member">
                                    <input type="hidden" class="subs_price" id="subs_price" name="subs_price" value="50">
                                    <input type="hidden" class="subs_owner_ac_Id" id="subs_owner_ac_Id" name="subs_owner_ac_Id" value="<?= $subs_owner_ac_Id ?>">
                                    <input type="hidden" class="subs_owner_ac_Username" id="subs_owner_ac_Username" name="subs_owner_ac_Username" value="<?= $subs_owner_ac_Username ?>">
                      
                                    <script>
                                        subs_silver.value = true;
                                    </script>

                                    <button type="submit" class="btn btn-primary ms-1">PAYMENT 50 &#8377</button>
                                </form>
                              
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="/forum/data/100.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h4 class="my-3">Gold Member</h4>
                            <h6 class="my-3">You will get notification for upcoming post</h6>
                            
                            <p class="text-muted mb-4">Valid for 30 days</p>
                            <div class="d-flex justify-content-center mb-2">

                                <form method="post" action="/forum/services/pay.php">
                                <input type="hidden" class="subs_gold" id="subs_gold" name="subs_gold" >
                                    <input type="hidden" class="subs_name" id="subs_name" name="subs_name" value="Gold Member">
                                    <input type="hidden" class="subs_price" id="subs_price" name="subs_price" value="100">
                                    <input type="hidden" class="subs_owner_ac_Id" id="subs_owner_ac_Id" name="subs_owner_ac_Id" value="<?= $subs_owner_ac_Id ?>">
                                    <input type="hidden" class="subs_owner_ac_Username" id="subs_owner_ac_Username" name="subs_owner_ac_Username" value="<?= $subs_owner_ac_Username ?>">
                                
                                    <script>
                                        subs_gold.value = true;
                                    </script>

                                    <button type="submit" class="btn btn-primary ms-1">PAYMENT 100 &#8377</button>
                                </form>
                              
                            </div>
                        </div>
                    </div>

                </div>


            </div>
    </section>



    <?php
    include "./components/footer.php";
    // include ".";

    ?>
    <script>
    </script>
</body>

</html>