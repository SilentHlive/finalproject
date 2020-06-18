<!DOCTYPE html>
<html lang="en">
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
  font-family: "Times New Roman", Times, serif;
font-size: 20px;
padding-left:50px;
padding-right:50px;
padding-top:5px;
padding-bottom:5px;
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
