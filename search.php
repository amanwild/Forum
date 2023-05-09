<?php

require "./services/validation_of_user.php";
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Search</title>
</head>

<body>
  <?php

  // echo "validaion was executed";
  
  
  include "./components/navbar.php";
  include "./modals/add_new_thread_modal.php";
  include "./components/search_result_container.php";
  


  include "./components/footer.php";
  // include ".";

  ?>
  

</body>

</html>