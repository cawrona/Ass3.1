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
$whichDoctor=$_POST['doctor'];
echo $whichDoctor;


   $query = 'DELETE FROM has WHERE license="' . $whichDoctor . '"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query1 failed.");
     }
     //mysqli_free_result($result);
     echo "Doctor deleted.";


?>

<form action="index2.php" method="post">
  <input type="submit" value="Home">
</form>

<?php
   mysqli_close($connection);
?>
</body>
</html>
