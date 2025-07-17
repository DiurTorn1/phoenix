<?php
require "config_bd.php";

$sql = "UPDATE `status_commentator_online` SET `status`='".$_POST['status']."' WHERE name='".$_POST['name']."'";

if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
?>