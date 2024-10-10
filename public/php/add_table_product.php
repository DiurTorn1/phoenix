<?php
require "config_bd.php";

$sql = "INSERT INTO `". $_POST['table'] ."`(`id_stream`, `reg_date`) VALUES ('". $_POST['id_stream'] ."','". $_POST['reg_date'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>