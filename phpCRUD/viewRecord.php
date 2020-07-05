<!DOCTYPE html>
<html lang="en">
<?php
 //echo $_GET["tablename"];
// Check existence of id parameter before processing further
if(isset($_GET["tablename"]) && !empty(trim($_GET["tablename"]))){
    // Include config file
    require_once "config.php";
}
else {
$myfile = fopen("table.txt", "r") or die("Unable to open file!");
$table = fread($myfile,filesize("table.txt"));
$tb = $table;
header ("location: viewRecord.php?tablename=".$tb."");
}
?>
<head>
    <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico" />

<?php include "title.php";?>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="http://localhost/phpCRUD/style/index.css">

</head>
<body>
<header><div>
  
  <?php include "h2.php";?></div>
</header>
<section align="center">
<article align="center">
<div class="title"><h3>View Record</h3>
	
		Table Name: <?php if (empty($_GET["tablename"])) {
			$myfile = fopen("table.txt", "r") or die("Unable to open file!");
  echo fread($myfile,filesize("table.txt"));
	} else {echo $_GET["tablename"];}?> 

  <?php
 if (empty($_GET["tablename"])) {
		$myfile = fopen("table.txt", "r") or die("Unable to open file!");
$table = fread($myfile,filesize("table.txt"));
$tb = $table;
	} else { $tb = $_GET["tablename"];}
 
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
					
                    
					include "gbtn.php";
                    ?>
                     <a href="viewTable.php" class="w3-button">Back</a></article></section>
 
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<div align="center">
    <p>&nbsp;&nbsp;&nbsp;Please enter the name of system : </p>
	<form action="gg.php" method="post"><input type="text" name="name"><br>
	<input type="hidden" name="table" value="<?php echo $tb; ?>">
	<input class="w3-button" type="submit" value="Submit" name="submit" >
	</form>
	</div>
  </div>
</div>
<?php mysqli_close($link);?>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
</body>
</html>