<?php
include 'config.php';
$query="SELECT * FROM rooms";
$rooms=mysqli_query($link,$query);
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Benches</title>
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
  <div class="forms" style="height:13vw;margin-top:8%">
  <form class="" action="../php/ibenches.php" method="post">

<label for="">Bench NO:</label>
<input type="text" name="bno" value="">
<br><br>
<label for=""> Room no:</label>
<select class="" name="rno" style="padding:10px;float:right;">
  <?php  while($row= mysqli_fetch_array($rooms)):;  ?>
  <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
<?php endwhile; ?>
</select>

<br><br>
<input type="submit" id="submit" name="submit" value="submit">


  </form>
  </div>

  <h2 style="float:left;margin-left:26vw;color:red"><?php
  if(isset($_POST["submit"]))
  {
  error_reporting(0);
  include('config.php');

  $bno=$_POST["bno"];
  $rno=$_POST["rno"];


  $query="INSERT INTO benches values($bno,$rno);";

  if(mysqli_query($link,$query))
  {
    echo  "<script>". "alert('Added Successfully')"."</script>";
    header('refresh:0.2;url=benches.php');
  }
  else {
    echo  "<script>". "alert('Bench already exists')"."</script>";
  header('refresh:0.2;url=ibenches.php');
  }
}

   ?></h2>


</div>




    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html>
