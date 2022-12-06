<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
include("header.php");
$member_id = $_GET['resident_id'];
$check_member = mysqli_query($connection, "SELECT * FROM household_head WHERE resident_id='$member_id';");
$check_num_member = mysqli_num_rows($check_member);

if ($check_num_member > 0){
    while ($i = mysqli_fetch_assoc($check_member)){
        //gikan sa database para i echo sa form
         $db_profile_picture = $i['profile_picture'];
         $db_first_name = $i['first_name'];
         $db_last_name = $i['last_name'];
         $db_middle_name = $i['middle_name'];
         $db_nick_name = $i['nickname'];
         $db_age = $i['age'];
         $db_gender = $i['gender'];
         $db_birthdate = $i['birthdate'];
         $db_occupation = $i['occupation'];
        $db_resident_id = $i['resident_id1'];
        $db_inner_id_no = $i['id_no'];
        $db_age  = date('Y-m-d',time()) - $db_birthdate;
         
    }
}else {
    echo "No Record Found!";
}
             $sel_inner_join = "SELECT * 
                      FROM  `household_head`
                      WHERE  `resident_id` = '$member_id'";
					$selqsl = mysqli_query($connection,$sel_inner_join);
						$check_num = mysqli_num_rows($selqsl);
						
						$select_data_household_head = "SELECT * 
                      FROM  `household_head`
                      WHERE  `resident_id` = '$db_resident_id'";
            $query_select_data_household_head = mysqli_query($connection,$select_data_household_head);
          while ($row = $query_select_data_household_head -> fetch_array() ){
                $db_head_first_name = $row['first_name'];
                $db_head_last_name = $row['last_name'];
                $db_head_middle_name = $row['middle_name'];
                 $db_head_full_name = ucfirst($db_head_first_name)." ".ucfirst($db_head_middle_name[0]).". ".ucfirst($db_head_last_name);  
          }
				if ($check_num > 0 ) {
						while($i = $selqsl -> fetch_array()){
						  
						  $db_inner_house_no = $i['household_no'];
						  /*
						  $db_inner_first = $i['first_name'];
						  $db_inner_middle = $i['middle_name'];
						  $db_inner_last = $i['last_name'];
						  $db_inner_house_head_full = ucfirst($db_inner_first)." ".ucfirst($db_inner_middle[0]).". ".ucfirst($db_inner_last);
						  */
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
          <li class="breadcrumb-item active">View Profile Member</li>
        </ol>
      </div>
      <div class="card-body">
            <table>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Profile Photo:
              <div id="forimage" >
              <p class="help-block"><img src="<?php echo "$db_profile_picture"; ?>" id="show_photo_preview" style="width:200px;height:140px;border:2px solid black;" ></p>
                </div>
                <br>
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
           <hr> <hr>
          <div class="form-group">
            <div class="form-row">
              
                 <div class="prk">Purok No</div>
                 <select name="prk_no" style="float: right; padding: 10px;">
                      <?php
              	$sel = mysqli_query($connection, "SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id = purok.prk_id 
              	WHERE resident_id ='$member_id'");
    
  				while ($i = $sel -> fetch_array()){
  					echo "<option value='".$i[18]."'";
  					if (@$_POST['family_member_id'] == $i[18])
  							echo " selected";
  							echo ">$i[19]</option>";
  				}
                      ?>
                  </select>
                  <div class="prk">Purok Leader</div>
              <select name="prk_leader"  style=" padding: 10px;">
                    <?php
                $sel = mysqli_query($connection, "SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id = purok.prk_id 
              	WHERE resident_id ='$member_id'");
				
				while ($i = $sel -> fetch_array()){
					echo "<option value='".$i[18]."'";
					if (@$_POST['family_member_id'] == $i[18])
							echo " selected";
							echo ">$i[20]</option>";
				}
                    ?>
                </select>
            </div>
            
          </div>
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_first_name" value="<?php echo "$db_head_full_name"; ?>" id="firstName" class="form-control" placeholder="First name" required autofocus="autofocus">
                  <label for="firstName">Household Head</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_last_name" value="<?php echo "$db_inner_house_no"; ?>" id="lastName" class="form-control" placeholder="Last name" required>
                  <label for="lastName">House No.</label>
                </div>
              </div>
            </div>
          </div>
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="id_no" value="<?php echo "$db_inner_id_no"; ?>" id="firstName" class="form-control" placeholder="First name" required autofocus="autofocus">
                  <label for="firstName">ID No.</label>
                </div>
              </div>
      
            </div>
          </div>
            <hr> <hr>
        
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
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="new_age" value="<?php echo "$db_age"; ?>" id="age" class="form-control" placeholder="Age" required>
                  <label for="age">Age</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select style="padding: 10px; width:70%;" name="new_gender">
                    <option <?php if($db_gender == "Male"){ echo "selected";} ?> value="Male">Male</option>
                    <option <?php if($db_gender == "Female"){ echo "selected";} ?> value="Female">Female</option>
                  </select>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="new_occupation" value="<?php echo "$db_occupation";?>"  id="occ" class="form-control" placeholder="Occupation" required autofocus="autofocus">
                  <label for="occ">Occupation</label>
                </div>
              </div>
            </div>
          </div>
         <hr><hr>
        </table>
     
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
