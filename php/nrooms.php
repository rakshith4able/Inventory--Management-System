<?php
include('config.php');





$q1="SELECT count(*) as total FROM rooms;";
$q2="SELECT count(*) as total FROM staff;";
$r1=mysqli_query($link,$q1);
$r2=mysqli_query($link,$q2);
$resultcheck1=mysqli_num_rows($r1);
$resultcheck2=mysqli_num_rows($r2);
if ($resultcheck1>0) {

  while($row1 = mysqli_fetch_assoc($r1)){
  echo  $row1['total'] . "<br>";
}
}
 ?>
