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
                            <?php
                       include "mypost.php";
                            ?>
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