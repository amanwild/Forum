  
<div class="modal fade" id="add_thread_Modal" tabindex="-1" role="dialog"  aria-labelledby="add_thread_ModalLabel" aria-hidden="true">
        <div class="modal-dialog mx-auto" style="max-width: 50%; max-height: 50%;"role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="add_thread_ModalLabel">Add your Quetions or Douts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-0" >
                    <form action="<?php echo$_SERVER['REQUEST_URI'];?>" method="POST">
                  <?php 
                 
                    ?>
                    


                        <input type="hidden" class="add_thread" id="add_thread" name="add_thread">
                        <input type="hidden" class="cat_id" id="cat_id" name="cat_id">
                        <script>
                            add_thread.value = true;
                        </script>

                        <div class="form-group">
                            <label for="Q_title" class="col-form-label">Enter Quetions Title:</label>
                            <input type="text" class=" form-control Q_title" name="Q_title" id="Q_title">
                        </div>
                        <div class="form-group">
                            <label for="Q_description" class="col-form-label">Enter Quetions description:</label>
                            <textarea type="text" cols="20" rows="10" class="form-control" class="form-control " name="Q_description" id="Q_description" > </textarea>
                        </div>



                        <div class="modal-footer px-0">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>