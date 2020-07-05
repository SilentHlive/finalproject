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