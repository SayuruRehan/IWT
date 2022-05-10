<?php
define("Company name", "Shopping cart");
echo "<h2>About" .companyName. "</h2><br>";

echo "<h4>This page is mainly about the" .companyName. "website</h4><br>";

$sold=75;
$total=100;

echo "The shopping cart<br>";
echo "Number of sold items: " .$sold. "<br>";
echo "Number of total items: " .$total. "<br>";

echo "<h2><table border='1' width='75%'><tr><td>Number of Sold Items</td><td>" .$sold. "</td></tr><tr><td>Number of Total items</td><td>" .$total. "</td></tr></table></h2>";

function findPercentage(){
  $GLOBALS('percentage')=($GLOBALS['sold'] / $GLOBALS['toal']) = 100;
}

findPercentage();
echo "<h3>Percentage of sold items: " .$percentage. "%</h3><br>";

$today = "Today is " .date("1");
echo "<h2>" .$today. "</h2><br>";

//getting the date format
$c = date("Y-M-D");

//assign the current date
$currentDay = date_create($c);

//assign the ship date
$shipDay = date_create("2019-09-21");

//get the difference between two dates
$diff = date_diff($currentDay, $shipDay);

//printing output
echo "<h4>Number of days remaining for shipping - " .$diff->format("%R%a days"). "<h4>";

//checking the status
if($diff->format("%R%a") > 0){
  $status = "To be shipped";
}
else{
  $status = "Shipped";
}

//print the output
echo "<h4><br>For " .$c. "24 items have " .$status. "</h4>";

function loopUsingFor(){
  $items = array("Iphone XS"=>"27", "Iphone X"=>"30", "Iphone XS Max"=>"12", "Iphone XR"=>"29");

  $keys = array_keys($items);

  echo "<h2>Output using For loop</br></h2>";

  echo "<h2><table border='2' width='75%'><tr><th><center>Item Name</center></th><th><center>Number of Items</center></th></tr>";

  for($x = 0; $x < count($keys); $x++){
    echo "<tr><td><center>" .$keys[$x] ."</center></td><td><center>". $items[$keys[$x]]. "</center></td></tr>";
  }

  echo "</table>";
}

loopUsingFor();

?>