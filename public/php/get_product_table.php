<?php
require "config_bd.php";

//$sql = "SELECT 'id', 'id_stream', 'reg_date' FROM ".$_POST['table']." WHERE id_stream='".$_POST['id_stream']."'";

//$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo json_encode($row);// $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3] . "&" . $row[4];
//if ($conn->query($sql) === TRUE) {
  //echo $conn->query($sql);   SELECT * FROM `ticket_49`
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

//$conn->close();
    //echo "I get param1 = ".$_POST['id'];
require "config_bd.php";

$sql = "SELECT * FROM ".$_POST['table'];
    
$result = $conn->query($sql);
$news_events = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($news_events);
$conn->close();
?>