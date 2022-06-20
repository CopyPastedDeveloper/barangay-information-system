<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require_once 'fpdf/fpdf.php';

$sql="SELECT * FROM tblresidents";
$query = $dbh-> prepare($sql);
$query->execute();

if(isset($_POST['residentspdf'])){
    
    
$pdf = new FPDF('L','mm','A4'); 
$pdf->AddPage();


$left = 30;
$right = 50;
$width_cell=array(10,50,30,13,20,30,30,30,30);
$pdf->SetFont('Arial','B',11);

//Background color of header//
$pdf->SetFillColor(193,229,252);
$pdf->SetLeftMargin($left);
$pdf->SetRightMargin($right);
// $pdf->SetTopMargin($top);

// $pdf->Image('images/trinidadLogo.png',236,10,-1200);
// $pdf->Image('images/LGU.jpg',27,10,-530);
// $pdf->Cell(250,10,'REPUBLIC OF THE PHILIPPINES',0,1,'C');
// $pdf->Cell(250,10,'PROVINCE OF SURIGAO DEL SUR',0,0,'C');

// $pdf->Ln(40);


// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],12,'#',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],12, 'Name',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],12,'Birthday',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],12,'Age',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],12,'Gender',1,0,'C',true); 
$pdf->Cell($width_cell[5],12,'Household #',1,0,'C',true); 
$pdf->Cell($width_cell[6],12,'Purok #',1,0,'C',true); 
$pdf->Cell($width_cell[7],12,'Religion',1,0,'C',true);
$pdf->Cell($width_cell[8],12,'Civil Status',1,1,'C',true);  
//// header ends ///////
$pdf->SetLeftMargin($left);
$pdf->SetRightMargin($right);
$pdf->SetFont('Arial','',11);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($dbh->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['ID'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['Name'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['Birthdate'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['Age'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['Gender'],1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['Household'],1,0,'C',$fill);
$pdf->Cell($width_cell[6],10,$row['Purok'],1,0,'C',$fill);
$pdf->Cell($width_cell[7],10,$row['Religion'],1,0,'C',$fill);
$pdf->Cell($width_cell[8],10,$row['Civilstatus'],1,1,'C',$fill);
// to give alternate background fill  color to rows//
$fill = !$fill;

}
/// end of records /// 





$pdf->Output();
}


?>