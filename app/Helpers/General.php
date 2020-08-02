<?php
function uploadImage($folder, $image){
    $image -> store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}
function uploadImage_base64($folder, $image){


    $folderPath = 'images/'.$folder.'/';
    $image_parts = explode(";base64,", $image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file = $folderPath . uniqid() . '.'.$image_type;
    file_put_contents($file, $image_base64);
    return $file;

//    $filename = "2";
//    $decodeImage = base64_decode($image);
//    file_put_contents('images/'.$folder.'/'.$filename.".JPG", $decodeImage);
//    $path = 'images/'.$folder.'/'.$filename.".JPG";
//    return $path;
}
