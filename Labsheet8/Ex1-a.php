<?php

require 'configure.php';

$code = $_POST["ItemCode"];
$name = $_POST["ItemName"];
$desc = $_POST["Description"];
$price = $_POST["Price"];
$qty = $_POST["Quantity"];

$sql = "INSERT INTO item (Item_name, Item_description, Price, Quantity, Item_Code) VALUES ('$name', '$desc', '$price', '$qty', '$code')";

if($conn->query($sql)){
  echo "<script> alert('records added successfully!!!')</script>";
}
else{
  echo "<script> alert('ERROR: Could not be able to execute the query!!!')</script>";
  echo $sql;
}

?>