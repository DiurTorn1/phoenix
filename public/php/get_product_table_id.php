<?php
require "config_bd.php";

$sql = "SELECT `id`, `id_stream`, `reg_date` FROM `".$_POST['id_stream']."` WHERE id_stream=".$_POST['id_stream'];

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);
?>