<!DOCTYPE html>
<html lang="en">
<?php
 //echo $_GET["tablename"];
// Check existence of id parameter before processing further
if(isset($_GET["tablename"]) && !empty(trim($_GET["tablename"]))){
    // Include config file
    require_once "config.php";
  
   
 
}
?>
<head>
    <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico" />

<title>PHP CRUD GENERATOR</title>
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
  margin-top:5px;
  border: 1px solid black;
  border-collapse: collapse;
  margin-bottom: 10px;
  font-family: "Times New Roman", Times, serif;
font-size: 20px;
padding-left:10px;
padding-right:10px;
 text-transform: uppercase;
}
.title{
  font-family: "Times New Roman", Times, serif;
font-size: 20px;
}
   </style>
</head>
<body>
<header><div>
  
  <h2 align="center"> PHP CRUD GENERATOR</h2></div>
</header>
<section align="center">
<article align="center">
<div class="title"><h3>View Record</h3>
	
	Table Name: <?php echo $_GET["tablename"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?> 

  <?php
  $tb = $_GET["tablename"];
 
   // Include config file
 require_once "config.php";
  $primary;
  $v;
$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= '$db' AND TABLE_NAME = '$tb' AND CONSTRAINT_NAME = 'PRIMARY'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
   //echo $row['COLUMN_NAME']."<br>";
   $primary= $row['COLUMN_NAME'];
}

 $arrayList = array();  
$a=""; 
echo "<a href='addRecord.php?tablename=". $tb."' title='Add Record' data-toggle='tooltip'><img src='icon/add.png' style='width:1.5%'></a></form>";
echo "<br></div>";
echo "<table class='table table-bordered table-striped' align='center'>";
echo "<thead>";	
$show = mysqli_query($link, "SHOW COLUMNS FROM ".$tb);
if (!$show) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysqli_num_rows($show) > 0) {
	    while ($row = mysqli_fetch_assoc($show)) {
        echo "<th>".$row['Field'];
		$a = $row['Field'];
		echo "</th>";
		array_push($arrayList,$a);
		}
}
//print_r($arrayList);
echo "<br>";
echo "<th>Action</th>";

echo "</thead>";
// Attempt select query execution
                    $sql = "SELECT * FROM $tb";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
						          echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
									echo "<tr>";
									foreach ($arrayList as $key => $a) {
								    //echo $a."  ";
									//echo $row[$a]."  ";
                                    //echo "<tr>";
									echo "<td>" . $row[$a]."</td>";
									if($a==$primary){
										$v=$row[$a];
									}
									}
									//echo "<br>";
                                        echo "<td>";
                                        echo "<a href='viewRecordTable.php?id=". $v."&&tablename=" . $tb."' title='View Record' data-toggle='tooltip'><img src='icon/read.png'  style='width:15%'></a>";
echo "&nbsp; &nbsp;";
echo "<a href='updateRecord.php?id=". $v."&&tablename=".$tb."' title='Update Record' data-toggle='tooltip'><img src='icon/edit.png'  style='width:15%'></a>";
echo "&nbsp; &nbsp;";
echo "<a href='deleteRecord.php?id=". $v."&&tablename=" . $tb."' title='Delete Record' data-toggle='tooltip'><img src='icon/delete.png'  style='width:15%'></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                             echo "</table>";
                    // Close connection
					
                    mysqli_close($link);
                    ?>
					
                    <a href="viewTable.php" class="w3-button">Back</a></article></section>
 

</body>
</html>