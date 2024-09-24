<?php
require "config_bd.php";

$sql = "DELETE FROM `stream_public_permission` WHERE name_stream='" . $_POST['name_stream'] . "'";


if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
?>