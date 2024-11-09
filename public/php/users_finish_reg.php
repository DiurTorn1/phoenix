<?php
require "config_bd.php";
$veri_at = NULL;

$sql = "INSERT INTO `users`(`name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('xxx','xxx@mail@ru','". $veri_at ."','3030','','". $veri_at ."','". $veri_at ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>