<?php
include 'config.php';
$query="SELECT * FROM dept";
$rooms=mysqli_query($link,$query);
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Department</title>
    <link rel="stylesheet" href="./css/dstyles.css">
    <style media="screen">
      body
      {
        background-image: url('../img/department.jpg');
        background-size: cover;
      }
    </style>

</head>
<body>

  <div class="header">
    <h1 >Department</h1>
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
          <form class="" action="../php/ddepts.php" method="post">

        <label for="">Department</label>
        <select class="" name="rno" style="padding:10px;float:right;">
          <?php  while($row= mysqli_fetch_array($rooms)):;  ?>
          <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
        <?php endwhile; ?>
        </select>
       <br> <br>
        <input type="submit" id="submit" name="submit" value="submit">


          </form>

        </div>

        <h2 style="float:left;margin-left:26vw;color:red">
          <?php
            if(isset($_POST["submit"]))
            {

          error_reporting(0);
          $rno=$_POST["rno"];



          $query="DELETE FROM dept WHERE dno=$rno";

          if(!mysqli_query($link,$query))
          {

          }
          else {
            echo  "<script>". "alert('Deleted Successfully')"."</script>";
            header('refresh:0.2;url=depts.php');
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
