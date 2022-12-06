<?php 

 session_start();
  include("connection.php");

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
} body { background: gray !important; }
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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
       

 
        <!-- DataTables -->
       
        
        <div class="card mb-3">
          <div class="card-header">
             <center>
          <?php   
          $sel = "SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id= purok.prk_id WHERE purok_no = '4'";
					$selqsl = mysqli_query($connection,$sel);
						
							
						while($i = $selqsl -> fetch_array()){
						$db_leader = $i[20];
						$db_leader_no = $i[19];
						
						}
						echo "Purok ".$db_leader_no."<br>";
						echo $db_leader;
						  ?></center>
						   <i class="fas fa-table"></i>
          <a href="index.php">Back</a>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                 <tr>  
                    <th>House No.</th>
                    <th>ID No.</th>
                    <th>Name</th>
                    <th>Nickname</th>
                    <th>Birthdate</th>
                    <th>House Status</th>
                     <th>Family Status</th>
                       <th>Date Registered</th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>House No.</th>
                    <th>ID No.</th>
                    <th>Name</th>
                    <th>Nickname</th>
                    <th>Birthdate</th>
                    <th>House Status</th>
                  <th>Family Status</th>
                  <th>Date Registered</th>
                    <th><center>Action</center></th>
                  </tr>
                </tfoot>
                <tbody>
                      <?php 
                     include("connection.php");
                     
          $sel = "SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id= purok.prk_id WHERE purok_no = '4'";
					$selqsl = mysqli_query($connection,$sel);
						
							
							while($i = $selqsl -> fetch_array()){
						  $dbfirstname = $i['first_name'];
						  $dbmiddlename = $i['middle_name'];
						  $dblastname = $i['last_name'];
						  $dbnickname = $i['nickname'];
						  $db_registered = $i['date_registered'];
						  $db_house_head = $i['house_head'];
						$db_birthdate = $i['birthdate'];
						    $db_ucfirst_head = ucfirst($i['house_head']);
						  $db_ucfirst_head_status = ucfirst($i['house_status']);
						  $ucnickname = ucfirst($dbnickname);
						  $fullname = ucfirst($dbfirstname)." ".ucfirst($dbmiddlename[0]).". ".ucfirst($dblastname);
						  
							  
						  if ($db_house_head === 'house head') {
							echo "<tr>";
						echo "<td>$i[1]</td>";
						echo "<td>$i[2]</td>";
						echo "<td>$fullname</td>";
					echo "<td>$dbnickname</td>";
					echo "<Td>$db_birthdate</td>";
						echo "<td>$db_ucfirst_head_status</td>";
            	echo "<td>$db_ucfirst_head</td>";
					echo "<td>$db_registered</td>";
							echo "<Td colspan='2'>
							    <center>
							   <a href='view.php?resident_id=$i[0]' data-toggle='tooltip' title='View Family Member'><i class='fa fa-eye' style='font-size:20px'></i></a> |
							    <a href='addmember.php?resident_id=$i[0]' data-toggle='tooltip' title='Add Family Member'><i class='fa fa-user-plus' style='font-size:20px'></i></a> |
							     <a href='file.php?resident_id=$i[0]' data-toggle='tooltip' title='Documents'><i class='fa fa-file' style='font-size:17px'></i></a> 
							    </center>
							</td>";
							echo "</tr>";
						  }elseif ($db_house_head === 'family member') {
						    	echo "<tr>";
						echo "<td>$i[1]</td>";
						echo "<td>$i[2]</td>";
						echo "<td>$fullname</td>";
					echo "<td>$dbnickname</td>";
							echo "<Td>$db_birthdate</td>";
						echo "<td>$db_ucfirst_head_status</td>";
            	echo "<td>$db_ucfirst_head</td>";
					echo "<td>$db_registered</td>";
							echo "<Td colspan='2'>
							    <center>
							   <a href='view.php?resident_id=$i[0]' data-toggle='tooltip' title='View Profile'><i class='fa fa-eye' style='font-size:20px'></i></a> |
							     <a href='file.php?resident_id=$i[0]' data-toggle='tooltip' title='Documents'><i class='fa fa-file' style='font-size:17px'></i></a> 
							    </center>
							</td>";
							echo "</tr>";
						  }
					
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

