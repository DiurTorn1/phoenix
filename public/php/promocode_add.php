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

$sql = "INSERT INTO `promocode`(`name`, `promo-company`, `code`, `limit-code`, `sale-pers`, `sale-sum`, `product`, `datetime-start`, `datetime-stop`, `datetime-at`) 
            VALUES ('". $_POST['title'] ."','". $_POST['promo_company'] ."','". $_POST['code_promocode'] ."','". $_POST['limit_promocode'] ."','". $_POST['sale_in_pers'] ."',
            '". $_POST['sum_sale'] ."','". $_POST['product_promocode'] ."','". $_POST['res_datetime_start'] ."','". $_POST['res_datetime_stop'] ."','". $_POST['create_at'] ."')";

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