<?php
include 'config.php';
$query="SELECT * FROM rooms";
$rooms=mysqli_query($link,$query);
$q="SELECT * FROM chairs";
$chairs=mysqli_query($link,$q);

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Chairs</title>
    <link rel="stylesheet" href="./css/dstyles.css">
    <style media="screen">
      body
      {
        background-image: url('../img/chair.jpg');
        background-size: cover;
      }
    </style>
</head>
<body>

  <div class="header">
    <h1 >Chairs</h1>
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
          <form class="" action="../php/dchairs.php" method="post">

        <label for="">Chair NO:</label>
        <select class="" name="cno" style="padding:10px;float:right;">
          <?php  while($row1= mysqli_fetch_array($chairs)):;  ?>
          <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
        <?php endwhile; ?>
        </select>
       <br> <br>
        <input type="submit" id="submit" name="submit" value="submit">


          </form>
        </div>

        <h2 style="float:left;margin-left:26vw;color:red">

         </h2>


      </div>


  <h2 style="float:left;margin-left:26vw;color:red">
    <?php
    if(isset($_POST["submit"]))
    {
    error_reporting(0);
    $cno=$_POST["cno"];



    $query="DELETE FROM chairs WHERE chairno=$cno";

    if(!mysqli_query($link,$query))
    {

    }
    else {
      echo  "<script>". "alert('Deleted Successfully')"."</script>";
        header('refresh:0.2;url=chairs.php');
    }

  } ?>
   </h2>



    <div class="footer" style="margin-top:8.8%;">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
