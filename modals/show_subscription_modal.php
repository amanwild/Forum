<div class="modal fade" id="show_subscriptions_Modal" tabindex="-1" role="dialog" aria-labelledby="show_subscriptions_ModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 600px;" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="show_subscriptions_ModalLabel"> <span id="subscription_count_in_modal<?= $ac_owner_Id ?>"></span> Subscriptions</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="">
                          <div class="card mb-4 mb-md-0">
                              <div class="card-body p-1 py-2">
                                  <div id="subscription_id_in_modal">
                                  </div>
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