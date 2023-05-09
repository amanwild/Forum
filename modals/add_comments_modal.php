<div class="modal fade" id="add_comments_Modal" tabindex="-1" role="dialog"  aria-labelledby="add_comments_ModalLabel" aria-hidden="true">
<div class="modal-dialog display-lg mx-auto" style="max-width: 50%;" role="document">
    <div class="modal-content" >
        <div class="modal-header">
            <h5 class="modal-title" id="add_comments_ModalLabel">Add your Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <!-- <form action="/forum/treadlist.php?Cat_id=<?php 
            // echo$cat_id;
            ?>" method="POST"> -->
            <form action="<?php echo$_SERVER['REQUEST_URI'];?>" method="POST">


                <input type="hidden" class="add_comments" id="add_comments" name="add_comments">
                <input type="hidden" class="add_comment_in_thread_id" id="add_comment_in_thread_id" name="add_comment_in_thread_id">
                <input type="hidden" class="cat_Id" id="cat_Id" name="cat_Id">
                <script>
                    add_comments.value = true;
                    add_comment_in_thread_id.value = <?php echo$Thread_id;?>;
                    cat_Id.value = <?php echo$cat_Id;?>;
                </script>

                
                <div class="form-group">
                    <label for="comment_content" class="col-form-label">Enter comments :</label>
                    <textarea type="text" cols="20" rows="2" class="form-control" class="form-control " name="comment_content" id="comment_content" > </textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
