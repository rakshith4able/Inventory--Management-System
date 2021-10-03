<?php
error_reporting(0);
include('config.php');
$rno=$_POST["rno"];
$q1="SELECT * FROM dept WHERE dno=$rno;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$rooms=mysqli_fetch_all($r1,MYSQLI_ASSOC);
$query="SELECT * FROM dept";
$room=mysqli_query($link,$query);


 ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Search Departments</title>
      <link rel="stylesheet" href="./css/srstyles.css">
      <link rel="stylesheet" href="./css/sstyles.css">
      <style media="screen">
        body
        {
          background-image: url('../../img/department.jpg');
          background-size: cover;
        }
      </style>
 </head>
 <body>

   <div class="header">
     <h1 >Department</h1>
     <div class="header-right">
       <a class="active" href="../slogout.php">Sign Out</a>
     </div>
   </div>

   <div style="overflow:auto;">
     <div class="menu">

         <a href="../sindex.php" class="active">Home</a>



     </div>

   </div>


 <div class="main">
   <div class="forms" style="height:9vw;margin-top:8%;">
     <form class="" action="../php/srdepts.php" method="post">

   <label for="">Dept No:</label>
   <select class="" name="rno" style="padding:10px;float:right;">
     <?php  while($row= mysqli_fetch_array($room)):;  ?>
     <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
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
                <td>Dept no</td>
                <td>Dept Name</td>

              </tr>

         <?php
              foreach ($room as $room1) { ?>

                <tr >
                  <td><?php echo htmlspecialchars($room1['dno']);?></td>
                  <td><?php echo htmlspecialchars($room1['dname']);?></td>

                </tr>




            </table>

            </form>

         <?php } header('refresh:5;url=depts.php'); } ?>

 </div>



     <div class="footer" style="margin-top:8.8%">
     <b> Copyrights 2019 </b>
     </div>

 </body>
 </html>
