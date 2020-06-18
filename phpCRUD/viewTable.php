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
	margin-left :200px;
	padding-bottom:20px;
	background-color:#F66;

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
}
   
   </style>
</head>
<body>
 <header><div>
  
  <h2 align="center"> PHP CRUD GENERATOR</h2></div>
</header> 
<section align="center">
<article align="center">
<h3>View Table</h3>
    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SHOW TABLES FROM $db";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped' align='center' >";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Table Name</th>";
										echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td><a href='viewRecord.php?tablename=". $row[0]."' title='View Record' data-toggle='tooltip'>" . $row[0] . "</a></td>";
                                        echo "<td>";
//echo "<a href='updateTable.php?tablename=". $row[0] ."' title='Update Record' data-toggle='tooltip'>Update</a>";
										//	echo "&nbsp; &nbsp;";
                                            echo "<a href='deleteTable.php?tablename=". $row[0] ."' title='Delete Record' data-toggle='tooltip'>Delete</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>

<a href="generate.php" class="w3-button">Add Table</a>
<a href="create.php" class="w3-button">Back</a>
</div></article></section>

</body>
</html>