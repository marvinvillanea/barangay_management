<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("connection.php");
include("header.php");
$brg_cap_id =  $_GET['brg_id'];

$get_record = mysqli_query($connection, "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id = household_head.resident_id WHERE brg_id='$brg_cap_id'");
$get_record_num = mysqli_num_rows($get_record);

    if ($get_record_num > 0 ){
    
        while ($i = mysqli_fetch_assoc($get_record)){
            
              $db_firts_name_head = $i['first_name'];
            $db_last_name_last = $i['last_name'];
            $db_middle_name_middle = $i['middle_name'];
            
            $fullname = ucfirst($db_firts_name_head)." ".ucfirst($db_middle_name_middle[0])." ".ucfirst($db_last_name_last);
             
             $db_year_declered = $i['brg_year_declered'];
             $db_position = $i['brg_position'];
          
        }
        if (isset($_POST["dltbuton"])){
       
         if (empty($_POST['check'])) {
               echo "<script> alert('Please Put A check if you want to Delete the Barangay Captain!');</script>";
            }else {
      
      
      
       $query_delete =  mysqli_query($connection, "DELETE FROM barangay_officials WHERE brg_id = '$brg_cap_id' ");
        
        if ($query_delete === TRUE){
          echo "<script> alert('Has been successfully Deleted');window.location='barangayfunctionaries.php';</script>";
        }
              
            }
        }
}
else{
            echo "<h1>No Record Found.</h1>";
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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
      
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <i class="fas fa-fw fa fa-arrow-left"></i><a href="barangayfunctionaries.php">Barangay Functionaries</a>
          </li>
          <li class="breadcrumb-item active">Delete Barangay Officials</li>
        </ol>
      </div>
      <div class="card-body">
        <form method = "POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" value="<?php echo $fullname ;?>"placeholder="First name" utofocus="autofocus">
                  <label for="firstName">Name:</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" value="<?php echo $db_year_declered ;?>" placeholder="Last name">
                  <label for="lastName">Year Decleared</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" value="<?php echo $db_position ;?>" placeholder="Last name">
                  <label for="lastName">Barangay Position</label>
                </div>
              </div>
            </div>
          </div>
            Are you sure you want to delete?   <input type="checkbox" name="check" value="check"/>
          <input type="submit" name="dltbuton" value="Delete Barangay Captain " class="btn btn-primary btn-block" />
        </form>
          <a href="barangayfunctionaries.php" class="btn btn-primary btn-block" style="color:white; background-color:red;margin-top:2%; ">Cancel </a>
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
include("footer.php");
?>