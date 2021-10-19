<?php
session_start();

require "vendor/autoload.php";

use Carbon\Carbon;

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
                                                $result = $conn->query("SELECT * FROM notfic WHERE for_user='" . $_SESSION['username'] . "' AND notfic!='4' ORDER BY id DESC");
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $user = $conn->query("SELECT * FROM user WHERE username='" . $row['user'] . "'");
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
                                                                                    } ?>"
                                                                                    style="width: 50px;height: 50px"
                                                                                    alt="">
                                                                        </a></figure>
                                                                    <!--                --><?php //} ?>
                                                                    <div class="notifi-meta">
                                                                        <p>
                                                                            <?php
                                                                            switch ($row['notfic']) {
                                                                                case "1": ?>
                                                                                    <a href="profile.php?p=<?php echo $row['user']; ?>">
                                                                                        <strong><i><?php echo $us['name']; ?></i></strong>
                                                                                    </a> <?php echo $lang['friend_request']; ?>
                                                                                    <a href="javascript:void(0)"
                                                                                       type="button" data-ripple=""
                                                                                       class="btn-acc-user add-butn mx-1"
                                                                                       id="follow_get<?php echo $us['id']; ?>"

                                                                                       onclick="follows('<?php echo $us['username']; ?>','<?php echo $us['id']; ?>')">
                                                                                        <?php if (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $us['username'] . "'")) == 0) {
                                                                                            echo $lang['accept_request'];
                                                                                        } elseif (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $us['username'] . "' and acc='1'")) != 0) {
                                                                                            echo $lang['unfollow'];
                                                                                        } else {
                                                                                            echo $lang['accept_request'];
                                                                                        } ?></a>
                                                                                    <?php
                                                                                    break;
                                                                                case "2":
                                                                                    ?>
                                                                                    <a href="profile.php?p=<?php echo $row['user']; ?>">
                                                                                        <strong><i><?php echo $us['name']; ?></i></strong>
                                                                                    </a> <?php echo $lang['comment_post']; ?>
                                                                                    <a href="post.php?id=<?php echo $row['pro']; ?>"
                                                                                       type="button"
                                                                                       class="add-butn more-action"
                                                                                       data-ripple="">
                                                                                        <?php echo $lang['go_to_post']; ?>
                                                                                    </a>
                                                                                    <?php
                                                                                    break;
                                                                                case
                                                                                '3': ?>

                                                                                    <a href="profile.php?p=<?php echo $row['user']; ?>">
                                                                                        <strong><i><?php echo $us['name']; ?></i></strong>
                                                                                    </a> <?php echo $lang['like']; ?>
                                                                                    <a href="post.php?id=<?php echo $row['pro']; ?>"
                                                                                       type="button"
                                                                                       class="add-butn more-action"
                                                                                       data-ripple="">
                                                                                        <?php echo $lang['go_to_post']; ?>
                                                                                    </a>

                                                                                    <?php
                                                                                    break;
                                                                            }
                                                                            ?></p>
                                                                        <span><?php echo Carbon::make($row['created_at'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->ago(); ?></span>
                                                                    </div>
                                                                    <i class="del fa fa-close"
                                                                       onclick="deleteNotif(this,<?php echo $row['id'].',\''.$row['notfic'].'\',\''.$row['user'].'\''; ?>)"></i>
                                                                </li>
                                                            <?php }
                                                        }
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

        function deleteNotif(_this,notid, typeid, username){
            $.ajax({
                type: 'post',
                url: 'ajax/notification/delete.php',
                data: {
                    notid : notid,
                    typeid : typeid,
                    username : username
                },
                success: function (response) {
                    $(_this).parent().slideUp("slow",function (){
                        $(_this).parent().remove();
                        const _ul=$(_this).closest("ul");
                        if(_ul.children().length === 0 ){
                            _ul.append("<div class='alert alert-info'><?php echo $lang['Alert_no_notification'] ?></div>")
                        }
                    });
                }
            });
        }

        function rejects(reject, usr_id) {
            $.ajax({
                type: 'post',
                url: 'ajax/reject.php',
                data: {
                    reject: reject
                },
                success: function (response) {
                    $("#reject_get" + usr_id).closest("li").remove();
                    console.log(response);

                }, error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
    <?php
    include "footer.php";

} else {
    header("location:index.php");
}