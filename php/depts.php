
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department</title>
    <link rel="stylesheet" href="./css/rstyles.css">
    <style media="screen">
      body
      {
        background-image: url('../img/department.jpg');
        background-size: ;
      }
      .but button
      {
        padding: 2vw;
        margin-left: 20%;
        margin-top: 0%;
        background-color: rgba(0, 0, 0, 0.6);
        color: white  ;

          border-style: hidden;

        font-size: 1vw;
        cursor: pointer;
      }


      .but  button:hover
      {

        background-color: rgba(255, 255, 255, 0.6);
        color: black;
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

      <div class="menu">
        <a href="../index.php" class="active">Home</a>
      </div>

<div class="main">
<div class="but" >


 <a href="idepts.php"> <button type="button" name="button">Add</button></a>
<a href="udepts.php"><button type="button" name="button">Update</button></a>
<br><br><br>
<a href="ddepts.php"><button type="button" name="button">Delete</button></a>
<a href="srdepts.php"><button type="button" name="button">Search</button></a>
<br><br><br>

<a href="sdepts.php" style="margin-left:22%;"><button type="button" name="button">Show</button></a>


</div>
</div>









    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>


</body>
</html>
