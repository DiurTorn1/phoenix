<?php
require "config_bd.php";

$sql = "SELECT `id`, `stream`, `entrypoints`, `create_at` FROM `entrypoints_stream_perrmissions` WHERE stream='".$_POST['stream']."'";

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);

$conn->close();
?>