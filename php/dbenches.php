<?php
include 'config.php';
$query="SELECT * FROM rooms";
$q="SELECT * FROM benches";
$rooms=mysqli_query($link,$query);
$benches=mysqli_query($link,$q);
 ?>




 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Delete Benches</title>
     <link rel="stylesheet" href="./css/dstyles.css">
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

<div style="overflow:auto">
  <div class="menu">

      <a href="../index.php" class="active">Home</a>



  </div>
</div>


       <div class="main">
         <div class="forms" style="height:9vw;">
         <form class="" action="../php/dbenches.php" method="post">

       <label for="">Bench NO:</label>
       <select class="" name="bno" style="padding:10px;float:right;">
          <?php  while($row1= mysqli_fetch_array($benches)):;  ?>
          <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
        <?php endwhile; ?>
        </select>
      <br> <br>
       <input type="submit" id="submit" name="submit" value="submit">


         </form>
         </div>

         <h2 style="float:left;margin-left:26vw;color:red">
           <?php
           if(isset($_POST["submit"])){
           include('config.php');
           error_reporting(0);
           $bno=$_POST["bno"];



           $query="DELETE FROM benches WHERE benchno=$bno";

           if(!mysqli_query($link,$query))
           {

           }
           else {
             echo  "<script>". "alert('Deleted Successfully')"."</script>";
             header('refresh:0.2;url=benches.php');
           }

            ?>
          </h2>


       </div>


   <h2 style="float:left;margin-left:50vw;color:red">
     <?php
     include('config.php');
     error_reporting(0);
     $bno=$_POST["bno"];



     $query="DELETE FROM benches WHERE benchno=$bno";

     if(!mysqli_query($link,$query))
     {

     }
     else {
       echo "Deleted Successfully!!";
     }
}
      ?>
    </h2>



     <div class="footer" style="margin-top:8.8%;">
     <b> Copyrights 2019 </b>
     </div>

 </body>
 </html
