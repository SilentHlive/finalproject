<div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5;background-color:#D9B08C;" id="mySidebar">
  <button class="w3-bar-item w3-large cc" onclick="w3_close()" style=""> &times;</button>
  <?php
                    
                    // Attempt select query execution
                    $s = "SHOW TABLES FROM $db";
                    if($r= mysqli_query($link, $s)){
                        if(mysqli_num_rows($r) > 0){
                                while($row = mysqli_fetch_array($r)){
								  echo "<a href=\"viewRecord.php?tablename=". $row[0]."\" class=\"w3-bar-item link\">" . $row[0] . "</a>";	
      }
                            // Free result set
                            mysqli_free_result($r);
                        } else{
                            echo "<p class=\"lead\"><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $s. " . mysqli_error($link);
                    }
 
                    // Close connection
                    ?>
 
</div>

<!-- Page Content -->

  <button class=" w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>

    
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>
          

                                      
                            
                    

