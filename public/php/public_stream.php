<?php

$servername = "localhost";
$username = "diur_admin";
$password = "%v~kfAt5W#d82sNCWZiF";
$dbname = "phoenix_fun";

//echo $_POST['name_stream'] . "  //  " .$_POST['type_stream'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);//res_parse_stop_access
}

$sql = "INSERT INTO `stream_public_permission`(`name_stream`, `type`, `create_at`) VALUES ('". $_POST['name_stream'] ."','". $_POST['type_stream'] ."','2024-08-28 15:37:32')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();