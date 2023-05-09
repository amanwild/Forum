<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">

                        <p class="mb-4"><span class="text-primary font-italic me-1">Category( forum )</span>New category Created for Douts
                        </p>

<div id="quetion_id_in_profile">
</div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    function update_like_dislike_thread(condition, thread_id) {


        if (condition == "like") {
            var count = $('#thread_like_' + thread_id).html();
        }
        if (condition == "dislike") {
            var count = $('#thread_dislike_' + thread_id).html();
        }
        $.ajax({
            url: "http://localhost:8080/forum/update_like_dislike.php",
            type: "POST",
            data: {
                type: condition,
                thread_id: thread_id,
                count: count,
            },
            success: function(result) {
                console.log("success");
                console.log(result);
                result = JSON.parse(result);
                if (result.type == 'like') {
                    $('#thread_like_' + thread_id).html(result.like_count);
                    $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up-like.svg");
                }
                if (result.type == 'unlike') {
                    $('#thread_like_' + thread_id).html(result.like_count);
                    $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up.svg");
                }
                if (result.type == 'undislike_and_like') {
                    $('#thread_dislike_' + thread_id).html(result.dislike_count);
                    $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down.svg");

                    $('#thread_like_' + thread_id).html(result.like_count);
                    $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up-like.svg");
                }
                if (result.type == 'dislike') {
                    $('#thread_dislike_' + thread_id).html(result.dislike_count);
                    $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                }
                if (result.type == 'undislike') {
                    $('#thread_dislike_' + thread_id).html(result.dislike_count);
                    $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down.svg");
                }
                if (result.type == 'unlike_and_dislike') {
                    $('#thread_like_' + thread_id).html(result.like_count);
                    $('#thread_btn_like_' + thread_id).attr("src", "/forum/data/thumbs-up.svg");

                    $('#thread_dislike_' + thread_id).html(result.dislike_count);
                    $('#thread_btn_dislike_' + thread_id).attr("src", "/forum/data/thumbs-down-dislike.svg");
                }



            }
        });
    }
</script>