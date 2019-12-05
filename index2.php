<!DOCTYPE html>
<html>
<head>
<title>Assignment 3</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to Assignment3</h1>

<h2> Hospital Information </h2>

<?php
include 'hosinfo.php';
?>

<p>
<hr>
<p>

<h2> Update Hospital Name </h2>
Select hospital to update:<br>

<form action="hosname.php" method="post">
<?php
include 'gethos.php';
?>
<br>
New Name:<input type="text" name="hosname"><br>
<input type="submit" value="Change">
</form>

<p>
<hr>
<p>

<h2>Doctors</h2>
<h5>Sort By:</h5>
<form action="index2.php" method="post">
<input type="radio" name="namesort" value=0 checked> First Name <br>
<input type="radio" name="namesort" value=1> Last Name<br>
<input type="radio" name="order" value=0 checked> Ascending<br>
<input type="radio" name="order" value=1> Descending<br>
<input type="submit" value="Sort">
</form>

<form action="docinfo.php" method="post">
<?php
include 'getdata.php';
?>
<input type="submit" name="toDocInfo" value="Get Doctor Information">
<br>
<input type="submit" name="toDocInfo" value="Delete Doctor">
<br>
</form>

 <form action="docdate.php" method="post">
  <br>Doctors licensed before specific date (YYYY-MM-DD):<br>
  <input type="text" name="date" value="YYYY-MM-DD"><br>
  <input type="submit" value="Submit">
</form>

<p>
<hr>
<p>
<h2> Add a new doctor:</h2>
<form action="putdoc.php" method="post">
First Name: <input type="text" name="fname"><br>
Last Name: <input type="text" name="lname"><br>
Specialty: <input type="text" name="spec"><br>
License No.: <input type="text" name="lisc"><br>
Date Licensed: <input type="text" name="date"> (YYYY-MM-DD)<br>
Works At: <br>
<?php
include 'gethos.php';
?>
<input type="submit" value="Add Doctor">
</form>

<p>
<hr>
<p>

<h2>Patients</h2>
<h5>Please enter the Patient's OHIP No.:</h5>

<form action="getpatient.php" method="post">
OHIP No.: <input type="text" name="ohip"><br>
<input type="submit" value="Search">
</form>

<h4>These doctors currently have no patients:</h4>
<?php
include 'nopatients.php';
?>




<?php
mysqli_close($connection);
?>
</body>
</html>
