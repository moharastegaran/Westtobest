<?php
session_start();
if(!isset($_SESSION['username'])){
    header("loction:login.php");
}else{
    include "config/config.php";
    include "header.php";
    ?>
    	<section>
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
                            <!--start sidebar left -->
                            <?php include "sidebar_left.php";?>
                            <!--end sidebar left -->
                            <!--start main -->
                            <div class="col-lg-9">
                                <script>
                                    window.onload = function() {
                                        city='off';
                                        country='off';
                                        sickness='off';
                                        $.ajax({
                                            type:'post',
                                            url:'ajax/people.php',
                                            data:{
                                                country:country,
                                                city:city,
                                                sickness:sickness
                                            },
                                            success:function (response){
                                                document.getElementById('people').innerHTML=response;
                                            }
                                        });
                                    }
                                    function followers(follow,follow_id){
                                        $.ajax({
                                            type:'post',
                                            url:'ajax/follow.php',
                                            data:{
                                                follow:follow
                                            },
                                            success:function (response) {
                                               document.getElementById('follow_people'+follow_id).innerHTML=response;
                                            }
                                        });
                                    }
                                </script>

                                <div class="form-group half">
                                        <?php
                                        $user=$conn->query("SELECT * FROM user WHERE username='".$_SESSION['username']."'");
                                        while ($row=mysqli_fetch_assoc($user)){
                                        ?>
                                            <script>
                                                function filter(){
                                                    if(document.getElementById('country').checked){
                                                        country='<?php echo $row['country'];?>';
                                                    }else {
                                                        country='off';
                                                    }
                                                    if(document.getElementById('city').checked){
                                                        city='<?php echo $row['city'];?>';
                                                    }else {
                                                        city='off';
                                                    }
                                                    if(document.getElementById('sickness').checked){
                                                        sickness='<?php echo $row['sickness'];?>';
                                                    }else {
                                                        sickness='off';
                                                    }
                                                    $.ajax({
                                                        type:'post',
                                                        url:'ajax/people.php',
                                                        data:{
                                                            country:country,
                                                            city:city,
                                                            sickness:sickness
                                                        },
                                                        success:function (response){
                                                            document.getElementById('people').innerHTML=response;
                                                        }
                                                    });
                                                }
                                            </script>

                                                <?php if(empty($row['sickness'])){?>
                                                <div class="alert alert-danger"><?php echo $lang['please_selected']." <a href='setting.php'>".$lang['sickness'].'</a>'; ?></div>
                                            <?php } ?>
                                            <?php if(empty($row['country'])){?>
                                            <div class="alert alert-danger"><?php echo $lang['please_selected']." <a href='setting.php'>".$lang['country'].'</a>'; ?></div>
                                        <?php } ?>
                                        <?php if(empty($row['city'])){?>
                                            <div class="alert alert-danger"><?php echo $lang['please_selected']." <a href='setting.php'>".$lang['city'].'</a>'; ?></div>
                                        <?php } ?>
                                        <div class="setting-row">
                                            <span><?php echo $lang['country'];?></span>
                                            <input type="checkbox" onclick="filter()" name="country" id="country" />
                                            <label for="country" data-on-label="ON" data-off-label="OFF"></label>
                                        </div>
                                        <div class="setting-row">
                                            <span><?php echo $lang['city'];?></span>
                                            <input type="checkbox" onclick="filter()" name="city" id="city"/>
                                            <label for="city" data-on-label="ON" data-off-label="OFF"></label>
                                        </div>
                                        <div class="setting-row">
                                            <span><?php echo $lang['sickness'];?></span>
                                            <input type="checkbox" onclick="filter()" name="country" id="sickness"/>
                                            <label for="sickness" data-on-label="ON" data-off-label="OFF"></label>
                                        </div>
                                <?php  } ?>
                                </div>


    <ul class="nearby-contct" id="people">

    </ul>
</div><!-- photos -->
</div><!-- centerl meta -->
                            <!--end main -->

                            </div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
    <?php
    include "footer.php";
}