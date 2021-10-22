<?php

function optimize_image($base64file, $destination, $maxWidth = 250){
    $data = explode(';',$base64file);
    $data = explode(',',$data[1]);
    $data = base64_decode($data[1]);

    $im = imagecreatefromstring($data);
    $imageX= imagesx($im);
    $imageY= imagesy($im);
    if ($imageX > $maxWidth){
        $percent = $maxWidth/($imageX*1.0);
    }else{
        $percent = 1;
    }
    echo $percent;

    $newimageX = $maxWidth;
    $newimageY = $imageY * $percent;
    $thumb = imagecreatetruecolor($newimageX,$newimageY);
    imagecopyresized($thumb, $im, 0, 0, 0, 0, $newimageX,$newimageY,$imageX,$imageY);

    $img = data_now().'_'.substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5).'.jpg';
    $folder = '../../'.$destination. $img;
    imagejpeg($thumb,$folder);

    return $img;
}
?>