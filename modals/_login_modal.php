


    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Log in your account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/forum/services/create_new_session.php" method="POST">
                        <input type="hidden" class="Login" id="Login" name="Login">
                        <script>
                            Login.value = true;
                        </script>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" class=" form-control username" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="text" class="form-control password" style="position:relative;" name="password" id="password">
                            <!-- <span style="top:0px;right:10px">Show:</span> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
