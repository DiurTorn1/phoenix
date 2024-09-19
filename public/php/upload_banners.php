<?php
$target_dir = "./../img/banners";
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
    mkdir($target_dir, 0777, true);
    echo 'Create folder     ';
}
//$name = $target_dir . $_FILES[$_POST['image']][$_POST['image_name']];
//move_uploaded_file($_FILES[$_POST['image']]["tmp_name.jpg"], $name);
//echo "Файл загружен";
$uploadfile = $target_dir . basename($_FILES[$_POST['image']][$_POST['image_name']]);

    //echo "<p>";

    if (move_uploaded_file($_FILES[$_POST['image']]['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Upload failed    ";
    }

    //echo "</p>";
    //echo '<pre>';
    echo 'Here is some more debugging info:';
    print_r($_FILES);
    //print "</pre>";
?>