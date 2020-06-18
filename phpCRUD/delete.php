<?php
require_once "config.php";
$tb = $_GET["tablename"];
$delete = $_GET["id"];
$primary;
$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= '$db' AND TABLE_NAME = '$tb' AND CONSTRAINT_NAME = 'PRIMARY'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
   //echo $row['COLUMN_NAME']."<br>";
   $primary= $row['COLUMN_NAME'];
}
// sql to delete a record
$sql = "DELETE FROM $tb WHERE $primary= $delete";

if (mysqli_query($link, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($link);
}

mysqli_close($link);

header ("location: viewRecord.php?tablename=$tb"); 
?>