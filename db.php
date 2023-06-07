<?php
$server_name = $_SERVER['RDS_HOSTNAME'];
$user_name = $_SERVER['RDS_USERNAME'];
$password = $_SERVER['RDS_PASSWORD'];
$dbname = $_SERVER['RDS_DB_NAME'];
$dbport = $_SERVER['RDS_PORT'];

$connection = mysqli_connect($server_name, $user_name, $password, $dbname, $dbport);

if (!$connection) {
  die("Failed ". mysqli_connect_error());
}

?>
