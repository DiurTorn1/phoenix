<?php
require "config_bd.php";

$sql = "SELECT `id`, `ip_port`, `mail`, `name_product`, `price`, `id_product`, `created_at`, `status` FROM `presell_user` WHERE status='".$_POST['status']."'";

$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo json_encode($row);//$row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];

$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);//[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>