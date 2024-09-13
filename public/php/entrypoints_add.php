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

$sql = "INSERT INTO `entrypoints`(`sity`, `zal`, `key_stream`, `create_at`) VALUES ('". $_POST['sity_entrypoints'] ."','". $_POST['zal_entrypoints'] ."','". $_POST['key_entrypoints'] ."','2024-09-13 11:36:32')";

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