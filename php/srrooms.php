<?php
error_reporting(0);
include('config.php');

include 'config.php';
$query="SELECT * FROM rooms";
$room=mysqli_query($link,$query);

$rno=$_POST["rno"];
$q1="SELECT * FROM rooms r,dept d WHERE r.dno=d.dno and roomno=$rno;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$rooms=mysqli_fetch_all($r1,MYSQLI_ASSOC);



 ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Search Rooms</title>
      <link rel="stylesheet" href="./css/srstyles.css">
      <link rel="stylesheet" href="./css/sstyles.css">
      <style media="screen">
        body
        {
          background-image: url('../img/class.jpg');
          background-size: cover;
        }
      </style>
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
   <div class="forms" style="height:9vw;margin-top:8%;">
     <form class="" action="../php/srrooms.php" method="post">

   <label for="">Room NO:</label>
   <select class="" name="rno" style="padding:10px;float:right;">
     <?php  while($row= mysqli_fetch_array($room)):  ?>

     <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
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
       <td>Room no</td>
       <td>Type</td>
       <td>Dept</td>
     </tr>

<?php
     foreach ($rooms as $room1) { ?>

       <tr >
         <td><?php echo htmlspecialchars($room1['roomno']);?></td>
         <td><?php echo htmlspecialchars($room1['type']);?></td>
         <td><?php echo htmlspecialchars($room1['dname']);?></td>
       </tr>




   </table>

   </form>

<?php } header('refresh:5;url=rooms.php'); } ?>

     <div class="footer" style="margin-top:8.8%">
     <b> Copyrights 2019 </b>
     </div>

 </body>
 </html>
