<?php
require "config_bd.php";

$sql = "SELECT `id`, `product_id`, `user_email`, `create_at`, `type_sell` FROM `sell_users_permission` WHERE user_email='".$_POST['user_email']."'";

//$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3] . "&" . $row[4];
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