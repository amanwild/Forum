<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['username'])) {
    $GLOBALS['connect']   =false; 
    $GLOBALS['Logout_result']   =false; 
   
  } else {
    
  }
$GLOBALS['delete_result']   =false; 
$GLOBALS['select_result']   =false; 
$GLOBALS['mess']   =false; 
$GLOBALS['update_result']   =false; 
$GLOBALS['insert_result']   =false; 
$GLOBALS['confirm']   =false; 
$GLOBALS['exist_result']   =false; 
$GLOBALS['Login']   =false; 
$GLOBALS['Logout']   =false; 
$GLOBALS['Signin']   =false; 
$GLOBALS['please_login']   =false; 
$GLOBALS['login_result']   =false; 
$GLOBALS['loggedin']   =false; 

  
?>