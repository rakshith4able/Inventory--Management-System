<?php
error_reporting(0);
include('config.php');
$bno=$_POST["bno"];
$q1="SELECT * FROM benches WHERE benchno=$bno;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$benches=mysqli_fetch_all($r1,MYSQLI_ASSOC);
$q="SELECT * FROM benches";
$rooms=mysqli_query($link,$query);
$bench=mysqli_query($link,$q);
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Benches</title>
     <link rel="stylesheet" href="./css/srstyles.css">
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
  <div class="forms" style="height:9vw;margin-top:8%;">
  <form class="" action="../php/srbenches.php" method="post">

<label for="">Bench NO:</label>
<select class="" name="bno" style="padding:10px;float:right;">
   <?php  while($row1= mysqli_fetch_array($bench)):;  ?>
   <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
 <?php endwhile; ?>
 </select>
<br><br>

<input type="submit" id="submit" name="submit" value="submit">


  </form>
  </div>




        <?php if(isset($_POST["submit"])){?>

           <form style="margin-top:5%;margin-left:20%;">
             <table >
             <tr id="first">
               <td>Bench no</td>
               <td>Room No</td>

             </tr>

        <?php
             foreach ($benches as $room1) { ?>

               <tr >
                 <td><?php echo htmlspecialchars($room1['benchno']);?></td>
                 <td><?php echo htmlspecialchars($room1['roomno']);?></td>

               </tr>




           </table>

           </form>

        <?php } header('refresh:5;url=benches.php'); } ?>


</div>



    <div class="footer" style="margin-top:8.8%">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
