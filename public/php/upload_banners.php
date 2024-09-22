<?php
$target_dir = $_SERVER['DOCUMENT_ROOT']."/img/banners";
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

//echo $_POST['image_name'] . '   ---   ' . $_POST['image'];
//$name = $target_dir . $_FILES[$_POST['image']][$_POST['image_name']];
//move_uploaded_file($_FILES[$_POST['image']]["tmp_name.jpg"], $name);
//echo "Файл загружен";
//$uploadfile = $target_dir . basename($_FILES[$_POST['image']][$_POST['image_name']]);

    //echo "<p>";

    //if (move_uploaded_file($_FILES[$_POST['image']]['tmp_name'], $uploadfile)) {
        //echo "File is valid, and was successfully uploaded.\n";
    //} else {
        //echo "Upload failed    ";
    //}

    //echo "</p>";
    //echo '<pre>';
    //echo 'Here is some more debugging info:';
    //print_r($_FILES);
    //print "</pre>";

    /*if($_FILES['file']['name'] != ''){
        $test = explode('.', $_FILES['file']['name']);
        $extension = end($test);    
        $name = rand(100,999).'.'.$extension;
    
        $location = $target_dir . $name;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Upload failed    ";
        }
    
        //echo '<img src="'.$location.'" height="100" width="100" />';
    }*/
    /*echo $_FILES['file']['name'];
    $location = $target_dir . $name;
    $data = array();
    //check with your logic
    if (isset($_FILES)) {
        $error = false;
        $files = array();

        $uploaddir = $target_dir;
        foreach ($_FILES as $file) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $_FILES['file']['name'])) {
                $files[] = $uploaddir . $file['name'];
            } else {
                $error = true;
            }
        }
        $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
    } else {
        $data = array('success' => 'NO FILES ARE SENT','formData' => $_REQUEST);
    }*/

    //echo json_encode($data);
?>