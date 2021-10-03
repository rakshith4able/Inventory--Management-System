<?php
error_reporting(0);
  include('config.php');
  $rno=$_POST["rno"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overview Items</title>
    <link rel="stylesheet" href="./css/ostyles.css">
    <style media="screen">
      body
      {
        background-image: url('../../img/class.jpg');
        background-size: cover;
      }
    </style>
</head>
<body>

  <div class="header">
      <h1 >Overview Items</h1>
    <div class="header-right">
      <a class="active" href="../slogout.php">Sign Out</a>
    </div>
  </div>


        <div style="overflow:auto;">
          <div class="menu">

              <a href="../sindex.php" class="active">Home</a>



          </div>

        </div>
  <br><br>

<div class="main">
  <div class="forms" style="margin-top:0;height:20vw;width:25vw;">
  <form class="" action="../php/oroom.php" action="../php/ovchairs.php" method="post" >

  <h1 style="font-size:2vw;font-weight:lighter;">Room No:<span class="value"><?php echo $rno; ?></span></h1>
  <br>
        <h1 style="font-size:2vw;font-weight:lighter;"><a href="ovchairs.php?rno=<?php echo $rno; ?>" target="_blank" onclick="<?php  ?>">No of Chairs:</a><span class="value" style="font-size:2.5vw;"> <?php

          $rno=$_POST["rno"];
        $q1="SELECT count(*) as total FROM chairs where roomno=$rno;";
        $r1=mysqli_query($link,$q1);
        $resultcheck1=mysqli_num_rows($r1);
        if ($resultcheck1>0) {

          while($row1 = mysqli_fetch_assoc($r1)){
          echo  $row1['total'] . "<br>";
        }
        }

         ?>
    </span></h1>
        <h1 style="font-size:2vw;font-weight:lighter;"><a  href="ovbenches.php?rno=<?php echo $rno; ?>" target="_blank">No of Benches:</a><span class="value" style="font-size:2.5vw;"> <?php
        $q1="SELECT count(*) as total FROM benches where roomno=$rno;";
        $r1=mysqli_query($link,$q1);
        $resultcheck1=mysqli_num_rows($r1);
        if ($resultcheck1>0) {

          while($row1 = mysqli_fetch_assoc($r1)){
          echo  $row1['total'] . "<br>";
        }
        }

         ?>
    </span></h1>


  </form>
  </div>

</div>



    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html
