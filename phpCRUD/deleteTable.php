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