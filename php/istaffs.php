



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staffs</title>
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
  <div class="forms" style="height:23vw;margin-top:8%">
  <form class="" action="../php/istaffs.php" method="post">

<label for="">ID:</label>
<input type="text" name="sid" value="" required>
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

  <h2 style="float:left;margin-left:26vw;color:red"><?php
if(isset($_POST["submit"]))
{
  error_reporting(0);
  include('config.php');

  $sid=$_POST["sid"];
  $name=$_POST["name"];
  $mob=$_POST["mob"];
  $desig=$_POST["desig"];
  $addr=$_POST["addr"];

  $query="INSERT INTO staff values('$sid','$name','$desig','$addr','$mob')";

  if(mysqli_query($link,$query))
  {
    echo  "<script>". "alert('Added Successfully')"."</script>";
    header('refresh:0.2;url=staffs.php');
  }
  else {
      echo  "<script>". "alert('Staff  already exists')"."</script>";
    header('refresh:0.2;url=istaffs.php');
  }
  }



   ?></h2>


</div>




    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html
