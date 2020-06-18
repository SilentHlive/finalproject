<?php
    require_once "config.php";
    $tname = $_POST["tname"];
    $n = $_POST["name"];
	$t = $_POST["Type"];
	$l = $_POST["length"];
	$ai = $_POST["Auto_Increment"];
	$ix = $_POST["Index"];
  
$nvals = count($n);
$sql = "";
for ($i = 0; $i < $nvals; $i++) {
if($i<$nvals-1){
	if($ai[$i]== "yes"){
		if ($ix[$i]== "primary"){
		$new =$n[$i]." ".$t[$i]." AUTO_INCREMENT ".$ix[$i];
    $sql= $sql.$new.", ";
	echo "<br>";
		}
	else{
	$new =$n[$i]." ".$t[$i]." AUTO_INCREMENT PRIMARY KEY,";
    $sql= $sql.$new;
	echo "<br>";
	}}
	else if ($l[$i]!= 0){
	$new =$n[$i]." ".$t[$i]."(".$l[$i].") ".$ix[$i];
	$sql= $sql.$new.", ";
	echo"33";
	echo "<br>";
	}
     else{ 
	$new =$n[$i]." ".$t[$i]." ".$ix[$i];
    $sql= $sql.$new.", ";
	echo"44";
	echo "<br>";
}
	}
else{
	
	if($ai[$i]== "yes"){
	if ($ix[$i]== "primary"){
    $new =$n[$i]." ".$t[$i]." AUTO_INCREMENT ".$ix[$i];
    $sql= $sql.$new.", ";
	echo "<br>";
		}
	else{
	$new =$n[$i]." ".$t[$i]." AUTO_INCREMENT PRIMARY KEY";
    $sql= $sql.$new;
	echo "<br>";
	}
	}
	else if ($l[$i]!= 0){
	$new =$n[$i]." ".$t[$i]."(".$l[$i].") ".$ix[$i];
	$sql= $sql.$new;
	echo"3";
	echo "<br>";
	}
    else{ 
	$new =$n[$i]." ".$t[$i]." ".$ix[$i];
    $sql= $sql.$new;
	echo"4";
	echo "<br>";
}
}
}
//echo"<br>";
//echo $nvals; echo"<br>";
echo $sql."<br>";

$sql = "CREATE TABLE $tname($sql)";

   if (mysqli_query($link, $sql)) {
//echo $sql;
	   
    //echo "New record created successfully";
	header ("location: viewTable.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);

// header ("location: viewTable.php");
/*print_r($tname."\n");
echo "<br>";
print_r($n);
echo "<br>";
print_r($t);
echo "<br>";
print_r($l);
echo "<br>";
print_r($ai);
echo "<br>";
print_r($ix);
echo "<br>";*/
?>
