<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}else{
    if(!isset($_GET['p'])){
        header("location:?p=".$_SESSION['username']);
    }
    include "config/config.php";
    include "header.php";
    include "top_area.php";
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
                            <?php
                            if(!isset($_GET['page'])){
                                include "mypost.php";
                            }elseif($_GET['page']=='following' ||$_GET['page']=='follower'){
                                include "follow.php";
                            }elseif($_GET['page']=='bio'){
                                include "bio.php";
                            }
                            ?>
                            <!--end main -->
                           <?php if(!isset($_GET['page'])){?>
                            <!--start sidebar right -->
                            <?php include "sidebar_right.php";?>
                            <!--end sidebar right -->
                           <?php  } ?>

                            </div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
    <?php
    include "footer.php";
}