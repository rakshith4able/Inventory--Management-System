<?php
include('config.php');
$q1="SELECT * FROM dept;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$chairs=mysqli_fetch_all($r1,MYSQLI_ASSOC);



 ?>






  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Show Departments</title>
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
    <div class="forms" style="width:60vw;height:25vw;margin-top:5vw;border: none;;overflow-y:scroll;margin-left:20%;">
    <form >
      <table >
      <tr id="first">
        <td>Dept No</td>
        <td>Dept Name</td>
      </tr>

        <?php
      foreach ($chairs as $chair) { ?>

        <tr >
          <td><?php echo htmlspecialchars($chair['dno']);?></td>
          <td><?php echo htmlspecialchars($chair['dname']);?></td>
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
