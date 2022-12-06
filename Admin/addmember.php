<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
include("header.php");

$resident_id = $_GET['resident_id'];

$sel_inner_join = "SELECT * FROM household_head WHERE resident_id='$resident_id'";
					$selqsl = mysqli_query($connection,$sel_inner_join);
						$check_num = mysqli_num_rows($selqsl);
						
				if ($check_num > 0 ) {
						while($i = $selqsl -> fetch_array()){
						  $db_inner_house_no = $i[1];
						  $db_inner_first = $i[5];
						  $db_inner_middle = $i[7];
						  $db_inner_last = $i[6];
						  $db_inner_house_head_full = ucfirst($db_inner_first)." ".ucfirst($db_inner_middle[0]).". ".ucfirst($db_inner_last);
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

  <title>Gimangpang Management System</title>
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
          <li class="breadcrumb-item active">Add Family Member</li>
        </ol>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
           <div class="form-group">
            <div class="form-row">
               <div class="col-md-6">
                <div class="form-label-group">
                  Profile Photo:
              <div id="forimage" style="margin:5px;">
              <p class="help-block"><img id="show_photo_preview" style="border:1px solid black;"></p>
                </div>
                <input type="file" name="photo" id="preview_photo"  required >
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-label-group">
                <div  style="margin:5px;">
                 <img src="logo.jpg" style="width:200px;height:170px;border:2px solid black;margin:5%;border-radius:50%;">
                </div>
              </div>
            </div>
            </div>
          <div class="form-group">
            <div class="form-row">
              
                 <div class="prk">Purok No</div>
                 <select name="prk_no"  style="float: right; padding: 5px;width:20%;" class="form-control">
                      <?php
              	$sel = mysqli_query($connection, "SELECT *
                                          FROM purok
                                          INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                                          WHERE  `resident_id` =$resident_id");
    
  				while ($i = $sel -> fetch_array()){
  					echo "<option value='".$i[0]."'";
  					if (@$_POST['resident_id'] == $i[2])
  							echo " selected";
  							echo ">$i[1]</option>";
  				}
                      ?>
                  </select>
                  <div class="prk">Purok Leader</div>
              <select name="prk_leader" style=" padding: 5px;width:46%;" class="form-control">
                    <?php
                $sel = mysqli_query($connection, "SELECT *
                                          FROM purok
                                          INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                                          WHERE  `resident_id` =$resident_id");
				
				while ($i = $sel -> fetch_array()){
					echo "<option value='".$i[0]."'";
					if (@$_POST['resident_id'] == $i[2])
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
                  <input type="text" name="head" value="<?php echo "$db_inner_house_head_full"; ?>" id="head" class="form-control" placeholder="First name" required autofocus="autofocus">
                  <label for="head">Household Head</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="house_no" value="<?php echo "$db_inner_house_no"; ?>" id="house_no" class="form-control" placeholder="Last name" required>
                  <label for="house_no">House No.</label>
                </div>
              </div>
            </div>
          
          </div>
       <hr><hr>
          <div class="form-group">
            <div class="form-row">
           
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="id_no" value=""  id="idno" class="form-control" placeholder="ID No" required>
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
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select  style=" padding: 5px;width:46%;" class="form-control" name="gender">
                    <option>Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-label-group">
                   <select style="padding: 5px; width:70%;" name="house_status" class="form-control">
                    <option>House Status</option>
                    <option>Owner</option>
                    <option>Rent</option>
                    <option>None</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="occupation" value=""  id="occ" class="form-control" placeholder="Occupation" required autofocus="autofocus">
                  <label for="occ">Occupation</label>
                </div>
              </div>
            </div>
          </div>
          
          <input type="submit" name="add" value="Add Family Member" class="btn btn-primary btn-block" />
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
        $prk_id  = $_POST['prk_no'];
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $middle_name = trim($_POST['middle_name']);
        $gender = $_POST['gender'];
        $nickname = trim($_POST['nickname']);
        $occupation = $_POST['occupation'];
        $house_no = $_POST['house_no'];
        $id_no_new = $_POST['id_no'];
        $house_status = $_POST['house_status'];
        //converter to date yy-mm-dd
        $birthdate = $_POST['birthdate'];
        $date = str_replace('/', '-', $birthdate);
        $dateconvert = date('Y-m-d', strtotime($date));
        //check if the resident is euel to resident id
       
        $seleresident = "SELECT * FROM household_head";
        $residentconn = mysqli_query($connection,$seleresident);
        $checkresident_num = mysqli_num_rows($residentconn);
        
        $fullname = ucfirst($first_name)." ".ucfirst($middle_name[0]).". ".ucfirst($last_name);
        
        if ($checkresident_num > 0){  
          
          while ($i = $residentconn ->fetch_array()){
            $db_resident_id_get = $i['resident_id'];
            $db_id_no_same = $i['id_no'];
          }
             
            if ($db_id_no_same === $id_no_new) {
               echo "<script> alert('The ID No. has been already registered!');window.location='record.php';  </script>";
        
          }else {
          
          
          if ($resident_id === $db_resident_id_get) {
            //insert to database
            $addsql = mysqli_query($connection,"INSERT INTO household_head (`household_no`, `id_no`, `profile_picture`, `nickname`, `first_name`, `last_name`, `middle_name`, `birthdate`, `gender`, `occupation`, `remarks`, `house_status`, `house_head`, `date_registered`, `user_id`, `prk_id`,`resident_id1`) VALUES ($house_no,$id_no_new,'$destination','$nickname','$first_name','$last_name','$middle_name','$dateconvert','$gender','$occupation','Registered','$house_status','family member',NOW(),$db_user_id,$prk_id,$resident_id)");
                
                  if ($addsql === TRUE) {
                mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_first_name','$fullname is Registered',NOW(),$user_id)");
                  echo "<script> alert('$fullname has been successfully added!');window.location='record.php?';  </script>";
                    }else {
                       echo "<script> alert('Error has been successfully registered');window.location='record.php';  </script>";
                    }
              }else {
                echo "No record Found";
              }
        }
        }
    }

?>
