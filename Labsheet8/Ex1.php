<?php
$servername = "localhost";
$username = "username";
$password = "password";
$db = "shoppingcart";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

echo "Connected successfully";

?>