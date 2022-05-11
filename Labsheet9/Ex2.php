<?php

require 'configure.php';

$id = $_GET['id'];

$sql = "DELETE FROM item WHERE Item_id = $id";

if($conn->query($sql)){
  echo "<script> alert('Records deleted successfully!!!')</script>";
  header("location: index.php");
}
else{
  echo "<script> alert('ERROR: Could not execute the query!!!')</script>";
  //echo $sql;
}

?>