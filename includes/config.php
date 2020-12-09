<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$db="erpdb";
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);


error_reporting(0);
define('DB_NAME', 'erpdb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
 
// Create connection
$db     =   new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}




define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','erpdb');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}



$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "erpdb"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>