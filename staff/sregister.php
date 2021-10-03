<?php

require_once "config.php";
$query="SELECT * FROM staff";
$rooms=mysqli_query($link,$query);
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{

        $sql = "SELECT id FROM users1 WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);


            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 3){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }


    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){


        $sql = "INSERT INTO users1 (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);


            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);


            if(mysqli_stmt_execute($stmt)){

                echo  "<script>". "alert('Staff Account Created Successfully!')"."</script>";
                header("refresh:0.2;url=../index.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>

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
    <div class="wrapper"  style="margin-left:40vw;margin-top:20vh;border:2px ridge;">
        <h2>Add Staff Account</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label>UserID</label>
                <select class="" name="username" style="padding:10px;float:right;">
                  <?php  while($row1= mysqli_fetch_array($rooms)):;  ?>
                  <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
                <?php endwhile; ?>
                </select>

                <span class="help-block"><?php echo $username_err; ?></span>
<br><br><br>
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>

<br><br><br>
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>

<br>
                <input type="submit" class="btn btn-primary" value="Submit">



        </form>
    </div>
</body>
</html>
