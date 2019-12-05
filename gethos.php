
<?php
  $query= "SELECT * FROM hospital";

$result = mysqli_query($connection,$query);
if(!$result)
{
 die("databases query failed.");
}

$row = mysqli_fetch_assoc($result);
echo '<input type="radio" name="Hcode" value="';
echo $row["hospitalCode"];
echo '"checked>' . $row["name"] . ", " . $row["city"] . "<br>";

while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="Hcode" value="';
        echo $row["hospitalCode"];
        echo '">' . $row["name"] . ", " . $row["city"] . "<br>";
}
mysqli_free_result($result);
?>

