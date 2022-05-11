<?php
$id = $_GET['id'];
$sql = "SELECT * FROM Item WHERE Item_id=$id";
$result = $conn->query($sql);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    $code = $row["Item_code"];
    $name = $row["Item_name"];
    $desc = $row["Item_description"];
    $price = $row["Price"];
    $qty = $row["Quantity"];    
  }
}
?>

<form method="post" action="submitUpdateItems.php?id=<?php echo $id;?>">
  Item code: <br>
  <input type="text" name="ItemCode" value="<?php echo $code;?>"/><br>
  Item Name: <br>
  <input type="text" name="ItemName" value="<?php echo $name;?>"/><br>
  Description: <br>
  <textarea name="Description" rows=6><?php echo $desc;?>"/><br>
  Price: <br>
  <input type="text" name="Price" value="<?php echo $price;?>"/><br>
  Quantity: <br>
  <input type="number" name="Quantity" value="<?php echo $qty;?>"/><br><br>

  <input type="submit" value="Update">
</form>