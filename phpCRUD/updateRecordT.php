<?php 
require_once "config.php";
$primary; $tb = $_GET["tablename"];
$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= '$db' AND TABLE_NAME = '$tb' AND CONSTRAINT_NAME = 'PRIMARY'";
$result = mysqli_query($link,$sql);while($row = mysqli_fetch_array($result)){//echo $row["COLUMN_NAME"]."<br>";
$primary= $row['COLUMN_NAME'];}
if($_SERVER["REQUEST_METHOD"] == "POST"){$name= $_POST["name"];
if(empty($name)){echo "empty";}
$sql = "UPDATE inventory SET name= '$name' WHERE $primary = '1'";
if (mysqli_query($link, $sql)) {
echo "New record created successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}

$quantity= $_POST["quantity"];
if(empty($quantity)){echo "empty";}
$sql = "UPDATE inventory SET quantity= '$quantity' WHERE $primary = '1'";
if (mysqli_query($link, $sql)) {
echo "New record created successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}


header ("location: viewRecord.php?tablename=inventory");
}mysqli_close($link);
?>