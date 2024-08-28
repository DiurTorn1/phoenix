<?php

//$servername = "localhost";
//$username = "diur_admin";
//$password = "%v~kfAt5W#d82sNCWZiF";
//$dbname = "phoenix_fun";


$host = 'localhost';
$username = 'diur_admin';
$password = '%v~kfAt5W#d82sNCWZiF';
$database = 'phoenix_fun';

$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
} else {
    echo "test";
}

// Prepare the INSERT query
$query = "INSERT INTO products(name, detail, datetime_start, datetime_stop, type, country, valute, period_job, prob_period, prob_price, datetime_start_sell, price, old_price, datetime_start_access, datetime_stop_access, datetime_stop_sell, img_main, img_banner, img_video_promo, video_promo) VALUES ('name', 'detail', 'state', 'sell_all', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'type', 'country', 'valute', 'period_job', 'prob_period', 'prob_price', '2024-08-28 15:37:32', '120', '100', '2024-08-28 15:37:32', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'img_main', 'img_banner', 'img_video_promo', 'video_promo')";

// Execute the query
$result = mysqli_query($conn, $query);

// Check for success or error
//if ($result) {
    //echo "Data inserted successfully!";
//} else {
    //echo "Error: " . mysqli_error($conn);
//}

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
//}

//$sql = "INSERT INTO `products`(`id`, `name`, `detail`, `datetime_start`, `datetime_stop`, `type`, `country`, `valute`, `period_job`, `prob_period`, `prob_price`, `datetime_start_sell`, `price`, `old_price`, `datetime_start_access`, `datetime_stop_access`, `datetime_stop_sell`, `img_main`, `img_banner`, `img_video_promo`, `video_promo`) VALUES ('name', 'detail', 'state', 'sell_all', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'type', 'country', 'valute', 'period_job', 'prob_period', 'prob_price', '2024-08-28 15:37:32', '120', '100', '2024-08-28 15:37:32', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'img_main', 'img_banner', 'img_video_promo', 'video_promo')";
//        VALUES ('name', 'detail', 'state', 'sell_all', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'type', 'country', 'valute', 'period_job', 'prob_period', 'prob_price',
//        '2024-08-28 15:37:32', '120', '100', '2024-08-28 15:37:32', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'img_main', 'img_banner',
//                            'img_video_promo', 'video_promo')";

//if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
//} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
//}

//$conn->close();
mysqli_close($conn);
//echo "test";