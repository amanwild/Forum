<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>

<body>
    <?php



    //   require "./components/navbar.php";
    ?>



    <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 80%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signinModalLabel">Create new account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form class="needs-validation" action="/forum/" method="POST" novalidate>
                        <input type="hidden" class="Signin" id="Signin" name="Signin">
                        <script>
                            Signin.value = true;
                        </script>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname">First name </label>
                                <input type="text" class="form-control " id="firstname" name="firstname" placeholder="First name" required>
                                <div class="invalid-feedback">
                                    Please choose a First name.
                                </div>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastname">Last name </label>
                                <input type="text" class="form-control " id="lastname"  name="lastname" placeholder="Last name" required>
                                <div class="invalid-feedback">
                                    Please choose a Last name.
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="username">@</span>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                <div class="invalid-feedback">
                                    Please choose a Username.
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email"  name="email" placeholder="name@example.com" required>
                            <div class="invalid-feedback">
                                    Please choose a Email address.
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label ">Password </label>
                            <input type="text" class="form-control  " name="password" id="password" required>
                            <div class="invalid-feedback">
                                Please choose a Password.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_password" class="col-form-label">Confirm Password </label>
                            <input type="password" class="form-control  " name="c_password" id="c_password" required>
                            <div class="invalid-feedback">
                                Please Confirm Password.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                                <label class="form-check-label" for="invalidCheck3">
                                    <a href="#"class="form-check-label" >
                                    Agree to terms and conditions</a>
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
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
   

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>