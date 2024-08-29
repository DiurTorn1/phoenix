<?php

$servername = "localhost";
$username = "diur_admin";
$password = "%v~kfAt5W#d82sNCWZiF";
$dbname = "phoenix_fun";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);//res_parse_stop_sell_bilet
}

$sql = "INSERT INTO `products`(`name`, `detail`, `datetime_start`, `datetime_stop`, `type`, `country`, `valute`, `period_job`,
                    `prob_period`, `prob_price`, `datetime_start_sell`, `price`, `old_price`, `datetime_start_access`, `datetime_stop_access`, 
                    `datetime_stop_sell`, `img_main`, `img_banner`, `img_video_promo`, `video_promo`, `created_at`) VALUES ('". $_POST['head_name'] ."','". $_POST['detail_save'] ."',
                    '". $_POST['start_access_time'] ." 00:00:00','". $_POST['stop_access_time'] ." 00:00:00', '". $_POST['type_save'] ."','". $_POST['region_select_bilet'] ."','". $_POST['valute_db'] ."',
                    '". $_POST['days_job_bilet'] ."','1','1','". $_POST['res_date_start_sell'] ."','". $_POST['int_price_bilet'] ."','". $_POST['int_old_price_bilet'] ."','". $_POST['res_parse_start_access'] ."',
                    '". $_POST['res_parse_stop_access'] ."','". $_POST['res_parse_stop_sell_bilet'] ."','[value-18]','[value-19]','[value-20]','[value-21]', '". $_POST['start_access_time'] ." 00:00:00');";
//        VALUES ('name', 'detail', 'state', 'sell_all', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'type', 'country', 'valute', 'period_job', 'prob_period', 'prob_price',
//        '2024-08-28 15:37:32', '120', '100', '2024-08-28 15:37:32', '2024-08-28 15:37:32', '2024-08-28 15:37:32', 'img_main', 'img_banner',
//                            'img_video_promo', 'video_promo')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//$conn->close();
//$sql = "SELECT id, name, detail FROM products";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["detail"]. "<br>";
    //}
//} else {
    //echo "0 results";
//}
$conn->close();
//echo "test";