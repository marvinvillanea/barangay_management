<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
include("header.php");

                    $show = "SELECT * FROM household_head WHere house_head='family member';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum1 = mysqli_num_rows($showsql);
                   
                    $show = "SELECT * FROM household_head WHere house_head='house head';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
                    
                    $total = $showdatanum + $showdatanum1;
                    
                   $slec_fam2 = "SELECT * FROM household_head where house_status = 'Owner'";
                   $mysqli2 = mysqli_query($connection,$slec_fam2);
                  $mysqli_nu2 = mysqli_num_rows($mysqli2);
                  
                    $slec_fam3 = "SELECT * FROM household_head where house_status = 'Rent'";
                   $mysqli3 = mysqli_query($connection,$slec_fam3);
                  $mysqli_nu3 = mysqli_num_rows($mysqli3);
                  
$dataPoints = array( 
    array("y" => $total,"label" => "Total of Population" ),
    	array("y" => $showdatanum,"label" => "Household Head " ),
	       array("y" => $showdatanum1,"label" => "Family Member" ),
	          array("y" => $mysqli_nu2,"label" => "House Owner" ),
              	array("y" => $mysqli_nu3,"label" => "House Rent" ),

);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gimangpang Management System</title>
  <link rel="icon" href="../logo_cell.jpg" type="image/gif" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<style type="text/css">


#admin {

    color:white;
}
.sidebar{
  background-color: gray;
}
   
}
body { background: gray !important; }
</style>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text:  "Population of Residential "
	},
	axisY: {
	title:  "Barangay Management System",

	},
	data: [{
		type: "bar",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Gimangpang Management System</a>

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
   <div id="admin"> <?php echo "Welcome $db_first_name";?></div>
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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link " href="addhouseholdhead.php">
          <i class="fas fa-fw fa fa-user icon-1"></i>
          <span>Add Household Head</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="record.php">
          <i class="fas fa-fw fa fa-database"></i>
          <span>Residents</span></a>
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
       <li class="nav-item">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-fw fa fa-file"></i>
          <span>Transaction</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blotter.php">
          <i class="fas fa-fw fa fa-file"></i>
          <span>Blotter</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="announcement.php">
          <i class="fas fa-fw fa fa-file"></i>
          <span>Announcement</span></a>
      </li>
      
      
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          
             <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                   <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                         <?php 
                    include("connection.php");
                    $show = "SELECT * FROM household_head WHere house_head='family member';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum1 = mysqli_num_rows($showsql);
                   
                    $show = "SELECT * FROM household_head WHere house_head='house head';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
                    
                    $total = $showdatanum + $showdatanum1;
                    
                    echo "<centeR><h5>".$total. " Residents Total"."</h5></centeR>";
                  ?>
                </div>
              </div>
             <a href="viewall.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-fw fa fa-users icon-1"></i>
               </a>
              </a>
            </div>
          </div>
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-user icon-1"></i>
                </div>
                <div class="mr-5">
                  <?php 
                    include("connection.php");
                    $show = "SELECT * FROM household_head WHere house_head='house head ';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
                    echo "".$showdatanum." Household Head"."";
                  ?>
                </div>
              </div>
              <a href="viewhead.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-fw fa fa-user icon-1"></i>
                </span>
              </a>
            </div>
          </div>
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                   <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                          <?php 
                    include("connection.php");
                    $show = "SELECT * FROM household_head WHere house_head='family member';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum1 = mysqli_num_rows($showsql);
                  
                     echo "".$showdatanum1." Family Member"."";
                  ?>
                </div>
              </div>
             <a href="viewallfamilymember.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-fw fa fa-users icon-1"></i>
               </a>
              </a>
            </div>
          </div>
          
            <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-home icon-1"></i>
                </div>
                <div class="mr-5">
                  <?php 
                    include("connection.php");
                    $show = "SELECT * FROM household_head WHere house_status='Owner';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
              
                    echo "".$showdatanum." House Owner"."";
                  ?>
                </div>
              </div>
              <a href="owner.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-fw fa fa-home icon-1"></i>
                </span>
              </a>
            </div>
          </div>
          
           
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                   <i class="fas fa-fw fa fa-home icon-1"></i>
                </div>
                <div class="mr-5">
                          <?php 
                    include("connection.php");
                    $show = "SELECT * FROM household_head WHere house_status='Rent';";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
                 
                     echo "".$showdatanum." Family Rent"."";
                  ?>
                </div>
              </div>
             <a href="rent.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-fw fa fa-home icon-1"></i>
               </a>
              </a>
            </div>
          </div>
          
              
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                   <?php 
                      
                    include("connection.php");
                    $show = "SELECT * 
                              FROM purok
                              INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                              WHERE  `purok_no` = 1;";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
    
                     echo "".$showdatanum."<b> Purok 1</b>"."";
                    
                  ?>
                </div>
              </div>
              <a href="purok1.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </span>
              </a>
            </div>
          </div>
          
          
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                   <?php 
                      
                    include("connection.php");
                    $show = "SELECT * 
                              FROM purok
                              INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                              WHERE  `purok_no` =2;";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
    
                     echo "".$showdatanum."<b> Purok 2</b>"."";
                    
                  ?>
                </div>
              </div>
              <a href="purok2.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </span>
              </a>
            </div>
          </div>
          
             
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                   <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                            <?php 
                      
                    include("connection.php");
                    $show = "SELECT * 
                              FROM purok
                              INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                              WHERE  `purok_no` =3;";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
    
                     echo "".$showdatanum."<b> Purok 3</b>"."";
                    
                  ?>
                </div>
              </div>
             <a href="purok3.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-fw fa fa-users icon-1"></i>
               </a>
              </a>
            </div>
          </div>
          
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                 <?php 
                      
                    include("connection.php");
                    $show = "SELECT * 
                              FROM purok
                              INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                              WHERE  `purok_no` =4;";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
    
                     echo "".$showdatanum."<b> Purok 4</b>"."";
                    
                  ?>
                </div>
              </div>
              <a href="purok4.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </span>
              </a>
            </div>
          </div>
          
       <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                 <?php 
                      
                    include("connection.php");
                    $show = "SELECT * 
                              FROM purok
                              INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                              WHERE  `purok_no` = 5;";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
    
                     echo "".$showdatanum."<b> Purok 5</b>"."";
                    
                  ?>
                </div>
              </div>
              <a href="purok5.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-fw fa fa-users icon-1"></i>
                </span>
              </a>
            </div>
          </div>
        
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                   <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                            <?php 
                      
                    include("connection.php");
                    $show = "SELECT * 
                              FROM purok
                              INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                              WHERE  `purok_no` = 6;";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
    
                     echo "".$showdatanum."<b> Purok 6</b>"."";
                    
                  ?>
                </div>
              </div>
             <a href="purok6.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-fw fa fa-users icon-1"></i>
               </a>
              </a>
            </div>
          </div>
          
          
              
             
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                   <i class="fas fa-fw fa fa-users icon-1"></i>
                </div>
                <div class="mr-5">
                            <?php 
                      
                    include("connection.php");
                    $show = "SELECT * 
                              FROM purok
                              INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                              WHERE  `purok_no` = 7;";
                    $showsql = mysqli_query($connection,$show);
                    $showdatanum = mysqli_num_rows($showsql);
    
                     echo "".$showdatanum."<b> Purok 7</b>"."";
                    
                  ?>
                </div>
              </div>
             <a href="purok7.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-fw fa fa-users icon-1"></i>
               </a>
              </a>
            </div>
          </div>
          
        </div>
       
        <!-- Area Chart Example-->
            <center><div id="chartContainer" style="height:400px;width: 90%;margin-bottom:2%;"></div></center>
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        
        <!-- DataTables Example -->
       
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     
    </div>
    <!-- /.content-wrapper -->

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
