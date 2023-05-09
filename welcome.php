<?php

require "./services/validation_of_user.php";
$title ="Welcome";

include "header.php";
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Welcome</title>
</head>

<body>
  <?php

  // echo "validaion was executed";
  
  
  include "./components/navbar.php";
  // echo "navbar was executed";
  include "./components/carousl.php";
  // echo "carousl was executed";
  include "./modals/add_category_modal.php";
  include "./components/cards.php";
  


  include "./components/footer.php";
  // include ".";

  ?>

</body>

</html>