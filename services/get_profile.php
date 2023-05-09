<?php
    
    $user_Id =$_SESSION['user_Id'];

  $select_user_query = "SELECT * FROM users_entries WHERE  Id = '$user_Id'";
  $select_user_result = mysqli_query($connect, $select_user_query);
  $num  = mysqli_num_rows($select_user_result);
 
  if ($num > 0) {
    //   echo "here";
      while ($row = mysqli_fetch_assoc($select_user_result)) {
          
              $user_First_name =  $row['First_name'];
              $user_Last_name =   $row['Last_name'];
              $user_Email =       $row['Email'];
              $user_Username =    $row['Username'];
              $user_img_url =    $row['img_url'];
              
              $user_phone =          $row['phone'];
              $user_address =          $row['address'];
              $user_designation =          $row['designation'];
              
              
          
          }
      }
  