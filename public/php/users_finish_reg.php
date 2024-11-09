<?php
require "config_bd.php";
$veri_at = NULL;

$sql = "INSERT INTO `users`(`name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('". $_POST['name'] ."','". $_POST['email'] ."',". $veri_at .",'". $_POST['password'] ."','',". $veri_at .",". $veri_at .")";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>