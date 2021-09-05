<?php
$cluster = Cassandra::cluster()  				
               ->withContactPoints('mycas')
               ->withPort(9042)
               ->build();
$session = $cluster->connect();


$session->execute('USE measurements');

$batch = new Cassandra\BatchStatement();


?>