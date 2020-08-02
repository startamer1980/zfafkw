<?php
function uploadImage($folder, $image){
    $image -> store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}
function uploadImage_base64($folder, $image){
    $filename = date("h:i:sa")->hashName();
    $decodeImage = base64_decode($image);
    file_put_contents('images/'.$filename."JPG", $decodeImage);
    $path = 'images/'.$filename."JPG";
    return $path;
}
