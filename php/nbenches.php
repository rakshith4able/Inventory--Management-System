<?php


$q2="CALL `GetCount`();";
$r1=mysqli_query($link,$q1);


  while($row1 = mysqli_fetch_assoc($r1)){
  echo  $row1['total'] . "<br>";
}


 ?>
