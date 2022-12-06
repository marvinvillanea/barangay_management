<?php 
//ok na
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
include("header.php");

$resident_id = $_GET['resident_id'];

$selecdata = mysqli_query($connection,"SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id=purok.prk_id WHERE resident_id='$resident_id';");
$selenum = mysqli_num_rows($selecdata);

if ($selenum > 0 ){

    while ($i = mysqli_fetch_assoc($selecdata)){
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
         $db_age = floor((time() - strtotime( $db_birthdate)) / 31556926);
       $db_prk_no = $i['purok_no'];
			 $db_prk_leader = $i['purok_leader'];
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
    margin:5%
}
.container {
  margin-left:0.5%;
}
</style>
</head>

<body class="bg-dark">
  
  
  <div class="container">
    <div class="card card-register mt-4" >
      <div class="card-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <i class="fas fa-fw fa fa-arrow-left"></i><a href="record.php">Record</a>
          </li>
          <li class="breadcrumb-item active">View Profile</li>
        </ol>
      </div>
      <div class="card-body">
        <form method="POST">
           <div class="form-group">
               <center> <h4>Household Head</h4></center>
             <hr><hr>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Profile Photo:
              <div id="forimage">
              <p class="help-block"><img class="img-responsive" src="<?php echo "$db_profile_picture"; ?>" style="width:200px;height:140px;border:2px solid black;" ></p>
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
              <select name="prk_leader"   style=" padding: 5px;width:46%;" class="form-control">
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
                  <input type="number" name="new_household_no" value="<?php echo "$db_household_no"; ?>" id="houseno" class="form-control" placeholder="House No" required autofocus="autofocus">
                  <label for="houseno">House No</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="new_id_no" value="<?php echo "$db_id_no"; ?>" id="idno" class="form-control" placeholder="ID No" required>
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
                  <input type="text" name="new_occupation" value="<?php echo "$db_occupation";?>"  id="occ" class="form-control" placeholder="Occupation" required autofocus="autofocus">
                  <label for="occ">Occupation</label>
                </div>
              </div>
            </div>
          </div>
        </form>
     
      </div>
    </div>
    <div class="card mb-3" style="position:absolute; margin-left:102%;">
          <div class="card-header" >
            <i class="fas fa-users"></i>
            Family Member
            </div>
          <div class="card-body">
            <div class="table-responsive ">
              <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th><center>Profile</center></th>
                    <th colspan='10'><center>Name</center></th>
                    <th colspan='8'><center>Nickname</center></th>
                    <th colspan='5'><center>Gender</center></th>
                    <th colspan='5'><center>Birthdate</center></th>
                    <th colspan='8'><center>Action</center></th>
                   
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th ></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                     <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                    <th ></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                     <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                     <th></th>
                      <th></th>
                    <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
      
   
                  </tr>
                </tfoot>
                <tbody>
              <?php 
                     include("connection.php");
                     
          $sel = "SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id=purok.prk_id WHERE resident_id1='$resident_id';";
					$selqsl = mysqli_query($connection,$sel);
						$check_num = mysqli_num_rows($selqsl);
						
				if ($check_num > 0 ) {
						while($i = $selqsl -> fetch_array()){
						  $db_profile_pic_mem = $i['profile_picture'];
						  $dbfirstname = $i['first_name'];
						  $dbmiddlename = $i['middle_name'];
						  $dblastname = $i['last_name'];
						  $db_nick_name =  $i['nickname'];
						  $db_gender = $i['gender'];
						  $db_birtdate = $i['birthdate'];
						  $db_prk_no = $i['purok_no'];
						  $db_prk_leader = $i['purok_leader'];
						    $fullname = ucfirst($dbfirstname)." ".ucfirst($dbmiddlename[0]).". ".ucfirst($dblastname);
							echo "<tr>";
								echo "<td>
						<img class='img-responsive'  src='$db_profile_pic_mem' style='width:100px;height:100px;border:2px solid black;margin:5%;' >
						</td>";	
					
						echo "<td  colspan='10'>"."<center style='padding-top:40px;'>$fullname<center>"."</td>";
						echo "  <td colspan='8'><center style='padding-top:40px;'>$db_nick_name</center></td>";
            echo "
              <td colspan='5'><center style='padding-top:40px;'>$db_gender</center></td>
                    <td colspan='5'><center style='padding-top:40px;'>$db_birtdate</center></td>";
							echo "<Td colspan='10'>
							    <center style='padding-top:40px;'>
							   <a href='viewmember.php?resident_id=$i[0]'  data-toggle='tooltip' title='View Profile'><i class='fa fa-eye' style='font-size:20px'></i></a> |
							     <a href='file.php?resident_id=$i[0]'   data-toggle='tooltip' title='Documents'><i class='fa fa-file' style='font-size:17px'></i></a> 
							    </center>
							</td>";
							echo "</tr>";
						
					} 
					echo "
				   <tr>
				   <td colspan='39'>  <center> <a href='addmember.php?resident_id=$resident_id'   data-toggle='tooltip' title='Add Family Member'><i class='fa fa-user-plus' style='font-size:20px'></i></a> </center> </td>
				   </tr>
				   ";
				}else {
				   echo "
				   <tr>
				    <td></td>
				   <td colspan='28'><center>No record Found!</center></td>
				   <td colspan='11'><center >  <a href='addmember.php?resident_id=$resident_id'  data-toggle='tooltip' title='Add Family Member' ><i class='fa fa-user-plus' style='font-size:20px'></i></a></center> </td>
				   </tr>
				   ";
				}		
					
           ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"><!--update --></div>
        </div>
  </div>
        

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>

</html>
