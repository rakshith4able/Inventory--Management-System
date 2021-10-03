<?php
include('config.php');
$rno=$_GET["rno"];
$q1="SELECT * FROM chairs where roomno=$rno;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$chairs=mysqli_fetch_all($r1,MYSQLI_ASSOC);



 ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Chairs</title>
    <link rel="stylesheet" href="./css/sstyles.css">
    <style media="screen">
      body
      {
        background-image: url('../img/chair.jpg');
        background-size: cover;
      }
    </style>

</head>
<body>


     <div class="header">
         <h1 >Chairs</h1>
       <div class="header-right">
         <a class="active" href="logout.php">Sign Out</a>
       </div>
     </div>


        <div style="overflow:auto;">
          <div class="menu">

              <a href="../index.php" class="active">Home</a>



          </div>

        </div>

<div class="main">
  <div class="form" style="width:60vw;height:25vw;margin-top:5vw;border: none;;overflow-y:scroll;margin-left:20%;">

  <form class="" >
    <table >
    <tr id="first">
      <td>Chair no</td>
      <td>Type</td>
      <td>Room No</td>
    </tr>


      <?php
    foreach ($chairs as $chair) { ?>

      <tr>
        <td><?php echo htmlspecialchars($chair['chairno']);?></td>
        <td><?php echo htmlspecialchars($chair['type']);?></td>
        <td><?php echo htmlspecialchars($chair['roomno']);?></td>
      </tr>

    <?php } ?>


  </table>

  </form>

    </div>
</div>






    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
