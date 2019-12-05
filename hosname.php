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
   $newName= $_POST["hosname"];
   $Hcode = $_POST["Hcode"];



   $query= 'UPDATE hospital SET name="' . $newName . '" WHERE hospitalCode="' . $Hcode . '"';
   $result = mysqli_query($connection, $query);
  if(!$result)
  {
  die("Update failed");
  }
?>

Change Successful <br>
<form action="index2.php" method="post">
  <input type="submit" value="Home">
</form>


<?php  
   mysqli_close($connection);
?>

</body>
</html>
