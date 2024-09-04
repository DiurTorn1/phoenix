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

$sql = "SELECT * FROM `products` WHERE id=".$_POST['id'];


if ($conn->query($sql) === TRUE) {
  echo $conn->query($sql);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>