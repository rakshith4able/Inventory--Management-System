
<?php
include('config.php');
$q1="SELECT * FROM bmoved;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$benches=mysqli_fetch_all($r1,MYSQLI_ASSOC);



 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Benches</title>
    <link rel="stylesheet" href="./css/sstyles.css">
    <style media="screen">
      body
      {
        background-image: url('../img/bench.jpg');
        background-size: cover;
      }
    </style>

</head>
<body>

  <div class="header">
      <h1 >Benches</h1>
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
  <div class="forms" style="width:80vw;height:20vw;margin-top:5vw;margin-left:2vw;border:none;overflow-y:scroll;">
    <form >
      <table style="font-size:.8vw;">
      <tr id="first" >
        <td>Bench no</td>
        <td>Moved By</td>
        <td>Moved From</td>
        <td>Moved To</td>
        <td>Moved Date</td>
        <td>Reason</td>
          </tr>
    </form>


    <?php
  foreach ($benches as $bench) { ?>

    <tr>
      <td><?php echo htmlspecialchars($bench['benchno']);?></td>
      <td><?php echo htmlspecialchars($bench['movedby']);?></td>
      <td><?php echo htmlspecialchars($bench['movedfrom']);?></td>
      <td><?php echo htmlspecialchars($bench['movedto']);?></td>
      <td><?php echo htmlspecialchars($bench['movdate']);?></td>
      <td><?php echo htmlspecialchars($bench['reason']);?></td>
    </tr>

  <?php } ?>



  </table>

  </div>
</div>


    <div class="footer" style="margin-top:3.8%">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
