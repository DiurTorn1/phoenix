<?php
require "config_bd.php";

$sql = "SELECT `id`, `id_product`, `type`, `create_at`, `initial` FROM `product_public_permission` WHERE 1";

$result = $conn->query($sql);
//$row = $result->fetch_row();
//while ($row = $result->fetch_array(MYSQLI_BOTH)) {
    // Look inside $row here, do what you want with it.
    //array_push($row,$row);
//}
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo var_dump($news_events);//[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
    //echo "I get param1 = ".$_POST['id'];
?>