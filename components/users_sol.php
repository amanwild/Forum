<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">

                        <p class="mb-4"><span class="text-primary font-italic me-1">Category( forum )</span>New category Created for Douts
                        </p>
<div id="comment_id_in_profile">
</div>         
                </div>
            </div>

        </div>
    </div>
</div>
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