<?php

require 'test.php';
global $batch;
global $session;

$batch->add(
    "INSERT INTO events (id, col1, col2) VALUES (4, ?, ?)",
    array('fuck','life')
);
$session->execute($batch);

?>
