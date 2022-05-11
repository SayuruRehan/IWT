<?php

require 'configure.php';

$id = $_GET['id'];
$code = $_POST["ItemCode"];
$name = $_POST["ItemName"];
$desc = $_POST["Description"];
$price = $_POST["Price"];
$qty = $_POST["Quantity"];

$sql = "UPDATE item SET Item_name = '$name', Item_description = '$desc', Price = '$price', Quantity = '$qty', Item_Code = '$code' WHERE Item_id = $id";

if($conn->query($sql)){
  echo "<script> alert('Records updated successfully!!!')</script>";
  header("location: index.php");
}
else{
  echo "<script> alert('ERROR: Could not execute the query!!!')</script>";
  echo $sql;
}

?>