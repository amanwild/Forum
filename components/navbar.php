<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

</head>


<body>
    <?php

    include "./services/variables.php";
    include "./services/_dbconnect.php";
    if (isset($_SESSION['loggedin'])) {
        // $user = $_SESSION['username'];

        include "./services/destroy_session_logout.php";
        include "./services/add_category.php";
        include "./services/set_profile.php";


        // echo "Valid user";
    } else {

        include "./services/add_new_user.php";

        include "./modals/_login_modal.php";
        include "./modals/_signin_modal.php";
        // echo "INVALID user";
        // $path  = "Signin";
        // header("location: index.php");
    }



    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="nav-link" href="/forum/welcome.php"><img src="./data/logo.png" style="width:45px ; padding-right:10px;" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <?php
                    if (isset($_SESSION['loggedin']) ) {
                        $loggedin = true;
                        echo '
                    <li class="my-auto nav-item">
                        <a class="nav-link" href="/forum/welcome.php">Welcome</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Top Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                        $select_cat_query = "SELECT * FROM `categories`";

                        $select_cat_result = mysqli_query($connect, $select_cat_query);
                        while ($row = mysqli_fetch_assoc($select_cat_result)) {
                            echo '<a class="dropdown-item" href="./treadlist.php?Cat_id=' . $row['cat_id'] . '">' . $row['cat_title'] . '</a>';
                        }
                        echo '
                    </div>
                    </li><li class="my-auto nav-item">
                        <a class="nav-link" href="/forum/memberships_follows.php">Subscriptions</a>
                        </li>
                        <li class="my-auto nav-item">
                        <a class="nav-link" href="/forum/contact.php">Contact us</a>
                    </li>';
                    } else {
                    }

                    ?>
                    <li class="my-auto nav-item">
                        <a class="nav-link" href="/forum/about.php">About us</a>
                    </li>

                    <?php
                    if ($GLOBALS['connect']) {
                        // echo"$fname,$lname";

                        echo "<li class='my-auto nav-item' >

                                            <div class='col my-auto'>
                                                <div class=' my-1 alert alert-success m-0 p-1'  role='alert'>
                                                    
                                                    <b>Connection Successfull</b>
                                                </div>
                                            </div>
                                            </li>
                                        ";
                    } else {
                        echo "<li class='my-auto nav-item'>

                                            <div class='col  my-auto '>
                                                <div class=' my-1 alert alert-danger m-0 p-1' role='alert'>
                                                    
                                                    <b>Connection failed</b><span>(Server Error:$mess)</span>
                                                </div>
                                            </div>
                                            </li>";
                    }
                    if ($GLOBALS['please_login']) {
                        // echo"$fname,$lname";

                        echo "<li class='my-auto nav-item' >

                                            <div class='col my-auto'>
                                                <div class=' my-1 alert alert-danger m-0 p-1'  role='alert'>
                                                    
                                                    <b> login First to access this features</b>
                                                </div>
                                            </div>
                                            </li>
                                        ";
                    }
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        // echo"$fname,$lname";

                        echo "<li class='my-auto nav-item' >

                                            <div class='col my-auto'>
                                                <div class=' my-1 alert alert-success m-0 p-1'  role='alert'>
                                                    
                                                    <b>Login Successfull</b>
                                                </div>
                                            </div>
                                            </li>
                                        ";
                    }
                    if ($GLOBALS['Logout']) {
                        echo "<li class='my-auto nav-item'>
user
                                            <div class='col  my-auto '>
                                                <div class=' my-1 alert alert-success m-0 p-1' role='alert'>
                                                    
                                                    <b>Log out Successfull</b>
                                                </div>
                                            </div>
                                            </li>";
                    }
                    ?>

                </ul>
                <?php
                if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) && isset($_SESSION['user_Username'])) {
                    $user_First_name = $_SESSION['user_First_name'];
                    $user_Last_name = $_SESSION['user_Last_name'];
                    $user_Email = $_SESSION['user_Email'];
                    $user_Username = $_SESSION['user_Username'];
                    $user_Id = $_SESSION['user_Id'];
                    $user_img_url = $_SESSION['user_img_url'];
                    echo
                    '<form class="d-flex my-1 p-0 mr-2 text-center" style="background-color:#434343;border-radius: 8px;">
                            <a href="/forum/profile.php" class=" my-auto mr-2" type="button" style="text-decoration:none;color:white;">
                            <img src="/forum/data/' . $user_img_url . '" class="rounded-circle p-1 m-1 pr-2" class="rounded-circle img-fluid" style="width: 50px;object-fit:cover;height:50px" alt=".">' . $_SESSION["user_Username"] . '</a>
                        </form>
                        <form class="d-flex my-0" action="search.php" method="GET">
                        <input class="form-control mr-2" type="search" name="search" class="search" id="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success mr-2" type="submit">Search</button>
                    </form>';
                    // echo "Valid user";
                    // echo$user_First_name .$user_Last_name . $user_Email. $user_Username.$user_Id;  echo "Valid user";
                }

                ?>

               


                <?php
                if (isset($_SESSION['user_Username']) ) {
                    $loggedin = true;
                    echo '
                    <form class="my-0" action="/forum/services/destroy_session_logout.php" method="POST">  <input type="hidden" name="Logout"  class="Logout my-1" id="Logout"> 
                    <script>  Logout.value = 1; </script> 
                        <button type="submit" class="btn btn-outline-success mr-2 my-1">Log Out</button>
                    </form>
                    ';
                } else {
                    echo '
                    <button type="button" class="btn btn-outline-success mr-2 my-1" data-toggle="modal" data-target="#loginModal" data-whatever="@mdo">Login</button>
                <button type="button" class="btn btn-outline-success mr-2 my-1" data-toggle="modal" data-target="#signinModal" data-whatever="@mdo">Sign in</button>
                    ';
                }

                ?>


            </div>
        </div>
    </nav>
    <!-- -- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        setTimeout(function() {

            // // // // // // // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>