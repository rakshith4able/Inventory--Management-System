<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

require_once "config.php";

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_password"])) < 3){
        $new_password_err = "Password must have atleast 3 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty($new_password_err) && empty($confirm_password_err)){

        $sql = "UPDATE users1 SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);


            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];


            if(mysqli_stmt_execute($stmt)){

                session_destroy();
                header("location: slogin.php");
                exit();
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
    <title>Reset Password</title>

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
</head>
<body>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            <br><br>

                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
          <br><br>

                <input type="submit" class="btn btn-primary" value="Submit">
                <br><br>
                <a class="btn btn-link" href="sindex.php">Cancel</a>

        </form>
    </div>
</body>
</html>
