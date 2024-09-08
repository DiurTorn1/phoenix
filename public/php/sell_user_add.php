<?php

$servername = "localhost";
$username = "diur_admin";
$password = "%v~kfAt5W#d82sNCWZiF";
$dbname = "phoenix_fun";

//echo $_POST['id_product'] . "  //  " .$_POST['type_product'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);//res_parse_stop_access
}

$sql = "INSERT INTO `sell_users_permission`(`product_id`, `user_email`, `create_at`, `type_sell`) VALUES ('". $_POST['product_global'] ."','". $_POST['user_global'] ."', '2024-08-28 15:37:32', '')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();