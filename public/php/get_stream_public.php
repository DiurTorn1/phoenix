<?php
require "config_bd.php";

$sql = "SELECT `id`, `name_stream`, `type`, `create_at` FROM `stream_public_permission` WHERE name_stream='".$_POST['name_stream']."'";

$result = $conn->query($sql);
$row = $result->fetch_row();
//while ($row = $result->fetch_array(MYSQLI_BOTH)) {
    // Look inside $row here, do what you want with it.
    //array_push($row,$row);
//}
//$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($row);//[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
?>