<?php
session_start();
?>
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
   
   $whichDoctor=$_SESSION['ohip'];
   $whichLicense=$_GET['doctor'];

  // echo $whichDoctor;
   //echo $whichLicense;


   $query= 'SELECT * FROM has WHERE license="' . $whichLicense . '"';

   $result = mysqli_query($connection, $query);
  if(!$result)
  {
  die("Update failed");
  }
  if(mysqli_num_rows($result) > 0)
    {
      echo "Doctor already treats patient";
    }
  else
  {
    $query2='INSERT INTO has values("' . $whichLicense . '","' . $whichDoctor . '")';
    if (!mysqli_query($connection, $query2)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
    echo "Doctor added!";
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
