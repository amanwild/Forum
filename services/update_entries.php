<?php
include "./validation_of_user.php";
include "./_dbconnect.php";
include "./pick_ago_time.php";
if (isset($_POST['table_name']) && isset($_POST['condition'])) {


    $table_name = $_POST['table_name'];
    $condition = $_POST['condition'];

    $html_condition = '';
    $modal_name = '';
    $ac_owner_Id = '';
    if (isset($_POST['Thread_id'])) {
        $Thread_id = $_POST['Thread_id'];
    }
    if (isset($_POST['comment_id'])) {
        $comment_id = $_POST['comment_id'];
    }
    if (isset($_POST['Thread_cat_id'])) {
        $Thread_cat_id = $_POST['Thread_cat_id'];
    }
    if (isset($_POST['comment_owner_result_Id'])) {
        $comment_owner_result_Id = $_POST['comment_owner_result_Id'];
    }
    if (isset($_POST['modal_name'])) {
        $modal_name = $_POST['modal_name'];
    }
    if (isset($_POST['html_condition'])) {
        $html_condition = $_POST['html_condition'];
    }
    if (isset($_POST['ac_owner_Id'])) {
        $ac_owner_Id = $_POST['ac_owner_Id'];
    }

    // echo"enter";
    $select_query = "SELECT * FROM $table_name WHERE $condition  AND parent_or_child = 0 ";
    if ($modal_name == "reply") {
        $select_result = mysqli_query($connect, $select_query);
        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            while ($row = mysqli_fetch_assoc($select_result)) {
                $no_result = false;
                $json_array[] = $row;
            }
            // echo '<pre>';
            // print_r($json_array);
            // echo '<pre>';

            $index = 0;
            function add($json_array, $condition, $connect)
            {
                $index = 0;
                foreach ($json_array as $value) {
                    

                    $select_query = "SELECT * FROM comments WHERE  $condition AND parent_or_child = " . $value['comment_id'] . " ";
                    $select_result = mysqli_query($connect, $select_query);
                    if (0 < mysqli_num_rows($select_result)) {

                        $json_array_ = [];
                        while ($row = mysqli_fetch_assoc($select_result)) {
                            $json_array_[] = $row;
                        }
                        // echo '<pre>';
                        // print_r($json_array_);
                        // echo '<pre>';

                        // echo '<pre>';
                        // print_r($json_array);
                        // echo '<pre>';
                        foreach ($json_array_ as $value) {
                            if ($value['parent_or_child'] > 0) {
                                // $json_array[$index] += $json_array_;
                                $return_array = [];
                                $return_array = add($json_array_, $condition, $connect);
                                $json_array[$index] += $return_array;
                                $return_array = [];
                                
                            } 
                        }
                        ++$index;
                    } else {
                        ++$index;
                    }
                }
                return $json_array;

            }
            
            foreach ($json_array as $value) {
                if ($value['reply_count'] > 0) {
                    $json_array = add($json_array, $condition, $connect);
                } 
            }
            print_r($json_array);
           

            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Subscription found </p>
            </div>
        </div>';
            exit();
        }



        $index = 0;
        // foreach ($json_array as $value_) {
        //     $select_query = "SELECT * FROM `users_entries` WHERE `Id` =" . $value_['subs_owner_ac_id'] . "";
        //     $select_result = mysqli_query($connect, $select_query);
        //     $no_result = true;
        //     while ($row = mysqli_fetch_assoc($select_result)) {
        //         $no_result = false;
        //         $json_array[$index] += $row;
        //         ++$index;
        //     }
        // }
    }

    if ($modal_name == "comment_modal") {
        $select_result = mysqli_query($connect, $select_query);
        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Comment found </p>
            </div>
        </div>';
            exit();
        }
        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;
            $json_array[] = $row;
        }
        // foreach ($json_array as $value) {}
        // echo json_encode($json_array);
        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
            
                <p class="lead">No Comments found </p>
                </div>
            </div>';
        } else {

            $no_comments = true;
            foreach ($json_array as $value) {

                $comment_time_ago_formate = time_elapsed_string($value["comment_time"]);
                echo "<div class='d-flex py-2'>";
                if ($html_condition == '') {
                    echo "";
                }
                echo "<div class=' media-body media mb-0  d-inline align-items-center px-2 mb-0 p-1' style='background-color: #ebe7e7;border-radius:4px;'>
                                <a href='/forum/threads.php?thread_id=" . $value["related_thread_id"] . "&comment_id=" . $value["comment_id"] . "#" . $value["comment_id"] . "' style='text-decoration: none;color:black'>
                                    <div class='media-body'>
                                        <div class='d-flex text-center mt-0'>
                                            <p class=' mb-0 mr-auto d-inline mb-1' style='font-size: .88rem;'> " . $value["comment_content"] . " 
                                            </p>
                                            <div class='d-sticky display-left my-0 mr-0 '>
                                                <span class='' style='font-size: .70rem;'> " . $comment_time_ago_formate . " </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>";


                if (isset($_COOKIE['comment_like_' .  $value["comment_id"]])) {
                    $default_like_img = 'http://localhost:8080/forum/data/thumbs-up-like.svg';
                } else {
                    $default_like_img = 'http://localhost:8080/forum/data/thumbs-up.svg';
                }
                if (isset($_COOKIE['comment_dislike_' .  $value["comment_id"]])) {
                    $default_dislike_img = 'http://localhost:8080/forum/data/thumbs-down-dislike.svg';
                } else {
                    $default_dislike_img = 'http://localhost:8080/forum/data/thumbs-down.svg';
                }
                echo "
                        <div class='d-sticky display-left my-auto mr-0 pl-2'>
                        <div class='p-1 mb-1 ' style='background-color:#cacaca;border-radius:10px;'>

                        <div class='d-inline text-center py-1 ' style='border-right:solid grey 1px '><img id='comment_btn_like_" . $value["comment_id"] . "' onclick=update_like_dislike('like'," . $value["comment_id"] . ") src='$default_like_img' class='img-fluid px-1' width=30px class='mr-3 p-1' alt='.' /><span class=' px-1' id='comment_like_" . $value["comment_id"] . "'>" . $value["comment_like_count"] . "</span>
                        </div>

                        <div class='d-inline text-center py-1' style='border-left:solid grey 1px '><span class=' px-1' id='comment_dislike_" . $value["comment_id"] . "'>" . $value["comment_dislike_count"] . "</span><img onclick=update_like_dislike('dislike'," . $value["comment_id"] . ")  id='comment_btn_dislike_" . $value["comment_id"] . "' src='$default_dislike_img' class='img-fluid px-1' width=30px class='mr-3 p-1' alt='.' />
                        </div>
                                
                         </div>
                        </div>
                    </div> ";
                $no_comments = false;
            }
            if ($no_comments) {
                echo "<div class='jumbotron jumbotron-fluid'>
                <div class='container'>
                
                <p class='lead'>No Comments found </p>
                </div>
            </div>";
            }
        }
    }
    if ($modal_name == "quetion_modal") {
        $select_result = mysqli_query($connect, $select_query);

        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Quetion found </p>
            </div>
        </div>';
            exit();
        }
        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;
            $json_array[] = $row;
        }
        // foreach ($json_array as $value) {}
        // echo json_encode($json_array);

        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                    
                    <p class="lead">No Quetions found </p>
                    </div>
                </div>';
        } else {

            $no_result = true;
            foreach ($json_array as $value) {

                $thread_time_ago_formate = time_elapsed_string($value["timestamp"]);
                $no_result = false;

                echo "
                        <div class='d-flex py-2'>";
                if ($html_condition == '') {
                    echo "";
                }

                echo " <div class=' media-body media mb-0  d-inline align-items-center px-2 mb-0 p-1' style='background-color: #ebe7e7;border-radius:4px;'>
                            <a href='/forum/threads.php?thread_id=" . $value["thread_id"] . "' style='text-decoration: none;color:black'>
                                <div class='media-body'>
                                    <div class='d-flex text-center mt-0'>
                                        <p class=' mb-0 mr-auto d-inline mb-1' style='font-size: .88rem;'>" . $value["thread_title"] . "</p><div class='d-sticky display-left my-0 mr-0 '>
                                        <span class='' style='font-size: .70rem;'>
                                        $thread_time_ago_formate </span>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>";

                if (isset($_COOKIE['thread_like_' .  $value["thread_id"]])) {
                    $default_like_img = 'http://localhost:8080/forum/data/thumbs-up-like.svg';
                } else {
                    $default_like_img = 'http://localhost:8080/forum/data/thumbs-up.svg';
                }
                if (isset($_COOKIE['thread_dislike_' .  $value["thread_id"]])) {
                    $default_dislike_img = 'http://localhost:8080/forum/data/thumbs-down-dislike.svg';
                } else {
                    $default_dislike_img = 'http://localhost:8080/forum/data/thumbs-down.svg';
                }
                echo "<div class='d-sticky display-left my-auto mr-0 pl-2'>
                            <div class='p-1 mb-1 ' style='background-color:#cacaca;border-radius:10px;'>

                                <div class='d-inline text-center py-1 ' style='border-right:solid grey 1px '><img id='thread_btn_like_" . $value["thread_id"] . "' onclick=update_like_dislike_thread('like'," . $value["thread_id"] . ") src='$default_like_img' class='img-fluid px-1' width=30px class='mr-3 p-1' alt='.' /><span class=' px-1' id='thread_like_" . $value["thread_id"] . "'>" . $value["thread_like_count"] . "</span>
                                </div>

                                <div class='d-inline text-center my-auto py-1' style='border-left:solid grey 1px '><span class=' px-1' id='thread_dislike_" . $value["thread_id"] . "'>" . $value["thread_dislike_count"] . "</span><img onclick=update_like_dislike_thread('dislike'," . $value["thread_id"] . ") id='thread_btn_dislike_" . $value["thread_id"] . "' src='$default_dislike_img' class='img-fluid px-1' width=30px class='mr-3 p-1' alt='.' />
                                </div>

                            </div>
                        </div>
                    </div>";
            }
            if ($no_result) {
                echo '<div class="jumbotron jumbotron-fluid">
                                        <div class="container">
                                        
                                        <p class="lead">No Quetions found </p>
                                        </div>
                                    </div>';
            }
        }
    }
    if ($modal_name == "category_modal") {
        $select_result = mysqli_query($connect, $select_query);

        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Category found </p>
            </div>
        </div>';
            exit();
        }
        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;
            $json_array[] = $row;
        }
        // foreach ($json_array as $value) {}
        // echo json_encode($json_array);

        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                    
                    <p class="lead">No Quetions found </p>
                    </div>
                </div>';
        } else {

            $no_result = true;
            foreach ($json_array as $value) {

                $cat_created = time_elapsed_string($value["cat_created"]);
                $no_result = false;

                echo "
                        <div class='d-flex py-2'>";
                if ($html_condition == '') {
                    echo "";
                }

                echo " <div class=' media-body media mb-0  d-inline align-items-center px-2 mb-0 p-1' style='background-color: #ebe7e7;border-radius:4px;'>
                            <a href='./treadlist.php?Cat_id=" . $value["cat_id"] . "' style='text-decoration: none;color:black'>
                                <div class='media-body'>
                                    <div class='d-flex text-center mt-0'>
                                        <p class=' mb-0 mr-auto d-inline mb-1' style='font-size: .88rem;'>" . $value["cat_title"] . "</p><div class='d-sticky display-left my-0 mr-0 '>
                                        <span class='' style='font-size: .70rem;'>
                                        $cat_created </span>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>";

                echo "
                    </div>";
            }
            if ($no_result) {
                echo '<div class="jumbotron jumbotron-fluid">
                                        <div class="container">
                                        
                                        <p class="lead">No Quetions found </p>
                                        </div>
                                    </div>';
            }
        }
    }
    if ($modal_name == "follower_modal") {
        $select_query = "SELECT * FROM `users_entries` WHERE `Id` IN (SELECT `follower_id` FROM `$table_name` WHERE $condition)";
        $select_result = mysqli_query($connect, $select_query);
        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Follower found </p>
            </div>
        </div>';
            exit();
        }
        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;
            $json_array_[] = $row;
        }
        // foreach ($json_array_ as $value_) {}
        // echo json_encode($json_array_);


        // print_r($json_array_);
        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                        
                        <p class="lead">No follower found </p>
                        </div>
                    </div>';
        } else {
            foreach ($json_array_ as $value_) {
                $no_result = false;
                echo "<div class='d-flex py-1'>
                        <div class='d-flex pr-2'>
                            <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                                <img src='/forum/data/" . $value_['img_url'] . "' class='rounded-circle img-fluid p-1' style='width: 55px;object-fit:cover;height:55px' alt='.'>
                            </a>
                    
                        </div>
                        <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' media-body py-auto my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                            <div class='  ' style='background-color: #ebe7e7;border-radius:4px;'>
                    
                    
                                <p class='py-auto my-auto p-1 ' style='font-size: 1.1rem;'>" . $value_['Username'] . "</p>
                    
                            </div>
                        </a>
                    
                        <div class='d-sticky display-left my-auto mr-0 pl-2'>";
                if ($ac_owner_Id != $_SESSION['user_Id']) {
                    if ($value_['Id'] != $_SESSION['user_Id']) {
                        $id = $_SESSION['user_Id'] . '_' . $value_['Id'];
                        $verify_follow_query = "SELECT * FROM following_table WHERE  id = '$id'";
                        $verify_follow_result = mysqli_query($connect, $verify_follow_query);
                        $num  = mysqli_num_rows($verify_follow_result);

                        $link_btn = "button";
                        $unlink_btn = "hidden";
                        if ($num > 0) {
                            $unlink_btn = "button";
                            $link_btn = "hidden";
                        }
                    } else {
                        $unlink_btn = "hidden";
                        $link_btn = "hidden";
                    }
                    echo "<form>
                                <input type='hidden' class='Follow' id='Follow' name='Follow' value='Follow'>
                                <input type='hidden' class='ac_owner_Id' id='ac_owner_Id' name='ac_owner_Id' value='" . $value_['Id'] . "'>
                                <script>
                                    Follow.value = true;
                                </script>
                                <div class='pb-1'>
                                    <input type='" . $link_btn . "' class='btn btn-primary' id='link_btn_" . $value_['Id'] . "' onclick = update_link_unlink('follow'," . $value_['Id'] . ",'#link_btn_" . $value_['Id'] . "','#unlink_btn_" . $value_['Id'] . "') class='btn btn-primary ms-1 d-inline' style='width:100px;' value='Follow'></input>
                                </div>
                                <div class='pb-1'>
                                    <input type='" . $unlink_btn . "' class='btn btn-outline-primary' id='unlink_btn_" . $value_['Id'] . "' onclick = update_link_unlink('unfollow'," . $value_['Id'] . ",'#link_btn_" . $value_['Id'] . "','#unlink_btn_" . $value_['Id'] . "') class='btn btn-primary ms-1 d-inline' style='width:100px;' value='Unfollow'></input>
                            
                                </div>
                            
                            </form>";
                }
                if ($ac_owner_Id == $_SESSION['user_Id']) {
                    $id = $value_['Id'] . '_' . $_SESSION['user_Id'];
                    $he_follow_me_query = "SELECT * FROM following_table WHERE  id = '$id'";
                    $num  = mysqli_num_rows(mysqli_query($connect, $he_follow_me_query));

                    $remove_btn = "hidden";
                    $removed_btn = "hidden";
                    if ($num > 0) {
                        $remove_btn = "button";
                        $removed_btn = "hidden";
                    }
                    $id = $_SESSION['user_Id'] . '_' . $value_['Id'];
                    $me_follow_him_query = "SELECT * FROM following_table WHERE  id = '$id'";
                    $num  = mysqli_num_rows(mysqli_query($connect, $me_follow_him_query));
                    $link_btn = "button";
                    $unlink_btn = "hidden";
                    if ($num > 0) {
                        $unlink_btn = "button";
                        $link_btn = "hidden";
                    }
                    echo "<form>
                                <input type='hidden' class='Follow' id='Follow' name='Follow' value='Follow'>
                                <input type='hidden' class='ac_owner_Id' id='ac_owner_Id' name='ac_owner_Id' value=' " . $value_['Id'] . "'>
                                <script>
                                    Follow.value = true;
                                </script>
                            
                                <div class='d-flex'>"; ?>
                    <div class='px-1 d-inline my-auto '>
                        <input type='<?= $link_btn ?>' id='link_btn_<?= $value_['Id'] ?>' onclick="update_link_unlink('follow',<?= $value_['Id'] ?>,'#link_btn_<?= $value_['Id'] ?>','#unlink_btn_<?= $value_['Id'] ?>');" class=' ms-1 ' style='font-size:10px;font-style:oblique;font-weight: bold;border:none;color:white;background-color:blue;border-radius:4px ' value='Follow'></input>
                    </div>

                    <div class='px-1 d-inline my-auto'>
                        <input type='<?= $unlink_btn ?>' id='unlink_btn_<?= $value_['Id'] ?>' onclick="update_link_unlink('unfollow', <?= $value_['Id'] ?>,'#link_btn_<?= $value_['Id'] ?>','#unlink_btn_<?= $value_['Id'] ?>'); 
                                        count_entries('follower') ;" class=' ms-1  ' style='font-size:10px;font-style:oblique;font-weight: bold;border:none;color:blue;border-radius:4px ' value='Unfollow'></input>
                    </div>


                    <div class='px-1 d-inline'>
                        <input type='<?= $remove_btn ?>' id='remove_btn_<?= $value_["Id"] ?>' onclick="update_link_unlink('remove' , <?= $value_['Id'] ?> , '#removed_btn_<?= $value_['Id'] ?>','#remove_btn_<?= $value_['Id'] ?>' ) ; count_entries('follower') ;" class='btn btn-primary ms-1  m-auto' style='width:100px;' value='Remove'></input>
                    </div>
                    <div class='px-1 d-inline'>
                        <input type='<?= $removed_btn ?>' id='removed_btn_<?= $value_["Id"] ?>' class='btn btn-outline-primary ms-1  m-auto' style='width:100px;' value='Removed' disabled></input>
                    </div>
                    </div>

                <?php echo "
                            
                            </form>";
                }
                echo "</div>
                    </div>";
            }
        }
    }
    if ($modal_name == "following_modal") {

        $select_query = "SELECT * FROM `users_entries` WHERE `Id` IN (SELECT `following_id` FROM `$table_name` WHERE $condition)";
        $select_result = mysqli_query($connect, $select_query);
        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Following found </p>
            </div>
        </div>';
            exit();
        }
        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;
            $json_array_[] = $row;
        }
        // print_r($json_array_);
        // foreach ($json_array_ as $value_) {}
        // echo json_encode($json_array_);

        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                        
                        <p class="lead">No following found </p>
                        </div>
                    </div>';
        } else {
            foreach ($json_array_ as $value_) {
                $no_result = false;
                echo "<div class='d-flex py-1'>
                        <div class='d-flex pr-2'>
                            <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                                <img src='/forum/data/" . $value_['img_url'] . "' class='rounded-circle img-fluid p-1' style='width: 55px;object-fit:cover;height:55px' alt='.'>
                            </a>
                    
                        </div>
                        <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' media-body py-auto my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                            <div class='  ' style='background-color: #ebe7e7;border-radius:4px;'>
                    
                    
                                <p class='py-auto my-auto p-1 ' style='font-size: 1.1rem;'>" . $value_['Username'] . "</p>
                    
                            </div>
                        </a>
                    
                        <div class='d-sticky display-left my-auto mr-0 pl-2'>";
                if ($ac_owner_Id != $_SESSION['user_Id']) {
                    if ($value_['Id'] != $_SESSION['user_Id']) {
                        $id = $_SESSION['user_Id'] . '_' . $value_['Id'];
                        $verify_follow_query = "SELECT * FROM following_table WHERE  id = '$id'";
                        $verify_follow_result = mysqli_query($connect, $verify_follow_query);
                        $num  = mysqli_num_rows($verify_follow_result);

                        $link_btn = "button";
                        $unlink_btn = "hidden";
                        if ($num > 0) {
                            $unlink_btn = "button";
                            $link_btn = "hidden";
                        }
                    } else {
                        $unlink_btn = "hidden";
                        $link_btn = "hidden";
                    }
                    echo "<form>
                                <input type='hidden' class='Follow' id='Follow' name='Follow' value='Follow'>
                                <input type='hidden' class='ac_owner_Id' id='ac_owner_Id' name='ac_owner_Id' value='" . $value_['Id'] . "'>
                                <script>
                                    Follow.value = true;
                                </script>
                                <div class='pb-1'>"; ?>
                    <input type='<?= $link_btn ?>' class='btn btn-primary' id='link_btn_<?= $value_['Id'] ?>' onclick="update_link_unlink('follow',<?= $value_['Id'] ?>,'#link_btn_<?= $value_['Id'] ?>','#unlink_btn_<?= $value_['Id'] ?>');" class='btn btn-primary ms-1 d-inline' style='width:100px;' value='Follow'></input>
                    </div>
                    <div class='pb-1'>
                        <input type='<?= $unlink_btn ?>' class='btn btn-outline-primary' id='unlink_btn_<?= $value_['Id'] ?>' onclick="update_link_unlink('unfollow',<?= $value_['Id'] ?>,'#link_btn_<?= $value_['Id'] ?>','#unlink_btn_<?= $value_['Id'] ?>');" class='btn btn-primary ms-1 d-inline' style='width:100px;' value='Unfollow'></input>
                    <?php echo "
                                </div>
                            
                            </form>";
                }
                if ($ac_owner_Id == $_SESSION['user_Id']) {
                    $id = $_SESSION['user_Id'] . '_' .  $value_['Id'];
                    $me_follow_him_query = "SELECT * FROM following_table WHERE  id = '$id'";
                    $num  = mysqli_num_rows(mysqli_query($connect, $me_follow_him_query));
                    $link_btn = "button";
                    $unlink_btn = "hidden";
                    if ($num > 0) {
                        $unlink_btn = "button";
                        $link_btn = "hidden";
                    }
                    echo "<form>
                    <input type='hidden' class='Follow' id='Follow' name='Follow' value='Follow'>
                    <input type='hidden' class='ac_owner_Id' id='ac_owner_Id' name='ac_owner_Id' value='" . $value_['Id'] . "'>
                    <script>
                        Follow.value = true;
                    </script>
                    <div class='pb-1'>"; ?>
                        <input type='<?= $link_btn ?>' class='btn btn-primary' id='link_btn_<?= $value_['Id'] ?>' onclick="update_link_unlink('follow',<?= $value_['Id'] ?>,'#link_btn_<?= $value_['Id'] ?>','#unlink_btn_<?= $value_['Id'] ?>');" class='btn btn-primary ms-1 d-inline' style='width:100px;' value='Follow'></input>
                    </div>
                    <div class='pb-1'>
                        <input type='<?= $unlink_btn ?>' class='btn btn-outline-primary' id='unlink_btn_<?= $value_['Id'] ?>' onclick="update_link_unlink('unfollow',<?= $value_['Id'] ?>,'#link_btn_<?= $value_['Id'] ?>','#unlink_btn_<?= $value_['Id'] ?>');" class='btn btn-primary ms-1 d-inline' style='width:100px;' value='Unfollow'></input>
                    <?php echo "
                    </div>
                
                </form>";
                }
                echo "</div>
                    </div>";
            }
        }
    }
    if ($modal_name == "joining_modal") {
        $select_query = "SELECT user_id , amount FROM $table_name WHERE $condition ";
        $select_result = mysqli_query($connect, $select_query);
        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Joining found </p>
            </div>
        </div>';
            exit();
        }
        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;
            $json_array[] = $row;
        }
        $index = 0;
        foreach ($json_array as $value_) {
            $select_query = "SELECT * FROM `users_entries` WHERE `Id` IN (" . $value_['user_id'] . ")";
            $select_result = mysqli_query($connect, $select_query);
            while ($row = mysqli_fetch_assoc($select_result)) {
                $no_result = false;
                $json_array[$index] += $row;
                ++$index;
            }
        }
        // echo"<pre>";
        // print_r($json_array);
        // echo"<pre>";
        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                        
                        <p class="lead">No Joining found </p>
                        </div>
                    </div>';
        } else {
            foreach ($json_array as $value_) {
                $join_data = "Free Membership";
                $join_img = "http://localhost:8080/forum/data/free.webp";
                $join_css = " text-decoration:none;font-weight: 500;";
                if ($value_['amount']  == 100) {
                    $join_data = "Gold Membership";
                    $join_img = "http://localhost:8080/forum/data/100.jpg";
                    $join_css = "text-decoration:none;background-image:  linear-gradient(gold,Goldenrod, yellow,Goldenrod);border-color:Goldenrod; color:#5A1C00;font-weight: 500;";
                }
                if ($value_['amount']  == 50) {
                    $join_data = "Silver Membership";
                    $join_img = "http://localhost:8080/forum/data/50.jpg";
                    $join_css = " text-decoration:none;background: #f093fb; background-image:  linear-gradient(LightGray,Silver,LightGrey,Silver);border-color:Grey;color:#34282C;font-weight: 500;";
                }
                $no_result = false;
                echo "<div class='d-flex py-1 my-1'  style='" . $join_css . "'>
                      
                        <div class='d-flex pr-2'>
                            <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                                <img src='/forum/data/" . $value_['img_url'] . "'class='rounded-circle img-fluid p-1' style='width: 55px;object-fit:cover;height:55px' alt='.'>
                            </a>
                    
                        </div>
                        <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' media-body py-auto my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                            <div class='  ' style='background-color: #ebe7e7;border-radius:4px;'>
                    
                    
                                <p class='py-auto my-auto p-1 ' style='font-size: 1.1rem;'>" . $value_['Username'] . "</p>
                    
                            </div>
                            </a>
                    <div class='d-sticky display-left my-auto mr-0 pl-2'>
                        <div class='d-flex pr-2'>
                            <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>"; ?>
                    <img src='<?= $join_img ?>' class=' rounded-circle img-fluid p-1' style='width:50px ;overflow:hidden;height: 50px; ' alt='.'> <?php echo "
                            </a>
                            <div class='pb-1 my-auto'>"; ?>
                    <input type='button' class='btn btn-primary' id='join_<?= $value_['Id'] ?>_with_<?= $value_['Id'] ?>' class='btn btn-primary ms-1 d-inline' style='<?= $join_css ?>' value='<?= $join_data ?>'></input>
                    </div>

                <?php echo "
                            </div>
                        
                    </div>";

                echo "

                    </div>";
            }
        }
    }
    if ($modal_name == "subscription_modal") {
        $select_query = "SELECT * FROM $table_name WHERE $condition ";
        $select_result = mysqli_query($connect, $select_query);
        $no_result = true;
        if (0 < mysqli_num_rows($select_result)) {
            $no_result = false;
        } else {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            
            <p class="lead">No Subscription found </p>
            </div>
        </div>';
            exit();
        }

        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;
            $json_array[] = $row;
        }
        $index = 0;
        foreach ($json_array as $value_) {
            $select_query = "SELECT * FROM `users_entries` WHERE `Id` =" . $value_['subs_owner_ac_id'] . "";
            $select_result = mysqli_query($connect, $select_query);
            $no_result = true;
            while ($row = mysqli_fetch_assoc($select_result)) {
                $no_result = false;
                $json_array[$index] += $row;
                ++$index;
            }
        }

        //     echo"<pre>";
        // print_r($json_array);
        // echo"<pre>";
        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                        
                        <p class="lead">No Subscription found </p>
                        </div>
                    </div>';
        } else {
            foreach ($json_array as $value_) {
                if ($value_['amount']  == 0) {
                    $join_data = "Free Membership";
                    $join_img = "http://localhost:8080/forum/data/free.webp";
                    $join_css = " text-decoration:none;font-weight: 500;";
                }
                if ($value_['amount']  == 100) {
                    $join_data = "Gold Membership";
                    $join_img = "http://localhost:8080/forum/data/100.jpg";
                    $join_css = "text-decoration:none;background-image:  linear-gradient(gold,Goldenrod, yellow,Goldenrod);border-color:Goldenrod; color:#5A1C00;font-weight: 500;";
                }
                if ($value_['amount']  == 50) {

                    $join_data = "Silver Membership";
                    $join_img = "http://localhost:8080/forum/data/50.jpg";
                    $join_css = " text-decoration:none;background: #f093fb; background-image:  linear-gradient(LightGray,Silver,LightGrey,Silver);border-color:Grey;color:#34282C;font-weight: 500;";
                }
                $no_result = false;
                echo "<div class='d-flex py-1 my-1'  style='" . $join_css . "'>
                      
                        <div class='d-flex pr-2'>
                            <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                                <img src='/forum/data/" . $value_['img_url'] . "' class='rounded-circle img-fluid p-1 mr-2' style='width: 55px;object-fit:cover;height:55px' alt='.'>
                            </a>
                    
                        </div>
                        <a href='/forum/user_profile.php?user_id=" . $value_['Id'] . "' class=' media-body py-auto my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>
                            <div class='  ' style='background-color: #ebe7e7;border-radius:4px;'>
                    
                    
                                <p class='py-auto my-auto p-1 ' style='font-size: 1.1rem;'>" . $value_['Username'] . "</p>
                    
                            </div>
                            </a>
                    <div class='d-sticky display-left my-auto mr-0 pl-2'>
                        <div class='d-flex pr-2'>
                            <div class=' my-auto mr-2' type='button' style='text-decoration:none;color:black;font-weight: 500;'>"; ?>
                    <img src='<?= $join_img ?>' class=' rounded-circle im   g-fluid p-1' style='width:50px ;overflow:hidden;height: 50px; ' alt='.'> <?php echo "
                            </div>
                            <div class='pb-1 my-auto'>";

                                                                                                                                                        //  $user_id = $value_['Id'];
                                                                                                                                                        //  $ac_owner_Id = $value_['user_id'];
                                                                                                                                                        //  $subs_owner_ac_Id = $value_['Id'];
                                                                                                                                                        //  $Follow = true;
                                                                                                                                                        //  $amount = $value_['amount'];
                                                                                                                                                        //  $payment_id = $value_['payment_id'];
                                                                                                                                                        //  echo $value_['amount'] .$value_['payment_id'].$value_['Id'] .$value_['payment_id'].$subs_owner_ac_Id .$payment_id;
                                                                                                                                                        // include "./join_button.php"; 
                                                                                                                                                        ?>
                    <form method="GET" action="http://localhost:8080/forum/thankyou_razorpay.php">
                        <input type="hidden" class="Follow" id="Follow" name="Follow" value="Follow">
                        <input type="hidden" class="subs_owner_ac_Id" id="subs_owner_ac_Id" name="subs_owner_ac_Id" value="<?= $value_['Id'] ?>">
                        <input type="hidden" class="ac_owner_Id" id="ac_owner_Id" name="ac_owner_Id" value="<?= $_SESSION['user_Id'] ?>">
                        <input type="hidden" class="payment_id" id="payment_id" name="payment_id" value="<?= $value_['payment_id'] ?>">
                        <input type="hidden" class="amount" id="amount" name="amount" value="<?= $value_['amount'] ?>">
                        <script>
                            Follow.value = true;
                        </script>

                        <input type='submit' class='btn btn-primary' id='join_<?= $value_['Id'] ?>_with_<?= $value_['Id'] ?>' class='btn btn-primary ms-1 d-inline' style='<?= $join_css ?>' value='<?= $join_data ?>'></input>

                    </form>



                    </div>

    <?php echo "
                            </div>
                        
                    </div>";

                echo "

                    </div>";
            }
        }
    }
}
