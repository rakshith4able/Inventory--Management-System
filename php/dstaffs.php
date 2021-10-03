


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Staffs</title>
    <link rel="stylesheet" href="./css/dstyles.css">
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

<div style="overflow:auto">
 <div class="menu">

     <a href="../index.php" class="active">Home</a>



 </div>
</div>


      <div class="main">
        <div class="forms" style="height:9vw;">
          <form class="" action="../php/dstaffs.php" method="post">

        <label for="">ID:</label>
        <input type="text" name="sid" value="">
       <br> <br>
        <input type="submit" id="submit" name="submit" value="submit">


          </form>

        </div>

        <h2 style="float:left;margin-left:26vw;color:red">
          <?php
          if(isset($_POST["submit"]))
          {
          include('config.php');
          error_reporting(0);
          $sid=$_POST["sid"];



          $query="DELETE FROM staff WHERE sid=$sid";

          if(!mysqli_query($link,$query))
          {

          }
          else {
            echo  "<script>". "alert('Deleted Successfully')"."</script>";
            header('refresh:0.2;url=staffs.php');
          }
        }

           ?>


         </h2>


      </div>






    <div class="footer" style="margin-top:8.8%;">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
