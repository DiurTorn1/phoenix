<?php
require "config_bd.php";

$sql = "SELECT `id`, `ip_port`, `mail`, `name_product`, `price`, `id_product`, `created_at`, `status` FROM `presell_user` WHERE 1000";

$result = $conn->query($sql);
//$row = $result->fetch_row();
//while ($row = $result->fetch_array(MYSQLI_BOTH)) {
    // Look inside $row here, do what you want with it. SELECT `id`, `name`, `promo-company`, `code`, `limit-code`, `sale-pers`, `sale-sum`, `product`, `datetime-start`, `datetime-stop`, `datetime-at` FROM `promocode` WHERE 1
    //array_push($row,$row);
//}
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);//[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>