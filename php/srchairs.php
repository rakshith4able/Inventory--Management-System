<?php
error_reporting(0);
include('config.php');
$cno=$_POST["cno"];
$q1="SELECT * FROM chairs WHERE chairno=$cno;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$chairs=mysqli_fetch_all($r1,MYSQLI_ASSOC);
$q="SELECT * FROM chairs";
$chair=mysqli_query($link,$q);


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Chairs</title>
     <link rel="stylesheet" href="./css/srstyles.css">
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
  <div class="forms" style="height:9vw;margin-top:8%;">
    <form class="" action="../php/srchairs.php" method="post">

  <label for="">Chair NO:</label>
  <select class="" name="cno" style="padding:10px;float:right;">
    <?php  while($row1= mysqli_fetch_array($chair)):;  ?>
    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
  <?php endwhile; ?>
  </select>
  <br><br>

  <input type="submit" id="submit" name="submit" value="submit">


    </form>
</div>
    <div class="res">


      <?php if(isset($_POST["submit"])){?>

         <form style="margin-top:5%;margin-left:-100%;">
           <table >
           <tr id="first">
             <td>Chair no</td>
             <td>Type</td>
             <td>Room No</td>
           </tr>

      <?php
           foreach ($chairs as $room1) { ?>

             <tr >
               <td><?php echo htmlspecialchars($room1['chairno']);?></td>
               <td><?php echo htmlspecialchars($room1['type']);?></td>
               <td><?php echo htmlspecialchars($room1['roomno']);?></td>
             </tr>




         </table>

         </form>

      <?php } header('refresh:5;url=chairs.php'); } ?>


    </div>
</div>



    <div class="footer" style="margin-top:8.8%">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
