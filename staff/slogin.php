<?php

session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: sindex.php");
    exit;
}


require_once "../php/config.php";


$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password FROM users1 WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);


            $param_username = $username;


            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            session_start();


                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;


                            header("location: sindex.php");
                        } else{

                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{

                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }


        mysqli_stmt_close($stmt);
    }


    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <style type="text/css">
        body{ font: 14px sans-serif;
          background-image: url('../img/2.jpg');
          background-size: cover;
        }
        .wrapper{ width: 350px; padding: 20px;

        }
        h1
        {
          color: black;
          position:fixed;
           padding:3%;
           text-align:center;
           height: 10px ;
           width: 100%;
           margin-top: 0px;
           top:0;
        }

        .footer
        {
          background-color:rgba(255, 255, 255, 0);
          text-align:center;
          position: fixed;
          padding:10px;
          left:0;
          bottom: 0;
          color: black;
          width:100%;"

        }

      .wrapper
      {
        margin-left:40vw;
        margin-top:30vh;
        height: 330px;
        border:2px;
        border-style:ridge;
          background-color:rgba(255, 255, 255, 0.2);

      }
      input
      {
        width: 320px;;
        background: none;
        border: none;
        border-bottom: 2px solid white;
        padding: 10px;
        color: black;
      }

      h2
      {
        font-size: 30px;
      }
      input[type=submit]
      {

width:350px;
    margin-left:0;
    color:white;
    background-color: rgba(44, 219, 91,0.7);
    border:white;
      }

      .right
      {
        margin-left: 70%;
        margin-top: 7%;

      }

  .right  a
      {
        background-color: rgba(255, 13, 0, 0.5);
        color: black;
        text-decoration: none;
        padding:20px;

      }
    </style>
    <title>Login</title>
  </head>
<body>
  <div>

    <h1>INVENTORY MANAGEMENT SYSTEM</h1>
    <div class="right">
       <a href="../login.php">Admin Login</a>
    </div>

  </div>

    <div class="wrapper" style="margin-top:8%;">
        <h2 style="text-align:center;">Staff Login</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class=" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                <input   type="text" name="username"  value="<?php echo $username; ?>" placeholder="Username" autocomplete="off" >
<br><br><br>
            <p style="float:left;"><?php echo  $username_err;  ?></p>
            </div>
            <div class=" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <br><br><br>

                <input type="password" name="password" class="form-control" placeholder="Password">

                  <p style="float:left;"><?php echo  $password_err;  ?></p>
            </div>
<br><br><br>
            <div >
                <input type="submit" class="btn btn-primary" value="Login" >
            </div>


        </form>
    </div>


    <div class="footer" >© copyright 2019</div>

</body>
</html>
