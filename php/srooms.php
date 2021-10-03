<?php
include('config.php');
$q1="CALL `showrooms`();";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$rooms=mysqli_fetch_all($r1,MYSQLI_ASSOC);



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <style media="screen">
    body
    {
      background-image: url('../img/class.jpg');
      background-size: cover;
    }
  </style>
    <meta charset="UTF-8">
    <title>Show Rooms</title>
    <link rel="stylesheet" href="./css/sstyles.css">

</head>

<body>
  <div class="header">
    <h1 >Rooms</h1>
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
  <div class="forms" style="width:60vw;height:25vw;margin-top:5vw;border: none;overflow-y:scroll;margin-left:20%;">
  <form>
    <table >
    <tr id="first">
      <td>Room no</td>
      <td>Type</td>
      <td>Dept</td>
    </tr>

      <?php
    foreach ($rooms as $room) { ?>

      <tr >
        <td><?php echo htmlspecialchars($room['roomno']);?></td>
        <td><?php echo htmlspecialchars($room['type']);?></td>
        <td><?php echo htmlspecialchars($room['dname']);?></td>
      </tr>

    <?php } ?>


  </table>

  </form>
    </div>
</div>




    <div class="footer" style="margin-top:3.8%">
    <b> Copyrights 2019 </b>
    </div>


</body>
</html>
