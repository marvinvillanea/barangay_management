<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php"); include("header.php");?>
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
}
body { background: gray !important; }
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

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
      <div id="forimage">
     <p class="help-block"><img class="img-responsive"  src="<?php echo "$profile_user"; ?>" style="width:200px;height:170px;border:2px solid black;margin:5%;border-radius:50%;" ></p>
            </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="addhouseholdhead.php">
          <i class="fas fa-fw fa fa-user icon-1"></i>
          <span>Add Household Head</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="record.php">
          <i class="fas fa-fw fa fa-database"></i>
          <span>Record</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="purok.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Purok</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="barangayfunctionaries.php">
          <i class="fas fa-fw fa fa-users icon-1"></i>
          <span>Barangay Functionaries</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="barangayfunctionaries.php">Barangay Functionaries</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- DataTables Example -->
            
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cap" data-whatever="@getbootstrap"><i class="fa fa-plus" style="font-size:20px" ></i> Add Barangay Captain/Chairman</button>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sec" data-whatever="@getbootstrap"><i class="fa fa-plus" style="font-size:20px"></i> Add Secretary</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kag" data-whatever="@getbootstrap"><i class="fa fa-plus" style="font-size:20px"></i> Add Kagawad</button>
           <!-- cap-->
            <div class="modal fade" id="cap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Barangay Captain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Year Decleared:</label>
                        <input type="date" name="date" class="form-control" value="">
                      </div>
                      <div class="form-group">
                      <select name="barangaychar"  style=" padding: 5px;width:100%;" class="form-control">
                          <?php
                  	$sel = mysqli_query($connection, "SELECT * FROM household_head  WHERE house_head = 'house head'");
      				
      				while ($i = $sel -> fetch_array()){
      				  $db_resident_id = $i['resident_id'];
      				  $db_first_name_resident = $i['first_name'];
      				  $db_last_name_resident = $i['last_name'];
      				  $db_middle_name_resident = $i['middle_name'];
      				  $fullname_resident = ucfirst($db_first_name_resident)." ".ucfirst($db_middle_name_resident[0]).". ".ucfirst($db_middle_name_resident);
      					echo "<option value='".$db_resident_id."'";
      					if (@$_POST['resident_id'] == $db_resident_id)
      							echo " selected";
      							echo ">$fullname_resident</option>";
      				}
                          ?>
                  </select>
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" class="btn btn-primary" value="Add Barangay Captain"/>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--sec -->
            
           <div class="modal fade" id="sec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Barangay Secretary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Year Decleared:</label>
                        <input type="date" name="date" class="form-control" value="">
                      </div>
                      <div class="form-group">
                      <select name="barangaysec"  style=" padding: 5px;width:100%;" class="form-control">
                          <?php
                  	$sel = mysqli_query($connection, "SELECT * FROM household_head  WHERE house_head = 'house head'");
      				
      				while ($i = $sel -> fetch_array()){
      				  $db_resident_id = $i['resident_id'];
      				  $db_first_name_resident = $i['first_name'];
      				  $db_last_name_resident = $i['last_name'];
      				  $db_middle_name_resident = $i['middle_name'];
      				  $fullname_resident = ucfirst($db_first_name_resident)." ".ucfirst($db_middle_name_resident[0]).". ".ucfirst($db_middle_name_resident);
      					echo "<option value='".$db_resident_id."'";
      					if (@$_POST['resident_id'] == $db_resident_id)
      							echo " selected";
      							echo ">$fullname_resident</option>";
      				}
                          ?>
                  </select>
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" class="btn btn-primary" value="Add Barangay Secretary"/>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--kagawad-->
        
           <div class="modal fade" id="kag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Barangay Kagawad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                      <div class="form-group">
                      <select name="barangaykag"  style=" padding: 5px;width:100%;" class="form-control">
                          <?php
                  	$sel = mysqli_query($connection, "SELECT * FROM household_head  WHERE house_head = 'house head'");
      				while ($i = $sel -> fetch_array()){
      				  $db_resident_id = $i['resident_id'];
      				  $db_first_name_resident = $i['first_name'];
      				  $db_last_name_resident = $i['last_name'];
      				  $db_middle_name_resident = $i['middle_name'];
      				  $fullname_resident = ucfirst($db_first_name_resident)." ".ucfirst($db_middle_name_resident[0]).". ".ucfirst($db_middle_name_resident);
      					echo "<option value='".$db_resident_id."'";
      					if (@$_POST['resident_id'] == $db_resident_id)
      							echo " selected";
      							echo ">$fullname_resident</option>";
      				}
                          ?>
                  </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Rank No.</label>
                        <select name="number" style=" padding: 5px;width:100%;" class="form-control">
                          <option>1</option>
                           <option>2</option>
                            <option>3</option>
                             <option>4</option>
                              <option>5</option>
                               <option>6</option>
                                <option>7</option>
                                 <option>8</option>
                                  <option>9</option>
                                   <option>10</option>
                                    <option>11</option>
                                     <option>12</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Year Decleared:</label>
                        <input type="date" name="date" class="form-control" value="">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" class="btn btn-primary" value="Add Barangay Kagawad"/>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
         <!--tables -->
         <form method="POST">
           <br>
        <button  name="view" value="viewcap" class="btn btn-primary"  data-whatever="@getbootstrap"><i class="fa fa-male" style="font-size:20px"></i> List Barangay Captain/Chairman</button>
        <button  name="view" value="viewsec" class="btn btn-primary" data-whatever="@getbootstrap"><i class="fa fa-female" style="font-size:20px"></i> List Secretary</button>
        <button  name="view" value="viewkaga"class="btn btn-primary" data-whatever="@getbootstrap"><i class="fa fa-users" style="font-size:20px"></i> List Kagawad</button>
         </form>
    <?php 
    
        if (isset($_POST['view'])){
          
          switch ($_POST['view']){
            case 'viewcap': 
              ?>
              <br>
                  <br>
              <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
           List of Barangay Captain</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                  <tr>
                    <th>Barangay Chairman/Captain</th>
                    <th>Year Decleared</th>
  
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Barangay Chairman/Kapitan</th>
                    <th>Year Decleared</th>
   
                    <th><center>Action</center></th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE brg_position LIKE '%Barangay Captain'";
        					$selqsl = mysqli_query($connection,$sel);
        							
        						while($i = $selqsl -> fetch_array()){
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_sec = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
        							echo "<tr>";
        							
        							echo "<td>$fullname_sec</td>";
        	    
        							echo "<td>$i[2]</td>";
        						    	echo "<Td>
        							    <center>
        							   
        							    </center>
        							</td>";
        							echo "</tr>";
        						
        					} 
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
              <?php
              break;
              case 'viewsec':
                ?>
                <br>
                  <br>
                  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
           List of Barangay Secretary</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead class="thead-dark ">
                  <tr>
                    <th>Barangay Secretary</th>
                    <th>Year Decleared</th>
      
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Barangay Secretary</th>
                    <th>Year Decleared</th>
            
                    <th><center>Action</center></th>
                  </tr>
                </tfoot>
                <tbody>
                <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE brg_position LIKE '%Barangay Secretary'";
        					$selqsl = mysqli_query($connection,$sel);
        							
        						while($i = $selqsl -> fetch_array()){
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_sec = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
        							echo "<tr>";
        							
        							echo "<td>$fullname_sec</td>";
        	    
        							echo "<td>$i[2]</td>";
        						    	echo "<Td>
        							    <center>
        							 
        							    </center>
        							</td>";
        							echo "</tr>";
        						
        					} 
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
           <?php     
                break;
                case 'viewkaga':
                  ?>
                  <br>
                  <br>
                        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
           List of Barangay Kagawad</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                  <tr>
                     <th>Rank</th>
                    <th>Barangay Kagawad</th>
                    <th>Year Decleared</th>
                
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Rank</th>
                    <th>Barangay Kagawad</th>
                    <th>Year Decleared</th>
                 
                    <th><center>Action</center></th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE brg_position LIKE '%Barangay Kagawad'";
        					$selqsl = mysqli_query($connection,$sel);
        							
        						while($i = $selqsl -> fetch_array()){
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_sec = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
        							echo "<tr>";
        							
        							echo "<td>$i[3]</td>";
        	    
        							echo "<td>$fullname_sec</td>";
        							echo "<td>$i[2]</td>";
        						    	echo "<Td>
        							    <center>
        							
        							    </center>
        							</td>";
        							echo "</tr>";
        						
        					} 
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
                  <?php
                  break;
              
          }
          
        }else {
         ?>
         <br>
         
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            Barangay Functionaries</div>
          <div class="card-body" id="background-table">
            <div class="table-responsive">
              <center>
              <div id="cap" >
                
                 <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE brg_position LIKE '%Barangay Captain'";
        					$selqsl = mysqli_query($connection,$sel);
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_cap = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_cap = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);

        					} 
        						
        					echo 		"<img class='img-responsive'  src='$db_picture_cap' style='width:150px;height:100px;'><br>";
        				echo "<h4><u>$fullname_cap</u></h4><b>Barangay Captain</b>";
                 ?>
              
           
              </div>
              <div id="sec">
                 
                 <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE brg_position LIKE '%Barangay Secretary'";
        					$selqsl = mysqli_query($connection,$sel);
        							
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_sec = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_sec = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
 		
        					} 
        						
        							echo 		"<img class='img-responsive'  src='$db_picture_sec' style='width:150px;height:100px;'><br>";
        							echo "<h4><u>$fullname_sec</u></h4><b>Barangay Secretary</b>";
                 ?>
              </div>
              <div id ="kaga" style="border-top:2px solid black;">
                 <br>
                 <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '1'";
        					$selqsl = mysqli_query($connection,$sel);
        							      echo "<div style='float:left;width:227px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        						echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                 <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '2'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        								echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                  <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '3'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        						echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					}
        					
        							echo "</div>";
                 ?>
                  <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '4'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        							echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '5'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        						echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '6'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px'><br>";
        							echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '7'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:227px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        							echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '8'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        							echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '9'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        							echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '10'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        							echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '11'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        						echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					}
        					
        							echo "</div>";
                 ?>
                   <?php 
                   $sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE `rank` = '12'";
        					$selqsl = mysqli_query($connection,$sel);
        							       echo "<div style='float:left;width:230px; height:200px;'>";
        						while($i = $selqsl -> fetch_array()){
        						  $db_picture_kag = $i['profile_picture'];
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
      			
        			    		echo 		"<img class='img-responsive'  src='$db_picture_kag' style='width:150px;height:100px;'><br>";
        							echo "<h4><u>$fullname_kag</u></h4><b>Barangay Kagawad</b>";
        					
        					}
        					
        							echo "</div>";
                 ?>
              </div>
              
                </center>
            </div>
          </div>
        </div>   
          
         <?php 
          include("footer.php");
        }
    
    ?>
        
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

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
<?php
  if (isset($_POST['add'])) {
    
      //barangaycaptain
                $barangaychar = $_POST['barangaychar'];
                $birthdate = $_POST['date'];
                $date = str_replace('/', '-', $birthdate);
                $dateconvert = date('Y-m-d', strtotime($date));
     //barangaysecretary   
                $barangaysec = $_POST['barangaysec'];
                $birthdate = $_POST['date'];
                $date = str_replace('/', '-', $birthdate);
                $dateconvert = date('Y-m-d', strtotime($date));
    //barangaykagawad
                $barangaykag = $_POST['barangaykag'];
                $rank = $_POST['number'];
                $birthdate = $_POST['date'];
                $date = str_replace('/', '-', $birthdate);
                $dateconvert = date('Y-m-d', strtotime($date));
       switch ($_POST['add']){
         case 'Add Barangay Captain':
           $selec_dat_cap = "SELECT * From barangay_officials where brg_position = 'Barangay Captain'";
           $query_data_cap = mysqli_query($connection,$selec_dat_cap);
           $get_data_cap =  mysqli_num_rows($query_data_cap);
           
           while ($i = $query_data_cap -> fetch_array()){
             $db_brg_id = $i['brg_id'];
             $db_brg_position = $i['brg_position'];
           }
           
                if ($db_brg_position === 'Barangay Captain' ){
                    echo "<script> alert('The Barangay Captain has been already registered');window.location='barangayfunctionaries.php';</script>";
                }else {
                       $insert_cap = mysqli_query($connection,"INSERT INTO `barangay_officials`(`brg_position`, `brg_year_declered`, `user_id`,`resident_id`)
                 VALUES ('Barangay Captain','$dateconvert',$user_id,$barangaychar)");
              
                 if ($insert_cap === TRUE){
                   $get_data_to_cap = mysqli_query($connection,"SELECT * 
                  FROM household_head
                  WHERE resident_id =  '$barangaychar' ");
              
                while ($i = $get_data_to_cap -> fetch_array()){
                    $db_first_name_cap = $i['first_name'];
      				      $db_last_name_cap = $i['last_name'];
      				      $db_middle_name_cap= $i['middle_name'];
      				       $fullname_captain = ucfirst($db_first_name_cap)." ".ucfirst($db_middle_name_cap[0]).". ".ucfirst($db_last_name_cap);
                }
                    mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES 
                    ('$db_first_name','The Barangay Captain $fullname_captain has been successfully registered',NOW(),$user_id)");
                    echo "<script> alert('The Barangay Captain $fullname_captain has been successfully registered');window.location='barangayfunctionaries.php';</script>";
                  }else {
                     echo "<script> alert('Please Try Again!');window.location='barangayfunctionaries.php';</script>";
                  }
                }
           
  
           break;
           case 'Add Barangay Secretary':
      $selec_dat_cap = "SELECT * From barangay_officials where brg_position = 'Barangay Secretary'";
           $query_data_cap = mysqli_query($connection,$selec_dat_cap);
           $get_data_cap =  mysqli_num_rows($query_data_cap);
           
           while ($i = $query_data_cap -> fetch_array()){
             $db_brg_id = $i['brg_id'];
             $db_brg_position = $i['brg_position'];
           }
           
                if ($db_brg_position === 'Barangay Secretary' ){
                    echo "<script> alert('The Barangay Secretary has been already registered');window.location='barangayfunctionaries.php';</script>";
                }else {
                       $insert_cap = mysqli_query($connection,"INSERT INTO `barangay_officials`( `brg_position`, `brg_year_declered`, `user_id`,`resident_id`)
                 VALUES ('Barangay Secretary','$dateconvert',$user_id,$barangaysec)");
              if ($insert_cap === TRUE){
                $get_data_to_cap = mysqli_query($connection,"SELECT * 
                  FROM household_head
                  WHERE resident_id =  '$barangaysec' ");
              
                while ($i = $get_data_to_cap -> fetch_array()){
                    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_sec = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
                }
                
                mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_first_name','The Barangay Secretary $fullname_sec has been successfully registered',NOW(),$user_id)");
                echo "<script> alert('The Barangay Secretary $fullname_sec has been successfully registered');window.location='barangayfunctionaries.php'; </script>";
              } else {
                     echo "<script> alert('Please Try Again!');window.location='barangayfunctionaries.php';</script>";
                  }
                }
           
              
  
           break;
            case 'Add Barangay Kagawad':
        
           
                $selec_dat_cap = "SELECT * From barangay_officials where brg_position = 'Barangay Kagawad'";
           $query_data_cap = mysqli_query($connection,$selec_dat_cap);
           $get_data_cap =  mysqli_num_rows($query_data_cap);
           
           
           while ($i = $query_data_cap -> fetch_array()){
             $db_brg_id = $i['brg_id'];
             $db_brg_position = $i['brg_position'];
             $db_rank = $i['rank'];
           }
           
           if ($get_data_cap === 12){
              echo "<script> alert('Kagawad Full!');window.location='barangayfunctionaries.php';</script>";
           }else {
                
                if ($db_rank ===  $rank) {
                    echo "<script> alert('Rank number is already Registered!');window.location='barangayfunctionaries.php';</script>";
                }else {
                
                       $insert_cap = mysqli_query($connection,"INSERT INTO `barangay_officials`(`brg_position`, `brg_year_declered`,`rank`, `user_id`,`resident_id`)
                 VALUES ('Barangay Kagawad','$dateconvert',$rank,$user_id,$barangaykag)");
              if ($insert_cap === TRUE){
                
                 $get_data_to_cap = mysqli_query($connection,"SELECT * 
                  FROM household_head
                  WHERE resident_id =  '$barangaykag' ");
              
                while ($i = $get_data_to_cap -> fetch_array()){
                    $db_first_name_kag = $i['first_name'];
      				      $db_last_name_kag = $i['last_name'];
      				      $db_middle_name_kag= $i['middle_name'];
      				       $fullname_kag = ucfirst($db_first_name_kag)." ".ucfirst($db_middle_name_kag[0]).". ".ucfirst($db_last_name_kag);
                }
                
                
                mysqli_query($connection, "INSERT INTO reports (username,remarks,report_datetime,user_id) VALUES ('$db_first_name','The Barangay Kagawad $fullname_kag has been successfully registered',NOW(),$user_id)");
                echo "<script> alert('The Barangay Kagawad $fullname_kag has been successfully registered');window.location='barangayfunctionaries.php'; </script>";
              } else {
                     echo "<script> alert('Please Try Again!');window.location='barangayfunctionaries.php';</script>";
                  }
                }
           }
           break;
     }
  }
?>                