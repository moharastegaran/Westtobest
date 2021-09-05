<?php
session_start();

require "../vendor/autoload.php";

use Carbon\Carbon;

include "../config/config.php";
$comment = $_POST['comment'];
$user = $_POST['user'];
$post_id = $_POST['post_id'];
$conn->query("INSERT INTO comment (user,description,post_id,date_time) values ('" . $user . "','" . $comment . "','" . $post_id . "','" . date("Y-m-d H:i:s") . "')");
if ($user != $_POST['for_user']) {
    $conn->query("INSERT INTO notfic (user,for_user,notfic,pro,created_at) values ('" . $user . "','" . $_POST['for_user'] . "','2','" . $post_id . "','" . date("Y-m-d H:i:s") . "')");
}
$SELECT = $conn->query("SELECT * FROM comment where user='" . $user . "' and description='" . $comment . "' and post_id='" . $post_id . "'");
while ($comm = mysqli_fetch_assoc($SELECT)) {
    $user = $conn->query("SELECT * FROM user where username='" . $comm['user'] . "'");
    while ($us = mysqli_fetch_assoc($user)) {
        ?>

        <li>
            <div class="comet-avatar">
                <img src="images/resources/<?php if (empty($us['avatar'])) {
                    echo 'avatar-default.png';
                } else {
                    echo $us['avatar'];
                } ?>" alt="">
            </div>
            <div class="we-comment">
                <div class="coment-head">
                    <h5><a href="profile.php?p=<?php echo $us['username']; ?>" title=""><?php echo $us['name']; ?></a></h5>
                    <span><?php echo Carbon::make($comm['date_time'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->ago() ?></span>
                </div>
                <p><?php echo $comm['description']; ?></p>
            </div>

        </li>
    <?php }
} ?>