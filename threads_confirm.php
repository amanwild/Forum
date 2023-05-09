<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Comments</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    <?php
    require "./services/validation_of_user.php";

    include "./components/navbar.php";

    include "./services/pick_ago_time.php";



    ?>

    <?php

    while ($row = mysqli_fetch_assoc($select_thread_result)) {
        $Thread_id = $row['thread_id'];
        $thread_id = $row['thread_id'];
        $Thread_title = $row['thread_title'];
        $Thread_desc = $row['thread_desc'];
        $Thread_user_id = $row['thread_user_id'];
        $Thread_cat_id = $row['thread_cat_id'];
        $Thread_timestamp = $row['timestamp'];
        $thread_like_count = $row['thread_like_count'];
        $thread_dislike_count = $row['thread_dislike_count'];


        $select_username_of_thread_query = "SELECT * FROM `users_entries` WHERE Id = $Thread_user_id";
        $select_username_of_thread_result = mysqli_query($connect, $select_username_of_thread_query);

        while ($row = mysqli_fetch_assoc($select_username_of_thread_result)) {
            $thread_owner_result_Username = $row['Username'];
            $thread_owner_result_Id = $row['Id'];
            $thread_owner_result_dt = $row['dt'];
            $thread_owner_result_First_name = $row['First_name'];
            $thread_owner_result_Last_name = $row['Last_name'];
            $thread_owner_result_Email = $row['Email'];
            $thread_owner_result_img_url = $row['img_url'];
        }
        $cat_Id = $Thread_cat_id;

        include "./services/add_new_comment.php";
        include "./modals/add_comments_modal.php";
        $thread_time_ago_formate =  time_elapsed_string($Thread_timestamp);
    }
    ?>
    <?php
    if (isset($_COOKIE["thread_like_" . $Thread_id])) {
        $default_like_img = "/forum/data/thumbs-up-like.svg";
    } else {
        $default_like_img = "/forum/data/thumbs-up.svg";
    }
    if (isset($_COOKIE["thread_dislike_" . $Thread_id])) {
        $default_dislike_img = "/forum/data/thumbs-down-dislike.svg";
    } else {
        $default_dislike_img = "/forum/data/thumbs-down.svg";
    }
    ?>
    <div class="container my-4">
        <div class="jumbotron py-1" style="border-radius:8px">
            <div class=" my-4">
                <div class="d-flex  mt-0">
                    <div class="font-weight-bold mb-0 mr-auto d-inline  text-algn-left">
                        <div class="d-flex  mt-3">
                            <h1 class=" p-2 my-auto mr-auto "><?php echo $Thread_title; ?> </h1>
                        </div>
                        <p class="lead p-2 ">
                            <?php echo $Thread_desc; ?></p>
                    </div>
                    <div class="d-sticky display-left my-auto mr-0" style="border-radius:8px">
                        <?php
                        echo '<img src="/forum/data/' . $thread_owner_result_img_url . '"  class="rounded-circle img-fluid p-1 mr-2" style="width: 100px;object-fit:cover;height:100px" class="mr-3 p-1" alt="."/>';
                        ?>
                        <div class="p-1 mb-1 " style="background-color:#cacaca;border-radius:10px;">

                            <div class="d-inline text-center my-auto py-1 " style="border-right:solid grey 1px "><img id="thread_btn_like_<?= $thread_id ?>" onclick="update_like_dislike_thread('like',<?= $thread_id ?>)" src="<?= $default_like_img ?>" class="img-fluid px-1" width=30px class="mr-3 p-1" alt="." /><span class=" px-1" id="thread_like_<?= $thread_id ?>"><?= $thread_like_count ?></span>
                            </div>

                            <div class="d-inline text-center my-auto py-1" style="border-left:solid grey 1px "><span class=" px-1" id="thread_dislike_<?= $thread_id ?>"><?= $thread_dislike_count ?></span><img onclick="update_like_dislike_thread('dislike',<?= $thread_id ?>)" id="thread_btn_dislike_<?= $thread_id ?>" src="<?= $default_dislike_img ?>" class="img-fluid px-1" width=30px class="mr-3 p-1" alt="." />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <hr class="my-0">
                    <div class="d-flex text-center mt-0">
                        <?php echo '<p class="font-weight-bold mb-0 mr-auto d-inline">Posted by :  <a href="/forum/user_profile.php?user_id=' . $thread_owner_result_Id . '" class=" my-    pe="button" style="text-decoration:none;">@' . $thread_owner_result_Username . ' </a>
                                </p>
                                <span class="d-sticky display-left my-0 mr-0"> ' . $thread_time_ago_formate . ' </span>' ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex text-center mt-3">
            <h1 class=" ml-5 my-auto mr-auto d-inline"> Discussion</h1>

            <button type="button" class="btn btn-success d-sticky display-right my-1 mr-5" data-toggle="modal" data-target="#add_comments_Modal" data-whatever="@mdo">Add Comments

            </button>

        </div>

        <?php




        $select_comment_in_thread_query = "SELECT * FROM `comments` WHERE related_thread_id = $Thread_id AND related_cat_id = $Thread_cat_id AND parent_or_child = 0";

        $select_comment_in_thread_result = mysqli_query($connect, $select_comment_in_thread_query);
        // echo " thread id :";
        // echo  $Thread_id;
        // // echo " <br>";
        // // echo " cat id :";
        // echo  $Thread_cat_id;
        // echo " <br>";
        // echo " comments not selected";
        $no_result = true;
        while ($row = mysqli_fetch_assoc($select_comment_in_thread_result)) {
            $no_result = false;
            // echo "selected comments";
            $comment_id = $row['comment_id'];
            $comment_time = $row['comment_time'];
            $comment_time_ago_formate =  time_elapsed_string($comment_time);
            // $comment_time = "2016-1-31 20:17:16";
            $related_thread_id = $row['related_thread_id'];
            $comment_content = $row['comment_content'];
            $related_user_id = $row['related_user_id'];
            $related_cat_id = $row['related_cat_id'];
            $comment_like_count = $row['comment_like_count'];
            $comment_dislike_count = $row['comment_dislike_count'];


            $select_owner_of_comment_query = "SELECT * FROM `users_entries` WHERE Id = $related_user_id";
            $select_owner_of_comment_result = mysqli_query($connect, $select_owner_of_comment_query);

            while ($row = mysqli_fetch_assoc($select_owner_of_comment_result)) {
                $comment_owner_result_Username = $row['Username'];
                $comment_owner_result_Id = $row['Id'];
                $comment_owner_result_dt = $row['dt'];
                $comment_owner_result_First_name = $row['First_name'];
                $comment_owner_result_Last_name = $row['Last_name'];
                $comment_owner_result_Email = $row['Email'];
                $comment_owner_img_url = $row['img_url']; ?>

                <div id="<?= $comment_id ?>" class="media align-items-center p-1 pb-1 mt-1" style="background-color: #ebe7e7;border-radius:8px;">
                    <img src="/forum/data/<?= $comment_owner_img_url ?>" class="rounded-circle img-fluid mr-2" style="width: 55px;object-fit:cover;height:55px" class="mr-3 p-1" alt="." />
                    <div class="media-body">
                        <div class="d-flex">
                            <div class="mb-0 mr-auto d-inline  text-algn-left px-1 text-center ">
                                <div class="my-1 px-2" style="background-color:#c9c9c9; border-radius:4px;">

                                    <span class="mb-0 font-weight-bold "><?= $comment_content ?></span>
                                </div>
                            </div>
                            <?php
                            if (isset($_COOKIE["comment_like_" . $comment_id])) {
                                $default_like_img = "/forum/data/thumbs-up-like.svg";
                            } else {
                                $default_like_img = "/forum/data/thumbs-up.svg";
                            }
                            if (isset($_COOKIE["comment_dislike_" . $comment_id])) {
                                $default_dislike_img = "/forum/data/thumbs-down-dislike.svg";
                            } else {
                                $default_dislike_img = "/forum/data/thumbs-down.svg";
                            }
                            ?>
                            <div class="d-sticky display-left my-auto mr-0">
                                <div class="p-1 mb-1 " style="background-color:#cacaca;border-radius:10px;">

                                    <div class="d-inline text-center my-auto py-1 " style="border-right:solid grey 1px "><img id="comment_btn_like_<?= $comment_id ?>" onclick="update_like_dislike('like',<?= $comment_id ?>)" src="<?= $default_like_img ?>" class="img-fluid px-1" width=30px class="mr-3 p-1" alt="." /><span class=" px-1" id="comment_like_<?= $comment_id ?>"><?= $comment_like_count ?></span>
                                    </div>

                                    <div class="d-inline text-center my-auto py-1" style="border-left:solid grey 1px "><span class=" px-1" id="comment_dislike_<?= $comment_id ?>"><?= $comment_dislike_count ?></span><img onclick="update_like_dislike('dislike',<?= $comment_id ?>)" id="comment_btn_dislike_<?= $comment_id ?>" src="<?= $default_dislike_img ?>" class="img-fluid px-1" width=30px class="mr-3 p-1" alt="." />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="d-flex pr-1 text-center mt-0">

                            <p class=" pr-3 mb-0 d-inline">
                                <a href="/forum/user_profile.php?user_id=<?= $comment_owner_result_Id ?>" class=" my-auto mr-2" type="button" style="text-decoration:none;">@<?= $comment_owner_result_Username ?> </a>
                            <p>
                            <p class=" pr-3 mb-0 d-inline" onclick=" $show_replies = get_reply_tree(<?= $Thread_id ?>,<?= $Thread_cat_id ?>);">

                                <span id='reply_count<?= $comment_id ?>'></span>
                                Show Reply-
                            </p>

                            <p class=" mb-0 mr-auto d-inline" onclick="reply($comment_id,$comment_owner_result_Id);">
                                <a href="/forum/user_profile.php?user_id=<?= $comment_owner_result_Id ?>" class=" my-auto " type="button" style="text-decoration:none;">Reply-</a>
                            </p>
                            <span class="d-sticky display-left my-0 mr-0"> <?= $comment_time_ago_formate ?> </span>
                        </div>
                    </div>
                </div>
                <?php

                // foreach ($show_replies as $reply) {
                ?>

                    <!-- hello -->
        <?php 
        // }
            }
        }

        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid m-5 p-3">
                <div class="container">
                <h1 class="display-5">Be the first person to Discuss problem in comments </h1>
                <p class="lead">No data found to the related forum.</p>
                </div>
            </div>';
        }

        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                count_entries("reply")
                console.log("here");
                var Thread_id = <?php $Thread_id ?>;
                var Thread_cat_id = <?php $Thread_cat_id ?>;
                // get_reply_tree( Thread_id, Thread_cat_id);
            });
        </script>

        <script>
          function get_reply_tree(Thread_id, Thread_cat_id){
          callback_function(function(d) {
            // callback_function(grading_company, response);
                //processing the data
                console.log(d);
            });
        }
            // function get_reply_tree(Thread_id, Thread_cat_id) {
            function callback_function(callback ,Thread_id, Thread_cat_id) {
                // console.log("here");
                
                var Thread_cat_id;
                var Thread_id;
                var data;
                $.ajax({
                    url: "http://localhost:8080/forum/services/update_entries.php",
                    type: "POST",
                    data: {
                        modal_name: 'reply',
                        table_name: 'comments',
                        condition: 'related_thread_id = ' + Thread_id + ' AND related_cat_id = ' + Thread_cat_id,
                        // condition: 'related_thread_id = 2 AND related_cat_id = 1 ' ,
                        // Thread_id: Thread_id,
                        // comment_id: comment_id,
                        // Thread_cat_id: Thread_cat_id,
                        // comment_owner_result_Id: comment_owner_result_Id,
                    },
                    success: function(result) {
                        // console.log("success");
                        // console.log(result);
                        // result = JSON.parse(result);
                        // if (result.type == 'like') {
                        //     $('#comment_like_' + comment_id).html(result.like_count);
                        //     $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        // }
                        data = result;
                        callback(data);
                    },
                    error: function() {
                        console.log("return error");
                    }
                });
                // return data;

            }
        </script>
        <script>
            function count_entries(counting_for) {
                if (counting_for == "reply") {
                    var table_name = "comments";
                    var condition = "related_thread_id = <?= $Thread_id ?> AND related_cat_id = <?= $Thread_cat_id ?> AND comment_id = <?= $comment_id ?> AND parent_or_child = <?= $comment_owner_result_Id ?>";
                    var update_element = "#reply_count<?= $comment_id ?>";
                }
                $.ajax({
                    url: "http://localhost:8080/forum/services/update_count_entries.php",
                    type: "POST",
                    data: {
                        table_name: table_name,
                        condition: condition,

                    },
                    success: function(result) {
                        console.log("count entries");
                        // console.log(result);
                        result = JSON.parse(result);
                        if (true) {
                            // console.log(result.count)
                            // console.log(update_element)
                            $(update_element).html(result.count);
                            // $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        }


                    }
                });
            }
        </script>
        <!-- <script>
            function get_reply_tree(comment_id, Thread_id, Thread_cat_id, comment_owner_result_Id) {
                $.ajax({
                    url: "http://localhost:8080/forum/services/add_new_reply.php",
                    type: "POST",
                    data: {
                        type: condition,
                        Thread_id: Thread_id,
                        comment_id: comment_id,
                        count: count,
                    },
                    success: function(result) {
                        console.log("success");
                        console.log(result);
                        result = JSON.parse(result);
                        if (result.type == 'like') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        }


                    }
                });

            }
        </script> -->
        <script>
            function reply(comment_id, comment_owner_result_Id) {
                $.ajax({
                    url: "http://localhost:8080/forum/services/add_new_reply.php",
                    type: "POST",
                    data: {
                        type: condition,
                        comment_id: comment_id,
                        count: count,
                    },
                    success: function(result) {
                        console.log("success");
                        console.log(result);
                        result = JSON.parse(result);
                        if (result.type == 'like') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        }


                    }
                });

            }

            function update_like_dislike(condition, comment_id) {


                if (condition == "like") {
                    var count = $('#comment_like_' + comment_id).html();
                }
                if (condition == "dislike") {
                    var count = $('#comment_dislike_' + comment_id).html();
                }
                $.ajax({
                    url: "http://localhost:8080/forum/update_like_dislike.php",
                    type: "POST",
                    data: {
                        type: condition,
                        comment_id: comment_id,
                        count: count,
                    },
                    success: function(result) {
                        console.log("success");
                        console.log(result);
                        result = JSON.parse(result);
                        if (result.type == 'like') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        }
                        if (result.type == 'unlike') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up.svg");
                        }
                        if (result.type == 'undislike_and_like') {
                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down.svg");

                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        }
                        if (result.type == 'dislike') {
                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                        }
                        if (result.type == 'undislike') {
                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down.svg");
                        }
                        if (result.type == 'unlike_and_dislike') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up.svg");

                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                        }



                    }
                });
            }

            function update_like_dislike_thread(condition, thread_id) {


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

    <?php


    include "./components/footer.php";

    ?>

</body>

<script>
    $('#' + <?= $_GET["comment_id"] ?>).css({
        "background-color": "#bbbbbb"
    });
</script>

</html>