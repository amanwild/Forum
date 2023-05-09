<?php

require "./services/validation_of_user.php";

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $title = "Verify Email";
  

    include "header.php"; 
    ?>

    <body>
        <?php
        include "./components/navbar.php";
        include "./components/verify_email_card.php";
        include "./components/footer.php";

        ?>
    </body>
    </html>
    <?php


        } else {
            echo "<script>window.location.replace('welcome.php');</script>";
        }
