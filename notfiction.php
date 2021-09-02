<?php

require "vendor/autoload.php";

use Carbon\Carbon;

session_start();
if (isset($_SESSION['username'])) {

    include "config/config.php";
    include "header.php";
    global $conn;

    ?>
    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row merged20" id="page-contents">
                            <!--start sidebar left -->
                            <?php include "sidebar_left.php"; ?>
                            <!--end sidebar left -->
                            <!--start main -->
                            <div class="col-lg-9">
                                <div class="central-meta">
                                    <div class="editing-interest">
                                        <h5 class="f-title"><i
                                                    class="ti-bell"></i><?php echo $lang['titles']['notifications']; ?>
                                        </h5>
                                        <div class="notification-box">
                                            <ul>
                                                <?php
                                                $result = $conn->query("SELECT * FROM notfic where for_user='" . $_SESSION['username'] . "' order by id DESC");
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $user = $conn->query("SELECT * FROM user where username='" . $row['user'] . "'");
                                                        while ($us = mysqli_fetch_assoc($user)) {
                                                            ?>

                                                            <?php if ($row['user'] != $_SESSION['username']) { ?>
                                                                <li>
                                                                <figure>
                                                                    <a href="profile.php?p=<?php echo $row['user']; ?>"><img
                                                                                src="images/resources/<?php if ($us['avatar'] == 0) {
                                                                                    echo "avatar-default.png";
                                                                                } else {
                                                                                    echo $us['avatar'];
                                                                                } ?>" style="width: 50px;height: 50px"
                                                                                alt="">
                                                                    </a></figure>
                                                            <?php } ?>
                                                            <div class="notifi-meta">
                                                                <p><?php
                                                                    //                                                            if(isset($_POST['follow'])){
                                                                    //                                                                if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$row['user']."' and acc='1'"))==0){
                                                                    //                                                                    $conn->query("INSERT INTO friend (user_1,user_2,acc) values ('".$_SESSION['username']."','".$row['user']."','1')");
                                                                    //                                                                    $conn->query("UPDATE friend SET acc='1' where user_1='".$row['user']."' and user_2='".$_SESSION['username']."'");
                                                                    //                                                                }else{
                                                                    //                                                                    $conn->query("DELETE FROM friend where user_1='".$_SESSION['username']."' or user_2='".$_SESSION['username']."' and user_1='".$row['user']."' or user_2='".$row['user']."'");
                                                                    //                                                                }
                                                                    //                                                            }
                                                                    switch ($row['notfic']) {
                                                                        case "1":
                                                                            echo '<a href="profile.php?p=' . $row['user'] . '"><strong><i>' . $us['name'] . '</i></strong></a> ' . $lang['friend_request'];
                                                                            ?>
                                                                            <script>
                                                                                function follows(follow, follow_id) {
                                                                                    $.ajax({
                                                                                        type: 'post',
                                                                                        url: 'ajax/follow.php',
                                                                                        data: {
                                                                                            follow: follow
                                                                                        },
                                                                                        success: function (response) {
                                                                                            document.getElementById('follow_get' + follow_id).innerHTML = response;
                                                                                        }
                                                                                    });
                                                                                }

                                                                                function rejects(reject) {
                                                                                    $.ajax({
                                                                                        type: 'post',
                                                                                        url: 'ajax/reject.php',
                                                                                        data: {
                                                                                            reject: reject
                                                                                        },
                                                                                        success: function (response) {
                                                                                            console.log(response);
                                                                                        }, error: function (error) {
                                                                                            console.log(error);
                                                                                        }
                                                                                    });
                                                                                }
                                                                            </script>
                                                                            <!--                                                                            <div class="d-inline" style="width: auto">-->
                                                                            <a href="javascript:void(0)" type="button"
                                                                               class="btn-acc-user add-butn"
                                                                               id="follow_get<?php echo $us['id']; ?>"
                                                                               data-ripple=""
                                                                               onclick="follows('<?php echo $us['username']; ?>','<?php echo $us['id']; ?>')">
                                                                                <?php if (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $us['username'] . "'")) == 0) {
                                                                                    echo $lang['accept_request'];
                                                                                } elseif (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $us['username'] . "' and acc='1'")) != 0) {
                                                                                    echo $lang['unfollow'];
                                                                                } else {
                                                                                    echo $lang['accept_request'];
                                                                                } ?></a>

                                                                            <a href="javascript:void(0)" type="button"
                                                                               class="btn-rej-user add-butn"
                                                                               style="display: <?php echo (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $us['username'] . "' and acc='1'")) > 0) ? 'none' : '' ?>"
                                                                               id="reject_get<?php echo $us['id']; ?>"
                                                                               data-ripple=""
                                                                               onclick="rejects('<?php echo $us['username']; ?>','<?php echo $us['id']; ?>')">
                                                                                <?php echo $lang['reject_request']; ?>
                                                                            </a>
                                                                            <!--                                                                </div>-->
                                                                            <?php
                                                                            break;

                                                                        case "2":
//                                                                            if ($row['user'] != $_SESSION['username']) {
                                                                            echo '<a href="profile.php?p=' . $row['user'] . '"><strong><i>' . $us['name'] . '</i></strong></a>' . ' ' . $lang['comment_post'];

                                                                            echo '<a href="post.php?id=' . $row['pro'] . '" type="button" class="add-butn more-action" data-ripple="">' . $lang['go_to_post'] . '</a>';
//                                                                            }
                                                                            break;
                                                                        case
                                                                        '3':
                                                                            echo '<a href="profile.php?p=' . $row['user'] . '"><strong><i>' . $us['name'] . '</i></strong></a>' . ' ' . $lang['like'];

                                                                            echo '<a href="post.php?id=' . $row['pro'] . '" type="button" class="add-butn more-action" data-ripple="">' . $lang['go_to_post'] . '</a>';
                                                                            break;
                                                                    }
                                                                    ?></p>
                                                                <?php date_default_timezone_set('UTC'); ?>
                                                                <span><?php echo Carbon::make($row['created_at'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->translatedFormat('D j M, H:i'); ?></span>
                                                            </div>
                                                            </li>
                                                        <?php }
                                                    }
                                                } else {
                                                    echo "<div class='alert alert-info'>" . $lang['Alert_no_notification'] . "</div>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end main -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "footer.php";

} else {
    header("location:index.php");
}