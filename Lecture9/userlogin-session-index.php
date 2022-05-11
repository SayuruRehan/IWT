<?php //TOP OF THE PAGE
session_start();
if(isset($_POST["txtName"])){
  if($_POST["txtName"]=="asd" && $_POST["txtPass"]=="123") {
    $_SESSION["userName"] = $_POST["txtName"];
  }
}
if(isset($_SESSION["userName"])) {
  header("Location:home.php");
}
?>