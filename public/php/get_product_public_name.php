<?php
require "config_bd.php";

$sql = "SELECT `id`, `id_product`, `type`, `create_at`, `initial` FROM `product_public_permission` WHERE initial='".$_POST['initial']."'";

$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo json_encode($row);//$row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);
$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>