<?php
require "config_bd.php";

//$sql = "UPDATE `product_public_permission` SET `initial`='".$_POST['initial']."' WHERE id_product=".$_POST['id'];

//$result = $conn->query($sql);
//$row = $result->fetch_row();
//echo $row[0] . "&" . $row[1] . "&" . $row[2] . "&" . $row[3];
//if ($conn->query($sql) === TRUE) {
    //echo "OK";
//} else {
  //echo "Error: " . $sql . "/" . $conn->error;
//}

//$conn->close();
    //echo "I get param1 = ".$_POST['id'];
    // sql to create table
$sql = "DROP TABLE ".$_POST['name'];
    
    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
?>