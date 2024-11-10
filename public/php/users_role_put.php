<?php
require "config_bd.php";
$veri_at = 'App\\Models\\User';

$sql = "INSERT INTO `model_has_roles`(`model_id`, `created_at`, `updated_at`, `role_id`, `model_type`) VALUES (". $_POST['model_id'] .", NULL, NULL, 3,'App\\\\Models\\\\User')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>