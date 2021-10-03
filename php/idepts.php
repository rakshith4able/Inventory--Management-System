


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Departments</title>
    <link rel="stylesheet" href="./css/istyles.css">
    <style media="screen">
      body
      {
        background-image: url('../img/department.jpg');
        background-size: cover;
      }

      .forms
      {
        height: 50vh;
        margin-top: 20%;
        margin-left: 40%;
        width:23vw;
        padding: 2%;
      border-style:hidden;
        background-color: rgba(0, 0, 0, 0.7);
        font-size: 1.5vw;
        color: white
      }

      .forms input
      {
        float: right;
      border-radius: 6%;
        padding: .5vw;
      }

      #submit
      {
      border-radius: 10%;
      border-color: black;
      border-style: ridge;
      background: white;
      padding: .8vw;
      }

      #submit:hover
      {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        cursor: pointer;
      }

      .forms h1
      {
        float: left;
      }

      .forms a
      {
        margin-left: 0px;
        font-size: 2vw;
        color: black;
        text-decoration: none;
      }

      .forms a:hover
      {
        color: red;
        text-decoration: none;
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
  <div class="forms" style="height:13vw;margin-top:8%">
  <form class="" action="../php/idepts.php" method="post">

<label for="">Dept NO:</label>
<input type="text" name="bno" value="" required>
<br><br>
<label for=""> Dept Name:</label>
 <input type="text" name="rno" value="" required>
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


  $query="INSERT INTO dept values($bno,'$rno');";

  if(mysqli_query($link,$query))
{
    echo  "<script>". "alert('Added Successfully')"."</script>";
    header('refresh:0.2;url=depts.php');
  }
  else {
      echo  "<script>". "alert('Dept already exists')"."</script>";
    header('refresh:0.2;url=idepts.php');
  }
}


   ?></h2>


</div>




    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>

</body>
</html
