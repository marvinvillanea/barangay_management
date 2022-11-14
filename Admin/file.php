<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
include("header.php");

    $resident_id = $_GET['resident_id'];

$sele = "SELECT * FROM household_head WHERE resident_id='$resident_id';";
$selecon = mysqli_query($connection,$sele);
$slecnum = mysqli_num_rows($selecon);

    if ($slecnum > 0 ){
        
        while ($i = $selecon ->fetch_array()){
            $db_resident_id = $i[0];
            $db_first_name = $i['first_name'];
            $db_last_name = $i['last_name'];
            $db_middle_name = $i['middle_name'];
            $fullname = ucfirst($db_first_name)." ".ucfirst($db_middle_name[0]).". ".ucfirst($db_last_name);
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
  <style type="text/css">
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password], input[type=date] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
    .prk {
      padding:10px;
    }
    #forimage {
    width:201px;
    height:140px;
    border:1px solid gray;
    }
  </style>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <i class="fas fa-fw fa fa-arrow-left"></i><a href="record.php">Record</a>
          </li>
          <li class="breadcrumb-item active">Files</li>
        </ol>
      </div>
            <?php
    
    if (isset($_POST['submit'])){
        $purpose = $_POST['purpose'];
    
        $sqlinsert = "INSERT INTO transaction (name,transaction_item,transaction_date, purpose, resident_id, user_id)";
        $sqlinsert .= "VALUES ('$fullname','Barangay Clearance',NOW(),'$purpose',$resident_id,$user_id) ";
        $sqlcon = mysqli_query($connection,$sqlinsert);
        if ($sqlcon = TRUE){
          mysqli_query($connection, "INSERT INTO reports(username,remarks,report_datetime,user_id) VALUES ('$db_first_name_session','$fullname Release Barangay Clearance',NOW(),'$db_user_id');");
            echo "<script> alert('$fullname you can realease now');</script>"; 
            ?>
      <div class="card-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="" value="<?php echo "$fullname"; ?>" id="firstName" class="form-control" autofocus="autofocus">
                  <label for="firstName">Name</label>
                </div>
              </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="" value="Barangay Clearance" id="middleName" class="form-control"autofocus="autofocus">
                  <label for="middleName">Transaction Item</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="" value="<?php echo $purpose; ?>" id="middleName" class="form-control"autofocus="autofocus">
                  <label for="middleName">Purpose</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_birthdate" value=" <?php $t=time();  echo "".(date("Y-m-d",$t))." ";?>" id="birthdate" class="form-control"  autofocus="autofocus">
                  <label for="birthdate">Date</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                 <?php   echo "<a href='invoices.php?resident_id=$db_resident_id'>Release Barangay Clearance<i class='fa fa-file' style='font-size:17px'></i></a> "?>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
            <?php
            
        }else {
            
        }
        
    }else {
      ?>
    <div class="card-body">
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="form-control">Barangay Clearance</button>
    <!--Barangay Clearance modal -->
       
        <div id="id01" class="modal">
          
          <form method="POST" class="modal-content animate">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <img src="city.png" alt="Avatar" id="image">
            </div>
        
            <div class="container">
              <label for="uname"><b>Name:</b></label>
              <input type="text" name="fullname" value="<?php echo $fullname; ?>" class="form-control">
        
              <label for="psw"><b>Date</b></label>
              <input type="text" name="date" value="<?php $t=time();  echo (date("d-m-Y",$t));?>" class="form-control">
              <b>Purpose:</b>
              <br>
              <select name="purpose" style=" padding: 5px;width:70%;" class="form-control">
                <option>ANY LEGAL PURPOSE</option>
              </select>
              <center><input type="submit" name="submit" value="Create Barangay Clearance" style="margin-top:5%" class="btn btn-primary btn-block"></center>
            </div>
        
            <div class="container" style="background-color:#f1f1f1">
              <center><button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" >Cancel</button></center>
            </div>
          </form>
        </div>

       <!--Get modal id -->
        <script>
        // Get the modal
        var modal = document.getElementById('id01');
        var modal = document.getElementById('id02');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
      </div>
      <?php
    }
    
    }
    else {
    echo "No Record Found!";
    }

?>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
 