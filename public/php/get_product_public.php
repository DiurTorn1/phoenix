<?php
require "config_bd.php";

$sql = "SELECT `id`, `id_product`, `type`, `create_at` FROM `product_public_permission` WHERE id_product=".$_POST['id'];

$result = $conn->query($sql);
$row = $result->fetch_row();
echo $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>