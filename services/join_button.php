 <!-- for instamojo gateway -->
 <!-- <form method="GET" action="/forum/subscription_payment_page.php"> -->

 <!-- for rozarpay gateway -->
 <?php
 
         $verify_joining_query = "SELECT * FROM payment_entry WHERE  subs_owner_ac_id = '$ac_owner_Id' AND user_id ='".$_SESSION['user_Id']."'";
         $verify_joining_result = mysqli_query($connect, $verify_joining_query);
         $num  = mysqli_num_rows($verify_joining_result);
 
         $join_btn ="Join";
         $join_url ="/forum/rozarpay.php";
         if ($num > 0) {
             $join_btn ="Joined";
             while ($row = mysqli_fetch_assoc($verify_joining_result)) {
                 
                 $payment_id =  $row['payment_id'];
             }
             $join_url ="/forum/thankyou_razorpay.php";
             
         }
 ?>
 <form method="GET" action="<?= $join_url?>">
     <input type="hidden" class="Follow" id="Follow" name="Follow" value="Follow">
     <input type="hidden" class="subs_owner_ac_Id" id="subs_owner_ac_Id" name="subs_owner_ac_Id" value="<?= $ac_owner_Id ?>">
     <input type="hidden" class="ac_owner_Id" id="ac_owner_Id" name="ac_owner_Id" value="<?= $ac_owner_Id ?>">
     <input type="hidden" class="payment_id" id="payment_id" name="payment_id" value="<?= $payment_id ?>">
     <script>
         Follow.value = true;
     </script>
     
         <button type="submit" class="btn btn-primary ms-1"><?= $join_btn?></button>
  
 </form>