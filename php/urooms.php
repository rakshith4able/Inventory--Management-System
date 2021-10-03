<?php
include 'config.php';
$query="SELECT * FROM rooms";
$rooms=mysqli_query($link,$query);
$query1="SELECT * FROM dept";
$rooms1=mysqli_query($link,$query1);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Rooms</title>
    <link rel="stylesheet" href="./css/istyles.css">
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


  <div style="overflow:auto;">
    <div class="menu">

        <a href="../index.php" class="active">Home</a>



    </div>

  </div>

    <div class="main">
      <div class="forms" style="height:35vh;margin-top:8%;">
        <form class="" action="../php/urooms.php" method="post">

          <label for="">Room NO:</label>
          <select class="" name="rno" style="padding:10px;float:right;">
            <?php  while($row= mysqli_fetch_array($rooms)):;  ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
          <?php endwhile; ?>
          </select>

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
            <?php  while($row= mysqli_fetch_array($rooms1)):;  ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
          <?php endwhile; ?>
          </select>
          <br><br><br>
      <input type="submit" id="submit" name="submit" value="submit">


        </form>
      </div>

      <h2 style="float:left;margin-left:26vw;color:red">
        <?php
        if(isset($_POST["submit"]))
        {
      error_reporting(0);
        include('config.php');

        $dno=$_POST["dno"];
        $rtype=$_POST["rtype"];
        $rno=$_POST["rno"];




        $query1="UPDATE rooms set dno=$dno  where roomno=$rno";
        $query2="UPDATE rooms set type='$rtype'  where roomno=$rno";
        if((!mysqli_query($link,$query1)) )
        {

        }
        else {
          if(!mysqli_query($link,$query2))
          {
            echo  "<script>". "alert('Update Failed')"."</script>";
              header('refresh:0.2;url=urooms.php');
          }
          else {
            echo  "<script>". "alert('updated Successfully')"."</script>";
              header('refresh:0.2;url=rooms.php');
          }

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
