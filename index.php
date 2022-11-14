<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include ("connection.php");
//session naka login na
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    $get_record = mysqli_query($connection, "SELECT * FROM users WHERE user_id = '$user_id'");
    $row = mysqli_fetch_assoc($get_record);
     $user_type = $row["user_type"];

      if ($user_type == 1){
             echo "<script>window.location.href='Admin'</script>";

          }else {
              echo "<script>window.location.href='Secretary'</script>";
          }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Barangay Management System</title>
  <link rel="icon" href="logo_cell.jpg" type="image/gif" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<style type="text/css">
     #image {
    width:auto;
    height: auto;
    margin-bottom:5%;

}

</style>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center>Barangay Management System</center></div>
      <div class="card-body">
       <center><img src="logo_cell.jpg" id="image" style="width: 180px!important;border:20px;"></img></center>
        <form method="POST" action="index.php">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" autofocus="autofocus">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input type="submit" name="btnlogin" value="Login" class="btn btn-primary btn-block"/>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

<?php

$username = $password = "";
$usernameErr = $passwordErr = "";

include("connection.php");
    if(isset($_POST["btnlogin"])){
        if(empty($_POST["username"])){ 
          $usernameErr = " Username is required";
            echo "<script> alert('Please try again, Username is required'); window.location='index.php'; </script>";
        }else{
            $username = $_POST["username"];
        }
        if(empty($_POST["password"])){ 
            $passwordErr = "Password is required";
           echo "<script> alert('Please try again, Password is required'); window.location='index.php'; </script>";
        }else{
            $password = $_POST["password"];
        }
       
        if($username && $password){
            $check_username = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");//ok
            $check_username_row = mysqli_num_rows($check_username);
            if($check_username_row > 0 ){
                $row = mysqli_fetch_assoc($check_username);
                $db_password = $row["password"];//kunin ko yong password sa database kung equal
                $user_type = $row["user_type"];
                $user_id = $row["user_id"];
                $db_username = $row["username"];
                // kapag ang password ay equal sa database
                if($password == $db_password) {//papasok ako dito
                    $_SESSION["user_id"] = $user_id;
                    // kapang ang user ay 1 pupunta ako sa Admin nga folder
                    if ($user_type == 1){

                        mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_username','$db_username is logged in',NOW(),$user_id)");
                        echo "<script>window.location.href='Admin'</script>";///diretso sa admin
                    }else{
                         mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_username','$db_username is logged in',NOW(),$user_id)");
                        echo "<script>window.location.href='Secretary'</script>";
                    }
                }else {

                    echo "<script> alert('Please try again, Password is Incorrect!'); window.location='index.php'; </script>";

                }

            }else {

                echo "<script> alert('Please try again, Username is not registered!'); window.location='index.php'; </script>";
            }

        }

    }


?>