
<?php
if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //Send request and receive json data by latitude and longitude
    $url = 'https://api.bigdatacloud.net/data/reverse-geocode-client?latitude='.trim($_POST['latitude']).'longitude='.trim($_POST['latitude']).'&localityLanguage=en';
    $json = file_get_contents($url);
    $data = json_decode($json);
    $location=$data->countryName.' '.$data->city.' '.$data->locality;
    //Print address
    echo $location;
}
?>