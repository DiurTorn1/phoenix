<?php
require "config_bd.php";
$veri_at = NULL;

$sql = "UPDATE `users` SET `password`='". $_POST['pass'] ."' WHERE email='". $_POST['email'] ."'";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>