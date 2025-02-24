<?php
require "config_bd.php";

$sql = "INSERT INTO `subscribe_line`(`id_sell`, `id_prod`, `status`, `time_end`, `create_at`) VALUES ('". $_POST['id_sell'] ."','". $_POST['id_prod'] ."','". $_POST['status'] ."','". $_POST['time_end'] ."','". $_POST['create_at'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>