<?php
require "config_bd.php";

$sql = "INSERT INTO `users`(`name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('". $_POST['name'] ."','". $_POST['email'] ."','". $_POST['email_verified_at'] ."','". $_POST['password'] ."','". $_POST['remember_token'] ."','". $_POST['created_at'] ."','". $_POST['updated_at'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>