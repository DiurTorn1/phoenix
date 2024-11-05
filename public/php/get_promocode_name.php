<?php
require "config_bd.php";

$sql = "SELECT `id`, `name`, `promo-company`, `code`, `limit-code`, `sale-pers`, `sale-sum`, `product`, `datetime-start`, `datetime-stop`, `datetime-at` FROM `promocode` WHERE code='".$_POST['name']."'";

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);//$row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>