<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
//get resident id
$resident_id = $_GET['resident_id'];

    session_start();
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    $get_record = mysqli_query($connection, "SELECT * FROM users WHERE user_id = '$user_id'");
    $row = mysqli_fetch_assoc($get_record);
    $db_first_name_session = $row["username"];
    $db_user_id = $row ["user_id"];
}else{
      echo "<script>window.location.href='../'</script>";

}


$get_record = mysqli_query($connection, "SELECT * FROM household_head WHERE resident_id='$resident_id'");
$get_record_num = mysqli_num_rows($get_record);

if ($get_record_num > 0 ){

    while ($i = mysqli_fetch_assoc($get_record)){
        //gikan sa database para i echo sa form
         $db_profile_picture = $i['profile_picture'];
         $db_first_name = $i['first_name'];
         $db_last_name = $i['last_name'];
         $db_middle_name = $i['middle_name'];
         $db_nick_name = $i['nickname'];
        
         $db_gender = $i['gender'];
         $db_birthdate = $i['birthdate'];
         $db_house_status = $i['house_status'];
         $db_household_no = $i['household_no'];
         $db_id_no = $i['id_no'];
         $db_occupation = $i['occupation'];
         $db_resident_id = $i['resident_id'];
  
    }
         if (isset($_POST["btnupdate"])){
         // new  image  
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_filename = $_FILES['photo']['name'];
        $destination = "uploads/". $_POST["new_first_name"].'-'.$photo_filename;
        move_uploaded_file($photo_tmp, $destination);
        //new data nga ge update
         $new_first_name = trim($_POST["new_first_name"]);
         $new_last_name = trim($_POST["new_last_name"]);
         $new_middle_name = trim($_POST["new_middle_name"]);
         $new_nick_name = trim($_POST["new_nickname"]);
         $new_gender = $_POST["new_gender"];
         $new_house_status = $_POST["new_house_status"];
        
         $new_prk_id = $_POST['prk_no'];
         $new_occupation = $_POST["new_occupation"];
        $new_birthdate = $_POST["new_birthdate"];
        $date = str_replace('/', '-', $new_birthdate);
        $dateconvert = date('Y-m-d', strtotime($date));
        $fullname = ucfirst($new_first_name)." ".ucfirst($new_middle_name[0]).". ".ucfirst($new_last_name);
  
   
         $myupdate = mysqli_query($connection, "UPDATE household_head SET profile_picture='$destination',first_name='$new_first_name',last_name='$new_last_name', middle_name='$new_middle_name', nickname='$new_nick_name', gender='$new_gender',birthdate='$dateconvert',house_status='$new_house_status'
         , occupation='$new_occupation', prk_id = '$new_prk_id'  WHERE resident_id = '$resident_id';");
          
            if ($myupdate = TRUE){
            mysqli_query($connection, "INSERT INTO reports(username,remarks,report_datetime,user_id) VALUES ('$db_first_name_session','$fullname is Updated',NOW(),'$db_user_id');");
            echo "<script> alert('$fullname has been successfully Updated');window.location='record.php';  </script>";
            }
             
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
    margin:5%;
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
          <li class="breadcrumb-item active">Update Profile Family Head</li>
        </ol>
      </div>
      <div class="card-body">
        <form method="POST"  enctype="multipart/form-data">
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Profile Photo:
              <div id="forimage">
              <p class="help-block"><img class="img-responsive" src="<?php echo "$db_profile_picture"; ?>" style="width:200px;height:140px;border:2px solid black"  ></p>
                </div>
                <input type="file" name="photo" id="preview_photo" required>
              </div>
            </div>
              <div class="col-md-6">
                <div class="form-label-group">
                <div  style="margin:5px;">
                 <img src="../logo_cell.jpg" style="width: 160px;" >
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              
                 <div class="prk">Purok No</div>
                 <select name="prk_no" style="float: right; padding: 5px;width:20%;" class="form-control">
                      <?php
              	$sel = mysqli_query($connection, "SELECT *
                                          FROM purok
                                         ");
              
  				while ($i = $sel -> fetch_array()){
  					echo "<option value='".$i[0]."'";
  					if (@$_POST['resident_id'] == $i[1])
  							echo " selected";
  							echo ">$i[1]</option>";
  				}
                      ?>
                  </select>
                  <div class="prk">Purok Leader</div>
              <select name="prk_leader"  style=" padding: 5px;width:46%;" class="form-control">
                    <?php
                $sel = mysqli_query($connection, "SELECT *
                                          FROM purok
                                          ");
				
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
                  <input type="number" value="<?php echo "$db_household_no"; ?>" id="houseno" class="form-control" placeholder="House No" required autofocus="autofocus">
                  <label for="houseno">House No</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" value="<?php echo "$db_id_no"; ?>" id="idno" class="form-control" placeholder="ID No" required>
                  <label for="idno">ID No</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_first_name" value="<?php echo "$db_first_name"; ?>" id="firstName" class="form-control" placeholder="First name" required autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_last_name" value="<?php echo "$db_last_name"; ?>" id="lastName" class="form-control" placeholder="Last name" required>
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_middle_name" value="<?php echo "$db_middle_name"; ?>" id="middleName" class="form-control" placeholder="Middle Name" required autofocus="autofocus">
                  <label for="middleName">Middle Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_nickname" value="<?php echo "$db_nick_name"; ?>"  id="nickName" class="form-control" placeholder="Nickname" required>
                  <label for="nickName">Nickname</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" name="new_birthdate" value="<?php echo "$db_birthdate"; ?>" id="birthdate" class="form-control" placeholder="Birthdate" required autofocus="autofocus">
                  <label for="birthdate">Birthdate</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select style=" padding: 5px;width:46%;" class="form-control" name="new_gender">
                    <option>Gender</option>
                    <option <?php if($db_gender =="Male"){ echo "selected";} ?> value="Male">Male</option>
                    <option <?php if($db_gender =="Female"){ echo "selected";} ?> value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                   <select style=" padding: 5px;width:46%;" class="form-control" name="new_house_status">
                    <option>House Status</option>
                    <option <?php if($db_house_status =="Owner"){ echo "selected";} ?> value="Owner" >Owner</option>
                    <option <?php if($db_house_status =="Rent"){ echo "selected";} ?> value="Rent" >Rent</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_occupation" value="<?php echo "$db_occupation";?>"  id="occ" class="form-control" placeholder="Occupation" required autofocus="autofocus">
                  <label for="occ">Occupation</label>
                </div>
              </div>
            </div>
          </div>
        
          <input type="submit" name="btnupdate" value="Update" class="btn btn-primary btn-block" />
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
?>