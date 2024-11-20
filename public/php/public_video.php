<?php
require "config_bd.php";

$sql = "INSERT INTO `video_public_permission`(`name`, `type`, `create_at`) VALUES ('". $_POST['name'] ."','". $_POST['type'] ."','2024-08-28 15:37:32')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();