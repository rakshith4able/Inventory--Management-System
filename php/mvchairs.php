

<?php
error_reporting(0);
include('config.php');

$cno=$_POST["cno"];
$q1="SELECT * FROM chairs where chairno=$cno;";
$r1=mysqli_query($link,$q1);
$resultcheck1=mysqli_num_rows($r1);
$chairs=mysqli_fetch_all($r1,MYSQLI_ASSOC);


$query="SELECT * FROM rooms";
$rooms=mysqli_query($link,$query);
$query="SELECT * FROM staff";
$staffs=mysqli_query($link,$query);
 ?>

 ?>




 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Move Chairs</title>
     <link rel="stylesheet" href="./css/ostyles.css">
     <style media="screen">
       body
       {
         background-image: url('../img/chair.jpg');
         background-size: cover;
       }
     </style>
     <style type="text/css">

         body{ font-family: sans-serif; text-align: center; }
     </style>
 </head>
 <body>

   <div class="header">
       <h1 >Move Chairs</h1>
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
  <div class="forms" style="height:48vh;margin-top:5vh;">
  <form class="" action="mvchairs.php" method="post">
    <label for="">Chair No:</label>
    <input type="text" name="cn" value="<?php echo $cno ?>" readonly>
<br><br>
<label for="">Move From:</label>
<input type="text" name="mf" value="<?php  foreach ($chairs as $chair) {
                                    echo htmlspecialchars($chair['roomno']);}?>
  " readonly>
<br> <br>
<label for="">Move To:</label>
<select class="" name="mt" style="padding:10px;float:right;">
  <?php  while($row= mysqli_fetch_array($rooms)):;  ?>
  <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
<?php endwhile; ?>
</select>
<br> <br>
<label for="">Moved By:</label>
<select class="" name="mb" style="padding:10px;float:right;">
  <?php  while($row1= mysqli_fetch_array($staffs)):;  ?>
  <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
<?php endwhile; ?>
</select>
<br> <br>
<label for="">Reason:</label>
<input type="text" name="rn" value=""  required>
<br> <br>

<input type="submit" id="submit" name="submit" value="submit">


  </form>
  </div>

<h1 style="color:red;margin-left:15vw;"><?php
  if(isset($_POST["submit"]))
  {
error_reporting(0);
include('config.php');
$cn=$_POST["cn"];
$mf=$_POST["mf"];
$mt=$_POST["mt"];
$mb=$_POST["mb"];
$rn=$_POST["rn"];


$query="INSERT INTO cmoved (chairno,movedby,movedfrom,movedto,reason) values($cn,'$mb',$mf,$mt,'$rn');";
$query2="UPDATE chairs set roomno=$mt  where chairno=$cn;";

if(!mysqli_query($link,$query))
{
 //echo "failed";
}
else {

}
if(!mysqli_query($link,$query2))
{
//  echo "failed";
}
else {
  echo  "<script>". "alert('Moved Successfully')"."</script>";
    header('refresh:0.2;url=mchairs.php');
}
}
?>
</h1>
</div>


 <div class="footer" style="margin-top:2vh;">
     <b> Copyrights 2019 </b>
     </div>


 </body>
 </html>
