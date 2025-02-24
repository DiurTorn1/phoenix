<?php
require "config_bd.php";

$sql = "SELECT `id`, `id_sell`, `id_prod`, `status`, `time_end`, `create_at` FROM `subscribe_line` WHERE time_end='".$_POST['time_end']."'";

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