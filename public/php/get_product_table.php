<?php
require "config_bd.php";

$sql = "SELECT 'id', 'id_stream', 'reg_date' FROM ".$_POST['table']." WHERE id_stream='".$_POST['id_stream']."'";

//$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo json_encode($row);// $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3] . "&" . $row[4];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

//$conn->close();
    //echo "I get param1 = ".$_POST['id'];
$result = $conn->query($sql);
//$row = $result->fetch_row();
//while ($row = $result->fetch_array(MYSQLI_BOTH)) {
    // Look inside $row here, do what you want with it.
    //array_push($row,$row);
//}
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);//[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

$conn->close();
?>