<?php
require_once "config.php";

$name=$_POST['name'];
$dest = "C:/xampp/htdocs/$name";
$file="C:/xampp/htdocs/phpCRUD";
$icon="C:/xampp/htdocs/$name/icon";

mkdir("$dest/", 0777);
mkdir("$icon", 0777);

copy("$file/icon/add.png", "$icon/add.png");
copy("$file/icon/delete.png", "$icon/delete.png");
copy("$file/icon/edit.png", "$icon/edit.png");
copy("$file/icon/read.png", "$icon/read.png");

copy("$file/config.php", "$dest/config.php");

copy("$file/viewTable.php", "$dest/viewTable.php");
include("$dest/viewTable.php");
$t = "";
// Read the file
$ct = file_get_contents("$dest/viewTable.php");
// Do the editing
$ct = str_replace('<a href="create.php" class="w3-button">Back</a>',$t, $ct);
// Save the file
file_put_contents("$dest/viewTable.php", $ct);
$ct = file_get_contents("$dest/viewTable.php");
// Do the editing
$ct = str_replace('<a href="generate.php" class="w3-button">Add Table</a>',$t, $ct);
// Save the file
file_put_contents("$dest/viewTable.php", $ct);

copy("$file/deleteTable.php", "$dest/deleteTable.php");
copy("$file/dropTable.php", "$dest/dropTable.php");

copy("$file/gbtn.php", "$dest/gbtn.php");
include("$dest/gbtn.php");
$t = "";
// Read the file
$ct = file_get_contents("$dest/gbtn.php");
// Do the editing
$ct = str_replace('<a href="#" id="btn" class="w3-button">Generate</a>',$t, $ct);
// Save the file
file_put_contents("$dest/gbtn.php", $ct);

copy("$file/viewRecord.php", "$dest/viewRecord.php");


copy("$file/addRecord.php", "$dest/addRecord.php");
copy("$file/addRecordT.php", "$dest/addRecordT.php");

copy("$file/viewRecordTable.php", "$dest/viewRecordTable.php");

copy("$file/updateRecord.php", "$dest/updateRecord.php");
copy("$file/updateRecordT.php", "$dest/updateRecordT.php");

copy("$file/deleteRecord.php", "$dest/deleteRecord.php");
copy("$file/delete.php", "$dest/delete.php");

copy("$file/title.php", "$dest/title.php");
include("$dest/title.php");
$title = strtoupper("$name");
// Read the file
$content = file_get_contents("$dest/title.php");
// Do the editing
$content = str_replace('PHP CRUD GENERATOR',$title, $content);
// Save the file
file_put_contents("$dest/title.php", $content);

copy("$file/h2.php", "$dest/h2.php");
include("$dest/h2.php");
// Read the file
$c = file_get_contents("$dest/h2.php");
// Do the editing
$c = str_replace('PHP CRUD GENERATOR',$title, $c);
// Save the file
file_put_contents("$dest/h2.php", $c);

echo "<script type='text/javascript'> alert('Successfully created!');  </script>  ";
echo "<script> window.open('http://localhost/$name/viewTable.php', '');</script>";


$link->close();
			
?>