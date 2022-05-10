<?php
$name="Sayuru";
echo $name;

echo "<br>";

define("institute_name", "SLIIT");
echo institute_name;

echo "<br>";

//conditional statement
$mark=40;

if($mark >= 75){
  $status='A';
}
else if($mark >= 65){
  $status='B';
}
else if($mark >- 45){
  $status='C';
}
else{
  $status='F';
}

echo "Grade: ".$status."<br>";
?>