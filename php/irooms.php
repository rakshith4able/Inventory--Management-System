<?php
include 'config.php';
$query="SELECT * FROM dept";
$rooms=mysqli_query($link,$query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Rooms</title>
    <link rel="stylesheet" href="./css/istyles.css">
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
    <h1 >Rooms</h1>
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
  <div class="forms" style="height:35vh;margin-top:8%;">
  <form class="" action="../php/irooms.php" method="post">

<label for="">Room NO:</label>
<input type="text" name="rno" value="">
<br><br>
<label for="">Type:</label>


  <select class="sel" name="rtype" style="padding:10px;float:right;">
    <option value="class">Class</option>
    <option value="class theatre">Class Theatre</option>
    <option value="lab">lab</option>
    <option value="staff">Staff</option>
  </select>


<br><br>
<label for="">Dept:</label>
<select class="" name="dno" style="padding:10px;float:right;">
  <?php  while($row= mysqli_fetch_array($rooms)):;  ?>
  <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
<?php endwhile; ?>
</select>
<br><br><br>
<input type="submit" id="submit" name="submit" value="submit">


  </form>
  </div>


<h2 style="float:left;margin-left:26vw;color:black">
<?php
if(isset($_POST["submit"]))
{
error_reporting(0);
include('config.php');
$rno=$_POST["rno"];
$rtype=$_POST["rtype"];
$dno=$_POST["dno"];

  $q2="INSERT INTO rooms values($rno,'$rtype',$dno)";

  if(mysqli_query($link,$q2))
{
    echo  "<script>". "alert('Added Successfully')"."</script>";
    header('refresh:0.2;url=rooms.php');
  }
  else {
      echo  "<script>". "alert('Room already exists')"."</script>";
    header('refresh:0.2;url=irooms.php');
  }
}


   ?>


</h2>
</div>





    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
