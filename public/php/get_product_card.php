<?php
require "config_bd.php";

$sql = "SELECT `id`, `name`, `detail`, `datetime_start`, `datetime_stop`, `type`, `country`, `valute`, `period_job`, `prob_period`, `prob_price`, `datetime_start_sell`, `price`, `old_price`, `datetime_start_access`, `datetime_stop_access`, `datetime_stop_sell`, `img_main`, `img_banner`, `img_video_promo`, `video_promo`, `created_at` FROM `products` WHERE id=".$_POST['id'];

$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo $row;
while($row = $result->fetch_row()){
    $id=$row['id'];
    $name=$row['name'];
    $detail=$row['detail'];
    $datetime_start=$row['datetime_start'];
    $datetime_stop=$row['datetime_stop'];

  echo "<p>$id - $name - $detail - $datetime_start - $datetime_stop</p>";
}
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>