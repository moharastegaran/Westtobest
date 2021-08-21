<?php
////
////function two_points_on_earth($latitudeFrom, $longitudeFrom,
////                            $latitudeTo,  $longitudeTo)
////{
////    $long1 = deg2rad($longitudeFrom);
////    $long2 = deg2rad($longitudeTo);
////    $lat1 = deg2rad($latitudeFrom);
////    $lat2 = deg2rad($latitudeTo);
////
////    //Haversine Formula
////    $dlong = $long2 - $long1;
////    $dlati = $lat2 - $lat1;
////
////    $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
////
////    $res = 2 * asin(sqrt($val));
////
////    $radius = 3958.756;
////
////    return ($res*$radius);
////}
////
////// latitude and longitude of Two Points
////$latitudeFrom = 19.017656 ;
////$longitudeFrom = 72.856178;
////$latitudeTo = 40.7127;
////$longitudeTo = -74.0059;
////
////// Distance between Mumbai and New York
////print_r(two_points_on_earth( $latitudeFrom, $longitudeFrom,
////        $latitudeTo,  $longitudeTo)*1.609344.' '.'miles');
//////
/////
//?>
<!--<html>-->
<!--<body>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--<script>-->
<!--    function locationx(){-->
<!--        $(document).ready(function(){-->
<!--            if (navigator.geolocation) {-->
<!--                navigator.geolocation.getCurrentPosition(showLocation);-->
<!--            }-->
<!--        });-->
<!--        function showLocation(position){-->
<!--            latitude = position.coords.latitude;-->
<!--            longitude = position.coords.longitude;-->
<!--            document.getElementById('latitude').innerHTML=latitude;-->
<!--            document.getElementById('longitude').innerHTML=longitude;-->
<!--            $.ajax({-->
<!--                type:'post',-->
<!--                url:'getlocation.php',-->
<!--                data:{-->
<!--                    latitude:latitude,-->
<!--                    longitude:longitude-->
<!--                },-->
<!--                success:function (response){-->
<!--                    document.getElementById('location').innerHTML=response;-->
<!--                },-->
<!--                beforeSend:function (){-->
<!--                    document.getElementById('loading').innerText='send..';-->
<!--                },-->
<!--                complete:function (){-->
<!--                    document.getElementById('loading').innerText='';-->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    }-->
<!--</script>-->
<!--<div id="loading"></div>-->
<!--<p>Your Location: <span id="latitude"></span>   <span id="longitude"></span></p>-->
<!--<span id="location"></span>-->
<!--<button type="button" onclick="locationx()">get</button>-->
<!--</body>-->
<!--</html>-->
<!--<!DOCTYPE HTML>-->
<!--<head>-->
<!--    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>-->
<!--    <script src='https://www.google.com/recaptcha/api.js'></script>-->
<!--</head>-->
<!--<body>-->
<!--<form id="contactForm">-->
<!--    <input type="text" id="name" placeholder="Your name..."/>-->
<!--    <br>-->
<!--    <input type="text" id="email" placeholder="Your email..."/>-->
<!--    <br>-->
<!--    <textarea id="message" placeholder="Your message..."></textarea>-->
<!--    <br>-->
<!--    <div class="g-recaptcha" data-sitekey="6LesSsgbAAAAAEda6Xw88TIrFZ-OTBe8GJYPgSpi"></div>-->
<!--    <br>-->
<!--    <input type="submit" />-->
<!--</form>-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        var contactForm = $("#contactForm");-->
<!--        //We set our own custom submit function-->
<!--        contactForm.on("submit", function(e) {-->
<!--            //Prevent the default behavior of a form-->
<!--            e.preventDefault();-->
<!--            //Get the values from the form-->
<!--            var name = $("#name").val();-->
<!--            var email = $("#email").val();-->
<!--            var message = $("#message").val();-->
<!--            //Our AJAX POST-->
<!--            $.ajax({-->
<!--                type: "POST",-->
<!--                url: "mail.php",-->
<!--                data: {-->
<!--                    name: name,-->
<!--                    email: email,-->
<!--                    message: message,-->
<!--                    //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.-->
<!--                    captcha: grecaptcha.getResponse()-->
<!--                },-->
<!--                success: function(response) {-->
<!--                    alert(response);-->
<!--                }-->
<!--            })-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--</body>-->
<!--6LesSsgbAAAAACK7XR1X4I73S-_H_79FwRjEVFmL-->
<!--6LesSsgbAAAAAEda6Xw88TIrFZ-OTBe8GJYPgSpi-->
<?php
if(isset($_POST['sub'])){
//$filename=$_FILES['file']['name'];
//$tmpname=$_FILES['file']['tmp_name'];
//$img=rand('100','100000').$filename;
//$folder=$img;
//if (move_uploaded_file($tmpname, $folder)) {
//    echo "nic";
//}
    echo "nic";
}
?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!---->
<!--<div class="photo">-->
<!--    <div>Photo (max 240x240 and 100 kb):</div>-->
<!--    <form action="" method="post" enctype="multipart/form-data" id="form">-->
<!--    <input type="text" name="sub">-->
<!--        <input type="file" name="file" id="file" />-->
<!--</form>-->
<!--    <script>-->
<!--         var _URL = window.URL || window.webkitURL;-->
<!---->
<!--        $("#file").change(function(e) {-->
<!--            var file, img;-->
<!---->
<!---->
<!--            if ((file = this.files[0])) {-->
<!--                img = new Image();-->
<!--                img.onload = function() {-->
<!--                    // alert(this.width + " " + this.height);-->
<!--                    var width = this.width;-->
<!--                    if( this.width>=1800&&this.width<=1980){-->
<!--                        document.getElementById('form').submit();-->
<!--                    }else {-->
<!--                        alert('abd');-->
<!--                    }-->
<!--                };-->
<!--                img.onerror = function() {-->
<!--                    alert( "not a valid file: " + file.type);-->
<!--                };-->
<!--                img.src = _URL.createObjectURL(file);-->
<!---->
<!---->
<!--            }-->
<!---->
<!--        });-->
<!--    </script>-->
<!--</div>-->
<a href="#" onclick="send()">
    send
</a>
<script>
    function send(){
        window.location.href = "http://www.w3schools.com";

    }
</script>