<?php
//Linking the configuration file
require 'config.php';
$sql = "select ID, Name from myTable";
$result = $con->query($sql);
if($result->num_rows > 0){
  //read data
  while($row = $result->fetch_assoc()){
    //Read and utilize the row data
    echo $row["ID"]. " – " . $row["Name"] . "<BR />";
  }
}
else
{
  echo "no results";
}

$con->close();
?>