
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Index</title>
</head>

<body>
<?php
session_start();

// echo"connection was successfull";


include "./services/variables.php";
include "./services/_dbconnect.php";
include "./modals/_login_modal.php";
include "./modals/_signin_modal.php";

include "./components/navbar.php";
include "./components/footer.php";
// include ".";
// include ".";

?>

</body>

</html>