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
<script>
var n =2;
function displayResult()
{
var table=document.getElementById("myTable");
var row=table.insertRow(n); n = n+1;
var cell1=row.insertCell(0);
var cell2=row.insertCell(1);
var cell3=row.insertCell(2);
var cell5=row.insertCell(3);
var cell6=row.insertCell(4);
cell1.innerHTML='<input type="text" name="name[]" value="">';
cell2.innerHTML='<select name="Type[]"><option value="int">Int</option><option value="varchar">Varchar</option><option value="text">Text</option><option value="DATE">DATE</option><option value="DATETIME">DATETIME</option></select>';
cell3.innerHTML='<input type="number" name="length[]" value="">';
cell5.innerHTML='<td><select name="Auto_Increment[]"><option value=""> </option><option value="yes">Yes</option></td>';
cell6.innerHTML='<select name="Index[]">><option value=""> </option><option value="PRIMARY KEY">Primary</option></select>';
}

</script>

<body>
 <header><div>
  
  <h2 align="center"> PHP CRUD GENERATOR</h2></div>
</header>
<section align="center">
<article align="center">
<h3>Add Table</h3>
<form action="add.php" method="post">
Table Name: <input type="text" name="tname"> <button type="button" onclick="displayResult()">Add</button>
    <br />
<table id="myTable" border="1" align= "center" width="50px">
  <tr>
        <th><label for="Name">Name</label></th> 
		<th><label for="Type">Type</label></th> 
		<th><label for="Length">Length</label></th>
        <th><label for="A_I">A_I</label></th>
		<th><label for="Index">Index</label></th>
  </tr>
  <tr>
   <td><input type="text" name="name[]" value=""></td> 
	<td>
	<select name="Type[]">
    <option value="int">Int</option>
    <option value="varchar">Varchar</option>
    <option value="text">Text</option>
    <option value="DATE">DATE</option>
    <option value="DATETIME">DATETIME</option>
    </select></td> 
	<td><input type="number" name="length[]" value=""></td>
    <td><select name="Auto_Increment[]">
     <option value=""> </option>
    <option value="yes">Yes</option></td>
	<td><select name="Index[]">
     <option value=""> </option>
    <option value="PRIMARY KEY">Primary</option>
  </select></td>
  </tr>
</table>
<br><input type="submit" class="w3-button" value= "Save">
<a href="viewTable.php" class="w3-button">Back</a></form></article></section>
</body>
</html>