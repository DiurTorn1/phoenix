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

$sql = "INSERT INTO `product_public_permission`(`id_product`, `type`, `create_at` , `initial`) VALUES ('". $_POST['id_product'] ."','". $_POST['type_product'] ."','". $_POST['datetime'] ."', '". $_POST['initial'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();