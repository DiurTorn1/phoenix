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


if ($conn->query($sql) === TRUE) {
  echo "Delete product: " . $_POST['id'];
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
//echo $_POST['id'];