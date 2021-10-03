<?php
include 'config.php';
$query="SELECT * FROM dept";
$rooms=mysqli_query($link,$query);
 ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Rooms</title>
      <link rel="stylesheet" href="./css/rstyles.css">
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

        <div class="menu">
          <a href="../index.php" class="active">Home</a>
        </div>

<div class="main">
  <div class="but" >


   <a href="irooms.php"> <button type="button" name="button">Add</button></a>
 <a href="urooms.php"><button type="button" name="button">Update</button></a>
<br><br><br>
<a href="droom.php"><button type="button" name="button">Delete</button></a>
<a href="srrooms.php"><button type="button" name="button">Search</button></a>
<br><br><br>

<a href="srooms.php" style="margin-left:22%;"><button type="button" name="button">Show</button></a>


</div>
</div>









      <div class="footer">
      <b> Copyrights 2019 </b>
      </div>


  </body>
  </html>
