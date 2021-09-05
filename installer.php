<?php

$cluster = Cassandra::cluster()
    ->withContactPoints('mycas')
    ->withPort(9042)
    ->build();
$session = $cluster->connect();

$createKeyspace = <<<EOD
CREATE KEYSPACE measurements
WITH replication = {
  'class': 'SimpleStrategy',
  'replication_factor': 1
}
EOD;

$createTable = <<<EOD
CREATE TABLE events (
  id INT,
  col1 VARCHAR,
  col2 VARCHAR,
  PRIMARY KEY (id)
)
EOD;

$session->execute($createKeyspace);
$session->execute('USE measurements');
$session->execute($createTable);

?>