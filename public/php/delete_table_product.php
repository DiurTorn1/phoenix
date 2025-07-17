<?php
require "config_bd.php";

$sql = "DELETE FROM `". $_POST['table'] ."` WHERE id_stream ='". $_POST['id_stream'] ."'";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>