<?php
require "config_bd.php";

$sql = "SELECT `id`, `email`, `code`, `create_at` FROM `registration_prepost` WHERE email='".$_POST['email']."'";

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);//$row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>