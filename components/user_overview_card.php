<?php 

?>
<div class="card-body text-center pb-0">
    <img src="/forum/data/<?=$user_img_url?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;object-fit:cover;height:150px">
    <h4 class="my-3"><?= $user_First_name ?> <?= $user_Last_name ?></h4>
    <h6 class="my-3">@<?= $user_Username ?></h6>
    <p class="text-muted mb-1"> <?= $user_designation ?></p>
    <p class="text-muted mb-4"><?= $user_address ?></p>
    <div class="d-flex justify-content-center mb-2">

        <?php if ($ac_owner_Id == $_SESSION['user_Id']) { ?>
            <form method="post" action="/forum/editprofile.php">
                <button type="submit" class="btn btn-outline-primary ms-1">Edit Profile <?= $ac_owner_Id ?></button>
            </form>
        <?php }

        if ($ac_owner_Id != $_SESSION['user_Id']) { ?>
            <form>
                <input type="hidden" class="Follow" id="Follow" name="Follow" value="Follow">
                <input type="hidden" class="ac_owner_Id" id="ac_owner_Id" name="ac_owner_Id" value="<?= $ac_owner_Id ?>">
                <script>
                    Follow.value = true;
                </script>
                <?php
                ?>
                    <input type="<?= $followed_btn?>" id="follow_btn_<?= $ac_owner_Id?>"  onclick=" update_follow_unfollow('follow',<?= $ac_owner_Id ?>) , count_entries('follower')" class="btn btn-primary ms-1 d-inline" style="width:100px;" value="Follow"></input><?php  ?>
                    <input type="<?= $unfollowed_btn?>" id="unfollow_btn_<?= $ac_owner_Id?>" onclick="update_follow_unfollow('unfollow',<?= $ac_owner_Id ?>) , count_entries('follower') " class="btn btn-outline-primary ms-1 d-inline" style="width:100px;"  value="Unfollow"></input><?php  ?>

            </form>
            <?php if (true) {
                include "./services/join_button.php";
            } ?>
            <form method="post" action="/forum/message_to_user.php">
                <button type="submit" class="btn btn-outline-primary ms-1">Message </button>
            </form>
        <?php } ?>
    </div>
</div>

<!-- <div class="card mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush rounded-3">
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://mdbootstrap.com</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">mdbootstrap</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
            </li>
        </ul>
    </div>
</div> -->