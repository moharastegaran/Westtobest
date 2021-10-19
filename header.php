<?php
if (isset($_POST['fa'])) {
    $_SESSION['lang'] = 'fa';
//    header("Refresh:0");
} else if (isset($_POST['de'])) {
    $_SESSION['lang'] = 'de';
//    header("Refresh:0");
} else {
    $_SESSION['lang'] = 'en';
//    header("Refresh:0");
}

$current_lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
include "lang/".$current_lang.".php";

//unset($_SESSION['night_mode']);

if (!isset($_SESSION['night_mode']))
    $_SESSION['night_mode'] = "false";

//echo ($_SESSION['night_mode']);
if (isset($_POST['theme_dark'])) {
    $_SESSION['night_mode'] = $_SESSION['night_mode'] === "true" ? "false" : "true";
    header("Refresh:0");
//    die($_SESSION['night_mode'] ? "ss" : "tt");
//    $_SESSION['night_mode']=false;
}


if (isset($_POST['avatar_sub'])) {
    $filename = $_FILES['avatar']['name'];
    $tmpname = $_FILES['avatar']['tmp_name'];
    $img = data_now() . $filename;
    $folder = AVATAR_DIR . $img;
    if (move_uploaded_file($tmpname, $folder)) {
        //delte old file
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
    $img = data_now() . $filename;
    $folder = COVERS_DIR. $img;
    if (move_uploaded_file($tmpname, $folder)) {
        $result = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "' ");
        $row = mysqli_fetch_assoc($result);
        if(!empty($row['header_img'])){
            unlink(COVERS_DIR.$row['header_img']);
        }
        header("Refresh:0");
        $msg = "Image uploaded successfully";
        $conn->query("UPDATE user set header_img='" . $img . "' WHERE username='" . $_SESSION['username'] . "'");
    } else {
        $msg = "Failed to upload image";

    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title><?php echo $lang['site_title']; ?></title>
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <?php if (isset($_SESSION['night_mode']) && $_SESSION['night_mode'] === "true") { ?>
        <link rel="stylesheet" href="css/dark-theme.css">
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.css"/>
    <script src="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.js"></script>
    <!--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
    <link rel="stylesheet" href="css/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="css/animate/animate.css">
    <link rel="stylesheet" href="css/emoji-picker/font-awesome.min.css">
    <link rel="stylesheet" href="css/emoji-picker/emoji.css">
    <script src="js/sweetalert.js"></script>

    <!--    <link rel="stylesheet" href="css/sweetalert/sweetalert2.css">-->


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
				<a href="index.php" title=""><img src="images/logo2.png" alt=""></a>
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

            <a title="" href="index.php"><img src="images/logo.png" alt=""></a>
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
                <li><a href="#" id="home" onclick="lets_home()" data-ripple=""><i class="ti-home"></i></a>
                </li>
                <script>
                    function lets_home() {
                        window.location.href = "index.php";

                    }
                </script>
                <li>
                    <script>
                        function notf() {
                            $.ajax({
                                type: 'post',
                                url: 'ajax/notfi.php',
                            });

                        }

                        setInterval(function () {
                                if (!$('div.dropdowns').hasClass('active')) {

                                    $.ajax({
                                        type: 'post',
                                        url: 'ajax/notficion/notfiction.php',
                                        success: function (response) {
                                            document.getElementById("notint").innerHTML = response;
                                            document.getElementById("sidbar-notfiction_get").innerHTML = response;
                                        }
                                    });
                                    $.ajax({
                                        type: 'post',
                                        url: 'ajax/notficion/get.php',
                                        success: function (response) {
                                            document.getElementById("notfiction_get").innerHTML = response;

                                        }
                                    });
                                }
                            }
                            , 500);

                    </script>
                    <a href="#" onclick="notf()" id="notf" data-ripple="">
                        <i class="ti-bell"></i><span id="notint">
                        </span>
                    </a>
                    <div class="dropdowns">
                        <ul class="drops-menu" id="notfiction_get">
                        </ul>
                        <a href="notfiction.php" class="more-mesg"><?php echo $lang['view_more'] ?></a>
                    </div>
                    <script>


                    </script>
                </li>
                <!--                --><?php //die($_SESSION['lang']) ;?>
                <li><a href="#" data-ripple="">
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
                    <img src="<?php if (empty($row['avatar'])) {
                        echo 'images/resources/avatar-default.png';
                    } else {
                        echo AVATAR_DIR.$row['avatar'];
                    } ?>" alt="" style="width:60px;height:60px">
                <?php } ?>
                <span class="status f-online"></span>
                <div class="user-setting">
                    <a href="profile.php?p=<?php echo $_SESSION['username']; ?>" title=""><i
                                class="ti-user"></i> <?php echo $lang['view_profile']; ?></a>
                    <a href="setting.php" title=""><i class="ti-settings"></i><?php echo $lang['titles']['setting']; ?>
                    </a>
                    <a href="logout.php" title=""><i class="ti-power-off"></i><?php echo $lang['logout']; ?></a>
                </div>
            </div>

        </div>
    </div><!-- topbar -->