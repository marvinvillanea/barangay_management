<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  include("connection.php");
include("header.php");

if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    $get_record = mysqli_query($connection, "SELECT * FROM users WHERE user_id = '$user_id'");
    $row = mysqli_fetch_assoc($get_record);
    $db_first_name = $row["username"];
    $db_user_id = $row ["user_id"];
}else{
      echo "<script>window.location.href='../'</script>";

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
    <div id="admin"><?php echo "Welcome $db_first_name_session";?></div>
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
      <li class="nav-item ">
        <a class="nav-link" href="record.php">
          <i class="fas fa-fw fa fa-database"></i>
          <span>Record</span></a>
      </li>
      <li class="nav-item">
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
       <li class="nav-item active">
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
            <a href="record.php">Record</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

 
        <!-- DataTables -->
       
          <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-database"></i>
            Transaction</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>  
                      <th>Transaction Datetime</th>
                    <th>Name</th>
                    <th>Transaction Item</th>
                  
                    <th>Purpose</th>
                    <th>Release By:</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                     <th>Transaction Datetime</th>
                    <th>Name</th>
                    <th>Transaction Item</th>
                   
                    <th>Purpose</th>
                    <th>Release By:</th>
                  </tr>
                </tfoot>
                <tbody>
                     <?php 
                     include("connection.php");
                     
          $sel = "SELECT * FROM transaction INNER JOIN users ON transaction.user_id=users.user_id";
					$selqsl = mysqli_query($connection,$sel);
							
						while($i = $selqsl -> fetch_array()){
						 $release_by = $i[10];
						 $release_by_uc = ucfirst($release_by);
							echo "<tr>";
				  echo "<td>$i[3]</td>";
						echo "<td>$i[1]</td>";
						echo "<td>$i[2]</td>";
					
							echo "<td>$i[5]</td>";
							echo "<td>$release_by_uc</td>";
							echo "</tr>";
					
					} 
					
					
           ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"><!--update --></div>
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

</body>

</html>