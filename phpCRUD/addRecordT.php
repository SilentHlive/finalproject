<?php 
require_once "config.php";
$primary; $n; $next; $tb = $_GET["tablename"];
$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= '$db' AND TABLE_NAME = '$tb' AND CONSTRAINT_NAME = 'PRIMARY'";
$result = mysqli_query($link,$sql);while($row = mysqli_fetch_array($result)){//echo $row["COLUMN_NAME"]."<br>";
$primary= $row['COLUMN_NAME'];}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$id= $_POST["id"];
$n = $id;
//echo $n;
$name;
$name= $_POST["name"];
$email= $_POST["email"];
$phoneno= $_POST["phoneno"];
if(empty($n)){ echo "hello";
if(!empty($name)){echo $name;
$sql = "INSERT INTO staff (name) VALUES ('$name')";
if (mysqli_query($link, $sql)) {
echo "New record created successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}
$sql = "UPDATE staff SET name= '$name' WHERE name= '$name'";
if (mysqli_query($link, $sql)) {
echo "New record updated successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}
$sql = "UPDATE staff SET email= '$email' WHERE name= '$name'";
if (mysqli_query($link, $sql)) {
echo "New record updated successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}
$sql = "UPDATE staff SET phoneno= '$phoneno' WHERE name= '$name'";
if (mysqli_query($link, $sql)) {
echo "New record updated successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}
}}
else {echo "bye";
$sql = "INSERT INTO staff (id) VALUES ('$id')";
if (mysqli_query($link, $sql)) {
echo "New record created successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}
echo $n;
$sql = "UPDATE staff SET name= '$name' WHERE id= '$id'";
if (mysqli_query($link, $sql)) {
echo "New record updated successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}

$sql = "UPDATE staff SET email= '$email' WHERE id= '$id'";
if (mysqli_query($link, $sql)) {
echo "New record updated successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}

$sql = "UPDATE staff SET phoneno= '$phoneno' WHERE id= '$id'";
if (mysqli_query($link, $sql)) {
echo "New record updated successfully";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}

} }else echo "hello!!";
mysqli_close($link);

header ("location: viewRecord.php?tablename=staff");
?>