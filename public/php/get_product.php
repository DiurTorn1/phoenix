<?php
require "config_bd.php";

$sql = "SELECT `id`, `name`, `detail`, `datetime_start`, `datetime_stop`, `type`, `country`, `valute`, `period_job`, `prob_period`, `prob_price`, `datetime_start_sell`, `price`, `old_price`, `datetime_start_access`, `datetime_stop_access`, `datetime_stop_sell`, `img_main`, `img_banner`, `img_video_promo`, `video_promo`, `created_at` FROM `products` WHERE 1000";

$result = $conn->query($sql);
//$row = $result->fetch_row();
//while ($row = $result->fetch_array(MYSQLI_BOTH)) {
    // Look inside $row here, do what you want with it.
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