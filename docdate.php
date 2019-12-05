<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3-LicenseDate</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<ol>
<?php
   $whichDate= $_POST["date"];
   
	echo "<h1>" . "Doctors Licensed Before " .  $whichDate . ":" . "</h1>";

   $query = 'SELECT * FROM doctor WHERE licenseDate<"' . $whichDate . '"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }

	
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
	echo $row["first"] . " " . $row["last"] . "<br>";
	echo "Specialty: " . $row["specialty"] . "<br>";
	echo "Date Licensed: " . $row["licenseDate"] . " (YYYY-MM-DD) " . "<br>" . "<br>";
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
