<?php
include "../config/config.php";
session_start();
global $conn;
//    $secret='6LesSsgbAAAAACK7XR1X4I73S-_H_79FwRjEVFmL';
//    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['captcha']);
//    $responseData = json_decode($verifyResponse,true);
//    if($responseData["success"]){
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
                    header("location:../index.php");
                } else {
                    $error = "Please agree to the terms";
                }
            } else {
                $error = "email is have";
            }
        } else {
            $error = "username is have";
        }
//    }else{
//        $error="please select recaptcha";
//    }
if(isset($error)){
    ?>
    <div class="alert alert-danger" id="danger-alert"><i class="fa fa-exclamation-triangle"></i> <?php echo $error;?></div>
<?php
}
echo $_POST['latitude'];