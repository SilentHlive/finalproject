<?php
require_once "config.php";
$tb = $_GET["tablename"];


// sql to delete a record
$sql = "DROP TABLE $tb";

if (mysqli_query($link, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($link);
}

mysqli_close($link);

header ("location: viewTable.php"); 
?>