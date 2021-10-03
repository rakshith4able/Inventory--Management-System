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
          background-image: url('../../img/class.jpg');
          background-size: cover;
        }
      </style>
  </head>
  <body>


      <div class="header">
        <h1 >Rooms</h1>
        <div class="header-right">
          <a class="active" href="../slogout.php">Sign Out</a>

        </div>
      </div>

        <div class="menu">
          <a href="../sindex.php" class="active">Home</a>
        </div>

<div class="main">
  <div class="but" >

<a href="srrooms.php"><button type="button" name="button">Search</button></a>

<a href="srooms.php" ><button type="button" name="button">Show</button></a>


</div>
</div>









      <div class="footer">
      <b> Copyrights 2019 </b>
      </div>


  </body>
  </html>
