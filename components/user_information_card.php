<form action="" method="post">
    <input type="hidden" class="set_profile" id="set_profile" name="set_profile">
    <script>
        set_profile.value = true;
    </script>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" value="<?= $user_Username ?>" name="username">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">First Name</p>
                </div>
                <div class="col-sm-9">
                    <input type="test" value="<?= $user_First_name ?>" name="firstname">
                </div>



            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Last Name</p>
                </div>
                <div class="col-sm-9">
                    <input type="test" value="<?= $user_Last_name ?>" name="lastname">
                </div>



            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <input type="email" value="<?= $user_Email ?>" name="email" required>
                </div>
                <div class="invalid-feedback">
                      Please enter valid Email address.
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Designation</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" value="<?= $user_designation ?>" name="designation">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                    <input type="tel"  value=" <?= $user_phone ?>" name="phone">
                    
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" value="<?= $user_address ?>" name="address">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary ms-1">Save Profile </button>
</form>
