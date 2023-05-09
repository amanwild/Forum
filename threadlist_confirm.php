<div class="container my-4">
    <div class="jumbotron py-1" style="border-radius:8px">
        <div class=" my-4">
            <div class="d-flex  mt-0">
                <div class="font-weight-bold mb-0 mr-auto d-inline  text-algn-left">
                    <a href="./welcome.php#cat_id_<?= $cat_id ?>" class="" type="button" style="text-decoration:none;color:black;">
                        <div class="d-flex  mt-3">

                            <h1 class=" p-2 my-auto mr-auto d-inline">Welcome to <?php echo $cat_title; ?> forum</h1>


                        </div>
                        <p class="lead p-3">
                            <?php echo $cat_description; ?></p>

                    </a>
                </div>
                <div class="d-sticky display-left my-auto mr-0" style="border-radius:8px">
                    <?php
                    echo ' <a href="/forum/user_profile.php?user_id=' . $cat_user_id . '"  type="button" style="text-decoration:none;"> <img src="/forum/data/' . $category_owner_result_img_url . '" class="rounded-circle img-fluid" style="width: 150px;object-fit:cover;height:150px" class="mr-3 p-1" alt="."/></a>';
                    ?>
                </div>
                <hr class="my-4">
            </div>


            <p> This forum is for Sharing knowledge. Use proper language, Keep it friendly, Be courteous and respectful. Appreciate that others may have an opinion different from your, Stay on topic , Share your knowledge , Refrain from demeaning, discriminatory, or harassing behaviour and speech,
            </p>


            <div class="media-body">
                <hr class="my-0">
                <div class="d-flex text-center mt-0">
                    <?php echo '
                    <p class="font-weight-bold mb-0 mr-auto d-inline">Posted by :  <a href="/forum/user_profile.php?user_id=' . $category_owner_result_Id . '" class=" my-auto mr-2" type="button" style="text-decoration:none;">@' . $category_owner_result_Username . ' </a>
                    <p>
                        <span class="d-sticky display-left my-0 mr-0"> ( ' . $cat_time_ago_formate . ' ) </span>
' ?>
                </div>
            </div>


        </div>


    </div>
    <?php

    ?>

    <div class="d-flex text-center mt-3">
        <h1 class=" ml-5 my-auto mr-auto d-inline"> Browse Quetions</h1>

        <button type="button" class="btn btn-success d-sticky display-right my-1 mr-5" data-toggle="modal" data-target="#add_thread_Modal" data-whatever="@mdo">Add Quetions</button>

    </div>

    <?php

    $select_thread_query = "SELECT * FROM `threads` WHERE `thread_cat_id`= $cat_id";

    $select_thread_result = mysqli_query($connect, $select_thread_query);
    $no_result = true;
    while ($row = mysqli_fetch_assoc($select_thread_result)) {
        $no_result = false;
        $thread_user_id = $row['thread_user_id'];
        $thread_cat_id = $row['thread_cat_id'];
        $thread_title = $row['thread_title'];
        $thread_id = $row['thread_id'];
        $thread_desc = $row['thread_desc'];
        $timestamp = $row['timestamp'];
        $thread_like_count = $row['thread_like_count'];
        $thread_dislike_count = $row['thread_dislike_count'];

        $select_cat_owner_query = "SELECT * FROM `users_entries` WHERE `Id`= $thread_user_id";
        $select_cat_owner_result = mysqli_query($connect, $select_cat_owner_query);


        while ($row = mysqli_fetch_assoc($select_cat_owner_result)) {
            $cat_owner_result_Username = $row['Username'];
            $cat_owner_result_Id = $row['Id'];
            $cat_owner_result_dt = $row['dt'];
            $cat_owner_result_First_name = $row['First_name'];
            $cat_owner_result_Last_name = $row['Last_name'];
            $cat_owner_result_Email = $row['Email'];
            $cat_owner_img_url = $row['img_url'];

            $que_time_ago_formate =  time_elapsed_string($timestamp);
    ?>
            <div class="media align-items-center  m-3 p-3" style="background-color: #ebe7e7;border-radius:8px;">
                <div class="media-body">
                    <div class="d-flex">
                        <img src="/forum/data/<?= $cat_owner_img_url ?>" class="rounded-circle img-fluid p-1 mr-2" style="width: 55px;object-fit:cover;height:55px" class="mr-3 p-1" alt=".">
                        <div class="mb-0 mr-auto d-inline  text-algn-left">
                            <a href="/forum/threads.php?thread_id=<?= $thread_id ?>" style="text-decoration:none;color:black;">
                                <h5 class="mt-0"> <?= $thread_title ?></h5>
                                <?= $thread_desc ?>
                        </div></a>
                        <?php
                        if (isset($_COOKIE["thread_like_".$thread_id])) {
                            $default_like_img ="/forum/data/thumbs-up-like.svg" ;
                        }else{
                            $default_like_img ="/forum/data/thumbs-up.svg" ;
                        }
                        if (isset($_COOKIE["thread_dislike_".$thread_id])) {
                            $default_dislike_img ="/forum/data/thumbs-down-dislike.svg";
                        }else{
                            $default_dislike_img ="/forum/data/thumbs-down.svg";
                        }
                        ?>
                        <div class="d-sticky display-left my-auto mr-0">
                            <div class="p-1 mb-1 " style="background-color:#cacaca;border-radius:10px;">

                                <div class="d-inline text-center my-auto py-1 " style="border-right:solid grey 1px "><img id="thread_btn_like_<?= $thread_id ?>" onclick="update_like_dislike('like',<?= $thread_id ?>)"  src="<?= $default_like_img ?>" class="img-fluid px-1" width=30px class="mr-3 p-1" alt="." /><span class=" px-1" id="thread_like_<?= $thread_id ?>"><?= $thread_like_count ?></span>
                                </div>

                                <div class="d-inline text-center my-auto py-1" style="border-left:solid grey 1px "><span class=" px-1" id="thread_dislike_<?= $thread_id ?>"><?= $thread_dislike_count ?></span><img  onclick="update_like_dislike('dislike',<?= $thread_id ?>)" id="thread_btn_dislike_<?= $thread_id ?>" src="<?= $default_dislike_img ?>" class="img-fluid px-1" width=30px class="mr-3 p-1" alt="." />
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="d-flex text-center mt-0">

                        <p class="font-weight-bold mb-0 mr-auto d-inline">Posted by : <a href="/forum/user_profile.php?user_id=<?= $cat_owner_result_Id ?>" class=" my-auto mr-2" type="button" style="text-decoration:none;">@<?= $cat_owner_result_Username ?></a> </p>
                        <span class="d-sticky display-left my-0 mr-0"><?= $que_time_ago_formate ?></span>



                    </div>

                </div>


            </div>
    <?php

        }
    }
    if ($no_result) {
        echo '<div class="jumbotron jumbotron-fluid m-5 p-3">
            <div class="container">
              <h1 class="display-5">Be the first person to ask Quetions in threads</h1>
              <p class="lead">No data found to the related forum.</p>
            </div>
          </div>';
    }


    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        function update_like_dislike(condition, thread_id) {


            if (condition == "like") {
                var count = $('#thread_like_' + thread_id).html();
            }
            if (condition == "dislike") {
                var count = $('#thread_dislike_' + thread_id).html();
            }
            $.ajax({
                url: "http://localhost:8080/forum/update_like_dislike.php",
                type: "POST",
                data: {
                    type: condition,
                    thread_id: thread_id,
                    count: count,
                },
                success: function(result) {
                    console.log("success");
                    console.log(result);
                    result = JSON.parse(result);
                    if (result.type == 'like') {
                        $('#thread_like_' + thread_id).html(result.like_count);
                        $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up-like.svg");
                    }
                    if (result.type == 'unlike') {
                        $('#thread_like_' + thread_id).html(result.like_count);
                        $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up.svg");
                    }
                    if (result.type == 'undislike_and_like') {
                        $('#thread_dislike_' + thread_id).html(result.dislike_count);
                        $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down.svg");

                        $('#thread_like_' + thread_id).html(result.like_count);
                        $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up-like.svg");
                    }
                    if (result.type == 'dislike') {
                        $('#thread_dislike_' + thread_id).html(result.dislike_count);
                        $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                    }
                    if (result.type == 'undislike') {
                        $('#thread_dislike_' + thread_id).html(result.dislike_count);
                        $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down.svg");
                    }
                    if (result.type == 'unlike_and_dislike') {
                        $('#thread_like_' + thread_id).html(result.like_count);
                        $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up.svg");

                        $('#thread_dislike_' + thread_id).html(result.dislike_count);
                        $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                    }
                    


                }
            });
        }
    </script>
</div>