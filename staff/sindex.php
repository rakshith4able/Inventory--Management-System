<?php

session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:slogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./php/css/styles.css">
  <style media="screen">
    body
    {
      background-image: url('../img/3.jpg');
      background-size: cover;
    }
  </style>
</head>
<body>

<div class="header">
  <h1 >Staff Dashboard</b></h1>
  <div class="header-right">
    <a class="active" href="./slogout.php">Sign Out</a>
    <a href="./sreset-password.php">Reset Password</a>
  </div>
</div>

<div style="overflow:auto">
  <div class="menu">
    <a class="active" href="#">Home</a>
    <a href="./php/rooms.php">Rooms</a>
    <a href="./php/chairs.php">Chairs</a>
    <a href="./php/benches.php">Benches</a>
    <a href="./php/over.php">Overview</a>
    <a href="./php/logs.php">Logs</a>
    <a href="./php/staffs.php">Staff</a>
    <a href="./php/depts.php">Dept</a>
  </div>

<div style="overflow:auto">
  <div class="main">

        <div class="count">
          <h1>Count</h1>
          <a href="./php/srooms.php">  <h1>Rooms</a><span class="value"> <?php include('./php/nrooms.php'); ?></span></h1>
          <br>
          <a href="./php/schairs.php">  <h1>Chairs</a><span class="value"> <?php include('./php/nchairs.php'); ?></span></h1>
          <br>
          <a href="./php/sbenches.php">  <h1>Benches</a><span class="value"> <?php include('./php/nbench.php'); ?></span></h1>
        </div>

  </div>
</div>

</div>

<div class="footer">© copyright 2019</div>

</body>
</html>
