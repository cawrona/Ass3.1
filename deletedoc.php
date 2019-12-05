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
$whichDoctor=$_SESSION['license_S'];
//echo $whichDoctor;

if($_POST['delete'] == 'Yes')
{   
   $query = 'DELETE FROM doctor WHERE license="' . $whichDoctor . '"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query1 failed.");
     }
//     mysqli_free_result($result);

echo "Doctor deleted.";
}

else
{
  echo "Doctor not deleted.";
}

?>

<form action="index2.php" method="post">
  <input type="submit" value="Home">
</form>

<?php
   mysqli_close($connection);
?>
</body>
</html>
