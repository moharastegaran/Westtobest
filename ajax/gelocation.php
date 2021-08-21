<?php
$url = 'https://api.bigdatacloud.net/data/reverse-geocode-client?latitude='.trim($_POST['lat']).'&longitude='.trim($_POST['long']).'&localityLanguage=en';
$json = file_get_contents($url);
$data = json_decode($json);
echo $data->countryName.",".$data->city;