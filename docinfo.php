<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment3-Docinfo</title>
</head>
<body>
<?php
include 'connectdb.php';
?>

<?php

$whichDoctor= $_POST["doctor"];
$_SESSION['license_S']=$whichDoctor;

if($_POST['toDocInfo'] == 'Get Doctor Information')
{
echo "<h1>" . "Doctor Information:" . "</h1>"; 
   
   $query = 'SELECT * FROM doctor WHERE doctor.license="' . $whichDoctor . '"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query1 failed.");
     }


    while ($row=mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["first"] . " " . $row["last"] . "<br>";
        echo "Specialty: " . $row["specialty"] . "<br>";
        echo "License No.: " . $row["license"] . "<br>";
        echo "Date licensed: " . $row["licenseDate"] . "<br>";
     }
     mysqli_free_result($result);

   $Hquery = 'SELECT name FROM hospital WHERE hospitalCode = (SELECT hospitalCode FROM doctor WHERE license="' . $whichDoctor . '")';
   $Hresult = mysqli_query($connection,$Hquery);
    if (!$result) {
         die("database Hquery failed.");
     }
     while ($row=mysqli_fetch_assoc($Hresult)) {
        echo "Hospital: " . $row["name"];
      }
      mysqli_free_result($Hresult);
echo '<form action="index2.php" method="post">
  <input type="submit" value="Home">
</form>';
}
elseif($_POST['toDocInfo'] == 'Delete Doctor')
{
  $query2 = 'SELECT * FROM has WHERE license="' . $whichDoctor . '"';
     $result2=mysqli_query($connection,$query2);
    if (!$result2) {
         die("database query2 failed.");
     }

    if(mysqli_num_rows($result2) > 0)
    {
      echo "This Doctor has current patients. Are you sure you want to delete?";
      echo "<br>";
    }
    else
    {
      echo "This doctor has no patients. Delete?";
      echo "<br>";
    }
    echo '<form action="deletedoc.php" method="post">
  <input type="submit" name="delete" value="Yes">
  <input type="submit" name="delete" value="No">
</form>';
}
?>


<?php
   mysqli_close($connection);
?>
</body>
</html>
