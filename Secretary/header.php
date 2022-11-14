<?php 

    session_start();
  include("connection.php");

if(isset($_SESSION["user_id"])){
    
    $user_id = $_SESSION["user_id"];
 
    $get_record = mysqli_query($connection, "SELECT * FROM users WHERE user_id = '$user_id'");
    $row = mysqli_fetch_assoc($get_record);
    $db_first_name = ucfirst($row["username"]);
    $db_first_name_session = ucfirst($row["username"]);
     $profile_user = $row["profile_user"];
    $db_user_id = $row ["user_id"];
}else{
      echo "<script>window.location.href='../'</script>";

}

?>

