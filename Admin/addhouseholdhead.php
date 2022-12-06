<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//ok na to wla nag problema
include("connection.php");

include("header.php");
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
          <li class="breadcrumb-item active">Add Household Head</li>
        </ol>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data" >
           <div class="form-group">
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
            <div class="col-md-6">
                <div class="form-label-group">
                <div  style="margin:5px;">
                 <img src="../logo_cell.jpg" style="width:168px;" >
                </div>
              </div>
            </div>
            </div>
          <div class="form-group">
            <div class="form-row">
              
                 <div class="prk">Purok No</div>
                 <select name="prk_no" style="float: right; padding: 5px;width:20%;" class="form-control">
                      <?php
              	$sel = mysqli_query($connection, "SELECT * FROM purok");
  				
  				while ($i = $sel -> fetch_array()){
  					echo "<option value='".$i[0]."'";
  					if (@$_POST['prk_id'] == $i[0])
  							echo " selected";
  							echo ">$i[1]</option>";
  				}
                      ?>
                  </select>
                  <div class="prk">Purok Leader</div>
              <select  style=" padding: 5px;width:46%;" class="form-control">
                    <?php
            	$sel = mysqli_query($connection, "SELECT * FROM purok");
				
				while ($i = $sel -> fetch_array()){
					echo "<option value='".$i[0]."'";
					if (@$_POST['prk_id'] == $i[0])
							echo " selected";
							echo ">$i[2]</option>";
				}
                    ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="household_no" value="" id="houseno" class="form-control" placeholder="House No" required autofocus="autofocus">
                  <label for="houseno">House No</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="id_no" value="" id="idno" class="form-control" placeholder="ID No" required>
                  <label for="idno">ID No</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="first_name" value="" id="firstName" class="form-control" placeholder="First name" required autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="last_name" value="" id="lastName" class="form-control" placeholder="Last name" required>
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="middle_name" value="" id="middleName" class="form-control" placeholder="Middle Name" required autofocus="autofocus">
                  <label for="middleName">Middle Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="nickname" value=""  id="nickName" class="form-control" placeholder="Nickname" required>
                  <label for="nickName">Nickname</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" name="birthdate" value="" id="birthdate" class="form-control" placeholder="Birthdate" required autofocus="autofocus">
                  <label for="birthdate">Birthdate</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select style="padding: 5px; width:70%;" name="gender" class="form-control">
                    <option value="Gender">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                   <select style="padding: 5px; width:70%;" name="house_status" class="form-control">
                    <option>House Status</option>
                    <option>Owner</option>
                    <option>Rent</option>
                  </select>
                </div>
                
              </div>
             <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="occupation" value=""  id="occ" class="form-control" placeholder="Occupation" required autofocus="autofocus">
                  <label for="occ">Occupation</label>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" name="add" value="Add Household Head" class="btn btn-primary btn-block" />
        </form>
       <a href="record.php" class="btn btn-primary btn-block" style="color:white; background-color:red;margin-top:2%; ">Cancel </a>
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
    if (isset($_POST['add'])){
       
       // get image  
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_filename = $_FILES['photo']['name'];
        $destination = "uploads/".$_POST['first_name'].'-'.$photo_filename;
        move_uploaded_file($photo_tmp, $destination);
      
        // get info
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $middle_name = trim($_POST['middle_name']);
        $id_no = trim($_POST['id_no']);
        $household_no = trim($_POST['household_no']);
        $prk_id = $_POST['prk_no'];
        $gender = trim($_POST['gender']);
        $house_status = trim($_POST['house_status']);
        $nickname = trim($_POST['nickname']);
        $occupation = $_POST['occupation'];
       
        //converter to date yy-mm-dd
        $birthdate = $_POST['birthdate'];
        $date = str_replace('/', '-', $birthdate);
        $dateconvert = date('Y-m-d', strtotime($date));
        
        $fullname = ucfirst($first_name)." ".ucfirst($middle_name[0]).". ".ucfirst($last_name);
        
        //check ID no 
        $check_id = "SELECT * FROM household_head WHERE id_no='$id_no'";
        $check_query_id = mysqli_query($connection,$check_id);
        $check_num_id_no = mysqli_num_rows($check_query_id);
        
        if ($check_num_id_no > 0){
        
        while ($i = $check_query_id ->fetch_array()){
          $db_id_no = $i['id_no'];
           }
            if ($id_no === $db_id_no) {
               echo "<script> alert('The ID No. has been already registered!');window.location='addhouseholdhead.php';  </script>";
            }
      }else {
         //insert to database
       $addsql = mysqli_query($connection,"INSERT INTO household_head (`household_no`, `id_no`, `profile_picture`, `nickname`, `first_name`, `last_name`, `middle_name`, `birthdate`, `gender`, `occupation`, `remarks`, `house_status`, `house_head`, `date_registered`, `user_id`, `prk_id`) VALUES ($household_no,$id_no,'$destination','$nickname','$first_name','$last_name','$middle_name','$dateconvert','$gender','$occupation','Registered','$house_status','house head',NOW(),$user_id,$prk_id)");
        
  

      if ($addsql === TRUE) {
        mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_first_name','$fullname is Registered',NOW(),$user_id)");
      
        echo "<script> alert('$fullname has been successfully registered');window.location='record.php';  </script>";
                  }else {
                    
                    $ifnopurok = mysqli_query($connection,"INSERT INTO household_head (`household_no`, `id_no`, `profile_picture`, `nickname`, `first_name`, `last_name`, `middle_name`, `birthdate`, `gender`, `occupation`, `remarks`, `house_status`, `house_head`, `date_registered`, `user_id`) VALUES ($household_no,$id_no,'$destination','$nickname','$first_name','$last_name','$middle_name','$dateconvert','$gender','$occupation','Registered','$house_status','house head',NOW(),$user_id)");
                     
                     if ($ifnopurok === TRUE ){
                       
                        mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_first_name','$fullname is Registered',NOW(),$user_id)");
      
        echo "<script> alert('$fullname has been successfully registered');window.location='record.php';  </script>";
                       
                       
                     }else {
                       echo "<script> alert('Not Registered! Try Again');window.location='record.php';  </script>";
                     }
                    
                  }
         }
    }
?>
