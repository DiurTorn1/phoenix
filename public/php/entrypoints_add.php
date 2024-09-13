<?php

require "config_bd.php";
$sql = "INSERT INTO `entrypoints`(`sity`, `zal`, `key_stream`, `create_at`) VALUES ('". $_POST['sity_entrypoints'] ."','". $_POST['zal_entrypoints'] ."','". $_POST['key_entrypoints'] ."','". $_POST['create_at'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();