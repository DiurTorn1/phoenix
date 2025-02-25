<?php
require "config_bd.php";

$sql = "SELECT `id`, `user_email`, `id_sell`, `period`, `create_at` FROM `all_subscribe` WHERE id_sell=".$_POST['id_sell'];

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);

$conn->close();
?>