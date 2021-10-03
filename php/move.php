
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Move items</title>

    <link rel="stylesheet" href="./css/mstyles.css">
    <style media="screen">
      body
      {
        background-image: url('../img/move.jpg');
        background-size: cover;
      }

      .but
      {
      width: 30vw;
      height: 5vh;
      margin-left:32% ;
      margin-top: 10%;;

      }

      .but button
      {
        padding: 2vw;
        margin-left: 20%;
        margin-top: 0%;
        background-color: rgba(255, 255, 255, 0.6);
        color: black  ;

          border-style: hidden;

        font-size: 1vw;
        cursor: pointer;
      }


      .but  button:hover
      {
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        text-decoration: none;
      }


    </style>
</head>
<body>

  <div class="header">
    <h1 >Move</h1>
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
  <div class="but" style="margin-top:25%;">


   <a href="mchairs.php"> <button type="button" name="button">Chairs</button></a>
   <a href="mbenches.php"><button type="button" name="button">Benches</button></a>


</div>
</div>





    <div class="footer">
    <b> Copyrights 2019 </b>
    </div>


</body>
</html>
