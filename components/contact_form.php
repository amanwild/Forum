<div class="container my-3 py-5">




  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-body " style=" border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
        <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
          <div class=" my-4 ">
            <h2 class="modal-title text-center" id="signinModalLabel">Contact us</h2>
            <hr class="my-3">
            <form class="needs-validation " action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" novalidate>
              <div class="container p-2 " style="border-radius:8px;">

                <input type="hidden" class="Contactus" id="Contactus" name="Contactus">
                <script>
                  Contactus.value = true;
                </script>

                <div class="form-row">
                  <div class="col-md-5 mx-auto mb-3">
                    <label for="firstname">First name </label><span style="color:red;"> *</span>
                    <input type="text" class="form-control " id="firstname" name="firstname" placeholder="First name" required>
                    <div class="invalid-feedback">
                      Please enter your a First name.
                    </div>

                  </div>
                  <div class="col-md-5 mx-auto mb-3">
                    <label for="lastname">Last name </label><span style="color:red;"> *</span>
                    <input type="text" class="form-control " id="lastname" name="lastname" placeholder="Last name" required>
                    <div class="invalid-feedback">
                      Please enter your Last name.
                    </div>

                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-5 mx-auto mb-3">
                    <label for="email">Email address</label><span style="color:red;"> *</span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                      Please enter your Email address.
                    </div>

                  </div>
                  <div class="col-md-5 mx-auto mb-3">
                    <label for="contact_no">Contact no. </label><span style="color:red;"> *</span>
                    <input type="tel" class="form-control " id="contact_no" name="contact_no" placeholder="Contact no." required>
                    <div class="invalid-feedback">
                      Please enter your Contact no.
                    </div>

                  </div>
                </div>
                <div class="form-group">

                </div>
                <div class="form-row">
                  <div class="col-md-5 mx-auto mb-3">

                    <label for="firstname">Username </label>
                    <input type="text" class="form-control " id="username" name="username" placeholder="Username" required>
                    <div class="invalid-feedback">
                      Please enter your a Username.
                    </div>

                  </div>
                  <div class="col-md-5 mx-auto mb-3">

                    <div class="form-group">
                      <label for="input_file">Select file input</label>
                      <input type="file" class="form-control-file" id="input_file">
                    </div>

                  </div>
                </div>
                <div class="col-md-11 mx-auto mb-3">
                  <div class="form-group">
                    <label for="contact_description">Title</label><span style="color:red;"> *</span>
                    <input type="text" class="form-control" id="contact_title" name="contact_title" required>
                    <div class="invalid-feedback">
                      Please type a Title.
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="contact_description">Description</label><span style="color:red;"> *</span>
                    <textarea type="text" class="form-control" id="contact_description" name="contact_description" rows="3" required></textarea>
                    <!-- <div class="invalid-feedback">
                        Please type a Description.
                      </div> -->
                  </div>



                  <label for="input_file">Select Gender</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="male">
                    <label class="form-check-label" for="gender1">
                      Male
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                    <label class="form-check-label" for="gender2">
                      Female
                    </label>
                  </div>

                  <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gender" id="gender3" value="none" checked>
                    <label class="form-check-label" for="gender3">
                      None
                    </label>
                  </div>

                  <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary mx-auto">Submit</button>
                  </div>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>