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
    <title>Update Chairs</title>
    <link rel="stylesheet" href="./css/istyles.css">
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


  <div style="overflow:auto;">
    <div class="menu">

        <a href="../index.php" class="active">Home</a>



    </div>

  </div>

    <div class="main">
      <div class="forms" style="height:25vh;margin-top:8%;">
      <form class="" action="../php/uchairs.php" method="post">

    <label for="">Chair NO:</label>
    <select class="" name="cno" style="padding:10px;float:right;">
      <?php  while($row1= mysqli_fetch_array($chairs)):;  ?>
      <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
    <?php endwhile; ?>
    </select>
    <br><br>
    <label for="">Type:</label>
    <select  name="ctype" style="padding:10px;float:right;">
      <option value="com">com</option>
      <option value="wooden">wooden</option>
      <option value="easy">Easy</option>
      <option value="iron">iron</option>

    </select>
    <br><br>
    <input type="submit" id="submit" name="submit" value="submit">


      </form>
      </div>

      <h2 style="float:left;margin-left:26vw;color:red">
        <?php
        if(isset($_POST["submit"]))
        {
      error_reporting(0);
        include('config.php');

        $cno=$_POST["cno"];
        $ctype=$_POST["ctype"];
        $query1="UPDATE chairs set type='$ctype'  where chairno=$cno";
        if((!mysqli_query($link,$query1)) )
        {
          echo  "<script>". "alert('Update failed')"."</script>";
            header('refresh:0.2;url=ichairs.php');
        }
        else {

          echo  "<script>". "alert('Updated Successfully')"."</script>";
            header('refresh:0.2;url=chairs.php');
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
