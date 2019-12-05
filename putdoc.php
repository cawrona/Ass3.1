<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3 - Add doc</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>

<?php
   $first= $_POST["fname"];
   $last = $_POST["lname"];
   $specialty =$_POST["spec"];
   $license=$_POST["lisc"];
   $licenseDate=$_POST["date"];
   $code=$_POST["Hcode"];

//echo "Hello" . "<br>";	
//echo $code . "<br>";

   $existQuery= 'SELECT * FROM doctor WHERE license="' . $license . '"';
   $result = mysqli_query($connection,$existQuery);
  if(!$result)
  {
  die("databases query failed.");
  }

  if(mysqli_num_rows($result) > 0)
{
  echo "This license is already in the system. Please enter a different license.";
    
}
else
{
    $query = 'INSERT INTO doctor values("' . $license . '","' . $first . '","' . $last . '","' . $specialty . '","' . $licenseDate . '","' . $code . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
	echo "Doctor added"; 
}

   
  
   mysqli_close($connection);
?>

</body>
</html>
