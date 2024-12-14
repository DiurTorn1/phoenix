<?php
require "config_bd.php";

$sql = "DELETE FROM `sell_users_permission` WHERE create_at='" . $_POST['create_at']."'";


if ($conn->query($sql) === TRUE) {
  echo "Delete product: " . $_POST['create_at'];
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}
$conn->close();
?>