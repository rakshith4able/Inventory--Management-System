
<?php
include 'config.php';
$query="SELECT * FROM rooms";
$q="SELECT * FROM benches";
$rooms=mysqli_query($link,$query);
$benches=mysqli_query($link,$q);
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Move Benches</title>
     <link rel="stylesheet" href="./css/ostyles.css">
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
     <h1 >Move Benches</h1>
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
  <div class="forms" style="height:20vh;">
    <form class="" action="../php/mvbenches.php" method="post">

  <label for="">Bench NO:</label>
  <select class="" name="bno" style="padding:10px;float:right;">
     <?php  while($row1= mysqli_fetch_array($benches)):;  ?>
     <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
   <?php endwhile; ?>
   </select>
  <br> <br>
  <input type="submit" id="submit" name="submit" value="submit">


    </form>
  </div>

</div>





     <div class="footer">
     <b> Copyrights 2019 </b>
     </div>


 </body>
 </html>
