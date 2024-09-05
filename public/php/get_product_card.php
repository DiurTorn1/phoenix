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

//$sql = "SELECT * FROM `products` WHERE id=28";//.$_POST['id'];

//echo $conn->query($sql);
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

// проверка и получение id из строки запроса
if (!isset($_POST['id'])) {
  die(http_response_code(404));
}

$id = $_POST['id']; 
// проверка на число
if (!ctype_digit($id)) {
  die(http_response_code(400));
}

$sql = "SELECT * FROM `products` WHERE id=?"; 
$result = $conn->execute_query($sql, [$id]); 
$row = $result->fetch_assoc();

echo $row;

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>