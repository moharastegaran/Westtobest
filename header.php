<?php

if (isset($_POST['fa'])) {
    $_SESSION['lang'] = 'fa';
} else if (isset($_POST['de'])) {
    $_SESSION['lang'] = 'de';
} else if (isset($_POST['en']) || !isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

include "lang/".$_SESSION['lang'].".php";

if (!isset($_SESSION['night_mode']))
    $_SESSION['night_mode'] = "false";

if (isset($_POST['theme_dark'])) {
    $_SESSION['night_mode'] = $_SESSION['night_mode'] === "true" ? "false" : "true";
    header("Refresh:0");
}


if (isset($_POST['avatar_sub'])) {
    $filename = $_FILES['avatar']['name'];
    $tmpname = $_FILES['avatar']['tmp_name'];
    $img = data_now() . $filename;
    $folder = AVATAR_DIR . $img;
    if (move_uploaded_file($tmpname, $folder)) {
        // delete old avatar
        $result = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "' ");
        $row = mysqli_fetch_assoc($result);
        if(!empty($row['avatar'])){
            unlink(AVATAR_DIR.$row['avatar']);
        }
        header("Refresh:0");
        $msg = "Image uploaded successfully";
        $conn->query("UPDATE user set avatar='" . $img . "' WHERE username='" . $_SESSION['username'] . "'");
    } else {
        $msg = "Failed to upload image";

    }
}
if (isset($_POST['cover_sub'])) {
    $filename = $_FILES['cover']['name'];
    $tmpname = $_FILES['cover']['tmp_name'];
    $img =data_now() . $filename;
    $folder = 'images/resources/' . $img;
    if (move_uploaded_file($tmpname, $folder)) {
        $msg = "Image uploaded successfully";
        header("Refresh:0");
        $conn->query("UPDATE user set header_img='" . $img . "' WHERE username='" . $_SESSION['username'] . "'");
    } else {
        $msg = "Failed to upload image";
    }
}


?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?>"

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['web_title']; ?></title>
    <link rel="icon" href="images/logo_square.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <?php if (isset($_SESSION['night_mode']) && $_SESSION['night_mode'] === "true") { ?>
        <link rel="stylesheet" href="css/dark-theme.css">
    <?php } ?>

    <link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.css"/>
    <script src="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.js"></script>
    <link rel="stylesheet" href="css/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="css/animate/animate.css">
    <link rel="stylesheet" href="css/emoji-picker/font-awesome.min.css">
    <link rel="stylesheet" href="css/emoji-picker/emoji.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/sweetalert.js"></script>
</head>
<body class="<?php echo (isset($_SESSION['lang']) && $_SESSION['lang'] == 'fa') ? 'rtl' : '' ?> <?php echo(isset($_SESSION['night_mode']) ? ($_SESSION['night_mode'] === "true" ? 'theme-dark' : 'theme-light') : 'theme-light'); ?>">
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="postoverlay"></div>
    <div class="responsive-header">
        <div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
            <span class="mh-text">
				<a href="index.php" title=""><img src="images/logowb.png" height="30" alt=""></a>
			</span>
        </div>
        <div class="mh-head second">
            <form class="mh-form">
                <input onkeyup="search(this.value)" placeholder="<?php echo $lang['Search_Friend']; ?>"/>
                <a href="" class="fa fa-search"></a>
            </form>
            <form id="nightmode-form" method="post" action="">
                <input type="hidden" name="theme_dark">
            </form>
        </div>
        <nav id="menu" class="res-menu">
            <ul>
                <li><a href="index.php" title=""><i class="ti-home"></i> <?php echo $lang['home']; ?></a></li>
                <li><a href="post.php" title=""><i class="ti-clipboard"></i> <?php echo $lang['titles']['posts']; ?></a>
                </li>
                <li><a href="profile.php?p=<?php echo $_SESSION['username']; ?>" title=""><i
                                class="ti-files"></i> <?php echo $lang['titles']['profile']; ?></a></li>
                <li><a href="notfiction.php" title=""><i
                                class="ti-bell"></i> <?php echo $lang['titles']['notifications']; ?></a>
                </li>
                <li><a href="messages.php" title=""><i
                                class="ti-comments-smiley"></i> <?php echo $lang['titles']['messages']; ?>
                    </a></li>
                <li><a href="setting.php" title=""><i class="ti-settings"></i> <?php echo $lang['titles']['setting']; ?>
                    </a></li>
                <li><a href="people.php" title=""><i class="ti-user"></i> <?php echo $lang['titles']['explore']; ?></a>
                </li>
                <li><a href="logout.php" title=""><i class="ti-power-off"></i><?php echo $lang['titles']['logout']?></a>
                </li>
                <li class="setting-row text-center mt-5">
                    <?php echo $lang['onoff_option']['night_mode'] ?>
                    <input type="checkbox" id="night_mode" name="night_mode"
                           value="nightmodeinput" <?php echo (isset($_SESSION['night_mode']) && $_SESSION['night_mode'] === "true") ? 'checked' : ''; ?>>
                    <label for="night_mode" data-on-label="<?php echo $lang['onoff_option']['label_on'] ?>"
                           data-off-label="<?php echo $lang['onoff_option']['label_off'] ?>"></label>
                </li>
            </ul>
        </nav>
    </div>
    <!--    <div id="search_result_mobile"-->
    <!--         style="box-shadow: -3px 2px #eeeeee;margin-top: 7px;border-radius: 10px;overflow-y: scroll;max-height: 200px;z-index: 99999"></div>-->

    <!-- responsive header -->

    <div class="topbar stick">
        <div class="logo">

            <span class="ti-menu main-menu" style="cursor: pointer" data-ripple=""></span>

            <a title="" href="index.php"><img src="images/logowb.png" alt=""></a>
        </div>

        <div class="top-area">
            <ul class="setting-area">
                <li>
                    <script>
                        function search(name) {
                            $.ajax
                            ({
                                type: 'post',
                                url: 'ajax/search.php',
                                data: {
                                    name: name
                                },
                                success: function (response) {
                                    if (/Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                                        if (name != false) {
                                            document.getElementById("search_result_mobile").innerHTML = response;
                                            document.getElementById("search_result_mobile").style.padding = '10px';
                                        } else {
                                            document.getElementById("search_result_mobile").innerHTML = '';
                                            document.getElementById("search_result_mobile").style.padding = '0';
                                        }
                                    } else {
                                        if (name != false) {
                                            document.getElementById("search_result").innerHTML = response;
                                            document.getElementById("search_result").style.padding = '10px';
                                        } else {
                                            document.getElementById("search_result").innerHTML = '';
                                            document.getElementById("search_result").style.padding = '0';
                                        }
                                    }


                                }
                            });
                        }
                    </script>
                    <a href="#" data-ripple=""><i class="ti-search"></i></a>
                    <div class="searched">
                        <form method="post" class="form-search">
                            <input type="text" onkeyup="search(this.value)"
                                   placeholder="<?php echo $lang['Search_Friend']; ?>">
                            <button data-ripple type="button"><i class="ti-search"></i></button>
                            <div id="search_result"></div>
                        </form>
                    </div>
                </li>
                <li>
                    <script>
                        function notf() {
                            $.ajax({
                                type: 'post',
                                url: 'ajax/notfi.php',
                                success : function (response){
                                    console.log(response)
                                }
                            });
                        }

                        setInterval(function () {
                                if (!$('div.dropdowns').hasClass('active')) {

                                    $.ajax({
                                        type: 'post',
                                        url: 'ajax/notification/notification.php',
                                        success: function (response) {
                                            document.getElementById("notint").innerHTML = response;
                                            document.getElementById("sidbar-notfiction_get").innerHTML = response;
                                        }
                                    });
                                    $.ajax({
                                        type: 'post',
                                        url: 'ajax/notification/get.php',
                                        success: function (response) {
                                            document.getElementById("notfiction_get").innerHTML = response;

                                        }
                                    });
                                }
                            }
                            , 500);

                    </script>
                    <a href="javascript:void(0)" onclick="notf()" data-ripple="">
                        <i class="ti-bell"></i>
                        <span id="notint"></span>
                    </a>
                    <div class="dropdowns">
                        <ul class="drops-menu" id="notfiction_get">
                        </ul>
                        <a href="notfiction.php" class="more-mesg"><?php echo $lang['view_more'] ?></a>
                    </div>
                </li>
                <li>
                    <script>
                        function notf_comment() {
                            $.ajax({
                                type: 'post',
                                url: 'ajax/notfi.php',
                                data : {
                                    notfic : '4'
                                },
                            });

                        }
                        setInterval(function () {
                                if (!$('div.dropdowns').hasClass('active')) {

                                    $.ajax({
                                        type: 'post',
                                        url: 'ajax/notification/notification.php',
                                        data : {
                                            notfic : '4'
                                        },
                                        success: function (response) {
                                            document.getElementById("notcommentint").innerHTML = response;
                                            document.getElementById("sidbar-notfiction_comment_get").innerHTML = response;
                                        }
                                    });
                                    $.ajax({
                                        type: 'post',
                                        url: 'ajax/notification/get_comment.php',
                                        data : {
                                            notfic : '4'
                                        },
                                        success: function (response) {
                                            document.getElementById("comment_notfiction_get").innerHTML = response;

                                        }
                                    });
                                }
                            }
                            , 500);

                    </script>
                    <a href="javascript:void(0)" onclick="notf_comment()" data-ripple="">
                        <i class="ti-comment"></i><span id="notcommentint">
                        </span>
                    </a>
                    <div class="dropdowns">
                        <ul class="drops-menu" id="comment_notfiction_get">
                        </ul>
                        <a href="messages.php" class="more-mesg"><?php echo $lang['view_more'] ?></a>
                    </div>
                    <script>


                    </script>
                </li>
                <!--                --><?php //die($_SESSION['lang']) ;?>
                <li><a href="javascript:void(0)" data-ripple="">
                        <!--                        <i class="fa fa-globe"></i>-->
                        <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'en') { ?>
                            <img src="images/flags/flag_en_rounded.png" width="25"><?php } ?>
                        <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'de') { ?>
                            <img src="images/flags/flag_de_rounded.png" width="25"><?php } ?>
                        <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'fa') { ?>
                            <img src="images/flags/flag_ir_rounded.png" width="25"><?php } ?>

                    </a>
                    <div class="dropdowns languages">
                        <form action="" method="post" id="en">
                            <input type="hidden" name="en"/>
                        </form>
                        <form action="" method="post" id="de">
                            <input type="hidden" name="de"/>
                        </form>
                        <form action="" method="post" id="fa">
                            <input type="hidden" name="fa"/>
                        </form>
                        <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] !== 'en') { ?>
                            <a href="#" title=""
                               onclick="document.getElementById('en').submit();"><img
                                        src="images/flags/flag_en_rounded.png"
                                        width="30"> <?php echo $lang['languages']['en'] ?></a>
                        <?php } ?>
                        <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] !== 'de') { ?>
                            <a href="#" title=""
                               onclick="document.getElementById('de').submit();"><?php if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'de') { ?>
                                    <i class="ti-check"></i><?php } ?><img src="images/flags/flag_de_rounded.png"
                                                                           width="30"> <?php echo $lang['languages']['de'] ?>
                            </a>
                        <?php } ?>
                        <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] !== 'fa') { ?>
                            <a href="#" title=""
                               onclick="document.getElementById('fa').submit();"><?php if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'fa') { ?>
                                    <i class="ti-check"></i><?php } ?><img src="images/flags/flag_ir_rounded.png"
                                                                           width="30"> <?php echo $lang['languages']['fa'] ?>
                            </a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
            <div class="user-img">
                <!--            style="right:35px"-->
                <?php $result = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "'");
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <img src="images/resources/<?php if (empty($row['avatar'])) {
                        echo 'avatar-default.png';
                    } else {
                        echo $row['avatar'];
                    } ?>" alt="" style="width:60px;height:60px">
                <?php } ?>
                <span class="status f-online"></span>
                <div class="user-setting">
                    <a href="profile.php?p=<?php echo $_SESSION['username']; ?>" title=""><i
                                class="ti-user"></i> <?php echo $lang['view_profile']; ?></a>
                    <a href="setting.php" title=""><i class="ti-settings"></i><?php echo $lang['titles']['setting']; ?>
                    </a>
                    <a href="logout.php" title=""><i class="ti-power-off"></i><?php echo $lang['titles']['logout']; ?></a>
                </div>
            </div>

        </div>
    </div><!-- topbar -->