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

//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";

//if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
//} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
//}

$conn->close();
echo "test";