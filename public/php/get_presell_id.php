<?php
require "config_bd.php";

$sql = "SELECT `id`, `ip_port`, `mail`, `name_product`, `price`, `id_product`, `created_at`, `status` FROM `presell_user` WHERE id=".$_POST['id'];

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);

$conn->close();
?>