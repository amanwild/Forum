<div class="modal fade" id="show_comments_Modal" tabindex="-1" role="dialog" aria-labelledby="show_comments_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show_comments_ModalLabel"><span onclick="update_entries('comment_modal')" id="solution_count_in_modal<?= $ac_owner_Id ?>"></span> Solutions (comments)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <span id="hehe"></span>
                    <div class="">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body" id="comment_id_in_modal">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script>
            function update_like_dislike(condition, comment_id) {


                if (condition == "like") {
                    var count = $('#comment_like_' + comment_id).html();
                }
                if (condition == "dislike") {
                    var count = $('#comment_dislike_' + comment_id).html();
                }
                $.ajax({
                    url: "http://localhost:8080/forum/update_like_dislike.php",
                    type: "POST",
                    data: {
                        type: condition,
                        comment_id: comment_id,
                        count: count,
                    },
                    success: function(result) {
                        console.log("success");
                        console.log(result);
                        result = JSON.parse(result);
                        if (result.type == 'like') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        }
                        if (result.type == 'unlike') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up.svg");
                        }
                        if (result.type == 'undislike_and_like') {
                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down.svg");

                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
                        }
                        if (result.type == 'dislike') {
                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                        }
                        if (result.type == 'undislike') {
                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down.svg");
                        }
                        if (result.type == 'unlike_and_dislike') {
                            $('#comment_like_' + comment_id).html(result.like_count);
                            $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up.svg");

                            $('#comment_dislike_' + comment_id).html(result.dislike_count);
                            $('#comment_btn_dislike_' + comment_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                        }



                    }
                });
            }
        </script>
    </div>
</div>