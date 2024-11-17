<?php
require "config_bd.php";

$sql = "SELECT `id`, `id_product`, `type`, `create_at`, `initial` FROM `product_public_permission` WHERE id_product='".$_POST['id']."'";

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);
?>