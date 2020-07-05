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
<h3>Update Record</h3><br>
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

//echo $ID;
$t=1;

$arrayList = array();
$a = "";
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
$myfile = fopen("updateRecordT.php", "w");
$txt = '<?php '."\n";
fwrite($myfile, $txt);
$txt = 'require_once "config.php";'."\n";
fwrite($myfile, $txt);
$txt = '$primary; $tb = $_GET["tablename"];'."\n";
fwrite($myfile, $txt);
$txt = '$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= \'$db\' AND TABLE_NAME = \'$tb\' AND CONSTRAINT_NAME = \'PRIMARY\'";'."\n";
fwrite($myfile, $txt);
$txt='$result = mysqli_query($link,$sql);while($row = mysqli_fetch_array($result)){//echo $row["COLUMN_NAME"]."<br>";
$primary= $row[\'COLUMN_NAME\'];}'."\n";
fwrite($myfile, $txt);
$txt = 'if($_SERVER["REQUEST_METHOD"] == "POST"){';
fwrite($myfile, $txt);
//print_r($arrayList);
echo "<table align='center'>";
echo "<form method='Post' action='updateRecordT.php?tablename=".$tb." '>";

   $sql = "SELECT * FROM $tb WHERE $primary= $ID";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
						        
                                while($row = mysqli_fetch_array($result)){
								
									foreach ($arrayList as $key => $a) {
								    //echo $a."  ";
									//echo $row[$a]."  ";
									if ($primary==$a){
										echo "<tr><td><label><b>".$a." :</b> </label></td><td>".$row[$a]."</td></tr>" ;
									}
									else {
									echo "<tr><td><label><b>".$a." :</b> </label></td><td><input type='textarea' name=".$a." value='".$row[$a]."'</td></tr>" ;
									//echo $row[$a];
									$txt ='$'.$a.'= $_POST["'.$a.'"];'."\n".'if(empty($'.$a.')){echo "empty";}';
									    fwrite($myfile, $txt);
										$txt = "\n";
										fwrite($myfile, $txt);
										///$txt = "echo".$a."\n";
										////fwrite($myfile, $txt);
										//$txt = '$'.$a.'= $_POST["'.$row.''.$a.'"];'."\n";
				
									//fwrite($myfile, $txt);
									//echo $row[$a];
									$t++;
								
$txt ='$sql = "UPDATE '.$tb.' SET '.$a.'= \'$'.$a.'\' WHERE $primary = \''.$ID.'\'";'."\n";
//$txt = '$sql = "INSERT INTO student ('', '') VALUES ('','')";'."\n";
fwrite($myfile, $txt);
$txt ='if (mysqli_query($link, $sql)) {'."\n";
fwrite($myfile, $txt);
$txt ='echo "New record created successfully";}'."\n";
fwrite($myfile, $txt);    
$txt ='else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}'."\n";
fwrite($myfile, $txt);   
$txt ="\n";
									fwrite($myfile, $txt); 
									}}
									//echo "<br>";
                                }
                                                          
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
                                                        
                       
                             echo "<input type='submit' class='w3-button' value= 'Update'>";
echo " <a href='viewRecord.php?tablename=" . $tb."' title='Delete Record' data-toggle='tooltip' class='w3-button' >Back</a>";
echo "</form>";
$txt = "\n".'header ("location: viewRecord.php?tablename='.$tb.'");'."\n";
fwrite($myfile, $txt); 
$txt = '}mysqli_close($link);'."\n";
fwrite($myfile, $txt); 
$txt = '?>';
fwrite($myfile, $txt);
							  mysqli_close($link);
?>
</article></section>
</body>
</html>