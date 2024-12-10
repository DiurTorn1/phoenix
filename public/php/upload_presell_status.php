<?php
require "config_bd.php";

$sql = "UPDATE `presell_user` SET `status`='".$_POST['status']."' WHERE id=".$_POST['id'];

//$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>