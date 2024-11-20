<?php
require "config_bd.php";

$sql = "DELETE FROM `video_public_permission` WHERE name='" . $_POST['name'] . "'";


if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
?>