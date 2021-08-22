<?php if(!isset($_SESSION['lang'])||$_SESSION['lang']=='en'){
 include "lang/en.php";
}else{
	include "lang/gm.php";
}
					if (isset($_POST['en'])){
						$_SESSION['lang']='en';
						header("Refresh:0");
					}
					if(isset($_POST['gm'])){
						$_SESSION['lang']='gm';
						header("Refresh:0");
					}
if(isset($_POST['avatar_sub'])){
    $filename=$_FILES['avatar']['name'];
    $tmpname=$_FILES['avatar']['tmp_name'];
    $img=rand('100','100000').$filename;
    $folder='images/resources/'.$img;
    if (move_uploaded_file($tmpname, $folder)) {
        header("Refresh:0");
        $msg = "Image uploaded successfully";
        $conn->query("UPDATE user set avatar='".$img."' WHERE username='".$_SESSION['username']."'");
    }else{
        $msg = "Failed to upload image";

    }
}
if(isset($_POST['cover_sub'])){
    $filename=$_FILES['cover']['name'];
    $tmpname=$_FILES['cover']['tmp_name'];
    $img=rand('100','100000').$filename;
    $folder='images/resources/'.$img;
    if (move_uploaded_file($tmpname, $folder)) {
        $msg = "Image uploaded successfully";
        header("Refresh:0");
        $conn->query("UPDATE user set header_img='".$img."' WHERE username='".$_SESSION['username']."'");
    }else{
        $msg = "Failed to upload image";

    }
}


					?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>human</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.css" />
    <script src="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="postoverlay"></div>
    <div class="responsive-header">
        <div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
            <span class="mh-text">
				<a href="/" title=""><img src="images/logo2.png" alt=""></a>
			</span>
        </div>
        <div class="mh-head second">
            <form class="mh-form">
                <input onkeyup="search(this.value)" placeholder="<?php echo $lang['Search_Friend'];?>" />
                <a href="" class="fa fa-search"></a>
            </form>
        </div>
        <nav id="menu" class="res-menu">
            <ul>
                <li><a href="index.php" title=""><i class="ti-home"></i> <?php echo $lang['home'];?></a>
                </li>
                <li><a href="post.php" title=""><i class="ti-clipboard"></i> <?php echo $lang['post'];?></a></li>
                <li><a href="profile.php?p=<?php echo $_SESSION['username'];?>" title=""><i class="ti-files"></i> <?php echo $lang['My_pages'];?></a></li>
                <li><a href="notfiction.php" title=""><i class="ti-bell"></i> <?php echo $lang['notification'];?></a></li>
                <li><a href="messages.php" title=""><i class="ti-comments-smiley"></i> <?php echo $lang['messages'];?></a></li>
                <li><a href="setting.php" title=""><i class="ti-settings"></i> <?php echo $lang['setting'];?></a></li>
                <li><a href="people.php" title=""><i class="ti-user"></i> <?php echo $lang['People'];?></a></li>
            </ul>
        </nav>
    </div>
    <div id="search_result_mobile" style="box-shadow: -3px 2px #eeeeee;margin-top: 7px;border-radius: 10px;overflow-y: scroll;max-height: 200px "></div>

    <!-- responsive header -->
	
	<div class="topbar stick">
		<div class="logo">

            <span class="ti-menu main-menu" style="cursor: pointer" data-ripple=""></span>

			<a title="" href="/"><img src="images/logo.png" alt=""></a>
		</div>
		
		<div class="top-area">
			<ul class="setting-area">
				<li>
                    <script>
                        function search(name){
                         $.ajax
                         ({
                            type:'post',
                            url:'ajax/search.php',
                             data:{
                               name:name
                             },
                             success:function (response){
                                 if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                                     if(name!=false){
                                         document.getElementById("search_result_mobile").innerHTML=response;
                                         document.getElementById("search_result_mobile").style.padding='10px';
                                     }else {
                                         document.getElementById("search_result_mobile").innerHTML='';
                                         document.getElementById("search_result_mobile").style.padding='0';
                                     }
                                 }else {
                                     if(name!=false){
                                         document.getElementById("search_result").innerHTML=response;
                                         document.getElementById("search_result").style.padding='10px';
                                     }else {
                                         document.getElementById("search_result").innerHTML='';
                                         document.getElementById("search_result").style.padding='0';
                                     }
                                 }


                             }
                         });
                        }
                    </script>
					<a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<form method="post" class="form-search">
							<input type="text" onkeyup="search(this.value)" placeholder="<?php echo $lang['Search_Friend'];?>">
							<button data-ripple type="button"><i class="ti-search"></i></button>
                            <div id="search_result" style="background-color:#FFFFFF;width: 300px;text-align: left;box-shadow: -3px 2px #eeeeee;margin-top: 7px;border-radius: 10px;overflow-y: scroll;max-height: 200px "></div>
                    </div>
						</form>
				</li>
				<li><a href="#" id="home" title="Home" onclick="lets_home()" data-ripple=""><i class="ti-home"></i></a></li>
				<script>
                    function lets_home(){
                        window.location.href = "index.php";

                    }
                </script>
                <li>
                    <script>
                        function notf(){
                            $.ajax({
                              type:'post',
                                url:'ajax/notfi.php',
                            });

                        }
                            setInterval(function (){
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
                                ,500);

                    </script>
					<a href="#" title="Notification" onclick="notf()" id="notf" data-ripple="">
						<i class="ti-bell"></i><span id="notint">
                        </span>
					</a>
					<div class="dropdowns" >
                        <ul class="drops-menu" id="notfiction_get">
                        </ul>
						<a href="notfiction.php" title="" class="more-mesg"><?php echo $lang['view_more'] ?></a>
					</div>
<script>


</script>
				</li>
<!--				<li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>-->
<!--					<div class="dropdowns languages">-->
<!--					<form action="" method="post" id="en">-->
<!--					<input type="hidden" name="en"/>-->
<!--					</form>-->
<!--					<form action="" method="post" id="gm">-->
<!--					<input type="hidden" name="gm"/>-->
<!--					</form>-->
<!--						<a href="#" title="" onclick="document.getElementById('en').submit();">--><?php //if(isset($_SESSION['lang'])&&$_SESSION['lang']=='en'){?><!--<i class="ti-check"></i>--><?php //} ?><!--English</a>-->
<!--						<a href="#" title="" onclick="document.getElementById('gm').submit();">--><?php //if(isset($_SESSION['lang'])&&$_SESSION['lang']=='gm'){?><!--<i class="ti-check"></i>--><?php //} ?><!--Deutsche</a>-->
<!--					</div>-->
<!--				</li>-->
			</ul>
			<div class="user-img" >
                <!--            style="right:35px"-->
                <?php $result=$conn->query("SELECT * FROM user where username='".$_SESSION['username']."'");
while ($row=mysqli_fetch_assoc($result)){?>
				<img src="images/resources/<?php if(empty($row['avatar'])){ echo 'admin.jpg'; }else { echo $row['avatar'];}?>" alt="" style="width:60px;height:60px">
				<?php }?>
				<span class="status f-online"></span>
				<div class="user-setting" >
					<a href="profile.php?p=<?php echo $_SESSION['username'];?>" title=""><i class="ti-user"></i> <?php echo $lang['view_profile'];?></a>
					<a href="setting.php" title=""><i class="ti-settings"></i><?php echo $lang['setting'];?></a>
					<a href="logout.php" title=""><i class="ti-power-off"></i><?php echo $lang['logout'];?></a>
				</div>
			</div>

        </div>
	</div><!-- topbar -->	