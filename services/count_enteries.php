<?php
function count_query($table_name,$condition)
{
    include "_dbconnect.php";
     $count_query = "SELECT * FROM $table_name WHERE $condition";
    // $count_query = "SELECT * FROM threads WHERE thread_user_id = 114";

    $count_query_result = mysqli_query($connect, $count_query);
    // echo var_dump($count_query_result);
    $num  = mysqli_num_rows($count_query_result);

    // echo $num;
    return $num;
}
// echo(count_query("thread_user_id","threads","thread_user_id = 114"));
// echo("<br>");
// echo(count_query("thread_user_id","threads","thread_user_id = 14"));?>
<script>
    
</script>
