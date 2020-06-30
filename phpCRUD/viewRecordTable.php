<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico" />
<?php include "title.php";?>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <style>
	  body {
  background-color: #F3D250;
}
	  header {
   text-align: center;
   padding: 20px;
   color: white;}
 div h2 {
 font-family:Palatino Linotype;
font-size: 70px;
  margin-top:80px;
  text-align: center;
  padding: 20px;
  color: white;
}
article {
	border-style: double;
	border-radius: 8px;
	float: center;
	margin-right : 200px;
	margin-left : 200px;
	background-color:#F66;
	height: auto; /* only for demonstration, should be removed */
	
}
/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

.w3-button {width:150px;
height: 40px;
margin-top: 50px;
margin-bottom: 20px;
box-shadow: 0px 10px 14px -7px #276873;
background:linear-gradient(to bottom, #F78888 5%, #Ececec 200%);
background-color:#F78888;
border-radius:8px;
display:inline-block;
cursor:pointer;
color:#ffffff;
font-family:Arial;
font-size:15px;
text-decoration:none;
text-shadow:0px 1px 0px #3d768a;
}
.w3-button:hover {
	background:linear-gradient(to bottom, #5da2d5 5%, #90CCf4 100%);
	background-color:#5da2d5;
}
.w3-button:active {
	position:relative;
	top:1px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  font-family: "Times New Roman", Times, serif;
font-size: 20px;
padding-left:10px;
padding-right:10px;
}
input {
	margin-bottom:4px;
	font-family: "Times New Roman", Times, serif;
font-size: 20px;}
   
label {
    padding-left:5px;
    width:125px;
    text-transform: uppercase;
    display:inline-block;
	text-align: left ;
	font-family: "Times New Roman", Times, serif;
font-size: 20px;

}   
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