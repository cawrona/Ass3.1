<?php
 $byname=$_POST["namesort"];
 $order=$_POST["order"];
 //echo "$byname";
 //echo "$order";
 if($byname==0 && $order==0){
  //echo "hello";
  $query= "SELECT * FROM doctor ORDER BY first ASC";
 }elseif($byname==0 && $order==1){
  $query= "SELECT * FROM doctor ORDER BY first DESC";
 }elseif($byname==1 && $order==0){
   $query= "SELECT * FROM doctor ORDER BY last ASC";
 }elseif($byname==1 && $order==1){
   $query= "SELECT * FROM doctor ORDER BY first DESC";
 } 
//echo "$query";
$result = mysqli_query($connection,$query);
if(!$result)
{
 die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	echo '<input type="radio" name="doctor" value="';
	echo $row["license"];
	echo '">' . $row["first"] . " " . $row["last"] . "<br>";
}
mysqli_free_result($result);
?>





