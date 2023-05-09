<?php

require "./services/validation_of_user.php";
$title = "My Profile";

include "header.php";
?>

<!-- <style>
    .card-body{
        padding:0px !important;
        margin:10px;
    }
    .col-lg-8{
        padding:0px !important;
        /* margin:10px; */
    }
    .col-sm-3{
        padding:0px !important;
        margin:10px;
    }
</style> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<body>

    <?php

    // echo "validaion was executed";


    include "./components/navbar.php";
    include "./services/get_profile.php";
    include "./services/pick_ago_time.php";
    include "./services/count_enteries.php";

    ?>
    <?php
    $user_Id = $_SESSION['user_Id'];
    $ac_owner_Id = $user_Id;


    $select_user_query = "SELECT * FROM users_entries WHERE  Id = '$user_Id'";
    $select_user_result = mysqli_query($connect, $select_user_query);
    $num  = mysqli_num_rows($select_user_result);

    if ($num > 0) {
        // echo "here";
        while ($row = mysqli_fetch_assoc($select_user_result)) {

            $user_First_name =  $row['First_name'];
            $user_Last_name =   $row['Last_name'];
            $user_Email =       $row['Email'];
            $user_Username =    $row['Username'];

            $user_phone =          $row['phone'];
            $user_address =          $row['address'];
            $user_designation =          $row['designation'];
            $user_img_url =          $row['img_url'];
        }
    }
    $id = $_SESSION['user_Id'].'_'.$ac_owner_Id;
    $verify_follow_query = "SELECT * FROM following_table WHERE  id = '$id'";
    $verify_follow_result = mysqli_query($connect, $verify_follow_query);
    $num  = mysqli_num_rows($verify_follow_result);

    $followed_btn ="button";
    $unfollowed_btn ="hidden";
    if ($num > 0) {
        $unfollowed_btn ="button";
        $followed_btn ="hidden";
    }
    ?>
    <section style="background-color: #eee;">
        <div class="container py-5">


            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4  p-4">
                        <?php include "./components/user_overview_card.php"; ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <?php include "./modals/show_followers_modal.php"; ?>
                    <?php include "./modals/show_followings_modal.php"; ?>
                    <?php include "./modals/show_comments_Modal.php";?>

                     <!-- include "./modals/show_comments_modal.php"; -->
                     <!-- include "./modals/show_quetions_modal.php"; -->
                     <!-- include "./modals/show_joing_modal.php"; -->
                     <?php include "./modals/show_categories_modal.php"; ?>
                     <?php include "./modals/show_joing_modal.php"; ?>
                     <?php include "./modals/show_subscription_modal.php"; ?>
                     <?php include "./modals/show_quetions_modal.php"; ?>
                     <!-- include "./modals/show_subscription_modal.php"; -->
                    <?php include "./components/users_contribution.php"; ?>
                </div>
            </div>
            <div class="col-lg-12">
                <?php include "./components/users_cat.php"; ?>
            </div>
            <div class="col-lg-12">
                <?php include "./components/users_que.php"; ?>
            </div>
            <div class="col-lg-12">
                <?php include "./components/users_sol.php"; ?>
            </div>
        </div>
        </div>
    </section>


    <?php
    include "./components/footer.php";
    // include ".";

    ?>
    <script>
    
    function update_follow_unfollow(condition, ac_owner_Id) {
        $.ajax({
            url: "http://localhost:8080/forum/services/update_follow_unfollow.php",
            type: "POST",
            data: {
                type: condition,
                ac_owner_Id: ac_owner_Id,

            },
            success: function(result) {
                console.log("success");
                console.log(result);
                result = JSON.parse(result);
                console.log(result.type);
                
                if(result.type=="follow" && result.status =="success"){
                    $('#follow_btn_'+ac_owner_Id).attr("type", "hidden");
                    $('#unfollow_btn_'+ac_owner_Id).attr("type", "button");
                    console.log(" change ");
                }
                if(result.type=="unfollow" && result.status =="success"){
                    $('#follow_btn_'+ac_owner_Id).attr("type", "button");
                    $('#unfollow_btn_'+ac_owner_Id).attr("type", "hidden");
                    console.log(" change ");
                    
                }
                if(result.type=="follow" && result.status =="failed"){
                    $('#follow_btn_'+ac_owner_Id).attr("type", "button");
                    $('#unfollow_btn_'+ac_owner_Id).attr("type", "hidden");
                    console.log(" change ");
                }
                if(result.type=="unfollow" && result.status =="failed"){
                    $('#follow_btn_'+ac_owner_Id).attr("type", "hidden");
                    $('#unfollow_btn_'+ac_owner_Id).attr("type", "button");
                    console.log(" change ");
                   
                }

            }
        });
    }

    
</script>
    <script>
    </script>
</body>

</html>