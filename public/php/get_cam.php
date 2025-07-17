<?php
require "config_bd.php";

$sql = "SELECT `id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at` FROM `users` WHERE email='".$_POST['email']."'";

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);

$conn->close();
?>