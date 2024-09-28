<?php
$target_dir = $_SERVER['DOCUMENT_ROOT']."/img/product_banners";
//$target_file = $target_dir . basename($_FILES[$_POST['image']][$_POST['image_name']]);
//$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
  //$check = getimagesize($_FILES[$_POST['image']][$_POST['image_name']]);
  //if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    //$uploadOk = 1;
  //} else {
    //echo "File is not an image.";
    //$uploadOk = 0;
  //}
//}
if( is_dir($target_dir) === false )
{
    mkdir($target_dir, 0755, true);
    echo 'Create folder     ';
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_POST['image'];
    $path = $target_dir . '/' . $_POST['image_name'];
    
    $status = file_put_contents($path,base64_decode($image));
    if($status){
     echo "Successfully Uploaded";
    }else{
     echo "Upload failed";
    }
}