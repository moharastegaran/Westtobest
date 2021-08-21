<?php
session_start();
include 'lang/en.php';
if(!isset($_SESSION['username'])){
    include "config/config.php";
    if(isset($_POST['login'])){
        if(isset($_POST['g-recaptcha-response'])){
            $secret='6LesSsgbAAAAACK7XR1X4I73S-_H_79FwRjEVFmL';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse,true);
            if($responseData["success"]){
                $sql="SELECT * FROM user";
                $result=$conn->query($sql);
                while ($row=mysqli_fetch_assoc($result)){
                    if($_POST['username']==$row['username'] && password_verify($_POST['password'],$row['password'])){
                        $_SESSION['username']=$row['username'];
                        header("location:index.php");
                    }else{
                        $error="username or password invalid";
                    }
                }
            }else{
                $error="please select recaptcha";
            }
        }
    }
    if(isset($_POST['signup'])){
        $secret='6LesSsgbAAAAACK7XR1X4I73S-_H_79FwRjEVFmL';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse,true);
        if($responseData["success"]){
            $sql = "SELECT * FROM user where username='" . $_POST['username'] . "'";
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) <= 0) {
                $mail = $_POST['mail'];
                $sql = "SELECT * FROM user where mail='" . $mail . "'";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) <= 0) {
                    if (isset($_POST['already'])) {
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $sql = "INSERT INTO user (name,birthday,username,mail,password,sex) values
                  ('" . $_POST['name'] . "','" . $_POST['birthday'] . "','" . $_POST['username'] . "','" . $_POST['mail'] . "'
                  ,'" . $password . "','" . $_POST['sex'] . "')";
                        $conn->query($sql);
                        $_SESSION['username'] = $_POST['username'];
                        header("location:index.php");
                    } else {
                        $error = "Please agree to the terms";
                    }
                } else {
                    $error = "email is have";
                }
            } else {
                $error = "username is have";
            }
        }else{
            $error="please select recaptcha";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>login</title>
        <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

        <link rel="stylesheet" href="css/main.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/color.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    </head>
    <body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <h1>human</h1>
                            <p>
                                human for
                            </p>
                            <div class="friend-logo">
                                <span><img src="images/wink.png" alt=""></span>
                            </div>
                            <a href="#" title="" class="folow-me">Follow Us on</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <script>
                        window.setTimeout(function() {
                            $("#danger-alert").fadeTo(700, 0).slideUp(700, function(){
                                $(this).remove();
                            });
                        }, 2000);
                    </script>
                    <?php if(isset($error)){?>
                        <div class="alert alert-danger" id="danger-alert"><i class="fa fa-exclamation-triangle"></i> <?php echo $error;?></div>
                    <?php }  ?>
                    <div class="login-reg-bg">
                        <div class="log-reg-area sign">
                            <h2 class="log-title"><?php echo $lang['login']; ?></h2>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" id="input" name="username"/>
                                    <label class="control-label" for="input"><?php echo $lang['username']; ?></label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"/>
                                    <label class="control-label" for="input"><?php echo $lang['password']; ?></label><i class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked"/><i class="check-box"></i><?php echo $lang['Always_Remember_Me']; ?>
                                    </label>
                                </div>
                                <a href="#" title="" class="forgot-pwd"><?php echo $lang['Forgot_Password?']; ?></a>
                                <div class="submit-btns">
                                    <div class="g-recaptcha" data-sitekey="6LesSsgbAAAAAEda6Xw88TIrFZ-OTBe8GJYPgSpi"></div>
                                    <button class="mtr-btn signin" name="login" type="submit"><span><?php echo $lang['login']; ?></span></button>
                                    <button class="mtr-btn signup" type="button"><span><?php echo $lang['Register']; ?></span></button>
                                </div>
                            </form>
                        </div>
                        <div class="log-reg-area reg">
                            <h2 class="log-title"><?php echo $lang['Register']; ?></h2>
                            <p>
                                <?php echo $lang['Don’t_use_Winku_Yet?']; ?><a href="#" title=""><?php echo $lang['Take_the_tour']; ?></a> <?php echo $lang['or']; ?> <a href="#" title=""><?php echo $lang['join']; ?> <?php echo $lang['now']; ?></a>
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" required="required" name="name"/>
                                    <label class="control-label" for="input"><?php echo $lang['first_and_last_name']; ?></label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" required="required" name="username"/>
                                    <label class="control-label" for="input"><?php echo $lang['username']; ?></label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" required="required" name="password"/>
                                    <label class="control-label" for="input"><?php echo $lang['password']; ?></label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-radio">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sex" checked="checked" value="male"/><i class="check-box"></i><?php echo $lang['male']; ?>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sex" value="female"/><i class="check-box"></i><?php echo $lang['female']; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" required="required" name="birthday"/>
                                    <label class="control-label" for="input"><?php echo $lang['birthday']; ?></label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" required="required" name="mail"/>
                                    <label class="control-label" for="input"><a href="http://www.wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="16537b777f7a56"><?php echo $lang['email'];?></a></label><i class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="already" checked="checked"/><i class="check-box"></i><?php echo $lang['Accept_Terms_&_Conditions_?']; ?>
                                    </label>
                                </div>
                                <a href="#" title="" class="already-have"><?php echo $lang['Already_have_an_account']; ?></a>
                                <div class="submit-btns">
                                    <div class="g-recaptcha" data-sitekey="6LesSsgbAAAAAEda6Xw88TIrFZ-OTBe8GJYPgSpi"></div>
                                    <button class="mtr-btn" name="signup"><span><?php echo $lang['Register']; ?></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
    <script src="js/script.js"></script>

    </body>

    </html>
<?php }else{
    header("location:app/index.php");
}