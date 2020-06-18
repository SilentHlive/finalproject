<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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
margin-top: 30px;
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
padding-top:5px;
padding-bottom:5px;
}
input {
	margin-bottom:4px;
	font-family: "Times New Roman", Times, serif;
font-size: 20px;}
    
.title{
	font-family: "Times New Roman", Times, serif;
font-size: 20px;
}
	
	
   </style>
</head>

</head>

<body>
<header><div>
  
  <h2 align="center"> PHP CRUD GENERATOR</h2></div>
</header>
<section align="center">
<article align="center">
<?php
// Include config file
require_once "config.php";
$tb = $_GET["tablename"];
  
echo "<div class='title'><p><b>Are you sure you want to delete this record?</b></p>";
echo "<p>Table Name : ".$tb."</p><br></div>";
echo "<a href='dropTable.php?tablename=".$tb."' class='w3-button w3-light-blue w3-border w3-hover-deep-purple w3-round-large'>Yes</a>";
echo " <a href='viewTable.php?tablename='' class='w3-button w3-light-blue w3-border w3-hover-deep-purple w3-round-large'>No</a></div>";
                        

/*header ("location: view.php");
*/
mysqli_close($link);

?>              
                  </article></section>
 
</body>
</html>