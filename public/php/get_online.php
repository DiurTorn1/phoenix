<?php
require "config_bd.php";

$sql = "SELECT `id`, `name`, `status`, `updated_at`, `create_at` FROM `status_commentator_online` WHERE status='".$_POST['status']."'";

$result = $conn->query($sql);
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);

$conn->close();
?>