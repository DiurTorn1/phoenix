<?php
require "config_bd.php";

$sql = "DELETE FROM `presell_user` WHERE id=" . $_POST['id'];


if ($conn->query($sql) === TRUE) {
  echo "Delete product: " . $_POST['id'];
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}
$conn->close();
?>