<?Php
#### FOR SQLite Database ######
// This will create the database if not exists in the same location where the script is running.
// For a different location give the path details. 
//$my_conn = new PDO('sqlite:D:\\sqlite-data\\student.db');// different path
//$my_conn = new PDO('sqlite:'.dirname(__FILE__).'/student.db'); // same location
//$my_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
#### end of SQLite database connection #####


###### PHP PDO with MySQL ##### For php PDO use below lines ##
/*
$host_name = "localhost"; // or different host 
$database = "my_db";   // Change your database name
$username = "root";    // Your database user id 
$password = "password";// Your password

//////// Do not Edit below /////////
try {
$my_conn = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
*/
$servername = "localhost";
$username = "diur_admin";
$password = "%v~kfAt5W#d82sNCWZiF";
$dbname = "phoenix_fun";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);//res_parse_stop_access
}

echo "DBDBDB";
####### END of PHP PDO ######
?>