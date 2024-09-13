<?php

require "config_bd.php";
$sql = "INSERT INTO `entrypoints_stream_perrmissions`(`stream`, `entrypoints`, `create_at`) VALUES ('". $_POST['name_stream'] ."','". $_POST['name_entrypoints'] ."','". $_POST['create_at'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();