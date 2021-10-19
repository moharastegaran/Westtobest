<?php 
    $PageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
?>
<div class="col-lg-<?php if($PageName=='profile.php'){echo "6";}else{echo "6";}?>">
									<?php 

									include "add_post.php";
							?>
<!-- add post new box -->
<!--    --><?php
//    if(!isset($not_friend)){
//        ?>
<!--        <div class="alert alert-danger">-->
<!--            s-->
<!--        </div>-->
<!--    --><?php //} ?>
                               <?php
                     include "loop_post.php";
                     ?>
</div>
