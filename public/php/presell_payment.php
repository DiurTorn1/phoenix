<?php
require "config_bd.php";

$sql = "INSERT INTO `presell_user`(`ip_port`, `mail`, `name_product`, `price`, `id_product`, `created_at`, `status`) VALUES 
        ('". $_POST['ip_port'] ."','". $_POST['mail'] ."','". $_POST['name_product'] ."','". $_POST['price'] ."','". $_POST['id_product'] ."','". $_POST['created_at'] ."','". $_POST['status'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "OK";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>