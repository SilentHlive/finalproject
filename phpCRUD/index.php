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
div h2 {
 font-family:Palatino Linotype;
font-size: 70px;
  margin-top:100px;
  text-align: center;
  padding: 20px;
  color: white;
}
 
.text {
font-family: "Times New Roman", Times, serif;
font-size: 20px;
text-align: center;
	float: center;
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
  <h2 align="center"><b>PHP CRUD GENERATOR</b></h2>
  <div>
</header> 
<section align="center">
<article align="center">
<div class="text">
<p> PHP CRUD GENERATOR IS TOOL THAT CAN HELP USER<br>
TO CREATE, VIEW, UPDATE AND DELETE RECORDS IN THE TABLE.<br> TRY IT NOW! </p>
</div>
<div class="w3-container w3-center">                   
<button class="w3-button" onclick="window.location.href = 'create.php';"><b>Open</b></button>

</div></article>
</section>

</body>
</html>