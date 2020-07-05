<?php
require_once "config.php";

$name=$_POST['name'];
$table=$_POST['table'];
//echo $table;
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

//copy("$file/viewTable.php", "$dest/viewTable.php");
//include("$dest/viewTable.php");
//$t = "";
// Read the file
//$ct = file_get_contents("$dest/viewTable.php");
// Do the editing
//$ct = str_replace('<a href="create.php" class="w3-button">Back</a>',$t, $ct);
// Save the file
//file_put_contents("$dest/viewTable.php", $ct);
//$ct = file_get_contents("$dest/viewTable.php");
// Do the editing
//$ct = str_replace('<a href="generate.php" class="w3-button">Add Table</a>',$t, $ct);
// Save the file
//file_put_contents("$dest/viewTable.php", $ct);

//copy("$file/deleteTable.php", "$dest/deleteTable.php");
//copy("$file/dropTable.php", "$dest/dropTable.php");

copy("$file/gbtn.php", "$dest/gbtn.php");
include("$dest/gbtn.php");
$t = "";
// Read the file
$ct = file_get_contents("$dest/gbtn.php");
// Do the editing
$ct = str_replace('<a href="#" id="btn" class="w3-button">Generate</a>',$t, $ct);
// Save the file
file_put_contents("$dest/gbtn.php", $ct);

copy("$file/style.css", "$dest/style.css");
copy("$file/sidebar.php", "$dest/sidebar.php");

copy("$file/addRecord.php", "$dest/addRecord.php");
$t ='<link rel="stylesheet" href="http://localhost/'.$name.'/style.css">';
// Read the file
$ct = file_get_contents("$dest/addRecord.php");
// Do the editing
$ct = str_replace('<link rel="stylesheet" href="http://localhost/phpCRUD/style/index.css">',$t, $ct);
// Save the file
file_put_contents("$dest/addRecord.php", $ct);
copy("$file/addRecordT.php", "$dest/addRecordT.php");

copy("$file/viewRecordTable.php", "$dest/viewRecordTable.php");
$t ='<link rel="stylesheet" href="http://localhost/'.$name.'/style.css">';
// Read the file
$ct = file_get_contents("$dest/viewRecordTable.php");
// Do the editing
$ct = str_replace('<link rel="stylesheet" href="http://localhost/phpCRUD/style/index.css">',$t, $ct);
// Save the file
file_put_contents("$dest/viewRecordTable.php", $ct);

copy("$file/updateRecord.php", "$dest/updateRecord.php");
$t ='<link rel="stylesheet" href="http://localhost/'.$name.'/style.css">';
// Read the file
$ct = file_get_contents("$dest/updateRecord.php");
// Do the editing
$ct = str_replace('<link rel="stylesheet" href="http://localhost/phpCRUD/style/index.css">',$t, $ct);
// Save the file
file_put_contents("$dest/updateRecord.php", $ct);
copy("$file/updateRecordT.php", "$dest/updateRecordT.php");

copy("$file/deleteRecord.php", "$dest/deleteRecord.php");
$t ='<link rel="stylesheet" href="http://localhost/'.$name.'/style.css">';
// Read the file
$ct = file_get_contents("$dest/deleteRecord.php");
// Do the editing
$ct = str_replace('<link rel="stylesheet" href="http://localhost/phpCRUD/style/index.css">',$t, $ct);
// Save the file
file_put_contents("$dest/deleteRecord.php", $ct);
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

copy("$file/viewRecord.php", "$dest/viewRecord.php");
//include("$dest/viewRecord.php");
$t ='<link rel="stylesheet" href="http://localhost/'.$name.'/style.css">';
// Read the file
$ct = file_get_contents("$dest/viewRecord.php");
// Do the editing
$ct = str_replace('<link rel="stylesheet" href="http://localhost/phpCRUD/style/index.css">',$t, $ct);
// Save the file
file_put_contents("$dest/viewRecord.php", $ct);

$t ='<body><?php include "sidebar.php";?>';
// Read the file
$ct = file_get_contents("$dest/viewRecord.php");
// Do the editing
$ct = str_replace('<body>',$t, $ct);
// Save the file
file_put_contents("$dest/viewRecord.php", $ct);

$t ='';
// Read the file
$ct = file_get_contents("$dest/viewRecord.php");
// Do the editing
$ct = str_replace('<a href="viewTable.php" class="w3-button">Back</a>',$t, $ct);
// Save the file
file_put_contents("$dest/viewRecord.php", $ct);



$myfile = fopen("table.txt", "w") or die("Unable to open file!");
$txt = $table."\n";
fwrite($myfile, $txt);
fclose($myfile);
copy("$file/table.txt", "$dest/table.txt");

echo "<script type='text/javascript'> alert('Successfully created!');  </script>  ";
echo "<script> window.open('http://localhost/$name/viewRecord.php?tablename=$table', '');</script>";


$link->close();
			
?>