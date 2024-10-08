<?php
require "config_bd.php";

$sql = "DELETE FROM `product_public_permission` WHERE id_product='" . $_POST['id_product'] . "'";


if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
?>