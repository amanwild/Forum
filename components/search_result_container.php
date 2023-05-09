<?php
    include "./services/pick_ago_time.php";
    $search = $_GET["search"];
    ?><div class="conatiner m-5">

    <div class="d-flex text-center mt-3">
        <h1 class=" ml-5 my-auto mr-auto d-inline"> Search result for "<em><?php echo $search; ?></em>"</h1>

        <button type="button" class="btn btn-success d-sticky display-right my-1 mr-5" data-toggle="modal" data-target="#add_thread_Modal" data-whatever="@mdo">Add Quetions</button>

    </div>

    <?php
    
    // select * from threads where match (thread_title,thread_desc) against('i');
// normal query 
    $select_thread_query = "SELECT * FROM `threads` WHERE MATCH (`thread_title`,`thread_desc`) AGAINST (' $search')";

    // shorted query by occurance of keyword
    // $select_thread_query = "SELECT * , MATCH (`thread_title`,`thread_desc`) AGAINST ('$search') as score FROM `threads`,`categories` WHERE MATCH (`thread_title`,`thread_desc`) AGAINST ('$search');";

    $select_thread_result = mysqli_query($connect, $select_thread_query);
    $no_result = true;
    if(0< mysqli_num_rows($select_thread_result)){
        $no_result = false;
        while ($row = mysqli_fetch_assoc($select_thread_result)) {
            $no_result = false;
            $thread_user_id = $row['thread_user_id'];
            $thread_cat_id = $row['thread_cat_id'];
            $thread_title = $row['thread_title'];
            $thread_id = $row['thread_id'];
            $thread_desc = $row['thread_desc'];
            $timestamp = $row['timestamp'];
    
            $select_cat_owner_query = "SELECT * FROM `users_entries` WHERE `Id`= $thread_user_id";
            $select_cat_owner_result = mysqli_query($connect, $select_cat_owner_query);
    
            while ($row = mysqli_fetch_assoc($select_cat_owner_result)) {
                $cat_owner_result_Username = $row['Username'];
                $cat_owner_result_Id = $row['Id'];
                $cat_owner_result_dt = $row['dt'];
                $cat_owner_result_First_name = $row['First_name'];
                $cat_owner_result_Last_name = $row['Last_name'];
                $cat_owner_result_Email = $row['Email'];
            }}
                $que_time_ago_formate =  time_elapsed_string($timestamp);
                echo ' <div class="media align-items-center  m-3 p-3" style="background-color: #ebe7e7;border-radius:8px;">
                    <img src="/logo.png" width=55px class="mr-3 p-1" alt=".">
                        <a href="/forum/threads.php?thread_id=' . $thread_id . '" style="text-decoration:none;color:black;">
                                <div class="media-body">
                                    <h5 class="mt-0"> ' . $thread_title . '</h5>
                                                    ' . $thread_desc . '
                                    <hr class="my-0">
                                    <div class="d-flex text-center mt-0">
                    
                                        <p class="font-weight-bold mb-0 mr-auto d-inline">Posted by : <a  href="#">' . $cat_owner_result_Username . '</a>  (ID:' . $cat_owner_result_Id . ') </p>
                                        <span class="d-sticky display-left my-0 mr-0"> ( ' . $que_time_ago_formate . ' ) </span> 
    
    
    
                                    </div>
            
                                </div>
                    
                        </a>
                </div>
        ';
    }
    if($no_result){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-5"> No result found </h1>
          <p class="lead">No data found to the related '.$search.'.</p>
        </div>
        </div>';}
    
    
    if ($no_result) {
     
    }
    ?>
</div>