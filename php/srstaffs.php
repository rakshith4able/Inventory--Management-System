<?php
error_reporting(0);
include('config.php');
$rno=$_POST["rno"];
$q1="SELECT * FROM staff WHERE sid='$rno';";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$rooms=mysqli_fetch_all($r1,MYSQLI_ASSOC);
$query="SELECT * FROM staff";
$room=mysqli_query($link,$query);



 ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Search Staffs</title>
      <link rel="stylesheet" href="./css/srstyles.css">
      <link rel="stylesheet" href="./css/sstyles.css">
      <style media="screen">
        body
        {
          background-image: url('../img/staff.jpg');
          background-size: cover;
        }
      </style>

 </head>
 <body>

   <div class="header">
     <h1 >Staffs</h1>
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
     <form class="" action="../php/srstaffs.php" method="post">

   <label for="">ID:</label>
   <select class="" name="rno" style="padding:10px;float:right;">
     <?php  while($row1= mysqli_fetch_array($room)):;  ?>
     <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
   <?php endwhile; ?>
   </select>
   <br><br>

   <input type="submit" id="submit" name="submit" value="submit">


     </form>

   </div>


         <?php if(isset($_POST["submit"])){?>

            <form style="margin-top:5%;margin-left:10%;">
              <table >
              <tr id="first">
                <td>ID</td>
                <td>Name</td>
                <td>Designation</td>
                <td>Address</td>
                <td>Contact</td>
              </tr>

         <?php
              foreach ($rooms as $room1) { ?>

                <tr >
                  <td><?php echo htmlspecialchars($room1['sid']);?></td>
                  <td><?php echo htmlspecialchars($room1['name']);?></td>
                  <td><?php echo htmlspecialchars($room1['designation']);?></td>
                  <td><?php echo htmlspecialchars($room1['address']);?></td>
                  <td><?php echo htmlspecialchars($room1['contact']);?></td>
                </tr>




            </table>

            </form>

         <?php } header('refresh:5;url=staffs.php'); } ?>






 </div>



     <div class="footer" style="margin-top:8.8%">
     <b> Copyrights 2019 </b>
     </div>

 </body>
 </html>
