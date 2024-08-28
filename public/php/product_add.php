<?php

$servername = "localhost";
$username = "diur_admin";
$password = "%v~kfAt5W#d82sNCWZiF";
$dbname = "phoenix_fun";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

INSERT INTO `products`(`id`, `name`, `detail`, `datetime_start`, `datetime_stop`, `type`, `country`, `valute`, `period_job`, `prob_period`, `prob_price`, `datetime_start_sell`, `price`, `old_price`, `datetime_start_access`, `datetime_stop_access`, `datetime_stop_sell`, `img_main`, `img_banner`, `img_video_promo`, `video_promo`) VALUES ('name', 'detail', 'state', 'sell_all', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'type', 'country', 'valute', 'period_job', 'prob_period', 'prob_price', '2024-08-28 15:37:32', '120', '100', '2024-08-28 15:37:32', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'img_main', 'img_banner', 'img_video_promo', 'video_promo')
//        VALUES ('name', 'detail', 'state', 'sell_all', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'type', 'country', 'valute', 'period_job', 'prob_period', 'prob_price',
//        '2024-08-28 15:37:32', '120', '100', '2024-08-28 15:37:32', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'img_main', 'img_banner',
//                            'img_video_promo', 'video_promo')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo "test";