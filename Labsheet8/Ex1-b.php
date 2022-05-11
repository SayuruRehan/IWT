<?php

$sql = "SELECT * FROM item";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
    {
      echo "<tr>";
      echo "<td>" .$row["Item_name"]. "<?td>";
      echo "<td>";
      echo "<ul type = 'square'>";
      echo "<li>Item Code: ". $row["Item_code"]. "</li>";
      echo "<li>Description: ". $row["Item_description"]. "</li>"; 
      echo "<li>Price: ". $row["Price"]. "</li>";
      echo "<li>Quantity: ". $row["Quantity"]. "</li>";
      echo "</ul>";
      echo "</td>";
      echo "</tr>";      
    }
}
else
{
  echo "No Results";
}
?> 