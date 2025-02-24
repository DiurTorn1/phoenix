<?php
require "config_bd.php";

$sql = "INSERT INTO `all_subscribe`(`user_email`, `id_sell`, `period`, `create_at`) VALUES ('". $_POST['email'] ."','". $_POST['id_sell'] ."','". $_POST['period'] ."','". $_POST['create_at'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>