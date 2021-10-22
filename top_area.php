<?php
$result = $conn->query("SELECT * FROM user where username='" . $_GET['p'] . "'");
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <section>
        <div class="feature-photo">
            <div class="cover-photo-bg"
                 style="background-image: url(<?php if (trim($row['header_img']) === "") {
                     echo "images/resources/cover-default.jpg";
                 } else {
                     echo COVERS_DIR.$row['header_img'];
                 } ?>)">
            </div>
            <div class="add-btn">
                <span><?php echo mysqli_num_rows($conn->query("SELECT * FROM friend where user_2='" . $_SESSION['username'] . "' and acc='1'")) . " " . $lang['followers']; ?></span>
                <?php
                if ($_SESSION['username'] != $_GET['p']) {
                    ?>

                    <script>
                        function follows(follow) {
                            $.ajax({
                                type: 'post',
                                url: 'ajax/follow.php',
                                data: {
                                    follow: follow
                                },
                                success: function (response) {
                                    const btn = document.getElementById('follow_get');
                                    btn.innerHTML = response;
                                    btn.setAttribute('onclick', 'cancelRequest(\'' + follow + '\')');
                                }
                            });
                        }

                        function cancelRequest(reject) {
                            $.ajax({
                                type: 'post',
                                url: 'ajax/reject.php',
                                data: {
                                    reject: reject
                                },
                                success: function (response) {
                                    const btn = document.getElementById('follow_get');
                                    btn.innerHTML = response;
                                    btn.setAttribute('onclick', 'follows(\'' + reject + '\')');
                                }
                            });
                        }
                    </script>

                <?php
                $has_followed = mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $row['username'] . "' and acc='1'")) > 0;
                $has_requested = mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $row['username'] . "' and acc='0'")) > 0;
                ?>
                    <a href="javascript:void(0)" title="" id="follow_get" data-ripple=""
                       onclick="<?php echo ($has_requested ? 'cancelRequest' : 'follows') . '(\'' . $_GET['p'] . '\')' ?>">
                        <?php
                        if ($has_followed) {
                            echo $lang['unfollow'];
                        } elseif ($has_requested) {
                            echo $lang['reject_request'];
                        } else {
                            echo $lang['follow'];
                        }

                        //                        if (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $_GET['p'] . "'")) == 0) {
                        //                            echo $lang['follow'];
                        //                        } elseif (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $_GET['p'] . "' and acc='1'")) != 0) {
                        //                            echo $lang['unfollow'];
                        //                        } else {
                        //                            echo $lang['request'];
                        //                        } ?>
                    </a>
                    <?php
                }
                ?>
            </div>
            <?php
            if ($_SESSION['username'] == $_GET['p']) {
                ?>
                <form class="edit-phto" id="form-cover-send" enctype="multipart/form-data" method="POST" action="">
                    <input type="hidden" name="cover_sub">
                    <i class="fa fa-camera-retro"></i>
                    <label class="fileContainer">
                        <?php echo $lang['Edit_Cover_Photo']; ?>
                        <input type="file" name="cover" id="cover-send"/>
                    </label>
                </form>
                <script>
                    var _URL = window.URL || window.webkitURL;

                    $("#cover-send").change(function (e) {
                        var file, img;


                        if ((file = this.files[0])) {
                            img = new Image();
                            img.onload = function () {
                                // alert(this.width + " " + this.height);
                                var width = this.width;
                                if (this.width >= 1600 && this.width <= 2000) {
                                    document.getElementById('form-cover-send').submit();
                                } else {
                                    alert('Please select a photo with a width of 1600 to 2000 pixels');
                                }
                            };
                            img.onerror = function () {
                                alert("not a valid file: " + file.type);
                            };
                            img.src = _URL.createObjectURL(file);


                        }

                    });
                </script>

            <?php } ?>
            <div class="container-fluid">
                <div class="row merged">
                    <div class="col-lg-2 col-sm-3">
                        <div class="user-avatar">
                            <figure>
                                <img id="avatar_profile" src="<?php if ($row['avatar'] == 0) {
                                    echo "images/resources/avatar-default.png";
                                } else {
                                    echo AVATAR_DIR.$row['avatar'];
                                } ?>" alt="" >
                                <?php
                                if ($_SESSION['username'] == $_GET['p']) {
                                    ?>
                                    <form action="" class="edit-phto" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="avatar_sub">
                                        <i class="fa fa-camera-retro"></i>
                                        <label class="fileContainer">
                                            <?php echo $lang['Edit_avatar_Photo']; ?>
                                            <input type="file" name="avatar"
                                                   accept=".jpg,.png,"/>
                                        </label>
                                    </form>
                                <?php } ?>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9">
                        <div class="timeline-info">
                            <ul>
                                <li class="admin-name">
                                    <h5 id="name_title"><?php echo $row['name']; ?></h5>
                                    <span>@<?php echo $row['username']; ?></span>
                                </li>
                                <li>
                                    <a <?php if (!isset($_GET['page'])) { ?> class="active"<?php } ?>
                                            href="profile.php?p=<?php echo $_GET['p']; ?>" title=""
                                            data-ripple=""><?php echo $lang['titles']['posts']; ?></a>
                                    <a <?php if (isset($_GET['page']) && $_GET['page'] == 'follower') { ?> class="active"<?php } ?>
                                            href="profile.php?p=<?php echo $_GET['p']; ?>&page=follower" title=""
                                            data-ripple=""><?php echo $lang['titles']['friends']; ?></a>
                                    <a <?php if (isset($_GET['page']) && $_GET['page'] == 'bio') { ?> class="active"<?php } ?>
                                            href="profile.php?p=<?php echo $_GET['p']; ?>&page=bio" title=""
                                            data-ripple=""><?php echo $lang['titles']['bio']; ?></a>
                                    <?php if ($_SESSION['username'] == $_GET['p']) { ?>
                                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'setting') { ?> class="active"<?php } ?>
                                                href="setting.php" title=""
                                                data-ripple=""><?php echo $lang['titles']['setting']; ?></a>
                                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'not') { ?> class="active"<?php } ?>
                                                href="notfiction.php" title=""
                                                data-ripple=""><?php echo $lang['titles']['notifications']; ?></a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>