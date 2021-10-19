<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else {
include "config/config.php";
include "header.php";
//    include "top_area.php";

$faqs = $lang['faq'];

?>
	
	<section>
		<div class="ext-gap bluesh high-opacity">
			<div class="content-bg-wrap" style="background: url(images/resources/animated-bg2.png)"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="top-banner">
							<h1>404</h1>
							<nav class="breadcrumb">
							  <a class="breadcrumb-item" href="index.php"><?php echo $lang['home']?></a>
							  <span class="breadcrumb-item active">404</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- top area animated -->
	
	<section>
		<div class="gap70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="page-eror">
							<img src="images/resources/404.svg" alt="">
							<div class="error-meta">
								<h1><?php echo $lang['404']['title']; ?></h1>
								<span><?php echo $lang['404']['description']; ?> </span>
								<a href="index.php" title="" data-ripple=""><?php echo $lang['404']['link']; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <?php
    include "footer.php";
}
