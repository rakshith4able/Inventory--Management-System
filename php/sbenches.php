<?php
include('config.php');
$q1="SELECT * FROM benches;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$benches=mysqli_fetch_all($r1,MYSQLI_ASSOC);



 ?>




 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Show Benches</title>
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
   <div class="forms" style="width:60vw;height:25vw;margin-top:5vw;border: none;;overflow-y:scroll;margin-left:20%;">
   <form >
     <table >
     <tr id="first">
       <td>Bench no</td>
       <td>Room No</td>
     </tr>

       <?php
     foreach ($benches as $bench) { ?>

       <tr >
         <td><?php echo htmlspecialchars($bench['benchno']);?></td>
         <td><?php echo htmlspecialchars($bench['roomno']);?></td>
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
