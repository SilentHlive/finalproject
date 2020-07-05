<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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

</head>

<body>
<header><div>
  
  <?php include "h2.php";?></div>
</header>
<section align="center">
<article align="center">
<?php
// Include config file
require_once "config.php";
  $tb = $_GET["tablename"];
  $view = $_GET["id"];
  $primary;
$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= '$db' AND TABLE_NAME = '$tb' AND CONSTRAINT_NAME = 'PRIMARY'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
   //echo $row['COLUMN_NAME']."<br>";
   $primary= $row['COLUMN_NAME'];
}
  //echo $tb;
  //echo $delete;
 // sql to delete a record
$sql = "SELECT * FROM $tb WHERE $primary =$view";
$result = mysqli_query($link, $sql);
echo "<br><p><b>Are you sure you want to delete this record?</b></p><br>";
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
$sql = "SELECT * FROM $tb WHERE $primary=$view";
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
echo "<a href='delete.php?id=".$view."&&tablename=".$tb."' class='w3-button'>Yes</a>";
echo " <a href='viewRecord.php?tablename=" . $tb."' class='w3-button'>No</a>";
                        


/*header ("location: view.php");
*/
mysqli_close($link);

?>              
                  </article></section>
</body>
</html>