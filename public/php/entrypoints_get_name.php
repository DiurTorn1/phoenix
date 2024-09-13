<?php
require "config_bd.php";

$sql = "SELECT `id`, `sity`, `zal`, `key_stream`, `create_at` FROM `entrypoints` WHERE sity='".$_POST['sity']."'";

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);

$conn->close();
?>