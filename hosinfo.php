<?php

  $query= "SELECT * FROM hospital ORDER BY name ASC";

 
$result = mysqli_query($connection,$query);
if(!$result)
{
 die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {

	$docQuery = 'SELECT * FROM doctor WHERE license="' . $row['head'] . '"'; 
	$docresult = mysqli_query($connection,$docQuery);
	if(!$docresult)
	{
 	die("databases query failed.");
	}
	$docrow = mysqli_fetch_assoc($docresult);
   
        echo "<h4>" . $row["name"] . " Hospital" . "</h4>" . "<br>";
        echo "Head Doctor: Dr. " . $docrow["first"] . " " . $docrow['last'] . ", head since " . $row['headStart'] . "<br>";
}
mysqli_free_result($result);
mysqli_free_result($docresult);

?>



