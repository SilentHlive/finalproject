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
<div class="title"><h3>Add Record</h3></div><br>
<?php
require_once "config.php";
$tb = $_GET["tablename"];
//echo $tb;
$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= '$db' AND TABLE_NAME = '$tb' AND CONSTRAINT_NAME = 'PRIMARY'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
   //echo $row['COLUMN_NAME']."<br>";
   $primary= $row['COLUMN_NAME'];
}

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

$myfile = fopen("addRecordT.php", "w");
$txt = '<?php '."\n";
fwrite($myfile, $txt);
$txt = 'require_once "config.php";'."\n";
fwrite($myfile, $txt);
$txt = '$primary; $n; $next; $tb = $_GET["tablename"];'."\n";
fwrite($myfile, $txt);
$txt = '$sql = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE `TABLE_SCHEMA`= \'$db\' AND TABLE_NAME = \'$tb\' AND CONSTRAINT_NAME = \'PRIMARY\'";'."\n";
fwrite($myfile, $txt);
$txt='$result = mysqli_query($link,$sql);while($row = mysqli_fetch_array($result)){//echo $row["COLUMN_NAME"]."<br>";
$primary= $row[\'COLUMN_NAME\'];}'."\n";
fwrite($myfile, $txt);
$input="";
$n="";
$next;
$prev;
$e;
$txt='if($_SERVER["REQUEST_METHOD"] == "POST"){'."\n";
fwrite($myfile, $txt);
    // Validate name

//print_r($arrayList);
echo "<form method='Post' action='addRecordT.php?tablename=".$tb." '>";
echo "<table align='center'>";
									foreach ($arrayList as $key => $a) {
								    //echo $a."  ";
									//echo $row[$a]."  ";
                                   // echo "<label>".$a." : </label><input type='text' name=".$a."><br/>" ;
									 echo "<tr><td><label>".$a." : </label></td><td><input type='text' name=".$a."></td></tr>" ;
									 $txt ='$'.$a.'= $_POST["'.$a.'"];'."\n";
									 fwrite($myfile, $txt);
									 $c= current($arrayList);
									$value= array_values($arrayList)[0];
									$next=next($arrayList);
									$prev=prev($arrayList);
									if($a==$primary){
										//echo $value;
										//echo $primary;
										if(empty($next)&& empty($prev)) {
											$n = "$".$a;
										$input="$".$a;
										$e=$value;
										$txt ='$n = $'.$primary.';'."\n";
										fwrite($myfile, $txt); 
										$txt ='//echo $n;'."\n";
										fwrite($myfile, $txt); 
										$txt ='$'.$value.';'."\n";
										fwrite($myfile, $txt); 
										}
										if(empty($next)) {
											$n = "$".$a;
										$input="$".$prev;
										$e=$prev;
										//echo $n;
										$txt ='$n = $'.$primary.';'."\n";
										fwrite($myfile, $txt); 
										$txt ='//echo $n;'."\n";
										fwrite($myfile, $txt); 
										$txt ='$'.$prev.';'."\n";
										fwrite($myfile, $txt); 
										}
										else {
										$n = "$".$a;
										$input="$".$next;
										$e=$next;
										//echo $n;
										$txt ='$n = $'.$primary.';'."\n";
										fwrite($myfile, $txt); 
										$txt ='//echo $n;'."\n";
										fwrite($myfile, $txt); 
										$txt ='$'.$next.';'."\n";
										fwrite($myfile, $txt); }
									}
									
                               } 

							   $txt='if(empty($n)){ echo "hello";'."\n";
							   fwrite($myfile, $txt);
                               if(!empty($input)){										
							   $txt ='if(!empty('.$input.')){echo '.$input.';'."\n";
							   fwrite($myfile, $txt);
							   $txt = '$sql = "INSERT INTO '.$tb.' ('.$e.') VALUES (\''.$input.'\')";'."\n";
							   fwrite($myfile, $txt);
						   	   $txt ='if (mysqli_query($link, $sql)) {'."\n";
							   fwrite($myfile, $txt);
							   $txt ='echo "New record created successfully";}'."\n";
							   fwrite($myfile, $txt);    
							   $txt ='else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}'."\n";
							   fwrite($myfile, $txt); 
							   
							   foreach ($arrayList as $key => $a){
					           if($a==$primary){
								//	echo "gggg";
							   } 
							   else{
                               $txt ='$sql = "UPDATE '.$tb.' SET '.$a.'= \'$'.$a.'\' WHERE '.$e.'= \''.$input.'\'";'."\n";
                               fwrite($myfile, $txt);
                               $txt ='if (mysqli_query($link, $sql)) {'."\n";
                               fwrite($myfile, $txt);
                               $txt ='echo "New record updated successfully";}'."\n";
                               fwrite($myfile, $txt);    
							   $txt ='else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}'."\n";
                               fwrite($myfile, $txt);   
							  // $txt ="\n".'}';
                              // fwrite($myfile, $txt);	
								}
                               }
                               $txt ='}}'."\n";
                               fwrite($myfile, $txt); 
							   }
							   $txt ='else {echo "bye";'."\n";
							   fwrite($myfile, $txt);
							   $txt = '$sql = "INSERT INTO '.$tb.' ('.$primary.') VALUES (\''.$n.'\')";'."\n";
							   fwrite($myfile, $txt);
							   $txt ='if (mysqli_query($link, $sql)) {'."\n";
							   fwrite($myfile, $txt);
							   $txt ='echo "New record created successfully";}'."\n";
							   fwrite($myfile, $txt);    
							   $txt ='else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}'."\n";
							   fwrite($myfile, $txt); 
							   $txt ='echo $n;'."\n";
							   fwrite($myfile, $txt); 
	                           foreach ($arrayList as $key => $a){
								if($a==$primary){
									//echo "gggg";
									} 
								else{
									$txt ='$sql = "UPDATE '.$tb.' SET '.$a.'= \'$'.$a.'\' WHERE '.$primary.'= \''.$n.'\'";'."\n";
fwrite($myfile, $txt);
$txt ='if (mysqli_query($link, $sql)) {'."\n";
fwrite($myfile, $txt);
$txt ='echo "New record updated successfully";}'."\n";
fwrite($myfile, $txt);    
									$txt ='else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}'."\n";
fwrite($myfile, $txt);   
									$txt ="\n";
fwrite($myfile, $txt);
							   }}

									echo "</table>";

									//echo "<br>";
                                echo "<input type='submit' class='w3-button' value= 'Add'>";
echo " <a href='viewRecord.php?tablename=" . $tb."' title='Delete Record' data-toggle='tooltip' class='w3-button' >Back</a>";
echo "</form>";
$txt ='} }else echo "hello!!";'."\n";
fwrite($myfile, $txt); 
$txt ='mysqli_close($link);'."\n";
fwrite($myfile, $txt); 
$txt = "\n".'header ("location: viewRecord.php?tablename='.$tb.'");'."\n";
fwrite($myfile, $txt); 

$txt = '?>';
fwrite($myfile, $txt);
                       
                            
							  mysqli_close($link);
?>
</article></section>

</body>
</html>
