<?php
$servername = "localhost";
$username = "diur_admin";
$password = "%v~kfAt5W#d82sNCWZiF";
$dbname = "phoenix_fun";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);//res_parse_stop_access
}

$sql = "DELETE FROM `products` WHERE id=" . $_POST['id'];


//if ($conn->query($sql) === TRUE) {
 // echo "Delete product: " . $_POST['id'];
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}
$result=$conn->query($sql);
  while($row = mysql_fetch_array($result)){
    $id=$row['id'];
    $name=$row['name'];
    $detail=$row['detail'];
   $datetime_start=$row['datetime_start'];
    $datetime_stop=$row['datetime_stop'];
 
    echo "$id - $name - $detail - $datetime_start - $population";
}
$conn->close();

//`id`, `name`, `detail`, `datetime_start`, `datetime_stop`, `type`, `country`, `valute`, `period_job`, `prob_period`, `prob_price`, `datetime_start_sell`, `price`, `old_price`, `datetime_start_access`, `datetime_stop_access`, `datetime_stop_sell`, `img_main`, `img_banner`, `img_video_promo`, `video_promo`, `created_at`
?>