<?php
$host = 'localhost'; // Database host
$db = 'trafic'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password

$conn = mysqli_connect($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>