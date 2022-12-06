<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php"); include("header.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Barangay Management System</title>
  <link rel="icon" href="../logo_cell.jpg" type="image/gif" sizes="16x16">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<style type="text/css">

    #image {
    width:auto;
    height: auto;
    margin-top:10%;
    margin-left:5%;
}
#admin {

    color:white;
}
  #forimage {
    width:201px;
    height:140px;
    border:1px solid gray;
}
body { background: gray !important; }
</style>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Barangay Management System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
     <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <div class="input-group-append">
        </div>
      </div>
    </form>
    <!-- Navbar -->
    <div id="admin"><?php echo "Welcome $db_first_name";?></div>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="manage.php">Manage Account</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
      <!-- modal  -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add Account</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap">Change Email</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="@getbootstrap">Change Password</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User's</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" >
                      <div class="form-row">
                            <div class="col-md-6">
                              <div class="form-label-group">
                                Profile Photo:
                            <div id="forimage" style="margin:5px;">
                            <p class="help-block"><img id="show_photo_preview" style="border:1px solid black;"></p>
                              </div>
                              <input type="file" name="photo" id="preview_photo"  required>
                            </div>
                          </div>

                          </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Username:</label>
                        <input type="text" name="username" value=""  class="form-control" placeholder="Username"/>
                      </div>
                       <div class="form-group">
                        <label for="message-text" class="col-form-label">Password:</label>
                        <input type="password" name="pswd" value=""  class="form-control"  placeholder="Password"/>
                      </div>
                       <div class="form-group">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email" value=""  class="form-control" placeholder="Email"/>
                      </div>
                      
                       <div class="form-group">
                        <select name="user_type" style=" padding: 10px;">
                          <option>User Type</option>
                          <option name="user_type"  value="1">Admin</option>
                          <option  name="user_type" value="0">Secretary</option>
                        </select>
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" class="btn btn-primary" value="Add Account"/>
                    </form>
                      <?php 
                if (isset($_POST['add'])){
                   
                    $pswd = trim($_POST['pswd']);
                    $username = trim($_POST['username']);
                    $email = trim($_POST['email']);
                    $user_type = $_POST['user_type'];
                    
                      $photo_tmp = $_FILES['photo']['tmp_name'];
                    $photo_filename = $_FILES['photo']['name'];
                    $destination = "uploads/".$_POST['first_name'].'-'.$photo_filename;
                    move_uploaded_file($photo_tmp, $destination);
                    
                    if(empty($username)){
                       echo "<script> alert('Username is Required!'); </script>";
                    }else {
                      $username = trim($_POST['username']);
                    }
                    if(empty($pswd)){
                      echo "<script> alert('Password is Required!'); </script>";
                    }else {
                      $pswd = trim($_POST['pswd']);
                    }
                    if(empty($email)){
                      echo "<script> alert('Email is Required!'); </script>";
                    }else {
                      $email = trim($_POST['email']);
                    }
                  
                    $selec_user = "SELECT * FROM users WHERE username='$username' OR password='$pswd'";
                    $slq_user = mysqli_query($connection,$selec_user);
                    $check_user_account = mysqli_num_rows($slq_user);
                      
                     if ($check_user_account > 0) {
                      
                      while ($i = $slq_user ->fetch_array()){
                        $db_username = $i['username'];
                        $db_password = $i['password'];
                      }
                      if ($db_username === $username){
                        echo "<script> alert('Username is already existed!');window.location='manageallaccount.php';  </script>";
                      }
                        if ($db_password === $pswd){
                          echo "<script> alert('Password is already existed!');window.location='manageallaccount.php';  </script>";
                        }
      
                     }else {

                   $tru = mysqli_query($connection,"INSERT INTO users(username, password, email, user_type,profile_user) VALUES ('$username','$pswd','$email','$user_type','$destination')");
                    
                    if ($tru === TRUE){
                        mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_first_name','$username is Registered',NOW(),$user_id)");
                    echo "<script> alert('$username Successfully is Registered'); </script>";
                    }
                      
                    }
               
                 }
                  ?>
                  </div>
                </div>
              </div>
            </div>
        
        <!-- DataTables Example -->
          <bR>
            <br>
          <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Accounts</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>User Type</th>
                   <th><center>Action</center></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th><center>Action</center></th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php 
                   $sel = "SELECT * FROM users";
        					$selqsl = mysqli_query($connection,$sel);
        							
        						while($i = $selqsl -> fetch_array()){
        						  $ucusername = ucfirst($i[1]);
        						  $ucemail = ucfirst($i[3]);
        						  $md5 = md5($i[2]);
        							echo "<tr>";
        							echo "<td>$ucusername</td>";
        							echo "<td>$md5</td>";
        							echo "<td>$ucemail</td>";
        						  echo "<Td>$i[4]</td>";
        						   echo "<Td> <center>
        							    <a href='deleteuser.php?user_id=$i[0]'  data-toggle='tooltip' title='Delete'><i class='fa fa-trash'style='font-size:17px' ></i></a>
        							    </center></td>";
        						echo "</tr>";
        						
        					} 
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <?php include("nav.php"); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</body>

</html>
<?php 

include("footer.php");
?>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="message-text" class="col-form-label">Old Email:</label>
            <input type="email" name="change_old_email" value=""  class="form-control" placeholder="Email"/>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">New Email:</label>
            <input type="email" name="change_email" value=""  class="form-control" placeholder="Email"/>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password:</label>
            <input type="password" name="change_pswd" value=""  class="form-control"  placeholder="Password"/>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="change_email_buttoin" class="btn btn-primary" value="Save"/>
        </form>
          <?php
          
        if (isset($_POST['change_email_buttoin'])){
            
            $change_email = trim($_POST['change_email']);
            $change_old_email = trim($_POST['change_old_email']);
            $change_pswd = trim($_POST['change_pswd']);
      
            if(empty($change_pswd)){
              echo "<script> alert('Password is Required!'); </script>";
            }else {
              $pswd = trim($_POST['change_pswd']);
            }
            if(empty($change_email)){
              echo "<script> alert('Email is Required!'); </script>";
            }else {
              $email = trim($_POST['change_email']);
            }

            if(empty($change_old_email)){
              echo "<script> alert('Old Email is Required!'); </script>";
            }else {
              $change_old_email = trim($_POST['change_old_email']);
            }
            
            $selec_user = "SELECT * FROM users WHERE email='$change_old_email' and password = '$pswd' ";
            $slq_user = mysqli_query($connection,$selec_user);
            $check_user_account = mysqli_num_rows($slq_user);
              
            if ($check_user_account > 0) {
            
              $getUserIfExist = "SELECT * FROM users WHERE email='$change_email'  ";
              $data = mysqli_query($connection,$getUserIfExist);
              $check_email = mysqli_num_rows($data);

              if ($check_email > 0) {
                echo "<script> alert('Email already exist!'); </script>";
              } else {
                    $row = mysqli_fetch_assoc($slq_user);
                    $update = "update  users set email = '$change_email' where user_id = ".$row["user_id"]." "; 
                    mysqli_query($connection,$update);
                    echo "<script> alert('Successfuly updated'); </script>";
                    $_POST = array();
                    // echo "<script> location.reload(); </script>";
                  
              }

            }else {
              // echo "<script> alert('Wrong Credentials'); </script>";
            }
    
          }
      ?>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="message-text" class="col-form-label">Old Password:</label>
            <input type="password" name="change_password_old" value=""  class="form-control" />
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">New Password:</label>
            <input type="password" name="change_password_new" value=""  class="form-control" />
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="change_password_button" class="btn btn-primary" value="Save"/>
        </form>
          <?php
      
        if (isset($_POST['change_password_button'])){
            
            $change_password_old = trim($_POST['change_password_old']);
            $change_password_new = trim($_POST['change_password_new']);
         
            if(empty($change_password_old)){
              echo "<script> alert('Old Password is Required!'); </script>";
            }else {
              $change_password_old;
            }

            if(empty($change_password_new)){
              echo "<script> alert('New Password is Required!'); </script>";
            }else {
              $change_password_new;
            }
            
            $selec_user = "SELECT * FROM users WHERE user_id = ".$db_user_id." and password = '".$change_password_old."' ";
            $slq_user = mysqli_query($connection,$selec_user);
            $check_user_account = mysqli_num_rows($slq_user);
              
            if ($check_user_account > 0) {
            
              $update = "update  users set password = '$change_password_new' where user_id = ".$db_user_id." "; 
              mysqli_query($connection,$update);
              echo "<script> alert('Successfuly updated'); </script>";

            }else {
              // echo "<script> alert('Wrong Credentials'); </script>";
            }
    
          }
      ?>
      </div>
    </div>
  </div>
</div>