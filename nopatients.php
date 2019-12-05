
<?php
  	$query= "SELECT * FROM doctor LEFT JOIN has ON doctor.license = has.license WHERE has.license IS NULL";
	$result = mysqli_query($connection,$query);
if(!$result)
{
 die("databases query failed.");
}

echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) 
{
		echo "<li>";
        echo 'Dr. ' . $row["first"] . " " . $row["last"] . "<br>";
}
echo "</ol>";
mysqli_free_result($result);
?>


