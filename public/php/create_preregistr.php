<?php
require "config_bd.php";

$sql = "INSERT INTO `registration_prepost`(`email`, `code`, `create_at`) VALUES ('". $_POST['email'] ."','". $_POST['code'] ."','". $_POST['create_at'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>