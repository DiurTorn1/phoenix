<?php
require "config_bd.php";

$sql = "UPDATE `subscribe_line` SET `status`='".$_POST['status']."' WHERE id_sell=".$_POST['id_sell'];

//$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
  echo "Error: " . $sql . "/" . $conn->error;
}

$conn->close();
    //echo "I get param1 = ".$_POST['id']; UPDATE `subscribe_line` SET `id`='[value-1]',`id_sell`='[value-2]',`id_prod`='[value-3]',`status`='[value-4]',`time_end`='[value-5]',`create_at`='[value-6]' WHERE
?>
