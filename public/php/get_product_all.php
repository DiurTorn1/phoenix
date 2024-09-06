<?php
require "config_bd.php";

$sql = "SELECT `id`, `id_product`, `type`, `create_at`, `initial` FROM `product_public_permission` WHERE 1";

$result = $conn->query($sql);
$row = $result->fetch_array();
echo var_dump($row);//[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>