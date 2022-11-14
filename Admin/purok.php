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
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
   <div id="forimage">
     <p class="help-block"><img class="img-responsive"  src="<?php echo "$profile_user"; ?>" style="width:200px;height:170px;border:2px solid black;margin:5%;border-radius:50%;" ></p>
            </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="addhouseholdhead.php">
          <i class="fas fa-fw fa fa-user icon-1"></i>
          <span>Add Household Head</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="record.php">
          <i class="fas fa-fw fa fa-database"></i>
          <span>Record</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="purok.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Purok</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="barangayfunctionaries.php">
          <i class="fas fa-fw fa fa-users icon-1"></i>
          <span>Barangay Functionaries</span></a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="report.php">
          <i class="fas fa-fw fa fa-file"></i>
          <span>Reports</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-fw fa fa-file"></i>
          <span>Transaction</span></a>
      </li>
      
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="purok.php">Purok</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- MOdal add leader -->
     
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add Purok Leader</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Purok Leader</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
          <form method="POST">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Purok No:</label>
                        <select name="prk_no" style="padding: 5x;" class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Purok Leader:</label>
                         <select name="prk_leader" style="padding: 5x;" class="form-control">
                          <?php
                  	$sel = mysqli_query($connection, "SELECT * FROM household_head");
      				
      				while ($i = $sel -> fetch_array()){
      				  $db_first_name_resident = $i['first_name'];
      				  $db_last_name_resident = $i['last_name'];
      				  $db_middle_name_resident = $i['middle_name'];
      				  $fullname_resident = ucfirst($db_first_name_resident)." ".ucfirst($db_middle_name_resident[0]).". ".ucfirst($db_last_name_resident);
      					echo "<option value='".$fullname_resident."'";
      					if (@$_POST['resident_id'] == $fullname_resident)
      							echo " selected";
      							echo ">$fullname_resident</option>";
      				}
                          ?>
                  </select>
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" class="btn btn-primary" value="Add Leader"/>
          </form>
                      <?php 
                if (isset($_POST['add'])){
                    $prk_no = $_POST['prk_no'];
                    $prk_leader = $_POST['prk_leader'];
                  
                    if (empty($prk_no)){
                      echo "<script> alert('Purok No. is Required!')</script>";
                    }else {
                      $prk_no = $_POST['prk_no'];
                    }
                     if (empty($prk_leader)){
                      echo "<script> alert('Purok Leader is Required!')</script>";
                    }else {
                      $prk_leader = $_POST['prk_leader'];
                    }
                  if ($prk_no &&  $prk_leader){
                    /// check purok leader is exist
                    $check = "SELECT * FROM purok WHERE purok_no = '$prk_no'";
                    $checkdata = mysqli_query($connection,$check);
                    $checknumdata = mysqli_num_rows($checkdata);
                    $check_numrow_data_purok = "SELECT * FROM purok";
                    $check_querY_data_purk = mysqli_query($connection,$check_numrow_data_purok);
                    $check_num_row_data_purok = mysqli_num_rows($check_querY_data_purk);
                    if ($checknumdata > 0) {
                       echo "<script> alert('Leader has been already registered!');window.location='purok.php'; </script>";
                    }else {
                        
                      if ($check_num_row_data_purok === 7) {
                        echo "<script> alert('Purok Leader has been already full!'); </script>";
                         
                      }else {
                         $addsql = mysqli_query($connection,"INSERT INTO purok (purok_no,purok_leader,user_id) VALUES ('$prk_no','$prk_leader','$db_user_id')");
                                     
                          if ($addsql === TRUE) {
                      mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_first_name','$prk_leader Purok Leader is Registered',NOW(),$user_id)");
                    
                    echo "<script> alert('$prk_leader Purok Leader has been successfully registered'); </script>";
                      }
                    
                      }
                   }
               }
                }
                  ?>
                  </div>
                </div>
              </div>
            </div>
         <!--tables -->   
         <br>
         <br>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Purok List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                  <tr>
                    <th>Purok No</th>
                    <th>Purok Leader</th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Purok No</th>
                    <th>Purok Leader</th>
                    <th><center>Action</center></th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php 
                   $sel = "SELECT * FROM purok";
        					$selqsl = mysqli_query($connection,$sel);
        							
        						while($i = $selqsl -> fetch_array()){
        							echo "<tr>";
        							echo "<td>$i[1]</td>";
        							echo "<td>$i[2]</td>";
        						    	echo "<Td>
        							    <center>
        							    <a href='deleteprk.php?prk_id=$i[0]' data-toggle='tooltip' title='Delete' ><i class='fa fa-trash'style='font-size:17px' ></i></a>
        							    </center>
        							</td>";
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
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

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
