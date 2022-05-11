<?php
session_start();
$userName = "";
if(isset($_SESSION["userName"])) { //Already logged in
  $userName = $_SESSION["userName"]; //Use the session value
}
else {// Not logged in
  header("Location:index.php"); //Redirect to the login page
}
?>