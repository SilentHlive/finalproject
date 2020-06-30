<?php
 session_start();
// Define variables and initialize with empty values
$db = "";
$db_err = "";
$stt = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_db = trim($_POST["database"]);
    if(empty($input_db)){
		$db= $input_db;
    } elseif(!filter_var($input_db, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]+$/")))){
        //$db_err = "Please enter a valid database name.";
		echo "<script type='text/javascript'> alert('Please enter a valid database name.'); </script>  ";
    } else{
        $db = $input_db;
}

    $servername = "localhost";
    $username = "root";
    $password = "";

 // Create connection
    $conn = new mysqli($servername, $username, $password);
// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
	$sql = "CREATE DATABASE $db";
		if ($conn->query($sql) == TRUE) {
		$myfile = fopen("config.php", "w") or die("Unable to open file!");
		$txt = '<?php '."\n";
		fwrite($myfile, $txt);
		$txt = ' $servername = "localhost";
    $username = "root";
    $password = "";'."\n";
		fwrite($myfile, $txt);
		$txt = '$db= ';
		fwrite($myfile, $txt);
		$txt = "'$input_db';"."\n";
		fwrite($myfile, $txt);
        $txt = '$link = mysqli_connect($servername, $username, $password , $db);'."\n";
        fwrite($myfile, $txt);
		//$txt = 'if($link == true){echo "successful.";}';
       // fwrite($myfile, $txt);
		//$txt = 'if($link == false){die("ERROR: Could not connect. " . mysqli_connect_error());}';
      //  fwrite($myfile, $txt);
		$txt = '?>';
        fwrite($myfile, $txt);
        fclose($myfile);
		echo "<script type='text/javascript'> alert('Successfully created!'); </script>  ";
		header("Location: viewTable.php"); 
		
}
if ($conn->query($sql) == FALSE && empty($db)) {
echo "<script type='text/javascript'> alert('Empty input.Please enter a valid database name.'); </script>  ";}
else{
//echo "<script type='text/javascript'> alert('Existed already!'); </script>  ";
$myfile = fopen("config.php", "w") or die("Unable to open file!");
		$txt = '<?php '."\n";
		fwrite($myfile, $txt);
		$txt = ' $servername = "localhost";
    $username = "root";
    $password = "";'."\n";
		fwrite($myfile, $txt);
		$txt = '$db= ';
		fwrite($myfile, $txt);
		$txt = "'$input_db';"."\n";
		fwrite($myfile, $txt);
        $txt = '$link = mysqli_connect($servername, $username, $password , $db);'."\n";
        fwrite($myfile, $txt);
		//$txt = 'if($link == true){echo "successful.";}';
       // fwrite($myfile, $txt);
		//$txt = 'if($link == false){die("ERROR: Could not connect. " . mysqli_connect_error());}';
      //  fwrite($myfile, $txt);
		$txt = '?>';
        fwrite($myfile, $txt);
        fclose($myfile);
		echo "<script type='text/javascript'> alert('Successfully created!'); </script>  ";
		header("Location: viewTable.php"); 
}
$conn->close();
    
}
?>
 
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
	margin-left :200px;
	padding-bottom:20px;
	background-color:#F66;

}

.text{
font-family: "Times New Roman", Times, serif;
font-size: 20px;
text-align: center;

}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

.w3-button {width:150px;
height: 40px;
margin-top: 80px;
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
   
   
   </style>
</head>
<body>
 <header><div>
  
  <h2 align="center"> PHP CRUD GENERATOR</h2></div>
</header> 
<section align="center">
<article align="center"><div class="text">
<h3>Create Database</h3>
<p>Please name your database(without space)</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo(!empty($db_err)) ? 'has-error' : ''; ?>">
                            <label>Name of Database</label>
                            <br><input type="text" name="database" class="form-control" value="<?php echo $db; ?>">
                            <span class="help-block"><?php echo $db_err;?></span>
                        </div>
                        <input type="submit" class="w3-button" value="Submit">
                        <a href="index.html" class="w3-button">Cancel</a></form>
</div><div></article>
</body>
</html>