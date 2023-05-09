  <div class="modal fade" id="show_followers_Modal" tabindex="-1" role="dialog" aria-labelledby="show_followers_ModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 600px;" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="show_followers_ModalLabel"> <span id="follower_count_in_modal<?= $ac_owner_Id ?>"></span> Followers</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="">
                          <div class="card mb-4 mb-md-0">
                              <div class="card-body p-1 py-2">
                                  <div id="follower_id_in_modal">
                                  </div>
                                  <script>
                                      function update_link_unlink(condition, follower_id, follow_element, unfollow_element ) {

                                          $.ajax({
                                              url: "http://localhost:8080/forum/services/update_follow_unfollow.php",
                                              type: "POST",
                                              data: {
                                                  type: condition,
                                                  ac_owner_Id: follower_id,

                                              },
                                              success: function(result) {
                                                  console.log("success");
                                                  console.log(result);
                                                  result = JSON.parse(result);
                                                  console.log(result.type);

                                                  if (result.type == "follow" && result.status == "success") {
                                                      $(follow_element).attr("type", "hidden");
                                                      $(unfollow_element).attr("type", "button");
                                                      console.log(" change ");
                                                  }
                                                  if (result.type == "follow" && result.status == "failed") {
                                                      $(follow_element).attr("type", "button");
                                                      $(unfollow_element).attr("type", "hidden");
                                                      console.log(" change ");
                                                  }
                                                  if (result.type == "unfollow" && result.status == "success") {
                                                      $(follow_element).attr("type", "button");
                                                      $(unfollow_element).attr("type", "hidden");
                                                      console.log(" change ");
                                                  }
                                                  if (result.type == "unfollow" && result.status == "failed") {
                                                      $(follow_element).attr("type", "hidden");
                                                      $(unfollow_element).attr("type", "button");
                                                      console.log(" change ");
                                                  }
                                                  if (result.type == "remove" && result.status == "success") {
                                                      $(follow_element).attr("type", "hidden");
                                                      $(unfollow_element).attr("type", "button");
                                                      console.log(" change ");
                                                  }
                                                  if (result.type == "remove" && result.status == "failed") {
                                                      $(follow_element).attr("type", "button");
                                                      $(unfollow_element).attr("type", "hidden");
                                                      console.log(" change ");
                                                  }


                                                  //   if (result.type == "link" && result.status == "failed") {
                                                  //       $(follow_element).attr("type", "button");
                                                  //       $(unfollow_element).attr("type", "hidden");
                                                  //       console.log(" change ");
                                                  //   }
                                                  //   if (result.type == "unlink" && result.status == "failed") {
                                                  //       $(follow_element).attr("type", "hidden");
                                                  //       $(unfollow_element).attr("type", "button");
                                                  //       console.log(" change ");

                                                  //   }

                                              }
                                          });
                                      }
                                  </script>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>