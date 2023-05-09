<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Contact us</title>
</head>

<body>
    <?php

    // echo"connection was successfull";
    // require "./services/validation_of_user.php";


    // include "services/variables.php";
    // include "services/_dbconnect.php";
    
include "./services/validation_of_user.php";
    include "./components/navbar.php";
    include "modals/_login_modal.php";
    include "modals/_signin_modal.php";

    include "./services/contact_us.php";
    include "./components/contact_form.php";
    include "./components/footer.php";
    // include ".";
    // include ".";

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</html>