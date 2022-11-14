<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");
include("header.php");

$resident_id = $_GET['resident_id'];
//time
$t=time();
//householdhead data
$selecdata = mysqli_query($connection,"SELECT * FROM household_head INNER JOIN purok ON household_head.prk_id = purok.prk_id WHERE resident_id='$resident_id';");
$selenum = mysqli_num_rows($selecdata);

//transaction data
$selecdata_from_transaction = mysqli_query($connection, "SELECT * FROM transaction WHERE resident_id='$resident_id';");

    while ($row = $selecdata_from_transaction ->fetch_array()){
        $db_purpose = $row['purpose'];
    }
    
//barangaycaptain
$sel = "SELECT * FROM barangay_officials INNER JOIN household_head ON barangay_officials.resident_id=household_head.resident_id WHERE brg_position LIKE '%Barangay Captain'";
        					$selqsl = mysqli_query($connection,$sel);
        							
        						while($i = $selqsl -> fetch_array()){
        						    $db_first_name_sec = $i['first_name'];
      				      $db_last_name_sec = $i['last_name'];
      				      $db_middle_name_sec= $i['middle_name'];
      				       $fullname_sec = ucfirst($db_first_name_sec)." ".ucfirst($db_middle_name_sec[0]).". ".ucfirst($db_last_name_sec);
        			
        						
        					} 


    //get data for the household head
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
         $db_prk_no  = $i['purok_no'];
       $fullname = ucfirst($db_first_name)." ".ucfirst($db_middle_name[0]).". ".ucfirst($db_last_name);
         
    }
    
    
    
}

//call the FPDF library
require('../fpdf185/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',12);

//Cell(width , height , text , border , end line , [align] )
$pdf ->Image('../logo_cell.jpg',10,10,40);

$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'Republic of the Philippines',0,1,'C');//end of line
$pdf->Cell(189 ,5,'City of Iligan',0,1,'C');//end of line
$pdf->Cell(189 ,5,'Lone District',0,1,'C');//end of line
$pdf->Cell(189 ,5,'Barangay Gimampang',0,1,'C');//end of line

$pdf->Cell(189 ,5,'',0,1,1);//end of line
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',12);
$pdf->Cell(189 ,5,'OFFICE OF THE PUNONG BARANGAY',0,1,'C');//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','BI',18);
$pdf->Cell(189 ,5,'C E R T I F I C A T I O N',0,1,'C');//end of line

$pdf->SetFont('Arial','',12);
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'To Whom It May Concern:',0,1,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','',12);
$pdf->Cell(16 ,5,'',0,0);
$pdf->Cell(40 ,5,'This is to certify that',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(48,5,''."$fullname".'',0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(85,5,'of legal age is a bonafide resident of Purok'.' '."$db_prk_no".'',0,1,1);//end of line)
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'Gimampang, this City. This certifies further that the said named person has  no criminal offense as',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'per our barangay records.',0,1,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(20 ,5,'',0,0,1);
$pdf->Cell(169 ,5,'PURPOSE: '.$db_purpose,0,1,1);//end of line

$pdf->SetFont('Arial','',12);
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(20 ,5,'',0,0,1);
$pdf->Cell(169 ,5,'ISSUED this '.(date("Y-m-d",$t)),0,1,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(189 ,5,'',0,1,1);//end of line
$pdf->Cell(139 ,5,'',0,0,1);
$pdf->Cell(50 ,5,$fullname_sec,0,1,'C');//end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(139 ,5,'',0,0,1);
$pdf->Cell(50 ,5,'Punong Barangay',0,1,'C');//end of line
$pdf->Output();
?>