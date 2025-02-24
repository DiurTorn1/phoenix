<?php
require "config_bd.php";

$sql = "CREATE TABLE ".$_POST['name']." (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_sell INT(6) NOT NULL,                     
    id_prod INT(6) NOT NULL,                     
    status VARCHAR(50) NOT NULL,                 
    time_end TIMESTAMP,                           
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
    
    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
?>