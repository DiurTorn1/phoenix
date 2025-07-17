<?php
require "config_bd.php";

$sql = "INSERT INTO `status_commentator_online`(`name`, `status`, `updated_at`, `create_at`) VALUES ('". $_POST['name'] ."','". $_POST['status'] ."','". $_POST['updated_at'] ."','". $_POST['create_at'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>