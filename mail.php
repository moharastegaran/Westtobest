<?php
$name=stripslashes($_POST["name"]);
$email=stripslashes($_POST["email"]);
$message=stripslashes($_POST["message"]);
$secret="6LesSsgbAAAAACK7XR1X4I73S-_H_79FwRjEVFmL";
$response=$_POST["captcha"];

$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$response."");
$captcha_success=json_decode($verify,true);
if ($captcha_success['success']) {
   echo $email;

}
else{
echo 'bad';
}