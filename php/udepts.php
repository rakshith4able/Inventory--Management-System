<?php
include 'config.php';
$query="SELECT * FROM dept";
$rooms=mysqli_query($link,$query);
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Departments</title>
    <link rel="stylesheet" href="./css/istyles.css">
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


  <div style="overflow:auto;">
    <div class="menu">

        <a href="../index.php" class="active">Home</a>



    </div>

  </div>

    <div class="main">
      <div class="forms" style="height:35vh;margin-top:8%;">
      <form class="" action="../php/udepts.php" method="post">

    <label for="">Dept NO:</label>
    <select class="" name="cno" style="padding:10px;float:right;">
      <?php  while($row= mysqli_fetch_array($rooms)):;  ?>
      <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
    <?php endwhile; ?>
    </select>
    <br><br>
    <label for="">Dname</label>
     <input type="text" name="ctype" value="" required>
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





        $query1="UPDATE dept set dname='$ctype'  where dno=$cno;";

        if((!mysqli_query($link,$query1)) )
        {
            echo  "<script>". "alert('Update failed')"."</script>";
            header('refresh:0.2;url=udepts.php');
        }
        else {
              echo  "<script>". "alert('Updated Successfully')"."</script>";
              header('refresh:0.2;url=depts.php');
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
