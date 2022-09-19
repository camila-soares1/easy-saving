<?php




//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

$servername = "estga-dev.clients.ua.pt";
$username = "ptaw-2021-gr2";
$password = "8&9Ne?4zKF";
$database ="ptaw-2021-gr2";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
//echo "Connected successfully";


?>