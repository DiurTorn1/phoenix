<?php
require "config_bd.php";

$sql = "SELECT `id`, `created_at`, `updated_at`, `name`, `guard_name` FROM `roles` WHERE name='comment'";

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