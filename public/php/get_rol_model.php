<?php
require "config_bd.php";

$sql = "SELECT `id`, `model_id`, `created_at`, `updated_at`, `role_id`, `model_type` FROM `model_has_roles` WHERE model_id=".$_POST['model_id'];

$result = $conn->query($sql);
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);

$conn->close();
?>