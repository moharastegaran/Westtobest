<?php 
$result=$conn->query("SELECT * FROM user where username='".$_GET['p']."'");
while ($row=mysqli_fetch_assoc($result)){
	?>
<section>
		<div class="feature-photo">
			<figure><img  style="height:350px" src="images/resources/<?php if($row['header_img']==0){ echo "timeline-1.jpg";}else{ echo $row['header_img']; }?>" alt=""></figure>
			<div class="add-btn">
				<span><?php echo mysqli_num_rows($conn->query("SELECT * FROM friend where user_2='".$_SESSION['username']."' and acc='1'"))." ". $lang['followers'];?></span>
				<?php 
				if($_SESSION['username']!=$_GET['p']){
					?>

<script>
    function follows(follow){
        $.ajax({
            type:'post',
            url:'ajax/follow.php',
            data:{
                follow:follow
            },
            success:function (response){
                document.getElementById('follow_get').innerHTML=response;
            }
        });
    }
</script>
					<a href="#" title="" id="follow_get" data-ripple="" onclick="follows('<?php echo $_GET['p'];?>')">
						<?php if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$_GET['p']."'"))==0) { echo $lang['follow']; }elseif(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$_GET['p']."' and acc='1'"))!=0){echo $lang['unfollow']; }else{ echo  $lang['request']; }?></a>
					<?php 
				}
				?>
			</div>
			<?php
			if ($_SESSION['username']==$_GET['p']){?>
			<form class="edit-phto" id="form-cover-send" enctype="multipart/form-data" method="POST" action="">
			<input type="hidden" name="cover_sub">
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					<?php echo $lang['Edit_Cover_Photo'];?>
				<input type="file" name="cover" id="cover-send"/>
				</label>
			</form>
                <script>
                    var _URL = window.URL || window.webkitURL;

                    $("#cover-send").change(function(e) {
                        var file, img;


                        if ((file = this.files[0])) {
                            img = new Image();
                            img.onload = function() {
                                // alert(this.width + " " + this.height);
                                var width = this.width;
                                if( this.width>=1800&&this.width<=1980){
                                    document.getElementById('form-cover-send').submit();
                                }else {
                                    alert('Please select a photo with a width of 1800 to 1980 pixels');
                                }
                            };
                            img.onerror = function() {
                                alert( "not a valid file: " + file.type);
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
								<img id="avatar_profile" src="images/resources/<?php if($row['avatar']==0){ echo "user-avatar.jpg";}else{ echo $row['avatar']; }?>" alt="" ">
								<?php
								if ($_SESSION['username']==$_GET['p']){
									?>
								<form action=""  class="edit-phto" method="post" enctype="multipart/form-data"   >
								<input type="hidden" name="avatar_sub">
									<i class="fa fa-camera-retro"></i>
									<label class="fileContainer">
									<?php echo $lang['Edit_avatar_Photo'];?>
										<input type="file" name="avatar" onchange="this.form.submit()" accept=".jpg,.png,"/>
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
								  <h5 id="name_title"><?php echo $row['name'];?></h5>
								  <span>@<?php echo $row['username'];?></span>
								</li>
								<li>
									<a  <?php if(!isset($_GET['page'])){?> class="active"<?php }?> href="profile.php?p=<?php echo $_GET['p'];?>" title="" data-ripple=""><?php echo $lang['post'];?></a>
									<a <?php if(isset($_GET['page'])&&$_GET['page']=='follower'){?> class="active"<?php }?> href="profile.php?p=<?php echo $_GET['p'];?>&page=follower" title="" data-ripple=""><?php echo $lang['friend'];?></a>
									<a <?php if(isset($_GET['page'])&&$_GET['page']=='bio'){?> class="active"<?php }?> href="profile.php?p=<?php echo $_GET['p'];?>&page=bio" title="" data-ripple=""><?php echo $lang['bio'];?></a>
									<?php if($_SESSION['username']==$_GET['p']){?>
									<a <?php if(isset($_GET['page'])&&$_GET['page']=='setting'){?> class="active"<?php }?> href="setting.php" title="" data-ripple=""><?php echo $lang['setting'];?></a>
									<a <?php if(isset($_GET['page'])&&$_GET['page']=='not'){?> class="active"<?php }?> href="notfiction.php" title="" data-ripple=""><?php echo $lang['notification'];?></a>
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