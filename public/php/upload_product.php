<?php
require "config_bd.php";

$sql = "UPDATE `products` SET `name`='".$_POST['name']."',`detail`='".$_POST['detail']."',`datetime_start`='".$_POST['datetime_start']."',`datetime_stop`='".$_POST['datetime_stop']."',
            `type`='".$_POST['type']."',`country`='".$_POST['country']."',`valute`='".$_POST['valute']."',`period_job`='".$_POST['period_job']."',`prob_period`='1',`prob_price`='1',
            `datetime_start_sell`='".$_POST['datetime_start_sell']."',`price`='".$_POST['price']."',`old_price`='".$_POST['old_price']."',`datetime_start_access`='".$_POST['datetime_start_access']."',`datetime_stop_access`='".$_POST['datetime_stop_access']."',
            `datetime_stop_sell`='".$_POST['datetime_stop_sell']."',`img_main`='".$_POST['img_main']."',`img_banner`='[value-19]',`img_video_promo`='[value-20]',`video_promo`='[value-21]' WHERE id =".$_POST['id'];

//$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>