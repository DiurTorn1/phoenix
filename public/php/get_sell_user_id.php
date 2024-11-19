<?php
require "config_bd.php";

$sql = "SELECT `id`, `product_id`, `user_email`, `create_at`, `type_sell` FROM `sell_users_permission` WHERE product_id=".$_POST['product_id'];

$result = $conn->query($sql);
$row = $result->fetch_row();
echo json_encode($row);// $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3] . "&" . $row[4];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>