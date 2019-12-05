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
   $whichOHIP= $_POST["ohip"];
   $_SESSION['ohip']=$whichOHIP;



   $query= 'SELECT * FROM patient WHERE ohip="' . $whichOHIP . '"';

   $result = mysqli_query($connection, $query);
  if(!$result)
  {
  die("select failed");
  }

  if(mysqli_num_rows($result) > 0)
  {
    echo "<h3>" . "Patient Record " . $whichOHIP . ":" . "</h3>";

    while ($row=mysqli_fetch_assoc($result)) 
    {
        echo "Patient Name: " . $row["first"] . " " . $row["last"] . "<br>";

        $query2='SELECT * FROM has INNER JOIN doctor ON has.license = doctor.license WHERE has.ohip="' . $whichOHIP . '"';
        $result2 = mysqli_query($connection, $query2);
        if(!$result2)
        {
        die("select2 failed");
        }
        if(mysqli_num_rows($result2) > 0)
        {
          echo "<h5>" . "Recieving treatment from: " . "</h5>";
          echo "<ol>";
         while ($row2=mysqli_fetch_assoc($result2)) 
         {  
            echo "<li>";
            echo "Dr. " . $row2["first"] . " " . $row2["last"] . "<br>";
            echo "</li>";
         }
         echo "</ol";
        }
        else
        {
          echo "Patient has not been assigned a doctor(s)";

        }
     }
     mysqli_free_result($result);
     mysqli_free_result($result2);

     
     $query3='SELECT * FROM doctor';
     $result3= mysqli_query($connection, $query3);
     if(!$result3)
        {
        die("select2 failed");
        }

      echo "<p>" . "<hr>" . "<p>";
      echo "<h3>" . "Assign New Doctor:" . "</h3>";
      echo '<form action="addDocToPatient.php" method="get">';
      while($row3=mysqli_fetch_assoc($result3)) 
      {
         echo '<input type="radio" name="doctor" value="';
        echo $row3["license"];
        echo '">' . "Dr. " . $row3["first"] . " " . $row3["last"] . "<br>";
      }
      echo '<input type="submit" value="Add">';
      echo '</form>';

      $query4='SELECT * FROM has INNER JOIN doctor ON has.license = doctor.license WHERE has.ohip="' . $whichOHIP . '"';
        $result4 = mysqli_query($connection, $query4);
        if(!$result4)
        {
        die("select4 failed");
        }
      if(mysqli_num_rows($result4) > 0)
        {
          echo "<p>" . "<hr>" . "<p>";
          echo "<h3>" . "Remove Doctor:" . "</h3>";
          echo '<form action="remDocPatient.php" method="post">';
          while ($row4=mysqli_fetch_assoc($result4)) 
         {  
             echo '<input type="radio" name="doctor" value="';
             echo $row4["license"];
            echo '">' . "Dr. " . $row4["first"] . " " . $row4["last"] . "<br>";
         }
         echo '<input type="submit" value="Remove">';
      echo '</form>';

        }

  }
  else
  {
    echo "OHIP No. not in system";
  }
?>



<?php  
   mysqli_close($connection);
?>

<!-- <form action="index2.php" method="post">
<input type="submit" value="Home">
</form> -->

</body>
</html>


