<?php
require "config_bd.php";

$sql = "SELECT `id`, `sity`, `zal`, `key_stream`, `create_at` FROM `entrypoints` WHERE 100";

$result = $conn->query($sql);
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);

$conn->close();
?>