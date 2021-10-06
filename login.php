<?php
session_start();

$current_lang = "";
if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'fa') {
    include "lang/fa.php";
    $current_lang = "fa";
} else if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'de') {
    include "lang/de.php";
    $current_lang = "de";
} else {
    include "lang/en.php";
    $current_lang = "en";
}
if (isset($_POST['en'])) {
    $_SESSION['lang'] = 'en';
    header("Refresh:0");
} else if (isset($_POST['de'])) {
    $_SESSION['lang'] = 'de';
    header("Refresh:0");
} else if (isset($_POST['fa'])) {
    $_SESSION['lang'] = 'fa';
    header("Refresh:0");
}

if (!isset($_SESSION['username'])) {
    include "config/config.php";
    if (isset($_POST['login'])) {
        if (isset($_POST['g-recaptcha-response'])) {
            $secret = '6LesSsgbAAAAACK7XR1X4I73S-_H_79FwRjEVFmL';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse, true);
            if ($responseData["success"]) {
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($_POST['username'] == $row['username'] && password_verify($_POST['password'], $row['password'])) {
                        $_SESSION['username'] = $row['username'];
                        header("location:index.php");
                    } else {
                        $error = $lang['errors']['invalid_usrnmpwd'];
                    }
                }
            } else {
                $error = $lang['errors']['invalid_captcha'];
            }
        }
    }
    if (isset($_POST['signup'])) {
        $secret = '6LesSsgbAAAAACK7XR1X4I73S-_H_79FwRjEVFmL';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse, true);
        if ($responseData["success"]) {
            $sql = "SELECT * FROM user where username='" . $_POST['username'] . "'";
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) <= 0) {
                $mail = $_POST['mail'];
                $sql = "SELECT * FROM user where mail='" . $mail . "'";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) <= 0) {
                    if (isset($_POST['already'])) {
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $sql = "INSERT INTO user (name,birthday,username,mail,password) values
                  ('" . $_POST['name'] . "','" . $_POST['birthday'] . "','" . $_POST['username'] . "','" . $_POST['mail'] . "'
                  ,'" . $password . "')";
                  if ($conn->query($sql) === TRUE) {
           
                    $_SESSION['username'] = $_POST['username'];
                    header("location:index.php");
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                        
                    } else {
                        $error = $lang['errors']['accept_terms'];
                    }
                } else {
                    $error = $lang['errors']['email_exists'];
                }
            } else {
                $error = $lang['errors']['username_exists'];
            }
        } else {
            $error = $lang['errors']['invalid_captcha'];
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <title>login</title>
        <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

        <link rel="stylesheet" href="css/main.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/color.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/loaders/custom-loader.css">
        <script src="https://www.google.com/recaptcha/api.js?hl=<?php echo $current_lang; ?>" async defer></script>

    </head>
    <body <?php echo (isset($_SESSION['lang']) && $_SESSION['lang'] == 'fa') ? 'class=\'rtl\'' : '' ?> style="overflow-y: hidden">
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <h1><?php echo $lang['login_aside_title']; ?></h1>
                            <p><?php echo $lang['login_aside_subtitle']; ?></p>
                            <div class="friend-logo">
                                <span><img src="images/wink.png" alt=""></span>
                            </div>
                            <a href="#" title="" class="folow-me"><?php echo $lang['login_aside_follow']; ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <script>
                        window.setTimeout(function () {
                            $("#danger-alert").fadeTo(700, 0).slideUp(700, function () {
                                $(this).remove();
                            });
                        }, 2000);
                    </script>

                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger mb-0" id="danger-alert"><i
                                    class="fa fa-exclamation-triangle"></i> <?php echo $error; ?></div>
                    <?php } ?>

                    <div class="login-reg-bg">
                        <div class="dropdown px-3 py-2">
                            <a href="#" data-ripple="" class="dropdown-toggle" data-toggle="dropdown">
                                <!--                        <i class="fa fa-globe"></i>-->
                                <?php if ($current_lang === 'en') { ?>
                                    <img src="images/flags/flag_en_rounded.png" width="25"> <?php echo $lang['languages']['en']; } ?>
                                <?php if ($current_lang === 'de') { ?>
                                    <img src="images/flags/flag_de_rounded.png" width="25"> <?php echo $lang['languages']['de']; } ?>
                                <?php if ($current_lang === 'fa') { ?>
                                    <img src="images/flags/flag_ir_rounded.png" width="25"> <?php echo $lang['languages']['fa']; } ?>

                            </a>
                            <div class="dropdown-menu">
                                <form action="" method="post" id="en">
                                    <input type="hidden" name="en"/>
                                </form>
                                <form action="" method="post" id="de">
                                    <input type="hidden" name="de"/>
                                </form>
                                <form action="" method="post" id="fa">
                                    <input type="hidden" name="fa"/>
                                </form>

                                <?php if ($current_lang !== 'en') { ?>
                                <li class="dropdown-item text-center" style="font-size: 13px"><a href="#" onclick="document.getElementById('en').submit();">
                                        <img src="images/flags/flag_en_rounded.png"
                                             width="25"> <?php echo $lang['languages']['en'];?></a>
                                    <?php } ?>
                                </li>
                                <?php if ($current_lang !== 'de') { ?>
                                <li class="dropdown-item text-center" style="font-size: 13px"><a href="#" onclick="document.getElementById('de').submit();">
                                        <img src="images/flags/flag_de_rounded.png"
                                             width="25"> <?php echo $lang['languages']['de'];?></a>
                                    <?php } ?>
                                </li>
                                <?php if ($current_lang !== 'fa') { ?>
                                <li class="dropdown-item text-center" style="font-size: 13px"><a href="#" onclick="document.getElementById('fa').submit();">
                                            <img src="images/flags/flag_ir_rounded.png"
                                                 width="25"> <?php echo $lang['languages']['fa'];?></a>
                                    <?php } ?>
                                </li>
                            </div>
                        </div>
                        <div class="log-reg-area sign">
                            <h2 class="log-title"><?php echo $lang['login']; ?></h2>
                            <p class="mb-3">
                                <?php echo $lang['haven\'t_signed_up_yet']; ?> <a href="#"
                                                                                  title=""><?php echo $lang['read_terms_and_conditions']; ?> </a> <?php echo $lang['login_or'] ?>
                                <a href="#" title="">
                                    <?php echo $lang['login_join_us_now']; ?>.
                                </a>
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" id="input" name="username"/>
                                    <label class="control-label" for="input"><?php echo $lang['username']; ?></label><i
                                            class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"/>
                                    <label class="control-label" for="input"><?php echo $lang['password']; ?></label><i
                                            class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked"/><i
                                                class="check-box"></i><?php echo $lang['Always_Remember_Me']; ?>
                                    </label>
                                </div>
                                <a href="#" title="" class="forgot-pwd"><?php echo $lang['Forgot_Password?']; ?></a>
                                <div class="submit-btns">
                                    <div class="g-recaptcha"
                                         data-sitekey="6LesSsgbAAAAAEda6Xw88TIrFZ-OTBe8GJYPgSpi"></div>
                                    <button class="mtr-btn signin btn-loader rounded-0" name="login" type="submit">
                                        <span><?php echo $lang['login']; ?></span></button>
                                    <button class="mtr-btn signup rounded-0" type="button">
                                        <span><?php echo $lang['Register']; ?></span></button>
                                </div>
                            </form>
                        </div>
                        <div class="log-reg-area reg">
                            <h2 class="log-title"><?php echo $lang['Register']; ?></h2>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" required="required" name="name"/>
                                    <label class="control-label"
                                           for="input"><?php echo $lang['first_and_last_name']; ?></label><i
                                            class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" required="required" name="username"/>
                                    <label class="control-label" for="input"><?php echo $lang['username']; ?></label><i
                                            class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" required="required" name="password"/>
                                    <label class="control-label" for="input"><?php echo $lang['password']; ?></label><i
                                            class="mtrl-select"></i>
                                </div>
                                <!--                                <div class="form-radio">-->
                                <!--                                    <div class="radio">-->
                                <!--                                        <label>-->
                                <!--                                            <input type="radio" name="sex" checked="checked" value="male"/><i class="check-box"></i>--><?php //echo $lang['male'];
                                ?>
                                <!--                                        </label>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="radio">-->
                                <!--                                        <label>-->
                                <!--                                            <input type="radio" name="sex" value="female"/><i class="check-box"></i>--><?php //echo $lang['female'];
                                ?>
                                <!--                                        </label>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <div class="form-group">
                                    <input type="date" required="required" name="birthday" dir="ltr"/>
                                    <label class="control-label" for="input"><?php echo $lang['birthday']; ?></label><i
                                            class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" required="required" name="mail"/>
                                    <label class="control-label" for="input"><a
                                                href="http://www.wpkixx.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="16537b777f7a56"><?php echo $lang['email']; ?></a></label><i
                                            class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="already" checked="checked"/><i
                                                class="check-box"></i><?php echo $lang['Accept_Terms_&_Conditions_?']; ?>
                                    </label>
                                </div>
                                <a href="#" title=""
                                   class="already-have"><?php echo $lang['Already_have_an_account']; ?></a>
                                <div class="submit-btns">
                                    <div class="g-recaptcha"
                                         data-sitekey="6LesSsgbAAAAAEda6Xw88TIrFZ-OTBe8GJYPgSpi"></div>
                                    <button class="mtr-btn btn-loader rounded-0" name="signup"><span><?php echo $lang['Register']; ?></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/script.js"></script>

    </body>

    </html>
<?php } else {
    header("location:app/index.php");
}