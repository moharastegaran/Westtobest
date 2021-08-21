<?php
include '../config/config.php';
sleep(2);
echo mysqli_num_rows($conn->query("SELECT * FROM comment where post_id='".$_POST['post_id']."'"));?>