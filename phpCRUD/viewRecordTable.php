<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico" />
<?php include "title.php";?>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="http://localhost/phpCRUD/style/index.css">
      <style>
 
   </style>
</head>

<body>
 <header><div>
  
  <?php include "h2.php";?></div>
</header>
<section align="center">
<article align="center">
<h3>View Record</h3>
<div class="form-group">
<?php
require_once "config.php";
$tb = $_GET["tablename"];
$ID = $_GET["id"];
$primary;
$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= '$db' AND TABLE_NAME = '$tb' AND CONSTRAINT_NAME = 'PRIMARY'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
   //echo $row['COLUMN_NAME']."<br>";
   $primary= $row['COLUMN_NAME'];
}
//echo $tb;
//echo $ID;
$arrayList = array();
$a = "";
//$sql = "SELECT * FROM $tb WHERE ID=$ID";
$show = mysqli_query($link, "SHOW COLUMNS FROM ".$tb);
if (!$show) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysqli_num_rows($show) > 0) {
	    while ($row = mysqli_fetch_assoc($show)) {
			//echo $row['Field']."  ";
		$a = $row['Field'];
		array_push($arrayList,$a);
		}
}
//print_r($arrayList);
$sql = "SELECT * FROM $tb WHERE $primary=$ID";
 if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
							echo "<table align='center'>";
                                while($row = mysqli_fetch_array($result)){
									foreach ($arrayList as $key => $a) {
									//echo $row[$a];
									echo "<tr><td><label><b>".$a."</b></label></td><td>".$row[$a]."</tr>" ;
									}
 }}}
 echo "</table>";
?>
<?php echo "<a href='viewRecord.php?ID=". $row['ID'] ."&&tablename=" . $tb."' title='View Record' data-toggle='tooltip' class='w3-button'>Back</a>" ?>
</article></section>
</body>
</html>