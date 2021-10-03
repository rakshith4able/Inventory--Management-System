<?php
include 'config.php';
$query="SELECT * FROM staff";
$rooms=mysqli_query($link,$query);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Staffs</title>
    <link rel="stylesheet" href="./css/istyles.css">
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


  <div style="overflow:auto;">
    <div class="menu">

        <a href="../index.php" class="active">Home</a>



    </div>

  </div>

    <div class="main">
      <div class="forms" style="height:52vh;margin-top:8%;">
        <form class="" action="../php/ustaffs.php" method="post">

      <label for="">ID:</label>
      <select class="" name="sid" style="padding:10px;float:right;">
        <?php  while($row1= mysqli_fetch_array($rooms)):;  ?>
        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
      <?php endwhile; ?>
      </select>
      <br><br>

      <label for="">Name:</label>
       <input type="text" name="name" value="" required>
      <br><br>
      <label for="">Designation:</label>
      <select class="" name="desig">
        <option value="Professor">Professor</option>
        <option value="Attender">Attender</option>
        <option value="HOD">HOD</option>

      </select>
      <br><br>
      <label for="">Address:</label>
       <input type="text" name="addr" value="" required>
      <br><br>
      <label for="">Contact:</label>
       <input type="text" name="mob" value="" required>
      <br><br>
      <input type="submit" id="submit" name="submit" value="submit">


        </form>
      </div>

      <h2 style="float:left;margin-left:26vw;color:red">
        <?php
      error_reporting(0);
      if(isset($_POST["submit"]))
      {
        include('config.php');

        $sid=$_POST["sid"];
        $name=$_POST["name"];
        $mob=$_POST["mob"];
        $desig=$_POST["desig"];
        $addr=$_POST["addr"];
        $q1="UPDATE staff set name='$name'  where sid='$sid';";
        $q2="UPDATE staff set contact='$mob'  where sid='$sid';";
        $q3="UPDATE staff set designation='$desig'  where sid='$sid';";
        $q4="UPDATE staff set address='$addr'  where sid='$sid';";
        if((mysqli_query($link,$q1))&&(mysqli_query($link,$q2))&&(mysqli_query($link,$q3))
        && (mysqli_query($link,$q4)))
        {
          echo  "<script>". "alert('Updated Successfully')"."</script>";
            header('refresh:0.2;url=staffs.php');

        }

        else {

            echo  "<script>". "alert('Update failed')"."</script>";
              header('refresh:0.2;url=ustaffs.php');
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
