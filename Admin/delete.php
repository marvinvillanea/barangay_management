<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("connection.php");
include("header.php");
$resident_id =  $_GET['resident_id'];

$get_record = mysqli_query($connection, "SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id=purok.prk_id WHERE resident_id='$resident_id'");
$get_record_num = mysqli_num_rows($get_record);

    if ($get_record_num > 0 ){
    
        while ($i = mysqli_fetch_assoc($get_record)){
            
             $db_profile_picture = $i['profile_picture'];    
             $db_first_name = $i["first_name"];
             $db_last_name = $i["last_name"];
             $db_middle_name = $i["middle_name"];
             $db_nick_name = $i['nickname'];
             $db_purok_no = 
             $db_gender = $i["gender"];
             $db_birthdate = $i["birthdate"];
             $db_occupation = $i['occupation'];
             $db_prk = $i["purok_no"];
             $db_household_no = $i["household_no"];
             $db_id_no = $i['id_no'];
             $db_house_status = $i['house_status'];
             
              //  $db_age  = date('Y-m-d',time()) - $db_birthdate;
              $db_age = floor((time() - strtotime( $db_birthdate)) / 31556926);
             
        }
        if (isset($_POST["dltbuton"])){
       
         if (empty($_POST['check'])) {
               echo "<script> alert('Please Put A check if you want to Delete the Resident Profile!');</script>";
            }else {
        
       $query_delete =  mysqli_query($connection, "DELETE FROM household_head WHERE resident_id = '$resident_id' ");
        
        if ($query_delete === TRUE){
          echo "<script> alert('has been successfully Deleted');window.location='record.php';</script>";
        }else {
           echo "<script> alert('Cannot delete or update a parent row: a foreign key constraint fails (`system`.`transaction`, CONSTRAINT `household_head_transaction` FOREIGN KEY (`resident_id`) REFERENCES `household_head` (`resident_id`)) ');window.location='record.php';</script>";
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
          <li class="breadcrumb-item active">Delete Profile</li>
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
                <input type="file" name="photo" id="preview_photo">
              </div>
            </div>
              <div class="col-md-6">
                <div class="form-label-group">
                <div  style="margin:5px;">
                 <img src="city.png" >
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              
                 <div class="prk">Purok No</div>
                  <select name="prk_no"  style="float: right; padding: 5px;width:20%;" class="form-control">
                      <?php
              	$sel = mysqli_query($connection,"SELECT *
                                          FROM purok
                                          INNER JOIN household_head ON purok.prk_id = household_head.prk_id
                                          WHERE  `resident_id` =$resident_id");
    
  				while ($i = $sel -> fetch_array()){
  					echo "<option value='".$i[0]."'";
  					if (@$_POST['resident_id'] == $i[1])
  							echo " selected";
  							echo ">$i[1]</option>";
  				}
                      ?>
                  </select>
                  <div class="prk">Purok Leader</div>
             <select name="prk_no"  style="float: right; padding: 5px;width:46%;" class="form-control">
                      <?php
              	$sel = mysqli_query($connection,"SELECT *
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
                  <input type="number" name="new_household_no" value="<?php echo "$db_household_no"; ?>" id="houseno" class="form-control" placeholder="House No"  autofocus="autofocus">
                  <label for="houseno">House No</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="new_id_no" value="<?php echo "$db_id_no"; ?>" id="idno" class="form-control" placeholder="ID No" >
                  <label for="idno">ID No</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_first_name" value="<?php echo "$db_first_name"; ?>" id="firstName" class="form-control" placeholder="First name"  autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_last_name" value="<?php echo "$db_last_name"; ?>" id="lastName" class="form-control" placeholder="Last name" >
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_middle_name" value="<?php echo "$db_middle_name"; ?>" id="middleName" class="form-control" placeholder="Middle Name"  autofocus="autofocus">
                  <label for="middleName">Middle Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_nickname" value="<?php echo "$db_nick_name"; ?>"  id="nickName" class="form-control" placeholder="Nickname" >
                  <label for="nickName">Nickname</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" name="new_birthdate" value="<?php echo "$db_birthdate"; ?>" id="birthdate" class="form-control" placeholder="Birthdate"  autofocus="autofocus">
                  <label for="birthdate">Birthdate</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="new_age" value="<?php echo "$db_age"; ?>" id="age" class="form-control" placeholder="Age" >
                  <label for="age">Age</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select  style=" padding: 5px;width:46%;" class="form-control" name="new_gender">
                    <option>Gender</option>
                    <option <?php if($db_gender =="Male"){ echo "selected";} ?> value="Male">Male</option>
                    <option <?php if($db_gender =="Female"){ echo "selected";} ?> value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                   <select  style=" padding: 5px;width:46%;" class="form-control" name="new_house_status">
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
                  <input type="text" name="new_occupation" value="<?php echo "$db_occupation";?>"  id="occ" class="form-control" placeholder="Occupation"  autofocus="autofocus">
                  <label for="occ">Occupation</label>
                </div>
              </div>
            </div>
          </div>
          <b style="color:red;">Are you sure you want to delete?</b>
          <input type="checkbox" name="check" value="check" style="margin-bottom:3%; zoom: 1.5;"/>
          <input type="submit" name="dltbuton" value="Delete" class="btn btn-primary btn-block" />
        </form>
        <a href="record.php" class="btn btn-primary btn-block" style="color:white; background-color:red; ">Cancel </a>
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