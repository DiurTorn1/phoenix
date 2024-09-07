<?php
require "config_bd.php";

$sql = "SELECT `id`, `name`, `detail`, `datetime_start`, `datetime_stop`, `type`, `country`, `valute`, `period_job`, `prob_period`, `prob_price`, `datetime_start_sell`, `price`, `old_price`, `datetime_start_access`, `datetime_stop_access`, `datetime_stop_sell`, `img_main`, `img_banner`, `img_video_promo`, `video_promo`, `created_at` FROM `products` WHERE name=".$_POST['name'];

$result = $conn->query($sql);
$row = $result->fetch_row();
echo $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3] . "&" . $row[4] . "&" . $row[5] . "&" . $row[6] . "&" . $row[7] . "&" . $row[8] . "&" . $row[9] . "&" 
    . $row[10] . "&" . $row[11] . "&" . $row[12] . "&" . $row[13] . "&" . $row[14] . "&" . $row[15] . "&" . $row[16] . "&" . $row[17] . "&" . $row[18] . "&" . $row[19] . "&" 
    . $row[20] . "&" . $row[21];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>