<?php
if (isset($_POST['type']) && isset($_POST['thread_id'])) {
    $thread_id = $_POST['thread_id'];
    $type = $_POST['type'];
    $count = $_POST['count'];
    include "./services/_dbconnect.php";
    include "./services/validation_of_user.php";

    // setcookie("PHPSESSID","yes", 1);
    $var = $_COOKIE;
    if ($type == "like") {
        if (isset($_COOKIE["thread_like_" . $thread_id])) {
            setcookie("thread_like_" . $thread_id, 'yes', 1);
            $update_query = "UPDATE `threads` SET `thread_like_count` =thread_like_count-1 WHERE `threads`.`thread_id` = $thread_id";
            $update_result = mysqli_query($connect, $update_query);
            $type = "un" . $type;
            
        } else {
            if (isset($_COOKIE["thread_dislike_" . $thread_id])) {
                setcookie("thread_dislike_" . $thread_id, 'yes', 1);
                $update_query = "UPDATE `threads` SET `thread_dislike_count` =thread_dislike_count-1 WHERE `threads`.`thread_id` = $thread_id";
                $update_result = mysqli_query($connect, $update_query);
                $type = "undislike_and_like";
            }
            setcookie("thread_like_" . $thread_id, 'yes', time() + 60 * 60 * 24 * 365 * 5);
            $update_query = "UPDATE `threads` SET `thread_like_count` =thread_like_count+1 WHERE `threads`.`thread_id` = $thread_id";
            $update_result = mysqli_query($connect, $update_query);
        }
    }
    if ($type == "dislike") {
        if (isset($_COOKIE["thread_dislike_" . $thread_id])) {
            setcookie("thread_dislike_" . $thread_id, 'yes', 1);
            $update_query = "UPDATE `threads` SET `thread_dislike_count` =thread_dislike_count-1 WHERE `threads`.`thread_id` = $thread_id";
            $update_result = mysqli_query($connect, $update_query);
            $type = "un" . $type;
        } else {
            if (isset($_COOKIE["thread_like_" . $thread_id])) {
                setcookie("thread_like_" . $thread_id, 'yes', 1);
                $update_query = "UPDATE `threads` SET `thread_like_count` =thread_like_count-1 WHERE `threads`.`thread_id` = $thread_id";
                $update_result = mysqli_query($connect, $update_query);
                $type = "unlike_and_dislike";
            }
            setcookie("thread_dislike_" . $thread_id, 'yes', time() + 60 * 60 * 24 * 365 * 5);
            $update_query = "UPDATE `threads` SET `thread_dislike_count` =thread_dislike_count+1 WHERE `threads`.`thread_id` = $thread_id";
            $update_result = mysqli_query($connect, $update_query);
        }
    }

    // $update_query ="UPDATE `threads` SET `thread_".$type."_count` =thread_like_count WHERE `threads`.`thread_id` = $thread_id";

    
    if ($update_result) {
        // echo "Success updation";
        $row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `threads` WHERE `thread_id`= $thread_id"));
        echo json_encode([
            'type' => $type,
            'like_count' => $row['thread_like_count'],
            'dislike_count' => $row['thread_dislike_count'],
            // 'var ' => $var
        ]);
    } else {
        echo "failed updation";
    }
}
if (isset($_POST['type']) && isset($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];
    $type = $_POST['type'];
    $count = $_POST['count'];
    include "./services/_dbconnect.php";
    include "./services/validation_of_user.php";

    // setcookie("PHPSESSID","yes", 1);
    $var = $_COOKIE;
    if ($type == "like") {
        if (isset($_COOKIE["comment_like_" . $comment_id])) {
            setcookie("comment_like_" . $comment_id, 'yes', 1);
            $update_query = "UPDATE `comments` SET `comment_like_count` =comment_like_count-1 WHERE `comments`.`comment_id` = $comment_id";
            $update_result = mysqli_query($connect, $update_query);
            $type = "un" . $type;
            
        } else {
            if (isset($_COOKIE["comment_dislike_" . $comment_id])) {
                setcookie("comment_dislike_" . $comment_id, 'yes', 1);
                $update_query = "UPDATE `comments` SET `comment_dislike_count` =comment_dislike_count-1 WHERE `comments`.`comment_id` = $comment_id";
                $update_result = mysqli_query($connect, $update_query);
                $type = "undislike_and_like";
            }
            setcookie("comment_like_" . $comment_id, 'yes', time() + 60 * 60 * 24 * 365 * 5);
            $update_query = "UPDATE `comments` SET `comment_like_count` =comment_like_count+1 WHERE `comments`.`comment_id` = $comment_id";
            $update_result = mysqli_query($connect, $update_query);
        }
    }
    if ($type == "dislike") {
        if (isset($_COOKIE["comment_dislike_" . $comment_id])) {
            setcookie("comment_dislike_" . $comment_id, 'yes', 1);
            $update_query = "UPDATE `comments` SET `comment_dislike_count` =comment_dislike_count-1 WHERE `comments`.`comment_id` = $comment_id";
            $update_result = mysqli_query($connect, $update_query);
            $type = "un" . $type;
        } else {
            if (isset($_COOKIE["comment_like_" . $comment_id])) {
                setcookie("comment_like_" . $comment_id, 'yes', 1);
                $update_query = "UPDATE `comments` SET `comment_like_count` =comment_like_count-1 WHERE `comments`.`comment_id` = $comment_id";
                $update_result = mysqli_query($connect, $update_query);
                $type = "unlike_and_dislike";
            }
            setcookie("comment_dislike_" . $comment_id, 'yes', time() + 60 * 60 * 24 * 365 * 5);
            $update_query = "UPDATE `comments` SET `comment_dislike_count` =comment_dislike_count+1 WHERE `comments`.`comment_id` = $comment_id";
            $update_result = mysqli_query($connect, $update_query);
        }
    }

    // $update_query ="UPDATE `comments` SET `comment_".$type."_count` =comment_like_count WHERE `comments`.`comment_id` = $comment_id";

    
    if ($update_result) {
        // echo "Success updation";
        $row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `comments` WHERE `comment_id`= $comment_id"));
        echo json_encode([
            'type' => $type,
            'like_count' => $row['comment_like_count'],
            'dislike_count' => $row['comment_dislike_count'],
            // 'var ' => $var
        ]);
    } else {
        echo "failed updation";
    }
}
