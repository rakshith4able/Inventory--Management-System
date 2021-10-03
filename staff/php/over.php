<?php
include 'config.php';
$query="SELECT * FROM rooms";
$rooms=mysqli_query($link,$query);
 ?>





 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Overview</title>
     <link rel="stylesheet" href="./css/ostyles.css">
     <style media="screen">
       body
       {
         background-image: url('../../img/overview.jpg');
         background-size: cover;
       }
     </style>
   </head>
 <body>
   <div class="header">
     <h1 >Rooms Inventory</h1>
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
  <div class="forms" style="height:18vh;">
  <form class="" action="../php/oroom.php" action="../php/ovchairs.php" method="post">

<label for="">Room NO:</label>
<select class="" name="rno" style="padding:10px;float:right;">
  <?php  while($row= mysqli_fetch_array($rooms)):;  ?>
  <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
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
