<div class="card mb-4">

    <div class="card-body">
        <div class="row text-center">
            <div class="col-sm-3 ">
                <p class="mb-0 btn btn-outline-primary " data-toggle="modal" onclick="count_entries('follower'), update_entries('follower_modal')" data-target="#show_followers_Modal" data-whatever="@mdo" style="border:none"><b class="mx-1">
                        <span id="follower_count<?= $ac_owner_Id ?>"></span>
                    </b>Followers</p>
            </div>

            <div class="col-sm-3 ">
                <p class="mb-0 btn btn-outline-primary " data-toggle="modal" onclick="count_entries('following'), update_entries('following_modal')" data-target="#show_followings_Modal" data-whatever="@mdo" style="border:none"><b class="mx-1">
                        <span id="following_count<?= $ac_owner_Id ?>"></span>
                    </b>Following</p>
            </div>
            <div class="col-sm-3 ">
                <p class="mb-0 btn btn-outline-primary " data-toggle="modal" onclick="count_entries('joining'), update_entries('joining_modal')" data-target="#show_joinings_Modal" data-whatever="@mdo" style="border:none"><b class="mx-1">
                        <span id="joining_count<?= $ac_owner_Id ?>"></span>
                    </b>Joinings</p>
            </div>
            <div class="col-sm-3 ">
                <p class="mb-0 btn btn-outline-primary " data-toggle="modal" onclick="count_entries('subscription'), update_entries('subscription_modal')" data-target="#show_subscriptions_Modal" data-whatever="@mdo" style="border:none"><b class="mx-1"> <span id="subscription_count<?= $ac_owner_Id ?>"></span></b>Subscriptions</p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
            </div>
            <div class="col-sm-9">
                <?php

                ?>
                <p class="text-muted mb-0"><?= $user_First_name ?> <?= $user_Last_name ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user_Email ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Phone</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user_phone ?></p>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Address</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user_address ?></p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">

        <div class="row text-center">
            <div class="col-sm-4">
                <p class="mb-0 btn btn-outline-primary " data-toggle="modal" onclick="count_entries('category'), update_entries('category_modal')" data-target="#show_categories_Modal" data-whatever="@mdo" style="border:none">
                    <b class="mx-1">
                        <span id="category_count<?= $ac_owner_Id ?>"></span>
                    </b>Categories
                </p>
            </div>
            <div class="col-sm-4">
                <p class="mb-0 btn btn-outline-primary " data-toggle="modal" onclick="count_entries('quetion'), update_entries('quetion_modal')" data-target="#show_quetions_Modal" data-whatever="@mdo" style="border:none">
                    <b class="mx-1">
                        <span id="quetion_count<?= $ac_owner_Id ?>"></span>
                    </b>Quetions
                </p>
            </div>
            <div class="col-sm-4">
                <p class="mb-0 btn btn-outline-primary " data-toggle="modal" onclick="count_entries('comment'), update_entries('comment_modal')" data-target="#show_comments_Modal" data-whatever="@mdo" style="border:none">
                    <b class="mx-1">
                        <span id="solution_count<?= $ac_owner_Id ?>"> </span>
                        </span>
                    </b>Solutions
                </p>
            </div>
        </div>

    </div>
</div>



<script>
    $(document).ready(function() {
        count_entries("follower")
        count_entries("following")
        count_entries("joining")
        count_entries("subscription")
        count_entries("category")
        count_entries("quetion")
        count_entries("comment")
    });



    function count_entries(counting_for) {
        if (counting_for == "follower") {
            var table_name = "following_table";
            var condition = "following_id = <?= $ac_owner_Id ?>";
            var update_element = "#follower_count_in_modal<?= $ac_owner_Id ?> , #follower_count<?= $ac_owner_Id ?>";
        }
        if (counting_for == "following") {
            var table_name = "following_table";
            var condition = "follower_id = <?= $ac_owner_Id ?>";
            var update_element = "#following_count_in_modal<?= $ac_owner_Id ?> , #following_count<?= $ac_owner_Id ?>";
        }
        if (counting_for == "joining") {
            var table_name = "payment_entry";
            var condition = "subs_owner_ac_id = <?= $ac_owner_Id ?>";
            var update_element = "#joining_count_in_modal<?= $ac_owner_Id ?> , #joining_count<?= $ac_owner_Id ?>";
        }
        if (counting_for == "subscription") {
            var table_name = "payment_entry";
            var condition = "user_id = <?= $ac_owner_Id ?>";
            var update_element = "#subscription_count_in_modal<?= $ac_owner_Id ?> , #subscription_count<?= $ac_owner_Id ?>";
        }
        if (counting_for == "category") {
            var table_name = "categories";
            var condition = "cat_user_id = <?= $ac_owner_Id ?>";
            var update_element = "#category_count_in_modal<?= $ac_owner_Id ?> , #category_count<?= $ac_owner_Id ?>";
        }
        if (counting_for == "quetion") {
            var table_name = "threads";
            var condition = "thread_user_id = <?= $ac_owner_Id ?>";
            var update_element = "#quetion_count_in_modal<?= $ac_owner_Id ?> , #quetion_count<?= $ac_owner_Id ?>";
        }
        if (counting_for == "comment") {
            var table_name = "comments";
            var condition = "related_user_id = <?= $ac_owner_Id ?>";
            var update_element = "#solution_count_in_modal<?= $ac_owner_Id ?> , #solution_count<?= $ac_owner_Id ?>";
        }
        $.ajax({
            url: "http://localhost:8080/forum/services/update_count_entries.php",
            type: "POST",
            data: {
                table_name: table_name,
                condition: condition,

            },
            success: function(result) {
                // console.log("count entries");
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

<script>
    $(document).ready(function() {
        var update_modal = "category_modal";
        var table_name = "categories";
        var ac_owner_Id = <?= $ac_owner_Id ?>;
        var condition = "cat_user_id = <?= $ac_owner_Id ?>";
        var update_element = "#category_id_in_profile";
        $.ajax({
            url: "http://localhost:8080/forum/services/update_entries.php",
            type: "POST",
            data: {
                modal_name: update_modal,
                table_name: table_name,
                condition: condition,
                ac_owner_Id: ac_owner_Id,
            },
            success: function(result) {
                // console.log("Category");
                // console.log(result);
                document.querySelector(update_element).innerHTML = result;

            }
        });
    });
    $(document).ready(function() {
        update_modal = "quetion_modal"
        var table_name = "threads";
        var ac_owner_Id = <?= $ac_owner_Id ?>;
        var condition = "thread_user_id = <?= $ac_owner_Id ?>";
        var update_element = "#quetion_id_in_profile";
        $.ajax({
            url: "http://localhost:8080/forum/services/update_entries.php",
            type: "POST",
            data: {
                modal_name: update_modal,
                table_name: table_name,
                condition: condition,
                ac_owner_Id: ac_owner_Id,
            },
            success: function(result) {
                // console.log("Category");
                // console.log(result);
                document.querySelector(update_element).innerHTML = result;
            }
        });
    });
    $(document).ready(function() {
        update_modal = "comment_modal"
        var table_name = "comments";
        var ac_owner_Id = <?= $ac_owner_Id ?>;
        var condition = "related_user_id = <?= $ac_owner_Id ?>";
        var update_element = "#comment_id_in_profile";
        $.ajax({
            url: "http://localhost:8080/forum/services/update_entries.php",
            type: "POST",
            data: {
                modal_name: update_modal,
                table_name: table_name,
                condition: condition,
                ac_owner_Id: ac_owner_Id,

            },
            success: function(result) {
                // console.log("Category");
                // console.log(result);
                document.querySelector(update_element).innerHTML = result;
            }
        });
    });
</script>
<script>
    // category_id_in_profile
    function update_entries(update_modal) {
        var update_modal = update_modal;
        if (update_modal == "follower_modal") {
            var table_name = "following_table";
            var ac_owner_Id = <?= $ac_owner_Id ?>;
            var condition = "following_id = <?= $ac_owner_Id ?>";
            var update_element = "#follower_id_in_modal";
        }
        if (update_modal == "following_modal") {
            var table_name = "following_table";
            var ac_owner_Id = <?= $ac_owner_Id ?>;
            var condition = "follower_id = <?= $ac_owner_Id ?>";
            var update_element = "#following_id_in_modal";
        }
        if (update_modal == "joining_modal") {
            var table_name = "payment_entry";
            var ac_owner_Id = <?= $ac_owner_Id ?>;
            var condition = "subs_owner_ac_id = <?= $ac_owner_Id ?> and status = 'success'";
            var update_element = "#joining_id_in_modal";
        }
        if (update_modal == "subscription_modal") {
            var table_name = "payment_entry";
            var ac_owner_Id = <?= $ac_owner_Id ?>;
            var condition = "user_id = <?= $ac_owner_Id ?> and status = 'success' ";
            var update_element = "#subscription_id_in_modal";
        }
        if (update_modal == "category_modal") {
            var table_name = "categories";
            var ac_owner_Id = <?= $ac_owner_Id ?>;
            var condition = "cat_user_id = <?= $ac_owner_Id ?>";
            var update_element = "#category_id_in_modal";
        }
        if (update_modal == "quetion_modal") {
            var table_name = "threads";
            var ac_owner_Id = <?= $ac_owner_Id ?>;
            var condition = "thread_user_id = <?= $ac_owner_Id ?>";
            var update_element = "#quetion_id_in_modal";
        }
        if (update_modal == "comment_modal") {
            var table_name = "comments";
            var ac_owner_Id = <?= $ac_owner_Id ?>;
            var condition = "related_user_id = <?= $ac_owner_Id ?>";
            var update_element = "#comment_id_in_modal";
        }
        $.ajax({
            url: "http://localhost:8080/forum/services/update_entries.php",
            type: "POST",
            data: {
                modal_name: update_modal,
                table_name: table_name,
                condition: condition,
                ac_owner_Id: ac_owner_Id,

            },
            success: function(result) {
                // console.log("success");
                // console.log(result);
                document.querySelector(update_element).innerHTML = result;

            }
        });


    }
</script>